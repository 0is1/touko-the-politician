<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Theme Newsfeed Options Template
 *
 *
 * @file           admin/newsfeed-options.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/admin/newsfeed-options.php
 * @since          available since Release 0.9.0
 */
?>

<?php
  global $touko_the_politician_theme_options_settings;
  $options = $touko_the_politician_theme_options_settings;
  // echo "<pre>";
  // print_r( get_option( 'touko_theme_newsfeed_options' ) );
  // echo "</pre>";
?>
<div class="newsfeed-options">
  <h2><?php _e( 'Uutisvirran asetukset', THEME_TEXTDOMAIN );?></h2>
  <div class="wrap pure-control-group">
    <label for="touko_theme_newsfeed_options[enable_newsfeed]"><?php _e( 'Näytä uutisvirta etusivulla?', THEME_TEXTDOMAIN );?></label>
    <input type="checkbox" name="touko_theme_newsfeed_options[enable_newsfeed]" value="<?php echo $options['enable_newsfeed'];?>" <?php checked( $options['enable_newsfeed'], 1 ); ?> />
  </div>
</div>
<div class="wp-posts-options">
  <h4><?php _e( 'Wordpress blogiviestien asetukset', THEME_TEXTDOMAIN );?></h4>
  <div class="wrap pure-control-group">
    <label for="touko_theme_newsfeed_options[enable_wp_posts_newsfeed]"><?php _e( 'Näytä blogiviestit etusivulla?', THEME_TEXTDOMAIN );?></label>
    <input type="checkbox" name="touko_theme_newsfeed_options[enable_wp_posts_newsfeed]" value="<?php echo $options['enable_wp_posts_newsfeed'];?>" <?php checked( $options['enable_wp_posts_newsfeed'], 1 ); ?>  />
  </div>
  <div class="wrap pure-control-group">
    <label for="touko_theme_newsfeed_options[wp_blog_visible_posts_count]"><?php _e( 'Blogiviestien määrä etusivulla:', THEME_TEXTDOMAIN );?></label>
    <input type="number" name="touko_theme_newsfeed_options[wp_blog_visible_posts_count]" value="<?php echo $options['wp_blog_visible_posts_count'];?>"  />
  </div>
</div>
<div class="facebook-options">
  <div class="facebook-app-settings">
    <h4><?php _e( 'Facebook-sovelluksen asetukset', THEME_TEXTDOMAIN );?></h4>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[facebook_app_id]"><?php _e( 'App ID/API Key:', THEME_TEXTDOMAIN );?></label>
      <input type="text" name="touko_theme_newsfeed_options[facebook_app_id]" value="<?php echo $options['facebook_app_id'];?>"  />
    </div>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[facebook_app_secret]"><?php _e( 'App Secret:', THEME_TEXTDOMAIN );?></label>
      <input type="text" name="touko_theme_newsfeed_options[facebook_app_secret]" value="<?php echo $options['facebook_app_secret'];?>"  />
    </div>
  </div>
  <div class="facebook-newsfeed-settings">
    <h4><?php _e( 'Facebook-uutisvirran asetukset', THEME_TEXTDOMAIN );?></h4>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[enable_facebook_newsfeed]"><?php _e( 'Näytä Facebook-viestit etusivulla?', THEME_TEXTDOMAIN );?></label>
      <input type="checkbox" name="touko_theme_newsfeed_options[enable_facebook_newsfeed]" value="<?php echo $options['enable_facebook_newsfeed'];?>" <?php if( $options['enable_facebook_newsfeed'] ) echo "checked=checked";?>  />
    </div>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[facebook_page_id]"><?php _e( 'Facebook-sivun id:', THEME_TEXTDOMAIN );?></label>
      <input type="text" name="touko_theme_newsfeed_options[facebook_page_id]" value="<?php echo $options['facebook_page_id'];?>"  />
    </div>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[facebook_visible_posts_count]">
        <?php _e( 'Facebook postien määrä etusivulla:', THEME_TEXTDOMAIN );?>
      </label>
      <input type="number" name="touko_theme_newsfeed_options[facebook_visible_posts_count]" value="<?php echo $options['facebook_visible_posts_count'];?>"  />
    </div>
  </div>
</div>
<div class="twitter-options">
  <div class="twitter-app-settings">
    <h4><?php _e( 'Twitter-sovelluksen asetukset', THEME_TEXTDOMAIN );?></h4>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[twitter_consumer_key]"><?php _e( 'Twitter Consumer Key:', THEME_TEXTDOMAIN );?></label>
      <input type="text" name="touko_theme_newsfeed_options[twitter_consumer_key]" value="<?php echo $options['twitter_consumer_key'];?>"  />
    </div>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[twitter_consumer_secret]"><?php _e( 'Twitter Consumer Secret:', THEME_TEXTDOMAIN );?></label>
      <input type="text" name="touko_theme_newsfeed_options[twitter_consumer_secret]" value="<?php echo $options['twitter_consumer_secret'];?>"  />
    </div>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[twitter_oauth_access_token]"><?php _e( 'Twitter OAuth Access Token:', THEME_TEXTDOMAIN );?></label>
      <input type="text" name="touko_theme_newsfeed_options[twitter_oauth_access_token]" value="<?php echo $options['twitter_oauth_access_token'];?>"  />
    </div>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[twitter_oauth_access_token_secret]"><?php _e( 'Twitter OAuth Access Token Secret:', THEME_TEXTDOMAIN );?></label>
      <input type="text" name="touko_theme_newsfeed_options[twitter_oauth_access_token_secret]" value="<?php echo $options['twitter_oauth_access_token_secret'];?>"  />
    </div>
  </div>
  <div class="twitter-newsfeed-settings">
    <h4><?php _e( 'Twitter-uutisvirran asetukset', THEME_TEXTDOMAIN );?></h4>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[enable_twitter_newsfeed]"><?php _e( 'Näytä Twitter-viestit etusivulla?', THEME_TEXTDOMAIN );?></label>
      <input type="checkbox" name="touko_theme_newsfeed_options[enable_twitter_newsfeed]" value="<?php echo $options['enable_twitter_newsfeed'];?>" <?php if( $options['enable_twitter_newsfeed'] ) echo "checked=checked";?>  />
    </div>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[twitter_username]"><?php _e( 'Twitter käyttäjätunnus:', THEME_TEXTDOMAIN );?></label>
      <input type="text" name="touko_theme_newsfeed_options[twitter_username]" value="<?php echo $options['twitter_username'];?>"  />
    </div>
    <div class="wrap pure-control-group">
      <label for="touko_theme_newsfeed_options[twitter_visible_posts_count]"><?php _e( 'Tweettien määrä etusivulla:', THEME_TEXTDOMAIN );?></label>
      <input type="number" name="touko_theme_newsfeed_options[twitter_visible_posts_count]" value="<?php echo $options['twitter_visible_posts_count'];?>"  />
    </div>
  </div>
</div>