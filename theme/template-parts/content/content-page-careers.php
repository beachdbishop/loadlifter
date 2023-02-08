<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$gradient = 'linear-gradient(to right, rgba(9,47,66,1) 0%, rgba(9,47,66,0.8) 70%, rgba(9,47,66,0.2) 100%)';
$gradientmd = 'linear-gradient(to right, rgba(9,47,66,1) 0%, rgba(9,47,66,0.9) 30%, rgba(9,47,66,0.2) 70%, rgba(9,47,66,0) 100%)';
// $gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.7) 70%, rgba(0,0,0,0.2) 100%)';
// $gradientmd = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
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

if ('local' === wp_get_environment_type()) {
    $hr_ids = '1842,1843,3969';
} else {
    $hr_ids = '31394,31603,32639';
}
?>

<style>
    <?php if ($page_icon) {
        echo ':root { --page-icon-class: ' . $page_icon . ' }';
    } ?><?php // We're setting inline styles here because we need to include the responsive gradient AND dynamic image URL in the same background-image declaration;
    ?>.page-feat-image {
        background-image: <?php echo $gradient; ?>, url('<?php echo esc_url($page_featimg_url); ?>');
    }

    @media (min-width: 768px) {
        .page-feat-image {
            background-image: <?php echo $gradientmd; ?>, url('<?php echo esc_url($page_featimg_url); ?>');
        }
    }
</style>

<header class="page-feat-image | py-8 md:py-12 lg:py-24 bg-brand-blue-dark bg-no-repeat bg-cover lg:min-h-[448px] print:py-8" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="img" aria-label="<?php the_title_attribute(); ?>">
    <div class="px-1 md:container md:mx-auto md:px-0">

        <div class="md:flex">
            <div class="w-full md:w-1/2 lg:w-1/3">
                <h1 class="leading-none text-transparent tracking-light bg-gradient-to-r from-brand-blue-pale to-white bg-clip-text head-last-bold"><?php echo $page_title; ?></h1>
                <p class="mt-4 leading-normal text-white lg:text-2xl"><?php echo $page_excerpt; ?></p>
            </div>
            <?php if ($page_icon) : ?>
                <div class="hidden w-full md:flex md:items-center md:justify-end md:w-1/2 lg:w-2/3">
                    <p class="text-neutral-100">
                        <span class="fa-stack fa-4x fa-pull-right">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-duotone <?php echo $page_icon; ?> fa-stack-1x text-brand-blue"></i>
                        </span>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (function_exists('bcn_display') && !is_front_page()) { ?>
            <div class="breadcrumbs | font-head text-brand-gray-faint mt-4 md:mt-6 lg:mt-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
        <?php } ?>
    </div>
</header>

