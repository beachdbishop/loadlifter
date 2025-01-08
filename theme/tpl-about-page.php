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

$page_id                        = get_the_ID();
if (get_field('ll_page_title_override')) {
		$page_title                 = get_field('ll_page_title_override');
} else {
		$page_title                 = get_the_title();
}
// $page_icon = ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : false;

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

$page_excerpt                   = get_the_excerpt();
$page_featimg                   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $page_featimg == true ) {
	$page_featimg_url           = $page_featimg[0];
} else {
	$page_featimg_url           = '';
}

$cards_about = [
	"leadership" => [
		"label" => 'Leadership Team',
		"icon" => 'fa-people-line',
		"link" => '/people/',
		"backContent" => 'Meet our incredible team.',
	],
	"women" => [
		"label" => 'Women RISE',
		"icon" => 'fa-person-dress-burst',
		"link" => '/about/women-rise/',
		"backContent" => 'Partners in your development.',
	],
	"idea" => [
		"label" => 'IDEA Committee',
		"icon" => 'fa-people-group',
		"link" => '/about/idea-committee/',
		"backContent" => 'Your impact deserves solid support.',
	],
	"lea" => [
		"label" => 'LEA Global',
		"icon" => 'fa-handshake',
		"link" => '/about/lea-global/',
		"backContent" => 'Partners who unlock your potential.',
	],
];
?>

	<main id="primary" class="about-page | bg-white dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page-about' );
			?>

			<?php echo ll_better_page_hero( $page_title, $page_message ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="px-2 md:container lg:px-[16px] print:px-0">

					<div class="mt-4 ll-page-grid | md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16 print:mt-0 print:gap-4">

						<div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>

							<?php if ( is_page('temporarilydisablingthischeck--about') ) : ?>
								<?php // Just before launch, we decided to omit this display on the About Us page. Keeping the code just in case... ?>
								<div class="not-prose ind-card-flips is-style-blue">
									<?php foreach( $cards_about as $card ) {
										echo '<div class="ind-' . $card['icon'] . '">
											<a href="' . $card['link'] . '" rel="bookmark">
												<div class="card | group relative inline-block float-left w-[180px] h-[180px] [perspective:600px] md:w-[190px] md:h-[190px] lg:w-[200px] lg:h-[200px]">
													<div class="card-content | absolute w-full h-full rounded-lg shadow-lg shadow-neutral-300 transition-transform ease-out duration-700 [transform-style:preserve-3d] dark:shadow-none">
														<div class="card-front | text-center bg-[--card-front-bg] text-[--card-front-text] absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 [backface-visibility:hidden]">
															<div class="card-icon | text-[--card-front-icon]">
																<span class="fa-stack fa-2x">
																	<i class="text-white fa-solid fa-circle fa-stack-2x dark:text-neutral-900"></i>
																	<i class="fa-duotone ' . $card['icon'] . ' fa-stack-1x "></i>
																</span>
															</div>
															<h4 class="mt-2 font-light leading-none text-current">' . $card['label'] . '</h4>
														</div>
														<div class="card-back | absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 bg-[--card-back-bg] text-[--card-back-text] bg-no-repeat bg-cover bg-blend-overlay shadow-neutral-900/50 [backface-visibility:hidden] [transform:rotateY(180deg)]">
															<h5 class="my-2 leading-none tracking-wide text-center text-current uppercase text-shadow">' . $card['label'] . '</h5>
															<p class="text-center text-shadow">' . $card['backContent'] . '</p>
														</div>
													</div>
												</div>
											</a>
										</div>';
									} ?>
								</div>
							<?php endif; ?>

							<?php the_content(); ?>

							<?php if ( is_page( 'idea-committee' ) ) :
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

								<section class="mb-0 rounded-lg ll-equal-vert-padding  |  lg:bg-gradient-to-t lg:from-neutral-300 lg:to-80% lg:to-white dark:lg:from-neutral-600 dark:lg:to-80% dark:to-neutral-900 print:hidden">
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

						<div class="my-16 ll-page-grid-area-b md:my-0 md:col-span-3">

							<?php if ( is_page( 'about' ) ) : ?>
								<h3 class="mb-6">Awards and recognition</h3>
								<p>We are proud of our unique workplace culture.</p>
								<?php echo do_shortcode( '[awardlogos /]' ); ?>

								<p>&nbsp;</p>
							<?php endif; ?>

						</div>

						<div class="ll-page-grid-area-c">
							<div id="contact" class="container-contact-form not-prose motion-preset-slide-up mb-8 lg:mb-16">
								<?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
							</div>
						</div>

					</div>
				</div>
			</article><?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
