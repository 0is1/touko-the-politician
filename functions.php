<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Functions
 *
 *
 * @file           functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/functions.php
 * @since          available since Release 1.0
 */

/**
* Load external files
*/
require(get_stylesheet_directory() . '/functions/header-functions.php');
require(get_stylesheet_directory() . '/functions/main-content-functions.php');
require(get_stylesheet_directory() . '/widgets.php' );
require(get_stylesheet_directory() . '/functions/footer-content-functions.php');
/**
* Load Admin Panel scripts
*/
require(get_stylesheet_directory() . '/admin/themeoptions-defaults.php');
require(get_stylesheet_directory() . '/admin/themeoptions.php');
/**
* Load Facebook scripts
*/
require_once(get_stylesheet_directory() . '/facebook/get-facebook-page-details.php');
require_once(get_stylesheet_directory() . '/facebook/get-facebook-posts.php' );
require_once(get_stylesheet_directory() . '/facebook/get-facebook-photos.php');

/**
* Load Twitter scripts
*/
require_once(get_stylesheet_directory() . '/twitter/get-tweets.php');

/**
* Load Instagram scripts
*/
require_once(get_stylesheet_directory() . '/instagram/get-instagram-media.php');

// add_action('wp_head', 'add_stylesheet', 6);
add_action('add_footer_content', 'add_footer_content');
add_action('add_page_content', 'add_page_content');

// Add Facebook like-button actions
add_action('add_like_button_script', 'add_like_button_script', 1);
add_action('create_like_button', 'add_like_button', 10, 1);

function add_like_button_script(){
  echo '
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=541746489212041";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, "script", "facebook-jssdk"));</script>';
}
function add_like_button($page_url){
  echo '<div class="fb-like" data-href="'.$page_url.'" data-width="450" data-show-faces="false" data-layout="button_count" data-send="false"></div>';
}

// Twitter actions / filters
add_filter('add_links_hashtags_to_tweet', 'process_tweet', 10, 1);
add_action('add_tweet_button_script', 'add_tweet_button_script', 1);
add_action('add_tweet_button', 'create_tweet_button', 10, 2);

/** Method to add hyperlink html tags to any urls, twitter ids or hashtags in the tweet */
function process_tweet($text) {
  $text = preg_replace('@(https?://([-\w\.]+)+(d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', '<a href="$1">$1</a>',  $text );
  $text = preg_replace("#(^|[\n ])@([^ \"\t\n\r<]*)#ise", "'\\1<a href=\"http://www.twitter.com/\\2\" >@\\2</a>'", $text);
  $text = preg_replace("#(^|[\n ])\#([^ \"\t\n\r<]*)#ise", "'\\1<a href=\"http://twitter.com/#!/search/#\\2\" >#\\2</a>'", $text);
  return $text;
}
function add_tweet_button_script(){
  echo '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
}
function create_tweet_button($page_url, $title) {
  echo '<div class="tweet-button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="' .$page_url.'" data-text="'.$title.'" data-count="none" data-via="toukoaalto">Twiittaa</a>
    </div>';
}
/**
* Enable shortcodes in widgets
*/
// add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

// Add facebook like box shortcode
add_shortcode('fb_like_box', 'add_facebook_like_box');
function add_facebook_like_box() {
  get_template_part('facebook/facebook', 'page');
}
add_shortcode('twitter_follow_box', 'add_twitter_follow_box');
function add_twitter_follow_box() {
  get_template_part('twitter/twitter', 'page');
}

// function add_stylesheet(){
//   wp_enqueue_style( 'touko_style', get_stylesheet_uri() );
// }

?>