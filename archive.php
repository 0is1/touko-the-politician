<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Archive Page Template
 *
 *
 * @file           archive.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/archive.php
 * @since          available since Release 0.9.0
 */
?>

<?php get_header(); ?>

<?php
 /* Add opening div */
 do_action( 'before_loop' );

 /* Loop stuff */
 do_action( 'loop_content' );

 /* Close opening div */
 do_action( 'after_loop' );

 do_action( 'touko_after_loop_content' );
?>

<?php get_footer(); ?>