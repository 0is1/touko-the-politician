<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Footer Content Functions
 *
 *
 * @file           footer-content-functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/footer-content-functions.php
 * @since          available since Release 1.0
 */
?>
<?php
  function add_footer_content(){
  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget') ) : ?>
  <?php endif; ?>
<?php
  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-2') ) : ?>
  <?php endif; ?>

    <div class="logos pure-u-1">
      <a href="http://www.vihreat.fi" title="Vihreät De Gröna">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/vihreat-logo.png" alt="Vihreät De Gröna">
      </a>
    </div>
    <div class="site-generator pure-u-1">
      <span class="copyright">Copyright © <?php echo date('Y'); ?>
        <a href="<?php echo site_url();?>" title="<?php echo get_bloginfo('name');?>"><span><?php echo get_bloginfo('name');?></span></a>
      </span><!-- .copy -->
      <span class="credits"><?php _e('Kiitos:', 'touko');?> <a href="<?php echo esc_url( __('http://colorawesomeness.com/themes/travelify/'));?>" target="_blank" title="Color Awesomeness">Color Awesomeness</a> ja <a href="<?php echo esc_url( __('http://wordpress.org/')); ?>" target="_blank" title="WordPress">WordPress</a>
      </span>
    </div>
    <div class="pure-u-1 site-created">
      <span class="created"><?php _e('Toteutus: ', 'touko');?><a href="<?php echo esc_url( __('http://lookit.fi/'));?>" title="Lookit Designs">Janne/Lookit Designs</a>
      </span>
      <span class="source">
        <i class="icon-github"></i>
        <a href="<?php echo esc_url(__('https://github.com/0is1/touko-the-politician'));?>" title="<?php _e('Lähdekoodit', 'touko');?>"><?php _e('Lähdekoodi ', 'touko');?></a>
      </span>
    </div>
  <?php
  }
?>