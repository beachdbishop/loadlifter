<?php
/**
 * The sidebar containing the prehead widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Load_Lifter
 */
if ( ! is_active_sidebar( 'sidebar-prehead' ) ) {
	return;
} else {
	echo '<div class="ll__widget-area print:hidden">';
	dynamic_sidebar( 'sidebar-prehead' );
	echo '</div>';
}
