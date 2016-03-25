<?php
/**
 * Adds the stage setup input form to the admin section.
 *
 * @uses add_meta_box() For adding WordPress's built in form constructor.
 * @since MTK Tavern 1.0
 */



function enqueue_javascript() {

	global $post;
	
	wp_register_script( 'stage-setup', get_template_directory_uri() . '/js/wordpress_admin/stage-setup.js' );
	
	// Allows the food menu's data to be accessed by the javascript.
	wp_localize_script( 'stage-setup', 'stage_setup_object', array(
		'stage_setup_items' => get_post_meta( $post->ID, 'stage_setup_values', true )
	));
	wp_enqueue_script( 'stage-setup', get_template_directory_uri() . '/js/wordpress_admin/stage-setup.js' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_javascript' );



function meta_boxes() {
	add_meta_box( 'stage-setup-id', 'Stage Setup', 'load_stage_setup_form', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'meta_boxes');




function load_stage_setup_form() {

	global $post;

	wp_nonce_field( basename( __FILE__ ), 'nonce' );

	$values = get_post_meta( $post->ID, 'stage_setup_values', true );

	?><div id="stage_setup_form"><!-- See 'js/wordpress_admin/stage-setup.js' --></div><?php 
}



function save_forms( $post_id ) {

	//	Validates the data before continuing:
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], basename(__FILE__) ) ) ? 'true' : 'false';
	$is_valid_user = current_user_can( 'edit_post', $post_id );

	if ( $is_autosave || $is_revision || !$is_valid_nonce || !$is_valid_user ) { return; /*Validation failed*/ }

	$stage_setup_values = array();
	$supported_types = array('image/png', 'image/jpeg', 'image/gif');
	if ( !empty($_FILES['files'] ) ) {

		$arranged_files = arrange_files( $_FILES['files'] );

		foreach ( $arranged_files as $key => $file ) {

			if ( in_array( $file['type'], $supported_types ) ) {
				$upload = wp_upload_bits( $file['name'], null, file_get_contents( $file['tmp_name'] ) );

				if ( isset($upload['error']) && $upload['error'] != 0 ) {

					wp_die('There was an error uploading your file.  The error is: '. $upload['error']);

				} else {

					$stage_setup_values[$key] = $upload;

				}

			} else {

				wp_die('This form only accepts the following file extensions: .jpg, .gif, and .png');

			}
		}
		update_post_meta( $post_id, 'stage_setup_values', $stage_setup_values );
	}

}
add_action( 'save_post', 'save_forms' );



// Rearranges the $_FILES array into something more friendly.
function arrange_files( &$file_post ) {

	$file_array = array();
	$file_count = count($file_post['name']);
	$file_keys = array_keys($file_post);

	for ( $i=0; $i<$file_count; $i++ ) {
		foreach ( $file_keys as $key ) {
			$file_array[$i][$key] = $file_post[$key][$i];
		}
	}

	return $file_array;
}


// Adds the enctype to the end of WordPress built in 
// method for submitting forms.  Required for uploading 
// files in custom meta items.
function update_edit_form() {
	echo ' enctype="multipart/form-data"';
}
add_action('post_edit_form_tag', 'update_edit_form');


?>