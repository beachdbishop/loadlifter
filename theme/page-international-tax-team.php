<?php
/*
 * Template Name: Basic Landing Page
 *
 * This is the template that displays a simplified, distraction-free page. Please note that most internal site links and menus are not shown.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$page_id                        = get_the_ID();
if (get_field('ll_page_title_override')) {
		$page_title                 = get_field('ll_page_title_override');
} else {
		$page_title                 = get_the_title();
}
$page_message                   = get_field( 'll_brand_message' );
$page_excerpt                   = get_the_excerpt();
$page_form                      = get_field( 'll_hs_form_html' );
$page_below_fold_content        = get_field( 'll_below_fold' );
$page_gmap                      = get_field( 'll_page_gmap_url' );
$page_city                      = get_field( 'll_page_city' );
$page_state                     = get_field( 'll_page_state' );
?>

	<main id="primary" class="landing-page | bg-white dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page-lp' );
			?>

			<?php if ( get_field( 'll_hide_featured_image' ) === false ) :
					echo ll_better_page_hero( $page_title, $page_message['label'] );
			endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'lp ' ); ?>>
				<div class="px-2 md:container lg:px-[16px]">
					<div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

						<div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>
							<?php // the_content(); ?>

							<h2 class="wp-block-heading">Meet Our Team</h2>
							<p>Thanks to massive changes in online communication and commerce over the past decades, conducting business in multiple countries is now easier than ever. While the world may be your oyster in terms of cross-border growth, international tax requirements have gotten consistently more complicated, and the penalties for non-compliance can be steep.</p>


						</div>

						<div class="my-16 ll-page-grid-area-b md:my-0 md:col-span-3">

							BBBBB

						</div>

						<div class="ll-page-grid-area-c">
							<div id="contact" class="container-contact-form not-prose">
								<h3>Contact Our Team</h3>
								<p class="text-base my-4">FORM?</p>
							</div>
							<div>&nbsp;</div>
						</div>

					</div>
				</div>
			</article>

			<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
