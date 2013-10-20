<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Content Loop Functions
 *
 *
 * @file           content-loop-functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/functions/content-loop-functions.php
 * @since          available since Release 1.0
 */

add_action( 'before_loop', 'before_loop', 10 );
/**
 * The opening div
 */
function before_loop() {
  echo '<div id="content">';
}

/* ------------------------------------------------------------------------ */

add_action( 'after_loop', 'after_loop', 10 );
/**
 * The closing div
 */
function after_loop() {
  echo '</div><!-- #content -->';
}

/* ------------------------------------------------------------------------ */
add_action( 'loop_the_page', 'loop_the_page', 10 );
/**
 * Fuction to show the page content.
 */
function loop_the_page() {
  global $post;

if( have_posts() ) :
  while( have_posts()) :
      the_post();
      do_action( 'travelify_before_post' ); ?>
    <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <article>
      <?php do_action( 'travelify_before_post_header' ); ?>
        <header class="entry-header">
          <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
          </h2><!-- .entry-title -->
        </header>
        <?php do_action( 'travelify_after_post_header' ); ?>
        <?php do_action( 'travelify_before_post_content' ); ?>
        <div class="entry-content clearfix">
          <div class="social-media-buttons">
            <?php
              $blog_title = get_bloginfo('name');
              $title = $blog_title .' – ' . the_title('','', false);
              do_action('create_like_button', get_permalink());
              do_action('add_tweet_button', get_permalink(), $title);
            ?>
          </div>
          <?php the_content(); ?>
          <?php
            wp_link_pages( array(
            'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'travelify' ),
            'after'             => '</div>',
            'link_before'       => '<span>',
            'link_after'        => '</span>',
            'pagelink'          => '%',
            'echo'              => 1
               ) );
          ?>
        </div>
        <?php
          do_action( 'travelify_after_post_content' );
          do_action( 'travelify_before_comments_template' );
          comments_template();
          do_action ( 'travelify_after_comments_template' );
        ?>
      </article>
    </section>
  <?php
    do_action( 'travelify_after_post' );
  endwhile;
else : ?>
  <h1 class="entry-title"><?php _e( 'No Posts Found.', 'travelify' ); ?></h1>
<?php endif;
}
?>