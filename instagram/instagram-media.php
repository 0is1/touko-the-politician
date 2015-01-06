<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Instagram Media Template
 *
 *
 * @file           instagram-media.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/instagram/instagram-media.php
 * @since          available since Release 0.9.0
 */
?>

<?php

global $instagram_media, $touko_the_politician_theme_options_settings;
$theme_settings = $touko_the_politician_theme_options_settings;
$data = $instagram_media;

if ( !get_transient( 'instagram_transient') ) {
  call_user_func( 'instagram_transient' );
}

$instagram_data = get_transient( 'instagram_transient' );

if ( $instagram_data ) :
  $data = (array)json_decode( $instagram_data );

  foreach( $data['data'] as $key => $value ) { ?>
    <article class="instagram-media-post instagram-post-<?php echo $key;?> grid-50-with-gap clearfix">
      <section class="instagram-user-details clearfix">
        <figure class="newsfeed-icon-img instagram-page-img clearfix">
          <img src="<?php echo $value->user->profile_picture;?>" alt="<?php echo $value->user->full_name;?>">
        </figure>
        <a href="<?php echo esc_url('https://www.instagram.com/'.$value->user->username);?>" title="<?php echo $value->user->full_name;?> @ Instagram">
          <h3><?php echo $value->user->full_name; ?></h3>
        </a>
      </section>
      <section class="instagram-media-details">
        <figure class="instagram-img">
          <a href="<?php echo $value->link;?>" title="<?php echo $value->link;?>">
            <img src="<?php echo $value->images->thumbnail->url;?>" alt="thumbnail">
          </a>
        </figure>
        <?php
          if (isset($value->caption->text)) : ?>
          <figure class="newsfeed-icon instagram-logo">
            <i class="icon-instagram"></i>
          </figure>
          <p class="instagram-media-text"><?php echo $value->caption->text;?></p>
        <?php
          endif;
         ?>
        <?php
          $datetime = date($value->created_time);
          // Set datetime timezone match to timezone set in wp
          $timezone_offset = get_option('gmt_offset');
          $datetime = $datetime+(60*60*$timezone_offset);
        ?>
        <span class="datetime"><?php echo gmdate('d.m.Y H:i', $datetime);?></span>
      </section>
    </article>
    <?php
    // add clearfix after every two images's
      if ($key % 2 === 1 && $theme_settings['instagram_visible_posts_count'] > 2) { ?>
        <hr class="clearfix">
      <?php }
  }
    ?>
<?php else : // If Instagram data isnt available  ?>
  <article class="instagram-media-post grid-100 clearfix">
    <section class="instagram-user-details clearfix">
      <figure class="newsfeed-icon instagram-logo">
        <i class="icon-instagram"></i>
      </figure>
      <h3><?php _e('Instagram-kuvien haussa on tällä hetkellä ongelmia...', THEME_TEXTDOMAIN); ?></h3>
    </section>
<?php endif; ?>