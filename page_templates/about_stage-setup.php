<?php 

/* Template Name: About_Stage-Setup */

<<<<<<< HEAD
$stage_setup_files = get_post_meta( $post->ID, 'stage_setup_values' )[0];

=======
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc
get_header(); ?>

<section class="about_stage-setup">

<<<<<<< HEAD
	<div class="row">
=======
	<div class="row gutters">

>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc
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
	<div class="row">
		<div class="column">

			<?php foreach ( $stage_setup_files as $key => $value ) : ?>

				<a href="<?php echo esc_url( $value['url'] ); ?>"><img src="<?php echo esc_url( $value['url'] ); ?>" style="width: 100%; padding-bottom:0.5em;"></a>

			<?php endforeach; ?>
=======
	<div class="row gutters">
		<div class="column">
			<h3>Backline</h3>
			<b>Drums</b>
			<p>Yamaha Stage Custom Birch 5-Piece with 22” Bass Drum</p>
			<b>Guitar Rig</b>
			<p>Bugera 333-212 with Footpedal</p>
			<b>Base Rig</b>
			<p>Ampeg PF 500 Portaflex & 210 HE Stack</p>
			<b>Keyboard Rig</b>
			<p>Korg T3 + Stand</p>
		</div>
		<div class="column">
			<h3>Console</h3>
			<p>Behringer x32 Compact</p>
			<h3>Speakers</h3>
			<p>JBL<span>x2</span></p>
			<h3>Monitors</h3>
			<p>Floor Monitor Wedge<span>x3</span></p>
			<p> <i> - Stage Left, Stage Right & Drummer </i></p>
		</div>
	</div>

	<div class="row gutters">
		<div class="column">
			<h3>Microphones & DI Boxes</h3>
			<p>Shure Beta 58A<span>x2</span></p>
			<p>Shure Beta 57A</p>
			<p>Sennheiser e845<span>x2</span></p>
			<p>Sennheiser e609<span>x2</span></p>
			<p>Sennheiser e614<span>x2</span></p>
			<p>Sennheiser e604<span>x2</span></p>
			<p>Sennheiser e602<span>x3</span></p>
			<p>Radial JDI Passive DI</p>
			<p>Radial Pro 48 Active DI<span>x2</span></p>
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc
		</div>
	</div>
</section>

<?php get_footer(); ?>