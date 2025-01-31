<?php
/**
 * Template part for displaying single locations
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$filler_content = false;

if ( get_field( 'll_loc_title_override' ) ) {
	$loc_title = get_field( 'll_loc_title_override' );
} else {
	$loc_title = get_the_title();
}

$hidden_featured_image = get_field( 'll_loc_hide_featured_image' );
$loc_phone_link_html = '<p class="leading-snug" property="telephone"><a href="tel:' . ll_format_phone_number( get_field( 'll_loc_phone' ) ) . '" rel="nofollow" onclick="ga(\'send\', \'event\', \'Phone Call Tracking\', \'Click to Call\', ' . ll_format_phone_number( get_field( 'll_loc_phone' ), 'us') . ', 0);">' . ll_format_phone_number( get_field( 'll_loc_phone' ), 'beach') . '</a></p>';
// if ( !empty( get_field( 'll_loc_fax' ) ) ) {
// 	$loc_fax_html = '<p class="leading-snug" property="faxNumber">F: ' . ll_format_phone_number( get_field( 'll_loc_fax' ), 'beach' ) . '</p>';
// } else {
// 	$loc_fax_html = '';
// }
?>

<?php
if ( $hidden_featured_image != true ) :
	echo ll_better_page_hero( $loc_title, 'Partners who value your vision.' );
endif;
?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'location  |  py-8 px-2 container  |  lg:px-[16px]' ); ?>>

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
		<div class="md:order-first md:w-2/3">
			<div <?php ll_content_class( 'entry-content' ) ?>>

				<?php the_content(); ?>

				<h2><?php echo LL_COMPANY_NICE_NAME . ' ' . get_field( 'll_loc_city' ); ?></h2>

				<div class="not-italic mb-8  |  lg:mb-12 print:space-y-1" property="address" typeof="PostalAddress">
					<p class="street-address  |  leading-snug " property="streetAddress"><?php echo get_field( 'll_loc_street1' ) . ', ' . get_field( 'll_loc_street2' ); ?></p>
					<p class="locality  |  leading-snug mb-2">
						<span property="addressLocality"><?php echo get_field( 'll_loc_city' ); ?></span>,
						<span class="state" property="addressRegion"><?php echo get_field( 'll_loc_state' ); ?></span>
						<span class="zip" property="postalCode"><?php echo get_field( 'll_loc_zip' ); ?></span>
					</p>
					<?php echo $loc_phone_link_html; ?>
					<?php // echo $loc_fax_html; ?>
				</div>

				<?php
				if ( !empty( get_field( 'll_loc_google_maps_snippet' ) ) ) {
					echo '<iframe src="' . get_field( 'll_loc_google_maps_snippet' ) . '" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="BeachFleischman\'s ' . get_field( 'll_loc_city' ) . ' office in Google Maps"></iframe>';
				}
				?>

				<?php
				if ( $filler_content ) {
					?>
					<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-md"></div>
					<h3>Our brand promise</h3>
					<p class="!mb-0 font-head has-brand-blue-color has-text-color has-xl-font-size"><strong>We passionately believe in the power of collaboration and what it can accomplish. When working together towards your success, you'll find that we:</strong></p>
					<?php echo do_shortcode( '[svg part="brand-promise-values" /]' ); ?>
					<?php
				}
				?>

				<!-- div class="clear-both">&nbsp;</div -->
			</div>
			<?php get_template_part( 'template-parts/siteblocks/area', 'after-post' ); ?>
		</div>
		<aside class="mt-8  |  md:mt-0 md:order-last md:w-1/3">
			<div id="contact" class="container-contact-form not-prose motion-preset-slide-u mb-8  |  lg:mb-16">
				<?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
			</div>
			<!--   A R E A   S I D E   -->
			<?php get_template_part( 'template-parts/siteblocks/area', 'side' ); ?>
		</aside>
	</div>

	<?php
	if ( $filler_content ) {
		?>
		<div class="entry-content pt-8">
			<h3>Awards and recognition</h3>
			<p>We are proud of our unique workplace culture.</p>
			<?php echo do_shortcode( '[awardlogos /]' ); ?>
		</div>
		<?php
	}
	?>

</article><!-- location-<?php the_ID(); ?> -->
