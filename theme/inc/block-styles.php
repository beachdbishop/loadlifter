<?php
/**
 * Block styles, yo
 */

add_action( 'init', function() {

	register_block_style( 'core/paragraph', [
		'name'				=> 'note-info',
		'label'				=> __( 'Info Note', 'loadlifter' ),
	] );

	register_block_style( 'core/paragraph', [
		'name'				=> 'note-success',
		'label'				=> __( 'Success Note', 'loadlifter' ),
	] );

	register_block_style( 'core/paragraph', [
		'name'				=> 'note-warning',
		'label'				=> __( 'Warning Note', 'loadlifter' ),
	] );

	register_block_style( 'core/paragraph', [
		'name'				=> 'note-error',
		'label'				=> __( 'Error Note', 'loadlifter' ),
	] );

	register_block_style( 'core/button', [
		'name' 				=> 'papercorners',
		'label' 			=> __( 'Papercorners', 'loadlifter' ),
		'is_default'	=> false,
	] );

	register_block_style( 'core/separator', [
		'name'				=> 'sep-blue',
		'label'				=> __( 'Double Line Blue', 'loadlifter' ),
	] );

	register_block_style( 'core/separator', [
		'name'				=> 'sep-red',
		'label'				=> __( 'Double Line Red', 'loadlifter' ),
	] );

	register_block_style( 'core/separator', [
		'name'				=> 'sep-gray',
		'label'				=> __( 'Double Line Gray', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'  			=> 'list-none',
		'label' 			=> __( 'No bullets', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'				=> 'list-square',
		'label'				=> __( 'Square bullets', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'				=> 'list-columns-2',
		'label'				=> __( '2 Columns', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'				=> 'list-multicolumn',
		'label'				=> __( 'Multiple Columns', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name' 				=> 'list-divide-light',
		'label' 			=> __( 'Light Border Between Items' ),
	] );

	register_block_style( 'core/list', [
		'name' 				=> 'list-divide-gray',
		'label' 			=> __( 'Gray Border Between Items' ),
	] );

	register_block_style( 'core/list', [
		'name' 				=> 'list-divide-red',
		'label' 			=> __( 'Red Border Between Items' ),
	] );

	register_block_style( 'core/list', [
		'name' 				=> 'list-divide-blue',
		'label' 			=> __( 'Blue Border Between Items' ),
	] );

	register_block_style( 'core/list', [
		'name'				=> 'circle',
		'label'				=> __( 'Circle', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'				=> 'circle-red',
		'label'				=> __( 'Circle Red', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'				=> 'circle-blue',
		'label'				=> __( 'Circle Blue', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'				=> 'split-circle',
		'label'				=> __( 'Split Circle', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'				=> 'split-circle-red',
		'label'				=> __( 'Split Circle Red', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'				=> 'split-circle-blue',
		'label'				=> __( 'Split Circle Blue', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'				=> 'boxed',
		'label'				=> __( 'Boxed', 'loadlifter' ),
	] );

	register_block_style( 'core/spacer', [
		'name'				=> 'xs',
		'label'				=> __( 'XS', 'loadlifter' ),
	] );

	register_block_style( 'core/spacer', [
		'name'				=> 'sm',
		'label'				=> __( 'S', 'loadlifter' ),
	] );

	register_block_style( 'core/spacer', [
		'name'				=> 'md',
		'label'				=> __( 'M', 'loadlifter' ),
	] );

	register_block_style( 'core/spacer', [
		'name'				=> 'lg',
		'label'				=> __( 'L', 'loadlifter' ),
	] );

	register_block_style( 'core/spacer', [
		'name'				=> 'xl',
		'label'				=> __( 'XL', 'loadlifter' ),
	] );

});
