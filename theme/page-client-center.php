<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

if ( get_field( 'll_page_title_override' ) ) {
	$page_title                     = get_field( 'll_page_title_override' );
} else {
	$page_title                     = get_the_title();
}
$page_message                   = get_field( 'll_brand_message' );
$page_featimg                   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $page_featimg == true ) {
	$page_featimg_url               = $page_featimg[0];
} else {
	$page_featimg_url               = '';
}


function ll_clientcenter_platform_card( $card ) {

		$plat_html = '<div class="p-2 md:p-0">';
		$plat_html .= '<img src="'.$card['image'].'" alt="'.$card['image_alt'].'" width="'.$card['image_width'].'" height="'.$card['image_height'].'">';
		$plat_html .= '<p class="my-8 lg:my-12 lg:text-xl">' . $card['blurb'] . '</p>';

		$plat_html .= '<div class="mb-8 wp-block-buttons is-layout-flex">';
		$plat_html .= '<div class="wp-block-button is-style-outline"><a class="wp-block-button__link text-brand-blue-dark dark:text-brand-blue has-text-color wp-element-button" href="'.$card['button1_url'].'" target="_blank""><i class="mr-1 '.$card['button1_icon'].'"></i> '.$card['button1_text'].'</a></div>';
		if ( $card['button2_url'] ) {
				$plat_html .= '<div class="wp-block-button is-style-outline"><a class="wp-block-button__link text-brand-blue-dark dark:text-brand-blue has-text-color wp-element-button" href="'.$card['button2_url'].'" target="_blank""><i class="mr-1 '.$card['button2_icon'].'"></i> '.$card['button2_text'].'</a></div>';
		}
		$plat_html .= '</div></div>';

		return $plat_html;
}


$platforms = [
		"dashboard" => [
				"label"         => 'BeachFleischman Dashboard',
				"image"         => 'https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_100/v1695918473/BF_Dashboard_yzwir1.png',
				"image_alt"     => 'logo: BeachFleischman Dashboard',
				"image_width"   => '387',
				"image_height"  => '100',
				"blurb"         => 'BeachFleischman Dashboard is a web-based platform that allows more organized and efficient communication, enabling everyone to collaborate on one dynamic request list.',
				"button1_url"   => 'https://beachfleischman.auditdashboard.com/',
				"button1_text"  => 'Dashboard',
				"button1_icon"  => 'fa-solid fa-arrow-up-right-from-square',
		],
];





get_header();
?>

