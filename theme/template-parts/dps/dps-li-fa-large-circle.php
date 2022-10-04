<?php
/**
 * Inline list partial
 *
 * @package
 * @author Daniel Bishop <dbishop@beachfleischman.com>
 * @since 	1.0.2
 * @license GPL-2.0+
 */

$icon = get_field( 'icon_duotone' );

echo '<li class="text-center ">';
	echo '<a href="' . get_permalink() . '" class="">';
		echo '<span class="fa-stack fa-2x"><i class="fa-solid fa-circle fa-stack-2x"></i>
		<i class="' . $icon . ' fa-stack-1x fa-inverse"></i> </span>';
	echo '</a>';
	echo '<a href="' . get_permalink() . '"><h5 class="mt-2 font-bold leading-tight text-center">' . get_the_title() . '</h5></a>';
echo '</li>';
