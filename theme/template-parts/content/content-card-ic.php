<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 *
 * @see https://inclusive-components.design/cards/
 */

if ( get_field( 'll_page_title_override' ) ) {
	$page_title                 = get_field( 'll_page_title_override' );
} else {
	$page_title                 = get_the_title();
}

$order_class = 'order-' . get_field( 'll_loc_sort_order' );
?>



<li <?php post_class( 'card-ic  |  group flex flex-col relative border-neutral-100 border-2 ' . $order_class . '  |  focus-within:border-neutral-500 dark:border-neutral-700' ); ?>>

	<div class="card-text  |  flex flex-col text grow order-1 bg-white  |  dark:bg-neutral-800 dark:text-neutral-300">
		<h3 class="my-2 overflow-hidden tracking-wide text-brand-blue text-ellipsis  |  dark:text-orient-400">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="focus:underline group-hover:decoration-orient-400 group-hover:underline">
				<?php echo $page_title; ?>
			</a>
		</h3>

		<?php
		if ( 'locations' === get_post_type() ) {
			// Custom code for 'location' post type
			if ( !empty( get_field( 'll_loc_fax' ) ) ) {
				$loc_fax_html = '<p class="leading-snug" property="faxNumber">F: ' . ll_format_phone_number( get_field( 'll_loc_fax' ), 'beach' ) . '</p>';
			} else {
				$loc_fax_html = '';
			}
			?>
			<div class="not-italic mb-2" property="address" typeof="PostalAddress">
				<p class="street-address  |  leading-snug" property="streetAddress"><?php echo get_field( 'll_loc_street1' ) . ' ' . get_field( 'll_loc_street2' ); ?></p>
				<p class="locality  |  leading-snug mb-2">
					<span property="addressLocality"><?php echo get_field( 'll_loc_city' ); ?></span>,
					<span class="state" property="addressRegion"><?php echo get_field( 'll_loc_state' ); ?></span>
					<span class="zip" property="postalCode"><?php echo get_field( 'll_loc_zip' ); ?></span>
				</p>
				<p class="leading-snug" property="telephone">P: <?php echo  ll_format_phone_number( get_field( 'll_loc_phone' ), 'beach'); ?></p>
				<?php echo $loc_fax_html; ?>
			</div>
			<?php
		} else {

			if ( has_excerpt() ) {
				?>
				<p class="mt-2 mb-4 text-sm  |  lg:text-base"><?php echo get_the_excerpt(); ?></p>
				<?php
			}
			?>

			<p class="card-meta  |  mt-auto mb-3 text-sm lg:text-base">
				<?php if ( ( 'post' === get_post_type() ) && ( !in_category( 'events' ) ) ) {
					echo '<span>' . esc_html( get_the_date() ) . '</span>';
					echo " | ";
					ll_posted_by();
				} ?>
			</p>
			<?php
		}
		?>

	</div>

	<div class="card-img  |  ">
		<?php ll_post_social_image();	?>
	</div>
</li>
