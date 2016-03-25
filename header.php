<?php
/**
 * Displays all of the <head> section as well as the <header> section of the theme.
 * In addition, 'header.php' will also start the <main> div.
 *
 * @package  WordPress
 * @subpackage  MTK Tavern
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="x-UA-Compatible" content-"IE=edge,chrome=1">
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />

	<?php wp_head(); ?>

<body <?php body_class(); ?>>

<!-- Main Wrap -->
<div id="wrap">

	<!-- header -->
	<header id="header" role="banner">

		<div class="row">

			<div class="column">

				<div class="mobile-menu">
				<!-- Wraps a flexbox to align logo with hamburger button on mobile views -->

					<!-- logo -->
					<a class="logo"
						href="<?php echo esc_url( home_url( '/' ) ); ?>"
						title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
						rel="home">
					<div class="logo_image"></div>
					</a>

					<!-- Mobile Hamburger Button -->
					<div class="mobile-menu_container">
						<button class="mobile-icon_hamburger" role="button">
							<label for="mobile-icon">
								<span></span>
								<span></span>
								<span></span>
							</label>
						</button>
					</div>
				</div>

				<!-- mobile dropdown-->
				<input id="mobile-icon" type="checkbox">
				<nav id="navigation_mobile" role="navigation">
					<?php wp_nav_menu( array( 
						'theme_location' => 'primary', 
						'menu_class' => 'nav',
						'container' => ''
					) ); ?>
				</nav>
			</div>

			<div class="column address_container">

				<!-- address -->
				<address class="address">
					<p>30 E. Main St. MT Kisco, NY</p>
					<p>(914) 218-3334</p>
					<p class="non_caps">pam@mtktavern.com</p>
				</address>

			</div>
		</div>
		
		<!-- navigation -->
		<nav id="navigation" role="navigation">
			<?php wp_nav_menu( array( 
				'theme_location' => 'primary', 
				'menu_class' => 'nav',
				'container' => ''
			) ); ?>
		</nav>

		<div class="row">
			<div class="column">

				<!-- page title -->
				<?php if ( is_front_page() ) : ?>
					<h1><?php echo wp_title( '' ); ?></h1>
				<?php else : ?>
					<h1><?php echo get_the_title( $post->ID ); ?></h1>
				<?php endif; ?>

			</div>
			<div class="column social-media_container">

				<!-- social media links -->
				<a href="https://www.facebook.com/mtktavern">
					<img src="<?php echo esc_url( bloginfo( 'template_url' ) . '/images/fb.png'); ?>">
				</a>
				<a href="https://www.twitter.com/mtktavern">
					<img src="<?php echo esc_url( bloginfo( 'template_url' ) . '/images/tw.png'); ?>">
				</a>
				<a href="https://www.youtube.com/channel/UCluXmahlW36w2eOUCtKItxQ">
					<img src="<?php echo esc_url( bloginfo( 'template_url' ) . '/images/yt.png'); ?>">
				</a>
				<a href="https://www.instagram.com/mtktavern/">
					<img src="<?php echo esc_url( bloginfo( 'template_url' ) . '/images/ig.png'); ?>">
				</a>
			</div>
		</div>


	</header>

	<!-- main -->
	<main id="main" role="main">
