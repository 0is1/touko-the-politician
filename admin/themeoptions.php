<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Contains all the theme option default values
 * If no user-defined values
 * is available for any setting, these defaults will be used.
 *
 *
 * @file           themeoptions-defaults.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/admin/themeoptions-defaults.php
 * @since          available since Release 0.9.0
 */

add_action( 'admin_menu', 'touko_options_menu' );

/**
 * Create sub-menu page.
 *
 * @uses add_theme_page to add sub-menu under the Appearance top level menu.
 */
  function touko_options_menu() {
    add_menu_page(
      __( 'Touko Theme Options', THEME_TEXTDOMAIN ), // Name of page
      __( 'Touko Theme Options', THEME_TEXTDOMAIN ), // Label in menu
      'edit_theme_options',                           // Capability required
      'touko_theme_options',     // Menu slug, used to uniquely identify the page
      'do_touko_the_politician_theme_options' // Function that renders the options page
    );
  }

add_action( 'admin_init', 'touko_register_settings' );

/**
 * Register options and validation callbacks
 *
 * @uses register_setting
 */
function touko_register_settings() {

   register_setting( 'touko_theme_newsfeed_options', 'touko_theme_newsfeed_options', 'touko_theme_newsfeed_options_validate' );
   register_setting( 'touko_theme_social_media_options', 'touko_theme_social_media_options', 'touko_theme_social_media_options_validate' );
   register_setting( 'touko_theme_slider_options', 'touko_theme_slider_options', 'touko_theme_slider_options_validate' );
   register_setting( 'touko_theme_rss_feed_fetcher_options', 'touko_theme_rss_feed_fetcher_options', 'touko_theme_rss_feed_fetcher_options_validate' );
   register_setting( 'touko_theme_other_options', 'touko_theme_other_options', 'touko_theme_other_options_validate' );

}

/**
* Render Touko The Politician Theme Options page
*/
function do_touko_the_politician_theme_options(){ ?>
  <?php
    global $touko_the_politician_theme_options_settings, $touko_the_politician_theme_options_defaults;
    // echo "<p>Settings:</p><pre>";
    // print_r( $touko_the_politician_theme_options_settings );
    // echo "</pre>";
  ?>
  <div class="touko-the-politician-admin">
  <?php if( isset( $_GET [ 'settings-updated' ] ) && 'true' === $_GET[ 'settings-updated' ] ): ?>
    <div class="updated fade" id="message">
      <p><strong><?php _e( 'Asetukset tallennettu.', THEME_TEXTDOMAIN );?></strong></p>
    </div>
  <?php endif; ?>

  <?php
    $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'newsfeed_options';
  ?>

    <h1><?php _e( 'Theme options', THEME_TEXTDOMAIN );?></h1>
    <h2 class="nav-tab-wrapper">
      <a href="?page=touko_theme_options&tab=newsfeed_options" class="nav-tab <?php echo $active_tab === 'newsfeed_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Newsfeed options', THEME_TEXTDOMAIN );?></a>
      <a href="?page=touko_theme_options&tab=social_media_options" class="nav-tab <?php echo $active_tab === 'social_media_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Social media options', THEME_TEXTDOMAIN );?></a>
      <a href="?page=touko_theme_options&tab=slider_options" class="nav-tab <?php echo $active_tab === 'slider_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Slider options', THEME_TEXTDOMAIN );?></a>
      <a href="?page=touko_theme_options&tab=rss_feed_fetcher_options" class="nav-tab <?php echo $active_tab === 'rss_feed_fetcher_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Rss Post options', THEME_TEXTDOMAIN );?></a>
      <a href="?page=touko_theme_options&tab=other_options" class="nav-tab <?php echo $active_tab === 'other_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Other options', THEME_TEXTDOMAIN );?></a>
  </h2>
   <form class="touko-theme-options-form pure-form pure-form-aligned" method="post" action="options.php">
   <?php
    if( $active_tab === 'newsfeed_options' ) :
      // load newsfeed options template
      settings_fields( 'touko_theme_newsfeed_options' );
      get_template_part( 'admin/newsfeed', 'options' );
      get_template_part( 'admin/instagram', 'options' );

    elseif ( $active_tab === 'social_media_options' ) :
      // load social media options template
      settings_fields( 'touko_theme_social_media_options' );
      get_template_part( 'admin/socialmedia', 'options' );

    elseif ( $active_tab === 'slider_options' ) :
      // load slider options
      settings_fields( 'touko_theme_slider_options' );
      get_template_part( 'admin/theme', 'slider-options' );

    elseif( $active_tab === 'rss_feed_fetcher_options' ) :
      // load rss post feed options
      settings_fields( 'touko_theme_rss_feed_fetcher_options' );
      get_template_part( 'admin/theme', 'rss-feed-fetcher-options' );

    elseif ( $active_tab === 'other_options' ) :
      // load other admin stuff
      settings_fields( 'touko_theme_other_options' );
      get_template_part( 'admin/mixed', 'options' );

    endif;

    submit_button();?>
    </form>
  </div>
<?php
}

