<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$show_expanded_menus = true;

$disclaimer_cyber = sprintf( 'Disclaimer: %1$s and Silent Sector, LLC are separate independent legal entities and are not joint ventures, partners or members of a formal business organization. Neither %1$s nor Silent Sector, LLC has the authority to bind, act for or incur liability on behalf of the other.', LL_COMPANY_LEGAL_NAME );
$footer_para_cyber = sprintf( 'Cybersecurity Consultants | IT Consultants | Virtual CISO :: %1$s is a public accounting and cybersecurity consulting firm with offices in Phoenix, Tucson, and Nogales (AZ) serving the IT security needs of businesses and organizations across the United States. Our firm provides enterprise cyber risk assessments, penetration testing, compliance gap assessments, SOC 2 reports, CMMC/NIST SP 800-171 compliance and virtual CISO consulting services. The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %1$s. &copy;%2$s %1$s. All rights reserved.', LL_COMPANY_LEGAL_NAME, date('Y') );
$page_seo_footer = get_field( 'll_seo_footer', get_queried_object_id(), false );
$site_seo_footer = get_field( 'seo_footer_text', 'option' );

$offices = [
	'office-phx' => [
		'open' => true,
		'street1' => '2201 E. Camelback Road, Suite 200',
		'street2' => '',
		'city' => 'Phoenix',
		'state' => 'AZ',
		'zip' => '85016',
		'phone' => '16022657011',
		'fax' => '16022657060'
	],
	'office-tuc' => [
		'open' => true,
		'street1' => '1985 E. River Road, Suite 201',
		'street2' => '',
		'city' => 'Tucson',
		'state' => 'AZ',
		'zip' => '85718',
		'phone' => '15203214600',
		'fax' => '15203214040'
	],
	'office-nog' => [
		'open' => true,
		'street1' => '825 N. Grand Avenue, Suite 204',
		'street2' => '',
		'city' => 'Nogales',
		'state' => 'AZ',
		'zip' => '85621',
		'phone' => '15202874174',
		'fax' => '15202872336'
	],
];

