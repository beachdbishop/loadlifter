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

$q_args = [
	'post_type' => 'people',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'orderby' => 'menu_order title'
];
$query = new WP_Query( $q_args );
?>

	<main id="primary" class="page-people | bg-white">

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4 lg:py-8 ' ); ?>>
			<div class="px-1 md:container md:mx-auto md:px-0">
				<?php if ( function_exists( 'bcn_display' ) ) { ?>
					<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
				<?php } ?>

				<?php if ( have_posts() ) : ?>

					<header>
						<h2 class="entry-title todo">Our Leadership Team / Our People / ???</h2>
						<div class="font-head lg:text-xl todo">Lorem ipsum something our team something something.</div>
						<hr>
						<p>Questions Daniel has about this page:</p>
						<ol class="">
							<li class="list-item">Should we only show people in 3 columns* to give more breathing room between their 'cards'?</li>
							<li class="list-item">x</li>
							<li class="list-item">x</li>
						</ol>
						<p class="text-sm text-neutral-700">* - <em>on larger screens. This will only show 1 column wide on phones, and 2 columns wide on tablets.</em></p>
					</header>

					<div class="grid grid-cols-1 mt-4 md:grid-cols-3 lg:mt-8 lg:grid-cols-4">
						<div class="col-span-1 p-2 rounded-xl bg-brand-blue-faint md:p-4">
							<?php wpgb_render_facet( ['id' => 6, 'grid' => 'wpgb-content' ] ); // Search ?>
							<?php wpgb_render_facet( ['id' => 1, 'grid' => 'wpgb-content' ] ); // Location ?>
							<?php wpgb_render_facet( ['id' => 2, 'grid' => 'wpgb-content' ] ); // Dept ?>
							<?php wpgb_render_facet( ['id' => 3, 'grid' => 'wpgb-content' ] ); // Level ?>
							<?php wpgb_render_facet( ['id' => 4, 'grid' => 'wpgb-content' ] ); // Industries ?>
							<?php wpgb_render_facet( ['id' => 7, 'grid' => 'wpgb-content' ] ); // Industries ?>
						</div>

						<div class="col-span-1 md:col-span-2 lg:col-span-3">
							<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4">
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
get_sidebar();
get_footer();
