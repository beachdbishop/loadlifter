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
$back_title	= ( !empty( get_field( 'll_sqcard_backtitle' ) ) ) ? get_field( 'll_sqcard_backtitle' ) : $title;
$icon = get_field( 'll_sqcard_icon' ); /* required */
$url = get_field( 'll_sqcard_url' ); /*  required */
$size = get_field( 'll_sqcard_size' ); /* required, small by default */
$message = get_field( 'll_sqcard_message' );
$message_alignment = ( $val = get_field( 'll_sqcard_message_align' ) ) ? $val : 'center';
$image = get_field( 'll_sqcard_bg_image' );
$bg_markup = '';
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
	$bg_markup = sprintf( 'style="background-image: url(%1$s)" aria-label="%2$s"', $thumb, $alt );
}


$block_id = '';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = sanitize_title( $block['anchor'] );
} else {
	$block_id = 'll_sqcard_' . $block['id'];
}

$classes = [ 'square-card card-item' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

$inner_card_classes = $flip_enabled ? 'flip-yes ' : 'flip-no ';
$inner_card_classes .= $url ? 'card-ic' : '';


if ( ! $is_preview ) {
	echo '<div ' . wp_kses_data( get_block_wrapper_attributes(	[ 'id' => $block_id, 'class' => esc_attr( join( ' ', $classes ) ) ] ) ) . '>';
}
?>


	<div class="<?php echo $inner_card_classes; ?> <?php echo esc_attr( ' sq-' . $size ); ?> group relative inline-block ">
		<div class="card-content shadow-lg shadow-neutral-300 <?php if ( $flip_enabled ) { echo ' transition-transform ease-out duration-700'; } ?>  |  dark:shadow-none">


			<?php
			/*   C A R D   F R O N T   */
			?>
			<div class="card-front">
				<div class="card-icon">
					<span class="fa-stack fa-2x">
						<i class="fa-solid fa-circle fa-stack-2x"></i>
						<i class="<?php echo esc_attr( $icon ); ?> fa-stack-1x "></i>
					</span>
				</div>
				<h3 class="text-xl <?php echo $title_is_long; ?>">
					<?php if ( $url ) { ?>
						<a class="s" href="<?php echo esc_url( $url ); ?>" rel="bookmark">
							<?php echo $title; ?>
						</a>
					<?php } else {
						echo $title;
					} ?>
				</h3>
			</div>


			<?php
			/*   C A R D   B A C K   */
			if ( ( ! $is_preview ) && ( $flip_enabled ) ) {
				?>
				<div class="card-back <?php if ( $image ) { echo 'card-has-bg-img'; } ?> shadow-neutral-900/50" <?php if ( $bg_markup ) { echo $bg_markup; } ?>>
					<h3 class="">
						<?php if ( $url ) { ?>
							<a class="s" href="<?php echo esc_url( $url ); ?>" rel="bookmark">
								<?php echo $back_title; ?>
							</a>
						<?php } else {
							echo $back_title;
						} ?>
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
