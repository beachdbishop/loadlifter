<?php

/**
 * The template for displaying the Healthcare > Who We Serve page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

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


function ll_render_betsy_slide_grid( $type, $show_icon = false) {
	$slide_html = '<div class="betsy-gslide" tabindex="0">';
	$slide_html .= '<div class="betsy-gslide-papercorner ">&nbsp;</div>';
	$slide_html .= '<div class="betsy-gslide-desc">';
	$slide_html .= '<h3 class="font-head font-semibold mb-2">' . $type['label'] . '</h3>';
	$slide_html .= '<p class="leading-snug">' . $type['desc'] . '</p>';
	$slide_html .= '</div>';
	$slide_html .= '<div class="betsy-gslide-img">';
	$slide_html .= '<img src="' . $type['image'] . '" alt="' . $type['image_alt'] . '" width="896" height="420">';
	$slide_html .= '</div>';
	if ( $show_icon == true ) {
		$slide_html .= '<div class="betsy-gslide-icon text-brand-blue-dark">';
		$slide_html .= '<i class="fa-sharp fa-light fa-' . $type['icon'] . ' fa-3x fa-fw"></i>';
		$slide_html .= '</div>';
	}
	$slide_html .= '</div>';

	return $slide_html;
}


$client_types = [
	[
		"label" => "Assisted living and skilled nursing facilities",
		"desc" => "We help assisted living and skilled nursing facilities optimize financial performance and drive growth with customized solutions. Our services include financial reporting, tax planning, and operational efficiency strategies.",
		"image" => "https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1737148786/feat__hc-serve--assisted3_kldoom.jpg",
		"image_alt" => "A tech and resident smile at each other in the dining room of an assisted living facility",
		"icon" => "user-nurse",
	],
	[
		"label" => "Clinics",
		"desc" => "We understand the distinct financial challenges faced by clinics. Our team offers specialized accounting services, such as financial planning, tax preparation, payroll, and cybersecurity assessments, to help clinics enhance profitability, streamline operations, and safeguard the business posture.",
		"image" => "https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1737068462/feat__hc-serve--clinics_oq84i8.jpg",
		"image_alt" => "A doctor confirms good news to a patient while gently touching her back",
		"icon" => "staff-snake",
	],
	[
		"label" => "Dental, physician, and veterinary practices",
		"desc" => "We offer a full range of comprehensive accounting services to dental, physician, and veterinary practices. From tax preparation, bonus/incentive strategies, revenue cycle management, strategic growth, and succession planning, we help your practice thrive financially.",
		"image" => "https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1737068462/feat__hc-serve--veterinary_cwbvrq.jpg",
		"image_alt" => "A veterinarian measures a dog's heart rate while a vet tech holds the dog steady on the table",
		"icon" => "tooth",
	],
	[
		"label" => "Specialty hospitals and urgent care centers",
		"desc" => "Partnering with management teams at critical access and rural hospitals, as well as regional medical and urgent care centers, we provide comprehensive financial statements, tax planning and preparation, and strategic operations advisory services.",
		"image" => "https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1737068462/feat__hc-serve--specialty-hosp_fpwirr.jpg",
		"image_alt" => "A cheerful nurse smiles with a child patient holding a stuffed animal in a hospital bed",
		"icon" => "truck-medical",
	],
	[
		"label" => "Medical groups",
		"desc" => "For medical groups, we offer integrated accounting solutions that support group practices in managing their finances effectively. Our services include financial analysis, budgeting, tax preparation, and tax strategies tailored to meet the needs of complex healthcare organizations.",
		"image" => "https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1737068463/feat__hc-serve--medical-groups_mvuhj1.jpg",
		"image_alt" => "A group of doctors and nurses smile toward the camera in a hallway",
		"icon" => "users-medical",
	],
	[
		"label" => "Rehabilitation facilities",
		"desc" => "Rehabilitation facilities benefit from our dedicated team of accounting professionals, who focus on ensuring compliance and optimizing financial health through tailored tax planning and proactive advisory services.",
		"image" => "https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1737068462/feat__hc-serve--rehab_dtvk5f.jpg",
		"image_alt" => "A physical therapist works with a patient on balance exercises",
		"icon" => "hospital",
	],
	[
		"label" => "Surgical, dialysis, and imaging centers",
		"desc" => "We offer specialized accounting services for surgical, dialysis, and imaging centers, including efficient tax planning, financial reporting, and strategic insights to support operational success, allowing you to focus on delivering quality patient care.",
		"image" => "https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1737068462/feat__hc-serve--imaging_eyw0ts.jpg",
		"image_alt" => "A doctor and nurse review post-procedure care with a patient seated in a hospital bed",
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
?>

<main id="primary" class="bg-white  |  dark:bg-neutral-900">

	<?php
	while (have_posts()) :
		the_post();
	?>

		<?php echo ll_better_page_hero( $page_title, $page_message ); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('py-12'); ?>>
			<div class="px-2 container  |  lg:px-[16px]">

				<div <?php ll_content_class( 'entry-conten ' ); ?>>
					<div class="prose  |  lg:max-w-[900px]">
						<?php the_content(); ?>
					</div>

					<div class="hidden accordions is-style-default">
						<details>
							<summary>(temp) view Caryn's mockup</summary>
							<div class="details-inner"><img src="https://peoplecptauthortest.local/wp-content/uploads/2024/09/slider-betsy-png.avif" alt="example slider for types of clients" class="wp-image-6348"/></div>
						</details>
					</div>

					<section class="betsy py-6  |  lg:py-12 print:hidden">
						<div class="">
							<h2 class="-mb-4 text-orient-800  |  dark:text-orient-400 md:-mb-8">Serving healthcare organizations like yours</h2>

							<div class="betsy-arrows">
								<button type="button" id="betsy-gslider-prev" class="betsy-gslider-prev" aria-label="Previous Slide"><i class="fa-solid fa-angle-left fa-lg"></i></button>
								<button type="button" id="betsy-gslider-next" class="betsy-gslider-next" aria-label="Next Slide"><i class="fa-solid fa-angle-right fa-lg"></i></button>
							</div>

							<div class="betsy-gslider  |  lg:max-w-5xl lg:mx-auto">
								<?php /* Start the Client Type slider loop */
								foreach ( $client_types as $type ) {
									// get_template_part( 'template-parts/content/content', 'slide-blah' );
									echo ll_render_betsy_slide_grid( $type, false );
								}
								?>
							</div>

							<script>const slider = new A11YSlider(document.querySelector(".betsy-gslider"), {
								slidesToShow: 1,
								arrows: false,
								autoplay: true,
								autoplaySpeed: 12000,
								nextArrow: document.querySelector('#betsy-gslider-next'),
								prevArrow: document.querySelector('#betsy-gslider-prev'),
								customPaging: function(index, a11YSlider) {
									return '<button class="betsy-dot">' + index + '</button>';
								}
							});</script>

						</div>
					</section>


					<section class="full-bleed py-6 bg-orient-50  |  dark:bg-neutral-950 lg:py-12">
						<div class="px-2  |  lg:px-[16px]">
							<h2 class="text-brand-blue-dark  |  dark:text-neutral-200 ">Shared values</h2>
							<p class="my-2">Building relationships with clients who share our core values is central to our service approach. These principles foster a mutually beneficial partnership built on trust and collaboration.</p>
							<div class="mt-4 ind-card-flips is-style-white ">
								<?php
								foreach ( $shared_values as $value ) {
									echo '<div class="card-' . $value['icon'] . '">
										<div class="card  |  relative inline-block float-left w-(--_card-size) h-(--_card-size) [perspective:600px]">
											<div class="card-content  |  absolute w-full h-full rounded-lg transition-transform ease-out duration-700 [transform-style:preserve-3d]  |  dark:shadow-none">
												<div class="card-front  |  text-center bg-(--_card-front-bg) text-(--_card-front-text) absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 [backface-visibility:hidden]">
													<div class="card-icon  |  text-(--_card-front-icon)">
														<span class="fa-stack fa-2x">
															<i class="text-orient-700 fa-solid fa-circle fa-stack-2x dark:text-orient-900"></i>
															<i class="fa-duotone fa-' . $value['icon'] . ' fa-stack-1x "></i>
														</span>
													</div>
													<h3 class="mt-2 font-light leading-none text-current ">' . $value['label'] . '</h3>
												</div>
												<div class="card-back  |  absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 bg-(--_card-back-bg) text-(--_card-back-text) bg-no-repeat bg-cover bg-blend-overlay [backface-visibility:hidden] [transform:rotateY(180deg)]">
													<h6 class="my-2 leading-none tracking-wide text-center text-current font-medium">' . $value['label'] . '</h6>
													<p class=" font-medium"> ' . $value['desc'] . '</p>
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


					<section class="full-bleed py-6 break-inside-avoid  |  lg:py-12 print:hidden">
						<div class="px-2  |  lg:px-[16px]">
							<div class="space-y-2">
								<h2 class="text-brand-red"><a name="partner"></a>Partner with BeachFleischman today</h2>
								<p class="lg:max-w-[900px]">Discover how BeachFleischman's healthcare accounting and financial services can support your practice. Schedule a consultation with one of our tax professionals to explore tailored solutions for your financial needs.</p>
								<p class="hidden  |  print:mt-8 print:block">Email info@beachfleischman.com</p>
								<div id="contact" class="container-contact-form not-prose  |  lg:max-w-[900px] motion-safe:animate-fade-in-from-top">
									<div class="hbspt-form" id="llhsform"></div>
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
							</div>
						</div>
					</section>

				</div>

			</div>
		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
