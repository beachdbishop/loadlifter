<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$icon = get_field( 'icon' );
$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-neutral-100 rounded-2xl group transition duration-300 ease-in-out' ); ?>>

	<div class="card-inner | p-4 bg-center rounded-2xl grayscale group-hover:grayscale-0 group-hover:bg-blend-overlay" style="background-image: url('<?php echo $feat_image_url[0]; ?>'), linear-gradient(to bottom, #737373 0%, #282828 100%)">
		<a class="flex flex-col place-content-between w-[240px] h-auto aspect-square p-4 " href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" rel="bookmark">
			<?php echo '<div class="text-center"><i class="' . $icon . ' fa-2x lg:fa-4x text-white group-hover:animate-bounce" title="' . get_the_title() . '"></i></div>'; ?>
			<?php echo '<div class="items-end text-center"><p class="m-0 font-bold leading-tight text-white font-head">' . get_the_title() . '</p></div>'; ?>
		</a>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
