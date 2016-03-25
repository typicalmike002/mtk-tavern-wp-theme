<?php 
/*
Template Name: About

*/

global $post;
$content = $post->post_content;  // Gets the about page content.

$featured_image = get_the_post_thumbnail( $post->ID, 'medium' );

get_header(); ?>

<section class="about">

	<div class="row gutters">

		<div class="column">
			<!-- Sub Navigation -->
			<nav id="about_navigation" role="navigation">
				<?php wp_list_pages( array(
					'child_of' => 10, // Set equal to the About page $post->ID
					'title_li' => '' // Removes the "pages" heading.
				)); ?>
			</nav>
		</div>

	</div>

	<div class="row gutters">


		<!-- About Paragraph -->
		<div class="column">
	
			<!-- Featured Thumbnail -->
			<div class="about_featured-image">
				<?php echo $featured_image; ?>
			</div>

			<h3>About MTK Tavern</h3>
			<p><?php echo $content; ?></p>
		</div>

	</div>

</section>

<?php get_footer(); ?>
