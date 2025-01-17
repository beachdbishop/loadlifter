<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$args = [
	'post_type' => 'people',
	'meta_query' => [
		'relation' => 'AND',
		'level_clause' => [
			'key'	=> 'll_people_level',
			'value'	=> '400',
			'compare'	=> '<=',
		],
		'lastname_clause' => [
			'key' => 'll_people_last_name',
			'compare' => 'EXISTS',
		],
	],
	'meta_key' => 'll_people_last_name',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'posts_per_archive_page'=> -1,
	'order' => 'ASC',
	'orderby' => 'meta_value',
	'wp_grid_builder'	=> 'wpgb-content-1',
];
/* Sort a query by multiple custom fields */
/* via: https://wordpress.stackexchange.com/a/305930 */

$peopleQuery = new WP_Query( $args );

?>

	<main id="primary" class="page-people  |  bg-white  |  dark:bg-neutral-900">

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-8' ); ?>>
			<div class="px-2 container  |  lg:px-[16px]">
				<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

				<?php if ( $peopleQuery->have_posts() ) : ?>

					<header>
						<h1 class="entry-title text-orient-800  |  dark:text-orient-400">Leadership Team</h1>
					</header>

					<div class="grid grid-cols-1 mt-4  |  md:grid-cols-3 lg:mt-8 lg:grid-cols-4">
						<div class="col-span-1 p-2 border-2 border-solid border-brand-blue rounded-lg  |  lg:rounded-xl md:p-4">
							<?php
							wpgb_render_facet( ['id' => 12, 'grid' => 'wpgb-content-1' ] ); // Autocomplete
							// wpgb_render_facet( ['id' => 6, 'grid' => 'wpgb-content-1' ] ); // Search
							wpgb_render_facet( ['id' => 1, 'grid' => 'wpgb-content-1' ] ); // Location
							wpgb_render_facet( ['id' => 2, 'grid' => 'wpgb-content-1' ] ); // Dept
							wpgb_render_facet( ['id' => 3, 'grid' => 'wpgb-content-1' ] ); // Level
							wpgb_render_facet( ['id' => 4, 'grid' => 'wpgb-content-1' ] ); // Industries
							wpgb_render_facet( ['id' => 8, 'grid' => 'wpgb-content-1' ] ); // Services
							wpgb_render_facet( ['id' => 7, 'grid' => 'wpgb-content-1' ] ); // Reset
							?>
						</div>

						<div class="col-span-1  |  md:col-span-2 lg:col-span-3">
							<div class="wpgb-content-1  |  grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 ">
								<?php /* Start the Loop */
								while ( $peopleQuery->have_posts() ) :
									$peopleQuery->the_post();
									global $post;
									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content/content', 'card-people' );
								endwhile;
								?>
								<?php
								// the_posts_navigation();
								// ll_paging_nav();
								?>
							</div>
						</div>
					</div><?php

				else :

					get_template_part( 'template-parts/content/content', 'none' );

				endif;
				?>
			</div>
		</article><!-- #post-<?php the_ID(); ?> -->

	</main><!-- #main -->

<?php
get_footer();
