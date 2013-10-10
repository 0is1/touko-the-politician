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
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/admin/instagram-options.php
 * @since          available since Release 1.0
 */
?>

<?php
  require_once(get_stylesheet_directory() . '/vendor/instagram/instagram.php');
  settings_fields('touko_theme_options');
  global $touko_the_politician_theme_options_settings, $master_instagram;
  $options = $touko_the_politician_theme_options_settings;

  $auth_config = array(
    'apiKey'         => 'c7661e722d8643f8af4f0699517c7290',
    'apiSecret'     => '3793b5e4d1274a439b0b3ad369298360',
    'apiCallback'      => 'http://localhost:8888/touko/wordpress/wp-admin/themes.php?page=touko_theme_options'
  );
  $instagram = $master_instagram;

?>
<div class="instagram-options">
  <h2><?php _e( 'Instagram asetukset', 'touko' );?></h2>
  <div class="wrap pure-control-group">
    <label for="touko_theme_options[enable_instagram]"><?php _e( 'Näytä Instagram etusivulla?', 'touko' );?></label>
    <input type="checkbox" name="touko_theme_options[enable_instagram]" value="<?php echo $options['enable_instagram'];?>" <?php if($options['enable_instagram']) echo "checked=checked";?>  />
  </div>
  <div class="wrap pure-control-group">
    <label for="touko_theme_options[instagram_api_key]"><?php _e( 'Instagram CLIENT ID:', 'touko' );?></label>
    <input type="text" name="touko_theme_options[instagram_api_key]" value="<?php echo $options['instagram_api_key'];?>"  />
  </div>
  <div class="wrap pure-control-group">
    <label for="touko_theme_options[instagram_api_secret]"><?php _e( 'Instagram CLIENT SECRET:', 'touko' );?></label>
    <input type="text" name="touko_theme_options[instagram_api_secret]" value="<?php echo $options['instagram_api_secret'];?>"  />
  </div>
  <div class="wrap pure-control-group">
    <label for="touko_theme_options[instagram_api_callback]"><?php _e( 'Instagram REDIRECT URI', 'touko' );?></label>
    <input type="text" name="touko_theme_options[instagram_api_callback]" value="<?php echo $options['instagram_api_callback'];?>"  />
  </div>
  <?php
    if (get_option('instagram-access-token') === false) :
  ?>
    <div class="wrap pure-control-group">
      <?php echo "<a href='{$instagram->getLoginUrl()}'>Login with Instagram</a>"; ?>
    </div>
  <?php elseif(get_option('instagram-access-token') !== false):  ;?>
    <p>Instagram OK</p>
  <?php endif; ?>
  <?php
    if (get_option('instagram-access-token') === false && isset($_GET['code'])) :
      $response = wp_remote_post("https://api.instagram.com/oauth/access_token",
        array(
          'body' => array(
            'code' => $_GET['code'],
            'response_type' => 'authorization_code',
            'redirect_uri' => 'http://localhost:8888/touko/wordpress/wp-admin/themes.php?page=touko_theme_options',
            'client_id' => 'c7661e722d8643f8af4f0699517c7290',
            'client_secret' => '3793b5e4d1274a439b0b3ad369298360',
            'grant_type' => 'authorization_code',
          ),
          'sslverify' => apply_filters('https_local_ssl_verify', false)
        )
      );
    if(!is_wp_error($response) && $response['response']['code'] < 400 && $response['response']['code'] >= 200):
      $auth = json_decode($response['body']);
      if(isset($auth->access_token)):
        $access_token = $auth->access_token;
        update_option('instagram-access-token', $access_token);
        $success = true;
      endif; //isset($auth->access_token)

    elseif(is_wp_error($response)):
      $error = $response->get_error_message();
      $errormessage = $error;
      $errortype = 'Wordpress Error';

    elseif($response['response']['code'] >= 400):
      $error = json_decode($response['body']);
      $errormessage = $error->error_message;
      $errortype = $error->error_type;
    endif; //!is_wp_error($response)

    if (!$access_token):
      delete_option('instagram-access-token');
    endif;

  endif; // GET['code']
  ?>
</div>