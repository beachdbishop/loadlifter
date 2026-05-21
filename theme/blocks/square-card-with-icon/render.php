<?php
/**
 * LL Square Card with Icon block template.
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


$flip_enabled	= get_field( 'll_sqcard_flip_enabled' ); /* required, true by default */
$title = get_field( 'll_sqcard_title' ); /* required */
$title_is_long = ( ( iconv_strlen( $title, 'UTF-8' ) > 30 ) ? 'text-lg' : '' );
$icon = get_field( 'll_sqcard_icon' ); /* required */
$url = get_field( 'll_sqcard_url' ); /*  required */
$size = get_field( 'll_sqcard_size' ); /* required, small by default */
$message = get_field( 'll_sqcard_message' );
$message_alignment = ( $val = get_field( 'll_sqcard_message_align' ) ) ? $val : 'center';
$image = get_field( 'll_sqcard_bg_image' );
if ( $image ) {
	// Image variables.
	$image_url = $image['url'];
	$image_title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];
	// Thumbnail size attributes.
	$isize = 'medium_large';
	$thumb = $image['sizes'][ $isize ];
	$width = $image['sizes'][ $isize . '-width' ];
	$height = $image['sizes'][ $isize . '-height' ];
}


// Create id attribute allowing for custom "anchor" value.
$block_id = 'll_sqcard_' . $block['id'];
if( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$classes = [ 'square-card card-item' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

$inner_card_classes = $flip_enabled ? 'flip-yes' : 'flip-no';


if ( ! $is_preview ) {
	echo '<div ' . wp_kses_data( get_block_wrapper_attributes(	[ 'id'    => $block_id, 'class' => esc_attr( join( ' ', $classes ) ) ] ) ) . '>';
}
?>


	<div class="<?php echo $inner_card_classes; ?> <?php echo esc_attr( ' sq-' . $size ); ?> card-ic group relative inline-block ">
		<div class="card-content shadow-lg shadow-neutral-300 <?php if ( $flip_enabled ) { echo ' transition-transform ease-out duration-700'; } ?>  |  dark:shadow-none">


			<?php
				/*   C A R D   F R O N T   */
			?>
			<div class="card-front">
				<div class="card-icon">
					<span class="fa-stack fa-2x">
						<i class="text-white fa-solid fa-circle fa-stack-2x  |  dark:text-neutral-900"></i>
						<i class="<?php echo esc_attr( $icon ); ?> fa-stack-1x "></i>
					</span>
				</div>
				<h3 class="text-xl <?php echo $title_is_long; ?>">
					<a class="s" href="<?php echo esc_url( $url ); ?>" rel="bookmark">
						<?php echo $title; ?>
					</a>
				</h3>
			</div>


			<?php
				/*   C A R D   B A C K   */
				if ( $flip_enabled ) {
					?>
					<div class="card-back  |  shadow-neutral-900/50" style="background-image: url('<?php echo esc_attr( $thumb ); ?>')" aria-label="<?php echo esc_attr( $alt ); ?>'">
						<h3 class="">
							<a class="s" href="<?php echo esc_url( $url ); ?>" rel="bookmark">
								<?php echo $title; ?>
							</a>
						</h3>
						<p class="<?php echo esc_attr( 'text-' . $message_alignment ); ?>">
							<?php echo $message; ?>
						</p>
					</div>
					<?php
				}
			?>


		</div>
	</div>

<?php
if ( ! $is_preview ) {
	echo '</div>';
}
?>
