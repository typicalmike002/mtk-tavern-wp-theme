<?php 
/*
Template Name: Food

*/

<<<<<<< HEAD
$categories = get_post_meta( $post->ID, 'food_menu_values' )[0];

get_header(); ?>

<section class="food-menu">
	<header class="food-menu_title">
		<h3>Rock the Kitchen</h3>
	</header>

	<?php foreach ( $categories as $cat_key => $category ) : ?>
		
		<?php if ( $cat_key % 2 == 0 ) : /* Creates 2 Columns per row */ ?>
			<div class="row gutters">
		<?php endif; ?>

				<div class="column">
					<header class="food-menu_category">
						<h3><?php echo $category['category']; ?></h3>
					</header>
					
					<?php foreach ( $category['sub-categories'] as $sub_cat_key => $sub_category ) : ?>

						<header class="food-menu_sub-category">
							<h4><?php echo $sub_category['sub-category'] . ' ' . $sub_category['price']; ?></h4>
						</header>

						<?php foreach ( $sub_category['food-items'] as $food_item_key => $food_item ) : ?>

							<section class="food-menu_food-item">
								<p><?php echo $food_item['food-item'] . ' ' . $food_item['food-price']; ?></p>
							</section>

						<?php endforeach; /* Ends Food Item Loop */ ?>

					<?php endforeach; /* Ends Sub Category Loop */ ?>
				</div>		

		<?php if ( $cat_key % 2 != 0 ) : /* Creates 2 Columns per row */ ?>
			</div>
		<?php endif; ?>

	<?php endforeach; /* Ends Category Loop */ ?>

</section>

=======
get_header(); ?>

<section class="about_gallery">

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

</section>
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc
<?php get_footer(); ?>