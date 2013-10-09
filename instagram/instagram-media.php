<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Instagram Media Template
 *
 *
 * @file           instagram-media.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/instagram/instagram-media.php
 * @since          available since Release 1.0
 */
?>

<?php
  global $instagram_media, $touko_the_politician_theme_options_settings;
  $theme_settings = $touko_the_politician_theme_options_settings;
  $data = (array)$instagram_media;
  // echo "<pre>";
  // print_r($data["data"][0]["images"]);
  // echo "</pre>";

  ?>
  <?php
  foreach( $data['data'] as $key => $value ) { ?>
    <article class="instagram-media-post instagram-post-<?php echo $key;?> grid-50-with-gap clearfix">
      <section class="instagram-user-details clearfix">
        <figure class="newsfeed-icon-img instagram-page-img clearfix">
          <img src="<?php echo $value->user->profile_picture;?>" alt="<?php echo $value->user->full_name;?>">
        </figure>
        <a href="<?php echo esc_url('https://www.instagram.com/'.$value->user->username);?>" title="<?php echo $value->user->full_name;?> @ Instagram">
          <h3><?php echo $value->user->full_name; ?></h3>
        </a>
      </section>
      <section class="instagram-media-details">
        <figure class="instagram-img">
          <a href="<?php echo $value->link;?>" title="<?php echo $value->link;?>">
            <img src="<?php echo $value->images->thumbnail->url;?>" alt="thumbnail">
          </a>
        </figure>
        <?php
          if (isset($value->caption->text)) : ?>
          <figure class="newsfeed-icon instagram-logo">
            <i class="icon-instagram"></i>
          </figure>
          <p class="instagram-media-text"><?php echo $value->caption->text;?></p>
        <?php
          endif;
         ?>
        <?php
          $datetime = date($value->created_time);
          // Set datetime timezone match to timezone set in wp
          $timezone_offset = get_option('gmt_offset');
          $datetime = $datetime+(60*60*$timezone_offset);
        ?>
        <span class="datetime"><?php echo gmdate('d.m.Y H:i', $datetime);?></span>
      </section>
    </article>
    <?php
  }

  // for ($i=0; $i < $facebook_page_items_count; $i++) {
  //   // Check if post have any likes
  //   isset($fb_page_items[$i]["likes"]) ? $likes = count($fb_page_items[$i]["likes"]) : $likes = 0;
  //   if(isset($fb_page_items[$i]["id"])){
  //     $id  = $fb_page_items[$i]["id"];
  //     $ids = explode("_", $id);
  //     $link_to_post = esc_url('https://www.facebook.com/permalink.php?story_fbid='.$ids[1].'&id='.$ids[0].'');
  //   }
  //   isset($fb_page_items[$i]["link"]) ? $link_to_post_target = esc_url($fb_page_items[$i]["link"]) : $link_to_post_target = "#";
  //   isset($fb_page_items[$i]['picture']) ? $fb_img = $fb_page_items[$i]['picture'] : $fb_img = get_stylesheet_directory_uri(). "/images/facebook-100x100.png";
  ?>
<?php
  //} // end of for loop
?>