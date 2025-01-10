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

$page_id                        = get_the_ID();
if (get_field('ll_page_title_override')) {
     $page_title                = get_field('ll_page_title_override');
} else {
     $page_title                = get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

$page_excerpt                   = get_the_excerpt();
?>

	<main id="primary" class="bg-white  |  dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page' );
			?>

			<?php if ( get_field( 'll_hide_featured_image' ) === false ) :
					echo ll_better_page_hero( $page_title, $page_message );
			endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php if ( !is_front_page() ) { post_class( 'py-8' ); } ?>>
				<div class="px-2  |  md:container lg:px-[16px]">

					<?php if ( get_field( 'll_hide_featured_image' ) === true ) { ?>
						<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

						<header class="mb-4">
							<?php the_title( '<h1 class="entry-title  |  text-orient-800  |  dark:text-orient-400">', '</h1>' ); ?>
						</header>
					<?php } ?>

					<div <?php ll_content_class( 'entry-content' ); ?>>

						<?php the_content(); ?>

						<div class="clear-both">&nbsp;</div>

						<?php
						wp_link_pages(
							array(
								'before' => '<div>' . esc_html__( 'Pages:', 'loadlifter' ),
								'after'  => '</div>',
							)
						);
						?>
					</div>

					<?php get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

				</div>
			</article>

			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
