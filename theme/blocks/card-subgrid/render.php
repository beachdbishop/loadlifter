<?php
/**
 * LL Card with Subgrid block template.
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


add_filter( 'acf/blocks/wrap_frontend_innerblocks', '__return_false' );


$inner_blocks_template = [
	[
		'core/image',
		[
			'sizeSlug' => 'large'
		],
		[]
	],
	[
		'core/paragraph',
		[],
		[]
	],
	[
		'core/buttons',
		[],
		[
			[
				'core/button',
				[],
				[]
			],
		]
	]
];


$block_id = '';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = sanitize_title( $block['anchor'] );
} else {
	$block_id = 'll_sqcard_' . $block['id'];
}

$classes = [ 'prose p-2 grid grid-rows-subgrid row-span-3 gap-y-6  |  md:p-0 lg:gap-y-8' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}


if ( ! $is_preview ) {
	echo '<div ' . wp_kses_data( get_block_wrapper_attributes(	[ 'id' => $block_id, 'class' => esc_attr( join( ' ', $classes ) ) ] ) ) . '>';
}
?>

<InnerBlocks template="<?php echo esc_attr( wp_json_encode( $inner_blocks_template ) ); ?>" />

<?php
if ( ! $is_preview ) {
	echo '</div>';
}
?>
