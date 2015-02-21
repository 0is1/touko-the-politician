<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Footer Content Functions
 *
 *
 * @file           footer-content-functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/footer-content-functions.php
 * @since          available since Release 0.9.0
 */
?>
<?php
  add_filter('add_google_analytics', 'add_google_analytics', 10, 1);

  function add_google_analytics( $id ){
    echo "<script>
          var _gaq=[['_setAccount','".$id."'],['_trackPageview']];
          ( function( d,t){var g=d.createElement(t ),s=d.getElementsByTagName(t )[0];
          g.src=( 'https:'==location.protocol?'//ssl':'//www' )+'.google-analytics.com/ga.js';
          s.parentNode.insertBefore( g,s)}(document,'script') );
        </script>";
  }

  add_action( 'add_footer_content', 'add_footer_content' );

  function add_footer_content(){
    if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'footer-widget' ) ) : ?>
    <?php endif; ?>
    <?php
    if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'footer-widget-2' ) ) : ?>
    <?php endif; ?>

    <div class="logos pure-u-1">
      <div class="aalto-logo">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/aalto2015.png" alt="Aalto 2015" title="Aalto 2015">
      </div>
      <div class="party-logo">
        <a href="http://www.vihreat.fi" title="Vihreät De Gröna">
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/vihreat-logo.png" alt="Vihreät De Gröna" title="Vihreät De Gröna">
        </a>
      </div>
    </div>
    <div class="site-generator pure-u-1">
      <span class="copyright">Copyright © <?php echo date( 'Y' ); ?>
        <a href="<?php echo home_url();?>" title="<?php echo get_bloginfo( 'name' );?>"><span><?php echo get_bloginfo( 'name' );?></span></a>
      </span><!-- .copy -->
      <span class="credits"><?php _e( 'Kiitos:', THEME_TEXTDOMAIN );?> <a href="<?php echo esc_url( 'http://colorawesomeness.com/themes/travelify/' );?>" target="_blank" title="Color Awesomeness">Color Awesomeness</a> ja <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" target="_blank" title="WordPress">WordPress</a>
      </span>
    </div>
    <div class="pure-u-1 site-created">
      <span class="created"><?php _e('Toteutus: ', THEME_TEXTDOMAIN);?><a href="<?php echo esc_url( 'http://jannejuhani.me' );?>" title="jannejuhani.me">jannejuhani</a>
      </span>
      <span class="source">
        <i class="icon-github"></i>
        <a href="<?php echo esc_url( 'https://github.com/0is1/touko-the-politician' );?>" title="<?php _e( 'Lähdekoodit', THEME_TEXTDOMAIN );?>"><?php _e('Lähdekoodi ', THEME_TEXTDOMAIN);?></a>
      </span>
    </div>
  <?php
  }
?>