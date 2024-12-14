<?php

/**
 * The template for displaying the Healthcare > Who We Serve page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$page_id = get_the_ID();
$page_id_industries = ( wp_get_environment_type() == 'local' ) ? '3196' : '31923';

if ( get_field( 'll_page_title_override' ) ) {
	$page_title = get_field( 'll_page_title_override' );
} else {
	$page_title = get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message = get_field( 'll_custom_subheader' );
} else {
	$brand_message = get_field( 'll_brand_message' );
	$page_message = $brand_message['label'];
}

$page_icon = ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : false;
$page_excerpt = get_the_excerpt();
$page_post_category = get_field( 'll_ind_category' );
$page_cta_standard = get_field( 'll_ind_show_standard_cta' );
$page_cta_heading = get_field( 'll_ind_cta_heading' );
$page_cta_body = get_field( 'll_ind_cta_body' );
$page_cta_button_text = get_field( 'll_ind_cta_button_text' );
$page_cta_html = get_field( 'll_ind_cta_html' );
$page_groups_html = get_field( 'll_ind_groups_html' );
$page_people = get_field( 'll_ind_people' );
$page_people_display = get_field( 'll_ind_people_display_style' );
$page_form = get_field( 'ls_hs_form_html' );
$hero_cta1_text = get_field( 'll_hero_cta1_text' );
$hero_cta1_url = get_field( 'll_hero_cta1_url' );
$hero_cta2_text = get_field( 'll_hero_cta2_text' );
$hero_cta2_url = get_field( 'll_hero_cta2_url' );


// function ll_render_betsy_slide_posi( $type, $show_icon = false ) {
// 	$slide_html = '<div class="betsy-slide transition-colors ease-in-out mb-4 border border-purple-600 lg:px-8" tabindex="0">';
// 	$slide_html .= '<div class="betsy-slide-desc | p-8 bg-orient-200 text-orient-800 md:p-16 md:relative md:top-0 lg:-left-6">';
// 	$slide_html .= '<h3 class="font-head font-semibold mb-2">' . $type['label'] . '</h3>';
// 	$slide_html .= '<div class="md:min-h-36 border md:border-orange-600 ">';
// 	$slide_html .= '<p class="text-lg leading-6 text-neutral-800 lg:text-xl">' . $type['desc'] . '</p>';
// 	$slide_html .= '</div>';
// 	$slide_html .= '</div>';
// 	$slide_html .= '<div class="betsy-slide-img | border-pink-600 max-w-fit md:relative md:-top-12 md:-mb-12 lg:-right-10">';
// 	$slide_html .= '<img class="" src="' . $type['image'] . '" alt="' . $type['image_alt'] . '" width="900" height="440">';
// 	if ( $show_icon == true ) {
// 		$slide_html .= '<div class="absolute bottom-4 right-4 text-white z-10">';
// 		$slide_html .= '<i class="fa-regular fa-' . $type['icon'] . ' fa-3x"></i>';
// 		$slide_html .= '</div>';
// 	}
// 	$slide_html .= '</div>';
// 	$slide_html .= '</div>';

// 	return $slide_html;
// }

function ll_render_betsy_slide_grid( $type, $show_icon = false) {
	$slide_html = '<div class="betsy-gslide" tabindex="0">';
	$slide_html .= '<div class="betsy-gslide-papercorner ">&nbsp;</div>';
	$slide_html .= '<div class="betsy-gslide-desc">';
	$slide_html .= '<h3 class="font-head font-semibold mb-2">' . $type['label'] . '</h3>';
	$slide_html .= '<p class="leading-snug">' . $type['desc'] . '</p>';
	$slide_html .= '</div>';
	$slide_html .= '<div class="betsy-gslide-img">';
	$slide_html .= '<img src="' . $type['image'] . '" alt="' . $type['image_alt'] . '" width="900" height="440">';
	$slide_html .= '</div>';
	if ( $show_icon == true ) {
		$slide_html .= '<div class="betsy-gslide-icon">';
		$slide_html .= '<i class="fa-regular fa-' . $type['icon'] . ' fa-3x fa-fw"></i>';
		$slide_html .= '</div>';
	}
	$slide_html .= '</div>';

	return $slide_html;
}


$client_types = [
	[
		"label" => "Assisted Living and Skilled Nursing Facilities",
		"desc" => "We help assisted living and skilled nursing facilities optimize financial performance and drive growth with customized solutions. Our services include financial reporting, tax planning, and operational efficiency strategies.",
		"image" => "https://picsum.photos/seed/picsum/900/440?grayscale",
		"image_alt" => "Bears!",
		"icon" => "user-nurse",
	],
	[
		"label" => "Clinics",
		"desc" => "We understand the distinct financial challenges faced by clinics. Our team offers specialized accounting services, such as financial planning, tax preparation, payroll, and cybersecurity assessments, to help clinics enhance profitability, streamline operations, and safeguard the business posture.",
		"image" => "https://picsum.photos/seed/picsum/900/440?grayscale",
		"image_alt" => "Bears!",
		"icon" => "staff-snake",
	],
	[
		"label" => "Dental, Physician, and Veterinary Practices",
		"desc" => "We offer a full range of comprehensive accounting services to dental, physician, and veterinary practices. From tax preparation, bonus/incentive strategies, revenue cycle management, strategic growth, and succession planning, we help your practice thrive financially.",
		"image" => "https://picsum.photos/seed/picsum/900/440?grayscale",
		"image_alt" => "Bears!",
		"icon" => "tooth",
	],
	[
		"label" => "Specialty Hospitals and Urgent Care Centers",
		"desc" => "Partnering with management teams at critical access and rural hospitals, as well as regional medical and urgent care centers, we provide comprehensive financial statements, tax planning and preparation, and strategic operations advisory services.",
		"image" => "https://picsum.photos/seed/picsum/900/440?grayscale",
		"image_alt" => "Bears!",
		"icon" => "truck-medical",
	],
	[
		"label" => "Medical Groups",
		"desc" => "For medical groups, we offer integrated accounting solutions that support group practices in managing their finances effectively. Our services include financial analysis, budgeting, tax preparation, and tax strategies tailored to meet the needs of complex healthcare organizations.",
		"image" => "https://picsum.photos/seed/picsum/900/440?grayscale",
		"image_alt" => "Bears!",
		"icon" => "users-medical",
	],
	[
		"label" => "Rehabilitation Facilities",
		"desc" => "Rehabilitation facilities benefit from our dedicated accounting professionals who focus on meeting compliance with tax planning and preparation to enhance financial health.",
		"image" => "https://picsum.photos/seed/picsum/900/440?grayscale",
		"image_alt" => "Bears!",
		"icon" => "hospital",
	],
	[
		"label" => "Surgical, Dialysis, and Imaging Centers",
		"desc" => "We provide specialized accounting services to surgical, dialysis, and imaging centers, delivering accurate financial reporting, efficient tax planning, and strategic financial advice to support operational success.",
		"image" => "https://picsum.photos/seed/picsum/900/440?grayscale",
		"image_alt" => "Bears!",
		"icon" => "x-ray",
	],
];

$shared_values = [
	[
		"label" => "Driving Positive Change",
		"desc" => "Energetic and dynamic environments where positive change is embraced and highly valued. Our clients are proactive and organized, always looking for opportunities to improve and innovate.",
		"icon" => "hand-holding-medical",
	],
	[
		"label" => "Commitment to Excellence and Growth",
		"desc" => "Excellence in practice is vital. Our clients are committed to delivering the highest standard of care. They are dedicated to continuous learning and growth.",
		"icon" => "hand-holding-medical",
	],
	[
		"label" => "Collaborative Partnership",
		"desc" => "Collaboration is a cornerstone of our service. We value client involvement and feedback as essential components of a successful partnership.",
		"icon" => "hand-holding-medical",
	],
	[
		"label" => "Progressive and Tech-Savvy",
		"desc" => "Our clients are forward-thinking technology users. They leverage the latest accounting software and engage in various platforms to stay ahead in their industry.",
		"icon" => "hand-holding-medical",
	]
];


get_header();
?>

<main id="primary" class="bg-white dark:bg-neutral-900">

	<?php
	while (have_posts()) :
		the_post();
	?>

		<?php echo ll_better_page_hero( $page_title, $page_message ); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
			<div class="px-2 md:container lg:px-[16px]">

				<div <?php ll_content_class( 'entry-content ' ); ?>>
					<?php the_content(); ?>

					<div class="hidden accordions is-style-default">
						<details>
							<summary>(temp) view Caryn's mockup</summary>
							<div class="details-inner"><img src="https://peoplecptauthortest.local/wp-content/uploads/2024/09/slider-betsy-png.avif" alt="example slider for types of clients" class="wp-image-6348"/></div>
						</details>
					</div>

					<section class="betsy mb-0 ll-equal-vert-padding | print:hidden">
						<div class="not-prose">
							<h2 class="text-brand-blue dark:text-brand-blue-pale">Who we serve</h2>

							<div class="betsy-arrows">
								<button type="button" id="betsy-gslider-prev" class="betsy-gslider-prev" aria-label="Previous Slide"><i class="fa-solid fa-angle-left"></i></button>
								<button type="button" id="betsy-gslider-next" class="betsy-gslider-next" aria-label="Next Slide"><i class="fa-solid fa-angle-right"></i></button>
							</div>

							<div class="betsy-gslider | lg:max-w-5xl lg:mx-auto">
								<?php /* Start the Client Type slider loop */
								foreach ( $client_types as $type ) {
									// get_template_part( 'template-parts/content/content', 'slide-blah' );
									echo ll_render_betsy_slide_grid( $type, true );
								}
								?>
							</div>

							<script>const slider = new A11YSlider(document.querySelector(".betsy-gslider"), {
								slidesToShow: 1,
								arrows: true,
								autoplay: false,
								autoplaySpeed: 8000,
								nextArrow: document.querySelector('#betsy-gslider-next'),
								prevArrow: document.querySelector('#betsy-gslider-prev'),
								customPaging: function(index, a11YSlider) {
									return '<button class="betsy-dot">' + index + '</button>';
								}
							});</script>
						</div>
					</section>


					<section class="full-bleed ll-equal-vert-padding not-prose bg-orient-200 | dark:bg-neutral-950">
						<div class="px-2 lg:px-[16px]">
							<h2 class="mb-2 text-brand-blue-dark dark:text-neutral-200 ">Shared Values</h2>
							<p class="max-w-5xl">Building relationships with clients who share our core values is central to our service approach. These principles foster a mutually beneficial partnership built on trust and collaboration.</p>
							<div class="mt-4 ind-card-flips is-style-default ">
								<?php
								foreach ( $shared_values as $value ) {
									echo '<div class="card-' . $value['icon'] . '">
										<div class="card | relative inline-block float-left w-[--_card-size] h-[--_card-size] [perspective:600px]" style="--_card-size: 288px; --_card-back-bg: #092f42">
											<div class="card-content | absolute w-full h-full rounded-lg shadow-md shadow-orient-900/80 transition-transform ease-out duration-700 [transform-style:preserve-3d] dark:shadow-none">
												<div class="card-front | text-center bg-[--_card-front-bg] text-[--_card-front-text] absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 [backface-visibility:hidden]">
													<div class="card-icon | text-[--_card-front-icon]">
														<span class="fa-stack fa-2x">
															<i class="text-white fa-solid fa-circle fa-stack-2x dark:text-neutral-900"></i>
															<i class="fa-duotone fa-' . $value['icon'] . ' fa-stack-1x "></i>
														</span>
													</div>
													<h3 class="mt-2 font-light leading-none text-current ">' . $value['label'] . '</h3>
												</div>
												<div class="card-back | absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 bg-[--_card-back-bg] text-[--_card-back-text] bg-no-repeat bg-cover bg-blend-overlay shadow-neutral-900/50 [backface-visibility:hidden] [transform:rotateY(180deg)]">
													<h6 class="my-2 leading-none tracking-wide text-center text-current text-shadow">' . $value['label'] . '</h6>
													<p class="text-shadow">' . $value['desc'] . '</p>
												</div>
											</div>
										</div>
									</div>';
									// echo '<div><p>' . $value['label'] . '</p></div>';
								}
								?>
							</div>
						</div>
					</section>


					<section class="ca | ll-equal-vert-padding not-prose break-inside-avoid print:hidden">
						<h2 class="mb-2 text-brand-red">Partner with BeachFleischman today</h2>
						<p class="mb-2 max-w-5xl">Discover how BeachFleischman's healthcare accounting and financial services can support your practice. Schedule a consultation with one of our tax professionals to explore tailored solutions for your financial needs.</p>
						<p class="hidden print:mt-8 print:block">Email info@beachfleischman.com</p>

						<div id="contact" class="container-contact-for not-prose motion-preset-slide-up mb-8 lg:mb-16">
							<div class="hbspt-form max-w-5xl" id="llhsform"></div>
							<script>
								function loadHubSpotForm() {
									var formContainer = document.getElementById('llhsform');
									var rect = formContainer.getBoundingClientRect();

									if(rect.top < window.innerHeight && rect.bottom >= 0) {
										var hsScript = document.createElement('script');
										hsScript.async = true; // Load script asynchronously
										hsScript.src='//js.hsforms.net/forms/v2.js';
										hsScript.onload = function() {
											hbspt.forms.create({
												region: "na1",
												portalId: "5578910",
												target: '#llhsform',
												formId: "c8675641-3e68-4ff7-9dc3-ae3636fbf1c8"
											});
										};
										document.body.appendChild(hsScript);

										window.removeEventListener('scroll', loadHubSpotForm);
									}
								}

								window.addEventListener('scroll', loadHubSpotForm);

								loadHubSpotForm();
							</script>
						</div>
					</section>

				</div>

			</div>
		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
