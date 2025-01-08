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
?>

	<main id="primary" class="py-4 bg-white dark:bg-neutral-900 md:py-6 lg:py-8">
		<div class="px-2 md:container lg:px-[16px] ">
			<?php if ( function_exists( 'bcn_display' ) ) { ?>
				<div class="breadcrumbs  |  font-head text-neutral-600 pb-4  |  md:pb-6 lg:pb-8 dark:text-neutral-400" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
			<?php } ?>

			<header class="mb-8 md:grid md:grid-cols-2 md:gap-16">
				<div class="">
					<h1 class="text-orient-800  |  dark:text-orient-400"><?php echo ll_wrap_last_word( 'A-Z Blog' ); ?></h1>
					<p class="my-4 lg:my-8">The latest insights, events, and resources as well as emerging accounting, audit, tax, and business trends.</p>
				</div>

				<div class="mt-8 lg:mt-0 lg:grid lg:grid-cols-2 lg:gap-16 print:hidden">
					<div><?php if ( function_exists( 'wpgb_render_facet' ) ) {
						wpgb_render_facet( ['id' => 9, 'grid' => 'wpgb-content', ] );
					} ?></div>
					<div><?php if ( function_exists( 'wpgb_render_facet' ) ) {
						wpgb_render_facet( ['id' => 5, 'grid' => 'wpgb-content', ] );
					} ?></div>
				</div>
			</header>

			<?php if ( have_posts() ) : ?>
				<ul class="cards-ic | grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', 'card-ic' );
					endwhile; // End of the loop.
					?>
				</ul>

				<div class="mt-8">
					<?php // ll_paging_nav();
					if ( function_exists( 'wpgb_render_facet' ) ) {
						wpgb_render_facet( ['id' => 11, 'grid' => 'wpgb-content' ] );
					} ?>
				</div>
			<?php else : ?>

				<?php get_template_part( 'template-parts/content/content', 'none' ); ?>

			<?php endif; ?>

		</div>
	</main><!-- #main -->

<?php
get_footer();
