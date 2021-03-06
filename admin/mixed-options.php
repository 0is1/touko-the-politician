<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Mixed Options Template
 *
 *
 * @file           admin/mixed-options.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/admin/mixed-options.php
 * @since          available since Release 0.9.0
 */
?>

<?php
  global $touko_the_politician_theme_options_settings;
  $options = $touko_the_politician_theme_options_settings;
  // echo "<pre>";
  // print_r( get_option( 'touko_theme_other_options' ) );
  // echo "</pre>";
?>
<div class="mixed-options">
  <h2><?php _e( 'Muut asetukset', THEME_TEXTDOMAIN );?></h2>
  <div class="pure-control-group wrap">
    <label for="touko_theme_other_options[enable_google_analytics]"><?php _e( 'Lisää Google Analytics?', THEME_TEXTDOMAIN );?></label>
    <input type="checkbox" name="touko_theme_other_options[enable_google_analytics]" value="<?php echo $options['enable_google_analytics'];?>" <?php checked( $options['enable_google_analytics'], 1 ); ?>  />
  </div>
  <div class="pure-control-group wrap mixed">
    <label for="touko_theme_other_options[google_analytics_id]"><?php _e( 'Google Analytics ID', THEME_TEXTDOMAIN );?></label>
    <input type="text" name="touko_theme_other_options[google_analytics_id]" value="<?php echo $options['google_analytics_id'];?>"  />
  </div>
</div>
