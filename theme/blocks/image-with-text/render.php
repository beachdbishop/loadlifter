<?php
/**
 * LL Image with Text block template.
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

// Create id attribute allowing for custom "anchor" value.
$block_id = 'll_it_' . $block['id'];
if( !empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$classes = [ 'image-with-text-item group' ];
if ( ! empty( $block['className'] ) ) {
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

$mt_inner_template = array(
	array(
		'core/group',
		array(
			'layout' => array(
				'type' => 'constrained'
			)
		),
		array(
			array(
				'core/heading',
				array(
					'level' => 3
				),
				array()
			),
			array(
				'core/paragraph',
				array(),
				array()
			),

		)
	),
);


$image = get_field( 'll_mt_image' );
if ( $image ) {
	// Image variables.
	$image_url = $image['url'];
	$image_title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// Thumbnail size attributes.
	$size = 'medium_large';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
}
?>


<?php if ( ! $is_preview ) { ?>
<div
	<?php
	echo wp_kses_data(
		get_block_wrapper_attributes(
			array(
				'id'    => $block_id,
				'class' => esc_attr( join( ' ', $classes ) ),
			)
		)
	);
	?>
>
<?php } ?>

	<InnerBlocks
		template="<?php echo esc_attr( json_encode( $mt_inner_template ) ); ?>"
	/>

	<div class="item-img">
		<div
			class="opacity-80 transition-opacity ease-in-out group-hover:opacity-100"
			style="background-image: url(<?php echo esc_attr( $thumb ); ?>)"
			aria-label="<?php echo esc_attr( $alt ); ?>"
		>
			&nbsp;
		</div>
	</div>

<?php if ( ! $is_preview ) { ?>
</div>
<?php } ?>
