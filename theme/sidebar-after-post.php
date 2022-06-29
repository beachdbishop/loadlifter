<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Load_Lifter
 */
if ( ! is_active_sidebar( 'sidebar-after-post' ) ) {
	return;
} else {
	?>
	<div id="afterpost" class="ll__widget-area | p-4 text-sm md:mt-4 print:hidden">
		<?php dynamic_sidebar( 'sidebar-after-post' ); ?>
	</div><!-- #secondary -->
	<?php
}
