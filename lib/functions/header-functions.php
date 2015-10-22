<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Header Functions
 *
 *
 * @file           header-functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/functions/header-functions.php
 * @since          available since Release 0.9.0
 */
?>
<?php

function remove_parent_widgets(){
  // Unregister Travelify sidebars and widgets
  unregister_sidebar( 'travelify_left_sidebar' );
  unregister_sidebar( 'travelify_right_sidebar' );
  unregister_sidebar( 'travelify_footer_widget' );
}
add_action( 'widgets_init', 'remove_parent_widgets', 11 );

function dequeue_script_parent_theme_scripts() {
   // Remove Travelify scripts and styles
   wp_dequeue_script( 'theme_functions' );
   wp_dequeue_script( 'travelify_slider' );
   wp_dequeue_style( 'google_font_ubuntu' );
}

add_action( 'wp_enqueue_scripts', 'dequeue_script_parent_theme_scripts', 9999 );

function remove_parent_meta_boxes(){
  // Remove Travelify admin metaboxes
  remove_meta_box( 'siderbar-layout', 'page', 'advanced' );
  remove_meta_box( 'siderbar-layout', 'post', 'advanced' );
}
add_action( 'add_meta_boxes', 'remove_parent_meta_boxes', 9999 );

function register_custom_menus() {
  register_nav_menus(
    array(
      'basic-menu' => __( 'Päävalikko', THEME_TEXTDOMAIN ),
    )
  );
}

add_action( 'init', 'register_custom_menus' );

/**
* Browser specific queuing i.e
*/
$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
if( preg_match('/(?i)msie [1-8]/',$user_agent) ) {
  wp_enqueue_script( 'html5', get_stylesheet_directory_uri() . '/js/html5.js', true );
}

/****************************************************************************************/

/**
* Add FB Open Graph tags
*/

add_action( 'wp_head', 'add_fb_open_graph_tags', 1);

function add_fb_open_graph_tags() {

  global $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;
  if ( is_singular() ) :
    global $post;
    if( get_the_post_thumbnail($post->ID, 'thumbnail') ) {
      $thumbnail_id = get_post_thumbnail_id( $post->ID );
      $thumbnail_object = get_post( $thumbnail_id );
      $image = $thumbnail_object->guid;
    } else {
      $image = get_stylesheet_directory_uri() . '/images/touko-aalto-slider.png'; // Default image
    }

    $description = fb_og_excerpt( $post->post_content, $post->post_excerpt );
    $description = strip_tags( $description );
    $description = str_replace( "\"", "'", $description );

  ?>
    <meta property="fb:app_id" content="<?php echo $theme_settings['facebook_app_id']; ?>"/>
    <meta property="og:title" content="<?php echo get_bloginfo( 'name' ); ?> | <?php echo get_the_title( $post );?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo $image; ?>" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:description" content="<?php echo $description ?>" />

<?php
  endif;
}

function fb_og_excerpt( $text, $excerpt ){

  if ( empty($text) && empty($excerpt) ) return get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );

  if ( $excerpt ) return $excerpt;

  $text = strip_shortcodes( $text );

  $text = apply_filters( 'the_content', $text );
  $text = str_replace( ']]>', ']]&gt;', $text );
  $text = strip_tags( $text );
  $excerpt_length = apply_filters( 'excerpt_length', 55 );
  $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[...]' );
  $words = preg_split( '/[\n
 ]+/', $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
  if ( count($words) > $excerpt_length ) {
    array_pop($words);
    $text = implode(' ', $words);
    $text = $text . $excerpt_more;
  } else {
    $text = implode(' ', $words);
  }

  return apply_filters('wp_trim_excerpt', $text, $excerpt);
}

// Load scripts
add_action( 'wp_enqueue_scripts', 'add_scripts' );

// Add scripts
function add_scripts() {
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.min.js', array( 'jquery', 'jquery_cycle' ), THEME_VERSION, true );
}

// Load Favicon in Header Section
add_action( 'wp_head', 'blog_favicon' );

// add a favicon
function blog_favicon() { ?>
  <link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />
<?php
}

// Load css
add_action('wp_head', 'add_css', 4);

