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

	<main id="primary" class="page-industries | ">

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4 lg:py-8 ' ); ?>>
			<div class="px-1 md:container md:mx-auto md:px-0">
				<?php if ( function_exists( 'bcn_display' ) ) { ?>
					<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
				<?php } ?>

				<?php if ( have_posts() ) : ?>

					<header>
						<?php
						the_archive_title( '<h2 class="entry-title ">', '</h2>' );
						the_archive_description( '<div class="font-head lg:text-xl">', '</div>' );
						?>
					</header>


					<div class="flex flex-wrap -m-4">
						<?php /* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content/content', 'card-people' );

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
		</article><!-- #post-<?php the_ID(); ?> -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
