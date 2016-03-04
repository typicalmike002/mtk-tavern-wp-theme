<?php 
/**
 * Allows the Page Attributes setting in WordPress's backend to set an input form
 * based on the page template.  For example, a Contact Us page template would likely 
 * require a form so a WordPress User may change the content.  Each form is created 
 * using WordPress's built in meta box generator and are saved inside the 'template_meda_boxes'
 * folder.  These files must be conditionally loaded inside the Templates class.
 *
 * @uses get_post_meta() for getting the page's currently loaded template name.
 * @since MTK Tavern 1.0
 */

class Templates {

	public function __construct () {

		if ( is_admin() ) { //This class should only load in the admin section.

			add_action( 'admin_init', array( $this, 'admin_custom_input' ) );
		}
	}

	function admin_custom_input() {

		global $pagenow;

		if ( ! ( 'post.php' === $pagenow ) ) { return; /* Escape for all other sections of the admin. */ }


		//GET or POST the post_ID number and ensure that its an int. 
		$post_id = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT )
					? filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT )
					: filter_input( INPUT_POST, 'post_ID', FILTER_SANITIZE_NUMBER_INT );
		if ( !isset($post_id) ) { return; /* The Filter returned false so escape. */ } 

		/**
		 * Use a define name and compares the list of template files in the array to the currently 
		 * loaded template set in the $template_filename variable above.  This define name is used 
		 * to separate what should be done to these list of templates in the admin sections.
		 */

		$template_filename = esc_url( get_post_meta( $post_id, '_wp_page_template', true ) );

		//Loads meta form and post meta data for the contact us template.
		define('LOAD_CONTACT_FORM', json_encode( array(
			'http://page_templates/contact-form.php'
		) ) );


		if ( in_array( $template_filename, json_decode( LOAD_CONTACT_FORM ) ) ) {

			include 'templates/contact-form.php';
		}
	}
}