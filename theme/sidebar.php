<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Load_Lifter
 */

?>
<!-- <div id="secondary" class="ll__widget-area | p-4 text-sm bg-brand-blue-faint mb-4 md:mb-8 md:mt-4 print:hidden">
	sidebar...
</div>#secondary -->
<p class="todo">The form below should conditionally be the Construction Newsletter signup on Construction-cat'd posts... then the normal one for everything else.</p>
<?php
get_template_part( 'template-parts/form/form-hubspot-newsletter', 'onlight' );