<main id="primary" class="bg-white dark:bg-neutral-900">

	<?php
	while (have_posts()) :
		the_post();
	?>

		<?php echo ll_better_page_hero( $page_title, $page_message['label'] ); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
			<div class="px-2 md:container lg:px-[16px]">

				<div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

					<div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>
						<!-- <div class="prose lg:prose-xl"><?php // the_content(); ?></div> -->

						<p class="visible mb-8 text-xl text-center text-brand-red md:mb-0 md:invisible md:h-0"><a href="#paymentopts" class="underline">Skip to <strong>Payment Options</strong></a></p>

						<div class="llcallout is-style-success | mb-8 lg:mb-16 not-prose bg-white border-2 rounded-br-2xl shadow-md dark:bg-neutral-800">
							<p class="p-2 font-semibold llcallout-title "><i class="fa-regular fa-envelope mr-1"></i> Note</p>
							<div class="acf-innerblocks-container">
								<p>For assistance with any of the technology platforms listed below, <a class="underline hover:no-underline" href="mailto:clientsupport@beachfleischman.com">email Client Support</a>.</p>
							</div>
						</div>

						<div class="grid gap-16 mb-8 lg:mb-16 lg:grid-cols-2 lg:grid-rows-2">

							<div class="p-2 md:p-0">
								<img class="!mt-0" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695918882/logo_safesend_wd9j9s.png" alt="logo: SafeSend Returns" width="340" height="90">
								<p class="my-8 lg:my-12 lg:text-xl">SafeSend Returns is a digital platform that facilitates the delivering and signing of a tax return.</p>
								<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
									<div class="wp-block-button is-style-outline"><a href="/client-center/safesend-returns-guide/" class="wp-block-button__link has-orient-900-color has-text-color wp-element-button"><i class="mr-1 fa-solid fa-map"></i> SafeSend User Guide</a></div>
								</div>
							</div>
							<div class="p-2 md:p-0">
								<img class="!mt-0" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695918882/logo_sharefile_uzqlf3.png" alt="logo: ShareFile" width="279" height="90">
								<p class="my-8 lg:my-12 lg:text-xl">ShareFile is a secure collaboration and file sharing platform that supports document-centric tasks and workflow needs.</p>
								<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
									<div class="wp-block-button is-style-outline"><a href="https://beachfleischman.sharefile.com/" rel="noreferrer" target="_blank" class="wp-block-button__link has-orient-900-color has-text-color wp-element-button"><i class="mr-1 fa-solid fa-arrow-up-right-from-square"></i> ShareFile</a></div>
								</div>
							</div>
							<div class="p-2 md:p-0">
								<img class="!mt-0" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695862452/TaxCaddyLogo_emmblh.png" alt="logo: TaxCaddy, part of Thomson Reuters" width="348" height="90">
								<p class="my-8 lg:my-12 lg:text-xl">TaxCaddy is a secure, cloud-based platform that makes gathering and sharing your tax documents a breeze for 1040 (Individual) clients.</p>
								<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
									<div class="wp-block-button is-style-outline"><a href="https://consumer.taxcaddy.com/#/login" rel="noreferrer" target="_blank" class="wp-block-button__link has-orient-900-color has-text-color wp-element-button"><i class="mr-1 fa-solid fa-arrow-up-right-from-square"></i> TaxCaddy</a></div>
									<div class="wp-block-button is-style-outline"><a href="/client-center/taxcaddy-guide/" class="wp-block-button__link has-orient-900-color has-text-color wp-element-button"><i class="mr-1 fa-solid fa-map"></i> TaxCaddy User Guide</a></div>
								</div>
							</div>
							<div class="p-2 md:p-0">
								<img class="!mt-0" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695918473/BF_Dashboard_yzwir1.png" alt="logo: BeachFleischman Dashboard" width="348" height="100">
								<p class="my-8 lg:my-12 lg:text-xl">BeachFleischman Dashboard is a web-based platform that allows more organized and efficient communication, enabling assurance clients to collaborate on one dynamic request list.</p>
								<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
									<div class="wp-block-button is-style-outline"><a href="https://beachfleischman.auditdashboard.com/" rel="noreferrer" target="_blank" class="wp-block-button__link has-orient-900-color has-text-color wp-element-button"><i class="mr-1 fa-solid fa-arrow-up-right-from-square"></i> Dashboard</a></div>
								</div>
							</div>

						</div>

						<?php /* <div class="llcallout is-style-success | not-prose bg-white shadow-md dark:bg-neutral-800">
									<p class="llcallout-title"><i class="fa-solid fa-envelope"></i> Need help with the platforms listed above?</p>
									<div class="acf-innerblocks-container">
											<p>Contact our <a href="mailto:SOMETHING@beachfleischman.com">Assembly Department</a> for asistance.</p>
									</div>
							</div> */ ?>
					</div>

					<div class="ll-page-grid-area-b">
							<?php // BBB ?>
					</div>

					<div class="ll-page-grid-area-c">
						<div class="p-4 mt-8 border md:mt-0 lg:p-8 bg-gradient-to-b from-neutral-100 from-10% via-white via-40% border-neutral-400 not-prose animate-fade-in-from-bottom print:hidden dark:border-neutral-600 dark:bg-neutral-800">
							<h2 class="text-brand-blue dark:text-brand-blue-pale" id="paymentopts">Payment Options</h2>
							<p class="my-4">Use the options below to pay an invoice or a deposit.</p>
							<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
								<div class="wp-block-button is-style-default"><a href="https://secure.cpacharge.com/pages/beachfleischman/payments" rel="noreferrer" target="_blank" class="wp-block-button__link has-brand-red-dark-background-color wp-element-button"><i class="mr-1 fa-solid fa-file-invoice"></i> Pay Invoices</a></div>
									<div class="wp-block-button is-style-default"><a href="https://secure.cpacharge.com/pages/beachfleischman/retainer" rel="noreferrer" target="_blank" class="wp-block-button__link has-brand-red-dark-background-color has-text-color wp-element-button"><i class="mr-1 fa-solid fa-file-invoice-dollar"></i> Pay Deposit</a></div>
							</div>
							<h3 class="my-8">Need help making a payment?</h3>
							<p class="my-4">Contact our internal accounting team for assistance.<br />
							<i class="mr-1 fa-solid fa-phone-office fa-fw"></i><a class="underline hover:no-underline" href="tel://5203214600">520.321.4600</a><br />
							<i class="mr-1 fa-solid fa-envelope fa-fw"></i><a class="underline hover:no-underline" href="mailto:ccs@beachfleischman.com">Internal Accounting</a></p>
						</div>

						<div>&nbsp;</div>
					</div>

				</div>

			</div>
		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