if ( !is_page_template( 'tpl-landing-page-bare.php' ) ) {
	//   P R E F O O T E R   A R E A
	get_template_part( 'template-parts/siteblocks/pre', 'footer' );
	?>

	<footer id="colophon" class="site-footer wp-block-cover alignfull is-light has-parallax text-white border-t-4 border-solid border-brand-blue ll-equal-vert-padding !px-0 bg-neutral-950 | print:border-none print:text-neutral-700">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim"></span>
		<div role="img" aria-label="The Arizona desert at sunrise" class="wp-block-cover__image-background has-parallax" style="background-position:50% 0;background-image:url('<?php echo get_template_directory_uri(); ?>/img/phx-desert-color-no-crop.jpg')"></div>
		<div class="wp-block-cover__inner-container is-layout-flow wp-block-cover-is-layout-flow px-2 space-y-8 | lg:px-[16px] lg:space-y-16">

			<?php if ( ( !is_page_template( LL_LP_TEMPLATES ) ) && ( $show_expanded_menus ) ) { ?>
			<div class="print:hidden">
				<div class="grid grid-cols-1 gap-x-4 gap-y-8 text-shadow shadow-neutral-900 sm:grid-cols-2 md:grid-cols-3 md:gap-x-8 lg:grid-cols-6">
					<nav aria-label="Accounting and Assurance submenu">
						<p class="text-2xl leading-5 font-head"><a href="/assurance/">Accounting &amp; Assurance</a></p>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'll_submenu_assurance',
							'container_class' => 'footermenu mt-4 text-base',
							'walker' => new LL_Menu_Walker()
						) );
						?>
					</nav>
					<nav aria-label="Tax submenu">
						<p class="text-2xl leading-5 font-head"><a href="/tax/">Tax</a></p>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'll_submenu_tax',
							'container_class' => 'footermenu mt-4 text-base',
							'walker' => new LL_Menu_Walker()
						) );
						?>
					</nav>
					<nav aria-label="SOAR submenu">
						<p class="text-2xl leading-5 font-head"><a href="/soar/" title="Strategic Operations &amp; Advisory Resources">SOAR</a></p>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'll_submenu_soar',
							'container_class' => 'footermenu mt-4 text-base',
							'walker' => new LL_Menu_Walker()
						) );
						?>
					</nav>
					<nav aria-label="Industry Knowledge submenu">
						<p class="text-2xl leading-5 font-head"><a href="/industries/">Industry Knowledge</a></p>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'll_submenu_industries',
							'container_class' => 'footermenu mt-4 text-base',
							'walker' => new LL_Menu_Walker()
						) );
						?>
					</nav>
					<nav aria-label="About Us submenu">
						<p class="text-2xl leading-5 font-head"><a href="/about/">Our Firm</a></p>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'll_submenu_about',
							'container_class' => 'footermenu mt-4 text-base',
							'walker' => new LL_Menu_Walker()
						) );
						?>
					</nav>
					<nav aria-label="Careers submenu">
						<p class="text-2xl leading-5 font-head"><a href="/career-opportunities/">Careers</a></p>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'll_submenu_careers',
							'container_class' => 'footermenu my-4 text-base',
							'walker' => new LL_Menu_Walker()
						) );
						?>
						<a href="/career-opportunities/?ref=footer" class=" rounded-sm text-neutral-900 text-shadow-none border-b-0 bg-amber-300 p-1 font-bold |  md:p-2 hover:bg-amber-100 hover:text-neutral-800"><i class="fa-regular fa-chart-user"></i> We're hiring</a>
					</nav>
				</div>
			</div>
			<?php } ?>

			<div class="">
				<div class="grid grid-cols-1 gap-y-8 lg:grid-cols-3 lg:gap-x-8">
					<div class="">
						<div class="max-w-xs mb-4 fill-current">
							<a href="<?php bloginfo( 'url' ); ?>" aria-label="<?php echo bloginfo( 'name' );?>">
								<?php get_template_part( 'template-parts/svg/svg', 'logomono' ); ?>
							</a>
						</div>
						<?php echo ll_show_social_links(); ?>
					</div>
					<div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-auto-fit lg:col-span-2">
						<?php foreach( $offices as $office ) {
							( $office['open'] == true ) ? ll_footer_address( $office ) : 'nope';
						} ?>
					</div>
				</div>
				<?php if ( is_page_template( 'tpl-landing-page-cyber.php' ) ) { ?>
					<p class="mt-8 text-xs"><?php echo $disclaimer_cyber; ?></p>
					<p class="mt-4 text-xs"><?php
					if ( $page_seo_footer ) {
						echo $page_seo_footer;
						sprintf( 'The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %1$s. &copy;%2$s %1$s. All rights reserved.', LL_COMPANY_LEGAL_NAME, date('Y') );
					} else {
						echo $footer_para_cyber;
					} ?></p>
				<?php } else { ?>
					<p class="mt-8 text-xs">
						<?php
						if ( ( is_page() ) && ( get_field( 'll_seo_footer' ) ) ) {
							// if this is a page and special footer text is set...
							$footer_markup = sprintf( '%1$s The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %2$s. &copy;%3$s %2$s. All rights reserved.', get_field( 'll_seo_footer', get_queried_object_id(), false ), LL_COMPANY_LEGAL_NAME, date('Y') );
						} else {
							// this isn't a page or special footer text isn't set...
							$footer_markup = sprintf( 'Accountants | Auditors | Advisors | Consultants | CPAs :: %1$s The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %2$s. &copy;%3$s %2$s. All rights reserved.', get_field( 'seo_footer_text', 'option' ), LL_COMPANY_LEGAL_NAME, date('Y') );
						}
						echo $footer_markup;
						?>
					</p>
				<?php } ?>

				<p class="pt-4 pb-0 text-sm text-center uppercase print:hidden">
					<a class="hover:text-brand-blue-faint" href="#page" title="Back to top"><i class="fa-regular fa-arrow-up-to-dotted-line"></i></a>
				</p>
			</div>

		</div>
	</footer>

	<!-- <footer id="colophon" class="site-footer bg-neutral-900/80 ">

		<div class="text-white border-t-4 border-solid on-darkbg border-brand-blue print:border-none print:text-neutral-700">




		</div>
	</footer> -->

<?php } ?>
