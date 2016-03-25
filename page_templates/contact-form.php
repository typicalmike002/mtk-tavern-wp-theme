<?php
/*
Template Name: Contact Form
*/

global $post;

// Response Generation Function

$response = '';

$send_to = get_post_meta( $post->ID, 'email_address', true );

$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium', false )[0];

// Function to generate a response from the server.
function generate_response( $type, $message ) {

	global $response;

	if ( $type == "success" ) { $response = "<div class='success'>{$message}</div>"; }
	else { $response = "<div class='error'>{$message}</div>"; }

}

// Response Messages
$not_human 			= "Human Verification incorrect.";
$missing_content 	= "Please supply all information.";
$email_invalid 		= "Email Address Invalid.";
$message_unset 	 	= "Message was not sent.  Try Again.";
$message_sent 	 	= "Thanks!  Your message has been sent.";

// User posted variables
$name 		= sanitize_text_field( $_POST['message_name'] );
$email 		= sanitize_email( $_POST['message_email'] );
$message 	= esc_textarea( $_POST['message_text'] );
$human 		= sanitize_text_field( $_POST['message_human'] );

//php mailer variables
$to 		= sanitize_email( $send_to['email'] );
$subject 	= "Someone sent a message from mtktavern.com";
$header 	= 'From: ' . $email . "\r\n" .
			  'Reply-To: ' . $email . "\r\n";

if ( !$human == 0 ) {
	if ( $human != 2 ) { generate_response( "error", $email_invalid ); /* Failed Human Test! */ }
	else {

		// Validate Email
		if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			generate_response( "error", $email_invalid ); // Email is not valid!
		} else {

			// Validate presence of name and message.
			if ( empty( $name ) || empty( $message ) ) {
				generate_response( "error", $missing_content );
			} else {

				// All Tests have now past.  Send the email:
				$sent = wp_mail( $to, $subject, strip_tags( $message ), $header);
				if ( $sent ) {
					generate_response( "success", $message_sent );
				} else {
					generate_response( "error", $message_unsent );
				}
			}
		}
	}
} else if ( $_POST['submitted'] ) {
	generate_response( "error", $missing_content );
}

get_header(); ?>

<section class="contact-form">
	
	<div class="row">
		<div class="column_fill">

			<header class="contact-form_header">
				<h3>Please contact us with questions, comments, or requests.  Thank you.</h3>
			</header>

			<form action="<?php echo the_permalink(); ?>" method="POST">
				<?php echo $response; ?>

				<div class="row">
					<div class="column contact_name">
						<p><label for="name">Name: <span>*</span><br />
						<input type="text" name="message_name" value="<?php echo esc_attr( $_POST['message_name'] ); ?>"></label></p>
					</div>
						
					<div class="column">
						<p><label for="message_email">Email: <span>*</span><br />
						<input type="email" name="message_email" value="<?php echo esc_attr( $_POST['message_email'] ); ?>"></label></p>
					</div>
				</div><!-- Top Section -->

				<p><label for="message_text">Message: <span>*</span><br />
				<textarea type="text" name="message_text"><?php echo esc_textarea( $_POST['message_text'] ); ?></textarea></label></p>

				<p><label for="message_human">Human Verification: <span></span><br />
				<input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>

				<input type="hidden" name="submitted" value="2">
				<p class="send_message"><input type="submit"  value="Send Message"></p>
			</form>
		</div><!-- column -->

		<div class="column_thrd">
			<!-- Displays a featured image -->
			<img src="<?php echo esc_url( $featured_image ); ?>">
		</div>

	</div><!-- row -->
</section>

<?php get_footer(); ?>