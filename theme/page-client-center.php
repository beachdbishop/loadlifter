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
    $plat_html .= '<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-brand-blue-dark-color has-text-color wp-element-button" href="'.$card['button1_url'].'" target="_blank""><i class="mr-1 '.$card['button1_icon'].'"></i> '.$card['button1_text'].'</a></div>';
    if ( $card['button2_url'] ) {
        $plat_html .= '<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-brand-blue-dark-color has-text-color wp-element-button" href="'.$card['button2_url'].'" target="_blank""><i class="mr-1 '.$card['button2_icon'].'"></i> '.$card['button2_text'].'</a></div>';
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

<main id="primary" class="bg-white">

	<?php
	while (have_posts()) :
		the_post();
	?>

    <?php echo ll_page_hero( $page_title, $page_message['label'] ); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('py-4 lg:py-8'); ?>>
			<div class="px-1 md:container md:mx-auto md:px-0">

                <div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

                    <div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>
                        <!-- <div class="prose lg:prose-xl"><?php // the_content(); ?></div> -->

                        <p class="visible mb-8 text-xl text-center text-brand-red md:mb-0 md:invisible md:h-0"><a href="#paymentopts" class="underline">Skip to <strong>Payment Options</strong></a></p>

						<div class="grid gap-16 lg:grid-cols-2 lg:grid-rows-2">

							<div class="p-2 md:p-0">
                                <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695918473/BF_Dashboard_yzwir1.png" alt="logo: BeachFleischman Dashboard" width="348" height="100">
                                <p class="my-8 lg:my-12 lg:text-xl">BeachFleischman Dashboard is a web-based platform that allows more organized and efficient communication, enabling everyone to collaborate on one dynamic request list.</p>
                                <div class="mb-8 wp-block-buttons is-layout-flex">
                                    <div class="wp-block-button is-style-outline">
                                        <a class="wp-block-button__link has-brand-blue-dark-color has-text-color wp-element-button" href="https://beachfleischman.auditdashboard.com/ target="_blank""><i class="mr-1 fa-solid fa-arrow-up-right-from-square"></i> Dashboard</a>
                                    </div>
                                </div>
                            </div>
							<div class="p-2 md:p-0">
                                <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695918882/logo_sharefile_uzqlf3.png" alt="logo: ShareFile" width="279" height="90">
                                <p class="my-8 lg:my-12 lg:text-xl">ShareFile is a secure collaboration and file sharing platform that supports document-centric tasks and workflow needs.</p>
                                <div class="mb-8 wp-block-buttons is-layout-flex">
                                    <div class="wp-block-button is-style-outline">
                                        <a class="wp-block-button__link has-brand-blue-dark-color has-text-color wp-element-button" href="https://beachfleischman.sharefile.com/" target="_blank"><i class="mr-1 fa-solid fa-arrow-up-right-from-square"></i> ShareFile</a>
                                    </div>
                                </div>
                            </div>
							<div class="p-2 md:p-0">
                                <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695862452/TaxCaddyLogo_emmblh.png" alt="logo: TaxCaddy, part of Thomson Reuters" width="348" height="90">
                                <p class="my-8 lg:my-12 lg:text-xl">TaxCaddy is a secure, cloud-based platform that makes gathering and sharing your tax documents a breeze.</p>
                                <div class="mb-8 wp-block-buttons is-layout-flex">
                                    <div class="wp-block-button is-style-outline">
                                        <a class="wp-block-button__link has-brand-blue-dark-color has-text-color wp-element-button" href="https://taxcaddy.com/" target="_blank"><i class="mr-1 fa-solid fa-arrow-up-right-from-square"></i> TaxCaddy</a>
                                    </div>
                                    <div class="wp-block-button is-style-outline">
                                        <a class="wp-block-button__link has-brand-blue-dark-color has-text-color wp-element-button" href="/client-center/taxcaddy-guide/"><i class="mr-1 fa-solid fa-map"></i> TaxCaddy User Guide</a>
                                    </div>
                                </div>
                            </div>
							<div class="p-2 md:p-0">
                                <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695918882/logo_safesend_wd9j9s.png" alt="logo: SafeSend Returns" width="340" height="90">
                                <p class="my-8 lg:my-12 lg:text-xl">SafeSend Returns is a digital platform that facilitates the delivering and signing of a tax return.</p>
                                <div class="mb-8 wp-block-buttons is-layout-flex">
                                    <div class="wp-block-button is-style-outline">
                                        <a class="wp-block-button__link has-brand-blue-dark-color has-text-color wp-element-button" href="/client-center/safesend-returns-guide"><i class="mr-1 fa-solid fa-map"></i> SafeSend User Guide</a>
                                    </div>
                                </div>
                            </div>
						</div>
                    </div>

                    <div class="ll-page-grid-area-b">
                        <?php // BBB ?>
                    </div>

                    <div class="ll-page-grid-area-c">
                        <div class="p-4 mb-4 border lg:mb-0 lg:p-8 bg-neutral-100 border-neutral-400 not-prose lg:text-xl">
                            <h2 class="text-brand-blue" id="paymentopts">Payment Options</h2>
                            <p class="my-4">Use the options below to pay an invoice or a deposit.</p>
                            <div class="mb-8 wp-block-buttons is-layout-flex">
                                <div class="wp-block-button is-style-default">
                                    <a class="wp-block-button__link has-brand-red-background-color wp-element-button" href="#"><i class="mr-1 fa-solid fa-file-invoice"></i> Pay Invoices</a>
                                </div>
                                <div class="wp-block-button is-style-default">
                                    <a class="wp-block-button__link has-brand-red-background-color wp-element-button" href="#"><i class="mr-1 fa-solid fa-file-invoice-dollar"></i> Pay Deposit</a>
                                </div>
                            </div>
                            <h3 class="">Need Help?</h3>
                            <p class="my-4">Contact our internal accounting team for assistance.<br />
                            <i class="mr-1 fa-solid fa-phone-office"></i><a class="underline hover:no-underline" href="tel://5203214600">520.321.4600</a><br />
                            <i class="mr-1 fa-solid fa-envelope"></i><a class="underline hover:no-underline" href="mailto:ccs@beachfleischman.com">Internal Accounting</a></p>
						</div>
                    </div>

                </div>

				<div class="not-prose entry-cont">

                    <?php /* <section class="mb-8 lg:mb-16">

						<div class="flex flex-col gap-8 lg:flex-row lg:items-start">

							<div class="lg:basis-1/3 lg:grow">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100 hover:bg-white">
									<div class="w-full bg-white"><a href="https://beachfleischman.sharefile.com/" target="_blank" rel="noopener"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2022/02/res__guide-sharefile.png" alt="logo: Citrix Sharefile" width="240" height="160"></a></div>
									<div class="p-6 ">
										<h3 class="mb-3 text-neutral-800 ">ShareFile</h3>
										<p class="mb-3 leading-relaxed">ShareFile is a <strong>secure collaboration and file sharing platform</strong> that supports document-centric tasks and workflow needs.</p>
										<p class="text-neutral-400"><a href="https://beachfleischman.sharefile.com/" class="text-brand-blue hover:text-brand-blue-dark md:mb-2 lg:mb-0" target="_blank" rel="noopener">ShareFile <i class="fa-regular fa-right-to-bracket"></i></a></p>
									</div>
								</div>
							</div>

							<div class="lg:basis-1/3 lg:grow">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100 hover:bg-white">
									<div class="w-full bg-white"><a href="https://taxcaddy.com/" target="_blank" rel="noopener"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2021/06/res__guide-taxcaddy.png" alt="logo: TaxCaddy" width="240" height="160"></a></div>
									<div class="p-6 ">
										<h3 class="mb-3 text-neutral-800 ">TaxCaddy</h3>
										<p class="mb-3 leading-relaxed">TaxCaddy is a secure, cloud-based platform that makes <strong>gathering and sharing your tax documents</strong> a breeze.</p>
										<p class="text-neutral-400"><a href="https://taxcaddy.com/" class="text-brand-blue hover:text-brand-blue-dark md:mb-2 lg:mb-0" target="_blank" rel="noopener">TaxCaddy <i class="fa-regular fa-right-to-bracket"></i></a> | <a href="/client-center/taxcaddy-guide/" class="text-brand-blue hover:text-brand-blue-dark md:mb-2 lg:mb-0">TaxCaddy Guide <i class="fa-regular fa-map"></i></a></p>
									</div>
								</div>
							</div>

							<div class="lg:basis-1/3 lg:grow">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100 hover:bg-white">
									<div class="w-full bg-white"><a href="/client-center/safesend-returns-guide/"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2021/06/res__guide-safesend.png" alt="logo: SafeSend Returns" width="240" height="160"></a></div>
									<div class="p-6 ">
										<h3 class="mb-3 text-neutral-800 ">SafeSend Returns</h3>
										<p class="mb-3 leading-relaxed">SafeSend Returns is a digital platform that facilitates the <strong>delivering and signing of a tax return</strong>.</p>
										<p class="text-neutral-400"><a href="/client-center/safesend-returns-guide/" class="text-brand-blue hover:text-brand-blue-dark md:mb-2 lg:mb-0">SafeSend Guide <i class="fa-regular fa-map"></i></a></p>
									</div>
								</div>
							</div>

						</div>

					</section> */ ?>

					<div class="">&nbsp;</div>

				</div>

				<?php // get_template_part('template-parts/form/form', 'hubspot'); ?>

			</div>
		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
