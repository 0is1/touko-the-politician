<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Contains all the theme option default values
 * If no user-defined values
 * is available for any setting, these defaults will be used.
 *
 *
 * @file           themeoptions-defaults.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/admin/themeoptions-defaults.php
 * @since          available since Release 1.0
 */

add_action( 'admin_menu', 'touko_options_menu' );
/**
 * Create sub-menu page.
 *
 * @uses add_theme_page to add sub-menu under the Appearance top level menu.
 */
  function touko_options_menu() {
    add_theme_page(
      __( 'Touko Theme Options', 'touko-the-politician' ), // Name of page
      __( 'Touko Theme Options', 'touko-the-politician' ), // Label in menu
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
   register_setting( 'touko_theme_options', 'touko_theme_options', 'touko_theme_options_validate');
}
/**
 * Render Touko The Politician Theme Options page
 */
  function do_touko_the_politician_theme_options(){ ?>
    <?php
      global $touko_the_politician_theme_options_settings, $touko_the_politician_theme_options_defaults;
      echo "<p>Settings:</p><pre>";
      print_r($touko_the_politician_theme_options_settings);
      echo "</pre>";
    ?>
    <div class="touko-the-polician-admin">
    <?php if( isset( $_GET [ 'settings-updated' ] ) && 'true' === $_GET[ 'settings-updated' ] ): ?>
      <div class="updated fade" id="message">
        <p><strong><?php _e( 'Asetukset tallennettu.', 'touko' );?></strong></p>
      </div>
    <?php endif; ?>
      <h1><?php _e( 'Teema-asetukset', 'touko' );?></h1>
     <form class="touko-theme-options-form pure-form pure-form-aligned" method="post" action="options.php">
     <?php
      // load newsfeed options template
      get_template_part('admin/newsfeed', 'options');
      // load social media options template
      get_template_part('admin/socialmedia', 'options');
      get_template_part('admin/instagram', 'options');

      submit_button();?>
      </form>
    </div>
  <?php
  }

  function touko_theme_options_validate( $options ) {
    global $touko_the_politician_theme_options_settings;
    $input_validated = $touko_the_politician_theme_options_settings;
    $input = array();
    $input = $options;

    /**
    * Validation for newsfeed
    */

    isset($input['enable_newsfeed' ] ) ? $input_validated[ 'enable_newsfeed' ] = true : $input_validated[ 'enable_newsfeed' ] = false;

    isset($input['enable_wp_posts_newsfeed' ] ) ? $input_validated[ 'enable_wp_posts_newsfeed' ] = true : $input_validated[ 'enable_wp_posts_newsfeed' ] = false;

    isset($input['enable_facebook_newsfeed' ] ) ? $input_validated[ 'enable_facebook_newsfeed' ] = true : $input_validated[ 'enable_facebook_newsfeed' ] = false;

    isset($input['enable_twitter_newsfeed' ] ) ? $input_validated[ 'enable_twitter_newsfeed' ] = true : $input_validated[ 'enable_twitter_newsfeed' ] = false;

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
      $input_validated[ 'facebook_visible_posts_count' ] = $input[ 'facebook_visible_posts_count' ];
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
      $input_validated[ 'twitter_visible_posts_count' ] = $input[ 'twitter_visible_posts_count' ];
    }
    /**
    * Validation for Instagram
    */
    isset($input[ 'enable_instagram' ]) ? $input_validated[ 'enable_instagram' ] = true : $input_validated[ 'enable_instagram' ] = false;
    if ( isset( $input[ 'instagram_api_key' ] ) ) {
      $input_validated[ 'instagram_api_key' ] = $input[ 'instagram_api_key' ];
    }
    if ( isset( $input[ 'instagram_api_secret' ] ) ) {
      $input_validated[ 'instagram_api_secret' ] = $input[ 'instagram_api_secret' ];
    }
    if ( isset( $input[ 'instagram_api_callback' ] ) ) {
      $input_validated[ 'instagram_api_callback' ] = esc_url_raw($input[ 'instagram_api_callback' ]);
    }

    /**
    * Validation for socialmedia
    */
    isset($input[ 'enable_facebook_like_box' ]) ? $input_validated[ 'enable_facebook_like_box' ] = true : $input_validated[ 'enable_facebook_like_box' ] = false;
    isset($input[ 'enable_twitter_follow_box' ]) ? $input_validated[ 'enable_twitter_follow_box' ] = true : $input_validated[ 'enable_twitter_follow_box' ] = false;
    isset($input[ 'enable_social_media_icons' ]) ? $input_validated[ 'enable_social_media_icons' ] = true : $input_validated[ 'enable_social_media_icons' ] = false;

    if ( isset( $input[ 'facebook_page_url' ] ) ) {
      $input_validated[ 'facebook_page_url' ] = esc_url_raw($input[ 'facebook_page_url' ]);
    }

    if ( isset( $input[ 'twitter_page_url' ] ) ) {
      $input_validated[ 'twitter_page_url' ] = esc_url_raw($input[ 'twitter_page_url' ]);
    }

    if ( isset( $input[ 'rss_page_url' ] ) ) {
      $input_validated[ 'rss_page_url' ] = esc_url_raw($input[ 'rss_page_url' ]);
    }
      //Clearing the theme option cache
    if(function_exists('clear_transitions')) clear_transitions();
    return $input_validated;
  }

  /**
 * Clearing the cache if any changes in Admin Theme Option
 */
function clear_transitions(){
  delete_transient('social_media_icons');
  delete_transient('featured_post_slider');
}
?>