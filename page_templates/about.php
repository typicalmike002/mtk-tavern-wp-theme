<?php 
/*
Template Name: About

*/

global $post;
$content = $post->post_content;  // Gets the about page content.

$featured_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); // Retrives About page's featured image.


get_header(); ?>

<section class="about">

	<div class="row gutters">

		<div class="column">
			<!-- Sub Navigation -->
			<nav id="about_navigation" role="navigation">
				<?php wp_list_pages( array(
					'child_of' => 14, // Set equal to the About page $post->ID
					'title_li' => '' // Removes the "pages" heading.
				)); ?>
			</nav>
		</div>

	</div>
	<div class="row gutters">
		<!-- About Paragraph -->
		<div class="column">
			<p><?php echo $content; ?></p>
		</div>
	</div>

</section>

<?php get_footer(); ?>