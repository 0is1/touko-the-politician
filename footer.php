<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/footer.php
 * @since          available since Release 1.0
 */
?>
<?php
  global $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;
?>
   </div><!-- #main -->

   <footer class="main-footer clearfix pure-g-r" role="contentinfo">
   <?php
 	  	do_action('add_footer_content');
	   ?>
	</footer>

</div><!-- .wrapper -->

<?php wp_footer(); ?>
<?php do_action('add_like_button_script');?>
<?php if($theme_settings['enable_google_analytics']) apply_filters('add_google_analytics', $theme_settings['google_analytics_id']); ?>
</body>
</html>