<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */


$menuItemsPrimary = [
	"services" => [
		"label" => 'Services',
		"url" => '/services/',
		"hasChildren" => true,
			"submenuContent" => '<ul class="md:container md:grid md:grid-cols-3 md:gap-4 lg:gap-8">
				<li class="lg:py-4">
					<p class="font-semibold  |  md:text-lg md:border-b-2 md:border-orient-400 lg:text-2xl">
						<a href="/assurance/">Accounting &amp; Assurance</a>
					</p>
					[listmenu menu="submenu Assurance" container_class="hidden submenu mb-2  |  md:block" /]
				</li>
				<li class="lg:py-4">
					<p class="font-semibold  |  md:text-lg md:border-b-2 md:border-orient-400 lg:text-2xl">
						<a href="/tax/">Tax</a>
					</p>
					[listmenu menu="submenu Tax" container_class="hidden submenu mb-2 md:block" /]
				</li>
				<li class="lg:py-4">
					<p class="font-semibold  |  md:text-lg md:border-b-2 md:border-orient-400 lg:text-2xl">
						<a href="/soar/" title="Strategic Operations &amp; Advisory Resources">
							<span class="hidden md:inline">SOAR</span>
							<span class="inline tracking-tight md:hidden">Strategic Operations &amp; Advisory Resources</span>
						</a>
					</p>
					[listmenu menu="submenu SOAR" container_class="hidden submenu mb-2 md:block" /]
				</li>
			</ul>',
	],
	"industries" => [
		"label" => 'Industries',
		"url" => '/industries/',
		"hasChildren" => true,
			"submenuContent" => '<ul>
				<li><a href="/industries/cannabis-phoenix-tucson-arizona-accountants-cpas/"><i class="mr-1 fa-duotone fa-fw fa-cannabis"></i> Cannabis</a></li>
				<li><a href="/industries/construction-phoenix-tucson-arizona-accountants-cpas/"><i class="mr-1 fa-duotone fa-fw fa-helmet-safety"></i> Construction</a></li>
				<li><a href="/industries/financial-professional-services/"><i class="mr-1 fa-duotone fa-fw fa-briefcase"></i> Financial &amp; Professional Services</a></li>
				<li><a href="/industries/healthcare-phoenix-tucson-arizona-accountants-cpas/"><i class="mr-1 fa-duotone fa-fw fa-stethoscope"></i> Healthcare</a></li>
				<li><a href="/industries/manufacturing-phoenix-tucson-arizona-accountants-cpas/"><i class="mr-1 fa-duotone fa-fw fa-gears"></i> Manufacturing</a></li>
				<li><a href="/industries/nonprofit-phoenix-tucson-arizona-accountants-cpas/"><i class="mr-1 fa-duotone fa-fw fa-heart-pulse"></i> Nonprofit</a></li>
				<li><a href="/industries/real-estate-phoenix-tucson-arizona-accountants-cpas/"><i class="mr-1 fa-duotone fa-fw fa-location-dot"></i> Real Estate</a></li>
				<li><a href="/industries/restaurant-phoenix-tucson-arizona-accountants-cpas/"><i class="mr-1 fa-duotone fa-fw fa-plate-utensils"></i> Restaurant</a></li>
				<li><a href="/industries/technology-phoenix-tucson-arizona-accountants-cpas/"><i class="mr-1 fa-duotone fa-fw fa-microchip"></i> Technology</a></li>
			</ul>',
	],
	"about" => [
		"label" => 'About',
		"url" => '/about/',
		"hasChildren" => true,
			"submenuContent" => '[listmenu menu="submenu About" /]',
	],
	"careers" => [
		"label" => 'Careers',
		"url" => '/career-opportunities/',
		"hasChildren" => true,
			"submenuContent" => '[listmenu menu="submenu Careers" /]',
	],
	"contact" => [
		"label" => 'Contact',
		"url" => '/contact-us/',
		"hasChildren" => false,
	],
];

