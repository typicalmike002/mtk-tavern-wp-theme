<?php 
/*
Template Name: About-Gallery

*/

$args = array(
	'post_type' 		=> 'attachment',
	'post_mime_type' 	=> 'image',
	'post_status' 		=> 'inherit',
	'posts_per_page'	=> - 1
);

$query_images = new WP_Query( $args );

$images = array();

// Dumps all image urls into an array.
foreach ( $query_images->posts as $image ) {
	if ( wp_is_mobile() ) {
		$images[] = wp_get_attachment_image_src( $image->ID, 'medium' );
	} else {
		$images[] = wp_get_attachment_image_src( $image->ID, 'large' );
	}
}

$images_length = count($images);

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

	<div class="full_gallery">
	<?php foreach ( $images as $key => $image ) : ?>
		<?php if ( $key % 2 == 0 ) : ?>
			<div class="row gutters">
		<?php endif; ?>
			<div class="column gallery_spacing">
				<a data-lightbox="<?php echo $image[0]; ?>"
				href="<?php echo $image[0]; ?>">
					<div class="lazy gallery_image"
					data-original="<?php echo $image[0]; ?>"
					style="background-image: url(<?php echo $image[0]; ?>);">
					</div>
				</a>
			</div>
		<?php if ( $key % 2 == 1 ) : ?>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>

</section>

<?php get_footer(); ?>