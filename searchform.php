<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Searchform Template
 *
 *
 * @file           searchform.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/searchform.php
 * @since          available since Release 1.0
 */
?>
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="searchform clearfix" method="get">
		<input type="text" placeholder="<?php esc_attr_e('Etsi'); ?>" class="search-input field" name="s">
	</form>