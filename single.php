<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Single Page Template
 *
 *
 * @file           single.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/single.php
 * @since          available since Release 1.0
 */
?>

<?php get_header(); ?>

<?php
 /* Add opening div */
 do_action( 'before_loop' );

 /* Loop stuff */
 do_action( 'add_page_content' );

 /* Close opening div */
 do_action( 'after_loop' );
?>

<?php get_footer(); ?>