<?php

/**
 * Template part for displaying the header content on landing pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<header role="banner" id="masthead" class="nav-header | bg-white print:bg-white print:shadow-none sticky top-0 z-[39] ">
	<div role="navigation" class="flex items-center justify-between px-1 py-3 mx-auto md:container md:px-0 md:py-4">

		<div role="img" class="w-[240px] lg:w-[320px] order-first">
			<a href="<?php bloginfo('url'); ?>" aria-label="<?php echo bloginfo('name'); ?>">
				<?php get_template_part('template-parts/svg/svg', 'logonewbrandsimple'); ?>
			</a>
		</div>

		<div class="nav-ctrls | flex flex-row order-last">
			<ul class="flex print:hidden">
				<li role="menuitem" class="toggleable |  group  ">
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
		</div>

	</div>
</header>
