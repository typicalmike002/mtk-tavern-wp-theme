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
