<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();
?>

	<main id="primary" class="py-8 bg-white  |  dark:bg-neutral-800">
		<div class="px-2 container  |  lg:px-[16px]">
			<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

			<?php if ( have_posts() ) : ?>

				<header>
					<?php
					the_archive_title( '<h2 class="entry-title text-orient-800  |  dark:text-orient-400">', '</h2>' );
					the_archive_description( '<div class="font-head">', '</div>' );
					?>
				</header>


				<?php // <ul class="grid grid-cols-1 gap-8 -mx-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"> ?>
				<ul class="cards-ic grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 lg:gap-8">
					<?php /* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content/content', 'card-ic' );

					endwhile;
					?>
				</ul>

				<div class="mt-8">
					<?php // ll_paging_nav();
					if ( function_exists( 'wpgb_render_facet' ) ) {
							wpgb_render_facet( ['id' => 11, 'grid' => 'wpgb-content' ] );
					} ?>
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
