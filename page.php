<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Page Template
 *
 *
 * @file           page.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/page.php
 * @since          available since Release 1.0
 */
?>

<?php get_header(); ?>

<?php
	/**
	 * travelify_before_main_container hook
	 */
	do_action( 'travelify_before_main_container' );
?>

<div id="container">
	<?php
		do_action( 'add_page_content' );
	?>

</div><!-- #container -->

<?php
	/**
	 * travelify_after_main_container hook
	 */
	do_action( 'travelify_after_main_container' );
?>

<?php get_footer(); ?>