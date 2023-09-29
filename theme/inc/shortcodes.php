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


// Menu Shortcode
function ll_listmenu_shortcode($atts, $content = null) {
    extract(
        shortcode_atts(
            [
                'menu' => '',
                'container' => 'div',
                'container_class' => '',
                'container_id' => '',
                'menu_class' => 'menu',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'depth' => 1,
                'theme_location' => '',
            ],
            $atts
        )
    );

    return wp_nav_menu([
        'menu' => $menu,
        'container' => $container,
        'container_class' => $container_class,
        'container_id' => $container_id,
        'menu_class' => $menu_class,
        'menu_id' => $menu_id,
        'echo' => false,
        'fallback_cb' => $fallback_cb,
        'before' => $before,
        'after' => $after,
        'link_before' => $link_before,
        'link_after' => $link_after,
        'depth' => $depth,
        'walker' => new LL_Menu_Walker(),
        'theme_location' => $theme_location,
    ]);
}
add_shortcode( 'listmenu', 'll_listmenu_shortcode' );


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

function ll_svgpart_shortcode( $atts ) {
    extract( shortcode_atts( [
        'part' => '',
    ], $atts ) );
    $file = locate_template( 'template-parts/svg/svg-' . $part . '.php' );

    if( ! empty( $file ) ) {
		ob_start();
		include $file;
		$svgout = ob_get_contents();
		ob_end_clean();

		return $svgout;
	}
}
add_shortcode( 'svg', 'll_svgpart_shortcode' );


function ll_cybercertlogos_shortcode() {

    return '<div class="flex flex-col flex-wrap items-center gap-8 my-8 lg:my-12 place-content-center md:place-content-start md:flex-row lg:gap-x-16 print:hidden">
    <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1694725461/logo__cert--cissp_odnxgv.png" alt="Certified Information Systems Security Professional" width="257" height="100">
    <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1694725461/logo__cert--crisc_fxg4pl.png" alt="Certified in Risk and Information Systems Control" width="224" height="100">
    <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1694725460/logo__cert--ceh_reqsoo.png" alt="Certified Ethical Hacker" width="137" height="100">
    <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1694725461/logo__cert--oscp_jr43g9.png" alt="Offensive Security Certified Professional" width="100" height="100">
    <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1694725461/logo__pci-ssc_ksjxzu.png" alt="Payment Card Industry Security Standards Council" width="324" height="100">
</div>';

}
add_shortcode( 'cybercertlogos', 'll_cybercertlogos_shortcode' );

function ll_cyberdisclaimer_shortcode() {

	return '<p class="my-8 text-sm italic text-neutal-600">Disclaimer: BeachFleischman PLLC and Silent Sector, LLC are separate independent legal entities and are not joint ventures, partners or members of a formal business organization. Neither BeachFleischman PLLC nor Silent Sector, LLC has the authority to bind, act for or incur liability on behalf of the other.</p>';

}
add_shortcode( 'cyberdisclaimer', 'll_cyberdisclaimer_shortcode' );

// AZ TPT Disclaimer text
function ll_tptdisclaimer_shortcode() {

	return '<p class="">Any accounting, business or tax advice contained in this communication, including attachments and enclosures, is not intended as a thorough, in-depth analysis of specific issues, nor a substitute for a formal opinion, nor is it sufficient to avoid tax-related penalties. If desired, BeachFleischman PLLC would be pleased to perform the requisite research and provide you with a detailed written analysis. Such an engagement may be the subject of a separate engagement letter that would define the scope and limits of the desired consultation services.</p>';

}
// add_shortcode( 'tptdisclaimer', 'll_tptdisclaimer_shortcode');
