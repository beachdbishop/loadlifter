<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$show_expanded_menus = true;

$page_seo_footer = get_field( 'll_seo_footer', get_queried_object_id(), false );
$site_seo_footer = get_field( 'seo_footer_text', 'option' );


if ( !is_page_template( 'tpl-landing-page-bare.php' ) ) {
	//   P R E F O O T E R   A R E A
	get_template_part( 'template-parts/siteblocks/pre', 'footer' );
	?>

	<footer id="colophon" class="site-footer wp-block-cover alignfull is-light has-parallax text-white border-t-4 border-solid border-brand-blue ll-equal-vert-padding !px-0 bg-neutral-950 | print:border-none print:text-neutral-700 print:bg-white">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim print:hidden"></span>
		<div role="img" aria-label="The Arizona desert at sunrise" class="wp-block-cover__image-background has-parallax print:hidden" style="background-position:50% 0;background-image:url('<?php echo get_template_directory_uri(); ?>/img/phx-desert-color-no-crop.jpg')"></div>
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

			<div class="print:!mt-0">
				<div class="grid grid-cols-1 gap-y-8 md:grid-cols-2 lg:grid-cols-3 lg:gap-x-8 print:gap-y-2">
					<div class="">
						<div class="max-w-xs mb-4 fill-current print:max-w-60 print:mb-1">
							<a href="<?php bloginfo( 'url' ); ?>" aria-label="<?php echo bloginfo( 'name' );?>">
								<?php
								get_template_part( 'template-parts/svg/svg', 'logomono' );
								?>
							</a>
						</div>
						<?php echo ll_show_social_links(); ?>
					</div>
					<div class="grid grid-cols-1 gap-x-4 gap-y-8 items-center md:grid-auto-fit lg:col-span-2">

						<?php
						// foreach( $offices as $office ) {
						// 	( $office['open'] == true ) ? ll_footer_address( $office ) : 'nope';
						// }
						?>

						<p class="font-head text-center lg:text-2xl"><a href="/locations/">Locations</a></p>

						<p class="font-head text-center lg:text-2xl lg:text-right"><a href="tel:<?php echo ll_format_phone_number( 15203214600 ); ?>" rel="nofollow" onclick="ga('send', 'event', 'Phone Call Tracking', 'Click to Call', '<?php echo ll_format_phone_number( 15203214600, 'us'); ?>', 0);"><?php echo  ll_format_phone_number( 15203214600, 'beach'); ?></a></p>

					</div>
				</div>
				<?php if ( is_page_template( 'tpl-landing-page-cyber.php' ) ) { ?>
					<p class="mt-8 text-xs print:break-inside-avoid-page print:mt-2"><?php echo LL_DISCLAIMER_CYBER; ?></p>
					<p class="mt-4 text-xs print:break-inside-avoid-page print:mt-2"><?php
					if ( $page_seo_footer ) {
						echo $page_seo_footer;
						sprintf( 'The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %1$s. &copy;%2$s %1$s. All rights reserved.', LL_COMPANY_LEGAL_NAME, date('Y') );
					} else {
						// echo $footer_para_cyber;
						echo LL_FOOTER_PARAGRAPH_CYBER;
					} ?></p>
				<?php } else { ?>
					<p class="mt-8 text-xs print:break-inside-avoid-page print:mt-2">
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

				<?php
				get_template_part( 'template-parts/layout/chunk', 'backtotop' );
				?>
			</div>

		</div>
	</footer>

<?php } ?>
