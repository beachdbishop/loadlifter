<?php
/**
 * Inline list partial
 *
 * @package
 * @author Daniel Bishop <dbishop@beachfleischman.com>
 * @since 	1.0.2
 * @license GPL-2.0+
 */

$icon = get_field( 'icon' );

echo '<li class="">';
	echo '<a href="' . get_permalink() . '">';
		echo '<i class="' . $icon . ' fa-fw"></i> ';
		echo get_the_title();
	echo '</a>';
echo '</li>';
