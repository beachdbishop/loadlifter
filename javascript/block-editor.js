/* global wp */

/**
 * This file is loaded only by the block editor.
 *
 * The JavaScript code you place here will be processed by esbuild, and the
 * output file will be created at `../theme/js/block-editor.min.js` and
 * enqueued in `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

wp.domReady(() => {
	/**
	 * Block editor modifications
	 */

	/* Add any custom modifications between this line and the "stop editing" line. */

	// Add your own block editor modifications here. For example, you could
	// register a block style:
	//
	// wp.blocks.registerBlockStyle( 'core/paragraph', {
	// 	name: 'indent',
	// 	label: 'Indent',
	// } );

	/* That's all, stop editing! */
});
