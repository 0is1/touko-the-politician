<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Twitter Tweets Template
 *
 *
 * @file           twitter-tweets.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/twitter/twitter-tweets.php
 * @since          available since Release 1.0
 */
?>

<?php
  global $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;
  if ( !get_transient('twitter_transient') ) {
    call_user_func( 'twitter_transient' );
  }
  $data = get_transient( 'twitter_transient' );
  if ( gettype($data ) !== 'NULL') :
    // Get user Twitter profile image
    if( isset($data[0]["user"]["profile_image_url"]) ) $twitter_user_image = $data[0]["user"]["profile_image_url"];

    $tweet_link_base = 'https://twitter.com/' . $theme_settings['twitter_username'] . '/status/';
    $twitter_user_real_name = $data[0]["user"]["name"];
    $twitter_user_nick = $data[0]["user"]["screen_name"];
    $twitter_user_profile_link = "https://twitter.com/" . $theme_settings['twitter_username'];

    ?>
    <?php
    // echo "<pre>";
    // print_r( $data[0]["user"] );
    // echo "</pre>";
    for ($i=0; $i < $theme_settings['twitter_visible_posts_count']; $i++) {
    ?>
      <article class="twitter-tweet grid-50-with-gap clearfix">
        <figure class="newsfeed-icon-img twitter-user-img clearfix">
          <img src="<?php echo $twitter_user_image;?>" alt="Twitter">
        </figure>
        <section class="twitter-user-details">
          <h3><?php echo $twitter_user_real_name; ?></h3>
          <a href="<?php echo $twitter_user_profile_link; ?>" title="<?php echo $twitter_user_nick;?>@Twitter">@<?php echo $twitter_user_nick;?>
          </a>
        </section>
        <section class="twitter-tweet-details">
          <?php
          if( isset($data[$i]["text"]) ) : ?>
          <?php $formatted_tweet = apply_filters( 'add_links_hashtags_to_tweet', $data[$i]["text"] );
          ?>
            <p class="twitter-tweet-text"><?php echo $formatted_tweet;?></p>
            <figure class="newsfeed-icon twitter-logo">
              <i class="icon-twitter-bird"></i>
            </figure>
            <a class="twitter-tweet-url clearfix" href="<?php echo $tweet_link_base;?><?php echo $data[$i]["id"];?>" title="Linkki tweettiin"><?php _e( 'Linkki twiittiin', THEME_TEXTDOMAIN );?></a>
          <?php endif; ?>
          <?php
            if( isset($data[$i]["entities"]["urls"]["url"]) ) : ?>
              <a href="<?php echo $data[$i]["entities"]["urls"]["url"];?>"><?php echo $data[$i]["entities"]["urls"]["url"];?></a>
            <?php endif; ?>
            <?php
            if( isset($data[$i]["created_at"]) ) : ?>
            <?php
              $datetime = new DateTime( $data[$i]["created_at"] );
              $datetime->setTimezone( new DateTimeZone('Europe/Helsinki') );
            ?>
            <span class="datetime"><?php echo $datetime->format( 'd.m.Y H:i' );?></span>
            <?php endif; ?>
        </section>
      </article>
    <?php
      // add clearfix after every two tweets
      if ($i % 2 === 1 && $theme_settings['twitter_visible_posts_count'] > 2) { ?>
        <hr class="clearfix">
      <?php
      }
    } // end of for loop
  ?>
<?php else : // If Twitter data isnt available ?>
  <article class="twitter-tweet grid-100 clearfix">
    <section class="twitter-user-details">
      <figure class="newsfeed-icon twitter-logo">
        <i class="icon-twitter-bird"></i>
      </figure>
      <h3><?php _e('Twiittien haussa on tällä hetkellä ongelmia...', THEME_TEXTDOMAIN); ?></h3>
    </section>
<?php endif; ?>