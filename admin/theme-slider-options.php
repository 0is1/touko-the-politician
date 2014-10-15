<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Slider Options Template
 *
 *
 * @file           admin/theme-slider-options.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        1.0
 * @filesource     wp-content/themes/touko-the-politician/admin/theme-slider-options.php
 * @since          available since 1.0
 */
?>

<?php

global $touko_the_politician_theme_options_settings;
$options = $touko_the_politician_theme_options_settings;
// echo "<pre>";
// print_r( get_option( 'touko_theme_slider_options' ) );
// echo "</pre>";
?>
<h2><?php _e( 'Slider options', THEME_TEXTDOMAIN );?></h2>
<div class="pure-control-group wrap">
  <label for="touko_theme_slider_options[slider_quantity]"><?php _e( 'Number of Slides', THEME_TEXTDOMAIN ); ?></label>
  <input type="number" name="touko_theme_slider_options[slider_quantity]" value="<?php echo intval( $options[ 'slider_quantity' ] ); ?>" size="2" />
</div>

<?php for ( $i = 1; $i <= $options[ 'slider_quantity' ]; $i++ ): ?>
<div class="pure-control-group wrap">
  <label for="touko_theme_slider_options[slider_quantity]"><?php _e( 'Featured Slide #', THEME_TEXTDOMAIN ); ?><span class="count"><?php echo absint( $i ); ?></span></label>
  <input type="number" name="touko_theme_slider_options[featured_post_slider][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_post_slider', $options ) && array_key_exists( $i, $options[ 'featured_post_slider' ] ) ) echo absint( $options[ 'featured_post_slider' ][ $i ] ); ?>" />
</div>
<?php endfor; ?>

<h4><?php _e( 'Slider Behaviour Options', THEME_TEXTDOMAIN ); ?></h4>
<div class="pure-control-group wrap">
  <label for="touko_theme_slider_options[disable_slider]"><?php _e( 'Disable Slider', THEME_TEXTDOMAIN ); ?></label>
  <input type="checkbox" name="touko_theme_slider_options[disable_slider]" value="<?php echo $options['disable_slider'];?>" <?php checked( $options['disable_slider'], 1 ); ?> />
</div>
<div class="pure-control-group wrap">
  <label for="touko_theme_slider_options[transition_effect]"><?php _e( 'Transition Effect:', THEME_TEXTDOMAIN ); ?></label>
  <select name="touko_theme_slider_options[transition_effect]">
  <?php
    $transition_effects = array();
    $transition_effects = array(
      'fade',
      'wipe',
      'scrollUp',
      'scrollDown',
      'scrollLeft',
      'scrollRight',
      'blindX',
      'blindY',
      'blindZ',
      'cover',
      'shuffle'
    );
    foreach( $transition_effects as $effect ) {
      ?>
      <option value="<?php echo $effect; ?>" <?php selected( $effect, $options['transition_effect']); ?>><?php printf( __( '%s', THEME_TEXTDOMAIN ), $effect ); ?></option>
      <?php
    }
    ?>
  </select>
</div>

<div class="pure-control-group wrap">
  <label for="touko_theme_slider_options[transition_delay]"><?php _e( 'Transition Delay', THEME_TEXTDOMAIN ); ?></label>
  <input type="text" name="touko_theme_slider_options[transition_delay]" value="<?php echo $options[ 'transition_delay' ]; ?>" size="2" />
  <span class="description"><?php _e( 'second(s)', THEME_TEXTDOMAIN ); ?></span>
</div>

<div class="pure-control-group wrap">
  <label for="touko_theme_slider_options[transition_duration]"><?php _e( 'Transition Length', THEME_TEXTDOMAIN ); ?></label>
  <input type="text" name="touko_theme_slider_options[transition_duration]" value="<?php echo $options[ 'transition_duration' ]; ?>" size="2" />
  <span class="description"><?php _e( 'second(s)', THEME_TEXTDOMAIN ); ?></span>
</div>