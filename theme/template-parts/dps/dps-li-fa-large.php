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

echo '<li class="text-center">';
	echo '<a href="' . get_permalink() . '" class="">';
		echo '<div class="block"><i class="' . $icon . ' w-[72px] h-[72px]"></i></div> ';
	echo '</a>';
	echo '<h5 class="mt-2 leading-tight text-center ">' . get_the_title() . '</h5>';
echo '</li>';
