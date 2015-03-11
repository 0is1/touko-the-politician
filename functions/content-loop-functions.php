<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Content Loop Functions
 *
 *
 * @file           content-loop-functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/functions/content-loop-functions.php
 * @since          available since Release 0.9.0
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

add_action( 'add_social_media_buttons', 'add_social_media_buttons', 10 );
/**
 * Add social media buttons
 */
function add_social_media_buttons(){
  echo '<div class="social-media-buttons">';
  $blog_title = get_bloginfo( 'name' );
  if ( is_home() || is_front_page()) {
    $title = $blog_title .' – ' . get_bloginfo( 'description' );
  } else $title = $blog_title .' – ' . the_title( '','', false );
  do_action( 'create_like_button', get_permalink() );
  do_action( 'add_tweet_button', get_permalink(), $title);
  echo '</div>';
}
/* ------------------------------------------------------------------------ */

/**
 * Function to show the page content.
 */

add_action( 'loop_the_page', 'loop_the_page', 10 );

function loop_the_page() {
  global $post;

  if( have_posts() ) :
    while( have_posts()) :
      the_post(); ?>
    <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <article>
        <header class="entry-header main-content-data">
          <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
          </h2><!-- .entry-title -->
        </header>
        <div class="entry-content main-content-data">
          <?php do_action( 'add_social_media_buttons' ); ?>
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
  endwhile;
else : ?>
  <h1 class="entry-title"><?php _e( 'Mitään ei löytynyt.', THEME_TEXTDOMAIN ); ?></h1>
<?php endif;
}
?>
<?php
/* ------------------------------------------------------------------------ */

/**
 * Function to show the search results.
 */

add_action('loop_for_search', 'loop_for_search', 10);

function loop_for_search() {
    global $post;
    if( have_posts() ) { ?>
      <div class="search-results-container">
      <h1><?php _e('Hakutulokset sanoilla: ', THEME_TEXTDOMAIN );?><?php echo get_search_query(); ?></h1>
      <?php
        while( have_posts() ) {
          the_post(); ?>
          <section id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="search-results">
            <article>
              <header class="entry-header main-content-data">
                <h2 class="entry-title">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
                </h2><!-- .entry-title -->
              </header>
              <div class="entry-content main-content-data">
                <?php the_excerpt(); ?>
              </div>
            </article>
          </section>
          <?php
        } ?>
      </div>
    <?php
    }
    else {
      ?>
      <section class="no-search-results">
        <h1 class="entry-title"><?php _e('Ei hakutuloksia sanoilla: ', THEME_TEXTDOMAIN );?>"<?php echo get_search_query();?>" :-/</h1>
        <p class="search-again"><?php _e('Voit yrittää uudestaan:', THEME_TEXTDOMAIN ); ?></p>
        <?php get_search_form(); ?>
      </section>
    <?php
     }
  }
?>
<?php
/* ------------------------------------------------------------------------ */

/**
 * Function to show the single post content.
 */

add_action( 'loop_for_single', 'loop_for_single', 10 );

function loop_for_single() {
  global $post;
  if( have_posts() ) {
    while( have_posts() ) {
      the_post();
?>
      <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <article>
          <div class="entry-meta main-content-data">
            <span class="icon-user"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
            <span class="icon-clock"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_time() ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
            <?php if( has_category() ) { ?>
              <span class="icon-tag"><?php the_category( ', ' ); ?></span>
            <?php } ?>
            <?php if ( comments_open() ) { ?>
              <span class="icon-comment"><?php comments_popup_link( __( 'Ei kommentteja', THEME_TEXTDOMAIN ), __( '1 kommentti', THEME_TEXTDOMAIN ), __( '% kommenttia', THEME_TEXTDOMAIN ), '', __( 'Kommentointi ei sallittu', THEME_TEXTDOMAIN ) ); ?></span>
            <?php } ?>
          </div><!-- .entry-meta -->
          <header class="entry-header main-content-data">
            <h2 class="entry-title">
              <?php the_title(); ?>
            </h2><!-- .entry-title -->
          </header>
          <div class="entry-content main-content-data">
            <?php do_action( 'add_social_media_buttons' ); ?>
            <?php the_content();
            if( is_single() ) {
              $tag_list = get_the_tag_list( '', __( ', ', THEME_TEXTDOMAIN ) );
              if( !empty( $tag_list ) ) { ?>
                <div class="icon-tags">
                  <?php echo $tag_list; ?>
                </div>
              <?php }
            }
            wp_link_pages( array(
            'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Sivut:', THEME_TEXTDOMAIN ),
            'after'             => '</div>',
            'link_before'       => '<span>',
            'link_after'        => '</span>',
            'pagelink'          => '%',
            'echo'              => 1
               ) ); ?>
          </div>
          <?php
            comments_template();
          ?>
        </article>
      </section>
    <?php
    }
  }
  else { ?>
    <h1 class="entry-title"><?php _e( 'Mitään ei löytynyt.', THEME_TEXTDOMAIN ); ?></h1>
  <?php }
} /* End of loop_for_single */
?>
<?php
/* ------------------------------------------------------------------------ */

