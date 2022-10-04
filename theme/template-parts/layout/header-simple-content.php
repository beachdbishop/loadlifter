<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<header role="banner" id="masthead" class="nav-header | bg-white print:bg-white print:shadow-none sticky top-0 z-[39] ">
	<div role="navigation" class="flex items-center justify-between px-1 py-3 mx-auto md:container md:px-0 md:py-4">

		<div role="img" class="w-[240px] lg:w-[320px] order-first" title="Go to BeachFleischman's front page">
			<a href="<?php bloginfo('url'); ?>" aria-label="<?php echo bloginfo('name'); ?>">
				<?php get_template_part('template-parts/svg/svg', 'logonewbrandsimple'); ?>
			</a>
		</div>

		<div class="nav-ctrls | flex flex-row order-last">
			<ul role="list" class="flex print:hidden">
				<li class="toggleable |  group  ">
					<input type="checkbox" value="selected" id="toggle-search" class="hidden toggle-input peer">
					<label for="toggle-search" class="block px-4 py-4 font-bold cursor-pointer lg:py-6 hover:text-brand-red peer-checked:text-brand-red peer-checked:bg-white" aria-label="Toggle Search">
						<i class="fa-solid fa-magnifying-glass"></i>
					</label>
					<div role="toggle" class="z-40 py-2 mb-16 border-t border-solid shadow-xl md:py-4 border-brand-blue mega-menu lg:py-6 sm:mb-0 bg-neutral-800/80 backdrop-blur-sm">
						<div class="container px-2 mx-auto text-white md:px-0">
							<?php get_search_form(); ?>
						</div>
					</div>
				</li>
			</ul>
			<button class="toggle-mobile-nav | ml-2 pl-2 py-2 cursor-pointer md:hidden" aria-controls="primary-navigation" aria-expanded="false" tabindex="0">
				<svg class="w-8 h-8" aria-hidden="true"><use xlink:href="#bars" /></svg>
				<span class="sr-only">Menu</span>
			</button>
		</div>

		<nav class="menus-container | md:flex md:flex-col md:order-1 lg:min-w-[600px] print:hidden" id="primary-navigation" aria-label="Primary">
			<ul role="list" class="nav-primary | md:flex md:justify-end order-first md:order-last">
				<li aria-haspopup="true" class="hoverable group ">
					<details class="relative block group menu-level-0">
						<?php echo ll_menu_det_summary( '#', 'Services', '', 'font-bold' ); ?>
						<div class="details-drop nav__panel--4col-trans | ">
							<div class="container md:mx-auto md:grid md:grid-flow-col md:grid-cols-4">
								<div class="hidden p-4 bg-brand-blue-faint md:block on-lightbg lg:py-8 lg:pl-0 lg:pr-8">
									<h3 class="mb-2 text-brand-blue">Services</h3>
									<p>BeachFleischman helps clients create long-term value for all stakeholders. Enabled by data and technology, our service and solutions provide trust through assurance and help clients transform, grow, and operate.</p>
									<h4 class="mt-4 text-brand-blue">Top Clicks</h4>
									<ul class="list-inside md:leading-loose">
										<li>Cybersecurity</li>
										<li>Cost Segregation</li>
										<li>International Tax Preparation</li>
										<li>Business Valuation Services</li>
										<li>etc.</li>
									</ul>
								</div>
								<div class="py-4 md:divide-x md:grid md:grid-flow-col md:col-span-3 md:gap-x-4 on-darkbg lg:py-8 md:divide-solid md:divide-brand-gray-pale md:auto-cols-fr">
									<div class="pl-2 text-white md:pl-4">
										<details class="group menu-level-1">
											<summary class="flex items-center px-3 py-1 rounded-lg">
												<h5 class="font-bold text-brand-blue-pale"><a href="/assurance/">Accounting &amp; Assurance</a></h5>
												<span class="ml-auto transition duration-300 shrink-0">
													<svg class="icon"><use xlink:href="#angle-down" /></svg>
												</span>
											</summary>
											<div class="details-drop">
												<?php echo do_shortcode('[display-posts post_type="page" orderby="title" order="ASC" post_parent="2311" wrapper_class="px-2" /]'); ?>
												<p class="px-2">&hellip;</p>
											</div>
										</details>
									</div>

									<div class="pl-2 text-white md:pl-4">
										<details class="group menu-level-1">
											<summary class="flex items-center px-3 py-1 rounded-lg">
												<h5 class="font-bold text-brand-blue-pale"><a href="/tax/">Tax</a></h5>
												<span class="ml-auto transition duration-300 shrink-0">
													<svg class="icon"><use xlink:href="#angle-down" /></svg>
												</span>
											</summary>
											<div class="details-drop">
												<?php // echo do_shortcode( '[display-posts post_type="page" orderby="title" order="ASC" post_parent="2313" /]' );
												?>
												<nav class="flex flex-col mt-3 space-y-1">
													<a class="flex items-center px-3 py-1 rounded-lg" href="/tax/asc740-tax-provisions/">ASC740 Tax Provisions</a>
													<a class="flex items-center px-3 py-1 rounded-lg" href="/tax/business-tax/">Business Tax Services</a>
													<details class="rounded-lg group menu-level-2">
														<?php echo ll_menu_det_summary( '/tax/cost-segregation/', 'Cost Segregation' ); ?>
														<div class="details-drop">
															<nav class="mt-1.5 ml-3 flex flex-col">
																<a class="flex items-center py-1" href="/tax/cost-segregation/what-is-cost-segregation/">
																	<span>What is Cost Segregation?</span>
																</a>
																<a class="flex items-center py-1" href="/tax/cost-segregation/cost-segregation-calculator/">
																	<span>Cost Segregation Calculator</span>
																</a>
															</nav>
														</div>
													</details>
													<a class="flex items-center px-3 py-1 rounded-lg" href="#">Estate Planning</a>
													<a class="flex items-center px-3 py-1 rounded-lg" href="/tax/international-tax/">International Tax</a>
													<a class="flex items-center px-3 py-1 rounded-lg" href="#">...</a>
													<a class="flex items-center px-3 py-1 rounded-lg" href="#">Written Managed Review</a>
												</nav>
											</div>
										</details>
									</div>

									<div class="pl-2 text-white md:pl-4">
										<details class="group menu-level-1 ">
											<summary class="flex items-center px-3 py-1 rounded-lg">
												<h5 class="font-bold text-brand-blue-pale"><a href="/consulting/">Consulting</a></h5>
												<span class="ml-auto transition duration-300 shrink-0 ">
													<svg class="icon"><use xlink:href="#angle-down" /></svg>
												</span>
											</summary>
											<div class="details-drop">
												<nav class="mt-3 md:flex md:flex-col md:space-y-1">
													<details class="group menu-level-2">
														<?php echo ll_menu_det_summary( '/consulting/accounting-services/', 'Accounting Services' ); ?>
														<nav class="mt-1.5 ml-3 flex flex-col">
															<a class="flex items-center py-1" href="/">
																<span>Bookkeeping</span>
															</a>
															<a href="/" class="flex items-center py-1">
																<span>Another item</span>
															</a>
														</nav>
													</details>
													<a class="flex items-center px-3 py-1 rounded-lg" href="/">
														<span>CFO Services</span>
													</a>
													<details class="group menu-level-2">
														<?php echo ll_menu_det_summary( '/consulting/cybersecurity', 'Cybersecurity' ); ?>
														<nav class="mt-1.5 ml-3 flex flex-col">
															<a class="flex items-center py-1" href="/"><span>Outsourced Cybersecurity</span></a>
															<a class="flex items-center py-1" href="/consulting/cybersecurity/cybersecurity-assessments-testing/"><span>Cybersecurity Assessments &amp; Testing</span></a>
															<a class="flex items-center py-1" href="/"><span>Governance, Risk &amp; Compliance</span></a>
															<a class="flex items-center py-1" href="/"><span>Partnered Security Service Provider&trade;</span></a>
															<a class="flex items-center py-1" href="/"><span>Specialized Cybersecurity Services</span></a>
														</nav>
													</details>
													<details class="group menu-level-2">
														<?php echo ll_menu_det_summary( '/', 'Financial Forensics &amp; Valuation Services' ); ?>
														<div class="details-drop">
															<nav class="mt-1.5 ml-3 flex flex-col">
																<a class="flex items-center py-1" href="/"><span>Business Valuation Services</span></a>
																<a class="flex items-center py-1" href="/">Fraud Investigations and Forensic Accounting</span></a>
																<a class="flex items-center py-1" href="/">Marital Dissolution Services</span></a>
																<a class="flex items-center py-1" href="/">Economic Damages</span></a>
																<a class="flex items-center py-1" href="/">Bankruptcy, Restructuring, and Turnaround</span></a>
																<a class="flex items-center py-1" href="/">Court Appointments</span></a>
															</nav>
														</div>
													</details>
													<a class="flex items-center px-3 py-1 rounded-lg" href="/">
														<span>Payroll Processing</span>
													</a>
													<details class="group menu-level-2">
														<?php echo ll_menu_det_summary( '/', 'Strategic Services' ); ?>
														<div class="details-drop">
															<nav class="mt-1.5 ml-2 flex flex-col">
																<a class="flex items-center py-1" href="/"><span>Value Growth Services</span></a>
																<a class="flex items-center py-1" href="/"><span>Strategic Planning</span></a>
																<a class="flex items-center py-1" href="/"><span>Succession Planning</span></a>
																<a class="flex items-center py-1" href="/"><span>Exit Planning</span></a>
															</nav>
														</div>
													</details>
													<a class="flex items-center px-3 py-1 rounded-lg" href="/">
														<span>Pension Plan Design &amp; Administration</span>
													</a>
												</nav>
											</div>
										</details>
									</div>
								</div>
							</div>
						</div>
					</details>
				</li>
				<li aria-haspopup="true" class="hoverable group ">
					<details class="relative block group menu-level-0">
						<?php echo ll_menu_det_summary( '/industries/', 'Industries', '', 'font-bold' ); ?>
						<div class="details-drop nav__panel--4col-trans | ">
							<div class="container md:mx-auto md:grid md:grid-flow-col md:grid-cols-4">
								<div class="hidden p-4 bg-brand-blue-faint md:block on-lightbg lg:p-8 ">
									<h3 class="mb-2 text-brand-blue">Industry Expertise</h3>
									<p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Amet risus nullam eget felis eget nunc lobortis.</p>
									<p class="text-center"><a href="/industries/" class="inline-block p-4 my-4 border-2 border-solid rounded-lg font-body text-brand-red hover:text-brand-red-dark border-brand-red hover:border-brand-blue-pale">Explore</a></p>
								</div>
								<div class="py-4 md:grid md:grid-flow-col md:col-span-3 lg:py-8 md:auto-cols-fr">
									<div class="px-4 text-neutral-300 lg:px-8">
										<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="icon-flexgrid--w-label " layout="li-fa-large-circle" /]' ); ?>
									</div>
								</div>
							</div>
						</div>
					</details>
				</li>
				<li aria-haspopup="true" class="hoverable group ">
					<details class="relative block group menu-level-0">
						<?php echo ll_menu_det_summary( '/about-us/', 'About Us', '', 'font-bold' ); ?>
						<div class="details-drop nav__panel--4col-trans | ">
							<div class="container md:mx-auto md:grid md:grid-flow-col md:grid-cols-3">
								<div class="hidden p-4 bg-brand-blue-faint md:block on-lightbg lg:p-8 ">
									<h3 class="mb-2 text-brand-blue">About Us</h3>
									<p>We passionately believe in the power of collaboration and what it can accomplish.</p>

								</div>
								<div class="py-4 md:grid md:grid-flow-col md:col-span-2 on-darkbg lg:py-8 md:auto-cols-fr">
									<div class="px-4 text-white lg:px-8 on-darkbg">
										<ul class="leading-loose">
											<li><a href="/">Mission, Vision, and Core Values</a></li>
											<li><a href="/">Culture</a></li>
											<li><a href="/people/">Our People</a></li>
											<li><a href="/">Community Involvement</a></li>
											<li><a href="/">Trade and Professional Involvement</a></li>
											<li><a href="/">Women RISE</a></li>
											<li><a href="/about-us/idea-committee/" title="">IDEA Committee</a></li>
											<li><a href="/">Leading Edge Alliance</a></li>
										</ul>
									</div>
									<div class="hidden px-4 text-white md:block lg:px-8 on-darkbg">
										<img class="mx-auto" src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1542220717/ArizonasLargest_2x_r1y0cr.png" alt="One of Arizona's largest locally-owned public accounting firms">
									</div>
								</div>
							</div>
						</div>
					</details>
				</li>
				<li aria-haspopup="true" class="hoverable group ">
					<details class="relative block group menu-level-0">
						<?php echo ll_menu_det_summary( '/careers/', 'Careers', '', 'font-bold' ); ?>
						<div class="details-drop nav__panel--4col-trans | ">
							<div class="container md:mx-auto md:grid md:grid-flow-col md:grid-cols-3">
								<div class="hidden p-4 bg-brand-blue-faint md:block on-lightbg lg:p-8 ">
									<h3 class="mb-2 text-brand-blue">Careers</h3>
									<p>At BeachFleischman, we provide our employees with opportunities for professional development while enhancing their personal growth with an emphasis on a well-balanced lifestyle.</p>
								</div>
								<div class="py-4 md:grid md:grid-flow-col md:col-span-2 on-darkbg lg:py-8 md:auto-cols-fr">
									<div class="px-4 text-white lg:px-8 on-darkbg">
										<ul class="leading-loose list-inside">
											<li><a href="/">Current Openings</a></li>
											<li><a href="/">Internships</a></li>
											<li><a href="/">Recent College Graduates</a></li>
											<li><a href="/">Experienced Professionals</a></li>
											<li><a href="/">Professional Development/Training</a></li>
											<li><a href="/">Benefits</a></li>
											<li><a href="/">Staff Testimonials</a></li>
										</ul>
									</div>
									<div class="hidden px-4 text-white md:block on-darkbg lg:px-8">
										<h5 class="mb-2 font-bold text-brand-blue-pale">Staff Testimonial</h5>
										<blockquote class="p-6 shadow bg-neutral-50 rounded-xl">
											<p class="leading-relaxed text-neutral-800">I love the benefits, health care, vision, dental &ndash; including orthodontics, 401(k), profit-sharing, disability, dry cleaning pick-up, gym memberships, cell phone reimbursements&hellip;and there's even a service that will come and take care of my kids in an emergency.</p>
										</blockquote>
										<div class="flex items-center gap-4 mt-4">
											<a href="/"><img src="https://dummyimage.com/103x103" class="object-cover w-12 h-12 bg-pink-500 rounded-full" alt="" /></a>
											<div class="text-sm">
												<p class="font-bold"><a href="/">Tori Meyer</a></p>
												<p class="mt-1">Senior A&amp;A Manager</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</details>
				</li>
			</ul>

			<ul role="list" class="nav-secondary | md: md:order-first md:justify-end md:flex print:hidden">
				<li>
					<a class="relative block px-3 pt-3 pb-1 text-sm font-bold text-pink-600 md:uppercase hover:text-pink-400" href="/scratch/">Scratch-dev</a>
				</li>
				<li>
					<a class="relative block px-3 pt-3 pb-1 text-sm font-bold md:uppercase text-neutral-500 hover:text-brand-red-dark" href="/blog/">Insights</a>
				</li>
				<li>
					<a href="/events/" class="relative block px-3 pt-3 pb-1 text-sm font-bold md:uppercase text-neutral-500 hover:text-brand-red-dark">Events</a>
				</li>
				<li>
					<a class="relative block px-3 pt-3 pb-1 text-sm font-bold md:uppercase text-neutral-500 hover:text-brand-red-dark" href="/client-center/">Client Center</a>
				</li>
				<li>
					<a class="relative block px-3 pt-3 pb-1 text-sm font-bold md:uppercase text-neutral-500 hover:text-brand-red-dark" href="/contact-us/">Contact Us</a>
				</li>
			</ul>
		</nav>

	</div>
</header>
