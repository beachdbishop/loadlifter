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

	<main id="primary" class="py-4 bg-brand-gray-faint md:py-6 lg:py-8">
		<div class="px-1 md:container md:mx-auto md:px-0 ">
			<?php if ( function_exists( 'bcn_display' ) ) { ?>
				<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
			<?php } ?>

			<?php if ( have_posts() ) : ?>

				<header>
					<?php
					the_archive_title( '<h2 class="entry-title ">', '</h2>' );
					the_archive_description( '<div class="font-head">', '</div>' );
					?>
				</header>


				<div class="grid grid-cols-1 gap-8 -mx-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
					<?php /* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content/content', 'card' );

					endwhile;
					?>
				</div>
				<?php
				// the_posts_navigation();
				ll_paging_nav();

			else :

				get_template_part( 'template-parts/content/content', 'none' );

			endif;
			?>

		</div>
	</main><!-- #main -->

<?php
get_footer();
