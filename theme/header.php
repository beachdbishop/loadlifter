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
	<!-- <link rel="profile" href="https://gmpg.org/xfn/11"> -->
	<?php wp_head(); ?>

	<?php if ( get_field( 'll_postpage_css' ) ) {
		the_field( 'll_postpage_css' );
	} ?>
</head>

<body <?php
    // body_class( 'bg-fixed bg-gradient-to-t from-brand-red-pale via-brand-red to-brand-red-dark overflow-x-hidden styled-scrollbars' );
    body_class( ' overflow-x-hidden styled-scrollbars' );
?>>

<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/svg/fa', 'symbols' ); ?>

<?php // get_sidebar( 'prehead' ); ?>

<div id="page" class="">
	<a href="#primary" class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'loadlifter' ); ?></a>

	<?php if ( ( !is_page_template( 'tpl-landing-page.php' ) ) && ( !is_page_template( 'tpl-landing-page-bare.php' ) ) ) {
        get_template_part( 'template-parts/layout/header-lessleaf', 'content');
	} else {
		get_template_part( 'template-parts/layout/header', 'lp' );
	} ?>
