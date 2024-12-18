<?php
/*
 * Template Name: Location Page
 * This is the template that displays a single Location
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$page_id                        = get_the_ID();

if ( get_field( 'll_page_title_override' ) ) {
	$page_title                 = get_field( 'll_page_title_override' );
} else {
	$page_title                 = get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

$hero_cta1_text 								= get_field( 'll_hero_cta1_text' );
$hero_cta1_url 									= get_field( 'll_hero_cta1_url' );
$hero_cta2_text									= get_field( 'll_hero_cta2_text' );
$hero_cta2_url 									= get_field( 'll_hero_cta2_url' );


?>

	<main id="primary" class="bg-white dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php echo ll_better_page_hero( $page_title, $page_message, $hero_cta1_text, $hero_cta1_url, $hero_cta2_text, $hero_cta2_url ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="px-2 md:container lg:px-[16px]">
					<div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

						<div <?php ll_content_class( 'll-page-grid-area-a | entry-content md:col-span-2' ); ?>>
							<?php the_content(); ?>
						</div>

						<div class="ll-page-grid-area-b | my-16 md:my-0 md:col-span-3">
							<!-- BBB -->
						</div>

						<div class="ll-page-grid-area-c | ">
							<?php if ( get_field( 'll_normal_contact_form_location' ) == 1 ) : ?>
								<div id="contact" class="container-contact-form not-prose motion-preset-slide-up mb-8 lg:mb-16">
									<?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
								</div>
							<?php endif; ?>

							<?php // get_template_part( 'template-parts/form/form', 'webshare' ); ?>

							<div class="h-1">&nbsp;</div>
						</div>

					</div>
				</div>
			</article>

			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
