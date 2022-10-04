<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<header role="banner" id="masthead" class="bg-white print:bg-white print:shadow-none sticky top-0 z-[39] ">
	<nav role="navigation" class="flex items-center justify-between px-1 py-3 mx-auto md:container md:px-0 xlg:px-8 ">
		<div class="text-center sm:text-left">
			<div role="img" class="w-[240px] lg:w-[320px]">
				<a href="<?php bloginfo('url'); ?>" aria-label="<?php echo bloginfo('name'); ?>">
					<?php get_template_part('template-parts/svg/svg', 'logonewbrandsimple'); ?>
				</a>
			</div>
		</div>

		<!--
			Inspired by: https://www.tailwindtoolbox.com/components/megamenu
		-->
		<button class="primary-nav"><span class="sr-only">Menu</span></button>
		<ul role="menu" class="nav-primary | hidden md:flex print:hidden">

			<li role="menuitem" aria-haspopup="true" class="hoverable | group hover:bg-white">
				<a href="" class="relative block px-3 py-4 font-bold font-head lg:p-6 hover:text-brand-red">Services</a>
				<div class="nav__panel--services | z-40 mb-16 border-t border-solid shadow-xl border-neutral-800 mega-menu sm:mb-0">
					<div class="container grid grid-flow-col grid-cols-4 mx-auto">
						<div class="hidden py-4 lg:block bg-brand-blue-faint on-lightbg lg:pr-4 lg:py-8 ">
							<h3 class="mb-2 text-brand-blue">Services</h3>
							<p>BeachFleischman helps clients create long-term value for all stakeholders. Enabled by data and technology, our service and solutions provide trust through assurance and help clients transform, grow, and operate.</p>
							<h4 class="mt-4 text-brand-blue">Top Clicks</h4>
							<ul class="leading-loose list-inside">
								<li>Cybersecurity</li>
								<li>Cost Segregation</li>
								<li>International Tax Preparation</li>
								<li>Business Valuation Services</li>
								<li>etc.</li>
							</ul>
						</div>

						<div class="grid grid-flow-col col-span-3 py-4 divide-x gap-x-4 on-darkbg lg:py-8 divide-solid divide-brand-gray-pale bg-neutral-800 auto-cols-fr">
							<div class="pl-4 text-white">
								<h5 class="mb-2 font-bold text-brand-blue-pale"><a href="/assurance/">Accounting &amp; Assurance</a></h5>
								<?php echo do_shortcode('[display-posts post_type="page" orderby="title" order="ASC" post_parent="2311" /]'); ?>
								<p>&hellip;</p>
							</div>
							<div class="pl-4 text-white" data-accordion>
								<h5 class="mb-2 font-bold text-brand-blue-pale"><a href="/tax/">Tax</a></h5>
								<?php // echo do_shortcode( '[display-posts post_type="page" orderby="title" order="ASC" post_parent="2313" /]' );
								?>
								<nav class="flex flex-col mt-3 space-y-1">
									<a class="flex items-center px-3 py-1 rounded-lg" href="/tax/asc740-tax-provisions/">ASC740 Tax Provisions</a>

									<a class="flex items-center px-3 py-1 rounded-lg" href="/tax/business-tax/">Business Tax Services</a>

									<details class="group">
										<summary class="flex items-center px-3 py-1 rounded-lg hover:bg-neutral-700 group-open:bg-neutral-900">
											<span class=""><a href="/tax/cost-segregation/">Cost Segregation</a></span>
											<span class="ml-auto transition duration-300 shrink-0 group-open:-rotate-180">
												<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
												</svg>
											</span>
										</summary>
										<nav class="mt-1.5 ml-3 flex flex-col">
											<a class="flex items-center px-3 py-1" href="/tax/cost-segregation/what-is-cost-segregation/">
												<span>What is Cost Segregation?</span>
											</a>

											<a class="flex items-center px-3 py-1" href="/tax/cost-segregation/cost-segregation-calculator/">
												<span>Cost Segregation Calculator</span>
											</a>
										</nav>
									</details>

									<a class="flex items-center px-3 py-1 rounded-lg" href="#">Estate Planning</a>

									<a class="flex items-center px-3 py-1 rounded-lg" href="/tax/international-tax/">International Tax</a>

									<a class="flex items-center px-3 py-1 rounded-lg" href="#">...</a>

									<a class="flex items-center px-3 py-1 rounded-lg" href="#">Written Managed Review</a>
								</nav>
							</div>

							<div class="pl-4 text-white" data-accordion>
								<h5 class="mb-2 font-bold text-brand-blue-pale"><a href="/consulting/">Consulting</a></h5>
								<nav class="flex flex-col mt-3 space-y-1">

									<details class="group">
										<summary class="flex items-center px-3 py-1 rounded-lg hover:bg-neutral-700 group-open:bg-neutral-900">
											<span class=""><a href="/consulting/accounting-services/">Accounting Services</a></span>
											<span class="ml-auto transition duration-300 shrink-0 group-open:-rotate-180">
												<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
												</svg>
											</span>
										</summary>
										<nav class="mt-1.5 ml-3 flex flex-col">
											<a class="flex items-center px-3 py-1" href="/">
												<span>Bookkeeping</span>
											</a>

											<a href="/" class="flex items-center px-3 py-1">
												<span>Another item</span>
											</a>
										</nav>
									</details>

									<a class="flex items-center px-3 py-1 rounded-lg" href="/">
										<span>CFO Services</span>
									</a>

									<details class="group">
										<summary class="flex items-center px-3 py-1 rounded-lg hover:bg-neutral-700 group-open:bg-neutral-900">
											<span><a href="/">Cybersecurity</a></span>

											<span class="ml-auto transition duration-300 shrink-0 group-open:-rotate-180">
												<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
												</svg>
											</span>
										</summary>
										<nav class="mt-1.5 ml-3 flex flex-col">
											<a class="flex items-center px-3 py-1" href="/"><span>Outsourced Cybersecurity</span></a>

											<a class="flex items-center px-3 py-1" href="/"><span>Cybersecurity Assessments &amp; Testing</span></a>

											<a class="flex items-center px-3 py-1" href="/"><span>Governance, Risk &amp; Compliance</span></a>

											<a class="flex items-center px-3 py-1" href="/"><span>Partnered Security Service Provider&trade;</span></a>

											<a class="flex items-center px-3 py-1" href="/"><span>Specialized Cybersecurity Services</span></a>
										</nav>
									</details>

									<details class="group">
										<summary class="flex items-center px-3 py-1 rounded-lg hover:bg-neutral-700 group-open:bg-neutral-900">
											<span><a href="/">Financial Forensics &amp; Valuation Services</a></span>

											<span class="ml-auto transition duration-300 shrink-0 group-open:-rotate-180">
												<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
												</svg>
											</span>
										</summary>
										<nav class="mt-1.5 ml-3 flex flex-col">
											<a class="flex items-center px-3 py-1" href="/"><span>Business Valuation Services</span></a>
											<a class="flex items-center px-3 py-1" href="/">Fraud Investigations and Forensic Accounting</span></a>
											<a class="flex items-center px-3 py-1" href="/">Marital Dissolution Services</span></a>
											<a class="flex items-center px-3 py-1" href="/">Economic Damages</span></a>
											<a class="flex items-center px-3 py-1" href="/">Bankruptcy, Restructuring, and Turnaround</span></a>
											<a class="flex items-center px-3 py-1" href="/">Court Appointments</span></a>
										</nav>
									</details>

									<a class="flex items-center px-3 py-1 rounded-lg" href="/">
										<span>Payroll Processing</span>
									</a>

									<details class="group">
										<summary class="flex items-center px-3 py-1 rounded-lg hover:bg-neutral-700 group-open:bg-neutral-900">
											<span><a href="/">Strategic Services</a></span>

											<span class="ml-auto transition duration-300 shrink-0 group-open:-rotate-180">
												<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
												</svg>
											</span>
										</summary>
										<nav class="mt-1.5 ml-3 flex flex-col">
											<a class="flex items-center px-3 py-1" href="/"><span>Value Growth Services</span></a>
											<a class="flex items-center px-3 py-1" href="/"><span>Strategic Planning</span></a>
											<a class="flex items-center px-3 py-1" href="/"><span>Succession Planning</span></a>
											<a class="flex items-center px-3 py-1" href="/"><span>Exit Planning</span></a>
										</nav>
									</details>

									<a class="flex items-center px-3 py-1 rounded-lg" href="/">
										<span>Pension Plan Design &amp; Administration</span>
									</a>
								</nav>
							</div>
						</div>

					</div>
				</div>
			</li>

			<li role="menuitem" aria-haspopup="true" class="hoverable | group hover:bg-white">
				<a href="/industries/" class="relative block px-3 py-4 font-bold font-head lg:p-6 hover:text-brand-red">Industries</a>
				<div class="nav__panel--services | z-40 mb-16 border-t border-solid shadow-xl border-neutral-800 mega-menu sm:mb-0">
					<div class="container grid grid-flow-col grid-cols-3 mx-auto">
						<div class="hidden p-4 lg:block bg-brand-blue-faint on-lightbg lg:p-8 ">
							<h3 class="mb-2 text-brand-blue">Industry Expertise</h3>
							<p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Amet risus nullam eget felis eget nunc lobortis.</p>
							<div class="wp-block-buttons | text-center my-4">
								<div class="wp-block-button is-style-outline">
									<a href="/industries/" class="wp-block-button__link wp-element-button has-brand-red-color has-text-color">Explore</a>
								</div>
							</div>
						</div>
						<div class="grid grid-flow-col col-span-2 py-4 divide-x bg-neutral-800 on-darkbg lg:py-8 divide-solid divide-brand-gray-pale auto-cols-fr">
							<div class="px-4 text-white lg:px-8">
								<?php echo do_shortcode('[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="not-prose list-none pl-1" layout="li-fa" /]'); ?>
							</div>
						</div>
					</div>
				</div>
			</li>

			<li role="menuitem" class="hoverable | group  hover:bg-white">
				<a href="/blog/" aria-label="Get the latest blog posts, events, etc." aria-haspopup="true" class="relative block px-3 py-4 font-bold font-head lg:p-6 hover:text-brand-red">Insights</a>
				<div class="nav__panel--insights | z-40 mb-16 border-t border-solid shadow-xl border-neutral-800 mega-menu sm:mb-0">
					<div class="container grid grid-flow-col mx-auto auto-cols-fr">

						<div class="p-4 lg:p-8 on-lightbg">
							<h3 class="mb-2 text-brand-blue">Latest</h3>
							<?php echo do_shortcode('[display-posts posts_per_page="1" ignore_sticky_posts="true" wrapper="div" wrapper_class="derp -mx-4 " layout="card-single" /]'); ?>
						</div>

						<div class="p-4 lg:p-8 on-lightbg">
							<h4 class="mb-2">Other Recent Posts</h4>
							<?php echo do_shortcode('[display-posts offset="1" posts_per_page="5" ignore_sticky_posts="true" wrapper="ul" wrapper_class="other-recent-posts | space-y-6" /]'); ?>
							<div class="wp-block-buttons | my-4 md:my-8">
								<div class="wp-block-button is-style-outline">
									<a href="/blog/" class="wp-block-button__link wp-element-button has-brand-red-color has-text-color">Read more posts</a>
								</div>
							</div>
						</div>

						<div class="p-4 text-white lg:p-8 bg-neutral-700 on-darkbg">
							<h6 class="my-2 text-brand-blue-faint">Blog Categories</h6>
							<ul class="text-base ">
								<?php
								wp_list_categories(array(
									'orderby'		=> 'name',
									'depth'			=> 1,
									'show_count'	=> false,
									'exclude'		=> array(7),
									'title_li' 		=> '',
								));
								?>
							</ul>
						</div>

						<div class="p-4 text-neutral-100 on-darkbg lg:p-8">
							<div class="mb-4">
								<h4 class="text-brand-blue-pale">Upcoming Events</h4>
								<div class="flex items-center h-full">
									<div class="flex flex-col flex-shrink-0 w-12 leading-none text-center">
										<span class="pb-2 mb-2 border-b-2 text-neutral-200 border-neutral-500">JUL</span>
										<span class="text-lg font-bold leading-none font-head text-neutral-100">32</span>
									</div>
									<div class="flex-grow pl-6">
										<h1 class="mb-2 text-xl font-bold font-head text-brand-red-pale"><a href="/">PPP Loan Updates and FAQs Webinar</a></h1>
										<p class="mb-4 text-sm leading-relaxed">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
										<a class="inline-flex items-center">
											<img alt="blog" src="https://dummyimage.com/103x103" class="flex-shrink-0 object-cover object-center w-8 h-8 rounded-full">
											<span class="flex flex-col flex-grow pl-3">
												<span class="font-medium text-neutral-300 ">CariAnn Todd</span>
											</span>
										</a>
									</div>
								</div>
							</div>
							<div class="">
								<h4 class="text-brand-blue-pale">Newsletter</h4>
								<div class="flex flex-col w-full mt-10 md:ml-auto md:mt-0">
									<p class="mb-2">Get updates every 3-4 weeks in your inbox.</p>
									<div class="relative mb-1">
										<label for="full-name" class="text-sm leading-7 text-neutral-400">Full Name</label>
										<input type="text" id="full-name" name="full-name" class="w-full px-3 py-1 text-base leading-8 transition-colors duration-200 ease-in-out bg-white border rounded outline-none border-neutral-300 text-neutral-700">
									</div>
									<div class="relative mb-2">
										<label for="email" class="text-sm leading-7 text-neutral-400">Email</label>
										<input type="email" id="email" name="email" class="w-full px-3 py-1 text-base leading-8 transition-colors duration-200 ease-in-out bg-white border rounded outline-none border-neutral-300 text-neutral-700">
									</div>
									<button class="px-8 py-2 text-lg text-white border-0 rounded bg-brand-blue focus:outline-none hover:bg-brand-blue-pale">Sign up</button>
									<p class="mt-3 text-xs text-neutral-500">Literally you probably haven't heard of them jean shorts.</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</li>

			<li role="menuitem" aria-haspopup="true" class="hoverable | group hover:bg-white">
				<a href="/about-us/" class="relative block px-3 py-4 font-bold font-head lg:p-6 hover:text-brand-red">About</a>
				<div class="nav__panel--services | z-40 mb-16 border-t border-solid shadow-xl border-neutral-800 mega-menu sm:mb-0">
					<div class="container grid grid-flow-col grid-cols-3 mx-auto">
						<div class="hidden p-4 lg:block bg-brand-blue-faint on-lightbg lg:p-8 ">
							<h3 class="mb-2 text-brand-blue">About Us</h3>
							<p>We passionately believe in the power of collaboration and what it can accomplish.</p>
						</div>
						<div class="grid grid-flow-col col-span-3 py-4 divide-x lg:py-8 divide-solid divide-brand-gray-pale auto-cols-fr">
							<div class="px-4 text-white lg:px-8 bg-neutral-800 on-darkbg">
								<ul class="">
									<li><a href="/">Mission, Vision, and Core Values</a></li>
									<li><a href="/">Culture</a></li>
									<li><a href="/people/">Our People</a></li>
									<li><a href="/">Community Involvement</a></li>
									<li><a href="/">Trade and Professional Involvement</a></li>
									<li><a href="/">Women RISE</a></li>
									<li><a href="/about-us/idea-committee/" title="">idea Committee</a></li>
									<li><a href="/">Leading Edge Alliance</a></li>
								</ul>
							</div>
							<div class="px-4 text-white bg-neutral-800 lg:px-8 on-darkbg">
								<img class="mx-auto" src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1542220717/ArizonasLargest_2x_r1y0cr.png" alt="One of Arizona's largest locally-owned public accounting firms">
							</div>
						</div>
					</div>
				</div>
			</li>

			<li role="menuitem" aria-haspopup="true" class="hoverable | group hover:bg-white">
				<a href="/careers/" class="relative block px-3 py-4 font-bold font-head lg:p-6 hover:text-brand-red">Careers</a>
				<div class="nav__panel--services | z-40 mb-16 border-t border-solid shadow-xl border-neutral-800 mega-menu sm:mb-0">
					<div class="container grid grid-flow-col grid-cols-3 mx-auto">
						<div class="hidden p-4 lg:block bg-brand-blue-faint on-lightbg lg:p-8 ">
							<h3 class="mb-2 text-brand-blue">Careers</h3>
							<p>At BeachFleischman, we provide our employees with opportunities for professional development while enhancing their personal growth with an emphasis on a well-balanced lifestyle.</p>
						</div>
						<div class="grid grid-flow-col col-span-3 py-4 divide-x lg:py-8 divide-solid divide-brand-gray-pale auto-cols-fr">
							<div class="px-4 text-white lg:px-8 bg-neutral-800 on-darkbg">
								<ul class="leading-loose list-inside">
									<li class="font-bold"><a href="/">Current Openings</a></li>
									<li><a href="/">Internships</a></li>
									<li><a href="/">Recent College Graduates</a></li>
									<li><a href="/">Experienced Professionals</a></li>
									<li><a href="/">Professional Development/Training</a></li>
									<li><a href="/">Benefits</a></li>
									<li><a href="/">Staff Testimonials</a></li>
								</ul>
							</div>
							<div class="px-4 text-white bg-neutral-800 on-darkbg lg:px-8">
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
			</li>

			<li role="menuitem" aria-haspopup="false" class="hoverable | group hover:bg-white">
				<a href="/client-center/" class="relative block px-3 py-4 font-bold font-head lg:p-6 hover:text-brand-blue">Client Center</a>
			</li>

			<li role="menuitem" aria-haspopup="false" class="hoverable | group hover:bg-white">
				<a href="/contact/" class="relative block px-3 py-4 font-bold font-head lg:p-6 hover:text-brand-blue">Contact Us</a>
			</li>
		</ul>

		<ul class="flex print:hidden">
			<li role="menuitem" class="toggleable | group hover:bg-white ">
				<input type="checkbox" value="selected" id="toggle-search" class="toggle-input peer">
				<label for="toggle-search" class="block px-6 py-4 text-sm font-bold cursor-pointer lg:text-base lg:py-6 hover:text-brand-red peer-checked:text-brand-red peer-checked:bg-white" aria-label="Toggle Search">
					<i class="fa-solid fa-magnifying-glass"></i>
				</label>
				<div role="toggle" class="z-40 py-2 mb-16 border-t border-solid shadow-xl md:py-4 border-brand-blue mega-menu lg:py-6 sm:mb-0 bg-brand-gray-dark ">
					<div class="container px-2 mx-auto text-white md:px-0">
						<?php get_search_form(); ?>
					</div>
				</div>
			</li>
		</ul>

	</nav>
</header>
