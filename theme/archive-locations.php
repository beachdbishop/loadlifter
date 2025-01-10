<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

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

	<main id="primary" class="py-8 bg-white  |  dark:bg-neutral-800">

		<div class="px-2  |  md:container lg:px-[16px]">
			<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

			<?php if ( $locationQuery->have_posts() ) : ?>
				<header>
					<?php
					// the_archive_title( '<h2 class="entry-title dark:text-neutral-200">', '</h2>' );
					// the_archive_description( '<div class="font-head">', '</div>' );
					?>
					<h1 class="text-orient-800  |  dark:text-orient-400">Locations</h1>
					<p class="my-4  |  lg:my-8">We provide accounting, assurance, tax, and advisory services from our offices in Arizona and Nevada.</p>
				</header>

				<div class="grid gap-8  |  lg:grid-cols-3 lg:gap-12">
					<div class="lg:col-span-2">
						<ul class="cards-ic grid grid-cols-1 gap-4 mt-0  |  md:grid-cols-2">
							<?php /* Start the Loop */
							while ( $locationQuery->have_posts() ) :
								$locationQuery->the_post();
								global $post;
								get_template_part( 'template-parts/content/content', 'card-ic' );
							endwhile;
							?>
						</ul>
						<div class="mt-8">
							<?php // ll_paging_nav();
							// I don't think we need pagination at this point.
							// if ( function_exists( 'wpgb_render_facet' ) ) {
							// 	wpgb_render_facet( ['id' => 11, 'grid' => 'wpgb-content' ] );
							// }
							?>
						</div>
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
		</div>
	</main><!-- #main -->

<?php
get_footer();
