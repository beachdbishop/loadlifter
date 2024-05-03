<?php
/*
 * Template Name: Service or Industry Page
 * This is the template that displays Services or Industry pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$page_id                        = get_the_ID();
$page_id_industries             = ( wp_get_environment_type() == 'local' ) ? '3196' : '31923';

if ( get_field( 'll_page_title_override' ) ) {
	$page_title                 = get_field( 'll_page_title_override' );
} else {
	$page_title                 = get_the_title();
}

$page_icon											= ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : false;
$page_message 									= get_field( 'll_brand_message' );
$page_excerpt 									= get_the_excerpt();
$page_post_category							= get_field( 'll_ind_category' );
$page_cta_standard 							= get_field( 'll_ind_show_standard_cta' );
$page_cta_heading 							= get_field( 'll_ind_cta_heading' );
$page_cta_body 									= get_field( 'll_ind_cta_body' );
$page_cta_button_text 					= get_field( 'll_ind_cta_button_text' );
$page_cta_html 									= get_field( 'll_ind_cta_html' );
$page_groups_html 							= get_field( 'll_ind_groups_html' );
$page_people 										= get_field( 'll_ind_people' );
$page_people_display 						= get_field( 'll_ind_people_display_style' );
$page_form 											= get_field( 'ls_hs_form_html' );
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

			<?php echo ll_better_page_hero( $page_title, $page_message['label'], $hero_cta1_text, $hero_cta1_url, $hero_cta2_text, $hero_cta2_url ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="px-2 md:container lg:px-[16px]">
					<div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

						<div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>
							<?php the_content(); ?>
						</div>

						<div class="my-16 ll-page-grid-area-b md:my-0 md:col-span-3">

							<?php if ( $page_post_category ) : ?>
								<section class="full-bleed not-prose bg-neutral-800 text-neutral-100 ll-equal-vert-padding print:bg-transparent">
									<div class="post-grid | px-2 md:container lg:px-[16px]">
										<div class="flex items-center justify-between mb-4">
											<h2>Insights</h2>
											<div class="wp-block-buttons is-content-justification-right is-layout-flex wp-container-3 wp-block-buttons-is-layout-flex print:hidden">
												<div class="wp-block-button is-style-outline"><a href="/blog/" class="wp-block-button__link has-white-color has-text-color wp-element-button">View All</a></div>
											</div>
										</div>
										<?php echo do_shortcode( '
											[display-posts
											taxonomy="category"
											tax_term="' . $page_post_category->slug . '"
											tax_operator="IN"
											taxonomy_2="category"
											tax_2_term="archived-events"
											tax_2_operator="NOT IN"
											orderby="date"
											order="DESC"
											posts_per_page="3"
											wrapper="ul"
											wrapper_class="dps-grid-3max cards-ic"
											layout="card-ic-min" /]
										' ); ?>
									</div>
								</section>
								<?php /* The visual gap Eric requested between Insights and the CTA section */ ?>
								<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-md"></div>
							<?php endif; ?>

							<?php /* CTA
							* TODO: Should this get maybe turned into a template part?
							*/
							if ( $page_cta_standard ) :
								// echo '<section class="full-bleed ll-equal-vert-padding not-prose text-neutral-100 bg-gradient-70 from-brand-blue-dark from-30% via-brand-blue via-50% to-brand-blue-dark to-90% bg-180pct break-inside-avoid print:animate-none print:bg-transparent">
								echo '<section class="cta | full-bleed ll-equal-vert-padding not-prose bg-brand-blue text-neutral-50 break-inside-avoid print:bg-transparent">
									<svg viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden h-[100vh] border-0 shadow-none max-w-none max-h-none object-cover absolute top-0 right-0 bottom-0 left-0 z-0 | md:block motion-safe:md:animate-move-bg print:hidden">
										<defs>
											<linearGradient id="blue" gradientTransform="rotate(10)">
												<stop offset="50%" stop-color="rgb(9 47 66 / 1)" />
												<stop offset="80%" stop-color="rgb(0 102 142 / 1)" />
											</linearGradient>
										</defs>
										<rect x="0" y="0" width="400" height="400" fill="url(#blue)" />
									</svg>

									<div class="px-2 z-10 md:container lg:px-[16px]">
										<div class="flex flex-col items-start gap-4 sm:flex-row sm:items-center lg:gap-8">
											<div class="prose lg:prose-xl ">
												<h2 class="mb-2 text-brand-blue-faint text-shadow shadow-brand-blue-dark print:text-shadow-none">' . $page_cta_heading . '</h2>
												<p class="text-neutral-100 text-shadow shadow-brand-blue-dark print:text-shadow-none">' . $page_cta_body . '</p>
												<p class="hidden print:mt-8 print:block">Email info@beachfleischman.com</p>
											</div>
											<div class="w-full md:max-w-fit print:hidden">
												<div class="wp-block-button"><a class="border-2 wp-block-button__link wp-element-button has-brand-blue-dark-background-color has-background-color border-brand-blue-dark hover:border-brand-blue-faint hover:text-brand-blue-faint" href="#contact">' . $page_cta_button_text . '</a></div>
											</div>
										</div>
									</div>

								</section>';
							elseif ( ( $page_cta_standard == false ) && ( !empty( $page_cta_html ) ) ) :
									echo do_shortcode( $page_cta_html );
							endif;
							?>

							<?php // SERVICE PROFESSIONALS AND INVOLVEMENT   ?>
							<?php if ( ( $page_people_display != 'hide' ) || ( !empty( $page_groups_html ) ) ) : ?>
							<section class="full-bleed not-prose ll-equal-vert-padding">
								<div class="px-2 md:container lg:px-[16px]">
									<?php if ( ( $page_people ) && ( $page_people_display != 'hide' ) ) : ?>

										<h2>
										<?php
											if ( $post->post_parent == $page_id_industries ) {
												echo ( ( ll_is_plural( $page_people ) ) ? 'Industry Professionals' : 'Industry Professional' );
											} else {
												echo ( ( ll_is_plural( $page_people ) ) ? 'Our Advisors' : 'Our Advisor' );
											}
										?>
										</h2>

										<?php
										if ( $page_people_display === 'slider' ) :
											echo do_shortcode( '[display-posts post_type="people" id="' . implode( ', ', $page_people ) . '" posts_per_page="-1" meta_key="ll_people_last_name" orderby="meta_value" order="ASC" wrapper="div" wrapper_class="slider slider-people mx-auto max-w-5xl" layout="slide-people" /]' );
										endif;

										if ( $page_people_display === 'grid' ) :
											$grid_class = (count( $page_people ) == 3) ? 'dps-grid-3max' : 'dps-grid-4max';
											echo do_shortcode( '[display-posts post_type="people" id="' . implode( ', ', $page_people ) . '" posts_per_page="-1" meta_key="ll_people_last_name" orderby="meta_value" order="ASC" wrapper="div" wrapper_class="mt-4 ' . $grid_class . ' " layout="card-people-md" /]' );
										endif; ?>

									<?php endif; ?>

									<?php if ( $page_groups_html ) :
										echo do_shortcode( $page_groups_html );
									endif; ?>

								</div>
							</section>
							<?php endif; ?>

						</div>

						<div class="ll-page-grid-area-c">
							<?php if ( get_field( 'll_normal_contact_form_location' ) == 1 ) : ?>
								<div id="contact" class="container-contact-form not-prose">
									<?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( $page_form ) :
								echo '<div id="contact" class="container-contact-form not-prose">';
								echo do_shortcode( $page_form );
								echo '</div>';
							endif; ?>

							<?php // get_template_part( 'template-parts/form/form', 'webshare' ); ?>

							<div class="h-1">&nbsp;</div>
						</div>

					</div>
				</div>
			</article>

			<?php if ( $page_people_display === 'slider' ) : ?>
				<script>
					const slider = new A11YSlider(document.querySelector(".slider"), {
						arrows: false,
						autoplay: true,
						autoplaySpeed: 5000,
						dots: true
					});
				</script>
			<?php endif; ?>

			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
