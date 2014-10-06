<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH') ) exit;

/**
 * Comments Page Template
 *
 *
 * @file           comments.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 0.9.0
 * @filesource     wp-content/themes/touko-the-politician/comments.php
 * @since          available since Release 0.9.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				if( 1 == get_comments_number() ) {
					printf( __( 'Yksi kommentti artikkeliin: &ldquo;%2$s&rdquo;', THEME_TEXTDOMAIN ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				}
				else {
					printf( __( '%1$s kommenttia artikkeliin: &ldquo;%2$s&rdquo;', THEME_TEXTDOMAIN ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				}
			?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'site_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<ul class="default-wp-page clearfix">
			<h1 class="assistive-text section-heading"><?php _e( 'Kommenttien navigointi', THEME_TEXTDOMAIN ); ?></h1>
			<li class="previous"><?php previous_comments_link( __( '&larr; Vanhemmat kommentit', THEME_TEXTDOMAIN ) ); ?></li>
			<li class="next"><?php next_comments_link( __( 'Uudemmat kommentit &rarr;', THEME_TEXTDOMAIN ) ); ?></li>
		</ul>
		<?php endif; // check for comment navigation ?>

	<?php // If comments are closed and there are comments, let's leave a little note.
		elseif ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Kommentointi on suljettu.', THEME_TEXTDOMAIN ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments .comments-area -->