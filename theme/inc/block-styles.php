<?php
/**
 * Block styles, yo
 */

add_action( 'init', function() {

	register_block_style( 'core/button', [
		'name' 			=> 'papercorners',
		'label' 		=> __( 'Papercorners', 'loadlifter' ),
		'is_default'	=> false,
	] );

	register_block_style( 'core/separator', [
		'name'	=> 'sep-blue',
		'label'	=> __( 'Double Line Blue', 'loadlifter' ),
	] );

	register_block_style( 'core/separator', [
		'name'	=> 'sep-red',
		'label'	=> __( 'Double Line Red', 'loadlifter' ),
	] );

	register_block_style( 'core/separator', [
		'name'	=> 'sep-gray',
		'label'	=> __( 'Double Line Gray', 'loadlifter' ),
	] );

    register_block_style( 'core/list', [
        'name'  => 'list-none',
        'label' => __( 'No bullets', 'loadlifter' ),
    ] );

	register_block_style( 'core/list', [
		'name'	=> 'list-square',
		'label'	=> __( 'Square bullets', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'	=> 'circle',
		'label'	=> __( 'Circle', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'	=> 'circle-red',
		'label'	=> __( 'Circle Red', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'	=> 'circle-blue',
		'label'	=> __( 'Circle Blue', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'	=> 'split-circle',
		'label'	=> __( 'Split Circle', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'	=> 'split-circle-red',
		'label'	=> __( 'Split Circle Red', 'loadlifter' ),
	] );

	register_block_style( 'core/list', [
		'name'	=> 'split-circle-blue',
		'label'	=> __( 'Split Circle Blue', 'loadlifter' ),
	] );

	register_block_style( 'core/quote', [
		'name'	=> 'fancy-quote',
		'label'	=> __( 'Fancy Quote', 'loadlifter' ),
	] );

});