function touko_theme_newsfeed_options_validate( $newsfeed_settings ) {

  $input_validated = array();
  $input = $newsfeed_settings;

   /**
  * Validation for newsfeed
  */
  isset($input[ 'enable_newsfeed' ] ) ? $input_validated[ 'enable_newsfeed' ] = 1 : $input_validated[ 'enable_newsfeed' ] = 0;

  isset($input[ 'enable_wp_posts_newsfeed' ] ) ? $input_validated[ 'enable_wp_posts_newsfeed' ] = 1 : $input_validated[ 'enable_wp_posts_newsfeed' ] = 0;

  isset($input[ 'enable_facebook_newsfeed' ] ) ? $input_validated[ 'enable_facebook_newsfeed' ] = 1 : $input_validated[ 'enable_facebook_newsfeed' ] = 0;

  isset($input[ 'enable_twitter_newsfeed' ] ) ? $input_validated[ 'enable_twitter_newsfeed' ] = 1 : $input_validated[ 'enable_twitter_newsfeed' ] = 0;

  if ( isset( $input[ 'wp_blog_visible_posts_count' ] ) && is_numeric( $input[ 'wp_blog_visible_posts_count' ] ) ) {
    $input_validated[ 'wp_blog_visible_posts_count' ] = $input[ 'wp_blog_visible_posts_count' ];
  }
  // FACEBOOK ->
  if ( isset( $input[ 'facebook_app_id' ] ) && is_numeric( $input[ 'facebook_app_id' ] ) ) {
    $input_validated[ 'facebook_app_id' ] = $input[ 'facebook_app_id' ];
  }

  if ( isset( $input[ 'facebook_app_secret' ] ) ) {
    $input_validated[ 'facebook_app_secret' ] = $input[ 'facebook_app_secret' ];
  }

  if ( isset( $input[ 'facebook_page_id' ] ) && is_numeric( $input[ 'facebook_page_id' ] ) ) {
    $input_validated[ 'facebook_page_id' ] = $input[ 'facebook_page_id' ];
  }

  if ( isset( $input[ 'facebook_visible_posts_count' ] ) && is_numeric( $input[ 'facebook_visible_posts_count' ] ) ) {
    $input_validated[ 'facebook_visible_posts_count' ] = absint( $input[ 'facebook_visible_posts_count' ] );
  }
  // TWITTER ->
  if ( isset( $input[ 'twitter_consumer_key' ] ) ) {
    $input_validated[ 'twitter_consumer_key' ] = $input[ 'twitter_consumer_key' ];
  }

  if ( isset( $input[ 'twitter_consumer_secret' ] ) ) {
    $input_validated[ 'twitter_consumer_secret' ] = $input[ 'twitter_consumer_secret' ];
  }

  if ( isset( $input[ 'twitter_oauth_access_token' ] ) ) {
    $input_validated[ 'twitter_oauth_access_token' ] = $input[ 'twitter_oauth_access_token' ];
  }

  if ( isset( $input[ 'twitter_oauth_access_token_secret' ] ) ) {
    $input_validated[ 'twitter_oauth_access_token_secret' ] = $input[ 'twitter_oauth_access_token_secret' ];
  }

  if ( isset( $input[ 'twitter_username' ] ) ) {
    $input_validated[ 'twitter_username' ] = $input[ 'twitter_username' ];
  }

  if ( isset( $input[ 'twitter_visible_posts_count' ] ) && is_numeric( $input[ 'twitter_visible_posts_count' ] ) ) {
    $input_validated[ 'twitter_visible_posts_count' ] = absint( $input[ 'twitter_visible_posts_count' ] );
  }

  /**
  * Validation for Instagram
  */
  isset($input[ 'enable_instagram' ] ) ? $input_validated[ 'enable_instagram' ] = 1 : $input_validated[ 'enable_instagram' ] = 0;

  if ( isset( $input[ 'instagram_api_key' ] ) ) {
    $input_validated[ 'instagram_api_key' ] = $input[ 'instagram_api_key' ];
  }

  if ( isset( $input[ 'instagram_api_secret' ] ) ) {
    $input_validated[ 'instagram_api_secret' ] = $input[ 'instagram_api_secret' ];
  }

  if ( isset( $input[ 'instagram_api_callback' ] ) ) {
    $input_validated[ 'instagram_api_callback' ] = esc_url_raw($input[ 'instagram_api_callback' ]);
  }

  if ( isset( $input[ 'instagram_visible_posts_count' ] ) && is_numeric( $input[ 'instagram_visible_posts_count' ] ) ) {
    $input_validated[ 'instagram_visible_posts_count' ] = absint( $input[ 'instagram_visible_posts_count' ] );
  }

  if ( isset( $input[ 'instagram_username' ] ) ) {
    $input_validated[ 'instagram_username' ] = $input[ 'instagram_username' ];
  }

   //Clearing the theme option cache
  if( function_exists('clear_transitions')) clear_transitions();

  return $input_validated;

}
function touko_theme_social_media_options_validate ( $social_media_settings ){

  $input_validated = array();
  $input = $social_media_settings;

  /**
  * Validation for socialmedia
  */
  isset($input[ 'enable_facebook_like_box' ] ) ? $input_validated[ 'enable_facebook_like_box' ] = 1 : $input_validated[ 'enable_facebook_like_box' ] = 0;

  isset($input[ 'enable_twitter_follow_box' ] ) ? $input_validated[ 'enable_twitter_follow_box' ] = 1 : $input_validated[ 'enable_twitter_follow_box' ] = 0;

  isset($input[ 'enable_social_media_icons' ] ) ? $input_validated[ 'enable_social_media_icons' ] = 1 : $input_validated[ 'enable_social_media_icons' ] = 0;

  if ( isset( $input[ 'facebook_page_url' ] ) ) {
    $input_validated[ 'facebook_page_url' ] = esc_url_raw($input[ 'facebook_page_url' ]);
  }

  if ( isset( $input[ 'twitter_page_url' ] ) ) {
    $input_validated[ 'twitter_page_url' ] = esc_url_raw($input[ 'twitter_page_url' ]);
  }

  if ( isset( $input[ 'rss_page_url' ] ) ) {
    $input_validated[ 'rss_page_url' ] = esc_url_raw($input[ 'rss_page_url' ]);
  }
  isset( $input[ 'donate_url' ] ) ? $input_validated[ 'donate_url' ] = esc_url_raw($input[ 'donate_url' ]) : $input_validated[ 'donate_url' ] = '';

   //Clearing the theme option cache
  if( function_exists('clear_transitions')) clear_transitions();

  return $input_validated;

}

