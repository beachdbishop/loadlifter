<?php
/**
 * Template part for displaying Careers page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$page_id = get_the_ID();
if (get_field('ll_page_title_override')) {
    $page_title = get_field('ll_page_title_override');
} else {
    $page_title = get_the_title();
}

$page_icon = (get_field('ll_page_icon')) ? get_field('ll_page_icon') : false;
$page_excerpt = get_the_excerpt();
$page_featimg = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
if ($page_featimg == true) {
    $page_featimg_url = $page_featimg[0];
} else {
    $page_featimg_url = '';
}

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
        "backContent" => '<p>You will have continuous opportunities to learn and grow in our learning culture that includes:</p>
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


if ('local' === wp_get_environment_type()) {
    $hr_ids = '1842,1843,3969';
} else {
    $hr_ids = '31394,31603,32639';
}

function ll_no_link_card( $card ) {
    echo '<div>
        <div class="card | relative inline-block float-left w-[--card-size] h-[--card-size] [perspective:600px]" style="--card-back-bg: #092f42">
            <div class="card-content | absolute w-full h-full rounded-lg shadow-lg shadow-neutral-300 transition-transform ease-out duration-700 [transform-style:preserve-3d]">
                <div class="card-front | text-center bg-[--card-front-bg] text-[--card-front-text] absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 [backface-visibility:hidden]">
                    <div class="card-icon | text-[--card-front-icon]">
                        <span class="fa-stack fa-2x">
                            <i class="text-white fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-duotone ' . $card['icon'] . ' fa-stack-1x "></i>
                        </span>
                    </div>
                    <h3 class="mt-2 font-light leading-none text-current">' . $card['label'] . '</h3>
                </div>
                <div class="card-back | absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 bg-[--card-back-bg] text-[--card-back-text] bg-no-repeat bg-cover bg-blend-multiply shadow-neutral-900/50 [backface-visibility:hidden]  [transform:rotateY(180deg)]">
                    <h6 class="my-2 leading-none tracking-wide text-center text-current text-shadow">' . $card['label'] . '</h6>
                    <p class="text-center text-shadow">' . $card['backContent'] . '</p>
                </div>
            </div>
        </div>
    </div>';
}
?>

<?php ll_page_hero( $page_title, $page_excerpt, $page_featimg_url ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="px-2 md:container md:mx-auto md:px-0">

        <?php if (is_page('career-opportunities')) : ?>
            <section class="full-bleed bg-gradient-to-r from-brand-blue-faint via-white">
                <div class="container flex flex-wrap justify-center gap-2 px-2 py-4 mx-auto text-sm md:px-0 lg:gap-4">
                    <span>On this page:</span>
                    <a class="underline text-brand-blue-dark hover:text-brand-blue hover:underline hover:decoration-brand-blue-pale" href="#why">Why BeachFleischman?</a>
                    <a class="underline text-brand-blue-dark hover:text-brand-blue hover:underline hover:decoration-brand-blue-pale" href="#opportunities">Opportunities</a>
                    <a class="underline text-brand-blue-dark hover:text-brand-blue hover:underline hover:decoration-brand-blue-pale" href="#culture">Culture</a>
                    <a class="underline text-brand-blue-dark hover:text-brand-blue hover:underline hover:decoration-brand-blue-pale" href="#benefits">Benefits</a>
                    <a class="underline text-brand-blue-dark hover:text-brand-blue hover:underline hover:decoration-brand-blue-pale" href="#awards">Awards</a>
                </div>
            </section>
        <?php endif; ?>

        <div class="prose lg:prose-xl entry-content">

            <?php the_content(); ?>

        </div>

        <div class="clear-both">&nbsp;</div>

        <?php if (is_page('career-opportunities')) : ?>
        <!--   O P P O R T U N I T I E S   -->
            <section id="opportunities" class="full-bleed ll-equal-vert-padding bg-gradient-to-t from-brand-blue-faint via-neutral-100 to-white">
                <div class="container px-2 mx-auto md:px-0">
                    <h3 class="mb-6 text-center uppercase font-head">Opportunities</h3>
                    <div class="grid gap-4 text-neutral-600 md:grid-cols-3 lg:gap-8">
                        <div class="px-4 pb-4 bg-white shadow-md lg:px-8 group">
                            <div class="!mt-0 -mx-4 mb-4 lg:-mx-8 relative overflow-hidden bg-no-repeat bg-cover">
                                <a href="/career-opportunities/internships/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-internships--social_q07na1.jpg" class="transition duration-200 ease-in-out group-hover:scale-110" alt="Man and young man having a converstion at a table"></a>
                            </div>
                            <h4 class="font-bold lg:mb-4 group-hover:text-brand-blue"><a href="/career-opportunities/internships/">Internships</a></h4>
                            <p class="text-base todo lg:mb-4 group-hover:text-neutral-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus velit totam voluptas aspernatur dicta nisi tenetur incidunt eum laudantium fuga doloremque sapiente veniam asperiores, consequatur, consequuntur odio, quos aliquam qui!</p>
                            <p><a class="text-brand-blue hover:text-brand-red" href="/career-opportunities/internships/">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                        </div>
                        <div class="px-4 pb-4 bg-white shadow-md lg:px-8 group">
                            <div class="!mt-0 -mx-4 mb-4 lg:-mx-8 relative overflow-hidden bg-no-repeat bg-cover">
                                <a href="/career-opportunities/recent-college-graduates/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-college-grads--social_jlh5qx.jpg" class="transition duration-200 ease-in-out group-hover:scale-110" alt="Group of happy college students walking down a street"></a>
                            </div>
                            <h4 class="font-bold lg:mb-4 group-hover:text-brand-blue"><a href="/career-opportunities/recent-college-graduates/">Recent College Graduates</a></h4>
                            <p class="text-base todo lg:mb-4 group-hover:text-neutral-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus velit totam voluptas aspernatur dicta nisi tenetur incidunt eum laudantium fuga doloremque sapiente veniam asperiores, consequatur, consequuntur odio, quos aliquam qui!</p>
                            <p><a class="text-brand-blue hover:text-brand-red" href="/career-opportunities/recent-college-graduates/">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                        </div>
                        <div class="px-4 pb-4 bg-white shadow-md lg:px-8 group">
                            <div class="!mt-0 -mx-4 mb-4 lg:-mx-8 relative overflow-hidden bg-no-repeat bg-cover">
                                <a href="/career-opportunities/experienced-professionals/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-exp-pro--social_oxpiif.jpg" class="transition duration-200 ease-in-out group-hover:scale-110" alt="Happy person in glasses shaking the hand of someone out of frame"></a>
                            </div>
                            <h4 class="font-bold lg:mb-4 group-hover:text-brand-blue"><a href="/career-opportunities/experienced-professionals/">Experienced Professionals</a></h4>
                            <p class="text-base todo lg:mb-4 group-hover:text-neutral-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus velit totam voluptas aspernatur dicta nisi tenetur incidunt eum laudantium fuga more sentence just to see how it alters the display doloremque sapiente veniam asperiores, consequatur, consequuntur odio, quos aliquam qui!</p>
                            <p><a class="text-brand-blue hover:text-brand-red" href="/career-opportunities/experienced-professionals/">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ( is_page('internships') ) { ?>
        <!--   Expect & Future   -->
            <section class="full-bleed not-prose bg-gradient-to-b from-brand-blue-faint via-neutral-100 to-white">
                <div class="px-2 pt-8 mx-auto max-w-prose md:px-0 lg:pt-12">
                    <h3 class="font-bold text-center text-brand-red">What you can expect</h3>
                    <div class="ind-card-flips is-style-default | mx-auto my-4 md:my-12 lg:my-12 ">
                    <?php foreach( $cards_expect as $card ) {
                        ll_no_link_card( $card );
                     } ?>
                    </div>
                </div>
            </section>
        <?php } else { ?>
            <section class="full-bleed not-prose bg-gradient-to-b from-brand-blue-faint via-neutral-100 to-white">
                <div class="container px-2 pt-8 mx-auto md:px-0 lg:pt-12">
                    <h3 class="font-bold text-brand-red">What you can expect</h3>
                    <div class="ind-card-flips is-style-default | mx-auto my-4 md:my-12 lg:my-12 ">
                    <?php foreach( $cards_expect as $card ) {
                        ll_no_link_card( $card );
                    } ?>
                    </div>

                    <h3 class="font-bold text-brand-red">Your future</h3>
                    <div class="ind-card-flips is-style-default | mx-auto my-4 md:my-12 lg:my-12 ">
                    <?php foreach( $cards_future as $card ) {
                        ll_no_link_card( $card );
                    } ?>
                    </div>
                </div>
                </div>
            </section>
        <?php } ?>

        <!--   C U L T U R E   -->
        <section id="culture" class="full-bleed not-prose ll-equal-vert-padding">
            <div class="container px-2 mx-auto md:px-0">
                <h3 class="mb-6 text-center uppercase font-head">Culture</h3>

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

        <!--   B E N E F I T S   -->
        <?php if ( !is_page('internships') ) : ?>
            <!-- <section id="benefits" class="full-bleed">
                <div class="px-2 py-8 mx-auto md:px-0 lg:px-5 lg:py-12">
                    <h3 class="mb-6 text-center uppercase text-brand-blue ">Additional Benefits</h3>
                    <div class="md:grid md:grid-cols-3 md:gap-4">

                        <div class="md:col-span-3 lg:col-span-2">
                            <p>Additionally, we offer a variety of benefits to support your professional and personal well-being:</p>
                            <ul class="gap-4 my-4 ml-3 space-y-2 md:columns-3 lg:columns-2 list-square">
                                <li>Medical, dental, and vision insurance</li>
                                <li>Supplemental insurance</li>
                                <li>Life insurance</li>
                                <li>401(k) program with employer matching</li>
                                <li>CPA exam reimbursement and bonus</li>
                                <li>Performance-based bonuses</li>
                                <li>Paid time off and sick leave</li>
                                <li>Health and wellness reimbursement</li>
                                <li>Busy season meals and snacks</li>
                            </ul>
                        </div>
                        <div class="hidden lg:block">
                            <img src="https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-benefits--social_hv6tcv.jpg" alt="Girl in classes pointing toward the list of benefits behind her">
                        </div>
                    </div>
                </div>
            </section> -->
            <section id="benefits" class="full-bleed ll-equal-vert-padding bg-gradient-to-t from-brand-blue via-brand-blue-faint ">
                <div class="container px-2 mx-auto md:px-0">
                    <h3 class="mb-6 text-center uppercase font-head">Benefits &amp; Perks</h3>
                    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">

                        <div class="p-4 prose bg-white lg:p-8">
                            <div class="flex items-center justify-center p-4 bg-white border not-prose border-neutral-200"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,w_400/v1675698306/feat__buddy-mentor_g81otc.jpg" alt="A mentor and mentee smile while having a discussion" /></div>
                            <h4 class="font-light text-brand-blue-dark">Career Development</h4>
                            <p class="text-base todo">When you start at BeachFleischman, you&apos;ll be assigned a buddy and a mentor to help support you through your onboarding and long-term career. Your buddy is a person designated to be a &quot;go to&quot; person for any questions you have; they help to make your onboarding comfortable and successful. Your mentor guides you through career progress and opportunities.</p>
                            <p class="text-base todo">As part of our commitment to continuous learning and growth, we provide training on professional skills through our developU program.</p>
                        </div>

                        <div class="p-4 prose bg-white lg:p-8">
                            <div class="flex items-center justify-center p-4 bg-white border not-prose border-neutral-200"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,w_400/v1677875018/feat__careers-health-wellness_am649w.jpg" alt="A patient has a discussion with a medical professional" /></div>
                            <h4 class="font-light text-brand-blue-dark">Health &amp; Wellness</h4>
                            <p class="text-base todo">BeachFleischman offers a variety of healthcare benefits to cover employees and their families.</p>
                        </div>

                        <div class="p-4 prose bg-white lg:p-8">
                            <div class="flex items-center justify-center p-4 bg-white border not-prose border-neutral-200"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,w_400/v1677875018/feat__careers-financial-wellness_ugapx0.jpg" alt="5 stacks of coins increasing in height from one to the next" /></div>
                            <h4 class="font-light text-brand-blue-dark">Financial Wellness</h4>
                            <p class="text-base todo">We offer a comprehensive retirement package including: </p>
                            <ul class="todo">
                                <li>Medical, dental, and vision insurance</li>
                                <li>Supplemental insurance</li>
                                <li>Life insurance</li>
                                <li>401(k) program with employer matching and defined benefit plan</li>
                                <li>CPA exam reimbursement and bonus</li>
                                <li>Performance-based bonuses</li>
                            </ul>
                        </div>

                        <div class="p-4 prose bg-white lg:p-8">
                            <div class="flex items-center justify-center p-4 bg-white border not-prose border-neutral-200"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,w_400/v1677875018/feat__careers-perks_qwhc1n.jpg" alt="A man looks out the window with his hands raised in happiness" /></div>
                            <h4 class="font-light text-brand-blue-dark">Perks</h4>
                            <ul class="todo">
                                <li>"Dress for your day" dress code</li>
                                <li>Flexible scheduling</li>
                                <li>Hybrid/remote work options</li>
                                <li>Busy season meals and snacks</li>
                                <li>Great snacks -- if you work in the Phoenix office</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!--   S T A F F   T E S T I M O N I A L S   -->
        <!-- <section id="testimonials" class="full-bleed ll-equal-vert-padding text-neutral-600 bg-gradient-to-t from-neutral-300 via-neutral-200 via-neutral-100 via-neutral-50">
            <div class="container px-2 mx-auto md:px-0">
                <h3 class="mb-6 text-center uppercase font-head text-brand-blue">Staff Testimonials</h3>
                <div class="flex flex-wrap -m-4">
                    <div class="w-full p-4 md:w-1/2">
                        <div class="h-full p-8 bg-white rounded-xl">
                            <i class="fa-solid fa-quote-right fa-2x text-neutral-200"></i>
                            <p class="mb-6 leading-relaxed">Candy canes wafer gummi bears caramels apple pie gummi bears. Tootsie roll cookie soufflé brownie tiramisu toffee. Danish jujubes tiramisu shortbread jujubes jujubes marshmallow. Pie tart bear claw liquorice gummi bears lemon drops muffin.</p>
                            <div class="inline-flex items-center">
                                <a href="#"><img alt="Travis Jones serving waffles during our Waffle Wednesday event" src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1674858762/nonheadshot--waffle-tjones_cj29ya.jpg" class="flex-shrink-0 object-cover object-center w-16 h-16 rounded-full"></a>
                                <span class="flex flex-col flex-grow pl-4">
                                    <a href="#"><span class="font-bold font-head text-neutral-900">Travis Jones</span></a>
                                    <span class="text-sm text-neutral-500">Principal</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-4 md:w-1/2">
                        <div class="h-full p-8 bg-white rounded-xl">
                            <i class="fa-solid fa-quote-right fa-2x text-neutral-200"></i>
                            <p class="mb-6 leading-relaxed">Cupcake ipsum dolor sit amet gummi bears shortbread lollipop gummi bears. Cookie fruitcake jelly candy toffee pie soufflé. Brownie marzipan liquorice tart jelly-o jelly beans chocolate tootsie roll bonbon. Marshmallow oat cake candy canes oat cake donut chocolate cheesecake lemon drops.</p>
                            <div class="inline-flex items-center">
                                <a href="#"><img alt="Eric Freeman in line for gelato in our Tucson office parking lot" src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1674858768/nonheadshot--gelato-efreeman_sd63mm.jpg" class="flex-shrink-0 object-cover object-center w-16 h-16 rounded-full"></a>
                                <span class="flex flex-col flex-grow pl-4">
                                    <a href="#"><span class="font-bold font-head text-neutral-900">Eric Freeman</span></a>
                                    <span class="text-sm text-neutral-500">Principal</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!--   A W A R D S   -->
        <section id="awards" class="ll-equal-vert-padding">
            <div class="max-w-3xl px-2 mx-auto md:px-0 lg:max-w-4xl">
                <h3 class="mb-6 text-center uppercase font-head text-brand-blue-dark">Awards &amp; Recognition</h3>
                <div class="flex flex-col flex-wrap items-center max-w-5xl gap-2 mx-auto -m-4 place-content-center md:place-content-between md:flex-row lg:gap-8">
                    <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1634570038/Move_bestfirm_EL_2021_dpoubu.png" alt="2021 Best Firm for Equity Leadership - MOVE Project" width="158" height="100">
                    <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1673468396/2022_AccountingToday_Best_Firms_for_Young_Accountants_Badge_prekkv.png" alt="Best Firms for Young Accountants 2022 - Accounting Today" width="170" height="100">
                    <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1659635345/award-images--2022-ipa-top-200_ofqhce.png" alt="Inside Public Accounting's 2022 Top 200 Firms" width="100" height="100">
                    <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_100/v1570228350/clearlyrated-best-of-accounting-2019_b4g2yx.png" alt="Best of Accounting 2019 - Clearly Rated" width="100" height="100">
                    <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1634657713/award__ipa-all-star-firms_ium0vb.png" alt="Inside Public Accounting's All Star Firms" width="100" height="100">
                </div>
            </div>
        </section>

        <!-- CTA and Recruiting Contact(s) -->
        <section id="team" class="bg-white full-bleed ll-equal-vert-padding">
            <div class="container px-2 mx-auto md:px-0">
                <h3 class="text-center uppercase text-brand-blue-dark">The people that will grill you from one side of the interview table</h3>
                <?php echo do_shortcode('[display-posts post_type="people" id="' . $hr_ids . '" orderby="ll_people_level" order="DESC" posts_per_page="3" wrapper="div" wrapper_class="grid grid-auto-fit gap-8" layout="card-people-small" /]'); ?>
            </div>
        </section>

        <section class="full-bleed bg-gradient-70 from-brand-blue-dark from-30% via-brand-blue via-50% to-brand-blue-dark to-90% bg-180pct animate-sway py-16 lg:py-20">
            <div class="px-2 mx-auto md:px-0">
                <div class="flex flex-col items-start justify-center gap-8 mx-auto text-2xl sm:gap-4 text-neutral-100 lg:w-2/3 sm:flex-row sm:items-center ">
                    <p class="">View our current openings and apply today!</p>
                    <div class="">
                        <a href="/career-opportunities/#openings" class="p-4 bg-transparent border-2 rounded-lg border-brand-blue-pale text-brand-blue-pale hover:bg-brand-blue-pale hover:text-brand-blue-dark"><i class="mr-1 fa-solid fa-users"></i>&nbsp;Join&nbsp;our&nbsp;team</a>
                    </div>
                </div>
            </div>
        </section>

        <!--   S O C I A L   F E E D   -->
        <!-- <section class="full-bleed ll-equal-vert-padding">
            <div class="container px-0 mx-auto lg:px-5">
                <h6 class="text-brand-blue">Recently on Instagram</h6>
                <?php // echo do_shortcode( '[instagram-feed num=3 cols=3]' );
                ?>
            </div>
        </section> -->

        <?php // get_template_part('template-parts/form/form', 'hubspot'); ?>

    </div>
</article><!-- #post-<?php the_ID(); ?> -->
