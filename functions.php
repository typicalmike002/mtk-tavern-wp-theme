<?php
/**
 * Theme functions and definitions.
 *
 * 
 *
 * @package WordPress
 * @subpackage MTK Tavern
 * @version 1.0
 */



/**
 * Set up theme defaults and registers various WordPress features.
 * 
 * @uses register_nav_menu() Adds support for a custom navigation menu.
 * @uses add_theme_support() Adds support for post formats and post thumbnails.
 *
 *
 * @since MTK Tavern 1.0
 * 
 * @return void
 */
function mtk_tavern_setup() {

	// Outputs valid HTML5 for the template tags listed below.
	add_theme_support( 'html5', array(
		'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'
	) );

	// Adds support for a custom navigation menu.  More can be added.
	register_nav_menu( 'primary', 'Main Navigation' );

	// Add support for thumbnails.
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mtk_tavern_setup' );



/**
 * Injects scripts and styles into the theme's header 
 * to optomize rendering.  Sets up requirejs by providing
 * the correct directory path our theme is located in.
 *
 * @uses wp_localize_script() Passes the themes directory path for requirejs 
 * 
 * @since MTK Tavern 1.0
*/
function inject_scripts() {

	global $wp_styles, $wp_scripts;

	// Registers style and adds the version number to the url for caching.
	wp_register_style( 'style', get_stylesheet_uri(), false, '1.0.0' );
	wp_enqueue_style( 'style' );

	// Deregisters WordPress's local copy of jQuery:
	wp_deregister_script( 'jquery' );

	$js_dir = get_template_directory_uri() . '/js';
	$js_libs = $js_dir . '/bower_components';

	// Registers requirejs.
	wp_enqueue_script( 'requirejs', $js_libs . '/requirejs/require.js', '', '', true);
	wp_register_script( 'optimize', $js_dir . '/optimize.min.js', 'requirejs', '', true );

	// Passes theme's directory path to requirejs.
	wp_localize_script( 'optimize', 'dir', array(
		'path' => $js_dir
	));

	wp_enqueue_script( 'optimize', '', '', '', true );

	// Script used to get a facebook share button.
	wp_register_script( 'facebook', $js_dir . '/facebook.js', '', '', false );
	wp_enqueue_script( 'facebook', '', '', '', false );

	// Styles for the lightbox plugin.
	if ( is_page( 'Gallery' ) ) {
		wp_register_style( 'lightbox-style', $js_libs . '/lightbox2/dist/css/lightbox.min.css' );
		wp_enqueue_style( 'lightbox-style' );
	}

	// Add Google Analytics tacking code to footer:
	wp_register_script( 'googleAnalytics', $js_dir . '/googleAnalytics.js', '', '', true );
	wp_enqueue_script( 'googleAnalytics', '', '', '', true );

	// Add IE9 and below conditional for various fallback methods:
	wp_enqueue_script( 'html5shiv', $js_libs . '/html5shiv/html5shiv.min.js' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lte IE 8' );

	wp_enqueue_script( 'respond', $js_libs . '/respond/dest/respond.min.js' );
	wp_script_add_data( 'respond', 'conditional', 'lte IE 8' );

	// Add box-sizing: border-box; support to IE7 and below:
	wp_enqueue_style( 'ie7_style', get_stylesheet_directory_uri() . '/css/ie7.css', array( 'style' ) );
	wp_style_add_data( 'ie7_style', 'conditional', 'lte IE 7' );

}
add_action( 'wp_enqueue_scripts', 'inject_scripts' );




if ( is_admin() ) {
	

	function admin_inject_styles() {
		wp_register_style( 'admin-styles', get_template_directory_uri() . '/css/admin-styles.css', false, '1.0.0' );
		wp_enqueue_style( 'admin-styles' );

	}
	add_action( 'admin_enqueue_scripts', 'admin_inject_styles' );
	

	/**
	 * Class: Templates
	 * 
	 * @since MTK Tavern 1.0
	 */

	include( 'admin_templates/Templates.php' );
	$template_controls = new Templates();
}




?>