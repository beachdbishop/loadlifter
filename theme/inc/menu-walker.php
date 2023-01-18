<?php

/*
<nav class="flex flex-col mt-4 space-y-2 text-sm ">
	<a class="hover:text-brand-blue-pale" href="/assurance/"> Audited Financial Statements </a>
	<a class="hover:text-brand-blue-pale" href="/tax/"> Reviewed Financial Statements </a>
	<a class="hover:text-brand-blue-pale" href="/soar/"> Compiled Financial Statements </a>
	<a class="hover:text-brand-blue-pale" href="/soar/"> Employee Benefit Plan Audits </a>
</nav>
*/
class LL_Menu_Walker extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth = 0, $args = \null, $id = 0) {
		$output .= "<li class='" . implode( " ", $item->classes ) . "'>";

		if ( $item->url && $item->url != '#' ) {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<span>';
		}

		$output .= $item->title;

		if ( $item->url && $item->url != '#' ) {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
	}

}
