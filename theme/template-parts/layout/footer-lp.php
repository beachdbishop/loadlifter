<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$disclaimer_cyber = sprintf( 'Disclaimer: %1$s and Silent Sector, LLC are separate independent legal entities and are not joint ventures, partners or members of a formal business organization. Neither %1$s nor Silent Sector, LLC has the authority to bind, act for or incur liability on behalf of the other.', LL_COMPANY_LEGAL_NAME );
$footer_para_cyber = sprintf( 'Cybersecurity Consultants | IT Consultants | Virtual CISO :: BeachFleischman PLLC is a public accounting and cybersecurity consulting firm with offices in Phoenix and Tucson (AZ) serving the IT security needs of businesses and organizations across the United States. Our firm provides enterprise cyber risk assessments, penetration testing, compliance gap assessments, SOC 2 reports, CMMC/NIST SP 800-171 compliance and virtual CISO consulting services. The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %1$s. &copy;%2$s %1$s. All rights reserved.', LL_COMPANY_LEGAL_NAME, date('Y') );
$page_seo_footer = get_field( 'll_seo_footer', get_queried_object_id(), false );
$site_seo_footer = get_field( 'seo_footer_text', 'option' );
?>

<?php
if ( !is_page_template( 'tpl-landing-page-bare.php' ) ) {

    //   P R E F O O T E R   A R E A
    get_template_part( 'template-parts/siteblocks/pre', 'footer' ); ?>

    <footer id="colophon" class="site-footer | print:bg-white">

        <div class="bg-center bg-no-repeat bg-cover border-t-4 border-solid on-darkbg bg-neutral-400 text-neutral-200 bg-phoenix-desert3 border-brand-blue bg-blend-multiply print:bg-white print:bg-none print:text-neutral-700">
            <div class="px-2 py-16 md:px-0 md:container md:mx-auto">
                <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-3 lg:gap-x-8">
                    <div class="">
                        <div class="max-w-xs mb-4 fill-current">
                            <a href="<?php bloginfo( 'url' ); ?>" aria-label="<?php echo bloginfo( 'name' );?>">
                                <?php get_template_part( 'template-parts/svg/svg', 'logomono' ); ?>
                            </a>
                        </div>
                        <?php ll_show_social_links( $out = 'echo' ); ?>
                    </div>
                    <div class=" md:pt-2">
                        <address class="space-y-2 not-italic" property="address" typeof="PostalAddress">
                            <p class="street-address | font-head leading-none " property="streetAddress">2201 E. Camelback Road, Suite 200</p>
                            <p class="locality | font-head leading-none "><span property="addressLocality">Phoenix</span>, <span class="state" property="addressRegion">AZ</span> <span class="zip" property="postalCode">85016</span></p>
                            <p class="font-bold leading-none font-head " property="telephone">P: <a href="tel:16022657011" rel="nofollow" onclick="ga('send', 'event', 'Phone Call Tracking', 'Click to Call', '1 (602) 265-7011', 0);">602.265.7011</a></p>
                            <p class="font-bold leading-none font-head " property="faxNumber">F: 602.265.7060</p>
                        </address>
                    </div>
                    <div class=" md:pt-2">
                        <address class="space-y-2 not-italic" property="address" typeof="PostalAddress">
                            <p class="street-address | font-head leading-none" property="streetAddress">1985 E. River Road, Suite 201</p>
                            <p class="locality | font-head leading-none"><span property="addressLocality">Tucson</span>, <span class="state" property="addressRegion">AZ</span> <span class="zip" property="postalCode">85718</span></p>
                            <p class="font-bold leading-none font-head" property="telephone">P: <a href="tel:15203214600" rel="nofollow" onclick="ga('send', 'event', 'Phone Call Tracking', 'Click to Call', '1 (520) 321-4600', 0);">520.321.4600</a></p>
                            <p class="font-bold leading-none font-head" property="faxNumber">F: 520.321.4040</p>
                        </address>
                    </div>
                </div>
                <?php if ( is_page_template( 'tpl-landing-page-cyber.php' ) ) { ?>
                    <p class="mt-8 text-xs"><?php echo $disclaimer_cyber; ?></p>
				    <p class="mt-4 text-xs"><?php
                    if ( $page_seo_footer ) {
                        echo $page_seo_footer;
                        sprintf( 'The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %1$s. &copy;%2$s %1$s. All rights reserved.', LL_COMPANY_LEGAL_NAME, date('Y') );
                    } else {
                        echo $footer_para_cyber;
                    } ?></p>
                <?php } else { ?>
                    <? // regular landing page ?>
                    <p class="mt-8 text-xs"><?php
                    if ( $page_seo_footer ) {
                        // if this is a page and special footer text is set...
                        $footer_markup = sprintf( '%1$s The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %2$s. &copy;%3$s %2$s. All rights reserved.', $page_seo_footer, LL_COMPANY_LEGAL_NAME, date('Y') );
                    } else {
                        // this isn't a page or special footer text isn't set...
                        $footer_markup = sprintf( 'Accountants | Auditors | Advisors | Consultants | CPAs :: %1$s The BeachFleischman logo, BEACHFLEISCHMAN, and COLLABORATE FORWARD are all registered U.S. trademarks of %2$s. &copy;%3$s %2$s. All rights reserved.', $site_seo_footer, LL_COMPANY_LEGAL_NAME, date('Y') );
                    }
                    echo $footer_markup;
                    ?></p>
                <?php } ?>

                <p class="pt-4 pb-0 text-sm text-center uppercase print:hidden">
                    <a class="hover:text-brand-blue-faint" href="#top" title="Back to top"><i class="fa-regular fa-arrow-up-to-dotted-line"></i></a>
                </p>
            </div>
        </div>
    </footer>

<?php } ?>
