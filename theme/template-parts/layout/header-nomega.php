<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

// $menuItemsPrimary = [
// 	"services" => [
// 		"label" => 'Services',
// 		"url" => '/services/',
// 	],
// 	"industries" => [
// 		"label" => 'Industries',
// 		"url" => '/industries/',
// 	],
// 	"about" => [
// 		"label" => 'About Us',
// 		"url" => '/about/',
// 	],
// 	"careers" => [
// 		"label" => 'Careers',
// 		"url" => '/career-opportunities/',
// 	],
// ];
$menuItemsPrimary = [
	"assurance" => [
		"label" => 'Assurance',
		"url" => '/assurance/',
	],
	"tax" => [
		"label" => 'Tax',
		"url" => '/tax/',
	],
	"soar" => [
		"label" => 'Consulting <small>(SOAR)</small>',
		"url" => '/soar/',
	],
	"industries" => [
		"label" => 'Industries',
		"url" => '/industries/',
	],
	"about" => [
		"label" => 'About Us',
		"url" => '/about/',
	],
	"careers" => [
		"label" => 'Careers',
		"url" => '/career-opportunities/',
	],
];
$menuItemsSecondary = [
	"all" => [
		"label" => 'All',
		"url" => '/all-pages/',
	],
	"insights" => [
		"label" => 'Insights',
		"url" => '/blog/',
	],
	"events" => [
		"label" => 'Events',
		"url" => '/events/',
	],
	"resources" => [
		"label" => 'Resources',
		"url" => '/resources/',
	],
	"clients" => [
		"label" => 'Client Center',
		"url" => '/client-center/',
	],
	"contact" => [
		"label" => 'Contact Us',
		"url" => '/contact-us/',
	],
];
?>

<?php //   P R E H E A D E R   A R E A
?>
<?php get_template_part('template-parts/siteblocks/pre', 'header'); ?>

<header role="banner" id="masthead" class="nav-header | bg-white print:bg-white print:shadow-none sticky top-0 z-[39] ">
	<div role="navigation" class="flex items-center justify-between px-1 py-3 mx-auto md:container md:px-0 md:py-4 lg:gap-8">

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
				<svg class="w-8 h-8" aria-hidden="true">
					<use xlink:href="#bars" />
				</svg>
				<span class="sr-only">Menu</span>
			</button>
		</div>

		<nav class="menus-container | md:flex md:flex-col md:order-1 md:grow  print:hidden" id="primary-navigation" aria-label="main menu">
			<!-- <ul role="list" class="nav-primary | list-none flex font-bold md:justify-end md:items-center order-first md:order-last children:inline"> -->
			<ul role="list" class="nav-primary | list-none font-bold flex flex-col gap-2 md:flex-row md:justify-end lg:gap-4">
				<?php
				foreach ($menuItemsPrimary as $primary) {
					echo '<li class="menu-item"><a class="menu-level-0" href="' . $primary['url'] . '">' . $primary['label'] . '</a></li>';
				}
				?>
			</ul>

			<ul role="list" class="nav-secondary | mt-4 flex flex-col gap-2 md:mt-0 md:flex-row md:order-first md:justify-end md:items-center print:hidden text-sm uppercase lg:gap-4">
				<?php
				foreach ($menuItemsSecondary as $secondary) {
					echo '<li class="font-bold menu-item text-neutral-500"><a class="menu-level-0" href="' . $secondary['url'] . '">' . $secondary['label'] . '</a></li>';
				}
				?>
			</ul>
		</nav>

	</div>
</header>
