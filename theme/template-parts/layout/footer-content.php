<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<footer id="colophon" class="site-footer">

	<div class="py-4 text-white bg-brand-blue md:py-6 lg:py-8">
		<div class="px-1 md:container md:mx-auto md:px-0 ">

			<div class="space-y-4 md:flex md:items-center md:space-x-2 md:space-y-0">
				<div class="footer__locations--office | md:w-1/2 lg:w-1/3" vocab="http://schema.org" typeof="LocalBusiness">
					<h5 class="footer__locations--officetitle | font-bold leading-none">Phoenix Office</h5>
					<address class="not-italic" property="address" typeof="PostalAddress">
						<p class="street-address | font-head leading-none " property="streetAddress">2201 E. Camelback Road, Suite 200</p>
						<p class="locality | font-head leading-none "><span property="addressLocality">Phoenix</span>, <span class="state" property="addressRegion">AZ</span> <span class="zip" property="postalCode">85016</span></p>
						<p class="font-bold leading-none font-head " property="telephone">P: <a href="tel:16022657011" rel="nofollow" onclick="ga('send', 'event', 'Phone Call Tracking', 'Click to Call', '1 (602) 265-7011', 0);">1 (602) 265-7011</a></p>
						<p class="font-bold leading-none font-head " property="faxNumber">F: 1 (602) 265-7060</p>
					</address>
				</div>
				<div class="footer__locations--office | md:w-1/2 lg:w-1/3" vocab="http://schema.org" typeof="LocalBusiness">
					<h5 class="footer__locations--officetitle | font-bold leading-none">Tucson Office</h5>
					<address class="not-italic" property="address" typeof="PostalAddress">
						<p class="street-address | font-head leading-none" property="streetAddress">1985 E. River Road, Suite 201</p>
						<p class="locality | font-head leading-none"><span property="addressLocality">Tucson</span>, <span class="state" property="addressRegion">AZ</span> <span class="zip" property="postalCode">85718</span></p>
						<p class="font-bold leading-none font-head" property="telephone">P: <a href="tel:15203214600" rel="nofollow" onclick="ga('send', 'event', 'Phone Call Tracking', 'Click to Call', '1 (520) 321-4600', 0);">1 (520) 321-4600</a></p>
						<p class="font-bold leading-none font-head" property="faxNumber">F: 1 (520) 321-4040</p>
					</address>
				</div>
				<div class="footer-social | text-center md:self-center lg:text-right lg:w-1/3"><?php echo do_shortcode( '[social_links /]' ); ?></div>
			</div>

		</div>
	</div>

	<div class="footer-menu | text-neutral-600 ">
		<div class="px-1 md:container md:mx-auto md:px-0">
			<div class="font-head md:flex ">
				<div class="py-4 text-center md:text-left md:py-6"><a href="#top"><?php echo esc_html__( '^Top', 'loadlifter' ); ?></a></div>
				<div class="py-4 text-left md:flex-grow md:text-center md:font-bold md:py-6">
					<nav id="footer-navigation" class="flex items-center ">
						<?php
						wp_nav_menu(
							array(
								'theme_location' 	=> 'menu-2',
								'container_class' 	=> 'inline-block bacon',
								'menu_id'        	=> 'footer-menu',
							)
						);
						?>
					</nav>
				</div>
				<div class="hidden py-4 md:block md:py-6">&nbsp;</div>
			</div>
		</div>
	</div>

	<div class="text-neutral-500">
		<div class="px-1 md:container md:mx-auto md:px-0">
			<p class="py-4 text-xs font-body md:py-6"><?php // echo get_field( 'seo_footer_text', 'option' ); ?>
				<?php esc_html_e( sprintf( 'Accountants | Auditors | Advisors | Consultants | CPAs :: BeachFleischman PLLC is one of the largest locally-owned public accounting and consulting firms in Southern Arizona and a Top 200 CPA firm in the United States. Serving clients in Phoenix, Tucson, Mesa, Scottsdale, Tempe, Gilbert, Glendale, Flagstaff, and Chandler, BeachFleischman provides accounting, audit, consulting, and tax services to businesses, organizations, and individuals (U.S. and foreign-based), doing business domestically and internationally. The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %1$s. ©%2$s %1$s. All rights reserved. Theme v%3$s', COMPANY_LEGAL_NAME, date('Y'), wp_get_theme()->get('Version') ), 'loadlifter' ); ?>
			</p>
		</div>
	</div>

</footer>
