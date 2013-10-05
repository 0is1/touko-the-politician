<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Get User Tweets Functions
 *
 *
 * @file           get-tweets.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/twitter/get-tweets.php
 * @since          available since Release 1.0
 */
  require_once(get_stylesheet_directory() . '/vendor/twitter/TwitterAPIExchange.php');

  global $twitter_data, $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;

  $settings = array(
    'oauth_access_token' => $theme_settings['twitter_oauth_access_token'],
    'oauth_access_token_secret' => $theme_settings['twitter_oauth_access_token_secret'],
    'consumer_key' => $theme_settings['twitter_consumer_key'],
    'consumer_secret' => $theme_settings['twitter_consumer_secret']
  );
  $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
  $getfield = '?screen_name='.$theme_settings['twitter_username'].'&count='.$theme_settings['twitter_visible_posts_count'];
  $requestMethod = 'GET';

  try {
    $twitter = new TwitterAPIExchange($settings);
    $twitter_raw_data = $twitter->setGetfield($getfield)
               ->buildOauth($url, $requestMethod)
               ->performRequest();
    $twitter_data = json_decode($twitter_raw_data, true);
  } catch (Exception $e) {
    error_log(date('j.n.Y H:i:s'). " : ", 3, get_stylesheet_directory() .'/logs/twitter-errors.log');
    error_log($e.PHP_EOL, 3, get_stylesheet_directory() .'/logs/twitter-errors.log');
    error_log("-----".PHP_EOL, 3, get_stylesheet_directory() .'/logs/twitter-errors.log');
  }

?>