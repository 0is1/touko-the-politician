<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Social Media Options Template
 *
 *
 * @file           admin/socialmedia-options.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/admin/socialmedia-options.php
 * @since          available since Release 1.0
 */
?>

<?php
  settings_fields('touko_theme_options');
  global $touko_the_politician_theme_options_settings;
  $options = $touko_the_politician_theme_options_settings;
?>
<div class="social-media-options">
  <h2><?php _e( 'Sosiaalisen median asetukset', 'touko' );?></h2>
  <div class="pure-control-group wrap">
    <label for="touko_theme_options[enable_facebook_like_box]"><?php _e( 'Näytä Facebook-sivu?', 'touko' );?></label>
    <input type="checkbox" name="touko_theme_options[enable_facebook_like_box]" value="<?php echo $options['enable_facebook_like_box'];?>" <?php if($options['enable_facebook_like_box']) echo "checked=checked";?>  />
  </div>
  <div class="pure-control-group wrap">
    <label for="touko_theme_options[enable_twitter_follow_box]"><?php _e( 'Näytä Twitter-sivu?', 'touko' );?></label>
    <input type="checkbox" name="touko_theme_options[enable_twitter_follow_box]" value="<?php echo $options['enable_twitter_follow_box'];?>" <?php if($options['enable_twitter_follow_box']) echo "checked=checked";?>  />
  </div>
  <hr>
  <div class="pure-control-group wrap">
    <label for="touko_theme_options[enable_social_media_icons]"><?php _e( 'Näytä sosiaalisen median ikonit?', 'touko' );?></label>
    <input type="checkbox" name="touko_theme_options[enable_social_media_icons]" value="<?php echo $options['enable_social_media_icons'];?>" <?php if($options['enable_social_media_icons']) echo "checked=checked";?>  />
  </div>
</div>
<div class="social-media-link-options">
  <h3><?php _e( 'Sosiaalisen median linkit', 'touko' );?></h3>
  <div class="pure-control-group wrap facebook">
    <label for="touko_theme_options[facebook_page_url]"><?php _e( 'Facebook', 'touko' );?></label>
    <input type="text" name="touko_theme_options[facebook_page_url]" value="<?php echo $options['facebook_page_url'];?>"  />
  </div>
  <div class="pure-control-group wrap twitter">
    <label for="touko_theme_options[twitter_page_url]"><?php _e( 'Twitter', 'touko' );?></label>
    <input type="text" name="touko_theme_options[twitter_page_url]" value="<?php echo $options['twitter_page_url'];?>"  />
  </div>
  <div class="pure-control-group wrap rss">
    <label for="touko_theme_options[rss_page_url]"><?php _e( 'RSS', 'touko' );?></label>
    <input type="text" name="touko_theme_options[rss_page_url]" value="<?php echo $options['rss_page_url'];?>"  />
  </div>
</div>