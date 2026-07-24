<?php
/**
 * LL Slide - Person block template.
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


$person = get_field( 'll_slide_person' );
$link = get_permalink( $person->ID );
$name = esc_html( $person->post_title );
$desigs = esc_html( $person->ll_people_designations );
$jobtitle = esc_html( $person->ll_people_title );
$person_feat_img = wp_get_attachment_image_src( get_post_thumbnail_id( $person->ID ), 'full' );
$image = esc_url( $person_feat_img[0] );
$level = esc_attr( $person->ll_people_level );


$block_id = '';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = sanitize_title( $block['anchor'] );
} else {
	$block_id = 'll_icontext_' . $block['id'];
}

$class_name = 'slide-person';
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

<article
	class="slide  |  static aspect-3/5 group bg-no-repeat bg-center bg-cover bg-brand-red-faint shadow-lg shadow-neutral-400/50 cursor-pointer flex flex-col  |  dark:shadow-none"
	style="background-image: url('<?php echo $image; ?>')"
	onclick="window.location = '<?php echo $link; ?>';"
>
	<div class="seethru  |  grow bg-transparent">&nbsp;</div>
	<div class="slide-info  |  not-prose shrink-0 h-2/5 bg-white px-6 py-2 z-10  |  dark:bg-neutral-800">
		<header>
			<?php
			$title_classes = ( $level === '500' ) ? 'group-hover:text-brand-gray-dark' :
			'group-hover:text-brand-red';
			echo sprintf( '<h3 class="font-head text-2xl leading-none text-center %1$s">%2$s</h3>', $title_classes, $name );
			?>
		</header>

		<?php
		// Only show designations for non-subsidiary entries
		if ( ( $level != 800 ) && ( $desigs ) ) {
			echo sprintf( '<p class="my-1 italic font-bold leading-none tracking-tighter text-center font-head text-neutral-600 dark:text-neutral-400">%1$s</p>', $desigs );
		}
		if( $jobtitle ) {
			echo sprintf( '<p class="leading-none text-center font-head">%1$s</p>', $jobtitle );
		}
		?>
	</div>
</article>

<?php // r( $person ); ?>

<?php if ( ! $is_preview ) { ?>
</div>
<?php } ?>
