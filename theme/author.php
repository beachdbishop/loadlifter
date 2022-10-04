<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$author_id = 'user_' . get_the_author_meta( 'ID' );
$author_user = get_userdata( get_the_author_meta( 'ID' ) );
$author_name = $author_user->display_name; // core field
$author_url = $author_user->user_url; // core field
$author_desc = $author_user->description; // core field
$author_desc_fb = "Review the comprehensive list of blog posts and insights on accounting, tax, and audit from {$author_name} - Phoenix Tucson AZ.";
/* Note re: SEO desc: https://yoast.com/video/ask-yoast-meta-descriptions-and-the-excerpt-field/ */
$author_desigs = get_field( 'll_designations', $author_id ); // ACF
$author_title = get_field( 'll_title', $author_id ); // ACF
$author_thumbnail = get_field( 'll_headshot', $author_id ); // ACF
$author_org = get_field( 'll_organization', $author_id ); // ACF
// $author_industries = get_field( 'user_industry_areas', $author_id ); // ACF
// $author_services = get_field( 'user_services', $author_id ); // ACF
// $author_seotitle = get_user_meta( get_the_author_meta( 'ID' ), 'wpseo_title', true ); // Yoast SEO
?>

	<main id="primary" class=" bg-neutral-50">
		<div class="py-8 mb-4 md:mb-8 lg:mb-24 md:py-12 lg:py-24 bg-gradient-to-r from-brand-gray-pale print:py-8">
			<div class="px-1 md:container md:mx-auto md:px-0">
				<div class="w-full md:w-1/2 lg:w-1/3">
					<header class="mb-4">
						<?php // the_title( '<h1 class="mb-2 text-lg lg:text-xl text-brand-blue-faint" id="page-title">', '</h1>' ); ?>
						<h1 class="text-neutral-600">Articles by <span class="text-brand-blue"><?php echo $author_name; ?></span></h1>
						<p class="todo">more author meta</p>
					</header>
				</div>
				<?php if ( function_exists( 'bcn_display' ) && !is_front_page() ) { ?>
					<div class="breadcrumbs | font-head text-brand-gray-faint mt-4 md:mt-6 lg:mt-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
				<?php } ?>
			</div>
		</div>

		<div class="px-1 md:container md:mx-auto md:px-0 ">

			<?php if ( have_posts() ) : ?>

				<div class="grid grid-cols-1 gap-8 -mx-4 md:grid-cols-2 lg:grid-cols-4">
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
