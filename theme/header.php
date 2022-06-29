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

<body <?php body_class( 'bg-neutral-800 overflow-x-hidden ' ); ?>>

<?php wp_body_open(); ?>

<?php get_sidebar( 'prehead' ); ?>

<div id="page" class="bg-white">
	<a href="#primary" class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'loadlifter' ); ?></a>

	<?php get_template_part( 'template-parts/layout/header', 'content' ); ?>
