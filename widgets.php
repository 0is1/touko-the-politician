<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Sidebar Widgets
 *
 *
 * @file           widgets.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/widgets.php
 * @since          available since Release 1.0
 */

// Register sidebars / widgets
if (function_exists('register_sidebar')) {
    register_sidebar(array(
    'name' => __('Main Area Widget'),
    'id'   => 'main-area-widget',
    'description'   => __('Main Area Widget for Touko The Politician theme'),
    'before_widget' => '<div class="main-area-widget pure-u-1">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
   ));
  }
  if (function_exists('register_sidebar')) {
    register_sidebar(array(
    'name' => __('Footer Widget'),
    'id'   => 'footer-widget',
    'description'   => __('Footer Widget for Touko The Politician theme'),
    'before_widget' => '<div class="footer-widget pure-u-1-2">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
   ));
  }
  if (function_exists('register_sidebar')) {
    register_sidebar(array(
    'name' => __('Footer Widget 2'),
    'id'   => 'footer-widget-2',
    'description'   => __('Footer Widget 2 for Touko The Politician theme'),
    'before_widget' => '<div class="footer-widget-2 pure-u-1-2">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
   ));
  }
?>