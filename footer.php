<?php
/**
 * Contains the closing </main> tag.  'footer.php' is the template 
 * for the footer content.
 *
 *
 * @package  WordPress
 * @subpackage  MTK Tavern
 * @version 1.0
 */
?>

	</main><!-- End Main -->
</div><!-- End Wrap -->

<!-- footer -->
<footer id="footer" role="contentinfo">

<<<<<<< HEAD
	<!-- Header Row -->
	<div class="row">
		
		<div class="column_thrd">
			<header>
				<h2>Indie Rock</h2>
			</header>
		</div>

		<div class="column_thrd">
			<!-- Column with no content -->
		</div>

		<div class="column_thrd">
			<header>
				<h2>Music To Know</h2>
			</header>
		</div>
	</div>

	<!-- Main Content Row -->
	<div class="row">
		
		<!-- Hours Column -->
		<div class="column_thrd">
			<section class="hours">
				<header><h3>Hours</h3></header>
				<p>Monday - Saturday<br />5:00PM to 2:00 AM</p>
				<p>Sunday<br />1:00PM to 8:00PM</p>
			</section>
		</div>

		<!-- Email & Hashtag Column -->
		<div class="column_thrd">
			<h3>#SoundsAboutRight</h3>
			<div class="icon">
				<div class="line"></div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mtk-star.png">
				<div class="line"></div>
			</div>
			<section class="email">
				<h3>Email</h3>
				<p>pam@mtktavern.com</p>
			</section>
		</div>

		<!-- Phone Number and Address Colunn -->
		<div class="column_thrd">
			<section class="phone-number">
				<h3>Phone</h3>
				<p>(914) 218-3334</p>
			</section>
			<address>
				<h3>Address</h3>
				<p>30 E. Main St. MT Kisco, NY</p> 
			</address>
		</div>
	</div>
	
	<!-- Copyright Information Row -->
	<div class="row">
		
=======
	<!-- Sounds About Right -->
	<div class="row gutters">
		<div class="column">
			<h2>#SoundsAboutRight</h2>
		</div>
	</div>

	<div class="row gutters">
		
		<!-- Hours -->
		<div class="column">
			<section class="hours">
				<h3>Hours</h3>
				<p class="hours_time">Monday - Saturday<br />5:00PM to 2:00AM</p>
				<p class="hours_time">Sunday<br />1:00PM to 8:00PM</p>
			</section>
		</div>

		<!-- Icon -->
		<div class="column">
			<section class="icon">
				<h3>Indie Rock</h3>
				<img src="<?php echo esc_url( bloginfo( 'template_url' ) . '/images/mtk-star.png'); ?>">
				<h3>Music to Know</h3>
			</section>
		</div>

		<div class="column">
			<section class="footer_phone">
				<h3>Phone</h3>
				<p>(914) 218-3334</p>
			</section>
			<address class="footer_address">
				<h3>Address</h3>
				<p>30 E. Main St. Mt Kisco, NY</p> 
			</address>
		</div>
	</div>

	<div class="row gutters">
		
		<!-- Copyright Information -->
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc
		<div class="column">
			<section class="copyright">
				<p>&copy; <?php echo date("Y"); ?> MTK Tavern, LLC</p>
			</section>
		</div>
	</div>

</footer>

<!-- Includes scripts and final tags. -->
<?php wp_footer(); ?>
</body>
</html>