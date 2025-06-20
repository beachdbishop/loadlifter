<?php
/**
 * Title: Theme Colors
 * Slug: loadlifter/theme-colors
 * Categories: dev
 * Description: Display color chips for all colors available in this theme.
 * Keywords: color, theme, colors
 * Block Types: core/group, loadlifter/color-chip
 *
 * @package loadlifter
 * @since 3.3.6
 */

$colors = [
	[
		'name'  => 'Mahogany 50',
		'value' => '#fef2f3',
	],
	[
		'name'  => 'Mahogany 100',
		'value' => '#ffe1e4',
	],
	[
		'name'  => 'Mahogany 200',
		'value' => '#ffc8ce',
	],
	[
		'name'  => 'Mahogany 300',
		'value' => '#ffa2ad',
	],
	[
		'name'  => 'Mahogany 400',
		'value' => '#fd6c7d',
	],
	[
		'name'  => 'Mahogany 500',
		'value' => '#f53e53',
	],
	[
		'name'  => 'Mahogany 600',
		'value' => '#e31f36',
	],
	[
		'name'  => 'Mahogany 700',
		'value' => '#ce182d',
	],
	[
		'name'  => 'Mahogany 800',
		'value' => '#940418',
	],
	[
		'name'  => 'Mahogany 900',
		'value' => '#831925',
	],
	[
		'name'  => 'Mahogany 950',
		'value' => '#650b15',
	],
];
?>
<!-- wp:group {"className":"ll-color-chips","layout":{"type":"default"}} -->
<div class="wp-block-group ll-color-chips">
<?php foreach( $colors as $color ) : ?>
	<!-- wp:loadlifter/color-chip {
		"name":"loadlifter/color-chip",
		"data":{
			"ll_color":"<?php echo esc_attr( $color['value'] ); ?>",
			"ll_color_title":"<?php echo esc_attr( $color['name'] ); ?>",
		},
		"mode":"auto"} /-->
<?php endforeach; ?>
</div>
<!-- /wp:group -->
