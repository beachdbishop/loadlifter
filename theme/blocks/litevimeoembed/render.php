<?php
/**
 * Lite Vimeo Embed
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


$video_id = get_field( 'll_litevimeo_id' );
$inline_styles = get_field( 'll_litevimeo_styles' );


$block_id = '';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = ' id="ll_litevimeo_' . $block['id'] . ' ' . sanitize_title( $block['anchor'] ) . '"';
} else {
	$block_id = ' id="ll_litevimeo_' . $block['id'] . ' "';
}
?>

<lite-vimeo
	id="<?php echo esc_attr( $block_id ); ?>"
	videoid="<?php echo esc_attr( $video_id ); ?>"
	style="<?php echo esc_attr( $inline_styles ); ?>"
></lite-vimeo>
