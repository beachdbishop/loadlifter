<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<footer role="contentinfo" id="colophon" class="site-footer | border-t-4 border-solid border-neutral-900 bg-neutral-800 text-neutral-200 print:bg-transparent bg:text-neutral-600">
	<div class="px-2 py-16 md:px-0 md:container md:mx-auto">
		<div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
			<div>
				<div class="max-w-xs fill-current">
					<a href="<?php bloginfo( 'url' ); ?>" aria-label="<?php echo bloginfo( 'name' );?>">
						<?php get_template_part( 'template-parts/svg/svg', 'logomono' ); ?>
					</a>
				</div>

				<p class="max-w-xs my-4 text-base">
					We work collaboratively with your business to take it to the next level.
				</p>

				<div class="footer-social">
					<?php ll_show_social_links(); ?>
				</div>
			</div>

			<div class="grid grid-cols-1 gap-8 lg:col-span-2 sm:grid-cols-2 lg:grid-cols-4 print:hidden">
				<div>
					<h5>Company</h5>

					<nav class="flex flex-col mt-4 space-y-2 text-base">
						<a class="hover:text-brand-blue-pale" href="/about/"> About </a>
						<a class="hover:text-brand-blue-pale" href="/people/"> Leadership Team </a>
						<a class="-m-1" href="/career-opportunities/"> <span class="p-1 font-bold rounded-sm bg-amber-400 text-neutral-800 hover:bg-amber-200">We're Hiring!</span> </a>
						<a class="tracking-tight hover:text-brand-blue-pale" href="/about/leading-edge-alliance/">Leading Edge Alliance</a>
					</nav>
				</div>

				<div>
					<h5>Services</h5>

					<nav class="flex flex-col mt-4 space-y-2 text-base ">
						<a class="hover:text-brand-blue-pale" href="/assurance/"> Assurance </a>
						<a class="hover:text-brand-blue-pale" href="/tax/"> Tax </a>
						<a class="hover:text-brand-blue-pale" href="/consulting/"> Consulting </a>
					</nav>
				</div>

				<div>
					<h5>Helpful Links</h5>

					<nav class="flex flex-col mt-4 space-y-2 text-base ">
						<a class="hover:text-brand-blue-pale" href="/contact-us/"> Contact </a>
						<a class="hover:text-brand-blue-pale" href="/client-center/"> Client Center</a>
						<a class="hover:text-brand-blue-pale" href="/contact-us/phoenix-az-office/"> <strong>Phoenix</strong> Office </a>
						<a class="hover:text-brand-blue-pale" href="/contact-us/tucson-az-office/"> <strong>Tucson</strong> Office </a>
					</nav>
				</div>

				<div>
					<h5>Legal</h5>

					<nav class="flex flex-col mt-4 space-y-2 text-base ">
						<a class="hover:text-brand-blue-pale" href="https://www.iubenda.com/privacy-policy/8039818"> Privacy Policy </a>
						<a class="hover:text-brand-blue-pale" href="/disclaimer/"> Disclaimers </a>
						<a class="hover:text-brand-blue-pale" href="https://www.iubenda.com/privacy-policy/8039818/cookie-policy"> Cookie Policy </a>
						<a class="tracking-tight hover:text-brand-blue-pale" href="/cigna-transparency-of-coverage/" title="Cigna - Transparency of Coverage Information"> Transparency of Coverage </a>
					</nav>
				</div>
			</div>
		</div>

		<p role="text" class="mt-8 text-xs text-neutral-400">
			<?php
			//esc_html_e( sprintf( 'Accountants | Auditors | Advisors | Consultants | CPAs :: BeachFleischman PLLC is one of the largest locally-owned public accounting and consulting firms in Southern Arizona and a Top 200 CPA firm in the United States. Serving clients in Phoenix, Tucson, Mesa, Scottsdale, Tempe, Gilbert, Glendale, Flagstaff, and Chandler, BeachFleischman provides accounting, audit, consulting, and tax services to businesses, organizations, and individuals (U.S. and foreign-based), doing business domestically and internationally. The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %1$s. ©%2$s %1$s. All rights reserved.', COMPANY_LEGAL_NAME, date('Y') ), 'loadlifter' );
			if ( is_page( 'Construction' ) || is_page_template( 'tpl-landing-page.php' ) ) {
				$footer_markup = sprintf( '%1$s The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %2$s. &copy;%3$s %2$s. All rights reserved.', get_field( 'footer_text', get_queried_object_id(), false ), COMPANY_LEGAL_NAME, date('Y') );
			}

			if ( !is_page( 'Construction' ) && !is_page_template( 'tpl-landing-page.php' ) ) {
				$footer_markup = sprintf( 'Accountants | Auditors | Advisors | Consultants | CPAs :: %1$s The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %2$s. &copy;%3$s %2$s. All rights reserved.', get_field( 'seo_footer_text', 'option' ), COMPANY_LEGAL_NAME, date('Y') );
			}

			echo $footer_markup;
			?>
			<?php
			switch ( wp_get_environment_type() ) {
				case 'local':
					echo '<span role="text" class=" hover:text-pink-500">' . wp_get_theme()->get('Name') . ' ' . wp_get_theme()->get('Version') . '</span>';
					break;

				default:
					// production...
					// nope
					break;
			}
			?>
		</p>

		<p class="pt-4 pb-0 text-sm text-center uppercase">
			<a class="hover:text-brand-red-pale" href="#top" title="Back to top"><i class="fa-regular fa-arrow-up-to-dotted-line"></i></a>
		</p>
	</div>
</footer>
