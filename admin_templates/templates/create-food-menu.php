<?php
/**
 * Adds the food menu form to the admin section.
 *
 * @uses add_meta_box() For adding WordPress's built in form constructor.
 * @since MTK Tavern 1.0
 */

function enqueue_javascript() {

	global $post;
	
	wp_register_script( 'food-menu', get_template_directory_uri() . '/js/wordpress_admin/food-menu.js' );
	
	// Allows the food menu's data to be accessed by the javascript.
	wp_localize_script( 'food-menu', 'menu_object', array(
		'menu_items' => get_post_meta( $post->ID, 'food_menu_values', true )
	));
	wp_enqueue_script( 'food-menu', get_template_directory_uri() . '/js/wordpress_admin/food-menu.js' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_javascript' );





function meta_boxes() {
	add_meta_box( 'food_menu_id', 'Food Menu', 'load_food_menu_form', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'meta_boxes');




function load_food_menu_form() {

	global $post;

	wp_nonce_field( basename( __FILE__ ), 'nonce' );

	$values = get_post_meta( $post->ID, 'food_menu_values', true );
	$count = count($values);

	print_r($values);

	?><div id="food_menu_form"><!-- SEE js/wordpress_admin/food-menu.js --></div><?php 
}




function save_forms( $post_id ) {

	//	Validates the data before continuing:
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], basename(__FILE__) ) ) ? 'true' : 'false';
	$is_valid_user = current_user_can( 'edit_post', $post_id );

	if ( $is_autosave || $is_revision || !$is_valid_nonce || !$is_valid_user ) { return; /*Validation failed*/ }

	$food_menu = array();

	$categories = isset( $_POST['category'] ) ? $_POST['category'] : array();

	// Adds all categories to the top level of the array object.
	foreach ( $categories as $cat_key => $cat_value ) {
		
		$food_menu[$cat_key] = array(
			'category' => sanitize_text_field( $cat_value )
		);

		$sub_categories = isset( $_POST['sub-category-' . $cat_key] ) ? $_POST['sub-category-' . $cat_key] : array();
		$sub_prices = isset( $_POST['sub-category-' . $cat_key . '-price'] ) ? $_POST['sub-category-' . $cat_key . '-price'] : array();

		// Adds all sub categories to the second level of the array after the category.
		foreach ( $sub_categories as $sub_cat_key => $sub_cat_value ) {
			
			$food_menu[$cat_key]['sub-categories'][$sub_cat_key] = array(
				'sub-category' => sanitize_text_field( $sub_cat_value ),
				'price' => isset( $sub_prices[$sub_cat_key] ) ? sanitize_text_field( $sub_prices[$sub_cat_key] ) : '',
			);

			$food_items = isset( $_POST['sub-category-' . $cat_key . '-food-item-' . $sub_cat_key] ) ? $_POST['sub-category-' . $cat_key . '-food-item-' . $sub_cat_key] : array();
			$food_item_prices = isset( $_POST['sub-category-' . $cat_key . '-food-item-' . $sub_cat_key . '-price'] ) ? $_POST['sub-category-' . $cat_key . '-food-item-' . $sub_cat_key . '-price'] : array();
			$descriptions = isset( $_POST['sub-category-' . $cat_key . '-food-item-' . $sub_cat_key . '-description'] ) ? $_POST['sub-category-' . $cat_key . '-food-item-' . $sub_cat_key . '-description'] : array();

			// Adds all food items and their prices/descriptions that are listed for each of the sub categories.
			foreach ( $food_items as $food_item_key => $food_item_value ) {

				//print_r( $food_item_prices );

				$food_menu[$cat_key]['sub-categories'][$sub_cat_key]['food-items'][$food_item_key] = array(
					'food-item' => sanitize_text_field( $food_item_value ),
					'food-price' => isset( $food_item_prices[$food_item_key] ) ? sanitize_text_field( $food_item_prices[$food_item_key] ) : '',
					'description' => isset( $descriptions[$food_item_key] ) ? sanitize_text_field( $descriptions[$food_item_key] ) : ''
				);
			}
		}
	}

	// Adds the data to the wp_post_meta table for the page.
	update_post_meta( $post_id, 'food_menu_values', $food_menu );
}
add_action( 'save_post', 'save_forms' );


remove_post_type_support( 'page', 'editor' );

?>