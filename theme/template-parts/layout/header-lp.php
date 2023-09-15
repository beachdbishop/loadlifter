<?php

/**
 * Template part for displaying the header content on landing pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<?php if ( !is_page_template( 'tpl-landing-page-bare.php' ) ) { ?>

    <header id="masthead" class="nav-header | bg-white print:bg-white print:shadow-none sticky top-0 z-[39] ">
        <div role="navigation" class="flex items-center justify-between px-1 py-3 mx-auto md:container md:px-0 md:py-4">

            <div role="img" class="w-[240px] lg:w-[320px] order-first">
                <a href="<?php bloginfo('url'); ?>" aria-label="<?php echo bloginfo('name'); ?>">
                <?php if ( is_page_template( 'tpl-landing-page-cyber.php' ) ) {
                    echo '<img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,w_300/v1646764379/logolib/logo_cybersecurity-silentsector.png" alt="logo: BeachFleischman powered by Silent Sector" width="300" height="81">';
                } else {
                    get_template_part('template-parts/svg/svg', 'logonewbrandsimple');
                } ?>
                </a>
            </div>

        </div>
    </header>

<?php } ?>
