<?php
/**
 * LL Lite Video Embed block template.
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

$video = get_field( 'll_lve_video' );
$video_h = get_field( 'll_lve_videoheight' );
$video_w = get_field( 'll_lve_videowidth' );
$video_t = get_field( 'll_lve_videotitle' );
$image = get_field( 'll_lve_image' );
if ( $image ) {
	// Image variables.
	$image_url = $image['url'];
	$image_title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// Thumbnail size attributes.
	$size = 'large';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];

}


$block_id = '';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = sanitize_title( $block['anchor'] );
} else {
	$block_id = 'll_lve_' . $block['id'];
}

$classes = [ 'll-litevideoembed  bg-orient-950' ];
if ( ! empty( $block['className'] ) ) {
  $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}
?>


<?php if ( ! $is_preview ) { ?>
<div
	<?php
	echo get_block_wrapper_attributes(
		[
			'id' => $block_id,
			'class' => esc_attr( join( ' ', $classes ) )
		]
	); ?>
>
<?php } ?>


	<details class="lite-video-embed relative">
		<summary
			class="video-summary  |  grid grid-cols-3 grid-rows-3 justify-center items-center place-items-center"
			aria-label="Play video: <?php echo $video_t; ?>"
		>

			<!-- img src="https://beachfleischman.com/wp-content/uploads/2026/10/beachfleischman_cybersecurity_powered_by_silent_sector_v1-720p_0s.jpg" alt="Colleages reviewing code on several computer screens" class="video-thumbnail  |  relative z-1 w-full h-auto block col-span-full row-span-full aspect-video" -->
			<?php echo wp_get_attachment_image( $image, 'full' ); ?>

			<svg class="video-playicon  |  z-1 fill-white size-[clamp(4rem, 5vw, 8rem)] drop-shadow-md" data-id="icon-play-filled" viewBox="0 0 32 32" data-icontype="filled" aria-hidden="true" focusable="false"><path d="m11.167 5.608 16.278 8.47a2.169 2.169 0 0 1 .011 3.838l-.012.006-16.278 8.47a2.167 2.167 0 0 1-3.167-1.922V7.529a2.167 2.167 0 0 1 3.047-1.981l-.014-.005.134.065z"></path></svg>
		</summary>

		<div class="video-content  |  absolute top-0 left-0 bottom-0 right-0 aspect-video">
			<iframe
				width=<?php echo $video_w; ?>
				height=<?php echo $video_h; ?>
				src=<?php echo $video; ?>
				title=<?php echo $video_t; ?>

				class="w-full! h-full! aspect-video"
				frameborder="0"
				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
				autoplay="true"
				referrerpolicy="strict-origin-when-cross-origin"
				allowfullscreen
				loading="lazy"
			></iframe>
		</div>
	</details>


<?php if ( ! $is_preview ) { ?>
</div>
<?php } ?>