// Add css
function add_css(){
  wp_register_style( 'font', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600', array(), '1.0.0', false );
  wp_enqueue_style( 'font' );
  wp_register_style( 'touko_icons_style', get_stylesheet_directory_uri() . '/fonts/fontello/css/touko-icons.css', array(), THEME_VERSION, false );
  wp_enqueue_style( 'touko_icons_style' );
  wp_register_style( 'touko_pure_grids_style', get_stylesheet_directory_uri() . '/lib/vendor/styles/pure-grids-min.css', array(), '0.3.0', false );
  wp_enqueue_style( 'touko_pure_grids_style' );
  // wp_enqueue_style( THEME_TEXTDOMAIN, get_stylesheet_directory_uri() . '/style.css', array(), THEME_VERSION, false );
}

// Load Favicon in Admin Section
add_action( 'admin_head', 'admin_blog_favicon' );

// add a favicon
function admin_blog_favicon() {
  echo '<link rel="shortcut icon" type="image/png" href="' . get_stylesheet_directory_uri() . '/images/favicon-admin.png" />';
}

// Load styles in Admin Section
add_action( 'admin_enqueue_scripts', 'add_admin_styles' );

function add_admin_styles() {
  wp_enqueue_style( 'pure_grid_style', 'http://yui.yahooapis.com/pure/0.3.0/forms-min.css', array(), '0.3.0', false);
  wp_enqueue_style( 'touko_admin_style', get_stylesheet_directory_uri() . '/admin/admin.css', array(), THEME_VERSION, false);
}

/****************************************************************************************/

add_action( 'add_social_media_icons', 'add_social_media_icons', 10 );

function add_social_media_icons(){
  global $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;

  $elements = array(
    'facebook_page_url' => $theme_settings['facebook_page_url'],
    'twitter_page_url' => $theme_settings['twitter_page_url'],
    'rss_page_url' => $theme_settings['rss_page_url'],
    'donate_url' => $theme_settings['donate_url']
  );
  $social_links = array(
    'icon-facebook-rect'  => 'facebook_page_url',
    'icon-twitter-bird' => 'twitter_page_url',
    'icon-rss'  => 'rss_page_url',
    'icon-euro' => 'donate_url'
  );
  if (!$social_media_icons = get_transient( 'social_media_icons') ){
    $social_media_icons = "<ul class='social-media-icons'>";
    foreach($social_links as $key => $value){
      $title_parts = explode( "-", $key );
      if ( !empty( $elements[$value]) ) {
        // HACK HACK HACK
        if($title_parts[1] == 'euro'){
          $social_media_icons .=
          '<li><a class="'.strtolower( $key).'" href="'.esc_url($elements[$value] ).'" title="'.__( "Lahjoita Toukon vaalikampanjaan", THEME_TEXTDOMAIN ).'" target="_blank"></a></li>';
        }
        else{
          $social_media_icons .=
          '<li><a class="'.strtolower( $key).'" href="'.esc_url($elements[$value] ).'" title="'.sprintf( esc_attr__( '%1$s @ %2$s', THEME_TEXTDOMAIN ), get_bloginfo( 'name' ), ucfirst( $title_parts[1] ) ).'" target="_blank"></a></li>';
        }
      }
    }
    $social_media_icons .= "</ul>";
    set_transient('social_media_icons', $social_media_icons, 86940);
  }
  echo $social_media_icons;
}
if ( !function_exists('pass_cycle_parameters') ) :
/**
 * Function to pass the slider effect parameters from php file to js file.
 */
function pass_cycle_parameters() {
  if ( is_home() || is_front_page()) {
    // wp_localize_script(
    //   'main',
    //   'slider_values',
    //   /* parameters hard coded at the moment */
    //   array(
    //     'transition_effect' => 'scrollLeft',
    //     'transition_delay' => '9999999999',
    //     'transition_duration' => '500'
    //   )
    // );

  }
}
endif;

if ( !function_exists('featured_post_slider') ) :
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

  if( ( !$featured_post_slider = get_transient('featured_post_slider' ) ) && !empty( $options[ 'featured_post_slider' ] ) ) {
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

              $featured_post_slider .= '<figure>';

              $featured_post_slider .= get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'  => 'pngfix clearfix' ) ).'</figure>';
            }
            if( $title_attribute != '' || $excerpt !='' ) {
            $featured_post_slider .= '
              <article class="featured-text">';
              if( $title_attribute !='' ) {
                  $featured_post_slider .= '<div class="featured-title"><a href="' . get_permalink() . '" title="'. the_title( '','',false) .'">'. get_the_title() . '</a></div><!-- .featured-title -->';
              }
              if( $excerpt != '' ) {
                $featured_post_slider .= '<div class="featured-content"><a href="' . get_permalink() . '" title="'. the_title( '','',false ) .'">'.$excerpt.'</a>';
                $featured_post_slider .= '<div class="read-more">';
                $featured_post_slider .= '<a href="'. get_permalink() . '" title="'. the_title( '', '', false ) .'">' . __( 'Lue lisää &rarr;', THEME_TEXTDOMAIN ) .'</a>';
                $featured_post_slider .= '</div>';
                $featured_post_slider .= '</div><!-- .featured-content -->';
              }
            $featured_post_slider .= '</article><!-- .featured-text -->';
            }
        $featured_post_slider .= '
        </div><!-- .slides -->';
      endwhile; wp_reset_query();
    $featured_post_slider .= '</div>
    <nav id="controllers" class="clearfix">
    </nav><!-- #controllers --></section><!-- .featured-slider -->';

    set_transient( 'featured_post_slider', $featured_post_slider, 86940);
  }
  echo $featured_post_slider;
}
endif;
?>