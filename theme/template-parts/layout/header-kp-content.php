<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<header role="banner" id="masthead" class="bg-white print:bg-white print:shadow-none sticky top-0 z-[39] ">
    <div class="flex items-center justify-between px-1 py-3 mx-auto md:container md:px-0 xlg:px-8 ">

        <div class="order-first text-center sm:text-left">
            <div role="img" class="w-[240px] lg:w-[320px]">
                <a href="<?php bloginfo('url'); ?>" aria-label="<?php echo bloginfo('name'); ?>">
                    <?php get_template_part('template-parts/svg/svg', 'logonewbrandsimple'); ?>
                </a>
            </div>
        </div>

        <div class="order-1 p-4">
            <i class="fa-solid fa-triangle-person-digging text-amber-500"></i>
        </div>

        <div class="flex order-2 md:order-last">
            <ul class="print:hidden">
                <li role="menuitem" class="toggleable | group hover:bg-white ">
                    <input type="checkbox" value="selected" id="toggle-search" class="hidden toggle-input peer">
                    <label for="toggle-search" class="block py-4 ml-4 text-sm font-bold cursor-pointer lg:text-base lg:py-6 hover:text-brand-red peer-checked:text-brand-red peer-checked:bg-white" aria-label="Toggle Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <div role="toggle" class="z-40 py-2 mb-16 border-t border-solid shadow-xl md:py-4 border-brand-blue mega-menu lg:py-6 sm:mb-0 bg-brand-gray-dark ">
                        <div class="container px-2 mx-auto text-white md:px-0">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </li>
            </ul>

            <button class="toggle--pri-nav | cursor-pointer bg-transparent ml-4 py-4 md:hidden print:hidden" aria-controls="primary-navigation">
                <i class="fa-solid fa-bars"></i>
                <span class="sr-only">Menu</span>
            </button>
        </div>

        <nav id="primary-navigation" class="primary-navigation | hidden md:order-2 md:block md:grow-1">
            <details role="menuitem" aria-haspopup="true" class="menu-item | md:hidden">
                <summary><i class="far fa-search"></i></summary>
                <div>search form</div>
            </details>

            <ul aria-label="Primary" role="list" class="md:flex md:space-x-2 lg:space-x-4">

                <li role="menuitem" aria-haspopup="true" class="menu-item | hoverable group hover:bg-white">
                    <a href="#" class="relative block font-bold font-head ">Services</a>
                    <div class="nav__panel--services | z-40 mb-16 border-t border-solid shadow-xl border-neutral-800 mega-menu sm:mb-0">
                        <div class="container grid grid-flow-col mx-auto md:grid-cols-3 lg:grid-cols-4">
                            <div class="hidden py-4 lg:block bg-brand-blue-faint on-lightbg lg:pr-4 lg:py-8 ">
                                <h3 class="mb-2 text-brand-blue">Services</h3>
                                <p class="text-sm">BeachFleischman helps clients create long-term value for all stakeholders. Enabled by data and technology, our service and solutions provide trust through assurance and help clients transform, grow, and operate.</p>
                            </div>

                            <div class="grid grid-flow-col col-span-3 py-4 divide-x gap-x-4 on-darkbg lg:py-8 divide-solid divide-brand-gray-pale bg-neutral-800 auto-cols-fr">
                                <div class="pl-4 text-white">
                                    <h5 class="mb-2 font-bold text-brand-blue-pale"><a href="/assurance/">Accounting &amp; Assurance</a></h5>
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'll_submenu_assurance',
                                        'container_class' => 'submenu mt-4 text-sm',
                                        'walker' => new LL_Menu_Walker()
                                    ));
                                    ?>
                                </div>
                                <div class="pl-4 text-white" data-accordion>
                                    <h5 class="mb-2 font-bold text-brand-blue-pale"><a href="/tax/">Tax</a></h5>
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'll_submenu_tax',
                                        'container_class' => 'submenu mt-4 text-sm',
                                        'walker' => new LL_Menu_Walker()
                                    ));
                                    ?>
                                </div>

                                <div class="pl-4 text-white" data-accordion>
                                    <h5 class="mb-2 font-bold text-brand-blue-pale"><a href="/consulting/">Consulting</a></h5>
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'll_submenu_soar',
                                        'container_class' => 'submenu mt-4 text-sm',
                                        'walker' => new LL_Menu_Walker()
                                    ));
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                <li role="menuitem" aria-haspopup="true" class="menu-item | ">
                    <a href="" class="font-bold font-head">Industries</a>
                </li>
                <li role="menuitem" aria-haspopup="true" class="menu-item | ">
                    <a href="" class="font-bold font-head">Insights</a>
                </li>
                <li role="menuitem" aria-haspopup="true" class="menu-item | ">
                    <a href="" class="font-bold font-head">About</a>
                </li>
                <li role="menuitem" aria-haspopup="true" class="menu-item | ">
                    <a href="" class="font-bold font-head">Careers</a>
                </li>
                <li role="menuitem" aria-haspopup="true" class="menu-item | ">
                    <a href="" class="font-bold font-head">Client Center</a>
                </li>
                <li role="menuitem" aria-haspopup="true" class="menu-item | ">
                    <a href="" class="font-bold font-head">Contact</a>
                </li>
            </ul>
        </nav>

    </div>
</header>
