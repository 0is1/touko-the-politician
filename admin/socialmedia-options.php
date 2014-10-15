<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Theme Social Media Options Template
 *
 *
 * @file           admin/socialmedia-options.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/admin/socialmedia-options.php
 * @since          available since Release 0.9.0
 */
?>

<?php
  global $touko_the_politician_theme_options_settings;
  $options = $touko_the_politician_theme_options_settings;
  // echo "<pre>";
  // print_r( get_option( 'touko_theme_social_media_options' ) );
  // echo "</pre>";
?>
<div class="social-media-options">
  <h2><?php _e( 'Sosiaalisen median asetukset', THEME_TEXTDOMAIN );?></h2>
  <div class="pure-control-group wrap">
    <label for="touko_theme_social_media_options[enable_facebook_like_box]"><?php _e( 'Näytä Facebook-sivu?', THEME_TEXTDOMAIN );?></label>
    <input type="checkbox" name="touko_theme_social_media_options[enable_facebook_like_box]" value="<?php echo $options['enable_facebook_like_box'];?>" <?php checked( $options['enable_facebook_like_box'], 1 ); ?>  />
  </div>
  <div class="pure-control-group wrap">
    <label for="touko_theme_social_media_options[enable_twitter_follow_box]"><?php _e( 'Näytä Twitter-sivu?', THEME_TEXTDOMAIN );?></label>
    <input type="checkbox" name="touko_theme_social_media_options[enable_twitter_follow_box]" value="<?php echo $options['enable_twitter_follow_box'];?>" <?php checked( $options['enable_twitter_follow_box'], 1 ); ?> />
  </div>
  <div class="pure-control-group wrap">
    <label for="touko_theme_social_media_options[enable_social_media_icons]"><?php _e( 'Näytä sosiaalisen median ikonit?', THEME_TEXTDOMAIN );?></label>
    <input type="checkbox" name="touko_theme_social_media_options[enable_social_media_icons]" value="<?php echo $options['enable_social_media_icons'];?>" <?php checked( $options['enable_social_media_icons'], 1 ); ?>  />
  </div>
</div>
<div class="social-media-link-options">
  <h4><?php _e( 'Sosiaalisen median linkit', THEME_TEXTDOMAIN );?></h4>
  <div class="pure-control-group wrap facebook">
    <label for="touko_theme_social_media_options[facebook_page_url]"><?php _e( 'Facebook', THEME_TEXTDOMAIN );?></label>
    <input type="text" name="touko_theme_social_media_options[facebook_page_url]" value="<?php echo $options['facebook_page_url'];?>"  />
  </div>
  <div class="pure-control-group wrap twitter">
    <label for="touko_theme_social_media_options[twitter_page_url]"><?php _e( 'Twitter', THEME_TEXTDOMAIN );?></label>
    <input type="text" name="touko_theme_social_media_options[twitter_page_url]" value="<?php echo $options['twitter_page_url'];?>"  />
  </div>
  <div class="pure-control-group wrap rss">
    <label for="touko_theme_social_media_options[rss_page_url]"><?php _e( 'RSS', THEME_TEXTDOMAIN );?></label>
    <input type="text" name="touko_theme_social_media_options[rss_page_url]" value="<?php echo $options['rss_page_url'];?>"  />
  </div>
  <div class="pure-control-group wrap donate">
    <label for="touko_theme_social_media_options[donate_url]"><?php _e( 'Lahjoitusnappi', THEME_TEXTDOMAIN );?></label>
    <input type="text" name="touko_theme_social_media_options[donate_url]" value="<?php echo $options['donate_url'];?>"  />
  </div>
</div>