$menuItemsSecondary = [
	"clients" => [
		"label" => 'Client Center',
		"url" => '/client-center/',
	],
	"insights" => [
		"label" => 'Insights',
		"url" => '/blog/',
	],
	"events" => [
		"label" => 'Events',
		"url" => '/category/events/',
	],
];
?>



<?php //   P R E H E A D E R   A R E A   ?>
<?php get_template_part( 'template-parts/siteblocks/pre', 'header' ); ?>

<header id="masthead" class="nav-header | bg-white dark:bg-neutral-900 dark:text-neutral-100 print:bg-white print:shadow-none sticky top-0 z-[39] ">
	<div role="navigation" class="flex items-center justify-between px-2 py-3 md:container lg:px-[16px]">

		<div class="w-[240px] lg:w-[320px] order-first">
			<a
				class="focus:outline-brand-blue/75 dark:focus:outline-orient-400/75 focus:outline focus:outline-offset-4"
				href="<?php bloginfo('url'); ?>"
				aria-label="<?php echo bloginfo('name'); ?>"
				title="Go to BeachFleischman's front page"
			>
				<?php if ( is_front_page() ) {
					get_template_part('template-parts/svg/svg', 'logoserviceline');
				} else {
					get_template_part('template-parts/svg/svg', 'logonewbrandsimple');
				} ?>
			</a>
		</div>

		<div class="nav-ctrls | flex flex-row justify-end order-last print:hidden">
			<button class="toggle-mobile-nav | ml-2 p-2 border-2 border-neutral-500 rounded sm:rounded-lg cursor-pointer md:hidden focus:bg-brand-blue-faint dark:focus:bg-neutral-800 dark:focus:text-brand-blue-pale" aria-controls="primary-navigation" aria-expanded="false" tabindex="0">
				<span class="">Menu</span>
			</button>
		</div>

		<nav class="menus-container | md:flex md:flex-col md:grow md:order-1  print:hidden" id="primary-navigation" aria-label="Main Navigation">
			<ul class="disclosure-nav | list-none font-head font-semibold order-first md:flex md:gap-x-2 md:justify-end md:order-last lg:gap-x-6 ">
				<?php
				foreach ( $menuItemsPrimary as $primary ) {
					if ( $primary['hasChildren'] === true ) {
						$isMega = ( $primary['label'] === 'Services' ) ? ' mega' : '';
						echo sprintf( '<li>
								<a class="main-link md:text-lg lg:text-2xl underline-offset-2" href="%1$s">%2$s</a>
								<button type="button" aria-expanded="false" aria-controls="id_%3$s_menu" aria-label="%2$s"></button>
								<div id="id_%3$s_menu" class="dropmenu %5$s" style="display:none">%4$s</div>
							</li>',
							$primary['url'],
							$primary['label'],
							strtolower( $primary['label'] ),
							do_shortcode( $primary['submenuContent'] ),
							$isMega,
						);
					} else {
						echo '<li><a class="main-link md:text-lg lg:text-2xl underline-offset-2" href="' . $primary['url'] . '">' . $primary['label'] . '</a></li>';
					}
				}
				?>
			</ul>

			<ul class="secondary-nav | font-head md:text-lg text-neutral-700 md:order-first md:justify-end flex flex-col md:items-center md:gap-x-1 md:flex-row md:pb-1 lg:text-xl lg:gap-x-4 dark:text-neutral-300 print:hidden">
				<?php
				foreach ( $menuItemsSecondary as $secondary ) {
					echo '<li class="p-2 md:py-0"><a class="underline-offset-2 decoration-dotted decoration-from-font hover:underline hover:text-brand-blue hover:decoration-neutral-400 dark:hover:text-neutral-100" href="' . $secondary['url'] . '">' . $secondary['label'] . '</a></li>';
				}
				?>
				<li class="md:max-w-[200px] lg:max-w-fit"><?php get_search_form(); ?></li>
			</ul>
		</nav>

	</div>
</header>
