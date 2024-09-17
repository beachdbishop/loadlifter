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

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

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



$doclinks = [
	"register" => [
		"title" => 'Register for an account',
		"icon" => 'fa-id-card',
		"link" => 'https://www.clientsupport.aiwyn.ai/hc/en-us/articles/6464029278619-Create-New-User-Account',
	],
	"payment" => [
		"title" => 'How to make payments',
		"icon" => 'fa-money-check-dollar',
		"link" => 'https://www.clientsupport.aiwyn.ai/hc/en-us/categories/6327705817883-Payments',
	],
	"recurring" => [
		"title" => 'Set up recurring payments',
		"icon" => 'fa-calendar-check',
		"link" => 'https://www.clientsupport.aiwyn.ai/hc/en-us/articles/6328369048603-Set-up-a-Recurring-Payment',
	],
	"creditcard" => [
		"title" => 'Credit card payments*',
		"icon" => 'fa-credit-card',
		"link" => 'https://www.clientsupport.aiwyn.ai/hc/en-us/articles/6328245071899-Pay-with-a-Credit-Card',
	],
];


get_header();
?>

<main id="primary" class="bg-white dark:bg-neutral-900">

	<?php
	while (have_posts()) :
		the_post();
	?>

		<?php echo ll_better_page_hero( $page_title, $page_message ); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
			<div class="px-2 md:container lg:px-[16px]">

				<div <?php ll_content_class( 'entry-conten  not-prose' ); ?>>
					<?php the_content(); ?>

					<div class="my-8 flex flex-col gap-4 md:flex-row md:flex-nowrap md:place-items-center md:gap-8 lg:gap-16">
						<div class="grow space-y-4">
							<h2 class="text-brand-blue dark:text-neutral-100">Make a payment</h2>
							<p>We've always been a champion of high-quality client service &mdash; and convenience is a big part of that standard. That's why we offer multiple easy online payment options via our secure payment portal powered by Aiwyn.</p>
						</div>
						<div class="shrink-0 ">
							<a class="inline-block px-6 py-3 rounded-lg border-2 border-solid border-brand-red-dark text-center text-white bg-brand-red-dark font-head font-semibold text-3xl | hover:border-brand-red hover:bg-brand-red dark:border-brand-blue-pale dark:text-neutral-800 dark:bg-brand-blue-pale dark:hover:border-brand-blue dark:hover:bg-brand-blue dark:hover:text-white" href="#">Make a payment</a>
						</div>
					</div>

					<h3 class="text-center text-brand-blue dark:text-neutral-200 mt-20">Guides</h3>
					<div class="mt-4 ind-card-flips is-style-blue ">
					 	<?php
						foreach ( $doclinks as $link ) {
							echo '<div class="card-' . $link['icon'] . '">
								<a href="' . esc_url( $link['link'] ) . '" rel="bookmark">
									<div class="group relative inline-block w-[180px] h-[180px] md:w-[190px] md:h-[190px] lg:w-[200px] lg:h-[200px]">
										<div class="card-content | absolute w-full h-full rounded-lg shadow-md shadow-neutral-300 dark:shadow-none group-hover:shadow-lg">
											<div class="card-front | text-center bg-neutral-50 border border-neutral-100 text-brand-blue absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 group-hover:bg-white">
												<div class="card-icon | text-brand-blue">
													<span class="fa-stack fa-2x">
														<i class="text-white fa-solid fa-circle fa-stack-2x dark:text-neutral-900"></i>
														<i class="fa-solid ' . $link['icon'] . ' fa-stack-1x "></i>
													</span>
												</div>
												<h4 class="mt-2 font-light leading-none text-current">' . $link['title'] . '</h4>
											</div>
										</div>
									</div>
								</a>
							</div>';
						}
						?>
					</div>
					<p class="text-center italic mb-16">* Credit card payments will incur a 3% processing fee. This fee does not apply to ACH/bank transfers.<br /><strong>Please note that we do not accept debit card payments.</strong></p>

					<div class="my-8 flex flex-col gap-4 md:flex-row md:flex-nowrap md:place-items-center md:gap-8 lg:gap-16">
						<div class="space-y-4">
							<h2 class="text-brand-blue dark:text-neutral-100">Aiwyn Client Intro Video</h2>
							<p>To create your account, you will need an email address, password, your client ID, and Invoice number, which can be found on any BeachFleischman invoice. Here's a step-by-step video to help you.</p>
							<h4 class="text-brand-blue-dark font-semibold dark:text-neutral-100">Need more help?</h4>
							<p>Reach out to our
					<a class="underline decoration-brand-blue" href="mailto:invoices@beachfleischman.com?subject=Client%20Center%20Help">Administrative Team</a>.</p>
						</div>
						<div class="">
							<a href="https://www.loom.com/share/c6c8853fcc4f44cb817320012d4986ed?sid=28b785c0-e4d8-4c90-86b7-ee79dd41db70" target="_blank"><img class="max-w-xs lg:max-w-2xl" src="http://peoplecptauthortest.local/wp-content/uploads/2024/08/20240822-loom-aiwyn-welcome-vid-jpg.avif" alt="screenshot of Aiwyn payments welcome video"></a>
						</div>
					</div>

					<div class="mt-16 border-t-4 border-solid border-neutral-300 h-16 lg:mt-20 lg:h-20">&nbsp;</div>

					<div class="grid gap-16 mb-8 lg:mb-16 lg:grid-cols-2 lg:grid-rows-2">

						<div class="p-2 md:p-0">
							<img class="!mt-0" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695918882/logo_safesend_wd9j9s.png" alt="logo: SafeSend Returns" width="340" height="90">
							<p class="my-8 lg:my-12 lg:text-xl">SafeSend Returns is a digital platform that facilitates the delivering and signing of a tax return.</p>
							<div class="-buttons flex">
								<div class="-button">
									<a href="/client-center/safesend-returns-guide/" class="font-head font-semibold text-base no-underline px-6 py-4 border-2 rounded-lg border-orient-900 text-orient-900 hover:border-orient-600 hover:text-orient-600 | lg:text-lg dark:text-orient-500 dark:border-orient-500 dark:hover:text-orient-200 dark:hover:border-orient-200">
										<i class="mr-1 fa-solid fa-map"></i> SafeSend User Guide
									</a>
								</div>
							</div>
						</div>
						<div class="p-2 md:p-0">
							<img class="!mt-0" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695918882/logo_sharefile_uzqlf3.png" alt="logo: ShareFile" width="279" height="90">
							<p class="my-8 lg:my-12 lg:text-xl">ShareFile is a secure collaboration and file sharing platform that supports document-centric tasks and workflow needs.</p>
							<div class="-buttons flex">
								<div class="-button"><a href="https://beachfleischman.sharefile.com/" rel="noreferrer" target="_blank" class="font-head font-semibold text-base no-underline px-6 py-4 border-2 rounded-lg border-orient-900 text-orient-900 hover:border-orient-600 hover:text-orient-600 | lg:text-lg dark:text-orient-500  dark:border-orient-500 dark:hover:text-orient-200 dark:hover:border-orient-200"><i class="mr-1 fa-solid fa-arrow-up-right-from-square"></i> ShareFile</a></div>
							</div>
						</div>
						<div class="p-2 md:p-0">
							<img class="!mt-0" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695862452/TaxCaddyLogo_emmblh.png" alt="logo: TaxCaddy, part of Thomson Reuters" width="348" height="90">
							<p class="my-8 lg:my-12 lg:text-xl">TaxCaddy is a secure, cloud-based platform that makes gathering and sharing your tax documents a breeze for 1040 (Individual) clients.</p>
							<div class="-buttons flex gap-2">
								<div class="-button">
									<a href="https://consumer.taxcaddy.com/#/login" rel="noreferrer" target="_blank" class="font-head font-semibold text-base no-underline px-6 py-4 border-2 rounded-lg border-orient-900 text-orient-900 hover:border-orient-600 hover:text-orient-600 | lg:text-lg dark:text-orient-500  dark:border-orient-500 dark:hover:text-orient-200 dark:hover:border-orient-200">
										<i class="mr-1 fa-solid fa-arrow-up-right-from-square"></i> TaxCaddy
									</a>
								</div>
								<div class="-button">
									<a href="/client-center/taxcaddy-guide/" class="font-head font-semibold text-base no-underline px-6 py-4 border-2 rounded-lg border-orient-900 text-orient-900 hover:border-orient-600 hover:text-orient-600 | lg:text-lg dark:text-orient-500  dark:border-orient-500 dark:hover:text-orient-200 dark:hover:border-orient-200">
										<i class="mr-1 fa-solid fa-map"></i> TaxCaddy User Guide
									</a>
								</div>
							</div>
						</div>
						<div class="p-2 md:p-0">
							<img class="!mt-0" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695918473/BF_Dashboard_yzwir1.png" alt="logo: BeachFleischman Dashboard" width="348" height="100">
							<p class="my-8 lg:my-12 lg:text-xl">BeachFleischman Dashboard is a web-based platform that allows more organized and efficient communication, enabling assurance clients to collaborate on one dynamic request list.</p>
							<div class="-buttons flex">
								<div class="-button">
									<a href="https://beachfleischman.auditdashboard.com/" rel="noreferrer" target="_blank" class="font-head font-semibold text-base no-underline px-6 py-4 border-2 rounded-lg border-orient-900 text-orient-900 hover:border-orient-600 hover:text-orient-600 | lg:text-lg dark:text-orient-500  dark:border-orient-500 dark:hover:text-orient-200 dark:hover:border-orient-200">
										<i class="mr-1 fa-solid fa-arrow-up-right-from-square"></i> Dashboard
									</a>
								</div>
							</div>
						</div>

					</div>

					<div class="llcallout is-style-success | mb-8 lg:mb-16 not-prose bg-white border-2 rounded-br-2xl shadow-md dark:bg-neutral-800">
						<p class="p-2 font-semibold llcallout-title "><i class="fa-regular fa-envelope mr-1"></i> Note</p>
						<div class="acf-innerblocks-container">
							<p>For assistance with any of the technology platforms listed above, <a class="underline hover:no-underline" href="mailto:clientsupport@beachfleischman.com">email Client Support</a>.</p>
						</div>
					</div>

				</div>

			</div>
		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
