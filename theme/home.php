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

	<main id="primary" class="py-4 bg-brand-blue-faint md:py-6 lg:py-8">
		<div class="px-1 md:container md:mx-auto md:px-0 ">
			<?php if ( function_exists( 'bcn_display' ) ) { ?>
				<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
			<?php } ?>

			<header class="mb-8 ">
				<h2 class="text-4xl text-brand-blue head-last-bold">A-Z Blog</h2>
				<p class="my-4 font-light">The latest insights, events, and resources as well as emerging accounting, audit, tax, and business trends.</p>
				<div class="text-white bg-brand-blue-faint"><?php echo do_shortcode( '[social_links /]' ); ?></div>
			</header>

			<?php if ( have_posts() ) : ?>
				<div class="flex flex-wrap -m-4">
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
