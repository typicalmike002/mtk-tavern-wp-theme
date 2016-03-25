<?php 

/* Template Name: About_Stage-Setup */

$stage_setup_files = get_post_meta( $post->ID, 'stage_setup_values' )[0];

get_header(); ?>

<section class="about_stage-setup">

	<div class="row">
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

	<div class="row">
		<div class="column">

			<?php foreach ( $stage_setup_files as $key => $value ) : ?>

				<a href="<?php echo esc_url( $value['url'] ); ?>"><img src="<?php echo esc_url( $value['url'] ); ?>" style="width: 100%; padding-bottom:0.5em;"></a>

			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>