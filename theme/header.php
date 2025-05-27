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

	<?php if ( is_page_template( LL_LP_TEMPLATES ) ) {
    get_template_part( 'template-parts/layout/header', 'lp');
	} elseif ( is_page_template( 'tpl-press-release-post.php' ) ) {
		get_template_part( 'template-parts/layout/header', 'permadark' );
	} else {
		get_template_part( 'template-parts/layout/header', 'simple' );
	} ?>
