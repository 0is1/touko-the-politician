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

  global $touko_the_politician_theme_options_settings, $instagram_instance, $master_instagram;
  $theme_settings = $touko_the_politician_theme_options_settings;

  $auth_config = array(
    'apiKey'         => 'c7661e722d8643f8af4f0699517c7290',
    'apiSecret'     => '3793b5e4d1274a439b0b3ad369298360',
    'apiCallback'      => 'http://localhost:8888/touko/wordpress/wp-admin/themes.php?page=touko_theme_options'
  );
try{
    $master_instagram = new Instagram($auth_config);
  }
  catch(Exception $e){
    error_log(date('j.n.Y H:i:s'). " : ", 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
    error_log($e.PHP_EOL, 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
    error_log("-----".PHP_EOL, 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
  }
// id = 183420083
// $user = $instagram -> searchUser("monsieurtuco");
if (get_option('instagram-access-token') !== false) :
  try{
    $instagram = $master_instagram;
    $instagram->setAccessToken(get_option('instagram-access-token'));
    $instagram_instance = $instagram->getUserMedia(183420083, 1);
  } catch(Exception $e){
    error_log(date('j.n.Y H:i:s'). " : ", 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
    error_log($e.PHP_EOL, 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
    error_log("-----".PHP_EOL, 3, get_stylesheet_directory() .'/logs/instagram-errors.log');
  }
endif;
?>