<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$icon = get_field( 'll_page_icon' );
$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
?>

<article <?php post_class( 'bg-neutral-100 rounded-2xl group' ); ?> data-tilt data-tilt-reverse="true">

	<div class="card-inner | p-4 bg-center rounded-2xl bg-blend-multiply" style="background-image: url('<?php echo $feat_image_url[0]; ?>'), linear-gradient(to bottom, #a3a3a3 0%, #282828 100%)">
		<a class="flex flex-col justify-center w-[240px] h-auto aspect-square p-4 no-underline" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" rel="bookmark">
			<?php echo '<div class="text-center"><i class="fa-regular ' . $icon . ' fa-3x lg:fa-6x text-white/60  transition-colors duration-200 ease-in-out group-hover:text-brand-blue-pale" title="' . get_the_title() . '"></i></div>'; ?>
			<?php echo '<div class="items-end text-center"><p class="m-0 text-2xl font-bold leading-tight transition-colors duration-200 ease-in-out text-white/80 group-hover:text-white font-head">' . get_the_title() . '</p></div>'; ?>
		</a>
	</div>

</article>
