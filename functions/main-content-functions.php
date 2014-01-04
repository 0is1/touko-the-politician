<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Main Content Functions
 *
 *
 * @file           main-content-functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/functions/main-content-functions.php
 * @since          available since Release 1.0
 */

add_action('add_page_content', 'add_page_content');

function add_page_content() {
  global $post;
  global $travelify_theme_options_settings;
  global $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;
  $options = $travelify_theme_options_settings;
  if( $post ) {
    $layout = get_post_meta( $post->ID, 'travelify_sidebarlayout', true );
  }
  if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
    $layout = 'default';
  }
  // If front page
  if (is_home() || is_front_page()) {
      while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content">
            <?php
            do_action('create_like_button', get_site_url());?>
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
          </div><!-- .entry-content -->
        </article><!-- #post -->
    <?php endwhile; ?>
    <div class="social-media-boxes clearfix">
    <?php
    if($theme_settings['enable_facebook_like_box']) get_template_part('facebook/facebook', 'page');
    if($theme_settings['enable_twitter_follow_box']) get_template_part('twitter/twitter', 'page');
    ?>
    </div>
    <?php
      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('main-area-widget') ) : ?>
    <?php endif; ?>
    <?php if($theme_settings['enable_newsfeed']) get_template_part('newsfeed'); ?>
  <?php  }
  // if not front page
  else {
    if($layout === 'default') {
      $themeoption_layout = $theme_settings['default_layout'];
    if($themeoption_layout === 'left-sidebar') {
      get_template_part( 'content','leftsidebar' );
    }
    elseif($themeoption_layout === 'right-sidebar') {
      get_template_part( 'content','rightsidebar' );
    }
    else {
      get_template_part('content','default');
    }
   }
   elseif($themeoption_layout === 'left-sidebar') {
      get_template_part( 'content','leftsidebar' );
   }
   elseif($themeoption_layout === 'right-sidebar') {
      get_template_part( 'content','rightsidebar' );
   }
   else {
      get_template_part( 'content','default' );
    }
  }
}
/* ------------------------------------------------------------------------ */

add_action( 'loop_content', 'the_loop', 10 );
/**
 * Shows the loop content
 * Now we have only this one loop in this theme, all other page-types are looped in travelify
 * See: functions/content-loop-functions.php
 */
function the_loop() {
  if( is_page() ) {
    do_action('loop_the_page');
  }
  else if( is_search()){
    do_action('loop_for_search');
  }
  else do_action('loop_for_archive');

  // TODO: all these ->

  /*if( is_page() ) {
    if( is_page_template( 'templates/template-blog-large-image.php' ) ) {
      travelify_theloop_for_template_blog_image_large();
    }
    elseif( is_page_template( 'templates/template-blog-medium-image.php' ) ) {
      travelify_theloop_for_template_blog_image_medium();
    }
    elseif( is_page_template( 'templates/template-blog-full-content.php' ) ) {
      travelify_theloop_for_template_blog_full_content();
    }
    else {
      travelify_theloop_for_page();
    }
  }
  elseif( is_single() ) {
    travelify_theloop_for_single();
  }
*/
}
