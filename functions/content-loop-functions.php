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
 * Function to show the page content.
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
          comments_template();
        ?>
      </article>
    </section>
  <?php
    do_action( 'travelify_after_post' );
  endwhile;
else : ?>
  <h1 class="entry-title"><?php _e( 'Mitään ei löytynyt.', 'touko' ); ?></h1>
<?php endif;
}
?>
<?php
/* ------------------------------------------------------------------------ */

/**
 * Function to show the search results.
 */

add_action( 'loop_for_search', 'loop_for_search', 10 );

function loop_for_search() {
    global $post;
    if( have_posts() ) { ?>
    <h1><?php _e('Hakutulokset sanoilla: ', 'touko' );?><?php echo get_search_query(); ?></h1>
    <?php
      while( have_posts() ) {
        the_post();
        do_action( 'travelify_before_post' );?>
        <section id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="search-results">
          <article>
            <header class="entry-header">
              <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
              </h2><!-- .entry-title -->
            </header>
            <div class="entry-content clearfix">
              <?php the_excerpt(); ?>
            </div>
          </article>
        </section>
        <?php
        do_action( 'travelify_after_post' );
      }
    }
    else {
      ?>
      <section class="no-search-results">
        <h1 class="entry-title"><?php _e('Ei hakutuloksia sanoilla: ', 'touko' );?>"<?php echo get_search_query();?>" :-/</h1>
        <p class="search-again"><?php _e('Voit yrittää uudestaan:', 'touko' ); ?></p>
        <?php get_search_form(); ?>
      </section>
    <?php
     }
  }
?>
<?php
/* ------------------------------------------------------------------------ */

/*
 * Function to show the archive loop content.
 */

add_action('loop_for_archive', 'loop_archive', 10);

function loop_archive() {
  global $post;
  if( have_posts() ) {
    while( have_posts() ) {
      the_post();
      do_action( 'travelify_before_post' ); ?>
      <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <article>
        <?php
          if( has_post_thumbnail() ) {
            $image = '';
              $title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
              $image .= '<figure class="post-featured-image">';
              $image .= '<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">';
              $image .= get_the_post_thumbnail( $post->ID, 'featured', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
              $image .= '</figure>';
              echo $image;
          }
        ?>
          <header class="entry-header">
            <h2 class="entry-title">
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
            </h2><!-- .entry-title -->
          </header>
          <div class="entry-content clearfix">
            <?php the_excerpt(); ?>
          </div>
          <div class="entry-meta-bar clearfix">
            <div class="entry-meta">
              <span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
              <span class="date"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_time() ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
              <?php if( has_category() ) { ?>
                <span class="category"><?php the_category(', '); ?></span>
              <?php } ?>
              <?php if ( comments_open() ) { ?>
                <span class="comments"><?php comments_popup_link( __( 'Ei kommentteja', 'touko' ), __( '1 kommentti', 'touko' ), __( '% kommenttia', 'touko' ), '', __( 'Kommentointi ei sallittu', 'touko' ) ); ?></span>
              <?php } ?>
            </div><!-- .entry-meta -->
            <?php
            echo '<a class="readmore" href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">'.__( 'Jatka lukemista', 'touko' ).'</a>';
            ?>
          </div>
        </article>
      </section>
      <?php
        do_action( 'travelify_after_post' );
    }
  }
  else { ?>
    <h1 class="entry-title"><?php _e( 'Mitään ei löytynyt.', 'touko' ); ?></h1>
  <?php
  }
}
?>