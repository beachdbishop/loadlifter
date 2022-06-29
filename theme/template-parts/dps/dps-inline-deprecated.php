<?php
/**
 * Inline list partial
 *
 * @package
 * @author Daniel Bishop <dbishop@beachfleischman.com>
 * @since 	1.0.2
 * @license GPL-2.0+
 */

 echo '<span class="inline ">';
	echo '<a href="' . get_permalink() . '">';
		echo get_the_title();
	echo '</a>';
 echo '</span>';
