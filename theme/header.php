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

$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

?><!doctype html>
<html <?php language_attributes(); ?> class="scroll-container">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="profile" href="https://gmpg.org/xfn/11"> -->
    <?php if ( $featured_image ) {
        echo '<style>:root { --ll--page-feat-img: url(\'' . $featured_image[0] . '\'); }</style>';
    } ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class( ' overflow-x-hidden styled-scrollbars' ); ?>>

<?php wp_body_open(); ?>

<?php // get_template_part( 'template-parts/svg/fa', 'symbols' ); ?>

<?php // get_sidebar( 'prehead' ); ?>

<div id="page">
	<a href="#primary" class="sr-only"><?php esc_html_e( 'Skip to content', 'loadlifter' ); ?></a>

	<?php if ( is_page_template( LL_LP_TEMPLATES ) ) {
        get_template_part( 'template-parts/layout/header', 'lp');
	} else {
		get_template_part( 'template-parts/layout/header', 'content' );
	} ?>
