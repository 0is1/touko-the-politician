<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Rss Feed Fetcher Options Template
 *
 *
 * @file           admin/theme-rss-feed-fetcher-options.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        0.9.2
 * @filesource     wp-content/themes/touko-the-politician/admin/theme-rss-feed-fetcher-options.php
 * @since          available since 0.9.2
 */
?>

<?php

global $touko_the_politician_theme_options_settings;
$options = $touko_the_politician_theme_options_settings;
// echo "<pre>";
// print_r( get_option( 'touko_theme_rss_feed_fetcher_options' ) );
// echo "</pre>";
?>
<h2><?php _e( 'Rss post feed options', THEME_TEXTDOMAIN );?></h2>
<div class="pure-control-group wrap">
  <label for="touko_theme_rss_feed_fetcher_options[rss_feed_quantity]"><?php _e( 'Number of RSS feeds', THEME_TEXTDOMAIN ); ?></label>
  <input type="number" name="touko_theme_rss_feed_fetcher_options[rss_feed_quantity]" value="<?php echo intval( $options[ 'rss_feed_quantity' ] ); ?>" size="2" />
</div>

<?php for ( $i = 1; $i <= $options[ 'rss_feed_quantity' ]; $i++ ): ?>
<div class="pure-control-group wrap">
  <label for="touko_theme_rss_feed_fetcher_options[rss_feed_quantity]"><?php _e( 'Feed url #', THEME_TEXTDOMAIN ); ?>
    <span class="count"><?php echo absint( $i ); ?></span>
  </label>
  <input type="url" name="touko_theme_rss_feed_fetcher_options[rss_feed_urls][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'rss_feed_urls', $options ) && array_key_exists( $i, $options[ 'rss_feed_urls' ] ) ) echo $options[ 'rss_feed_urls' ][ $i ]; ?>" />
</div>
<?php endfor; ?>

<h4><?php _e( 'Options', THEME_TEXTDOMAIN ); ?></h4>
<div class="pure-control-group wrap">
  <label for="touko_theme_rss_feed_fetcher_options[enable_rss_feed_fetch]"><?php _e( 'Enable Feed Fetching', THEME_TEXTDOMAIN ); ?></label>
  <input type="checkbox" name="touko_theme_rss_feed_fetcher_options[enable_rss_feed_fetch]" value="<?php echo $options['enable_rss_feed_fetch'];?>" <?php checked( $options['enable_rss_feed_fetch'], 1 ); ?> />
</div>
