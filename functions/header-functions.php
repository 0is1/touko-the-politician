<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Header Functions
 *
 *
 * @file           header-functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/functions/header-functions.php
 * @since          available since Release 1.0
 */
?>
<?php
 /**
  * Browser specific queuing i.e
  */
$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
if(preg_match('/(?i)msie [1-8]/',$user_agent)) {
  wp_enqueue_script( 'html5', get_stylesheet_directory_uri() . '/js/html5.js', true );
}

/****************************************************************************************/
// Load scripts
add_action( 'wp_enqueue_scripts', 'add_scripts' );
// Add scripts
function add_scripts() {
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.min.js', array(), '0.1.0', true );
}
// Load Favicon in Header Section
add_action('wp_head', 'blog_favicon');
// add a favicon
function blog_favicon() {
  echo '<link rel="shortcut icon" type="image/png" href="' . get_stylesheet_directory_uri() . '/images/favicon.png" />';
}
// Load css
add_action('wp_head', 'add_css', 5);
// Add css
function add_css(){
  wp_enqueue_style( 'touko_icons_style', get_stylesheet_directory_uri() . '/fonts/fontello/css/social-media-icons.css', array(), '1.0.0', false);
  wp_enqueue_style( 'touko_pure_grids_style', 'http://yui.yahooapis.com/pure/0.3.0/grids-min.css', array(), '1.0.0', false);
}

// Load Favicon in Admin Section
add_action('admin_head', 'admin_blog_favicon');
// add a favicon
function admin_blog_favicon() {
  echo '<link rel="shortcut icon" type="image/png" href="' . get_stylesheet_directory_uri() . '/images/favicon-admin.png" />';
}
// Load styles in Admin Section
add_action( 'admin_enqueue_scripts', 'add_admin_styles' );
function add_admin_styles() {
  wp_enqueue_style( 'pure_grid_style', 'http://yui.yahooapis.com/pure/0.3.0/forms-min.css');
  wp_enqueue_style( 'touko_admin_style', get_stylesheet_directory_uri() . '/admin/admin.css');
}


/****************************************************************************************/

add_action('add_social_media_icons', 'add_social_media_icons', 10);
function add_social_media_icons(){
  global $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;
  $elements = array(
    'facebook_page_url' => $theme_settings['facebook_page_url'],
    'twitter_page_url' => $theme_settings['twitter_page_url'],
    'rss_page_url' => $theme_settings['rss_page_url']
  );
  $social_links = array(
    'icon-facebook-rect'    => 'facebook_page_url',
    'icon-twitter-bird'     => 'twitter_page_url',
    'icon-rss'     => 'rss_page_url'
  );
  if (!$social_media_icons = get_transient('social_media_icons')){
    $social_media_icons = "<ul class='social-media-icons'>";
    foreach($social_links as $key => $value){
      $title_parts = explode("-", $key);
      if (!empty( $elements[$value])) {
        $social_media_icons .=
        '<li><a class="'.strtolower($key).'" href="'.esc_url($elements[$value]).'" title="'.sprintf( esc_attr__( '%1$s @ %2$s', 'touko' ), get_bloginfo( 'name' ), ucfirst($title_parts[1]) ).'" target="_blank"></a></li>';
      }
    }
    $social_media_icons .= "</ul>";
    set_transient('social_media_icons', $social_media_icons, 86940);
  }
  echo $social_media_icons;
}
if (!function_exists('pass_cycle_parameters')) :
/**
 * Function to pass the slider effect parameters from php file to js file.
 */
function pass_cycle_parameters() {
  wp_localize_script(
    'main',
    'slider_values',
    /* parameters hard coded at the moment */
    array(
      'transition_effect' => 'scrollLeft',
      'transition_delay' => '9999999999',
      'transition_duration' => '500'
    )
  );

}
endif;

if (!function_exists('featured_post_slider')) :
/**
 * display featured post slider
 *
 * @uses set_transient and delete_transient
 */
function featured_post_slider() {
  global $post;

  global $travelify_theme_options_settings;
   $options = $travelify_theme_options_settings;

  $featured_post_slider = '';
  if( ( !$featured_post_slider = get_transient( 'featured_post_slider' ) ) && !empty( $options[ 'featured_post_slider' ] ) ) {
    $featured_post_slider .= '
    <section class="featured-slider"><div class="slider-cycle">';
      $get_featured_posts = new WP_Query( array(
        'posts_per_page'      => $options[ 'slider_quantity' ],
        'post_type'         => array( 'post', 'page' ),
        'post__in'          => $options[ 'featured_post_slider' ],
        'orderby'           => 'post__in',
        'ignore_sticky_posts'   => 1            // ignore sticky posts
      ));
      $i=0; while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
        $title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
        $excerpt = get_the_excerpt();
        if ( 1 == $i ) { $classes = "slides displayblock"; } else { $classes = "slides displaynone"; }
        $featured_post_slider .= '
        <div class="'.$classes.'">';
            if( has_post_thumbnail() ) {

              $featured_post_slider .= '<figure><a href="' . get_permalink() . '" title="'.the_title('','',false).'">';

              $featured_post_slider .= get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'  => 'pngfix' ) ).'</a></figure>';
            }
            if( $title_attribute != '' || $excerpt !='' ) {
            $featured_post_slider .= '
              <article class="featured-text">';
              if( $title_attribute !='' ) {
                  $featured_post_slider .= '<div class="featured-title"><a href="' . get_permalink() . '" title="'.the_title('','',false).'">'. get_the_title() . '</a></div><!-- .featured-title -->';
              }
              if( $excerpt !='' ) {
                $featured_post_slider .= '<div class="featured-content">'.$excerpt.'</div><!-- .featured-content -->';
              }
            $featured_post_slider .= '
              </article><!-- .featured-text -->';
            }
        $featured_post_slider .= '
        </div><!-- .slides -->';
      endwhile; wp_reset_query();
    $featured_post_slider .= '</div>
    <nav id="controllers" class="clearfix">
    </nav><!-- #controllers --></section><!-- .featured-slider -->';

  set_transient('featured_post_slider', $featured_post_slider, 86940);
  }
  echo $featured_post_slider;
}
endif;
?>