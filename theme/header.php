<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Load_Lifter
 */


$new_nav = false;


?><!doctype html>
<html <?php language_attributes(); ?> class="scroll-container">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class( ' overflow-x-hidden  |  dark:bg-neutral-900' ); ?>>

<?php wp_body_open(); ?>

<?php // get_template_part( 'template-parts/svg/fa', 'symbols' ); ?>

<?php // get_sidebar( 'prehead' ); ?>

<div id="page">
	<a href="#primary" class="sr-only"><?php esc_html_e( 'Skip to content', 'loadlifter' ); ?></a>

	<?php
	/**
	 * if the Markdown Alternate plugin is active AND the currently viewed item is in
	 * the list of post types below, output a visually hidden notice indicating that
	 * there is a Markdown version of this url available optimized for AI/LLM tools.
	 */
	if ( ( is_plugin_active( 'markdown-alternate-main/markdown-alternate.php' ) ) && in_array( get_post_type(), ['page', 'post', 'people', 'locations'], true ) ) {
		$curr = get_permalink();
		$md_url = untrailingslashit( $curr ) . '.md';
		echo '<div class="sr-only" aria-hidden="true">A Markdown version of this page is available at ' . esc_url( $md_url ) . ' &mdash; optimized for AI and LLM tools.</div>';
	}
	?>

	<?php if ( is_page_template( LL_LP_TEMPLATES ) ) {
    get_template_part( 'template-parts/layout/header', 'lp');
	} elseif ( is_page_template( 'tpl-press-release-post.php' ) ) {
		get_template_part( 'template-parts/layout/header', 'permadark' );
	} else {
		if ( ll_is_local_environment() && ( $new_nav == true ) ) {
			get_template_part( 'template-parts/layout/header', 'deeper' );
		} else {
			get_template_part( 'template-parts/layout/header', 'simple' );
		}
	} ?>
