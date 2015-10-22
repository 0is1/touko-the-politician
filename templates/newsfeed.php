<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Newsfeed Template
 *
 *
 * @file           newsfeed.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/newsfeed.php
 * @since          available since Release 0.9.0
 */
?>

<?php
  global $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;
?>

  <div class="newsfeed clearfix">
    <h1><i class="icon-doc"></i><?php _e( 'Uutisvirta', THEME_TEXTDOMAIN ); ?></h1>
    <?php if( $theme_settings['enable_wp_posts_newsfeed'] ): ?>
      <div class="wp-posts clearfix">
        <?php get_template_part( 'homepage', 'posts' ); ?>
      </div>
    <?php endif; ?>
    <?php if( $theme_settings['enable_facebook_newsfeed'] ): ?>
      <div class="facebook-page-posts clearfix">
        <?php get_template_part( 'templates/facebook', 'posts' ); ?>
      </div>
    <?php endif; ?>
    <?php if( $theme_settings['enable_twitter_newsfeed'] ): ?>
      <div class="twitter-page-posts clearfix">
        <?php get_template_part( 'templates/twitter', 'tweets' ); ?>
      </div>
    <?php endif; ?>
    <?php if( $theme_settings['enable_instagram'] ): ?>
      <div class="instagram-media-posts clearfix">
        <?php get_template_part( 'templates/instagram', 'media' ); ?>
      </div>
  <?php endif; ?>
  </div>