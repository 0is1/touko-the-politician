<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Instagram Options Template
 *
 *
 * @file           admin/instagram-options.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/admin/instagram-options.php
 * @since          available since Release 0.9.0
 */
?>

<?php
  require_once(get_stylesheet_directory() . '/vendor/instagram/instagram.php');
  global $touko_the_politician_theme_options_settings;
  $options = $touko_the_politician_theme_options_settings;

?>
<div class="instagram-options">
  <h4><?php _e( 'Instagram asetukset', THEME_TEXTDOMAIN );?></h4>
  <div class="wrap pure-control-group">
    <?php
      if ( !get_option('instagram-access-token') ) :
    ?>
      <div class="wrap pure-control-group">
        <a class="instagram-login" href="<?php echo get_option( 'touko-instagram-login-url' );?>"><?php _e( 'Login with Instagram', THEME_TEXTDOMAIN );?></a>
      </div>
    <?php elseif( get_option('instagram-access-token') ): ?>
      <p class="instagram-ok"><?php _e( 'Instagram OK', THEME_TEXTDOMAIN );?></p>
    <?php endif; ?>
  </div>
  <div class="wrap pure-control-group">
    <label for="touko_theme_newsfeed_options[enable_instagram]"><?php _e( 'Näytä Instagram etusivulla?', THEME_TEXTDOMAIN );?></label>
    <input type="checkbox" name="touko_theme_newsfeed_options[enable_instagram]" value="<?php echo $options['enable_instagram'];?>" <?php if($options['enable_instagram']) echo "checked=checked";?>  />
  </div>
  <div class="wrap pure-control-group">
    <label for="touko_theme_newsfeed_options[instagram_api_key]"><?php _e( 'Instagram CLIENT ID:', THEME_TEXTDOMAIN );?></label>
    <input type="text" name="touko_theme_newsfeed_options[instagram_api_key]" value="<?php echo $options['instagram_api_key'];?>"  />
  </div>
  <div class="wrap pure-control-group">
    <label for="touko_theme_newsfeed_options[instagram_api_secret]"><?php _e( 'Instagram CLIENT SECRET:', THEME_TEXTDOMAIN );?></label>
    <input type="text" name="touko_theme_newsfeed_options[instagram_api_secret]" value="<?php echo $options['instagram_api_secret'];?>"  />
  </div>
  <div class="wrap pure-control-group">
    <label for="touko_theme_newsfeed_options[instagram_api_callback]"><?php _e( 'Instagram REDIRECT URI', THEME_TEXTDOMAIN );?> </label>
    <input type="text" name="touko_theme_newsfeed_options[instagram_api_callback]" value="<?php echo get_bloginfo('wpurl');?>/wp-admin/admin.php?page=<?php echo $_GET['page'];?>" />
  </div>

  <div class="wrap pure-control-group">
    <label for="touko_theme_newsfeed_options[instagram_username]"><?php _e( 'Instagram käyttäjätunnus:', THEME_TEXTDOMAIN );?></label>
    <input type="text" name="touko_theme_newsfeed_options[instagram_username]" value="<?php echo $options['instagram_username'];?>"  />
    </div>
  <div class="wrap pure-control-group">
    <label for="touko_theme_newsfeed_options[instagram_visible_posts_count]"><?php _e( 'Instagram kuvien määrä etusivulla:', THEME_TEXTDOMAIN );?></label>
    <input type="number" name="touko_theme_newsfeed_options[instagram_visible_posts_count]" value="<?php echo $options['instagram_visible_posts_count'];?>"  />
  </div>
  <?php
    if ( !get_option('instagram-access-token') && isset($_GET['code']) ) :
      $callback_url = get_bloginfo('wpurl') . '/wp-admin/admin.php?page=' . $_GET['page'];
      $response = wp_remote_post("https://api.instagram.com/oauth/access_token",
        array(
          'body' => array(
            'code' => $_GET['code'],
            'response_type' => 'authorization_code',
            'redirect_uri' => $callback_url,
            'client_id' => $options['instagram_api_key'],
            'client_secret' => $options['instagram_api_secret'],
            'grant_type' => 'authorization_code',
          ),
          'sslverify' => apply_filters('https_local_ssl_verify', false)
        )
      );
    if( !is_wp_error($response) && $response['response']['code'] < 400 && $response['response']['code'] >= 200 ):

      $auth = json_decode($response['body']);

      if( isset($auth->access_token) ):
        $access_token = $auth->access_token;
        update_option( 'instagram-access-token', $access_token );
        $success = true;
      endif; //isset($auth->access_token)

    elseif( is_wp_error($response) ):

      $error = $response->get_error_message();
      $errormessage = $error;
      $errortype = 'Wordpress Error';

    elseif( $response['response']['code'] >= 400 ):

      $error = json_decode( $response['body'] );
      $errormessage = $error->error_message;
      $errortype = $error->error_type;

    endif; //!is_wp_error($response)

    if (!$access_token):
      delete_option( 'instagram-access-token' );
    endif;

  endif; // GET['code']
  ?>
</div>