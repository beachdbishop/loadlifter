<?php
/**
 * LL Slides - People block template.
 *
 * @param			array $block The block settings and attributes
 * @param			string $content The block inner HTML (empty).
 * @param			bool $is_preview True during backend preview render.
 * @param 		int $post_id The post ID the block is rendering content against.
 * 						This is either the post ID currently being displayed inside a
 * 						query loop, or the post ID of the post hosting this block.
 * @param			array $context The context provided to the block by the post or
 * 						its parent block.
 */


add_filter('acf/blocks/wrap_frontend_innerblocks', '__return_false');


$block_id = '';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = sanitize_title( $block['anchor'] );
} else {
	$block_id = 'll_slides_' . $block['id'];
}

$class_name = 'slider slider-people';
if ( ! empty( $block['className'] ) ) {
  $class_name .= ' ' . $block['className'];
}
?>

<?php if ( $is_preview ) {
	echo '<div class="ll-note-admin"><p><span class="dashicons dashicons-info"></span> <strong>Note</strong>: Only 1 set of slides may be added to a page/post.</p></div>';
} ?>
<?php if ( ! $is_preview ) { ?>
<div
	<?php
	echo wp_kses_data(
		get_block_wrapper_attributes(
			array(
				'id'    => $block_id,
				'class' => esc_attr( $class_name ),
			)
		)
	);
	?>
>
<?php } ?>

	<InnerBlocks />

<?php if ( ! $is_preview ) {
	echo '</div>';

	wp_add_inline_script(
		'a11y-slider',
		"const slider = new A11YSlider(document.querySelector('.slider-people'), {
			arrows: false,
			autoplay: true,
			autoplaySpeed: 5000,
			dots: true
		});
		console.log('People Slider enabled.');"
	);
}
?>
