<?php
/*
 * Template Name: Careers Page
 * This is the template that displays an pages in the Careers section
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

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

$page_icon                      = (get_field('ll_page_icon')) ? get_field('ll_page_icon') : false;
$page_excerpt                   = get_the_excerpt();

$cards_opps = [
	"internships" => [
		"slug" => 'intern',
		"label" => 'Internships',
		"link" => '/career-opportunities/internships/',
		"img" => 'https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto,w_480/v1676492725/feat__careers-internships--social_q07na1.jpg',
		"img-wide" => 'https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-internships--social_q07na1.jpg',
		"img-alt" => "Man and young man having a converstion at a table"
	],
	"grads" => [
		"slug" => 'grad',
		"label" => 'Recent College Graduates',
		"link" => '/career-opportunities/recent-college-graduates/',
		"img" => 'https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto,w_480/v1676492725/feat__careers-college-grads--social_jlh5qx.jpg',
		"img-wide" => 'https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-college-grads--social_jlh5qx.jpg',
		"img-alt" => "Group of happy college students walking down a street"
	],
	"pros" => [
		"slug" => 'pro',
		"label" => 'Experienced Professionals',
		"link" => '/career-opportunities/experienced-professionals/',
		"img" => 'https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto,w_480/v1676492725/feat__careers-exp-pro--social_oxpiif.jpg',
		"img-wide" => 'https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-exp-pro--social_oxpiif.jpg',
		"img-alt" => "Happy person in glasses shaking the hand of someone out of frame"
	],
];
$cards_expect = [
	"personal" => [
		"label" => 'Personal success',
		"icon" => 'fa-handshake',
		"backContent" => '<p>You will have a challenging and rewarding career with many options for growth. You are unique, so your goals and dreams are unique; we help you pursue your success.</p>',
	],
	"easy" => [
		"label" => 'Easy interactions',
		"icon" => 'fa-comments',
		"backContent" => '<p>Clear communication and accessible management provide you with a supportive environment. When serving clients, we integrate our service teams to provide a collaborative experience for our staff and clients alike.</p>',
	],
	"ability" => [
		"label" => 'Enhanced ability',
		"icon" => 'fa-gauge-high',
		"backContent" => '<p>You will have continuous opportunities to learn and grow in our learning culture including:</p>
		<ul class="mt-2 ml-3 list-disc">
			<li>Mentoring program</li>
			<li>CPA exam bonus and reimbursement</li>
			<li>Paid continuing professional education, membership dues, and licenses</li>
			<li>Leadership development</li>
		</ul>',
	],
	"community" => [
		"label" => 'Community impact',
		"icon" => 'fa-house-building',
		"backContent" => '<p>Are you passionate about supporting the community? BeachFleischman encourages and financially supports your involvement in local organizations.</p>',
	],
];
$cards_future = [
	"advancement" => [
		"label" => 'Career advancement',
		"icon" => 'fa-rocket',
		"backContent" => '<p>You will have many avenues to advance your career. You choose your area of specialization and we\'ll provide challenging work that empowers you to be your best.</p>',
	],
	"easy" => [
		"label" => 'Be heard',
		"icon" => 'fa-microphone',
		"backContent" => '<p>Your feedback and ideas are important to us. Through our collaborative work style, your voice will be heard.</p>',
	],
	"ability" => [
		"label" => 'Embrace technology',
		"icon" => 'fa-laptop-mobile',
		"backContent" => '<p>Be part of our continuous drive to innovate through technology. We automate many processes and use cloud-based solutions to create a seamless experience for our clients and staff alike.</p>',
	],
	"community" => [
		"label" => 'Seek success',
		"icon" => 'fa-thumbs-up',
		"backContent" => '<p>Our success depends on you, your career, your development, and your growth. Here, you will follow your passions, including working with growth-oriented clients and taking ownership of your projects. Seek success and the future is yours!</p>',
	],
];
$cards_benefits = [
	"career_dev" => [
		"label" => 'Career Development',
		"img" => 'https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1698769889/feat__careers--career-dev_jyfgjn.jpg',
		"imgAlt" => 'A mentor and mentee smile while having a discussion',
		"onHoverContent" => '<ul><li>CPA Certification Bonus</li><li>Certification Reimbursement</li><li>Continuing Professional Education</li><li>Leadership Development</li><li>Mentor Program</li><li>Employee Referral Program</li></ul>',
	],
	"health" => [
		"label" => 'Health',
		"img" => 'https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1698769889/feat__careers--health_dhdaqh.jpg',
		"imgAlt" => 'A patient has a discussion with a medical professional',
		"onHoverContent" => '<ul><li>Medical Insurance</li><li>Dental Insurance</li><li>Vision Insurance</li><li>Life Insurance</li><li>Short and Long-Term Disability Insurance</li><li>Accident Insurance</li><li>Critical Illness Insurance</li><li>Hospital Indemnity Insurance</li><li>Flexible Spending Account</li><li>Dependent Care Account</li></ul>',
	],
	"wellbeing" => [
		"label" => 'Well-Being',
		"img" => 'https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1698769889/feat__careers--well-being_qrung2.jpg',
		"imgAlt" => 'A man looks out a window with his arms raised in celebration',
		"onHoverContent" => '<ul><li>Paid Time Off</li><li>Flextime Options</li><li>Hybrid/Remote Work Options</li><li>Employee Assistance Program</li><li>Wellness Campaigns</li><li>Busy Season Meals and Snacks</li></ul>',
	],
	"financial" => [
		"label" => 'Financial',
		"img" => 'https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1698769889/feat__careers--financial_dgfqh5.jpg',
		"imgAlt" => 'Five stacks of coins increasing in height from one to the next',
		"onHoverContent" => '<ul><li>401(k) Retirement Plan</li><li>Employer Match</li><li>Profit Sharing Plan</li><li>Cash Balance Plan</li><li>Access to Financial Advisors</li><li>Performance-Based Bonuses</li></ul>',
	],
];

if ('local' === wp_get_environment_type()) {
	$hr_ids                     = '1842,1843,3969,5169';
} else {
	$hr_ids                     = '31394,31603,32639,35019';
}
?>

	<main id="primary" class="careers-page  |  bg-white  |  dark:bg-neutral-900">
		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page-careers' );
			?>

			<?php echo ll_better_page_hero( $page_title, $page_message ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('py-8'); ?>>
				<div class="px-2 container  |  lg:px-[16px]">

					<?php if (is_page('career-opps')) : ?>
					<?php //   the page above is purposefully 'wrong' because we decided not to include this page nav. We may bring it back in the future, though. ?>
						<section class="full-bleed ">
							<div class="flex flex-wrap justify-start gap-2 px-2 py-4 text-sm  |  lg:gap-4 lg:px-[16px]">
								<span>On this page:</span>
								<a class="underline hover:decoration-orient-400" href="#why">Why BeachFleischman?</a>
								<a class="underline hover:decoration-orient-400" href="#opportunities">Opportunities</a>
								<a class="underline hover:decoration-orient-400" href="#culture">Culture</a>
								<a class="underline hover:decoration-orient-400" href="#benefits">Benefits</a>
								<a class="underline hover:decoration-orient-400" href="#awards">Awards</a>
							</div>
						</section>
					<?php endif; ?>

					<div <?php ll_content_class( 'entry-content' ); ?>>
					<?php //   Actual WordPress editor content   ?>

						<?php the_content(); ?>

					</div>

					<?php if (is_page('career-opportunities')) : ?>
					<?php //   O P P O R T U N I T I E S   ?>
						<section id="opportunities" class="full-bleed ll-equal-vert-padding bg-gradient-to-t from-brand-gray-pale via-neutral-100 to-white  |  dark:from-neutral-700 dark:via-neutral-800 dark:to-neutral-900">
							<div class="px-2  |  lg:px-[16px]">
								<h2 class="mb-4 font-head">Opportunities</h2>
								<ul class="list-none grid gap-4 text-neutral-600  |  md:grid-cols-3 lg:gap-8 dark:text-neutral-400">

									<?php foreach( $cards_opps as $card ) {
										echo '<li class="card-' . $card['slug'] . '  |  group flex flex-col relative border-transparent border-2 shadow-orient-700  |  focus-within:shadow-lg focus-within:border-neutral-500 dark:border-neutral-700 dark:shadow-orient-500">
											<div class="card-text  |  p-4 order-1 bg-white flex justify-between  |  dark:bg-neutral-800 dark:text-neutral-300">
												<p class="inline font-head font-semibold leading-none text-2xl">
													<a class="group-hover:text-brand-blue" href="' . $card['link'] . '">
														' . $card['label'] . '
													</a>
												</p>
												<p class="inline text-2xl">
													<a class="group-hover:text-brand-blue" href="' . $card['link'] . '" aria-label="Read more about ' . $card['label'] . '">
														<i class="fa-regular fa-angle-right"></i>
													</a>
												</p>
											</div>
											<div class="card-img  |  bg-neutral-500 relative overflow-hidden">
												<a href="' . $card['link'] . '">
													<img
														alt="' . $card['img-alt'] . '"
														src="' . $card['img-wide'] . '"
														class="min-h-60 w-full object-cover transition duration-200 ease-in-out  |  group-hover:scale-110"
													/>
												</a>
											</div>
										</li>';
									} ?>

								</ul>
							</div>
						</section>
					<?php endif; ?>

					<?php if ( is_page('internships') ) { ?>
					<?php //   E X P E C T   &   F U T U R E   ?>
						<section class="full-bleed ll-equal-vert-spacing not-prose ">
							<div class="px-2  |  lg:px-[16px]">
								<h2>What you can expect</h2>
								<div class="ind-card-flips is-style-default | mx-auto my-4 md:my-12 lg:my-12 ">
								<?php foreach( $cards_expect as $card ) {
									ll_no_link_card( $card );
								} ?>
								</div>
							</div>
						</section>
					<?php } else { ?>
						<section class="full-bleed ll-equal-vert-spacing not-prose">
							<div class="px-2  |  lg:px-[16px]">
								<h2>What you can expect</h2>
								<div class="ind-card-flips is-style-default | mx-auto my-4 md:my-12 lg:my-12 ">
								<?php foreach( $cards_expect as $card ) {
									ll_no_link_card( $card );
								} ?>
								</div>

								<h2>Your future</h2>
								<div class="ind-card-flips is-style-default | mx-auto my-4 md:my-12 lg:my-12 ">
								<?php foreach( $cards_future as $card ) {
									ll_no_link_card( $card );
								} ?>
								</div>
							</div>
						</section>
					<?php } ?>

					<?php //   C U L T U R E   ?>
					<style>
						.block-cover-women { background-image: url('https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,w_480,w_768/v1678295483/feat__careers--women-rise2_ed405i.jpg'); }
						.block-cover-idea { background-image: url('https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,w_768/v1677875018/feat__careers--idea_ifhenr.jpg'); }
						@media screen and (min-width: 768px) {
							.block-cover-women { background-image: url('https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,w_1024/v1678295483/feat__careers--women-rise2_ed405i.jpg'); }
							.block-cover-idea { background-image: url('https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,w_1024/v1677875018/feat__careers--idea_ifhenr.jpg'); }
						}
						@media screen and (min-width: 1024px) {
							.block-cover-women { background-image: url('https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,w_1536/v1678295483/feat__careers--women-rise2_ed405i.jpg'); }
							.block-cover-idea { background-image: url('https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,w_1536/v1677875018/feat__careers--idea_ifhenr.jpg'); }
						}
					</style>
					<section id="culture" class="full-bleed not-prose ll-equal-vert-spacing">
						<div class="flex flex-col px-2 space-y-4 lg:px-[16px]">
							<h2 class="">Culture</h2>

							<div class="block-cover-women overflow-hidden bg-cover bg-center bg-no-repeat bg-brand-blue-dark text-neutral-100">
								<div class="p-8 bg-gradient-to-r from-brand-blue-dark via-brand-blue-dark/80 to-brand-blue-dark/40  |  md:p-12 lg:px-26 lg:py-24">
									<div class="text-center  |  sm:text-left">
										<h4 class="text-orient-400">Women RISE</h4>
										<p class="hidden max-w-lg  |  md:my-4 md:block md:text-base md:leading-relaxed">Women R.I.S.E. is a committee of employees dedicated to building and sustaining a collaborative and diverse workplace that strategically supports the development and advancement of women. We do this by creating and maintaining an environment that recognizes, cultivates and utilizes the talent of female employees.</p>
										<p><a class="text-orient-400 hover:text-mahogany-300" href="/about/women-rise/">Learn more about Women RISE <i class="fa-regular fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>

							<div class="block-cover-idea overflow-hidden bg-cover bg-center bg-no-repeat bg-brand-blue-dark text-neutral-100">
								<div class="p-8 bg-gradient-to-r from-brand-blue-dark via-brand-blue-dark/80 to-brand-blue-dark/40  |  md:p-12 lg:px-26 lg:py-24">
									<div class="text-center sm:text-left">
										<h4 class="text-orient-400">IDEA Committee</h4>
										<p class="hidden max-w-lg  |  md:my-4 md:block md:text-base md:leading-relaxed">At BeachFleischman, we intentionally cultivate a diverse, equitable, and inclusive environment where each person feels welcomed, accepted, empowered, valued, respected, and safe. This not only allows each one of us to achieve personal and professional success, but also allows us to better know and serve our clients and communities.</p>
										<p><a class="text-orient-400 hover:text-mahogany-300" href="/about/idea-committee/">Learn more about our IDEA committee <i class="fa-regular fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>

						</div>
					</section>

					<?php //   B E N E F I T S   ?>
					<?php if ( !is_page('internships') ) : ?>
						<section id="benefits" class="full-bleed">
							<div class="px-2  |  lg:px-[16px]">
								<h2 class="mb-4">Benefits</h2>
								<div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
									<?php foreach( $cards_benefits as $card ) {
										ll_render_hover_card( $card );
									} ?>
								</div>
							</div>
						</section>
					<?php endif; ?>

					<?php //   A W A R D S   ?>
					<section id="awards" class="bg-white full-bleed ll-equal-vert-padding dark:bg-neutral-800">
						<div class="px-2  |  lg:px-[16px]">
							<h2 class="mb-4">Awards and recognition</h2>
							<?php echo do_shortcode( '[awardlogos /]' ); ?>
						</div>

						<div class="px-2  |  lg:px-[16px]">
							<h2 class="mb-4">Our Team</h2>
							<?php echo do_shortcode('[display-posts
								post_type="people"
								id="' . $hr_ids . '"
								orderby="ll_people_level"
								order="ASC"
								posts_per_page="4"
								wrapper="ul"
								wrapper_class="list-none dps-grid-4max"
								layout="card-people-small-desigs"
								/]');
							?>
						</div>
					</section>

					<?php
					get_template_part(
						'template-parts/layout/chunk', 'cta',
						$args = [
							'class' => 'cta-part',
							'part_data' => [
								'cta_heading' => 'View our current openings and apply today!',
								'cta_body' => false,
								'cta_button_text' => '<i class="mr-1 fa-solid fa-users"></i> Join our team',
								'cta_button_url' => '/career-opportunities/#openings',
							]
						]
					);
					?>

				</div>
			</article>
			<?php
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php
get_footer();
