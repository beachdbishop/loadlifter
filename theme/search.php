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

	<main id="primary" class="py-4 md:py-6 lg:py-8">

		<div class="px-1 md:container md:mx-auto md:px-0 ">

			<?php if ( function_exists( 'bcn_display' ) ) { ?>
				<div class="breadcrumbs | font-head text-neutral-600 pb-4 md:pb-6 lg:pb-8 dark:text-neutral-400" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
			<?php } ?>

			<?php if ( have_posts() ) : ?>

				<header>
					<h1 class="entry-title | has-huge-font-size dark:text-neutral-200">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'loadlifter' ), '<span class="px-2 text-black rounded bg-yellow-400/75">' . get_search_query() . '</span>' );
						?>
					</h1>
				</header>

				<div class="search-results | prose lg:prose-xl max-w-none grid md:grid-cols-3 lg:grid-cols-4">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content/content', 'card' );
					endwhile;
					?>
				</div>
				<?php ll_paging_nav(); ?>

			<?php
			else :

				get_template_part( 'template-parts/content/content', 'none' );

			endif;
			?>
		</div>

	</main><!-- #main -->

<?php
get_footer();
