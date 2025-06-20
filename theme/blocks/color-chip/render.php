<?php
/**
 * Color Chip.
 *
 * @param	array $block The block settings and attributes.
 * @param	string $content The block inner HTML (empty).
 * @param	bool $is_preview True during backend preview render.
 * @param 	int $post_id The post ID the block is rendering content against.
 * 			This is either the post ID currently being displayed inside a
 * 			query loop, or the post ID of the post hosting this block.
 * @param	array $context The context provided to the block by the post or
 * 			its parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'llcolorchip';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$color_value 			= get_field( 'll_color' );
$color_title			= get_field( 'll_color_title' );
$color_note				= get_field( 'll_color_note' );
$color_in_rgb			= ll_hex_to_rgb( get_field( 'll_color' ) );
?>


<figure <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?>  |  w-34 flex flex-col  border-2 bg-white p-1">
	<figcaption class="text-center font-mono font-normal text-sm order-2  |  ">
		<span><?php echo esc_html( $color_title ); ?></span><br>
		<code class="font-bold uppercase"><?php echo esc_html( $color_value ); ?></code><br>
		<code class="text-xs"><?php echo esc_html( $color_in_rgb ); ?></code><br>
		<?php if ( ! empty( $color_note ) ) : ?>
			<span class="note text-xs"><em><?php echo esc_html( $color_note ); ?></em></span>
		<?php endif; ?>
	</figcaption>
	<div class="aspect-square w-auto mb-1 order-1 rounded-md" style="background-color: <?php echo esc_attr( $color_value ); ?>" role="img"></div>
</figure>
