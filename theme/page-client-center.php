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

// $page_featimg                   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
// if ( $page_featimg == true ) {
// 	$page_featimg_url               = $page_featimg[0];
// } else {
// 	$page_featimg_url               = '';
// }


// TODO: Turn this into a BLOCK! Probably just a Card w/ Image + InnerBlocks area?
function ll_clientcenter_platform_card_sub( $platform ) {
	$button1_ext = ( strpos( $platform['button1_url'], 'https://' ) === 0 ) ? ' target="_blank"' : '';
	$button2_ext = ( strpos( $platform['button2_url'], 'https://' ) === 0 ) ? ' target="_blank"' : '';

	$plat_html = '<div class="p-2 grid grid-rows-subgrid row-span-3 gap-y-6  |  md:p-0 lg:gap-y-8">';
	$plat_html .= '<img src="'.$platform['image'].'" alt="'.$platform['image_alt'].'" width="'.$platform['image_width'].'" height="'.$platform['image_height'].'">';
	$plat_html .= '<p class="">' . $platform['blurb'] . '</p>';
	$plat_html .= '<div class="w-full flex flex-wrap gap-2">';
	$plat_html .= '<a href="' . $platform['button1_url'] . '" class="px-5 py-3 font-head font-semibold border-2 border-brand-blue rounded-lg text-brand-blue  |  hover:text-brand-blue-dark hover:border-orient-400 dark:text-orient-400 dark:border-orient-400 dark:hover:text-orient-200 dark:hover:border-orient-200" ' . $button1_ext . '><i class="mr-1 ' . $platform['button1_icon'] . '"></i> ' . $platform['button1_text'] . '</a>';
	if ( $platform['button2_url'] ) {
		$plat_html .= '<a href="' . $platform['button2_url'] . '" class="px-5 py-3 font-head font-semibold border-2 border-brand-blue rounded-lg text-brand-blue  |  hover:text-brand-blue-dark hover:border-orient-400 dark:text-orient-400 dark:border-orient-400 dark:hover:text-orient-200 dark:hover:border-orient-200" ' . $button2_ext . '><i class="mr-1 ' . $platform['button2_icon'] . '"></i> ' . $platform['button2_text'] . '</a>';
	}
	$plat_html .= '</div>';
	$plat_html .= '</div>';

	return $plat_html;
}


$platforms = [
	"safesend" => [
		"label"         => 'SafeSend Returns',
		"image"         => 'https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695918882/logo_safesend_wd9j9s.png',
		"image_alt"     => 'logo: SafeSend Returns',
		"image_width"   => '340',
		"image_height"  => '90',
		"blurb"         => 'SafeSend Returns is a digital platform that facilitates the delivering and signing of a tax return.',
		"button1_url"   => '/client-center/safesend-returns-guide/',
		"button1_text"  => 'SafeSend User Guide',
		"button1_icon"  => 'fa-solid fa-map',
		"button2_url"		=> false,
	],
	"sharefile" => [
		"label"         => 'ShareFile',
		"image"         => 'https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,w_360/v1778626356/sharefile-logo-nav_qrjdhu.svg',
		"image_alt"     => 'logo: ShareFile',
		"image_width"   => '400',
		"image_height"  => '55',
		"blurb"         => 'ShareFile is a secure collaboration and file sharing platform that supports document-centric tasks and workflow needs.',
		"button1_url"   => 'https://beachfleischman.sharefile.com/',
		"button1_text"  => 'ShareFile',
		"button1_icon"  => 'fa-solid fa-arrow-up-right-from-square',
		"button2_url"		=> false,
	],
	"taxcaddy" => [
		"label"         => 'TaxCaddy',
		"image"         => 'https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_90/v1695862452/TaxCaddyLogo_emmblh.png',
		"image_alt"     => 'logo: TaxCaddy',
		"image_width"   => '348',
		"image_height"  => '90',
		"blurb"         => 'TaxCaddy is a secure, cloud-based platform that makes gathering and sharing your tax documents a breeze for 1040 (Individual) clients.',
		"button1_url"   => 'https://consumer.taxcaddy.com/#/login',
		"button1_text"  => 'TaxCaddy',
		"button1_icon"  => 'fa-solid fa-arrow-up-right-from-square',
		"button2_url"		=> '/client-center/taxcaddy-guide/',
		"button2_text"	=> 'TaxCaddy User Guide',
		"button2_icon"	=> 'fa-solid fa-map',
	],
	"dashboard" => [
		"label"         => 'BeachFleischman Dashboard',
		"image"         => 'https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_100/v1695918473/BF_Dashboard_yzwir1.png',
		"image_alt"     => 'logo: BeachFleischman Dashboard',
		"image_width"   => '348',
		"image_height"  => '90',
		"blurb"         => 'BeachFleischman Dashboard is a web-based platform that allows more organized and efficient communication, enabling everyone to collaborate on one dynamic request list.',
		"button1_url"   => 'https://beachfleischman.auditdashboard.com/',
		"button1_text"  => 'Dashboard',
		"button1_icon"  => 'fa-solid fa-arrow-up-right-from-square',
		"button2_url"		=> false,
	],
	// "wholenother" => [
	// 	"label"         => 'Whole \'Nother Platform',
	// 	"image"         => 'https://res.cloudinary.com/beachfleischman/image/upload/c_scale,f_auto,h_100/v1695918473/BF_Dashboard_yzwir1.png',
	// 	"image_alt"     => 'logo: Whole \'Nother Platform',
	// 	"image_width"   => '348',
	// 	"image_height"  => '90',
	// 	"blurb"         => 'Whole \'Nother Platform is a web-based platform that allows more organized and efficient communication, enabling everyone to collaborate on one dynamic request list.',
	// 	"button1_url"   => 'https://beachfleischman.auditdashboard.com/',
	// 	"button1_text"  => 'Dashboard',
	// 	"button1_icon"  => 'fa-solid fa-arrow-up-right-from-square',
	//	"button2_url"		=> false,
	// ],
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

<main id="primary" class="its-the-client-center-template bg-white relative z-10 shadow-xl  😶☔🤓  |  lg:shadow-2xl dark:bg-neutral-900">

	<?php
	while (have_posts()) :
		the_post();
		?>

		<?php echo ll_better_page_hero( $page_title, $page_message ); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('py-8'); ?>>
			<div class="px-2 container  |  lg:px-4">

				<div class="pb-8  |  lg:pb-16">
					<?php the_content(); ?>

					<div class="mt-16 border-t-4 border-solid border-neutral-300 h-16  |  lg:mt-20 lg:h-20">&nbsp;</div>

					<div class="not-prose grid gap-16  |  lg:grid-cols-2 lg:gap-y-20">
						<?php
						foreach ( $platforms as $platform ) {
							echo ll_clientcenter_platform_card_sub( $platform );
						}
						?>
					</div>

					<!-- div class="llcallout  |  is-style-success not-prose bg-white border-2 rounded-br-2xl shadow-md  |  dark:bg-neutral-800 ">
						<p class="p-2 font-semibold llcallout-title "><i class="fa-regular fa-envelope mr-1"></i> Note</p>
						<div class="acf-innerblocks-container prose">
							<p>For assistance with any of the technology platforms listed above, <a href="mailto:clientsupport@beachfleischman.com">email Client Support</a>.</p>
						</div>
					</div -->

				</div>

			</div>
		</article>

	<?php endwhile; ?>

	<?php /*   P R E F O O T E R   A R E A   */   get_template_part( 'template-parts/siteblocks/pre', 'footer' ); ?>

</main>

<?php
get_footer();
