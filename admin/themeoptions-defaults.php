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

global $touko_the_politician_theme_options_defaults;

$touko_the_politician_theme_options_defaults = array(
  'default_layout'                          => 'no-sidebar-full-width',
  'disable_slider'                          => 1,
  'enable_rss_feed_fetch'                   => 0,
  'donate_url'                              => '', //donation button url
  'enable_donate'                           => 0, //do we enable donation button
  'enable_instagram'                        => 0,
  'enable_newsfeed'                         => 0, //do we add anything from the newsfeed to the homepage
  'enable_wp_posts_newsfeed'                => 0, //do we add wp_posts feed to the homepage
  'enable_facebook_newsfeed'                => 0, //do we add facebook feed to the homepage
  'enable_facebook_like_box'                => 0, //do we show facebook like box
  'enable_google_analytics'                 => 0, //do we add google analytics
  'enable_social_media_icons'               => 0, //do we show social media icons
  'enable_twitter_newsfeed'                 => 0, //do we add twitter feed to the homepage
  'enable_twitter_follow_box'               => 0, //do show twitter follow box
  'facebook_app_id'                         => '',
  'facebook_app_secret'                     => '',
  'facebook_page_id'                        => '',
  'facebook_page_url'                       => '',
  'facebook_visible_posts_count'            => 2,
  'featured_post_slider'                    => array(),
  'google_analytics_id'                     => '',
  'instagram_api_key'                       => '',
  'instagram_api_callback'                  => '',
  'instagram_api_secret'                    => '',
  'instagram_username'                      => '',
  'instagram_visible_posts_count'           => 2,
  'rss_page_url'                            => '',
  'rss_feed_quantity'                       => 2,
  'rss_feed_urls'                           => array(),
  'slider_quantity'                         => 4,
  'transition_effect'                       => 'scrollLeft',
  'transition_delay'                        => 4,
  'transition_duration'                     => 1,
  'twitter_consumer_key'                    => '',
  'twitter_consumer_secret'                 => '',
  'twitter_oauth_access_token'              => '',
  'twitter_oauth_access_token_secret'       => '',
  'twitter_username'                        => '',
  'twitter_page_url'                        => '',
  'twitter_visible_posts_count'             => 2,
  'wp_blog_visible_posts_count'             => 2,
 );

global $touko_the_politician_theme_options_settings;

$touko_the_politician_theme_options_settings = touko_theme_options_set_defaults( $touko_the_politician_theme_options_defaults );

function touko_theme_options_set_defaults( $touko_the_politician_theme_options_defaults ) {
	$touko_the_politician_theme_options_settings = array_merge(
  $touko_the_politician_theme_options_defaults,
    ( array ) get_option( 'touko_theme_social_media_options', array() ),
    ( array ) get_option( 'touko_theme_newsfeed_options', array() ),
    ( array ) get_option( 'touko_theme_slider_options', array() ),
    ( array ) get_option( 'touko_theme_rss_feed_fetcher_options', array() ),
    ( array ) get_option( 'touko_theme_other_options', array() )
  );

	return apply_filters( 'touko_the_politician_theme_options_settings', $touko_the_politician_theme_options_settings );
}

?>
