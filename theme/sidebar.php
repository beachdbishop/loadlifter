<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Load_Lifter
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} else {
	?>
	<div id="secondary" class="ll__widget-area | p-4 text-sm bg-brand-blue-faint mb-4 md:mb-8 md:mt-4 print:hidden">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
	<?php

	get_template_part( 'template-parts/form/form-hubspot-newsletter', 'onlight' );
}