/*
 * Function to show the archive loop content.
 */

add_action('loop_for_archive', 'loop_for_archive', 10);

function loop_for_archive() {
  global $post;
  if( have_posts() ) {
    while( have_posts() ) {
      the_post(); ?>
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
          <header class="entry-header main-content-data">
            <h2 class="entry-title">
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
            </h2><!-- .entry-title -->
          </header>
          <div class="entry-content main-content-data">
            <?php the_excerpt(); ?>
          </div>
          <div class="entry-meta-bar clearfix">
            <div class="entry-meta main-content-data">
              <span class="icon-user"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
              <span class="icon-clock"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_time() ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
              <?php if( has_category() ) { ?>
                <span class="icon-tag"><?php the_category( ', ' ); ?></span>
              <?php } ?>
              <?php if ( comments_open() ) { ?>
                <span class="icon-comment"><?php comments_popup_link( __( 'Ei kommentteja', THEME_TEXTDOMAIN ), __( '1 kommentti', THEME_TEXTDOMAIN ), __( '% kommenttia', THEME_TEXTDOMAIN ), '', __( 'Kommentointi ei sallittu', THEME_TEXTDOMAIN ) ); ?></span>
              <?php } ?>
            </div><!-- .entry-meta -->
            <div class="main-content-data">
              <a class="btn" href="<?php the_permalink();?>" title="<?php the_title( '', '', false );?>"><?php _e( 'Jatka lukemista', THEME_TEXTDOMAIN );?></a>
            </div>
          </div>
        </article>
      </section>
      <?php
    }
  }
  else { ?>
    <h1 class="entry-title"><?php _e( 'Mitään ei löytynyt.', THEME_TEXTDOMAIN ); ?></h1>
  <?php
  }
}
?>
<?php
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
add_action('site_comment', 'site_comment', 10);

function site_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
    // Display trackbacks differently than normal comments.
  ?>
  <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <p><?php _e( 'Pingback:', THEME_TEXTDOMAIN ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '( Muokkaa )', THEME_TEXTDOMAIN ), '<span class="edit-link">', '</span>' ); ?></p>
  <?php
      break;
    default :
    // Proceed with normal comments.
    global $post;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment">
      <header class="comment-meta comment-author vcard">
        <?php
          echo get_avatar( $comment, 44 );
          printf( '<cite class="fn">%1$s %2$s</cite>',
            // If current post author is also comment author, make it known visually.
            ( $comment->user_id === $post->post_author ) ? '<span class="writer"> ' . __( 'Kirjoittaja:', THEME_TEXTDOMAIN ) . '</span>' : '',
            get_comment_author_link()
          );
          printf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
            esc_url( get_comment_link( $comment->comment_ID ) ),
            get_comment_time( 'c' ),
            /* translators: 1: date, 2: time */
            sprintf( __( '%1$s – %2$s', THEME_TEXTDOMAIN ), get_comment_date(), get_comment_time() )
          );
        ?>
      </header><!-- .comment-meta -->

      <?php if ( '0' == $comment->comment_approved ) : ?>
        <p class="comment-awaiting-moderation"><?php _e( 'Kommenttisi odottaa moderaattorin hyväksyntää.', THEME_TEXTDOMAIN ); ?></p>
      <?php endif; ?>

      <section class="comment-content comment">
        <?php comment_text(); ?>
        <?php edit_comment_link( __( 'Muokkaa', THEME_TEXTDOMAIN ), '<p class="edit-link">', '</p>' ); ?>
      </section><!-- .comment-content -->

      <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Vastaa', THEME_TEXTDOMAIN ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      </div><!-- .reply -->
    </article><!-- #comment-## -->
  <?php
    break;
  endswitch; // end comment_type check
}
?>