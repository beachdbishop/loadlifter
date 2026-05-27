<?php
/**
 * Ad Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */


$block_id = '';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = ' id="ll_ad_' . $block['id'] . ' ' . sanitize_title( $block['anchor'] ) . '"';
} else {
	$block_id = ' id="ll_ad_' . $block['id'] . ' "';
}

$block_classes = [ 'llad' ];
if ( ! empty( $block['className'] ) ) {
	$block_classes = array_merge( $block_classes, explode( ' ', $block['className'] ) );
}

// Load values and assign defaults.
$ad_image			= get_field( 'll_ad_image' );
$ad_link			= get_field( 'll_ad_link' );
$ad_text 			= get_field( 'll_ad_text' ) ?: 'Text';
$ad_button_text		= get_field( 'll_ad_button_text' ) ?: 'Details';
$ad_width			= get_field( 'll_ad_width' );
if ( $ad_width === true ) {
	$ad_width_classes = 'full-bleed';
} else {
	$ad_width_classes = 'rounded-none  |  sm:rounded-md md:rounded-lg lg:mx-auto';
}
$ad_extra_classes	= get_field( 'll_ad_extra_classes' );

// Default style is CLEAR!
?>


<section <?php echo $block_id; ?> class="<?php echo implode( ' ', $block_classes); ?>  |  not-prose group text-white bg-center bg-cover bg-blend-multiply  |  <?php echo esc_attr( $ad_width_classes ); ?> <?php echo esc_attr( $ad_extra_classes ); ?>" style="background-image: url('<?php echo esc_url( $ad_image ); ?>')">

	<?php if ( ! $is_preview ) {
		echo '<a class="" href="' . esc_url( $ad_link ) . '">';
	} ?>

		<div class="container px-5 py-16 mx-auto">
			<div class="flex flex-col items-start mx-auto  |  sm:flex-row sm:items-center lg:w-fit">
				<span class="grow text-white leading-snug  |  sm:pr-16"><?php echo $ad_text; ?></span>
				<div class="shrink-0 px-8 py-2 mt-10 text-sm font-bold text-white uppercase duration-500 ease-in-out bg-transparent border-2 border-white border-solid rounded-tl-2xl rounded-br-2xl transition-color  |  focus:outline-hidden group-hover:bg-white group-hover:text-gray-800 sm:mt-0"><?php echo $ad_button_text; ?></div>
			</div>
		</div>

	<?php if ( ! $is_preview ) {
		echo '</a>';
	} ?>

</section>
