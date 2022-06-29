<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<footer id="colophon" class="site-footer | border-t-4 border-solid border-neutral-900 bg-neutral-800 text-neutral-200 print:bg-transparent bg:text-neutral-600">
	<div class="px-2 py-16 md:px-0 md:container md:mx-auto">
		<div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
			<div>
				<!-- <span class="block w-32 h-10 rounded-lg bg-neutral-200"></span> -->
				<div class="max-w-xs fill-current">
					<a href="<?php bloginfo( 'url' ); ?>" title="<?php echo bloginfo( 'name' );?>">
						<?php get_template_part( 'template-parts/svg/svg', 'logomono' ); ?>
					</a>
				</div>

				<p class="max-w-xs my-4 text-base">
					We work collaboratively with your business to take it to the next level.
				</p>

				<div class="footer-social | ">
					<?php echo do_shortcode( '[social_links /]' ); ?>
				</div>
			</div>

			<div class="grid grid-cols-1 gap-8 lg:col-span-2 sm:grid-cols-2 lg:grid-cols-4 print:hidden">
				<div>
					<h5>Company</h5>

					<nav class="flex flex-col mt-4 space-y-2 text-base">
						<a class="hover:text-brand-blue-pale" href=""> About </a>
						<a class="hover:text-brand-blue-pale" href=""> Meet the Team </a>
						<a class="hover:text-brand-blue-pale" href=""> Careers </a>
						<a class="hover:text-brand-blue-pale" href="">Leading Edge Alliance</a>
					</nav>
				</div>

				<div>
					<h5>Services</h5>

					<nav class="flex flex-col mt-4 space-y-2 text-base ">
						<a class="hover:text-brand-blue-pale" href=""> Assurance </a>
						<a class="hover:text-brand-blue-pale" href=""> Tax </a>
						<a class="hover:text-brand-blue-pale" href=""> Consulting </a>
					</nav>
				</div>

				<div>
					<h5>Helpful Links</h5>

					<nav class="flex flex-col mt-4 space-y-2 text-base ">
						<a class="hover:text-brand-blue-pale" href=""> Contact </a>
						<a href="" class="hover:text-brand-blue-pale"> Client Center</a>
						<a class="hover:text-brand-blue-pale" href=""> Phoenix Office </a>
						<a class="hover:text-brand-blue-pale" href=""> Tucson Office </a>
					</nav>
				</div>

				<div>
					<h5>Legal</h5>

					<nav class="flex flex-col mt-4 space-y-2 text-base ">
						<a class="hover:text-brand-blue-pale" href=""> Privacy Policy </a>
						<a class="hover:text-brand-blue-pale" href=""> Disclaimers </a>
						<a class="hover:text-brand-blue-pale" href=""> Cookie Policy </a>
						<a class="hover:text-brand-blue-pale" href=""> Cigna Transparency of Coverage </a>
					</nav>
				</div>
			</div>
		</div>

		<p class="mt-8 text-xs text-neutral-400">
			<?php // echo get_field( 'seo_footer_text', 'option' ); ?>
			<?php esc_html_e( sprintf( 'Accountants | Auditors | Advisors | Consultants | CPAs :: BeachFleischman PLLC is one of the largest locally-owned public accounting and consulting firms in Southern Arizona and a Top 200 CPA firm in the United States. Serving clients in Phoenix, Tucson, Mesa, Scottsdale, Tempe, Gilbert, Glendale, Flagstaff, and Chandler, BeachFleischman provides accounting, audit, consulting, and tax services to businesses, organizations, and individuals (U.S. and foreign-based), doing business domestically and internationally. The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %1$s. ©%2$s %1$s. All rights reserved.', COMPANY_LEGAL_NAME, date('Y') ), 'loadlifter' ); ?>
			<?php
			switch ( wp_get_environment_type() ) {
				case 'local':
					echo '<span class="text-pink-600/50 hover:text-pink-600">' . wp_get_theme()->get('Name') . ' ' . wp_get_theme()->get('Version') . '</span>';
					break;

				default:
					// production...
					// nope
					break;
			}
			?>
		</p>
	</div>
</footer>
