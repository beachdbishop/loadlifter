<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
?>

<article id="post-<?php the_ID(); ?>" <?php if ( !is_front_page() ) { post_class( 'pt-4 md:pt-6 lg:pt-8' ); } ?>>
	<div class="px-1 md:container md:mx-auto md:px-0">
		<?php if ( function_exists( 'bcn_display' ) ) { ?>
			<div class="breadcrumbs | font-head text-neutral-700 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>

		<header>
			<?php the_title( '<h1 class="entry-title | ">', '</h1>' ); ?>
		</header>

		<div class="prose lg:prose-xl entry-content">
			<?php the_content(); ?>

			<div class="clear-both">&nbsp;</div>

            <div class="not-prose">
                <!--   B E N E F I T S   -->
                <?php if( !is_page( 'internships' ) ): ?>
                <section class="full-bleed">
                    <div class="px-0 pb-8 mx-auto lg:px-5 lg:pb-20">
                        <h3 class="text-center uppercase text-brand-blue ">Additional Benefits</h3>
                        <div class="grid gap-2 px-2 mx-auto my-4 text-center sm:grid-cols-2 md:my-8 md:px-0 md:gap-4 md:grid-cols-3 lg:gap-8 bogus-class">
                            <div class="px-4 py-6 bg-white rounded-lg text-brand-blue-dark">
                                <i class="fa-light fa-bandage fa-2x text-brand-blue"></i>
                                <p class="text-xl leading-relaxed uppercase font-body">Medical</p>
                            </div>
                            <div class="px-4 py-6 bg-white rounded-lg text-brand-blue-dark">
                                <i class="fa-light fa-tooth fa-2x text-brand-blue"></i>
                                <p class="text-xl leading-relaxed uppercase font-body">Dental</p>
                            </div>
                            <div class="px-4 py-6 bg-white rounded-lg text-brand-blue-dark">
                                <i class="fa-light fa-glasses-round fa-2x text-brand-blue"></i>
                                <p class="text-xl leading-relaxed uppercase font-body">Vision</p>
                            </div>
                            <div class="px-4 py-6 bg-white rounded-lg text-brand-blue-dark">
                                <i class="fa-light fa-piggy-bank fa-2x text-brand-blue"></i>
                                <p class="text-xl leading-relaxed uppercase font-body">401(k)</p>
                            </div>
                            <div class="px-4 py-6 bg-white rounded-lg text-brand-blue-dark">
                                <i class="fa-light fa-file-certificate fa-2x text-brand-blue"></i>
                                <p class="text-xl leading-relaxed uppercase font-body">
                                CPA Exam Reimbursement
                                </p>
                            </div>
                            <div class="px-4 py-6 bg-white rounded-lg text-brand-blue-dark">
                                <i class="fa-light fa-chart-user fa-2x text-brand-blue"></i>
                                <p class="text-xl leading-relaxed uppercase font-body">
                                Performance Bonuses
                                </p>
                            </div>
                            <div class="px-4 py-6 bg-white rounded-lg text-brand-blue-dark">
                                <i class="fa-light fa-person-through-window fa-2x text-brand-blue"></i>
                                <p class="text-xl leading-relaxed uppercase font-body">
                                Paid Time Off &amp; Sick Leave
                                </p>
                            </div>
                            <div class="px-4 py-6 bg-white rounded-lg text-brand-blue-dark">
                                <i class="fa-light fa-dumbbell fa-2x text-brand-blue"></i>
                                <p class="text-xl leading-relaxed uppercase font-body">
                                Health &amp; Wellness Reimbursement
                                </p>
                            </div>
                            <div class="px-4 py-6 bg-white rounded-lg text-brand-blue-dark">
                                <i class="fa-light fa-pot-food fa-2x text-brand-blue"></i>
                                <p class="text-xl leading-relaxed uppercase font-body">
                                Busy Season Meals
                                </p>
                            </div>
                        </div>
                        <div class="mx-auto max-w-prose">
                            <ul class="is-style-list-square">
                                <li>Medical, dental, and vision insurance with additional benefits, including life insurance and short- and long-term disability</li>
                                <li>Comprehensive 401(k) program with employer matching, a defined benefit plan, and profit sharing</li>
                                <li>CPA exam reimbursement and bonus</li>
                                <li>Performance-based bonuses</li>
                                <li>Paid time off (PTO) and sick leave</li>
                                <li>Health and wellness reimbursement</li>
                                <li>Catered busy season meals</li>
                            </ul>
                        </div>
                    </div>
                </section>
                <?php endif; ?>

                <!--   C U L T U R E   -->
                <section class="full-bleed bg-brand-blue-dark ">
                    <div class="container px-0 py-8 mx-auto text-brand-blue-faint lg:px-5 lg:py-20">
                        <h6 class="mb-6 text-2xl text-center font-head">Culture</h6>
                        <div class="md:grid md:grid-cols-2 md:gap-4 lg:gap-8">
                            <div>
                                <p class="block px-4 py-2 font-bold md:px-6 bg-brand-blue text-neutral-50 font-head">Buddy/Mentor Programs</p>
                                <div class="det-inner | px-4 md:px-6 py-6 lg:p-8 rounded-b-lg bg-neutral-50 text-neutral-800 flex gap-4">
                                    <p class="text-sm todo">Info from Cheryl</p>
                                </div>
                            </div>

                            <div>
                                <p class="px-4 py-2 font-bold md:px-6 bg-brand-blue text-neutral-50 font-head">developU</p>
                                <div class="det-inner | px-4 md:px-6 py-6 lg:p-8 rounded-b-lg bg-neutral-50 text-neutral-800 flex gap-4">
                                    <p class="text-sm todo">Info from Cheryl</p>
                                </div>
                            </div>
                            <div>
                                <p class="px-4 py-2 font-bold md:px-6 bg-brand-blue text-neutral-50 font-head">Women RISE</p>
                                <div class="det-inner | px-4 md:px-6 py-6 lg:p-8 rounded-b-lg bg-neutral-50 text-neutral-800 flex gap-4">
                                    <div class="inline-block md:w-1/3 md:order-last">
                                        <img class="" src="https://staging3.bfcfs.com/wp-content/uploads/2022/12/logo-women-rise.svg" alt="logo: IDEA = inclusion, diversity, equity, and action" />
                                    </div>
                                    <div class="md:w-2/3">
                                        <p class="text-sm">Women R.I.S.E. is a committee of employees dedicated to building and sustaining a collaborative and diverse workplace that strategically supports the development and advancement of women. We do this by creating and maintaining an environment that recognizes, cultivates and utilizes the talent of female employees.</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="px-4 py-2 font-bold md:px-6 bg-brand-blue text-neutral-50 font-head">IDEA Committee</p>
                                <div class="det-inner | px-4 md:px-6 py-6 lg:p-8 rounded-b-lg bg-neutral-50 text-neutral-800 flex gap-4">
                                    <div class="inline-block md:w-1/3 md:order-last">
                                        <img class="" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,cs_srgb,dpr_auto,f_auto,w_176/v1644339189/logolib/IDEA_with_tagline_and_meaning.png" alt="logo: IDEA = inclusion, diversity, equity, and action" />
                                    </div>
                                    <div class="md:w-2/3">
                                        <p class="text-sm">At BeachFleischman, we intentionally cultivate a diverse, equitable, and inclusive environment where each person feels welcomed, accepted, empowered, valued, respected, and safe. This not only allows each one of us to achieve personal and professional success, but also allows us to better know and serve our clients and communities.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!--   S T A F F   T E S T I M O N I A L S   -->
                <section class="bg-white full-bleed text-neutral-600">
                    <div class="container px-0 py-8 mx-auto lg:px-5 lg:py-20">
                        <h6 class="mb-6 text-2xl text-center font-head text-neutral-800">Staff Testimonials</h6>
                        <div class="flex flex-wrap -m-4">
                            <div class="w-full p-4 md:w-1/2">
                                <div class="h-full p-8 rounded-md bg-neutral-100">
                                    <i class="fa-solid fa-quote-right fa-2x text-brand-red-pale"></i>
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
                                <div class="h-full p-8 rounded-md bg-neutral-100">
                                    <i class="fa-solid fa-quote-right fa-2x text-brand-red-pale"></i>
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
                <section class="bg-white full-bleed ">
                    <div class="container px-0 py-8 mx-auto lg:px-5 lg:py-20">
                        <h6 class="mb-6 text-2xl text-center font-head text-neutral-800">Awards &amp; Recognition</h6>
                        <div class="flex flex-wrap items-center gap-2 mx-auto -m-4 place-content-between md:gap-8 lg:gap-12">
				            <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1634570038/Move_bestfirm_EL_2021_dpoubu.png" alt="2021 Best Firm for Equity Leadership - MOVE Project" width="158" height="100">
                            <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1673468396/2022_AccountingToday_Best_Firms_for_Young_Accountants_Badge_prekkv.png" alt="Best Firms for Young Accountants 2022 - Accounting Today" width="170" height="100">
                            <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1659635345/award-images--2022-ipa-top-200_ofqhce.png" alt="Inside Public Accounting's 2022 Top 200 Firms" width="100" height="100">
                            <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_100/v1570228350/clearlyrated-best-of-accounting-2019_b4g2yx.png" alt="Best of Accounting 2019 - Clearly Rated" width="100" height="100">
                            <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1634657713/award__ipa-all-star-firms_ium0vb.png" alt="Inside Public Accounting's All Star Firms" width="100" height="100">
                            <img class="image " src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1634657747/LEA_bqxg2d.png" alt="Leading Edge Alliance" width="124" height="100">
                        </div>
                    </div>
                </section>

                <!-- CTA and Recruiting Contact(s) -->
                <section class="full-bleed ">
                    <div class="container px-0 py-8 mx-auto lg:px-5 lg:py-20">
                        <div class="md:grid md:grid-cols-3 md:gap-8 lg:gap-12">
                            <div class="flex items-center bg-gradient-to-t from-brand-red to-brand-red-pale">
                                <div class="p-8 mx-auto space-y-8 text-center lg:p-12 rounded-tl-4xl rounded-br-4xl">
                                    <h3 class="text-white uppercase font-head">Join our team!</h3>
                                    <p class="mt-8"><a class="flex-shrink-0 px-8 py-2 text-lg font-bold border-2 border-transparent rounded text-brand-red bg-neutral-50 hover:bg-white hover:text-brand-blue lg:py-4" href="#openings">APPLY TODAY</a></p>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <h3 class="text-center">Non-creepy people that will stalk you until you apply</h3>
                                <?php echo do_shortcode( '[display-posts post_type="people" id="1842,1843,3969" orderby="ll_people_level" order="DESC" posts_per_page="3" wrapper="div" wrapper_class="grid grid-cols-3 gap-8" layout="card-people" /]' ); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!--   S O C I A L   F E E D   -->
                <section class="bg-fixed bg-white bg-no-repeat bg-cover full-bleed bg-mesh-blue">
                    <div class="container px-0 py-8 mx-auto lg:px-5 lg:py-20">
                        <?php echo do_shortcode( '[instagram-feed num=3 cols=3]' ); ?>
                    </div>
                </section>

            </div>

			<?php
            // DO WE STILL NEED THIS PART?
			// wp_link_pages(
			// 	array(
			// 		'before' => '<div>' . esc_html__( 'Pages:', 'loadlifter' ),
			// 		'after'  => '</div>',
			// 	)
			// );
			?>
		</div>

		<?php get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
