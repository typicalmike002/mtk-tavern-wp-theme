<?php 

/* Template Name: About_Stage-Setup */

get_header(); ?>

<section class="about_stage-setup">

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
		</div>
	</div>
</section>

<?php get_footer(); ?>