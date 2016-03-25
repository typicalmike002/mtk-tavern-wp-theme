<?php /*
/*
Template Name: Calendar

Link : www.codeofaninja.com/2011/07/display-facebook-events-to-your-website.html

*/

include dirname(__FILE__) . '/../classes/FacebookAPIConnect.php';
$facebookAPIConnect = new FacebookAPIConnect();

<<<<<<< HEAD
$event_data = $facebookAPIConnect->{'event_data'}();

$event_count = count($event_data);
=======
$obj = $facebookAPIConnect->{'event_data'}();

$event_count = count($obj['data']);
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc

$i = 0;

get_header(); ?>

<section class="calendar">
	<?php while ($i < $event_count) : 

		// Set timezone.
<<<<<<< HEAD
		date_default_timezone_set($event_data[$i]['timezone']);

		$start_date = date( 'l, F d, Y', strtotime($event_data[$i]['start_time']));
		$start_time = date('g:i a', strtotime($event_data[$i]['start_time']));

		$image = isset($event_data[$i]['cover']) ? $event_data[$i]['cover'] : "https://graph.facebook.com/{$fb_page_id}/picture?type=large";

		$eid = $event_data[$i]['id'];
		$name = $event_data[$i]['name'];
		$description = isset($event_data[$i]['description']) ? $event_data[$i]['description'] : "No description is avalible for this event.  Click details below for more information.";
=======
		date_default_timezone_set($obj['data'][$i]['timezone']);

		$start_date = date( 'l, F d, Y', strtotime($obj['data'][$i]['start_time']));
		$start_time = date('g:i a', strtotime($obj['data'][$i]['start_time']));

		$image = isset($obj['data'][$i]['cover']['source']) ? $obj['data'][$i]['cover']['source'] : "https://graph.facebook.com/{$fb_page_id}/picture?type=large";

		$eid = $obj['data'][$i]['id'];
		$name = $obj['data'][$i]['name'];
		$description = isset($obj['data'][$i]['description']) ? $obj['data'][$i]['description'] : "No description is avalible for this event.  Click details below for more information.";
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc

		?>

		<?php if ( $i == 0) : ?>
			<section class="event_coming-soon">
				<h2>Coming Soon to MTK Tavern</h2>
				<div class="row gutters">
					<div class="column">

						<!-- Event Title -->
						<header class="event">
							<h3><?php echo $name; ?></h3>
						</header>
					</div>
				</div>

				<div class="row gutters">
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
							href="<?php echo 'https://www.facebook.com/share.php?app_id=' . $fb_app_id . '&sdk=joey' . '&u=https%3A%2F%2Fwww.facebook.com%2Fevents%2F' . $eid . '&display=popup&ref=plugin&src=share_button' ?>" 
							target="_blank">Share</a>
						</div>
					</div>
				</div>
			</section>
		<?php else : ?>

			<?php if ( $i % 2 != 0 && $i != $event_count - 1 ) : ?>
				<div class="row gutters">
			<?php endif; ?>

				<?php if ( $i != $event_count - 1 || $i % 2 == 0 ) : ?>
					<div class="column">
				<?php endif; ?>

					<?php if ( $i % 2 != 0 && $i == $event_count -1 ) : ?>
						<div class="last_event">
					<?php endif; ?>

						<section class="event">
							<div class="row gutters">
								<div class="column">

									<!-- Event Title -->
									<header class="event">
										<h3><?php echo $name; ?></h3>
									</header>
								</div>
							</div>

							<div class="row gutters">
								<div class="column">

									<!-- Event Image -->
									<div class="event_image lazy"
									data-original="<?php echo $image; ?>"
<<<<<<< HEAD
									style="background-image: url(<?php echo $image; ?>);"></div>
=======
									style="background-image: url(<?php echo $image; ?>); width: 100%; height: 225px;"></div>
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc
								</div>
							</div>

							<div class="row gutters">
								<div class="column">
									
									<!-- Event Date -->
									<section class="event_date">
										<p><?php echo $start_date . ' at ' . $start_time; ?></p>
									</section>
								</div>
							</div>

							<div class="row gutter">
								<div class="column event-links_container">
									
									<!-- Details -->
									<div class="event_details">
										<a class="event_link" 
										href="<?php echo 'https://www.facebook.com/events/' . $eid; ?>" target='_blank'>Details</a>
									</div>

									<!-- Share -->
									<div class="event_share">
										<a class="event_link" 
										href="<?php echo 'https://www.facebook.com/share.php?app_id=' . $fb_app_id . '&sdk=joey' . '&u=https%3A%2F%2Fwww.facebook.com%2Fevents%2F' . $eid . '&display=popup&ref=plugin&src=share_button' ?>" 
										target="_blank">Share</a>
									</div>
								</div>
							</div>
						</section>

					<?php if ( $i % 2 != 0 && $i == $event_count -1 ) : ?>
						</div><!-- End "last_event" -->
					<?php endif; ?>

				<?php if ( $i != $event_count - 1 || $i % 2 == 0 ) : ?>
					</div><!-- End "column" -->
				<?php endif; ?>
	
			<?php if ( $i % 2 == 0 && $i != $event_count - 1 ) : ?>
				</div><!-- End "row" -->
			<?php endif; ?>

		<?php endif; ?>
	<?php $i++; endwhile; ?>
</section>
<?php get_footer(); ?>