<?php

// SEO Footer Shortcode --> [seo_about /]
function ll_seo_about_shortcode() {
	$acfout = get_field( 'seo_footer_text', 'option' );
	ob_start();

	echo $acfout;

	return ob_get_clean();
}
add_shortcode( 'seoabout', 'll_seo_about_shortcode' );
add_shortcode( 'seo_about', 'll_seo_about_shortcode' );


/* * * * C O U N T S * * * */

// Client count shortcode
function ll_count_clients_shortcode() {
	$acfout = get_field( 'count_clients', 'option' );
	return number_format( $acfout );
}
add_shortcode( 'count_clients', 'll_count_clients_shortcode' );

// Shareholder count shortcode
function ll_count_principals_shortcode() {
	$acfout = get_field( 'count_shareholders', 'option' );
	return number_format( $acfout );
}
add_shortcode( 'count_shareholders', 'll_count_principals_shortcode' );
add_shortcode( 'count_principals', 'll_count_principals_shortcode' );

// CPA count shortcode
function ll_count_cpas_shortcode() {
	$acfout = get_field( 'count_cpas', 'option' );
	return number_format( $acfout );
}
add_shortcode( 'count_cpas', 'll_count_cpas_shortcode' );

// Employee count shortcode
function ll_count_employees_shortcode() {
	$acfout = get_field( 'count_employees', 'option' );
	return number_format( $acfout );
}
add_shortcode( 'count_employees', 'll_count_employees_shortcode' );


/* * * * O T H E R * * * */

function ll_cyberdisclaimer_shortcode() {

	return '<p class="my-8 text-sm italic text-neutal-600">Disclaimer: BeachFleischman PLLC and Silent Sector, LLC are separate independent legal entities and are not joint ventures, partners or members of a formal business organization. Neither BeachFleischman PLLC nor Silent Sector, LLC has the authority to bind, act for or incur liability on behalf of the other.</p>';

}
add_shortcode( 'cyberdisclaimer', 'll_cyberdisclaimer_shortcode' );

// AZ TPT Disclaimer text
function ll_tptdisclaimer_shortcode() {

	return '<p class="">Any accounting, business or tax advice contained in this communication, including attachments and enclosures, is not intended as a thorough, in-depth analysis of specific issues, nor a substitute for a formal opinion, nor is it sufficient to avoid tax-related penalties. If desired, BeachFleischman PLLC would be pleased to perform the requisite research and provide you with a detailed written analysis. Such an engagement may be the subject of a separate engagement letter that would define the scope and limits of the desired consultation services.</p>';

}
add_shortcode( 'tptdisclaimer', 'll_tptdisclaimer_shortcode');
