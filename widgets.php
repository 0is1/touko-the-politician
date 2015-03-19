<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Sidebar Widgets
 *
 *
 * @file           widgets.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/widgets.php
 * @since          available since Release 0.9.0
 */

// Register sidebars / widgets
if ( function_exists( 'register_sidebar') ) {
  register_sidebar(array(
    'name' => __( 'Main Area Widget for Google Calendar', THEME_TEXTDOMAIN ),
    'id'   => 'main-area-widget',
    'description'   => __( 'Main Area Widget for Touko The Politician theme ( Google Calendar )', THEME_TEXTDOMAIN ),
    'before_widget' => '<div class="main-area-widget google-calendar pure-u-1">',
    'after_widget'  => '</div>',
    'before_title'  => '<h1><i class="icon-calendar"></i>',
    'after_title'   => '</h1>'
  ));
}
if ( function_exists( 'register_sidebar') ) {
  register_sidebar(array(
    'name' => __( 'Main Area Highlight Area', THEME_TEXTDOMAIN ),
    'id'   => 'main-area-highlight-widget',
    'description'   => __( 'Main Area Highlight Widget for Touko The Politician theme', THEME_TEXTDOMAIN ),
    'before_widget' => '<div class="widget main-area-highlight-widget pure-u-1">',
    'after_widget'  => '</div>',
    'before_title'  => '<h1>',
    'after_title'   => '</h1>'
  ));
}
if ( function_exists( 'register_sidebar') ) {
  register_sidebar(array(
    'name' => __( 'Footer Widget', THEME_TEXTDOMAIN ),
    'id'   => 'footer-widget',
    'description'   => __( 'Footer Widget for Touko The Politician theme', THEME_TEXTDOMAIN ),
    'before_widget' => '<div class="footer-widget pure-u-1-2">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
 ));
}
if ( function_exists( 'register_sidebar') ) {
  register_sidebar(array(
    'name' => __( 'Footer Widget 2', THEME_TEXTDOMAIN ),
    'id'   => 'footer-widget-2',
    'description'   => __( 'Footer Widget 2 for Touko The Politician theme', THEME_TEXTDOMAIN ),
    'before_widget' => '<div class="footer-widget-2 pure-u-1-2">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
 ));
}
?>