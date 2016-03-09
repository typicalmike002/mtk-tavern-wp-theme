<?php
/**
 * Adds the food menu form to the admin section.
 *
 * @uses add_meta_box() For adding WordPress's built in form constructor.
 * @since MTK Tavern 1.0
 */

function meta_boxes() {

	add_meta_box( 'food_menu_id', 'Food Menu', 'load_food_menu_form', 'page', 'normal', 'high' );
}

function enqueue_javascript() {

	global $post;
	
	wp_register_script( 'food-menu', get_template_directory_uri() . '/js/wordpress_admin/food-menu.js' );

	// Allows the food menu's data to be accessed by the javascript.
	wp_localize_script( 'food-menu', 'menu_object', array(
		'menu_items' => get_post_meta( $post->ID, 'food_menu_values', true )
	));

	wp_enqueue_script( 'food-menu', get_template_directory_uri() . '/js/wordpress_admin/food-menu.js' );

}

function load_food_menu_form() {

	global $post;

	//$nonce = wp_create_nonce( basename( __FILE__ ), 'nonce' );

	$values = get_post_meta( $post->ID, 'food_menu_values', true );
	$count = count($values);

	?><div id="food_menu_form"><!-- SEE js/wordpress_admin/food-menu.js --></div><?php 
}

function save_forms( $post_id ) {

	$food_menu = array();

	// update_post_meta( $post_id, 'food_menu_values', $food_menu );
}


add_action( 'add_meta_boxes', 'meta_boxes');
add_action( 'save_post', 'save_forms' );
add_action( 'admin_enqueue_scripts', 'enqueue_javascript' );

remove_post_type_support( 'page', 'editor' );

?>