<?php 

/* Template Name: About_Location */

get_header(); ?>

<section class="about_location">

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

	<div class="row gutters align-top">
		
		<div class="column">
		
			<!-- Displays Google Maps of MTK Tavern -->
			<section class="location_map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12006.521162010842!2d-73.7279772!3d41.2080332!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x51856514128cb444!2sMTK+Tavern!5e0!3m2!1sen!2sus!4v1457206008745" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
			</section>
		</div>

		<div class="column padding-1">
		
			<header class="location_description">
				<h3>Located near the Mt. Kisco Metro North Train Station</h3>
			</header>

			<address class="location_address">
				<p>30 E. Main St. Mt Kisco, NY<br />
				(914) 218-3334</p>
			</address>

			<section class="location_hours">
				<h3>Hours</h3>
				<p>Monday - Saturday<br />
				5:00PM to 2:00</p>
				<p>Sunday<br />
				1:00PM to 8:00PM</p>
			</section>
		</div>
	</div>

</section>
<?php get_footer(); ?>