function touko_theme_slider_options_validate ( $slider_settings ) {

  $input_validated = array();
  $input = $slider_settings;

  /**
  * Validation for slider
  */

  isset( $input[ 'disable_slider' ] ) ? $input_validated[ 'disable_slider' ] = 1 : $input_validated[ 'disable_slider' ] = 0;

  isset( $input[ 'slider_quantity' ] ) ? $input_validated[ 'slider_quantity' ] = absint( $input[ 'slider_quantity' ] ) : $input_validated[ 'slider_quantity' ] = 4;

  if ( isset( $input[ 'featured_post_slider' ] ) ) {
    $input_validated[ 'featured_post_slider' ] = array();
  }

  if( isset( $input[ 'slider_quantity' ] ) ) {
    for ( $i = 1; $i <= absint($input[ 'slider_quantity' ]); $i++ ) {
      if ( intval( $input[ 'featured_post_slider' ][ $i ] ) ) {
        $input_validated[ 'featured_post_slider' ][ $i ] = absint($input[ 'featured_post_slider' ][ $i ] );
      }
    }
  }

  isset( $input[ 'transition_effect' ] ) ? $input_validated[ 'transition_effect' ] = wp_filter_nohtml_kses( $input[ 'transition_effect' ] ) : $input_validated[ 'transition_effect' ] = 'scrollLeft';

  if ( isset( $input[ 'transition_delay' ] ) && is_numeric( $input[ 'transition_delay' ] ) ) {
    $input_validated[ 'transition_delay' ] = $input[ 'transition_delay' ];
  }

  if ( isset( $input[ 'transition_duration' ] ) && is_numeric( $input[ 'transition_duration' ] ) ) {
    $input_validated[ 'transition_duration' ] = absint( $input[ 'transition_duration' ] );
  }

  //Clearing the slider option cache
  delete_transient( 'featured_post_slider' );

  return $input_validated;
}