<article id="post-<?php the_ID(); ?>" <?php if (!is_front_page()) {
                                            post_class('');
                                        } ?>>
    <div class="px-1 md:container md:mx-auto md:px-0">

        <?php if (is_page('career-opportunities')) : ?>
            <section class="full-bleed bg-gradient-to-r from-brand-blue-faint via-white">
                <div class="container flex flex-wrap justify-center gap-2 px-1 py-4 mx-auto text-sm md:px-0 lg:gap-4">
                    <span>On this page:</span>
                    <a class="underline text-brand-blue-dark hover:text-brand-blue hover:underline hover:decoration-brand-blue-pale" href="#why">Why BeachFleischman?</a>
                    <a class="underline text-brand-blue-dark hover:text-brand-blue hover:underline hover:decoration-brand-blue-pale" href="#opportunities">Opportunities</a>
                    <a class="underline text-brand-blue-dark hover:text-brand-blue hover:underline hover:decoration-brand-blue-pale" href="#benefits">Benefits</a>
                    <a class="underline text-brand-blue-dark hover:text-brand-blue hover:underline hover:decoration-brand-blue-pale" href="#culture">Culture</a>
                    <a class="underline text-brand-blue-dark hover:text-brand-blue hover:underline hover:decoration-brand-blue-pale" href="#testimonials">Staff Testimonials</a>
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
            <section id="opportunities" class="full-bleed bg-gradient-to-t from-brand-blue-faint via-neutral-100 via-neutral-50 to-white">
                <div class="container px-1 py-8 mx-auto md:px-0 lg:py-12">
                    <h3 class="mb-6 text-center uppercase font-head">Opportunities</h3>
                    <div class="grid gap-4 text-neutral-600 md:grid-cols-3 lg:gap-8">
                        <div class="px-4 pb-4 bg-white shadow-md lg:px-8 group">
                            <div class="!mt-0 -mx-4 mb-4 lg:-mx-8 relative overflow-hidden bg-no-repeat bg-cover">
                                <img src="http://placekitten.com/736/385" class="transition duration-200 ease-in-out group-hover:scale-110" alt="placeholder img">
                            </div>
                            <h4 class="font-bold lg:mb-4 group-hover:text-brand-blue"><a href="/career-opportunities/internships/">Internships</a></h4>
                            <p class="text-base lg:mb-4 group-hover:text-neutral-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus velit totam voluptas aspernatur dicta nisi tenetur incidunt eum laudantium fuga doloremque sapiente veniam asperiores, consequatur, consequuntur odio, quos aliquam qui!</p>
                            <p><a class="text-brand-blue hover:text-brand-red" href="#">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                        </div>
                        <div class="px-4 pb-4 bg-white shadow-md lg:px-8 group">
                            <div class="!mt-0 -mx-4 mb-4 lg:-mx-8 relative overflow-hidden bg-no-repeat bg-cover">
                                <img src="http://placekitten.com/736/385" class="transition duration-200 ease-in-out group-hover:scale-110" alt="placeholder img">
                            </div>
                            <h4 class="font-bold lg:mb-4 group-hover:text-brand-blue"><a href="/career-opportunities/recent-college-graduates/">Recent College Graduates</a></h4>
                            <p class="text-base lg:mb-4 group-hover:text-neutral-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus velit totam voluptas aspernatur dicta nisi tenetur incidunt eum laudantium fuga doloremque sapiente veniam asperiores, consequatur, consequuntur odio, quos aliquam qui!</p>
                            <p><a class="text-brand-blue hover:text-brand-red" href="#">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                        </div>
                        <div class="px-4 pb-4 bg-white shadow-md lg:px-8 group">
                            <div class="!mt-0 -mx-4 mb-4 lg:-mx-8 relative overflow-hidden bg-no-repeat bg-cover">
                                <img src="http://placekitten.com/736/385" class="transition duration-200 ease-in-out group-hover:scale-110" alt="placeholder img">
                            </div>
                            <h4 class="font-bold lg:mb-4 group-hover:text-brand-blue"><a href="/career-opportunities/experienced-professionals/">Experienced Professionals</a></h4>
                            <p class="text-base lg:mb-4 group-hover:text-neutral-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus velit totam voluptas aspernatur dicta nisi tenetur incidunt eum laudantium fuga more sentence just to see how it alters the display doloremque sapiente veniam asperiores, consequatur, consequuntur odio, quos aliquam qui!</p>
                            <p><a class="text-brand-blue hover:text-brand-red" href="#">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ( is_page('internships') ) { ?>
        <!--   Expect & Future   -->
            <section class="full-bleed not-prose bg-gradient-to-b from-brand-blue-faint via-neutral-100 via-neutral-50 to-white">
                <div class="px-1 pt-8 mx-auto max-w-prose md:px-0 lg:pt-12">
                    <h3 class="font-bold text-center text-brand-red">What you can expect</h3>
                    <div class="flex flex-wrap justify-center gap-8 mx-auto my-4 md:my-12 lg:my-12">
                        <div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-front">
                                        <div class="card-icon">
                                            <span class="fa-stack fa-2x">
                                                <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                <i class="fa-duotone fa-handshake fa-stack-1x text-brand-blue"></i>
                                            </span>
                                        </div>
                                        <h4>Personal success</h4>
                                    </div>
                                    <div class="card-back">
                                        <h6>Personal success</h6>
                                        <p>You will have a challenging and rewarding career with many options for growth. You are unique, so your goals and dreams are unique; we help you pursue your success.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-front">
                                        <div class="card-icon">
                                            <span class="fa-stack fa-2x">
                                                <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                <i class="fa-duotone fa-comments fa-stack-1x text-brand-blue"></i>
                                            </span>
                                        </div>
                                        <h4>Easy interactions</h4>
                                    </div>
                                    <div class="card-back">
                                        <h6>Easy interactions</h6>
                                        <p>Clear communication and accessible management provide you with a supportive environment. When serving clients, we integrate our service teams to provide a collaborative experience for our staff and clients alike.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-front">
                                        <div class="card-icon">
                                            <span class="fa-stack fa-2x">
                                                <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                <i class="fa-duotone fa-gauge-high fa-stack-1x text-brand-blue"></i>
                                            </span>
                                        </div>
                                        <h4>Enhanced ability</h4>
                                    </div>
                                    <div class="card-back">
                                        <h6>Enhanced ability</h6>
                                        <p>You will have continuous opportunities to learn and grow here. BeachFleischman has built a learning culture that includes:</p>
                                        <ul class="mt-2 list-disc list-inside">
                                            <li>Mentoring program</li>
                                            <li>CPA exam bonus and reimbursement</li>
                                            <li>Paid continuing professional education, membership dues, and licenses</li>
                                            <li>Leadership development</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-front">
                                        <div class="card-icon">
                                            <span class="fa-stack fa-2x">
                                                <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                <i class="fa-duotone fa-house-building fa-stack-1x text-brand-blue"></i>
                                            </span>
                                        </div>
                                        <h4>Community impact</h4>
                                    </div>
                                    <div class="card-back">
                                        <h6>Community impact</h6>
                                        <p>Are you passionate about supporting the community? BeachFleischman encourages and financially supports your involvement in local organizations.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } else { ?>
            <section class="full-bleed not-prose bg-gradient-to-b from-brand-blue-faint via-neutral-100 via-neutral-50 to-white">
                <div class="container px-1 pt-8 mx-auto md:px-0 lg:pt-12">
                    <div class="grid gap-2 md:grid-cols-2 md:gap-4 lg:gap-8">
                        <div>
                            <h3 class="font-bold text-center text-brand-red">What you can expect</h3>
                            <div class="flex flex-wrap justify-center gap-8 mx-auto my-4 md:my-12 lg:my-12">
                                <div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-front">
                                                <div class="card-icon">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                        <i class="fa-duotone fa-handshake fa-stack-1x text-brand-blue"></i>
                                                    </span>
                                                </div>
                                                <h4>Personal success</h4>
                                            </div>
                                            <div class="card-back">
                                                <h6>Personal success</h6>
                                                <p>You will have a challenging and rewarding career with many options for growth. You are unique, so your goals and dreams are unique; we help you pursue your success.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-front">
                                                <div class="card-icon">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                        <i class="fa-duotone fa-comments fa-stack-1x text-brand-blue"></i>
                                                    </span>
                                                </div>
                                                <h4>Easy interactions</h4>
                                            </div>
                                            <div class="card-back">
                                                <h6>Easy interactions</h6>
                                                <p>Clear communication and accessible management provide you with a supportive environment. When serving clients, we integrate our service teams to provide a collaborative experience for our staff and clients alike.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-front">
                                                <div class="card-icon">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                        <i class="fa-duotone fa-gauge-high fa-stack-1x text-brand-blue"></i>
                                                    </span>
                                                </div>
                                                <h4>Enhanced ability</h4>
                                            </div>
                                            <div class="card-back">
                                                <h6>Enhanced ability</h6>
                                                <p>You will have continuous opportunities to learn and grow here. BeachFleischman has built a learning culture that includes:</p>
                                                <ul class="mt-2 list-disc list-inside">
                                                    <li>Mentoring program</li>
                                                    <li>CPA exam bonus and reimbursement</li>
                                                    <li>Paid continuing professional education, membership dues, and licenses</li>
                                                    <li>Leadership development</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-front">
                                                <div class="card-icon">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                        <i class="fa-duotone fa-house-building fa-stack-1x text-brand-blue"></i>
                                                    </span>
                                                </div>
                                                <h4>Community impact</h4>
                                            </div>
                                            <div class="card-back">
                                                <h6>Community impact</h6>
                                                <p>Are you passionate about supporting the community? BeachFleischman encourages and financially supports your involvement in local organizations.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold text-center text-brand-red">Your future</h3>
                            <div class="flex flex-wrap justify-center gap-8 mx-auto my-4 md:my-12 lg:my-12">
                                <div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-front">
                                                <div class="card-icon">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                        <i class="fa-duotone fa-rocket fa-stack-1x text-brand-blue"></i>
                                                    </span>
                                                </div>
                                                <h4>Career advancement</h4>
                                            </div>
                                            <div class="card-back">
                                                <h6>Career advancement</h6>
                                                <p>You will have many avenues to advance your career. You choose your area of specialization and we’ll provide challenging work that empowers you to be your best.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-front">
                                                <div class="card-icon">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                        <i class="fa-duotone fa-microphone fa-stack-1x text-brand-blue"></i>
                                                    </span>
                                                </div>
                                                <h4>Be heard</h4>
                                            </div>
                                            <div class="card-back">
                                                <h6>Be heard</h6>
                                                <p>Your feedback and ideas are important to us. Through our collaborative work style, your voice will be heard.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-front">
                                                <div class="card-icon">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                        <i class="fa-duotone fa-laptop-mobile fa-stack-1x text-brand-blue"></i>
                                                    </span>
                                                </div>
                                                <h4>Embrace technology</h4>
                                            </div>
                                            <div class="card-back">
                                                <h6>Embrace technology</h6>
                                                <p>Be part of our continuous drive to innovate through technology. We automate many processes and use cloud-based solutions to create a seamless experience for our clients and staff alike.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-front">
                                                <div class="card-icon">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-circle fa-stack-2x text-neutral-100"></i>
                                                        <i class="fa-duotone fa-thumbs-up fa-stack-1x text-brand-blue"></i>
                                                    </span>
                                                </div>
                                                <h4>Seek success</h4>
                                            </div>
                                            <div class="card-back">
                                                <h6>Seek success</h6>
                                                <p>Our success depends on you, your career, your development, and your growth. Here, you will follow your passions, including working with growth-oriented clients and taking ownership of your projects. Seek success and the future is yours!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <!--   C U L T U R E   -->
        <section id="culture" class="full-bleed bg-gradient-to-t from-brand-blue via-brand-blue-faint ">
            <div class="container px-1 py-8 mx-auto md:px-0 lg:py-12">
                <h3 class="mb-6 text-center uppercase font-head">Culture</h3>
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">

                    <div class="p-4 prose bg-white lg:p-8">
                        <div class="flex items-center justify-center p-4 bg-white border lg:p-8 border-neutral-200 aspect-square lg:aspect-video"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,w_400/v1675698306/feat__buddy-mentor_g81otc.jpg" alt="A mentor and mentee smile while having a discussion" /></div>
                        <h4 class="font-light text-brand-blue-dark">Buddy/Mentor Program</h4>
                        <p class="text-base">When you start at BeachFleischman, you&apos;ll be assigned a buddy and a mentor to help support you through your onboarding and long-term career.</p>
                        <p class="text-base">Your buddy is a person designated to be a &quot;go to&quot; person for any questions you have; they help to make your onboarding comfortable and successful. Your buddy will be from the same department that you are, i.e. Tax, Audit, or Administration, and they will help you get settled into your new job.</p>
                        <p class="text-base">Your mentor guides you through career progress and opportunities. They impart their knowledge and experience to help you navigate promotions, new duties, and questions about the accounting industry. With their support, you will be well equipped to pursue a successful, fulfilling career.</p>
                    </div>

                    <div class="p-4 prose bg-white lg:p-8">
                        <div class="flex items-center justify-center p-4 bg-white border lg:p-8 border-neutral-200 aspect-square lg:aspect-video"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,w_400/v1675698311/feat__developu_bobcnr.jpg" alt="A woman stands in front of a whiteboard" /></div>
                        <h4 class="font-light text-brand-blue-dark">developU</h4>
                        <p class="text-base">As part of our commitment to continuous learning and growth, we provide training on professional skills through our developU program. developU classes and workshops support our employees' long-term career goals and provide them the opportunity and resources to advance their leadership skills, client and team interactions, and cultivate healthy stress management techniques.</p>
                    </div>

                    <div class="p-4 prose bg-white lg:p-8">
                        <div class="flex items-center justify-center p-4 bg-white border lg:p-8 border-neutral-200 aspect-square lg:aspect-video"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,w_400/v1675698767/feat__women-rise_genexx.png" alt="logo: Women RISE = reach, inspire, support, empower" /></div>
                        <h4 class="font-light text-brand-blue-dark">Women RISE</h4>
                        <p class="text-base">Women R.I.S.E. is a committee of employees dedicated to building and sustaining a collaborative and diverse workplace that strategically supports the development and advancement of women. We do this by creating and maintaining an environment that recognizes, cultivates and utilizes the talent of female employees.</p>
                        <p><a class="text-brand-blue hover:text-brand-red" href="/about/women-rise/">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                    </div>

                    <div class="p-4 prose bg-white lg:p-8">
                        <div class="flex items-center justify-center p-4 bg-white border border-neutral-200 lg:p-8 aspect-square lg:aspect-video"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,cs_srgb,dpr_auto,f_auto,w_400/v1644339189/logolib/IDEA_with_tagline_and_meaning.png" alt="logo: IDEA = inclusion, diversity, equity, and action" /></div>
                        <h4 class="font-light text-brand-blue-dark">IDEA Committee</h4>
                        <p class="text-base">At BeachFleischman, we intentionally cultivate a diverse, equitable, and inclusive environment where each person feels welcomed, accepted, empowered, valued, respected, and safe. This not only allows each one of us to achieve personal and professional success, but also allows us to better know and serve our clients and communities.</p>
                        <p><a class="text-brand-blue hover:text-brand-red" href="/about/idea-committee/">Learn more <i class="fa-regular fa-arrow-right"></i></a></p>
                    </div>
                </div>

            </div>
        </section>

        <!--   B E N E F I T S   -->
        <?php if ( !is_page('internships') ) : ?>
            <section id="benefits" class="full-bleed">
                <div class="px-1 py-8 mx-auto md:px-0 lg:px-5 lg:py-12">
                    <h3 class="mb-6 text-center uppercase text-brand-blue ">Additional Benefits</h3>
                    <div class="mx-auto max-w-prose">
                        <p>Additionally, we offer a variety of benefits to support your professional and personal well-being:</p>
                        <ul class="gap-2 mt-4 space-y-2 list-inside columns-2 list-square">
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
                </div>
            </section>
        <?php endif; ?>

        <!--   S T A F F   T E S T I M O N I A L S   -->
        <section id="testimonials" class="full-bleed text-neutral-600 bg-gradient-to-t from-neutral-500 via-neutral-200 via-neutral-100 via-neutral-50">
            <div class="container px-1 py-8 mx-auto md:px-0 lg:py-12">
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
        </section>

        <!--   A W A R D S   -->
        <section id="awards">
            <div class="max-w-3xl px-1 py-8 mx-auto md:px-0 lg:py-16 lg:max-w-4xl">
                <h3 class="mb-6 text-center uppercase font-head text-brand-blue-dark">Awards &amp; Recognition</h3>
                <div class="flex flex-wrap items-center gap-2 mx-auto -m-4 place-content-between lg:gap-4">
                    <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1634570038/Move_bestfirm_EL_2021_dpoubu.png" alt="2021 Best Firm for Equity Leadership - MOVE Project" width="158" height="100">
                    <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1673468396/2022_AccountingToday_Best_Firms_for_Young_Accountants_Badge_prekkv.png" alt="Best Firms for Young Accountants 2022 - Accounting Today" width="170" height="100">
                    <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1659635345/award-images--2022-ipa-top-200_ofqhce.png" alt="Inside Public Accounting's 2022 Top 200 Firms" width="100" height="100">
                    <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_100/v1570228350/clearlyrated-best-of-accounting-2019_b4g2yx.png" alt="Best of Accounting 2019 - Clearly Rated" width="100" height="100">
                    <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1634657713/award__ipa-all-star-firms_ium0vb.png" alt="Inside Public Accounting's All Star Firms" width="100" height="100">
                </div>
            </div>
        </section>

        <!-- CTA and Recruiting Contact(s) -->
        <section id="team" class="full-bleed bg-gradient-to-t from-brand-blue-faint via-neutral-100 via-neutral-50 to-white">
            <div class="container px-1 py-8 mx-auto md:px-0 lg:py-12">
                <h3 class="text-center uppercase text-brand-blue-dark">Our Recruiting Team</h3>
                <?php echo do_shortcode('[display-posts post_type="people" id="' . $hr_ids . '" orderby="ll_people_level" order="DESC" posts_per_page="3" wrapper="div" wrapper_class="grid grid-auto-fit gap-8" layout="card-people-small" /]'); ?>
            </div>
        </section>

        <section class="full-bleed bg-brand-gray text-neutral-100">
            <div class="px-1 py-12 mx-auto md:px-0 lg:py-20">
                <p class="text-2xl text-center ">View our current openings and apply today!
                    <a
                        class="px-4 py-3 ml-2 border-2 border-transparent rounded-lg bg-neutral-100 text-neutral-700 hover:bg-brand-blue-dark hover:text-white hover:shadow-md hover:border-white"
                        href="/career-opportunities/#openings"
                        >
                        <i class="fa-solid fa-users"></i> Join our team
                    </a>
                </p>
            </div>
        </section>

        <!--   S O C I A L   F E E D   -->
        <!-- <section class="full-bleed">
            <div class="container px-0 py-8 mx-auto lg:px-5 lg:py-12">
                <h6 class="text-brand-blue">Recently on Instagram</h6>
                <?php // echo do_shortcode( '[instagram-feed num=3 cols=3]' );
                ?>
            </div>
        </section> -->

        <?php get_template_part('template-parts/form/form', 'hubspot'); ?>

    </div>
</article><!-- #post-<?php the_ID(); ?> -->
