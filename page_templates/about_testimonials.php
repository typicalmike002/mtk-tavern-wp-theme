<?php 
/**
 * Template Name: About_Testimonials
 *
*/

get_header(); ?>

<section class="about_testimonials">

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
	
	<!-- Joe Duraes -->
	<div class="row gutters">
		
		<div class="column testimonial_image">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/joe-duraes.jpg' ); ?>">
		</div>

		<div class="column">
			<section class="testimonial">
				<a href="<?php echo esc_url( 'https://www.facebook.com/TheJoeDuraesBand?fref=ts' ); ?>">Joe Duraes</a>
				<blockquote>
					"Thank you MTK for hosting us tonight and for your hospitality. We LOVED the sound - it was perfect. I wish we could play there every night. This goes down as one, if not THE best shows we've ever played live..."
				</blockquote>
			</section>
		</div>
	</div>

	<!-- Next 2 The Tracks -->
	<div class="row gutters">

		<div class="column testimonial_image">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/next-2-the-tracks.jpg' ); ?>">
		</div>

		<div class="column">
			<section class="testimonial">
				<a href="<?php echo esc_url( get_template_directory_uri() . '/images/next-2-the-tracks.jpg' ); ?>">Next 2 The Tracks</a>
				<blockquote>"One our favorite places in the whole country to play & hang out."</blockquote>
			</section>
		</div>
	</div>

	<!-- Full Service -->
	<div class="row gutters">

		<div class="column testimonial_image">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/full-service.jpg' ); ?>">
		</div>

		<div class="column">
			<section class="testimonial">
				<a href="http://fullservicemusic.com/">Full Service</a>
				<blockquote>"Full Service has been doing over 100 shows a year all around the USA at venues ranging from House of Blues and Austin City Limits to fan's backyards... I can honestly say that there is not a staff at any of these venues, especially the owner Pam, who has treated us better or met us with more enthusiasm for not only putting on a fun event but also growing the local music scene and supporting artists in general than the MTK crew! We’ve toured enough to know that what matters most about a show isn’t the number of people there or the size of the stage but the quality of experience and the people involved. . . and MTK Tavern wins on all counts!”</blockquote>
			</section>
		</div>
	</div>

	<!-- Pickpocket Romance -->
	<div class="row gutters">
	
		<div class="column testimonial_image">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/pickpocket-romance.jpg' ); ?>">
		</div>

		<div class="column">
			<section class="testimonial">
				<a href="http://www.pickpocketromance.com/">Pickpocket Romance</a>
				<blockquote>"MTK is by far the best sounding and most special place we have had the privilege to play since we started Pickpocket Romance 2 years ago. You have a superior team of all the right people.  Our fans loved the vibe of the room and those there who were your patrons were very engaged and truly there for the music. MTK is in my opinion the premiere small music venue in Westchester and we can't wait to play there again and many times in the future."</blockquote>
			</section>
		</div>
	</div>
	
	<!-- The Afternoon Edition -->
	<div class="row gutters">
		
		<div class="column testimonial_image">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/the-afternoon-edition.jpg' ); ?>">
		</div>

		<div class="column">
			<section class="testimonial">
				<a href="http://www.theafternooneditionmusic.com/">The Afternoon Edition</a>
				<blockquote>"On behalf of our band I just want to say thank you again for everything on Friday.  That honestly was one of the most fun shows we've played and your hospitality was second to none.  We'd love to come back soon."</blockquote>
			</section>
		</div>
	</div>

	<!-- Stellar Young -->
	<div class="row gutters">

		<div class="column testimonial_image">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/stellar-young.jpg' ); ?>">
		</div>

		<div class="column">
			<section class="testimonial">
				<a href="http://www.stellaryoung.com/">Stellar Young</a>
				<blockquote>"MTK is a venue that runs on passion.  The staff and space is amazing, and we're thrilled to be a part of such an up and coming place."</blockquote>
			</section>
		</div>
	</div>
</section>

<?php get_footer(); ?>