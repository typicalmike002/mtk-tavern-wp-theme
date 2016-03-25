<?php
/**
 * Template for the home page.
 *
 *
 * @package  WordPress
 * @subpackage  MTK Tavern
 * @version 1.0
 */

global $post;

// Sets up the rotator image gallery displayed on the front-page.
$rotator_query_args = array(
	'post_type' 	=> 'attachment',
	'post_status' 	=> 'inherit',
	'meta_query' 	=> array(
		array(
			'key' 	=> 'rotator',
			'value' => 'on'
		)
	)
);

$rotator_query = new WP_Query( $rotator_query_args );



// Sets the coming soon data using facebook.
include('classes/FacebookAPIConnect.php');
$facebookAPIConnect = new FacebookAPIConnect();

$event_data = $facebookAPIConnect->{'event_data'}();
$coming_soon = $event_data[0];

// Sets up the variables used for the coming soon section below.
date_default_timezone_set($coming_soon['timezone']);
$start_date = date( 'l, F d, Y', strtotime($coming_soon['start_time']));
$start_time = date('g:i a', strtotime($coming_soon['start_time']));
$image = isset($coming_soon['cover']) ? $coming_soon['cover'] : "https://graph.facebook.com/{$fb_page_id}/picture?type=large";
$eid = $coming_soon['id'];
$name = $coming_soon['name'];
$description = isset($coming_soon['description']) ? $coming_soon['description'] : "No description is avalible for this event.  Click details below for more information.";
 

get_header(); ?>

<section class="rotator">
	<ul class="bxslider bxslider_hidden">
		<?php while ( $rotator_query->have_posts() ) : ?>
			<?php $rotator_query->the_post(); ?>
			<a href="<?php echo esc_url( get_page_link( get_page_by_title( 'about' )->ID ) . 'gallery' ); ?>">
				<?php if ( wp_is_mobile() ) : ?>
					<li style="background-image: url(<?php echo wp_get_attachment_image_src( $post->ID, 'small' )[0]; ?>);"></li>
				<?php else : ?>
					<li style="background-image: url(<?php echo wp_get_attachment_image_src( $post->ID, 'large' )[0]; ?>);"></li>
				<?php endif; ?>
			</a>
		<?php endwhile; ?>
	</ul>
</section>

<section class="featured-event">
	<h2>Coming Soon to MTK Tavern</h2>
	<div class="row gutters">
		<div class="column">

			<!-- Event Title -->
			<header class="event">
				<h3><?php echo $name; ?></h3>
			</header>
		</div>
	</div>

	<div class="row row_align-top gutters">
		<div class="column">

			<!-- Event Image -->
			<div class="event_coming-soon_image lazy"
			style="background-image: url(<?php echo $image; ?>);"></div>
		</div>
		<div class="column">
			
			<!-- Event Description -->
			<section class="event_description">
				<p><?php echo $description; ?></p>
			</section>
		</div>
	</div>

	<div class="row gutters row">
		<div class="column">
			
			<!-- Event Date -->
			<section class="event_date">
				<p><?php echo $start_date . ' at ' . $start_time; ?></p>
			</section>
		</div>
		<div class="column event-links_container">
			
			<!-- Details -->
			<div class="event_details">
				<a class="event_link" 
				href="<?php echo 'https://www.facebook.com/events/' . $eid; ?>" target='_blank'>Details</a>
			</div>

			<!-- Share -->
			<div class="event_share">
				<a class="event_link" 
				href="<?php echo esc_url( get_page_link( get_page_by_title( 'calendar' )->ID ) ); ?>" >Calendar</a>
			</div>
		</div>
	</div>
</section>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>
