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
	register_nav_menu( 'primary', 'Navigation Menu' );

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

	$js_dir = get_template_directory_uri() . '/js';
	$js_libs = $js_dir . '/bower_components';

	// Registers style and adds the version number to the url for caching.
	wp_register_style( 'style', get_stylesheet_uri(), false, '1.0.0' );
	wp_enqueue_style( 'style' );

	// Registers requirejs.
	wp_enqueue_script( 'requirejs', $js_libs . '/requirejs/require.min.js', '', '', true );
	wp_register_script( 'optimize', $js_dir . '/optimize.min.js', 'requirejs', '', true );

	// Passes theme's directory path to requirejs.
	wp_localize_script( 'optimize', 'dir', array(
		'path' => $js_dir,
	));

	wp_enqueue_script( 'optimize', '', '', '', true );
}
add_action( 'wp_enqueue_script', 'inject_scripts' );




/**
 * Class: Title
 * 
 * @since MTK Tavern 1.0
 */

include( 'classes/Title.php' );
$title = new Title( 10, 2 );




/**
 * Class: Templates
 * Description: classes/Templates.php
 * 
 * @since MTK Tavern 1.0
 */

include( 'classes/Templates.php' );
$template_controls = new Templates();

?>