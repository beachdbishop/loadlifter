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

			<header class="flex gap-4 mb-8">
				<div class="basis-2/3">
					<h1 class="text-brand-blue head-last-bold">A-Z Blog</h1>
					<p class="my-4 font-light lg:my-8">The latest insights, events, and resources as well as emerging accounting, audit, tax, and business trends.</p>
					<div class="text-neutral-600"><?php echo do_shortcode( '[social_links /]' ); ?></div>
				</div>
				<?php if ( is_user_logged_in() ) { ?>
					<div class="p-4 border-2 border-dashed basis-1/3 rounded-xl border-brand-blue-pale">
						<p class="italic">This control only appears for viewers logged into WordPress. Use it to filter the list of posts within a date range.</p>
						<?php if ( function_exists( 'wpgb_render_facet' ) ) { wpgb_render_facet( ['id' => 5, 'grid' => 'wpgb-content', ] ); } // Date Range Picker ?>
					</div>
				<?php } ?>
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
