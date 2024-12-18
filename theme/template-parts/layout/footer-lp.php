<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$page_seo_footer = get_field( 'll_seo_footer', get_queried_object_id(), false );
$site_seo_footer = get_field( 'seo_footer_text', 'option' );


if ( !is_page_template( 'tpl-landing-page-bare.php' ) ) {

	//   P R E F O O T E R   A R E A
	get_template_part( 'template-parts/siteblocks/pre', 'footer' ); ?>

	<footer id="colophon" class="site-footer wp-block-cover alignfull is-light has-parallax text-white border-t-4 border-solid border-brand-blue ll-equal-vert-padding !px-0 | print:border-none print:text-neutral-700">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span>
		<div role="img" aria-label="The Arizona desert at sunrise" class="wp-block-cover__image-background has-parallax" style="background-position:50% 0;background-image:url('<?php echo get_template_directory_uri(); ?>/img/phx-desert-color-no-crop.jpg')"></div>
		<div class="wp-block-cover__inner-container is-layout-flow wp-block-cover-is-layout-flow px-2 space-y-8 | lg:px-[16px] lg:space-y-16">


			<div class="grid grid-cols-1 gap-x-4 gap-y-8 lg:gap-x-8">
				<div class="">
					<div class="max-w-xs mb-4 fill-current">
						<a href="<?php bloginfo( 'url' ); ?>" aria-label="<?php echo bloginfo( 'name' );?>">
							<?php
							get_template_part( 'template-parts/svg/svg', 'logomono' );
							?>
						</a>
					</div>
					<?php echo ll_show_social_links(); ?>
					<div>
						<p class="font-head lg:text-2xl"><a href="tel:<?php echo ll_format_phone_number( 15203214600 ); ?>" rel="nofollow" onclick="ga('send', 'event', 'Phone Call Tracking', 'Click to Call', '<?php echo ll_format_phone_number( 15203214600, 'us'); ?>', 0);"><?php echo  ll_format_phone_number( 15203214600, 'beach'); ?></a></p>

						<?php if ( is_page_template( 'tpl-landing-page-cyber.php' ) ) { ?>
							<p class="mt-8 text-xs print:break-inside-avoid-page print:mt-2"><?php echo LL_DISCLAIMER_CYBER; ?></p>
							<p class="mt-4 text-xs print:break-inside-avoid-page print:mt-2"><?php
							if ( $page_seo_footer ) {
								echo $page_seo_footer;
								sprintf( 'The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %1$s. &copy;%2$s %1$s. All rights reserved.', LL_COMPANY_LEGAL_NAME, date('Y') );
							} else {
								echo LL_FOOTER_PARAGRAPH_CYBER;
							} ?></p>
						<?php } else { ?>
							<p class="mt-8 text-xs  |  print:break-inside-avoid-page print:mt-2">
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
					</div>
				</div>
			</div>

			<?php
			get_template_part( 'template-parts/layout/chunk', 'backtotop' );
			?>

		</div>
	</footer>

<?php } ?>
