<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<?php //   P R E F O O T E R   A R E A   ?>
<?php get_template_part( 'template-parts/siteblocks/pre', 'footer' ); ?>

<footer role="contentinfo" id="colophon" class="site-footer | print:bg-transparent">

	<div class="bg-center bg-no-repeat bg-cover border-t-4 border-solid on-darkbg bg-neutral-400 text-neutral-200 bg-phoenix-desert3 border-brand-blue bg-blend-multiply">
        <div class="px-2 pt-16 md:px-0 md:container md:mx-auto">
			<div class="grid grid-cols-1 gap-x-4 gap-y-8 text-shadow shadow-neutral-900 sm:grid-cols-2 md:grid-cols-3 md:gap-x-8 lg:grid-cols-6 print:hidden">
				<nav>
					<p class="text-lg font-head"><a href="/assurance/">Accounting &amp; Assurance</a></p>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'll_submenu_assurance',
						'container_class' => 'footermenu mt-4 text-sm',
						'walker' => new LL_Menu_Walker()
					) );
					?>
				</nav>
				<nav>
					<p class="text-lg font-head"><a href="/tax/">Tax</a></p>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'll_submenu_tax',
						'container_class' => 'footermenu mt-4 text-sm',
						'walker' => new LL_Menu_Walker()
					) );
					?>
				</nav>
				<nav>
					<p class="text-lg leading-5 font-head"><a href="/soar/">Strategic Operations &amp; Advisory Resources</a></p>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'll_submenu_soar',
						'container_class' => 'footermenu mt-4 text-sm',
						'walker' => new LL_Menu_Walker()
					) );
					?>
				</nav>
				<nav>
					<p class="text-lg font-head"><a href="/industries/">Industry Expertise</a></p>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'll_submenu_industries',
						'container_class' => 'footermenu mt-4 text-sm',
						'walker' => new LL_Menu_Walker()
					) );
					?>
				</nav>
				<nav>
					<p class="text-lg font-head"><a href="/about/">Our Firm</a></p>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'll_submenu_about',
						'container_class' => 'footermenu mt-4 text-sm',
						'walker' => new LL_Menu_Walker()
					) );
					?>
				</nav>
				<nav>
					<p class="text-lg font-head"><a href="/career-opportunities/">Careers</a></p>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'll_submenu_careers',
						'container_class' => 'footermenu mt-4 text-sm',
						'walker' => new LL_Menu_Walker()
					) );
					?>
				</nav>
			</div>
		</div>

		<div class="px-2 py-16 md:px-0 md:container md:mx-auto">
			<div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-3 lg:gap-x-8">
				<div class="">
					<div class="max-w-xs mb-4 fill-current">
						<a href="<?php bloginfo( 'url' ); ?>" aria-label="<?php echo bloginfo( 'name' );?>">
							<?php get_template_part( 'template-parts/svg/svg', 'logomono' ); ?>
						</a>
					</div>
					<?php ll_show_social_links( $out = 'echo' ); ?>
				</div>
                <div class=" md:pt-2">
                    <address class="space-y-2 not-italic" property="address" typeof="PostalAddress">
                        <p class="street-address | font-head leading-none " property="streetAddress">2201 E. Camelback Road, Suite 200</p>
                        <p class="locality | font-head leading-none "><span property="addressLocality">Phoenix</span>, <span class="state" property="addressRegion">AZ</span> <span class="zip" property="postalCode">85016</span></p>
                        <p class="font-bold leading-none font-head " property="telephone">P: <a href="tel:16022657011" rel="nofollow" onclick="ga('send', 'event', 'Phone Call Tracking', 'Click to Call', '1 (602) 265-7011', 0);">602.265.7011</a></p>
                        <p class="font-bold leading-none font-head " property="faxNumber">F: 602.265.7060</p>
                    </address>
                </div>
                <div class=" md:pt-2">
                    <address class="space-y-2 not-italic" property="address" typeof="PostalAddress">
                        <p class="street-address | font-head leading-none" property="streetAddress">1985 E. River Road, Suite 201</p>
                        <p class="locality | font-head leading-none"><span property="addressLocality">Tucson</span>, <span class="state" property="addressRegion">AZ</span> <span class="zip" property="postalCode">85718</span></p>
                        <p class="font-bold leading-none font-head" property="telephone">P: <a href="tel:15203214600" rel="nofollow" onclick="ga('send', 'event', 'Phone Call Tracking', 'Click to Call', '1 (520) 321-4600', 0);">520.321.4600</a></p>
                        <p class="font-bold leading-none font-head" property="faxNumber">F: 520.321.4040</p>
                    </address>
                </div>
			</div>
			<p role="text" class="mt-8 text-xs">
				<?php
				if ( ( is_page() ) && ( get_field( 'll_seo_footer' ) ) ) {
					// if this is a page and special footer text is set...
					$footer_markup = sprintf( '%1$s The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %2$s. &copy;%3$s %2$s. All rights reserved.', get_field( 'll_seo_footer', get_queried_object_id(), false ), LL_COMPANY_LEGAL_NAME, date('Y') );
				} else {
					// this isn't a page or special footer text isn't set...
					$footer_markup = sprintf( 'Accountants | Auditors | Advisors | Consultants | CPAs :: %1$s The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %2$s. &copy;%3$s %2$s. All rights reserved.', get_field( 'seo_footer_text', 'option' ), LL_COMPANY_LEGAL_NAME, date('Y') );
				}
				echo $footer_markup;
				switch ( wp_get_environment_type() ) {
					case 'local':
						echo '<span role="text" class="ml-8 hover:text-pink-500">' . wp_get_theme()->get('Name') . ' ' . wp_get_theme()->get('Version') . '</span>';
						break;
					default:
						// production...
						// nope
						break;
				}
				?>
			</p>
			<p class="pt-4 pb-0 text-sm text-center uppercase">
				<a class="hover:text-brand-blue-faint" href="#top" title="Back to top"><i class="fa-regular fa-arrow-up-to-dotted-line"></i></a>
			</p>
		</div>
	</div>
</footer>
