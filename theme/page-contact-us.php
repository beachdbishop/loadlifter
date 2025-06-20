<?php
/**
 * The template for displaying the Contact Us page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$page_id                        = get_the_ID();
if (get_field('ll_page_title_override')) {
	$page_title                = get_field('ll_page_title_override');
} else {
	$page_title                = get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

$page_excerpt                   = get_the_excerpt();
// $hs_form_id 										= 'c8675641-3e68-4ff7-9dc3-ae3636fbf1c8';
?>

	<main id="primary" class="contact-page  |  bg-white  |  dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php if ( get_field( 'll_hide_featured_image' ) === false ) :
				echo ll_better_page_hero( $page_title, $page_message );
			endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php if ( !is_front_page() ) { post_class( 'py-8 lg:py-16' ); } ?>>
				<div class="px-2 container  |  lg:px-[16px]">

					<?php if ( get_field( 'll_hide_featured_image' ) === true ) { ?>
						<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

						<header class="mb-4">
							<?php the_title( '<h1 class="entry-title  |  text-orient-800  |  dark:text-orient-400">', '</h1>' ); ?>
						</header>
					<?php } ?>

					<div <?php ll_content_class( 'entry-content' ); ?>>

						<?php the_content(); ?>

						<div class="grid md:grid-cols-2 gap-8  |  lg:gap-16">

							<div id="contact" class="container-contact-form not-prose mb-8  |  lg:mb-16 motion-safe:animate-fade-in-from-top">
								<?php get_template_part( 'template-parts/form/form', 'hubspot-contact-main' ); ?>
							</div>

							<aside class="space-y-8">
								<?php
								$args = [
									'post_type' => 'locations',
									'post_status' => 'publish',
									'posts_per_page' => -1,
									'posts_per_archive_page'=> -1,
									'order' => 'ASC',
									'orderby' => 'll_loc_sort_order',
								];

								$locationQuery = new WP_Query( $args );

								if ( $locationQuery->have_posts() ) : ?>
									<h2 class="text-3xl text-neutral-600  |  dark:text-neutral-400">Our Locations</h2>
									<ul class="cards-ic grid grid-cols-1 gap-2 mt-0  |  ">
										<?php /* Start the Loop */
										while ( $locationQuery->have_posts() ) :
											$locationQuery->the_post();
											global $post;
											get_template_part( 'template-parts/content/content', 'card-ic' );
										endwhile;
										?>
									</ul>
									<?php

								else :

									get_template_part( 'template-parts/content/content', 'none' );

								endif;
								?>
							</aside>
						</div>

					</div>

				</div>
			</article>

			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
