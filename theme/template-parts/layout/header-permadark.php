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

<header id="masthead" class="nav-header permadark | bg-brand-blue-dark text-neutral-100 print:bg-white print:shadow-none sticky top-0 z-[39] ">
	<div role="navigation" class="flex items-center justify-between px-2 py-3 md:container lg:px-[16px]">

		<div class="w-[240px] lg:w-[320px] order-1">
			<a
				class="focus:outline-orient-400/75 focus:outline focus:outline-offset-4"
				href="<?php bloginfo('url'); ?>"
				aria-label="<?php echo bloginfo('name'); ?>"
				title="Go to BeachFleischman's front page"
			>
				<?php get_template_part('template-parts/svg/svg', 'logomono'); ?>
			</a>
		</div>

		<div class="nav-ctrls | flex flex-row justify-end order-3 print:hidden">
			<button class="toggle-mobile-nav | ml-2 p-2 border-2 border-neutral-500 rounded-sm  |  sm:rounded-lg cursor-pointer md:hidden  focus:bg-neutral-800 focus:text-orient-400" aria-controls="primary-navigation" aria-expanded="false" tabindex="0">
				<span class="">Menu</span>
			</button>
		</div>

		<nav class="menus-container | md:flex md:flex-col md:grow md:order-1  print:hidden" id="primary-navigation" aria-label="Main Navigation">
			<ul class="disclosure-nav | list-none font-head font-semibold order-1 md:flex md:gap-x-2 md:justify-end md:order-2 lg:gap-x-6 ">
				<?php
				foreach ( LL_NAV_PRIMARY as $primary ) {
					if ( $primary['hasChildren'] === true ) {
						$isMega = ( $primary['label'] === 'Services' ) ? ' mega' : '';
						echo sprintf( '<li><a class="main-link md:text-lg lg:text-2xl underline-offset-2" href="%1$s">%2$s</a><button type="button" aria-expanded="false" aria-controls="id_%3$s_menu" aria-label="%2$s"></button><div id="id_%3$s_menu" class="dropmenu %5$s" style="display:none">%4$s</div></li>',
							$primary['url'],
							$primary['label'],
							strtolower( $primary['label'] ),
							do_shortcode( $primary['submenuContent'] ),
							$isMega,
						);
					} else {
						echo sprintf( '<li><a class="main-link md:text-lg lg:text-2xl underline-offset-2" href="%1$s">%2$s</a></li>',
							$primary['url'],
							$primary['label'],
						);
					}
				}
				?>
			</ul>

			<ul class="secondary-nav  |  flex flex-col font-head text-neutral-200  |  md:order-1 md:justify-end md:items-center md:gap-x-1 md:flex-row md:pb-1 lg:text-xl lg:gap-x-4 print:hidden">
				<?php
				foreach ( LL_NAV_SECONDARY as $secondary ) {
					echo sprintf( '<li class="p-2  |  md:py-0"><a class="underline-offset-2 decoration-dotted decoration-from-font  |  hover:underline hover:text-orient-400 hover:decoration-neutral-200" href="%1$s">%2$s</a></li>',
						$secondary['url'],
						$secondary['label'],
					);
				}
				?>
				<li class="md:max-w-[200px] lg:max-w-fit"><?php get_search_form(); ?></li>
			</ul>
		</nav>

	</div>
</header>
