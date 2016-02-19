<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Save image from remote to post attachment
 *
 *
 * @file           save_image_from_remote_to_post.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        0.9.2
 * @filesource     wp-content/themes/touko-the-politician/lib/helpers/save_image_from_remote_to_post.php
 * @since          available since 0.9.2
 */

 /**
  * Function: save_image_from_remote_to_post
  *
  * @param string $url to try download the image
  * @param int $post_id the id of the post where image is added as attachment
  * @return int $id of the attachemnt
  * @example: $attachment_id = apply_filters( 'save_image_from_remote_to_post', $image_url,  $post_id );
  */

add_filter( 'save_image_from_remote_to_post', 'save_image_from_remote_to_post', 1, 2 );

function save_image_from_remote_to_post( $url = null, $post_id = null ){

  if ( !empty( $url ) && !empty( $post_id ) ) :
    // We need these to use: media_handle_sideload();
    require_once( ABSPATH . 'wp-admin/includes/media.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/image.php' );

    $args = array(
      'timeout'     => 10,
    );
    try {
      // Get the image file from remote
      $image = wp_remote_get( $url, $args );
    } catch (Exception $e) {
      return new WP_Error( 'image-download-error', __( "Image download error", THEME_TEXTDOMAIN ) );
    }

    $upload_dir = wp_upload_dir();
    $temp_dir = $upload_dir['basedir'] . '/' . TEMP_IMAGE_FOLDER;

    // If temp-file dir does not exist, create it
    if ( ! file_exists( $temp_dir ) ) {
      wp_mkdir_p( $temp_dir );
    }

    // Get the actual file content
    $file_content = $image['body'];
    // Remove all whitespace from the file name
    $string = preg_replace('/\s+/', '', $image['headers']['content-type'] );
    $re = "/(jpg|jpeg|gif|png)/i";
    preg_match( $re, $string, $matches );

    if ( sizeof( $matches ) > 0 ) :
      // Create random name to the image
      $file_name = md5( $post_id . $url ) . '.' . $matches[0];
      // Check if baseurl is absolute or relative
      if ( filter_var( $upload_dir['baseurl'], FILTER_VALIDATE_URL ) === FALSE ) {
        // Make file_url absolute
        $file_url = get_option( 'home' ) . $upload_dir['baseurl'] . '/' . TEMP_IMAGE_FOLDER . '/' . $file_name;
      } else $file_url = $upload_dir['baseurl'] . '/' . TEMP_IMAGE_FOLDER . '/' . $file_name;

      $file = $upload_dir['basedir'] . '/' . TEMP_IMAGE_FOLDER . '/' . $file_name;

      // Add description to be used in media_handle_sideload (just file name)
      $desc = $file_name;

      // Now use the standard PHP file functions
      $fp = fopen( $file, "w" );
      $new_file = fwrite( $fp, $file_content );

      fclose( $fp );
      if ( $new_file ) :
        $tmp = download_url( $file_url );
        $file_array = array(
          'name'   => basename( $file_name ),
          'tmp_name' => $tmp
        );

        // Unlink downloaded remote file
        @unlink( $file );

        // If error storing temporarily, unlink
        if ( is_wp_error( $tmp ) ) {
          @unlink( $file_array['tmp_name'] );
          $file_array['tmp_name'] = '';
          return $tmp;
        } else {
          // Add image to post
          $id = media_handle_sideload( $file_array, $post_id, $desc );
          // If error storing permanently, unlink
          if ( is_wp_error( $id ) ) {
            @unlink( $file_array['tmp_name'] );
            return $id;
          }

          // Return attachment id
          return $id;
        }

      else :

        return new WP_Error( 'image-write-error', __( "Error while writing new file", THEME_TEXTDOMAIN ) );

      endif;

    else :

      return new WP_Error( 'image-content-type-error', __( "Image type is not permitted", THEME_TEXTDOMAIN ) );

    endif;

  else :

    return new WP_Error( 'image-url-id-error', __( "Image url or post id can not be empty!", THEME_TEXTDOMAIN ) );

  endif;

}
