<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Facebook Posts Template
 *
 *
 * @file           facebook-posts.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/facebook/facebook-posts.php
 * @since          available since Release 0.9.0
 */
?>

<?php
  global $facebook_photos, $touko_the_politician_theme_options_settings, $facebook_page_items_count;
  if ( !get_transient('facebook_page_posts_transient') ) {
    call_user_func( 'facebook_page_posts_transient' );
  }
  $data = get_transient( 'facebook_page_posts_transient' );
  $theme_settings = $touko_the_politician_theme_options_settings;
  if ( gettype( $data ) == 'array') :
    if ( !get_transient('facebook_page_transient') ) {
      call_user_func( 'facebook_page_transient' );
    }
    $page_details = get_transient( 'facebook_page_transient' );
    $facebook_page_name = $page_details["name"];
    $facebook_page_id = $page_details["id"];
    $facebook_page_picture = $facebook_photos["data"][0]["picture"];
    $fb_page_items = array();
    $facebook_page_items_count = 0;
    foreach( $data as $key => $value ) {
      foreach( $value as $index => $page_values ){
        // only add those posts to newsfeed where message is set
        if ( isset( $page_values["message"] ) && gettype( $page_values ) === "array" ) {
          array_push( $fb_page_items, $page_values );
        }
      }
    }
    $facebook_page_items_count = count( $fb_page_items );

    for ($i=0; $i < $facebook_page_items_count; $i++) {
      // Check if post have any likes
      isset( $fb_page_items[$i]["likes"] ) ? $likes = count( $fb_page_items[$i]["likes"] ) : $likes = 0;
      if( isset($fb_page_items[$i]["id"]) ){
        $id  = $fb_page_items[$i]["id"];
        $ids = explode( "_", $id );
        $link_to_post = esc_url( 'https://www.facebook.com/permalink.php?story_fbid='.$ids[1].'&id='.$ids[0].'' );
      }
      if( isset($fb_page_items[$i]["link"]) ) $link_to_post_target = esc_url( $fb_page_items[$i]["link"] );
      isset( $fb_page_items[$i]['picture'] ) ? $fb_img = $fb_page_items[$i]['picture'] : $fb_img = get_stylesheet_directory_uri(). "/images/facebook-100x100.png";
    ?>
      <article class="facebook-page-post facebook-post-<?php echo $i;?> grid-50-with-gap clearfix">
        <section class="facebook-user-details clearfix">
          <figure class="newsfeed-icon-img facebook-page-img clearfix">
            <img src="<?php echo $facebook_page_picture;?>" alt="<?php echo $facebook_page_name;?>">
          </figure>
          <a href="<?php echo esc_url( 'https://www.facebook.com/'.$facebook_page_id );?>" title="<?php echo $facebook_page_name;?> @ Facebook">
            <h3><?php echo $facebook_page_name; ?></h3>
          </a>
        </section>
        <section class="facebook-post-details clearfix">
          <?php
          if( isset($fb_page_items[$i]["message"]) ) : ?>
          <figure class="newsfeed-icon facebook-logo">
            <i class="icon-facebook-rect"></i>
          </figure>
            <a href="<?php echo $link_to_post;?>" title="<?php echo $link_to_post;?>">
              <p class="facebook-post-msg"><?php echo $fb_page_items[$i]["message"];?> </p>
            </a>
          <?php
          endif;
          ?>
          <?php if( isset($fb_page_items[$i]["link"]) ) : ?>
          <figure class="facebook-newsfeed-img facebook-box clearfix">
            <span>
              <a href="<?php echo $link_to_post_target;?>" title="<?php echo $link_to_post_target;?>">
                <img src="<?php echo $fb_img;?>" alt="Facebook">
              </a>
            </span>
              <figcaption>
              <?php if( isset($fb_page_items[$i]["name"]) ) :?>
                <a href="<?php echo $link_to_post_target;?>" title="<?php echo $link_to_post_target;?>">
                  <strong><?php echo $fb_page_items[$i]["name"]; ?></strong>
                </a>
                <?php if( isset($fb_page_items[$i]["caption"]) ) : ?>
                  <a href="http://<?php echo $fb_page_items[$i]["caption"];?>" title="<?php echo $fb_page_items[$i]["caption"];?>" class="caption-link">
                    <?php echo $fb_page_items[$i]["caption"]; ?>
                  </a>
                <?php endif; ?>
              <?php endif; ?>
                <?php if( isset($fb_page_items[$i]["story"]) ) : ?>
                  <a href="<?php echo $link_to_post_target;?>" title="<?php echo $link_to_post_target;?>" >
                    <strong>
                      <?php echo $fb_page_items[$i]["story"]; ?></strong>
                  </a>
                  <?php if( isset($fb_page_items[$i]["story_tags"]) ) : ?>
                    <a href="http://facebook.com/<?php echo $fb_page_items[$i]["story_tags"]["19"][0]["id"];?>" title="<?php echo $fb_page_items[$i]["story_tags"]["19"][0]["name"];?>" class="caption-link">
                      <?php echo $fb_page_items[$i]["story_tags"]["19"][0]["name"]; ?>
                    </a>
                    <?php /* endif story_tags*/ endif; ?>
                <?php endif; ?>
              </figcaption>
          </figure>
          <?php endif; ?>
          <?php
          if( isset($fb_page_items[$i]["created_time"]) ) : ?>
          <?php
            $datetime = new DateTime( $fb_page_items[$i]["created_time"] );
            // Timezone hard coded at the moment
            $datetime->setTimezone( new DateTimeZone('Europe/Helsinki') );
          ?>
          <span class="datetime"><?php echo $datetime->format( 'd.m.Y H:i' );?></span>
          <?php endif;?>
        </section>
      </article>
      <?php
        // add clearfix after every two page post's
        if ($i % 2 === 1 && $facebook_page_items_count > 2) { ?>
          <hr class="clearfix">
        <?php
        }
      } // end of for loop
  ?>
<?php else : // If Facebook data isnt available ?>
  <article class="facebook-page-post grid-100">
    <section class="facebook-user-details clearfix">
      <figure class="newsfeed-icon facebook-logo">
        <i class="icon-facebook-rect"></i>
      </figure>
      <h3><?php _e('Facebook-postien haussa on tällä hetkellä ongelmia...', THEME_TEXTDOMAIN); ?></h3>
    </section>
<?php endif; ?>