function touko_theme_other_options_validate( $other_settings ) {

  $input_validated = array();
  $input = $other_settings;

  /**
  * Validation for other
  */
  isset($input[ 'enable_google_analytics' ]) ? $input_validated[ 'enable_google_analytics' ] = 1 : $input_validated[ 'enable_google_analytics' ] = 0;

  if ( isset( $input[ 'google_analytics_id' ] ) ) {
    $input_validated[ 'google_analytics_id' ] = strip_tags( $input[ 'google_analytics_id' ] );
  }

  return $input_validated;
}

function touko_theme_rss_feed_fetcher_options_validate( $rss_feed_fetcher_settings ) {

  $input_validated = array();
  $input = $rss_feed_fetcher_settings;

  /**
  * Validation for rss feed fetcher
  */
  isset( $input[ 'enable_rss_feed_fetch' ] ) ? $input_validated[ 'enable_rss_feed_fetch' ] = 1 : $input_validated[ 'enable_rss_feed_fetch' ] = 0;

  if ( isset( $input[ 'rss_feed_urls' ] ) ) {
    $input_validated[ 'rss_feed_urls' ] = array();
  }

  isset( $input[ 'rss_feed_quantity' ] ) ? $input_validated[ 'rss_feed_quantity' ] = absint( $input[ 'rss_feed_quantity' ] ) : $input_validated[ 'rss_feed_quantity' ] = 2;

  if( isset( $input[ 'rss_feed_quantity' ] ) ) {
    for ( $i = 1; $i <= absint( $input[ 'rss_feed_quantity' ]); $i++ ) {
      if ( isset( $input[ 'rss_feed_urls' ][ $i ] ) ) {
        $input_validated[ 'rss_feed_urls' ][ $i ] = esc_url( $input[ 'rss_feed_urls' ][ $i ] );
      }
    }
  }

  return $input_validated;
}

  /**
 * Clearing the cache if any changes in Admin Theme Option
 */
function clear_transitions(){
  delete_transient( 'social_media_icons' );
  delete_transient( 'facebook_page_posts_transient' );
  delete_transient( 'facebook_page_transient' );
  delete_transient( 'twitter_transient' );
  delete_transient( 'instagram_transient' );
}
?>
