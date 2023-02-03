<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<?php //   P R E H E A D E R   A R E A   ?>
<?php get_template_part( 'template-parts/siteblocks/pre', 'header' ); ?>

<header role="banner" id="masthead" class="nav-header | bg-white print:bg-white print:shadow-none sticky top-0 z-[39] ">
	<div role="navigation" class="flex items-center justify-between px-1 py-3 mx-auto md:container md:px-0 md:py-4">

		<div class="w-[240px] lg:w-[320px] order-first">
			<a href="<?php bloginfo('url'); ?>" aria-label="<?php echo bloginfo('name'); ?>" title="Go to BeachFleischman's front page">
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

		<nav class="menus-container | md:flex md:flex-col md:order-1 lg:min-w-[600px] print:hidden" id="primary-navigation" aria-label="Main Navigation">
			<ul class="disclosure-nav | list-none font-head font-bold order-first md:flex md:gap-x-2 md:justify-end md:order-last lg:gap-x-4 lg:text-xl">
				<li>
                    <!-- <span class="main-link | border-0 text-neutral-900 block m-0 py-2 px-4">Services</span> -->
                    <a class="main-link" href="/services/">Services</a>
                    <button type="" aria-expanded="false" aria-controls="id_services_menu" aria-label="More Industry Expertise items"></button>
                    <div id="id_services_menu" class="dropmenu mega" style="display:none">
                        <ul class="lg:grid lg:grid-cols-3 lg:gap-8">
                            <li class="lg:py-4">
                                <h4><a href="/assurance/">Assurance</a></h4>
                                <ul class="mt-2 text-base">
                                    <li><a href="/assurance/audited-financial-statements-phoenix-tucson-arizona-accountants-cpas/">Audited Financial Statements</a></li>
                                    <li><a href="/assurance/compiled-financial-statements-phoenix-tucson-arizona-accountants-cpas/">Compiled Financial Statements</a></li>
                                    <li><a href="/assurance/employee-benefit-plan-audits-phoenix-tucson-arizona-accountants-cpas/">Employee Benefit Plan Audits</a></li>
                                    <li><a href="/assurance/reviewed-financial-statements-phoenix-tucson-arizona-accountants-cpas/">Reviewed Financial Statements</a></li>
                                </ul>
                            </li>
                            <li class="lg:py-4">
                                <h4><a href="/tax/">Tax</a></h4>
                                <ul class="mt-2 text-base">
                                    <li class=""><a href="/tax/asc-740-tax-provisions-phoenix-tucson-arizona-accountants-cpas/">ASC 740 Income Tax Provisions</a></li>
                                    <li class=""><a href="/tax/business-tax-services-phoenix-tucson-arizona-accountants-cpas/">Business Tax Services</a></li>
                                    <li class=""><a href="/tax/cost-segregation-accountants-cpas/">Cost Segregation</a></li>
                                    <li class=""><a href="/tax/estate-planning-phoenix-tucson-arizona-accountants-cpas/">Estate Planning</a></li>
                                    <li class=""><a href="/tax/international-tax/">International Tax</a></li>
                                    <li class=""><a href="/tax/mexico-y-eu-contadores-publicos-certificados/">México y EU - Contadores Públicos Certificados</a></li>
                                    <li class=""><a href="/tax/state-local-tax-services-phoenix-tucson-arizona-accountants-cpas/">State and Local Taxes</a></li>
                                    <li class=""><a href="/tax/stock-option-taxation-phoenix-tucson-arizona-accountants-cpas/">Stock Option Taxation</a></li>
                                    <li class=""><a href="/tax/tax-consulting-projections-phoenix-tucson-arizona-accountants-cpas/">Tax Consulting and Projections</a></li>
                                    <li class=""><a href="/tax/tax-planning-and-preparation-phoenix-tucson-arizona-accountants-cpas/">Tax Planning and Preparation</a></li>
                                </ul>

                            </li>
                            <li class="lg:py-4">
                                <h4><a href="/soar/">Strategic Operations &amp; Advisory Resources <small>(SOAR)</small></a></h4>
                                <ul class="mt-2 text-base">
                                    <li class="soar-as"><a href="/soar/accounting-services-phoenix-tucson-arizona-accountants-cpas/">Accounting Services</a></li>
                                    <li class="soar-cs"><a href="/soar/cfo-services-phoenix-tucson-arizona-accountants-cpas/">CFO Services</a></li>
                                    <li class="soar-cyber"><a href="/soar/cybersecurity-phoenix-tucson-arizona/">Cybersecurity</a></li>
                                    <li class="soar-ffvs"><a href="/soar/financial-forensics-valuation-services-accounting-phoenix-tucson-arizona-cpas/">Financial Forensics &amp; Valuation&nbsp;Services</a></li>
                                    <li class="soar-pp"><a href="/soar/payroll-processing-phoenix-tucson-arizona/">Payroll Processing</a></li>
                                    <li class="soar-ss"><a href="/soar/strategic-services-phoenix-tucson-az-consultants/">Strategic Services</a></li>
                                    <li class="soar-ppd"><a href="/soar/pension-plan-design-and-administration-phoenix-tucson-arizona-accountants-cpas/">Pension Plan Design and&nbsp;Administration</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="/industries/" class="main-link">Industries</a>
                    <button type="" aria-expanded="false" aria-controls="id_industries_menu" aria-label="More Industry Expertise items"></button>
                    <div id="id_industries_menu" class="dropmenu " style="display:none">
                        <!-- <ul class="lg:grid lg:grid-cols-3 lg:gap-8 lg:p-8"> -->
                        <ul>
                            <li><a href="/industries/cannabis-phoenix-tucson-arizona-accountants-cpas/"><i class="fa-duotone fa-fw fa-cannabis"></i> Cannabis</a></li>
                            <li><a href="/industries/construction-phoenix-tucson-arizona-accountants-cpas/"><i class="fa-duotone fa-fw fa-helmet-safety"></i> Construction</a></li>
                            <li><a href="/industries/financial-professional-services/"><i class="fa-duotone fa-fw fa-briefcase"></i> Financial &amp; Professional Services</a></li>
                            <li><a href="/industries/healthcare-phoenix-tucson-arizona-accountants-cpas/"><i class="fa-duotone fa-fw fa-stethoscope"></i> Healthcare</a></li>
                            <li><a href="/industries/manufacturing-phoenix-tucson-arizona-accountants-cpas/"><i class="fa-duotone fa-fw fa-gears"></i> Manufacturing</a></li>
                            <li><a href="/industries/nonprofit-phoenix-tucson-arizona-accountants-cpas/"><i class="fa-duotone fa-fw fa-heart-pulse"></i> Nonprofit</a></li>
                            <li><a href="/industries/real-estate-phoenix-tucson-arizona-accountants-cpas/"><i class="fa-duotone fa-fw fa-location-dot"></i> Real Estate</a></li>
                            <li><a href="/industries/restaurant-phoenix-tucson-arizona-accountants-cpas/"><i class="fa-duotone fa-fw fa-plate-utensils"></i> Restaurant</a></li>
                            <li><a href="/industries/technology-phoenix-tucson-arizona-accountants-cpas/"><i class="fa-duotone fa-fw fa-microchip"></i> Technology</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="/about/" class="main-link">About</a>
                    <button type="" aria-expanded="false" aria-controls="id_about_menu" aria-label="More About Us items"></button>
                    <div id="id_about_menu" class="dropmenu" style="display:none">
                        <ul class="">
                            <li><a href="/about/culture/">Culture</a></li>
                            <li><a href="/people/">Leadership Team</a></li>
                            <li><a href="/about/women-rise/">Women RISE</a></li>
                            <li><a href="/about/idea-committee/">IDEA Committee</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="/career-opportunities/" class="main-link">Careers</a>
                    <button type="" aria-expanded="false" aria-controls="id_careers_menu" aria-label="More Careers items"></button>
                    <div id="id_careers_menu" class="dropmenu" style="display:none">
                        <ul class="">
                            <li><a href="/career-opportunities/" class="bg-amber-300">We're Hiring!</a></li>
                            <li><a href="/career-opportunities/internships/">Internships</a></li>
                            <li><a href="/career-opportunities/recent-college-graduates/">Recent College Graduates</a></li>
                            <li><a href="/career-opportunities/experienced-professionals/">Experienced Professionals</a></li>
                        </ul>
                    </div>
                </li>

                <li><a href="/resources/" class="main-link">Resources</a></li>
			</ul>

			<ul role="list" class="nav-secondary | text-sm font-bold md:uppercase text-neutral-500 md:order-first md:justify-end md:flex md:gap-x-2 md:py-2 lg:gap-x-4 print:hidden">
				<li>
					<a class="px-1 hover:text-brand-red-dark" href="/blog/">Insights</a>
				</li>
				<li>
					<a class="px-1 hover:text-brand-red-dark" href="/category/events/">Events</a>
				</li>
				<li>
					<a class="px-1 hover:text-brand-red-dark" href="/client-center/">Client Center</a>
				</li>
				<li>
					<a class="px-1 hover:text-brand-red-dark" href="/contact-us/">Contact Us</a>
				</li>
			</ul>
		</nav>

	</div>
</header>
