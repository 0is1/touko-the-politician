<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Instagram Functions
 *
 *
 * @file           get-instagram-media.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/instagram/get-instagram-media.php
 * @since          available since Release 1.0
 */
  require_once(get_stylesheet_directory() . '/vendor/instagram/instagram.php');

  global $touko_the_politician_theme_options_settings, $instagram_media, $master_instagram;
  $theme_settings = $touko_the_politician_theme_options_settings;
  $instagram_posts_count = $theme_settings['instagram_visible_posts_count'];

  $auth_config = array(
    'apiKey'         => $theme_settings['instagram_api_key'],
    'apiSecret'     => $theme_settings['instagram_api_secret'],
    'apiCallback'      => $theme_settings['instagram_api_callback']
  );
  if(gettype($master_instagram) !== 'object') :
    try{
      $master_instagram = new Instagram($auth_config);
    }
    catch(Exception $e){
      error_log(date('j.n.Y H:i:s'). " : ", 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
      error_log($e.PHP_EOL, 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
      error_log("-----".PHP_EOL, 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
    }
  endif;
  if (get_option('instagram-access-token') !== false) :
    try{
      $instagram = $master_instagram;
      $user = $instagram -> searchUser($theme_settings['instagram_username']);
      // echo "<pre>";
      // print_r($user);
      // echo "</pre>";
      if(gettype($user) !== 'NULL'){
        $user = (array)$user;
        $user_id = $user['data'][0]->id;
        $instagram->setAccessToken(get_option('instagram-access-token'));
        $instagram_media = $instagram->getUserMedia($user_id, $instagram_posts_count);
      }
    }
    catch(Exception $e){
     error_log(date('j.n.Y H:i:s'). " : ", 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
      error_log($e.PHP_EOL, 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
      error_log("-----".PHP_EOL, 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
    }
  endif;
?>