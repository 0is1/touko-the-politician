<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Newsfeed Template
 *
 *
 * @file           newsfeed.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/newsfeed.php
 * @since          available since Release 1.0
 */
?>

<?php
  global $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;
?>

  <div class="newsfeed clearfix">
    <h1><?php _e('Uutisvirta', 'touko'); ?></h1>
    <?php if($theme_settings['enable_wp_posts_newsfeed']): ?>
      <div class="wp-posts clearfix">
        <?php get_template_part('homepage', 'posts'); ?>
      </div>
    <?php endif; ?>
    <?php if($theme_settings['enable_facebook_newsfeed']): ?>
      <div class="facebook-page-posts clearfix">
        <?php get_template_part('facebook/facebook', 'posts'); ?>
      </div>
    <?php endif; ?>
    <?php if($theme_settings['enable_twitter_newsfeed']): ?>
      <div class="twitter-page-posts clearfix">
        <?php get_template_part('twitter/twitter', 'tweets'); ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="facebook-page">
    <?php get_template_part('facebook/facebook', 'page-details'); ?>
  </div>