<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Theme Functions
 *
 *
 * @file           functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/functions.php
 * @since          available since Release 0.9.0
 */

/**
* Define constants
*/
define( 'THEME_TEXTDOMAIN', 'touko' );
define( 'THEME_VERSION', '0.9.1' );
define( 'RSS_POST_NAME', 'rss_post' );
define( 'RSS_CATEGORY_SLUG' , 'rss_post_category' );
define( 'TEMP_IMAGE_FOLDER', 'temp_images' );
/**
* Load external files
*/
require_once( get_stylesheet_directory() . '/lib/rss_post_type.php');
require_once( get_stylesheet_directory() . '/lib/rss_posts_handler.php');
require_once( get_stylesheet_directory() . '/lib/functions/header-functions.php');
require_once( get_stylesheet_directory() . '/lib/helpers/save_image_from_remote_to_post.php');
require_once( get_stylesheet_directory() . '/lib/functions/content-loop-functions.php');
require_once( get_stylesheet_directory() . '/lib/functions/main-content-functions.php');
require_once( get_stylesheet_directory() . '/lib/functions/social-media-content-functions.php');
require_once( get_stylesheet_directory() . '/widgets.php' );
require_once( get_stylesheet_directory() . '/lib/functions/footer-content-functions.php');

/**
* Load Admin Panel files
*/
require_once( get_stylesheet_directory() . '/admin/themeoptions-defaults.php');
require_once( get_stylesheet_directory() . '/admin/themeoptions.php');

/**
* Load Facebook files
*/
require_once( get_stylesheet_directory() . '/lib/facebook/get-facebook-page-details.php');
require_once( get_stylesheet_directory() . '/lib/facebook/get-facebook-posts.php' );
require_once( get_stylesheet_directory() . '/lib/facebook/get-facebook-photos.php');

/**
* Load Twitter files
*/
require_once( get_stylesheet_directory() . '/lib/twitter/get-tweets.php');

/**
* Load Instagram files
*/
require_once( get_stylesheet_directory() . '/lib/instagram/get-instagram-media.php');

// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

add_action( 'after_setup_theme', 'touko_theme_setup' );

function touko_theme_setup( ){
  // Add custom image sizes
  add_image_size( 'thumbnail-wide-xs', 180, 100 );
  add_image_size( 'thumbnail-wide-sm', 350, 200 );
  add_image_size( 'thumbnail-wide-md', 600, 350 );
  add_image_size( 'thumbnail-wide-lg', 1200, 700 );

}


?>
