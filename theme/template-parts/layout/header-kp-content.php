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
	<div class="flex items-center justify-between px-1 py-3 mx-auto md:container md:px-0 xlg:px-8 ">

		<div class="order-first text-center sm:text-left">
			<div role="img" class="w-[240px] lg:w-[320px]">
				<a href="<?php bloginfo('url'); ?>" aria-label="<?php echo bloginfo('name'); ?>">
					<?php get_template_part('template-parts/svg/svg', 'logonewbrandsimple'); ?>
				</a>
			</div>
		</div>

		<div class="order-1 p-4">
			<i class="fa-solid fa-triangle-person-digging text-amber-500"></i>
		</div>

		<div class="flex order-2 md:order-last">
			<ul class="print:hidden">
				<li role="menuitem" class="toggleable | group hover:bg-white ">
					<input type="checkbox" value="selected" id="toggle-search" class="hidden toggle-input peer">
					<label for="toggle-search" class="block py-4 ml-4 text-sm font-bold cursor-pointer lg:text-base lg:py-6 hover:text-brand-red peer-checked:text-brand-red peer-checked:bg-white" aria-label="Toggle Search">
						<i class="fa-solid fa-magnifying-glass"></i>
					</label>
					<div role="toggle" class="z-40 py-2 mb-16 border-t border-solid shadow-xl md:py-4 border-brand-blue mega-menu lg:py-6 sm:mb-0 bg-brand-gray-dark ">
						<div class="container px-2 mx-auto text-white md:px-0">
							<?php get_search_form(); ?>
						</div>
					</div>
				</li>
			</ul>

			<button class="toggle--pri-nav | cursor-pointer bg-transparent ml-4 py-4 md:hidden print:hidden" aria-controls="primary-navigation">
				<i class="fa-solid fa-bars"></i>
				<span class="sr-only">Menu</span>
			</button>
		</div>

		<nav id="primary-navigation" class="primary-navigation | hidden md:order-2 md:block md:grow-1">
			<details role="menuitem" aria-haspopup="true" class="menu-item | md:hidden">
				<summary><i class="far fa-search"></i></summary>
				<div>search form</div>
			</details>

			<ul aria-label="Primary" role="list" class="md:flex md:space-x-2 lg:space-x-4">

				<li role="menuitem" aria-haspopup="true" class="menu-item | hoverable group hover:bg-white">
					<a href="#" class="relative block font-bold font-head ">Services</a>
					<div class="nav__panel--services | z-40 mb-16 border-t border-solid shadow-xl border-neutral-800 mega-menu sm:mb-0">
						<div class="container grid grid-flow-col mx-auto md:grid-cols-3 lg:grid-cols-4">
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
				<li role="menuitem" aria-haspopup="true" class="menu-item | ">
					<a href="" class="font-bold font-head">Industries</a>
				</li>
				<li role="menuitem" aria-haspopup="true" class="menu-item | ">
					<a href="" class="font-bold font-head">Insights</a>
				</li>
				<li role="menuitem" aria-haspopup="true" class="menu-item | ">
					<a href="" class="font-bold font-head">About</a>
				</li>
				<li role="menuitem" aria-haspopup="true" class="menu-item | ">
					<a href="" class="font-bold font-head">Careers</a>
				</li>
				<li role="menuitem" aria-haspopup="true" class="menu-item | ">
					<a href="" class="font-bold font-head">Client Center</a>
				</li>
				<li role="menuitem" aria-haspopup="true" class="menu-item | ">
					<a href="" class="font-bold font-head">Contact</a>
				</li>
			</ul>
		</nav>

	</div>
</header>
