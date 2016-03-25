<?php 
/*
Template Name: About

*/

global $post;
$content = $post->post_content;  // Gets the about page content.

<<<<<<< HEAD
$featured_image = get_the_post_thumbnail( $post->ID, 'medium' );
=======
$featured_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); // Retrives About page's featured image.

>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc

get_header(); ?>

<section class="about">

	<div class="row gutters">

		<div class="column">
			<!-- Sub Navigation -->
			<nav id="about_navigation" role="navigation">
				<?php wp_list_pages( array(
<<<<<<< HEAD
					'child_of' => 10, // Set equal to the About page $post->ID
=======
					'child_of' => 14, // Set equal to the About page $post->ID
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc
					'title_li' => '' // Removes the "pages" heading.
				)); ?>
			</nav>
		</div>

	</div>
<<<<<<< HEAD

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

=======
	<div class="row gutters">
		<!-- About Paragraph -->
		<div class="column">
			<p><?php echo $content; ?></p>
		</div>
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc
	</div>

</section>

<?php get_footer(); ?>