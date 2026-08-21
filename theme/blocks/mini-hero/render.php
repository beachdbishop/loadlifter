<?php
/**
 * LL Mini Hero block template.
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


$image = get_field( 'll_mh_image' );
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
	$block_id = 'll_minihero_' . $block['id'];
}

$classes = [ 'll-mini-hero bg-orient-950' ];
if ( ! empty( $block['className'] ) ) {
  $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

$mt_inner_template = [
	[	'core/heading',
		[
			'level' => 3,
			'placeholder' => 'Title',
		],
		[]
	],
	['core/paragraph',
		[
			'placeholder' => 'Your text blurb for your mini hero. Note, this paragraph will be hidden on mobile.',
			'className' => 'hidden max-w-lg  |  md:block md:text-base md:leading-relaxed',
		],
		[]
	],
	['core/paragraph',
		[
			'placeholder' => 'Learn more about ...add your link in this paragraph.',
		],
		[]
	],
];
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

	<div
		class="overflow-hidden bg-cover bg-center bg-no-repeat text-neutral-100"
		style="background-image: url(<?php echo esc_attr( $image_url ); ?>)"
	>
		<div class="p-8 bg-linear-to-r from-orient-950 via-orient-950/80 to-orient-950/40  |  md:p-12 lg:px-26 lg:py-24">

		<InnerBlocks
				class="space-y-4 text-center  |  sm:text-left md:text-shadow-md md:text-shadow-orient-950/80"
				template="<?php echo esc_attr( json_encode( $mt_inner_template ) ); ?>"
			/>

		</div>
	</div>

<?php if ( ! $is_preview ) { ?>
</div>
<?php } ?>
