<?php
/**
 * Callout Template.
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


// Load values and assign defaults.
$callout_title 		= get_field( 'll_callout_title' );
$callout_icon			= get_field( 'll_callout_icon' );
$callout_body			= get_field( 'll_callout_body' ); // inner blocks?

$inner_template = [
  [ 'core/paragraph', [ 'content' => 'Elaborate on your callout' ] ],
];


$block_id = '';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = ' id="ll_sqcard_' . $block['id'] . ' ' . sanitize_title( $block['anchor'] ) . '"';
} else {
	$block_id = ' id="ll_sqcard_' . $block['id'] . ' "';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'llcallout';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
?>


<div <?php echo $block_id; ?> class="<?php echo esc_attr($class_name); ?>  |  not-prose border-2 rounded-br-2xl shadow-md">
	<p class="llcallout-title  |  px-5 py-2 font-semibold">
		<?php if( !empty( $callout_icon ) ): ?>
			<i class="<?php echo esc_attr( $callout_icon ); ?> mr-1"></i>
		<?php endif; ?>
		<?php echo esc_html( $callout_title ); ?>
	</p>

	<InnerBlocks template="<?php echo esc_attr( wp_json_encode( $inner_template ) ); ?>" />

</div>

