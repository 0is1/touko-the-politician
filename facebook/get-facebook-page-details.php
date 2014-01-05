<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Facebook Page Functions
 *
 *
 * @file           get-facebook-page-details.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/facebook/get-facebook-page-details.php
 * @since          available since Release 1.0
 */

/*
$facebook->api($theme_settings["facebook_page_id"]); returns ->
  {
    "about": "Touko Aalto on vihreiden varapuheenjohtaja, Jyväskylän kaupunginvaltuutettu sekä Keski-Suomen maakuntahallituksen jäsen. ",
    "birthday": "04/01/1984",
    "can_post": true,
    "category": "Politician",
    "hometown": "Jyväskylä",
    "is_published": true,
    "talking_about_count": 50,
    "website": "www.toukoaalto.com",
    "were_here_count": 0,
    "id": "56139632426",
    "name": "Touko Aalto",
    "link": "https://www.facebook.com/pages/Touko-Aalto/56139632426",
    "likes": 894,
    "cover": {
      "cover_id": "10151753362847427",
      "source": "https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-prn2/s720x720/971398_10151753362847427_1683501200_n.jpg",
      "offset_y": 17,
      "offset_x": 0
    }
  }
*/

if (!function_exists('get_facebook_page_data')) :
/**
 * Get data from Facebook API
 */
  function get_facebook_page_data(){
    require_once(get_stylesheet_directory() . '/vendor/facebook/facebook.php');
    global $touko_the_politician_theme_options_settings;
    $theme_settings = $touko_the_politician_theme_options_settings;
    $config = array();
    $config['appId'] = $theme_settings["facebook_app_id"];
    $config['secret'] = $theme_settings["facebook_app_secret"];
    $config['fileUpload'] = false; // optional
    $facebook = new Facebook($config);
    try{
      $pageDetails = $facebook->api($theme_settings["facebook_page_id"]);
      return $pageDetails;
    } catch(FacebookApiException $e){
      error_log(date('j.n.Y H:i:s'). " : ", 3, get_stylesheet_directory() .'/logs/facebook-errors.log');
      error_log($e->getType()." – ", 3, get_stylesheet_directory() .'/logs/facebook-errors.log');
      error_log($e->getMessage().PHP_EOL, 3, get_stylesheet_directory() .'/logs/facebook-errors.log');
      error_log("-----".PHP_EOL, 3, get_stylesheet_directory() .'/logs/facebook-errors.log');
    }
  }
endif;

if (!function_exists('facebook_page_transient')) :
/**
 * Facebook page transient
 *
 * @uses set_transient and delete_transient
 */
function facebook_page_transient() {
  if(!get_transient('facebook_page_transient')) {
    $facebook_page_transient = get_facebook_page_data();
    // Set 15 min cache
    set_transient('facebook_page_transient', $facebook_page_transient, 900);
  }
}
endif;

facebook_page_transient();

?>