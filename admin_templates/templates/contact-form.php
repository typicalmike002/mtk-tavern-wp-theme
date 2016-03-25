<?php
/**
 * Adds an input form for the contact us page on WordPress backend.  This email is used by the contact us form and will send all 
 * messages from that form to this email.
 *
 * @uses add_meta_box() For adding WordPress's built in form constructor.
 * @since MTK Tavern 1.0
 */


function meta_boxes() {

	add_meta_box( 'social_media_id', 'Social Media', 'load_contact_form_email', 'page', 'normal', 'high' );
}

function load_contact_form_email() {

	global $post;

	//Validate form comes from this function.
	wp_nonce_field( basename( __FILE__ ), 'nonce' );

	//Current Email Contact:
	$values = get_post_meta( $post->ID, 'email_address', true );

	?>

	<p>This page is currently displaying a contact form.  Visitors may send messages to the admin's email address of this WordPress Site.</p>

	<form method="POST">
		<label name="email_name"><p>Emails will be sent to the following email.</p></label>
		<input type="email" required name="email_name" class="email_name" value="<?php echo esc_attr( $values['email'] ); ?>">
	</form>

<?php }

function save_forms ( $post_id ) {

	//Validates data:
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = (isset ( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], basename(__FILE__) ) ) ? 'true' : 'false';
	$is_valid_user = current_user_can( 'edit_post', $post_id );
	
	if ( $is_autosave || $is_revision || !$is_valid_nonce || !$is_valid_user ) { return;/*Exits the function if the data is not safe: */}

	update_post_meta( $post_id, 'email_address', array( 
		'email' =>  sanitize_text_field( $_POST['email_name'] )
	) );

}

remove_post_type_support( 'page', 'editor' );
add_action( 'add_meta_boxes', 'meta_boxes');
add_action( 'save_post', 'save_forms' );