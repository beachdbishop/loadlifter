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


/**
 * Using a shortcode to conditionally enqueue the a11y-slider js
 */
function ll_a11y_slider_shortcode() {
	return '';
}
add_shortcode( 'a11yslider', 'll_a11y_slider_shortcode' );

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


function ll_awardlogos_shortcode() {
	// return '<div class="flex flex-col flex-wrap justify-between items-center my-8 place-content-center md:place-content-start md:flex-row">
	return '<div class="flex flex-wrap justify-evenly items-center gap-4 my-8 place-content-center md:gap-8 md:place-content-start">
	<a href="https://www.bizjournals.com/phoenix/subscriber-only/2024/05/17/largest-phoenix-area-accounting-firms.html"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_200,q_auto/v1717027280/2024_pbj_largest-phx-acct-firms_nyik4u.png" alt="2024 4th Largest Phoenix-Area Accounting Firms - Phoenix Business Journal" width="102" height="100"></a>
		<a href="https://www.clearlyrated.com/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_200/v1691606679/Best_of_Accounting_2023_RGB_fagpmr.png" alt="2023 Best of Accounting - Client Satisfaction - ClearlyRated" width="100" height="100"></a>
		<a href="https://insidepublicaccounting.com/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_200/v1691787197/IPA_-_Award_Logos_-_Top_200_Firms_nfmdem.png" alt="2023 Top 200 Firms - Inside Public Accounting" width="100" height="100"></a>
		<a href="https://bestcompaniesgroup.com/programs/inclusive-workplace-program/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_200/v1691787498/2023_-_2024_Inclusive_Workplace_Badge_scmnqj.png" alt="July 2023-July 2024 Inclusive Workplace - Best Companies Group" width="100" height="100"></a>
		<a href="https://accountingmoveproject.com/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_200/v1697750375/2023_Accounting_MOVE_Project_Best_Firm_for_Equity_Leadership_Badge_agsiwg.jpg" alt="2023 Best Firm for Equity Leadership - Accounting MOVE Project" width="156" height="100"></a>
		<a href="https://accountingmoveproject.com/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_200/v1697750375/2023_Accounting_MOVE_Project_Best_Firm_for_Women_Badge_mcbjm3.jpg" alt="2023 Best Firm for Women - Accounting MOVE Project" width="156" height="100"></a>
		<a href="https://www.accountingtoday.com/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_200/v1673468396/2022_AccountingToday_Best_Firms_for_Young_Accountants_Badge_prekkv.png" alt="2022 Best Firm for Young Accountants - Accounting Today" width="170" height="100"></a>
		<a href="https://insidepublicaccounting.com/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1634657713/award__ipa-all-star-firms_ium0vb.png" alt="All Star Firms - Inside Public Accounting" width="100" height="100"></a>
		<a href="https://www.cigna.com/employers/insights/measuring-up-in-wellness"><img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_200/v1707756234/cigna-healthy-workforce-desigation-2023_oo3u47.png" alt="Cigna Healthy Workforce Designation 2023 - Silver" width="91" height="100"></a>
	</div>';
}
add_shortcode( 'awardlogos', 'll_awardlogos_shortcode' );

