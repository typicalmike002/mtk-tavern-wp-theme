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

		if ( is_admin() ) { 

			add_action( 'admin_init', array( $this, 'admin_custom_input' ) );
		}
	}

	function admin_custom_input() {

		global $pagenow;

		if ( ! ( 'post.php' === $pagenow ) ) { return; }


		//Don't continue if the post_ID is anything except an int.
		$post_id = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT )
					? filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT )
					: filter_input( INPUT_POST, 'post_ID', FILTER_SANITIZE_NUMBER_INT );
		if ( !isset($post_id) ) { return; /* The Filter returned false so escape. */ } 


		// The currently loaded page template.
		$template_filename = esc_url( get_post_meta( $post_id, '_wp_page_template', true ) );

		// Defines various page_template filenames.
		define('LOAD_CONTACT_FORM', json_encode( array(
			'http://page_templates/contact-form.php'
		) ) );

		define('LOAD_FOOD_FORM', json_encode( array(
			'http://page_templates/food.php'
		) ) );

		define('LOAD_STAGE_SETUP_FORM', json_encode( array(
			'http://page_templates/about_stage-setup.php'
		) ) );

		// Compares the currently loaded page template with various page_template filenames.
		// Loads an admin template for pages that need customized input.
		if ( in_array( $template_filename, json_decode( LOAD_CONTACT_FORM ) ) ) {

			include 'templates/contact-form.php';
		}


		if ( in_array( $template_filename, json_decode( LOAD_FOOD_FORM ) ) ) {

			include 'templates/create-food-menu.php';

		}

		if ( in_array( $template_filename, json_decode( LOAD_STAGE_SETUP_FORM ) ) ) {

			include 'templates/stage-setup.php';

		}
	}
}