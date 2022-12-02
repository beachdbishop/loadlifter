<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$icon = ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : 'fa-page';
/* wrapper should be: flex flex-wrap -m-2 */
?>

<article id="item-<?php the_ID(); ?>" <?php post_class( 'group p-2 lg:w-1/3 md:w-1/2 w-full' ); ?>>
	<div class="flex items-center h-full p-4 border rounded-lg border-neutral-200 group-hover:border-brand-blue">

		<a class="flex items-center justify-center flex-shrink-0 w-12 mr-4 rounded-full aspect-square bg-neutral-100 text-neutral-500 group-hover:bg-brand-blue group-hover:text-brand-blue-faint" href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa-duotone <?php echo esc_attr( $icon ); ?>"></i></a>

		<div class="flex-grow">
			<?php the_title( '<h6 class="font-bold leading-tight text-neutral-900 font-head"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h6>' ); ?>
			<!-- <p class="text-sm text-neutral-500">extra detail</p> -->
		</div>

	</div>
</article><!-- #item-<?php the_ID(); ?> -->
