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
	   </div><!-- #main -->

	   <footer class="main-footer clearfix pure-g-r" role="contentinfo">
	   <?php
	 	  	do_action('add_footer_content');
		   ?>
		</footer>

	</div><!-- .wrapper -->

<?php wp_footer(); ?>
</body>
</html>