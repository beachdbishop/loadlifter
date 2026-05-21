<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */
?>


<?php //   P R E H E A D E R   A R E A
?>
<?php get_template_part('template-parts/siteblocks/pre', 'header'); ?>

<header id="masthead"
	class="nav-header  |  bg-white sticky top-0 z-[39]  |  dark:bg-neutral-900 dark:text-neutral-100 dark:shadow-none md:shadow-neutral-500/50 md:shadow-md print:bg-white print:shadow-none">
	<div role="navigation" class="flex items-center justify-between px-2 py-3  |  md:container lg:px-4">

		<div class="w-[240px] order-1  |  lg:w-[320px]">
			<a class="focus:outline-brand-blue/75 dark:focus:outline-orient-400/75 focus:outline focus:outline-offset-4"
				href="<?php bloginfo('url'); ?>" aria-label="Go to BeachFleischman's front page">
				<?php if (is_front_page()) {
					get_template_part('template-parts/svg/svg', 'logoserviceline');
				} else {
					get_template_part('template-parts/svg/svg', 'logonewbrandsimple');
				} ?>
			</a>
		</div>



		<nav class="menus-container  |  md:flex md:flex-col md:grow md:order-1 print:hidden" id="primary-navigation"
			aria-label="Main Navigation">

		</nav>

	</div>
</header>
