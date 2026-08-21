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


$block_id = '';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = sanitize_title( $block['anchor'] );
} else {
	$block_id = 'll_imagetitle_' . $block['id'];
}

$classes = [ 'card-ic group grid gap-0 grid-rows-subgrid row-span-2 relative border-transparent border-2 shadow-orient-700  |  focus-within:shadow-lg focus-within:border-neutral-500 dark:border-neutral-700 dark:shadow-orient-500' ];
if ( ! empty( $block['className'] ) ) {
  $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

$mt_inner_template = [
	[
	'core/heading',
		[
			'level' => 3
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

	<InnerBlocks
		class="card-text  |  p-4 order-1 bg-white flex justify-between  |  dark:bg-neutral-900 dark:text-neutral-200 md:px-5!"
		template="<?php echo esc_attr( json_encode( $mt_inner_template ) ); ?>"
	/>

	<div class="card-img  |  bg-neutral-500 relative overflow-hidden">
		<!-- img alt="Two interns sharing an entertaining moment while reviewing information on a tablet" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto/v1762991977/feat__20251112--internships-social2_noqqj9.jpg"  -->
		<img
			src="<?php echo esc_attr( $thumb ); ?>"
			alt="<?php echo esc_attr( $alt ); ?>"
			class="min-h-60 w-full object-cover transition duration-200 ease-in-out  |  group-hover:scale-110"
		>
	</div>

<?php if ( ! $is_preview ) { ?>
</div>
<?php } ?>
