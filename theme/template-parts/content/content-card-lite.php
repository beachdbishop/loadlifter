<?php
/**
 * Template part for displaying Industry pages only?
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$icon = ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : 'fa-page';
/* wrapper should be: flex flex-wrap -m-2 */
?>

<article <?php post_class( 'card-ic group p-2' ); ?>>
	<div class="flex items-center h-full p-4 border rounded-lg border-neutral-200  |  dark:border-neutral-700 group-hover:border-brand-blue dark:group-hover:text-orient-300 dark:group-hover:border-orient-400">

		<div class="fa-4x leading-none">
			<span class="fa-layers fa-fw">
				<i class="fa-solid fa-circle text-neutral-100  | dark:text-neutral-700 group-hover:text-brand-blue dark:group-hover:text-neutral-700"></i>
				<i class="fa-duotone <?php echo esc_attr( $icon ); ?> group-hover:text-white dark:group-hover:text-orient-400" data-fa-transform="shrink-6"></i>
			</span>
		</div>

		<div class="flex-grow">
			<?php the_title( '<h3 class="text-xl font-head font-semibold uppercase text-neutral-900  |  dark:text-neutral-200"><a class="" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			<!-- <p class="text-sm text-neutral-500">extra detail</p> -->
		</div>

	</div>
</article>
