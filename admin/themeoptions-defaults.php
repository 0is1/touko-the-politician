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

global $touko_the_politician_theme_options_defaults;
$touko_the_politician_theme_options_defaults = array(
  'facebook_app_id'                         => "",
  'facebook_app_secret'                     => "",
  'facebook_page_id'                        => "",
  'facebook_page_url'                       => "",
  'facebook_visible_posts_count'            => 2,
  'enable_instagram'                        => false,
  'enable_newsfeed'                         => false, //do we add anything from the newsfeed to the homepage
  'enable_wp_posts_newsfeed'                => false, //do we add wp_posts feed to the homepage
  'enable_facebook_newsfeed'                => false, //do we add facebook feed to the homepage
  'enable_facebook_like_box'                => false, //do show facebook like box
  'enable_social_media_icons'               => false, //do we show social media icons
  'enable_twitter_newsfeed'                 => false, //do we add twitter feed to the homepage
  'enable_twitter_follow_box'               => false, //do show twitter follow box
  'instagram_api_key'                       => "",
  'instagram_api_callback'                  => "",
  'instagram_api_secret'                    => "",
  'rss_page_url'                            => "",
  'twitter_consumer_key'                    => "",
  'twitter_consumer_secret'                 => "",
  'twitter_oauth_access_token'              => "",
  'twitter_oauth_access_token_secret'       => "",
  'twitter_username'                        => "",
  'twitter_page_url'                        => "",
  'twitter_visible_posts_count'             => 2,
  'wp_blog_visible_posts_count'             => 2,
 );
global $touko_the_politician_theme_options_settings;
$touko_the_politician_theme_options_settings = touko_theme_options_set_defaults( $touko_the_politician_theme_options_defaults );

function touko_theme_options_set_defaults( $touko_the_politician_theme_options_defaults) {
	$touko_the_politician_theme_options_settings = array_merge( $touko_the_politician_theme_options_defaults, (array) get_option( 'touko_theme_options', array() ) );
	return apply_filters( 'touko_the_politician_theme_options_settings', $touko_the_politician_theme_options_settings );
}

?>