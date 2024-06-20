<?php
/*
 * Template Name: Cybersecurity Landing Page
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
$page_gmap                      = get_field( 'll_page_gmap_url' );
$page_city                      = get_field( 'll_page_city' );
$page_state                     = get_field( 'll_page_state' );
?>

	<main id="primary" class="landing-page lp-cyber | bg-white dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page-lp-cyber' );
			?>

			<?php if ( get_field( 'll_hide_featured_image' ) === false ) :
					echo ll_better_page_hero( $page_title, $page_message['label'] );
			endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'lp lp-cyber' ); ?>>
				<div class="px-2 md:container lg:px-[16px]">
					<div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

						<div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>
							<?php the_content(); ?>
						</div>

						<div class="my-16 ll-page-grid-area-b md:my-0 md:col-span-3">
							<h3>Certified Experts</h3>
							<?php echo do_shortcode( '[cybercertlogos /]' ); ?>

							<!-- wp:spacer {"className":"is-style-xs"} -->
							<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-xs"></div>
							<!-- /wp:spacer -->

							<?php
							if ( $page_gmap ) :
								echo '<section class="w-screen ml-[50%] -translate-x-1/2 relative h-[600px] overflow-hidden bg-brand-neutral-200 print:hidden">';
									echo '<div class="absolute inset-0">';
										echo '<iframe src="' . $page_gmap . '" width="100%" height="600px" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Map of ' . $page_city . ', ' . $page_state . '"></iframe>';
									echo '</div>';
								echo '</section>';
							endif;
							?>
						</div>

						<div class="ll-page-grid-area-c">
							<?php if ( $page_form ) :
								echo '<div id="contact" class="container-contact-form not-prose">';
								echo do_shortcode( $page_form );
								echo '</div>';
							endif; ?>

							<div>&nbsp;</div>
						</div>

					</div>
				</div>
			</article>

		<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
