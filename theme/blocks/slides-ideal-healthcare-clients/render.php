<?php
/**
 * LL Slides - Ideal Healthcare Clients block template.
 *
 * @param			array $block The block settings and attributes
 * @param			string $content The block inner HTML (empty).
 * @param			bool $is_preview True during backend preview render.
 * @param 		int $post_id The post ID the block is rendering content against.
 * 						This is either the post ID currently being displayed inside a
 * 						query loop, or the post ID of the post hosting this block.
 * @param			array $context The context provided to the block by the post or
 * 						its parent block.
 */


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
?>


<?php
if ( $is_preview ) {
	echo '<p class="ll-note-admin"><strong>Note</strong>: a prebuilt slider will be included in the front end view.</p>';
	echo '<img src="' . get_template_directory_uri() . '/blocks/slides-ideal-healthcare-clients/slider-betsy-png.avif" alt="Screenshot of slider that will be embedded." />';
}
?>


<?php if ( ! $is_preview ) { ?>
	<section class="betsy py-6  |  lg:py-12 print:hidden">
		<div class="">
			<h2 class="-mb-4 text-orient-800  |  dark:text-orient-400 md:-mb-8">Serving healthcare organizations like yours</h2>

			<div class="betsy-arrows">
				<button
					type="button"
					id="betsy-gslider-prev"
					class="betsy-gslider-prev"
					aria-label="Previous Slide"
				>
					<i class="fa-solid fa-angle-left fa-lg"></i>
				</button>
				<button
					type="button"
					id="betsy-gslider-next"
					class="betsy-gslider-next"
					aria-label="Next Slide"
				>
					<i class="fa-solid fa-angle-right fa-lg"></i>
				</button>
			</div>

			<div class="betsy-gslider  |  lg:max-w-5xl lg:mx-auto">
				<?php foreach ( $client_types as $client_type ) : ?>
					<div class="betsy-gslide" tabindex="0">
						<div class="betsy-gslide-papercorner ">&nbsp;</div>
						<div class="betsy-gslide-desc">
							<h3 class="font-head font-semibold mb-2"><?php echo $client_type['label']; ?></h3>
							<p class="leading-snug"><?php echo $client_type['desc']; ?></p>
						</div>
						<div class="betsy-gslide-img">
							<img
								src="<?php echo $client_type['image']; ?>"
								alt="<?php echo $client_type['image_alt']; ?>"
								width="896"
								height="420"
							>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	wp_add_inline_script(
		'a11y-slider',
		"const slider = new A11YSlider(document.querySelector('.betsy-gslider'), {
			slidesToShow: 1,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 12000,
			nextArrow: document.querySelector('#betsy-gslider-next'),
			prevArrow: document.querySelector('#betsy-gslider-prev'),
			customPaging: function(index, a11YSlider) {
				return '<button class=\"betsy-dot\">' + index + '</button>';
			}
		});"
	);
}
?>
