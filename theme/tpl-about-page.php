<?php
/*
 * Template Name: About Page
 * This is the template that displays a page in the About section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$page_id = get_the_ID();
if (get_field('ll_page_title_override')) {
	$page_title 									= get_field('ll_page_title_override');
} else {
	$page_title 									= get_the_title();
}
// $page_icon = ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : false;

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message 								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

$page_excerpt 									= get_the_excerpt();
$page_featimg 									= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $page_featimg == true ) {
	$page_featimg_url 						= $page_featimg[0];
} else {
	$page_featimg_url 						= '';
}

$page_form_id 									= get_field( 'll_hubspot_form_id' ) ?: '261a21eb-ffe6-41ea-86c1-a593e5c494c1';
?>

	<main id="primary" class="about-page  |  relative z-10 shadow-xl  |  lg:shadow-2xl">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php echo ll_better_page_hero( $page_title, $page_message ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="px-2 container  |  lg:px-4 print:px-0">

					<div class="mt-4 ll-page-grid  |  md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16 print:mt-0 print:gap-4">

						<div <?php ll_content_class( 'entry-content ll-page-grid-area-a  |  md:col-span-2' ); ?>>

							<?php the_content(); ?>

							<?php if ( is_page( 'disable-idea-committee' ) ) :
								$args = [
									'post_type' 							=> 'people',
									'post_status' 						=> 'publish',
									'posts_per_page'					=> -1,
									'posts_per_archive_page'	=> -1,
									'meta_key'								=> 'll_people_include_in_idea_slider',
									'meta_value'							=> '1',
									'order' 									=> 'ASC',
									'orderby' 								=> 'll_people_last_name',
								];

								$peopleQuery = new WP_Query( $args ); ?>

								<!-- section class="mb-0 rounded-lg ll-equal-vert-padding  |  lg:bg-linear-to-t lg:from-neutral-300 lg:to-80% lg:to-white dark:lg:from-neutral-950 dark:lg:to-80% dark:to-neutral-800 print:hidden" -->
								<section class="mb-0 rounded-lg ll-equal-vert-padding  |  lg:bg-linear-to-t lg:from-neutral-300 lg:to-80% lg:to-white dark:lg:bg-none print:hidden">
									<div class="not-prose max-w-3xl  |  md:mx-auto">
										<h2 class="text-orient-800  |  dark:text-orient-400">Voices of diversity, equity, and inclusion</h2>
										<div class="slider slider-quotes">
										<?php /* Start the People slider loop */
										while ( $peopleQuery->have_posts() ) :
											$peopleQuery->the_post();
											global $post;

											get_template_part( 'template-parts/content/content', 'slide-people-idea' );
										endwhile;
										?>
										</div>
										<script>const slider = new A11YSlider(document.querySelector(".slider"), {
											slidesToShow: 1,
											arrows: true,
											autoplay: true,
											autoplaySpeed: 8000,
										});</script>
									</div>
								</section>

								<h3>Commitment to inclusivity and belonging</h3>
								<p><?php echo LL_COMPANY_NICE_NAME; ?> has been recognized as an <strong>Inclusive Workplace for 2024</strong> by the <em>Best Companies Group</em> and <em>COLOR Magazine</em>.</p>
								<img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_200/v1722882083/Inclusive_Workplace_July_24-July_25-c_pmft9t.png" alt="July 2024-July 2025 Inclusive Workplace - Best Companies Group" width="100" height="100">
							<?php endif; ?>

						</div>

						<div class="my-16 ll-page-grid-area-b entry-content  |  md:my-0 md:col-span-3">

							<?php if ( is_page( 'about' ) ) : ?>
								<h3 class="mb-6">Awards and recognition</h3>
								<p>We are proud of our unique workplace culture.</p>
								<?php // echo do_shortcode( '[awardlogos /]' ); ?>
								<?php block_template_part( 'img-grid-awards' ); ?>
								<p>&nbsp;</p>
							<?php endif; ?>

						</div>

						<div class="ll-page-grid-area-c">
							<div id="contact" class="container-contact-form not-prose">
								<?php
								get_template_part(
									'template-parts/form/form',
									'hubspot-form-by-id',
									$args = [
										'class' => '',
										'part_data' => [
											'hs_form_id' => $page_form_id,
											'form_heading' => 'Contact us',
											'form_button_text' => 'Submit',
										]
									]
								);
								?>
							</div>
						</div>

					</div>
				</div>
			</article><?php
		endwhile; // End of the loop.
		?>

		<?php /*   P R E F O O T E R   A R E A   */   get_template_part( 'template-parts/siteblocks/pre', 'footer' ); ?>

	</main><!-- #main -->

<?php
get_footer();
