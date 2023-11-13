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

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
  $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'llad';
if ( ! empty( $block['className'] ) ) {
  $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
  $class_name .= ' align' . $block['align'];
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
	$ad_width_classes = 'rounded-none sm:rounded-md md:rounded-lg lg:mx-auto';
}
$ad_extra_classes	= get_field( 'll_ad_extra_classes' );

// Default style is CLEAR!
?>
<section <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?> | not-prose group text-white bg-center bg-cover bg-blend-multiply | <?php echo esc_attr($ad_width_classes); ?> <?php echo esc_attr($ad_extra_classes); ?>" style="background-image: url('<?php echo esc_url($ad_image); ?>')">
	<a href="<?php echo esc_url($ad_link); ?>">
		<div class="container px-5 py-16 mx-auto">
			<div class="flex flex-col items-start mx-auto sm:flex-row sm:items-center lg:w-fit">
				<span class="flex-grow text-white [text-shadow:_1px_0_10px_rgb(0_0_0_/_70%)] sm:pr-16 leading-snug"><?php echo $ad_text; ?></span>
				<div class="flex-shrink-0 px-8 py-2 mt-10 text-sm font-bold text-white uppercase duration-500 ease-in-out bg-transparent border border-white border-solid rounded-tl-2xl rounded-br-2xl transition-color focus:outline-none group-hover:bg-white group-hover:text-gray-800 sm:mt-0"><?php echo $ad_button_text; ?></div>
			</div>
		</div>
	</a>
</section>
