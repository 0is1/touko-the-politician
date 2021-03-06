<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Facebook Photos Functions
 *
 *
 * @file           get-facebook-photos.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/facebook/get-facebook-photos.php
 * @since          available since Release 0.9.0
 */
  require_once( get_stylesheet_directory() . '/lib/vendor/facebook/facebook.php');

  global $facebook_photos, $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;

  $config = array();
  $config['appId'] = $theme_settings["facebook_app_id"];
  $config['secret'] = $theme_settings["facebook_app_secret"];
  $config['fileUpload'] = false; // optional
  $facebook = new Facebook( $config );
  try{
    $pagePhotos = $facebook->api($theme_settings["facebook_page_id"] . '/photos?limit=1');
    $facebook_photos = $pagePhotos;
  } catch( FacebookApiException $e ){
    error_log( date('j.n.Y H:i:s' ). " : ", 3, get_stylesheet_directory() .'/logs/facebook-errors.log' );
    error_log( $e->getType()." – ", 3, get_stylesheet_directory() .'/logs/facebook-errors.log' );
    error_log( $e->getMessage().PHP_EOL, 3, get_stylesheet_directory() .'/logs/facebook-errors.log' );
    error_log("-----".PHP_EOL, 3, get_stylesheet_directory() .'/logs/facebook-errors.log' );
  }


?>