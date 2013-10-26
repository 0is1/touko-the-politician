<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * 404 Page Template
 *
 *
 * @file           404.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/404.php
 * @since          available since Release 1.0
 */
?>

<?php get_header(); ?>

<div id="content">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Ohhoh - Etsimääsi sivua ei löytynyt...', 'touko' ); ?></a></h1>
		</header>
		<div class="entry-content clearfix" >
			<h3><?php _e( 'Tämä voi johtua siitä, että:', 'touko' ); ?></h3>
			<ul>
				<li><?php _e( 'Näppäilit web-sivun osoitteen väärin', 'touko' ); ?></li>
				<li><?php _e( 'Sivu, jota etsit saattaa olla muuttanut nimeä tai se on poistettu', 'touko' ); ?></li>
			</ul>
			<h3><?php _e( 'Voit yrittää seuraavia toimenpiteitä:', 'touko' ); ?></h3>
			<ul>
				<li><?php _e( 'Tarkista web-sivun osoitteen oikeinkirjoitus', 'touko' ); ?></li>
				<li><?php _e( 'Päivitä sivu (selaimen "päivitä-sivu"-nappi)', 'touko' ); ?></li>
				<li><?php _e( 'Palaa takaisin', 'touko' ); ?> <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php _e( 'Etusivulle', 'touko' ); ?></a></li>
				<li><?php _e( 'Tai käytä hakua', 'touko' );?><span class="focus-search-arrow">&darr;</span></li>
			</ul>
		</div><!-- .entry-content -->
	</div><!-- #content -->

<?php get_footer(); ?>