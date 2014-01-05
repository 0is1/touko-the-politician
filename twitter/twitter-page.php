<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Twitter Page Template
 *
 *
 * @file           twitter-page.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/twitter/twitter-page.php
 * @since          available since Release 1.0
 */
?>

<?php
  global $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;
  if (!get_transient('twitter_transient')) {
    call_user_func('twitter_transient');
  }
  $data = get_transient('twitter_transient');
  if (gettype($data) !== 'NULL') :

    // Get user Twitter profile image
    if(isset($data[0]["user"]["profile_image_url"])) $twitter_user_image = $data[0]["user"]["profile_image_url"];
    // Get user Twitter profile banner base url
    if(isset($data[0]["user"]["profile_banner_url"])) $twitter_profile_banner_url = $data[0]["user"]["profile_banner_url"];

    if(isset($data[0]["user"]["name"])) $twitter_user_real_name = $data[0]["user"]["name"];
    if(isset($data[0]["user"]["location"])) $twitter_user_location = $data[0]["user"]["location"];
    if(isset($data[0]["user"]["description"])) $twitter_user_description = $data[0]["user"]["description"];
    if(isset($data[0]["user"]["entities"]["url"]["urls"][0]["expanded_url"])) {
      $twitter_user_url = $data[0]["user"]["entities"]["url"]["urls"][0]["expanded_url"];
    } else if (isset($data[0]["user"]["url"])){
      $twitter_user_url = $data[0]["user"]["url"];
    }
    if(isset($data[0]["user"]["followers_count"])) $twitter_user_followers_count = $data[0]["user"]["followers_count"];
    if(isset($data[0]["user"]["friends_count"])) $twitter_user_friends_count = $data[0]["user"]["friends_count"];
    if(isset($data[0]["user"]["statuses_count"])) $twitter_user_statuses_count = $data[0]["user"]["statuses_count"];
    isset($data[0]["user"]["screen_name"]) ? $twitter_user_nick = $data[0]["user"]["screen_name"] : $twitter_user_nick = $theme_settings['twitter_username'];
    $twitter_user_profile_link = "https://twitter.com/" . $twitter_user_nick;

    ?>
  <div class="twitter-page fleft pure-u">
    <section class="in-twitter header">
      <figure class="newsfeed-icon twitter-logo">
        <i class="icon-twitter-bird"></i>
      </figure>
      <p><?php echo $twitter_user_real_name;?><?php _e(' – Twitterissä', 'touko'); ?></p>
    </section>
    <section class="twitter-user-details" style="background-image: url(<?php echo $twitter_profile_banner_url;?>/web);">
      <figure class="newsfeed-icon-img twitter-page-img clearfix">
      <img src="<?php echo $twitter_user_image;?>" alt="<?php echo $twitter_user_real_name;?>" title="<?php echo $twitter_user_real_name;?>">
      </figure>
      <h1><?php echo $twitter_user_real_name; ?></h1>
      <a href="<?php echo $twitter_user_profile_link; ?>" title="<?php echo $twitter_user_nick;?>@Twitter">@<?php echo $twitter_user_nick;?>
      </a>
      <p class="twitter-user-description"><?php echo $twitter_user_description;?></p>
      <p class="twitter-user-location"><?php echo $twitter_user_location;?> – <a href="<?php echo $twitter_user_url;?>" title="<?php echo $twitter_user_url;?>"><?php echo $twitter_user_url; ?></a></p>
    </section>
    <section class="twitter-page-details">
      <ul>
        <li>
          <a href="<?php echo $twitter_user_profile_link; ?>" title="@<?php echo $twitter_user_nick;?> – <?php _e('Twiittiä','touko');?>">
            <strong><?php echo $twitter_user_statuses_count;?></strong><span><?php _e('Twiittiä', 'touko') ?></span>
          </a>
        </li>
        <li>
          <a href="<?php echo $twitter_user_profile_link;?>/following" title="@<?php echo $twitter_user_nick;?> – <?php _e('Seurattua','touko');?>">
            <strong><?php echo $twitter_user_friends_count;?></strong><span><?php _e('Seurattua', 'touko') ?></span>
          </a>
        </li>
        <li>
          <a href="<?php echo $twitter_user_profile_link;?>/followers" title="@<?php echo $twitter_user_nick;?> – <?php _e('Seuraajaa','touko');?>">
            <strong><?php echo $twitter_user_followers_count;?></strong><span><?php _e('Seuraajaa', 'touko') ?></span>
          </a>
        </li>
      </ul>
      <span class="follow-button">
        <a href="<?php echo $twitter_user_profile_link;?>" class="twitter-follow-button" data-show-count="false" data-lang="fi" data-size="large" data-show-screen-name="false">Seuraa @<?php echo $twitter_user_nick;?></a>
      </span>
    </section>
  </div>
<?php else : // If Twitter data isnt available ?>
  <div class="twitter-page fleft pure-u">
    <section class="twitter-feed-unavailable">
      <figure class="newsfeed-icon twitter-logo">
        <i class="icon-twitter-bird"></i>
      </figure>
      <p><?php _e('Twiittien haussa on tällä hetkellä ongelmia...', 'touko'); ?></p>
    </section>
  </div>
<?php endif; ?>