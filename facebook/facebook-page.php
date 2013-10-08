<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Facebook Page Template
 *
 *
 * @file           facebook-page.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/facebook/facebook-page.php
 * @since          available since Release 1.0
 */
?>

<?php
  global $facebook_page_details, $touko_the_politician_theme_options_settings, $facebook_photos;
  $data = $facebook_page_details;
  $theme_settings = $touko_the_politician_theme_options_settings;
  $facebook_page_picture = $facebook_photos["data"][0]["picture"];
?>

<div class="facebook-page facebook-box fleft pure-u">
  <section class="in-facebook">
    <figure class="newsfeed-icon facebook-logo">
      <i class="icon-facebook-rect"></i>
    </figure>
    <p><?php echo $data['name'];?><?php _e(' – Facebookissa', 'touko'); ?></p>
  </section>
  <section class="facebook-user-details clearfix">
    <a href="<?php echo esc_url($theme_settings["facebook_page_url"]);?>" title="<?php echo $data["name"];?> – <?php _e('@Facebook', 'touko'); ?>" class="clearfix page-link">
      <figure class="newsfeed-icon-img facebook-page-img clearfix">
        <img src="<?php echo $facebook_page_picture;?>" alt="<?php echo $data['name'];?>">
      </figure>
      <h1><?php echo $data['name']; ?></h1>
    </a>
    <div class="fb-like" data-href="<?php echo esc_url('https://www.facebook.com/'.$theme_settings["facebook_page_id"]);?>" data-width="350" data-show-faces="true" data-send="false"></div>
  </section>
</div>