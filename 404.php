<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * 404 Page Template
 *
 *
 * @file           404.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/404.php
 * @since          available since Release 0.9.0
 */
?>

<?php get_header(); ?>

<div id="content">
		<header class="entry-header main-content-data">
			<h1 class="entry-title"><?php _e( 'Ohhoh - Etsimääsi sivua ei löytynyt...', THEME_TEXTDOMAIN ); ?></a></h1>
		</header>
		<div class="entry-content main-content-data" >
			<h3><?php _e( 'Tämä voi johtua siitä, että:', THEME_TEXTDOMAIN ); ?></h3>
			<ul>
				<li><?php _e( 'Näppäilit web-sivun osoitteen väärin', THEME_TEXTDOMAIN ); ?></li>
				<li><?php _e( 'Sivu, jota etsit saattaa olla muuttanut nimeä tai se on poistettu', THEME_TEXTDOMAIN ); ?></li>
			</ul>
			<h3><?php _e( 'Voit yrittää seuraavia toimenpiteitä:', THEME_TEXTDOMAIN ); ?></h3>
			<ul>
				<li><?php _e( 'Tarkista web-sivun osoitteen oikeinkirjoitus', THEME_TEXTDOMAIN ); ?></li>
				<li><?php _e( 'Päivitä sivu ( selaimen "päivitä-sivu"-nappi )', THEME_TEXTDOMAIN ); ?></li>
				<li><?php _e( 'Palaa takaisin', THEME_TEXTDOMAIN ); ?> <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php _e( 'Etusivulle', THEME_TEXTDOMAIN ); ?></a></li>
				<li><?php _e( 'Tai kokeile hakua sivun etsimiseen', THEME_TEXTDOMAIN );?><span class="focus-search-arrow">&darr;</span></li>
			</ul>
		</div><!-- .entry-content -->
	</div><!-- #content -->

<?php get_footer(); ?>