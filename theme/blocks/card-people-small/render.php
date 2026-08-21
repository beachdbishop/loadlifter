<?php
/**
 * LL Small Card - Person block template.
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


$person = get_field( 'll_card_person' );
$link = get_permalink( $person->ID );
$name = esc_html( $person->post_title );
$desigs = esc_html( $person->ll_people_designations );
$jobtitle = esc_html( $person->ll_people_title );
$person_feat_img = wp_get_attachment_image_src( get_post_thumbnail_id( $person->ID ), 'full' );
if ( $person_feat_img ) {
	$image = esc_url( $person_feat_img[0] );
} else {
	$image = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
}


$block_id = '';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = sanitize_title( $block['anchor'] );
} else {
	$block_id = 'll_cardpeoplesmall_' . $block['id'];
}

$class_name = 'card-ic group @container';
if ( ! empty( $block['className'] ) ) {
  $class_name .= ' ' . $block['className'];
}
?>


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

	<div class="flex flex-col gap-2 items-center h-full p-4 border rounded-lg bg-white border-neutral-200  |  dark:border-neutral-600 dark:bg-transparent  |  @2xs:flex-row">

		<div class="card-text grow order-1">
			<h3 class="text-xl leading-none  |  <?php if ( get_field( 'll_card_allow_link' ) ) { echo esc_attr( 'group-hover:text-mahogany-700 dark:group-hover:text-mahogany-500' ); } ?> lg:text-2xl">
				<?php
				if ( get_field( 'll_card_allow_link' ) ) {
					echo '<a class="allow-link-' . get_field( 'll_card_allow_link' ) . '" href="' . $link . '" rel="bookmark">' . $name . '</a>';
				} else {
					echo $name;
				}

				if ( get_field( 'll_card_show_desigs' ) && !empty( $desigs ) ) {
					echo ' <small>' . $desigs . '</small>';
				}
				?>
			</h3>
			<p class="text-lg leading-none text-neutral-600 font-head  |  dark:text-neutral-400"><?php echo $jobtitle; ?></p>
		</div>

		<div class="card-img shrink-0 object-cover object-center rounded-full bg-neutral-100 bg-no-repeat bg-position-[center_top]" style="background-image: url(<?php echo $image; ?>); background-size: 64px 86px;">
			<div class="size-16 aspect-square">&nbsp;</div>
		</div>

	</div>

<?php // r( $person ); ?>

<?php if ( ! $is_preview ) { ?>
</div>
<?php } ?>
