<?php
/**
 * The template for displaying the Locations page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$page_id = get_the_ID();
if ( get_field( 'll_page_title_override' ) ) {
	$page_title = get_field( 'll_page_title_override' );
} else {
	$page_title = get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message = get_field( 'll_custom_subheader' );
} else {
	$brand_message = get_field( 'll_brand_message' );
	$page_message = $brand_message['label'];
}

$page_excerpt = get_the_excerpt();
?>

	<main id="primary" class="bg-white  |  dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php if ( get_field( 'll_hide_featured_image' ) === false ) :
				echo ll_better_page_hero( $page_title, $page_message );
			endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-8 lg:py-16' ); ?>>
				<div class="px-2 container  |  lg:px-[16px]">

					<?php if ( get_field( 'll_hide_featured_image' ) === true ) { ?>
						<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

						<header class="mb-4">
							<?php the_title( '<h1 class="entry-title  |  text-orient-800  |  dark:text-orient-400">', '</h1>' ); ?>
						</header>
					<?php } ?>

					<div <?php ll_content_class( 'entry-content' ); ?>>

						<div class="lg:max-w-[900px]">
							<?php the_content(); ?>
						</div>

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
						?>

						<?php if ( $locationQuery->have_posts() ) : ?>
							<div class="grid gap-8 mt-8  |  lg:grid-cols-3 lg:gap-12">
								<div class="lg:col-span-2">
									<ul class="cards-ic grid grid-cols-1 gap-4 mt-0  |  md:grid-cols-2 md:gap-8">
										<?php /* Start the Loop */
										while ( $locationQuery->have_posts() ) :
											$locationQuery->the_post();
											global $post;
											get_template_part( 'template-parts/content/content', 'card-ic' );
										endwhile;
										?>
									</ul>
								</div>

								<aside class="">
									<div id="contact" class="container-contact-form not-prose motion-preset-slide-up mb-8  |  lg:mb-16">
										<?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
									</div>
									<!--   A R E A   S I D E   -->
									<?php get_template_part( 'template-parts/siteblocks/area', 'side' ); ?>
								</aside>

							</div>
							<?php

						else :

							get_template_part( 'template-parts/content/content', 'none' );

						endif;
						?>

						<div class="clear-both">&nbsp;</div>

					</div>

				</div>
			</article>

			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
