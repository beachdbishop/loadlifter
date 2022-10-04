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
</head>

<body <?php body_class( 'bg-fixed bg-gradient-to-t from-indigo-500 via-brand-red to-brand-red-dark overflow-x-hidden styled-scrollbars' ); ?>>

<?php wp_body_open(); ?>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
	<!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
	<symbol id="bars" viewBox="0 0 448 512" fill="currentColor"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></symbol>

	<symbol id="caret-down" viewBox="0 0 320 512" fill="currentColor"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></symbol>

	<symbol id="angle-down" viewBox="0 0 448 512" fill="currentColor"><path d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></symbol>
</svg>

<?php get_sidebar( 'prehead' ); ?>

<div id="page" class="">
	<a href="#primary" class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'loadlifter' ); ?></a>

	<?php if ( ! is_page_template( 'tpl-landing-page.php' ) ) {
		// get_template_part( 'template-parts/layout/header', 'content' );
		// get_template_part( 'template-parts/layout/header-alt', 'content' );
		// get_template_part( 'template-parts/layout/header-kp', 'content' );
		get_template_part( 'template-parts/layout/header-simple', 'content' );
	} else {
		get_template_part( 'template-parts/layout/header', 'lp' );
	} ?>
