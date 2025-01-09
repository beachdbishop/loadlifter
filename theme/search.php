<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Load_Lifter
 */

get_header();
?>

	<main id="primary" class="py-8 bg-white  |  dark:bg-neutral-900">

		<div class="px-2 md:container lg:px-[16px]">

			<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

			<?php if ( have_posts() ) : ?>

				<header>
					<h1 class="entry-title | has-huge-font-size dark:text-neutral-200">
						<?php
						printf( esc_html__( 'Search results for: %s', 'loadlifter' ), '<span class="relative inline-block before:block before:absolute before:-inset-1 before:bg-orient-200 before:rounded dark:before:bg-orient-600"><span class="relative px-2 font-bold text-neutral-950 dark:text-white">' . get_search_query() . '</span></span>' );
						?>
					</h1>
				</header>

				<div class="search-results | prose lg:prose-xl max-w-none grid gap-2 md:grid-cols-3 md:gap-4 lg:grid-cols-4">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content/content', 'card-ic' );
					endwhile;
					?>
				</div>

				<?php // ll_paging_nav();
				if ( function_exists( 'wpgb_render_facet' ) ) {
						wpgb_render_facet( ['id' => 11, 'grid' => 'wpgb-content' ] );
				} ?>

			<?php
			else :

				get_template_part( 'template-parts/content/content', 'none' );

			endif;
			?>
		</div>

	</main><!-- #main -->

<?php
get_footer();
