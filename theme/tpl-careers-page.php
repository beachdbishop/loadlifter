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

$page_icon                      = (get_field('ll_page_icon')) ? get_field('ll_page_icon') : false;
$page_excerpt                   = get_the_excerpt();
// $page_featimg                   = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
// if ($page_featimg == true) {
//     $page_featimg_url           = $page_featimg[0];
// } else {
//     $page_featimg_url           = '';
// }

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

	<main id="primary" class="careers-page | bg-white dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page-careers' );
            ?>

            <?php echo ll_page_hero( $page_title, $page_excerpt ); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
                <div class="px-2 md:container xl:px-4">

                    <?php if (is_page('career-opps')) : ?>
                        <section class="full-bleed ">
                            <div class="flex flex-wrap justify-start gap-2 px-2 py-4 text-sm lg:gap-4 md:container xl:px-4">
                                <span>On this page:</span>
                                <a class="underline hover:decoration-brand-blue-pale" href="#why">Why BeachFleischman?</a>
                                <a class="underline hover:decoration-brand-blue-pale" href="#opportunities">Opportunities</a>
                                <a class="underline hover:decoration-brand-blue-pale" href="#culture">Culture</a>
                                <a class="underline hover:decoration-brand-blue-pale" href="#benefits">Benefits</a>
                                <a class="underline hover:decoration-brand-blue-pale" href="#awards">Awards</a>
                            </div>
                        </section>
                    <?php endif; ?>

                    <div <?php ll_content_class( 'entry-content' ); ?>>

                        <?php the_content(); ?>

                    </div>

                    <!-- <div class="clear-both">&nbsp;</div> -->

                    <?php if (is_page('career-opportunities')) : ?>
                    <!--   O P P O R T U N I T I E S   -->
                        <section id="opportunities" class="full-bleed ll-equal-vert-padding bg-gradient-to-t from-brand-gray-pale via-neutral-100 to-white dark:from-neutral-700 dark:via-neutral-800 dark:to-neutral-900">
                            <div class="px-2 md:container xl:px-4">
                                <h2 class="mb-4 font-head">Opportunities</h2>
                                <div class="grid gap-4 text-neutral-600 md:grid-cols-3 lg:gap-8 dark:text-neutral-400">
                                    <div class="px-4 pb-4 bg-white shadow-md lg:px-8 group dark:bg-neutral-900">
                                        <div class="!mt-0 -mx-4 mb-4 lg:-mx-8 relative overflow-hidden bg-no-repeat bg-cover">
                                            <a href="/career-opportunities/internships/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-internships--social_q07na1.jpg" class="transition duration-200 ease-in-out group-hover:scale-110" alt="Man and young man having a converstion at a table"></a>
                                        </div>
                                        <h4 class="font-bold lg:mb-4 group-hover:text-brand-blue dark:group-hover:text-brand-blue-pale"><a href="/career-opportunities/internships/">Internships</a></h4>
                                        <p><a class="text-orient-900 hover:text-brand-red" href="/career-opportunities/internships/">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                                    </div>
                                    <div class="px-4 pb-4 bg-white shadow-md lg:px-8 group dark:bg-neutral-900">
                                        <div class="!mt-0 -mx-4 mb-4 lg:-mx-8 relative overflow-hidden bg-no-repeat bg-cover">
                                            <a href="/career-opportunities/recent-college-graduates/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-college-grads--social_jlh5qx.jpg" class="transition duration-200 ease-in-out group-hover:scale-110" alt="Group of happy college students walking down a street"></a>
                                        </div>
                                        <h4 class="font-bold lg:mb-4 group-hover:text-brand-blue dark:group-hover:text-brand-blue-pale"><a href="/career-opportunities/recent-college-graduates/">Recent College Graduates</a></h4>
                                        <p><a class="text-orient-900 hover:text-brand-red" href="/career-opportunities/recent-college-graduates/">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                                    </div>
                                    <div class="px-4 pb-4 bg-white shadow-md lg:px-8 group dark:bg-neutral-900">
                                        <div class="!mt-0 -mx-4 mb-4 lg:-mx-8 relative overflow-hidden bg-no-repeat bg-cover">
                                            <a href="/career-opportunities/experienced-professionals/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-exp-pro--social_oxpiif.jpg" class="transition duration-200 ease-in-out group-hover:scale-110" alt="Happy person in glasses shaking the hand of someone out of frame"></a>
                                        </div>
                                        <h4 class="font-bold lg:mb-4 group-hover:text-brand-blue dark:group-hover:text-brand-blue-pale"><a href="/career-opportunities/experienced-professionals/">Experienced Professionals</a></h4>
                                        <p><a class="text-orient-900 hover:text-brand-red" href="/career-opportunities/experienced-professionals/">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php if ( is_page('internships') ) { ?>
                    <!--   Expect & Future   -->
                        <section class="full-bleed ll-equal-vert-spacing not-prose ">
                            <div class="px-2 md:container xl:px-4">
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
                            <div class="px-2 md:container xl:px-4">
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
                            </div>
                        </section>
                    <?php } ?>

                    <?php // C U L T U R E ... ?>
                    <section id="culture" class="full-bleed not-prose ll-equal-vert-spacing">
                        <div class="px-2 md:container xl:px-4">
                            <h2 class="mb-4">Culture</h2>
                            <div class="mb-6 overflow-hidden bg-cover bg-center bg-no-repeat bg-[url('https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1678295483/feat__careers--women-rise2_ed405i.jpg')]">
                                <div class="p-8 bg-gradient-to-r from-brand-blue-dark via-brand-blue-dark/80 to-brand-blue-dark/40 md:p-12 lg:px-26 lg:py-24">
                                    <div class="text-center sm:text-left">
                                        <h4 class="font-light text-brand-blue-pale"><a href="/about/women-rise/" class="no-underline hover:underline">Women RISE</a></h4>
                                        <p class="hidden max-w-lg md:my-4 md:block md:text-base md:leading-relaxed text-neutral-100">Women R.I.S.E. is a committee of employees dedicated to building and sustaining a collaborative and diverse workplace that strategically supports the development and advancement of women. We do this by creating and maintaining an environment that recognizes, cultivates and utilizes the talent of female employees.</p>
                                        <p><a class="text-brand-blue-faint hover:text-brand-red" href="/about/women-rise/">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden bg-cover bg-center bg-no-repeat bg-[url('https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1677875018/feat__careers--idea_ifhenr.jpg')]">
                                <div class="p-8 bg-gradient-to-r from-brand-blue-dark via-brand-blue-dark/80 to-brand-blue-dark/40 md:p-12 lg:px-26 lg:py-24">
                                    <div class="text-center sm:text-left">
                                        <h4 class="font-light text-brand-blue-pale"><a href="/about/idea-committee/" class="no-underline hover:underline">IDEA Committee</a></h4>
                                        <p class="hidden max-w-lg md:my-4 md:block md:text-base md:leading-relaxed text-neutral-100">At BeachFleischman, we intentionally cultivate a diverse, equitable, and inclusive environment where each person feels welcomed, accepted, empowered, valued, respected, and safe. This not only allows each one of us to achieve personal and professional success, but also allows us to better know and serve our clients and communities.</p>
                                        <p><a class="text-brand-blue-faint hover:text-brand-red" href="/about/idea-committee/">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>

                    <?php // B E N E F I T S ... ?>
                    <?php if ( !is_page('internships') ) : ?>
                        <section id="benefits" class="full-bleed">
                            <div class="px-2 md:container xl:px-4">
                                <h2 class="mb-4">Benefits</h2>
                                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                                    <?php foreach( $cards_benefits as $card ) {
                                        ll_render_hover_card( $card );
                                    } ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php // A W A R D S ... ?>
                    <section id="awards" class="bg-white full-bleed ll-equal-vert-padding dark:bg-neutral-800">
                        <div class="px-2 md:container xl:px-4">
                            <h2 class="mb-4">Awards and recognition</h2>
                            <?php echo do_shortcode( '[awardlogos /]' ); ?>
                        </div>

                        <div class="px-2 md:container xl:px-4">
                            <h2 class="mb-4">Our Team</h2>
                            <?php echo do_shortcode('[display-posts post_type="people" id="' . $hr_ids . '" orderby="ll_people_level" order="ASC" posts_per_page="4" wrapper="div" wrapper_class="grid grid-auto-fit gap-2" layout="card-people-small-desigs" /]'); ?>
                        </div>
                    </section>

                    <section class="full-bleed ll-equal-vert-padding bg-gradient-70 from-brand-blue from-30% via-brand-blue-dark via-50% to-brand-blue to-90% bg-180pct animate-sway not-prose text-neutral-100">
                        <div class="px-2 md:container xl:px-4">
                            <div class="flex flex-col items-start gap-4 sm:flex-row sm:items-center lg:gap-8">
                                <div class="prose lg:prose-xl grow">
                                    <h2 class="mb-2 text-brand-blue-faint text-shadow shadow-brand-blue-dark">View our current openings and apply today!</h2>
                                </div>
                                <div class="w-full md:max-w-fit">
                                    <div class="wp-block-button"><a class="border-2 wp-block-button__link wp-element-button has-brand-blue-dark-background-color has-background-color border-brand-blue-dark hover:border-brand-blue-faint hover:text-brand-blue-faint" href="/career-opportunities/#openings"><i class="mr-1 fa-solid fa-users"></i> Join our team</a></div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <?php // S O C I A L   F E E D ... ?>
                    <!-- <section class="full-bleed ll-equal-vert-padding">
                        <div class="container px-0 mx-auto lg:px-5">
                            <h6 class="text-brand-blue">Recently on Instagram</h6>
                            <?php // echo do_shortcode( '[instagram-feed num=3 cols=3]' );
                            ?>
                        </div>
                    </section> -->

                    <?php // get_template_part('template-parts/form/form', 'hubspot'); ?>

                </div>
            </article>
            <?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