function ll_constrassoclogos_shortcode() {
	return '<div class="flex flex-col flex-wrap items-center gap-8 my-8 place-content-center md:place-content-start md:flex-row lg:gap-x-16">
		<a href="https://actaz.net/" rel="noopener noreferrer"><img src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1679441728/ACT_sfb9d9.png" alt="logo: Alliance of Construction Trades (ACT)" title="Alliance of Construction Trades (ACT)" width="166" height="70"></a>
		<a href="https://asa-az.org/" rel="noopener noreferrer"><img src="https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1697479496/ASAA_cboctk.png" alt="logo: American Subcontractors Association of Arizona (ASA)" title="American Subcontractors Association of Arizona (ASA)" width="112" height="70"></a>
		<a href="https://www.azbuilders.org/" rel="noopener noreferrer"><img src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1679440947/ABA_fuftwq.png" alt="logo: Arizona Builders Alliance (ABA)" title="Arizona Builders Alliance (ABA)" width="88" height="70"></a>
		<a href="https://www.azagc.org/" rel="noopener noreferrer"><img src="https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1679609834/assclogo--azagc_seoaiv.png" alt="logo: Arizona Chapter of the Associated General Contractors of America (AZAGC)" title="Arizona Chapter of the Associated General Contractors of America (AZAGC)" width="188" height="70"></a>
		<a href="https://www.abc.org/" rel="noopener noreferrer"><img src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1679441643/ABC_sxlwvt.png" alt="logo: Associated Builders and Contractors, Inc. (ABC)" title="Associated Builders and Contractors, Inc. (ABC)" width="123" height="70"></a>
		<a href="https://cicpac.com/" rel="noopener noreferrer"><img src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1679450546/CICPAC_irfutw.png" alt="logo: Construction Industry CPAs/Consultants Association (CICPAC)" title="Construction Industry CPAs/Consultants Association (CICPAC)" width="246" height="70"></a>
		<a href="https://cfma.org/" rel="noopener noreferrer"><img src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1679450494/CFMA_ixqdim.png" alt="logo: Construction Financial Management Association (CFMA)" title="Construction Financial Management Association (CFMA)" width="184" height="70"></a>
		<a href="https://www.nawic.org/"><img src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1679450575/NAWIC_zktjka.png" alt="logo: National Association of Women In Construction (NAWIC)" title="National Association of Women In Construction (NAWIC)" width="169" height="70"></a>
	</div>';
}
add_shortcode( 'constrlogos', 'll_constrassoclogos_shortcode' );

function ll_cybercertlogos_shortcode() {
	// return '<div class="flex flex-col flex-wrap items-center gap-8 my-8 place-content-center md:place-content-start md:flex-row lg:gap-x-16">
	return '<div class="not-prose flex flex-col flex-wrap items-center gap-4 justify-start md:flex-row md:gap-6 lg:justify-between">
		<a href="https://www.isc2.org/certifications/cissp">
			<img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_70/v1694725461/logo__cert--cissp_odnxgv.png" alt="Certified Information Systems Security Professional" width="180" height="70" />
		</a>
		<a href="https://www.isaca.org/credentialing/crisc">
			<img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_70/v1694725461/logo__cert--crisc_fxg4pl.png" alt="Certified in Risk and Information Systems Control" width="157" height="70" />
		</a>
		<a href="https://www.eccouncil.org/train-certify/certified-ethical-hacker-ceh-v12/">
			<img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_70/v1694725460/logo__cert--ceh_reqsoo.png" alt="Certified Ethical Hacker" width="96" height="70" />
		</a>
		<a href="https://learn.offsec.com/cybersecurity-certification-paths">
			<img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_70/v1694725461/logo__cert--oscp_jr43g9.png" alt="Offensive Security Certified Professional" width="70" height="70" />
		</a>
		<a href="http://pcisecuritystandards.org/">
			<img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_70/v1694725461/logo__pci-ssc_ksjxzu.png" alt="Payment Card Industry Security Standards Council" width="227" height="70" />
		</a>
	</div>';

}
add_shortcode( 'cybercertlogos', 'll_cybercertlogos_shortcode' );

function ll_cyberdisclaimer_shortcode() {
	return '<p class="my-8 text-sm italic text-neutal-600">Disclaimer: ' . LL_COMPANY_LEGAL_NAME . ' and Silent Sector, LLC are separate independent legal entities and are not joint ventures, partners or members of a formal business organization. Neither ' . LL_COMPANY_LEGAL_NAME . ' nor Silent Sector, LLC has the authority to bind, act for or incur liability on behalf of the other.</p>';
}
add_shortcode( 'cyberdisclaimer', 'll_cyberdisclaimer_shortcode' );

// AZ TPT Disclaimer text
function ll_tptdisclaimer_shortcode() {
	return '<p class="">Any accounting, business or tax advice contained in this communication, including attachments and enclosures, is not intended as a thorough, in-depth analysis of specific issues, nor a substitute for a formal opinion, nor is it sufficient to avoid tax-related penalties. If desired, ' . LL_COMPANY_LEGAL_NAME . ' would be pleased to perform the requisite research and provide you with a detailed written analysis. Such an engagement may be the subject of a separate engagement letter that would define the scope and limits of the desired consultation services.</p>';
}
// add_shortcode( 'tptdisclaimer', 'll_tptdisclaimer_shortcode');


// Deprecated shortcode compensation
function ll_rwdad_shortcode() {
	// return blank
	return '';
}
add_shortcode( 'rwdad', 'll_rwdad_shortcode' );
