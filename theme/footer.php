<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Load_Lifter
 */

if ( is_page_template( LL_LP_TEMPLATES ) ) {
	get_template_part( 'template-parts/layout/footer', 'lp');
} else {

	if ( wp_get_environment_type() == 'local' ) {
		// get_template_part( 'template-parts/layout/footer', 'content' );
		// get_template_part( 'template-parts/layout/footer', 'noaddresses' );
		get_template_part( 'template-parts/layout/footer', 'noaddress2' );
	} else {
		get_template_part( 'template-parts/layout/footer', 'content' );
	}

}
?>

</div>

<?php wp_footer(); ?>

</body>
</html>
