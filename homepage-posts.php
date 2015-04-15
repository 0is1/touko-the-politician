<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Homepage Posts Template
 *
 *
 * @file           homepage-posts.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/homepage-posts.php
 * @since          available since Release 0.9.0
 */
?>
<?php
  global $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;
?>
<?php
  $query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $theme_settings['wp_blog_visible_posts_count']) );
  if( $query->have_posts() ) :
    $i = 0; ?>
  <div class="newsfeed-logo">
    <h1><i class="icon-wordpress"></i><?php _e( 'Blogitekstit', THEME_TEXTDOMAIN ); ?></h1>
  </div>
    <?php while( $query->have_posts() ) : $query->the_post();
    ?>
      <article class="post-<?php the_ID();?> grid-50-with-gap">
        <a href="<?php echo get_permalink(); ?>" title="<?php the_title() ?>">
          <h1><?php the_title() ?></h1>
          <div class='post-content'>
            <figure class="newsfeed-icon wordpress-logo">
              <i class="icon-wordpress"></i>
            </figure>
            <?php the_excerpt(); ?>
          </div>
        </a>
      </article>
      <?php
        // add clearfix after every two post's
        if ($i % 2 === 1 && $theme_settings['wp_blog_visible_posts_count'] > 2) { ?>
          <hr class="clearfix">
        <?php }
      $i++;
      ?>
    <?php
    endwhile; ?>
      <?php
        if ( get_option( 'show_on_front' ) == 'page' && get_option( 'page_for_posts' ) ) : ?>
        <div class="all-blog-posts">
          <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) );?>" title="<?php __( 'Kaikki blogitekstit', THEME_TEXTDOMAIN ); ?>">
            <i class="icon-wordpress"></i>
            <?php _e( 'Kaikki blogitekstit &raquo;', THEME_TEXTDOMAIN ); ?>
          </a>
        </div>
      <?php
        endif;
      ?>
  <?php endif;
?>