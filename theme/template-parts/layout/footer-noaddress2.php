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

if ( ( !is_page_template( LL_LP_TEMPLATES ) ) && ( $show_expanded_menus ) ) {
	$hidden_menus_class = '';
} else {
	$hidden_menus_class = 'hidden';
}

if ( !is_page_template( 'tpl-landing-page-bare.php' ) ) {
	//   P R E F O O T E R   A R E A
	get_template_part( 'template-parts/siteblocks/pre', 'footer' );
	?>

	<footer id="colophon" class="site-footer  |  wp-block-cover alignfull has-parallax border-t-4 border-solid border-brand-blue ll-equal-vert-padding !px-0 bg-neutral-950  |  print:border-none print:bg-white">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim print:hidden"></span>
		<div role="img" aria-label="The Arizona desert at sunrise" class="wp-block-cover__image-background has-parallax  |  print:hidden" style="background-position:50% 0;background-image:url('<?php echo get_template_directory_uri(); ?>/img/phx-desert-color-no-crop.jpg')"></div>

		<div class="wp-block-cover__inner-container is-layout-flow wp-block-cover-is-layout-flow px-2 | lg:px-[16px]">
			<div class="footer-grid  |  grid grid-cols-1 gap-x-8 gap-y-12 text-neutral-100 text-shadow shadow-neutral-900 z-10  |  md:grid-cols-2 lg:grid-cols-4 print:hidden print:text-neutral-700">

				<div class="space-y-6">
					<div class="max-w-xs mb-4 fill-current print:max-w-60 print:mb-1">
						<a href="<?php bloginfo( 'url' ); ?>" aria-label="<?php echo bloginfo( 'name' );?>">
							<?php
							get_template_part( 'template-parts/svg/svg', 'logomono' );
							?>
						</a>
					</div>
					<div class=""><?php echo ll_show_social_links(); ?></div>
					<p class="font-head text-2xl"><a href="tel:<?php echo ll_format_phone_number( 15203214600 ); ?>" rel="nofollow" onclick="ga('send', 'event', 'Phone Call Tracking', 'Click to Call', '<?php echo ll_format_phone_number( 15203214600, 'us'); ?>', 0);"><?php echo  ll_format_phone_number( 15203214600, 'beach'); ?></a></p>
				</div>

				<nav aria-label="About Us submenu" class="">
					<p class="text-2xl leading-5 font-head"><a href="/about/">Our Firm</a></p>
					<div class="footermenu mt-4 text-base">
						<ul class="menu-submenu-about-1">
							<?php
							foreach ( LL_MENU_ABOUT1 as $k => $v ) {
								echo '<li class="menu-item">
									<a href="' . $v . '">' . $k . '</a>
								</li>';
							}
							?>
						</ul>
					</div>
				</nav>

				<nav aria-label="Legal submenu" class="">
					<p class="text-2xl leading-5 font-head"><a href="/about/">Legal</a></p>
					<div class="footermenu mt-4 text-base">
						<ul class="menu-submenu-legal ">
							<?php
							foreach ( LL_MENU_ABOUT2 as $k => $v ) {
								echo '<li class="menu-item">
									<a href="' . $v . '">' . $k . '</a>
								</li>';
							}
							?>
						</ul>
					</div>
				</nav>

				<nav aria-label="Careers submenu" class="">
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



				<nav aria-label="Accounting and Assurance submenu" class="">
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

			</div>

			<p class="mt-8 text-xs  |  md:mt-12 print:break-inside-avoid-page print:mt-2">
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

			<?php
			get_template_part( 'template-parts/layout/chunk', 'backtotop' );
			?><!-- /.footer-grid -->

		</div>

	</footer>

<?php } ?>
