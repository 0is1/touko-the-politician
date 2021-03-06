<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Default Page Template
 *
 *
 * @file           content-default.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/content-default.php
 * @since          available since Release 0.9.0
 */
?>

<?php
 /* Add opening div */
 do_action( 'before_loop' );

 /* Loop stuff */
 do_action( 'loop_content' );

 /* Close opening div */
 do_action( 'after_loop' );
?>