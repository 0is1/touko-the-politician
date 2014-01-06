<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Social Media Content Functions
 *
 *
 * @file           social-media-content-functions.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/social-media-content-functions.php
 * @since          available since Release 1.0
 */
?>
<?php

  // Add Facebook like box shortcode
  add_shortcode('fb_like_box', 'add_facebook_like_box');
  function add_facebook_like_box() {
    get_template_part('facebook/facebook', 'page');
  }
  // Add Twitter like box shortcode
  add_shortcode('twitter_follow_box', 'add_twitter_follow_box');
  function add_twitter_follow_box() {
    get_template_part('twitter/twitter', 'page');
  }

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
    js.src = "//connect.facebook.net/fi_FI/all.js#xfbml=1&appId=541746489212041";
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

  // Method to add hyperlink html tags to any urls, twitter ids or hashtags in the tweet
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
    global $touko_the_politician_theme_options_settings;
    $theme_settings = $touko_the_politician_theme_options_settings;
    $twitter_username = $theme_settings['twitter_username'];
    echo '<div class="tweet-button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="' .$page_url.'" data-text="'.$title.'" data-count="none" data-via="'.$twitter_username.'">'.__("Twiittaa", "touko").'</a>
      </div>';
  }

?>