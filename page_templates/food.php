<?php 
/*
Template Name: Food

*/

get_header(); ?>

<section class="about_gallery">

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

</section>
<?php get_footer(); ?>