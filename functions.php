<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Functions
 *
 *
 * @file           functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/functions.php
 * @since          available since Release 1.0
 */

/**
* Load external files
*/
require(get_stylesheet_directory() . '/functions/header-functions.php');
require(get_stylesheet_directory() . '/functions/content-loop-functions.php');
require(get_stylesheet_directory() . '/functions/main-content-functions.php');
require(get_stylesheet_directory() . '/functions/social-media-content-functions.php');
require(get_stylesheet_directory() . '/widgets.php' );
require(get_stylesheet_directory() . '/functions/footer-content-functions.php');
/**
* Load Admin Panel scripts
*/
require(get_stylesheet_directory() . '/admin/themeoptions-defaults.php');
require(get_stylesheet_directory() . '/admin/themeoptions.php');
/**
* Load Facebook scripts
*/
require_once(get_stylesheet_directory() . '/facebook/get-facebook-page-details.php');
require_once(get_stylesheet_directory() . '/facebook/get-facebook-posts.php' );
require_once(get_stylesheet_directory() . '/facebook/get-facebook-photos.php');

/**
* Load Twitter scripts
*/
require_once(get_stylesheet_directory() . '/twitter/get-tweets.php');

/**
* Load Instagram scripts
*/
require_once(get_stylesheet_directory() . '/instagram/get-instagram-media.php');



// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// function add_stylesheet(){
//   wp_enqueue_style( 'touko_style', get_stylesheet_uri() );
// }

?>