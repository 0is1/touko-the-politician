<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        Touko The Politician
 * @author         Janne Saarela
 * @version        Release: 1.0
 * @filesource     wp-content/themes/touko-the-politician/header.php
 * @since          available since Release 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php	wp_title( '|', true, 'right' );?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
		/**
		 * This hook is important for wordpress plugins and other many things
		 */
		wp_head();
	?>

</head>

<body <?php body_class(); ?>>
	<div class="wrapper">
		<header id="branding" class="main-header">
			<?php
				global $touko_the_politician_theme_options_settings;
  			$theme_settings = $touko_the_politician_theme_options_settings;
  			add_action( 'travelify_header', 'travelify_headerdetails', 10 ); ?>
  			<?php $header_image = get_header_image();
					if ( !empty($header_image)) { ?>
					<?php
						/* This is temporary glue-hack, need to redo */
						$image_url = esc_url($header_image);
						$image_height = get_custom_header()->height;
						$image_width = get_custom_header()->width;
						$header_image_css = "background: url($image_url) 0 0 no-repeat transparent; background-size: cover; height: 100%; max-height:".$image_height."px; max-width:".$image_width."px; padding: 5% 0; width: 100%;";
					?>
					<div class="container clearfix" style="<?php echo $header_image_css;?>">
					<?php }
					else { ?>
						<div class="container clearfix">
					<?php } ?>
					<div class="hgroup-wrap clearfix">
						<section class="hgroup-right">
							<?php
								if ($theme_settings['enable_social_media_icons']) {
									do_action('add_social_media_icons');
							}
							?>
						</section>
					<hgroup class="site-header fleft clearfix">
						<figure class="touko-head">
							<img src="<?php echo get_stylesheet_directory_uri()?>/images/touko-head.png" alt="Touko Aalto" title="Touko Aalto">
						</figure>
						<div class="site-titles">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
					</hgroup><!-- #site-logo -->
				</div>
				</div>
				<?php
					if ( has_nav_menu( 'basic-menu' ) ) {
						$args = array(
							'theme_location'    => 'basic-menu',
							'container'         => '',
							'items_wrap'        => '<ul class="menu-items">%3$s</ul>'
						);?>
							<nav id="main-nav" class="clearfix">
								<div class="container clearfix">
									<?php wp_nav_menu($args); ?>
								</div>
							</nav>
					<?php }
					else { ?>
						<nav id="main-nav" class="clearfix">
							<div class="container clearfix">
								<?php wp_page_menu( array( 'menu_class'  => 'root' ) );?>
							</div>
						</nav>
					<?php
					}
				?>
				<?php
					global $travelify_theme_options_settings;
   				$options = $travelify_theme_options_settings;
				if( is_home() || is_front_page() ) {
					if( "0" == $options[ 'disable_slider' ] ) {
						if( function_exists( 'pass_cycle_parameters' ) )
		   				pass_cycle_parameters();
		   			if( function_exists( 'featured_post_slider' ) )
		   				featured_post_slider();
		   		}
	   		}
		?>
		</header>
		<div id="main" class="container clearfix">