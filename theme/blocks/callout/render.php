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

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'llcallout';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$callout_title 			= get_field( 'll_callout_title' );
$callout_icon			= get_field( 'll_callout_icon' );
$callout_body			= get_field( 'll_callout_body' ); // inner blocks?

$inner_template = [
    [ 'core/paragraph', [ 'content' => 'Elaborate on your callout' ] ],
];
?>


<div <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?> | not-prose bg-white shadow-md dark:bg-neutral-800">
    <p class="llcallout-title">
        <?php if( !empty( $callout_icon ) ): ?>
            <i class="<?php echo esc_attr( $callout_icon ); ?>"></i>
        <?php endif; ?>
        <?php echo esc_html( $callout_title ); ?>
    </p>
    <InnerBlocks
        template="<?php echo esc_attr( wp_json_encode( $inner_template ) ); ?>"
    />
</div>

