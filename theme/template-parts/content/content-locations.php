<?php
/**
 * Template part for displaying single locations
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

if ( get_field( 'll_loc_title_override' ) ) {
	$loc_title = get_field( 'll_loc_title_override' );
} else {
	$loc_title = get_the_title();
}

$hidden_featured_image = get_field( 'll_loc_hide_featured_image' );
$loc_phone_link_html = '<a href="tel:' . ll_format_phone_number( get_field( 'll_loc_phone' ) ) . '" rel="nofollow" onclick="ga(\'send\', \'event\', \'Phone Call Tracking\', \'Click to Call\', ' . ll_format_phone_number( get_field( 'll_loc_phone' ), 'us') . ', 0);">' . ll_format_phone_number( get_field( 'll_loc_phone' ), 'beach') . '</a>';


$data = [
	'@context' => 'https://schema.org',
	'@type' => 'LocalBusiness',
	'address' => [
		'@type' => 'PostalAddress',
		'addressLocality' => get_field( 'll_loc_city' ),
		'addressRegion' => get_field( 'll_loc_state' ),
		'streetAddress' => get_field( 'll_loc_street1' ),
		'extendedAddress' => get_field( 'll_loc_street2' ),
		'postalCode' => get_field( 'll_loc_zip' ),
	],
	'description' => LL_COMPANY_DESC_SHORT,
	'name' => LL_COMPANY_NICE_NAME . ' ' . get_field( 'll_loc_city' ),
	'telephone' => get_field( 'll_loc_phone' ),
	'faxNumber' => get_field( 'll_loc_fax' ),
];
echo '<script type="application/ld+json">';
echo json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
echo '</script>';
?>

<?php
if ( $hidden_featured_image != true ) :
	// echo ll_better_page_hero( $loc_title, 'Partners who value your vision.' );
	echo ll_better_page_hero( $loc_title, '' );
endif;


$page_cta_heading = "Contact us";
$page_cta_body = "Ready to partner with a trusted CPA firm in the " . get_field( 'll_loc_city' ) . " area? Complete the form on this page to connect with us.";
$page_cta_button_text = "Contact us";
?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'location  |  px-2 py-8 container  |  lg:px-4' ); ?>>

	<?php
	if ( $hidden_featured_image == true ) :
	?>

		<section class="">
			<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>
			<header>
				<h1 class="entry-title  |  dark:text-neutral-100"><?php echo $loc_title; ?></h1>
			</header>
		</section>

	<?php
	endif;
	?>

	<div class="md:flex md:gap-8 lg:gap-16">
		<div class="md:order-1 md:w-2/3">
			<div <?php ll_content_class( 'entry-content' ) ?>>


				<?php the_content(); ?>


				<section class="flex flex-col gap-6 my-6  |  lg:flex-row lg:my-12">
					<div class="space-y-4 shrink">
						<h2><?php echo LL_COMPANY_NICE_NAME . ' ' . get_field( 'll_loc_city' ); ?></h2>
						<ul class="fa-ul space-y-4" style="--fa-li-margin: 2em">
							<li class="street-address">
								<span class="fa-li text-neutral-500">
									<i class="fa-regular fa-location-dot fa-fw"></i>
								</span>
								<?php echo get_field( 'll_loc_street1' ) . ', ' . get_field( 'll_loc_street2' ); ?><br />
								<span class="locality">
									<span><?php echo get_field( 'll_loc_city' ); ?></span>,
									<span class="state"><?php echo get_field( 'll_loc_state' ); ?></span>
									<span class="zip"><?php echo get_field( 'll_loc_zip' ); ?></span>
								</span>
							</li>
							<li property="telephone">
								<span class="fa-li text-neutral-500">
									<i class="fa-regular fa-phone fa-fw"></i>
								</span>
								<?php echo $loc_phone_link_html; ?>
							</li>
						</ul>
					</div>

					<div class="flex-grow">
						<?php
							if ( !empty( get_field( 'll_loc_google_maps_snippet' ) ) ) {
								echo '<iframe src="' . get_field( 'll_loc_google_maps_snippet' ) . '" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="BeachFleischman\'s ' . get_field( 'll_loc_city' ) . ' office in Google Maps"></iframe>';
							}
						?>
					</div>
				</section>

			</div>
			<?php // get_template_part( 'template-parts/siteblocks/area', 'after-post' ); ?>
		</div>

		<aside class="mt-8  |  md:mt-0 md:order-2 md:w-1/3">
			<div id="contact" class="container-contact-form not-prose motion-preset-slide-u mb-8  |  lg:mb-16">
				<?php get_template_part( 'template-parts/form/form', 'hubspot-contact-main' ); ?>
			</div>

			<!--   A R E A   S I D E   -->
			<?php get_template_part( 'template-parts/siteblocks/area', 'side' ); ?>
		</aside>
	</div>

</article><!-- location-<?php the_ID(); ?> -->

<?php get_template_part(
	'template-parts/layout/chunk',
	'cta',
	$args = [
		'class' => 'cta-part',
		'part_data' => [
			'cta_heading' => $page_cta_heading,
			'cta_body' => $page_cta_body,
			'cta_button_text' => $page_cta_button_text,
			'cta_button_url' => '#contact',
		]
	]
); ?>
