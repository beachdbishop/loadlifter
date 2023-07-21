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

	<main id="primary" class="py-4 bg-brand-gray-faint md:py-6 lg:py-8">
		<div class="px-1 md:container md:mx-auto md:px-0 ">
			<?php if ( function_exists( 'bcn_display' ) ) { ?>
				<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
			<?php } ?>

			<header class="md:grid md:grid-cols-2 md:gap-16 mb-8">
				<div class="">
					<h1 class="text-brand-blue head-last-bold">A-Z Blog</h1>
					<p class="my-4 font-light lg:my-8">The latest insights, events, and resources as well as emerging accounting, audit, tax, and business trends.</p>
					<div class="text-brand-blue"><?php echo do_shortcode( '[social_links /]' ); ?></div>
				</div>

                <div class="mt-8 lg:mt-0 lg:grid lg:grid-cols-2 lg:gap-16">
                    <div><?php if ( function_exists( 'wpgb_render_facet' ) ) {
                        wpgb_render_facet( ['id' => 9, 'grid' => 'wpgb-content', ] );
                    } ?></div>
                    <div><?php if ( function_exists( 'wpgb_render_facet' ) ) {
                        wpgb_render_facet( ['id' => 5, 'grid' => 'wpgb-content', ] );
                    } ?></div>
                </div>
			</header>

			<?php if ( have_posts() ) : ?>
				<div class="grid gap-8 -m-4 grid-auto-fit-xl">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', 'card' );
					endwhile; // End of the loop.
					?>
				</div>
				<div>
					<?php ll_paging_nav(); ?>
				</div>
			<?php else : ?>

				<?php get_template_part( 'template-parts/content/content', 'none' ); ?>

			<?php endif; ?>

		</div>
	</main><!-- #main -->

<?php
get_footer();
