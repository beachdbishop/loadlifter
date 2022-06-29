<?php
/**
 * The sidebar containing the prefooter widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Load_Lifter
 */
if ( ! is_active_sidebar( 'sidebar-prefoot' ) ) {
	return;
} else {
	echo '<div class="ll__widget-area print:hidden">';
	dynamic_sidebar( 'sidebar-prefoot' );
	echo '</div>';
}
