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
				<p>30 E. Main St. MT Kisco, NY</p> 
			</address>
		</div>
	</div>

	<div class="row gutters">
		
		<!-- Copyright Information -->
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