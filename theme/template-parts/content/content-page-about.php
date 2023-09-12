<?php
/**
 * Template part for displaying About page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$page_id = get_the_ID();
if (get_field('ll_page_title_override')) {
    $page_title = get_field('ll_page_title_override');
} else {
    $page_title = get_the_title();
}
// $page_icon = ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : false;
$page_message = get_field( 'll_brand_message' );
$page_excerpt = get_the_excerpt();
$page_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $page_featimg == true ) {
	$page_featimg_url = $page_featimg[0];
} else {
	$page_featimg_url = '';
}

$cards_about = [
    "culture" => [
        "label" => 'Culture',
        "icon" => 'fa-people-roof',
        "link" => '/about/culture/',
        "backContent" => 'Whatever we end up picking for this page.',
    ],
    "leadership" => [
        "label" => 'Leadership Team',
        "icon" => 'fa-people-line',
        "link" => '/people/',
        "backContent" => 'Meet our incredible team.',
    ],
    "women" => [
        "label" => 'Women RISE',
        "icon" => 'fa-person-dress-burst',
        "link" => '/about/women-rise/',
        "backContent" => 'Partners in your development.',
    ],
    "idea" => [
        "label" => 'IDEA Committee',
        "icon" => 'fa-people-group',
        "link" => '/about/idea-committee/',
        "backContent" => 'Your impact deserves solid support.',
    ],
    "lea" => [
        "label" => 'LEA Global',
        "icon" => 'fa-handshake',
        "link" => '/about/lea-global/',
        "backContent" => 'Partners who unlock your potential.',
    ],
];
?>

<?php ll_page_hero( $page_title, $page_message['label'], $page_featimg_url ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="px-2 md:container md:mx-auto md:px-0">

        <?php if ( is_page('about') ) : ?>
            <div class="mt-8 ind-card-flips is-style-blue md:mt-12 lg:mt-16">
                <?php foreach( $cards_about as $card ) {
                    echo '<div class="ind-' . $card['icon'] . '">
                        <a href="' . $card['link'] . '" rel="bookmark">
                            <div class="card | group relative inline-block float-left w-[180px] h-[180px] [perspective:600px] md:w-[190px] md:h-[190px] lg:w-[200px] lg:h-[200px]">
                                <div class="card-content | absolute w-full h-full rounded-lg shadow-lg shadow-neutral-300 transition-transform ease-out duration-700 [transform-style:preserve-3d]">
                                    <div class="card-front | text-center bg-[--card-front-bg] text-[--card-front-text] absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 [backface-visibility:hidden]">
                                        <div class="card-icon | text-[--card-front-icon]">
                                            <span class="fa-stack fa-2x">
                                                <i class="text-white fa-solid fa-circle fa-stack-2x"></i>
                                                <i class="fa-duotone ' . $card['icon'] . ' fa-stack-1x "></i>
                                            </span>
                                        </div>
                                        <h4 class="mt-2 font-light leading-none text-current">' . $card['label'] . '</h4>
                                    </div>
                                    <div class="card-back | absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 bg-[--card-back-bg] text-[--card-back-text] bg-no-repeat bg-cover bg-blend-overlay shadow-neutral-900/50 [backface-visibility:hidden] [transform:rotateY(180deg)]">
                                        <h5 class="my-2 leading-none tracking-wide text-center text-current uppercase text-shadow">' . $card['label'] . '</h5>
                                        <p class="text-center text-shadow">' . $card['backContent'] . '</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>';
                } ?>
            </div>
        <?php endif; ?>

        <div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

            <div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>

                <?php the_content(); ?>

                <?php if ( is_page( 'idea-committee' ) ) :
                    $args = [
                        'post_type' 				=> 'people',
                        'post_status' 				=> 'publish',
                        'posts_per_page'			=> -1,
                        'posts_per_archive_page'	=> -1,
                        'meta_key'                  => 'll_people_include_in_idea_slider',
                        'meta_value'                => '1',
                        'order' 					=> 'ASC',
                        'orderby' 					=> 'll_people_last_name',
                    ];

                    $peopleQuery = new WP_Query( $args ); ?>

                    <section class="mb-0 rounded-lg ll-equal-vert-padding lg:bg-gradient-to-t lg:from-neutral-300 lg:to-80% lg:to-white">
                        <div class="max-w-3xl md:mx-auto not-prose">
                            <h2 class="text-brand-blue">Thoughts from IDEA Committee members</h2>
                            <div class="slider slider-quotes">
                            <?php /* Start the People slider loop */
                            while ( $peopleQuery->have_posts() ) :
                                $peopleQuery->the_post();
                                global $post;

                                get_template_part( 'template-parts/content/content', 'slide-people-idea' );
                            endwhile;
                            ?>
                            </div>
                            <script>const slider = new A11YSlider(document.querySelector(".slider"), {
                                slidesToShow: 1,
                                arrows: true,
                                autoplay: true,
                                autoplaySpeed: 8000,
                            });</script>
                        </div>
                    </section>

                    <h3>Progress</h3>
                    <p>BeachFleischman has been recognized as an <strong>Inclusive Workplace for 2023</strong> by the <em>Best Companies Group</em> and <em>COLOR Magazine</em>. This is a testament to our ongoing commitment to fostering an environment of inclusivity and belonging in our workplace.</p>
                    <img class="" src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1691787498/2023_-_2024_Inclusive_Workplace_Badge_scmnqj.png" alt="July 2023-July 2024 Inclusive Workplace - Best Companies Group">
                <?php endif; ?>

            </div>

            <div class="my-16 ll-page-grid-area-b md:my-0 md:col-span-3">

                <?php if ( is_page( 'about' ) ) : ?>
                    <h3 class="mb-4">Awards and recognition</h3>
                    <p>We are proud of our unique workplace culture.</p>
                    <div class="flex flex-col flex-wrap items-center gap-8 my-8 place-content-center lg:place-content-evenly md:flex-row lg:gap-16">
                        <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1691606679/Best_of_Accounting_2023_RGB_fagpmr.png" alt="2023 Best of Accounting - Client Satisfaction - ClearlyRated">
                        <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1691787197/IPA_-_Award_Logos_-_Top_200_Firms_nfmdem.png" alt="2023 Top 200 Firms - Inside Public Accounting">
                        <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1691787498/2023_-_2024_Inclusive_Workplace_Badge_scmnqj.png" alt="July 2023-July 2024 Inclusive Workplace - Best Companies Group">
                        <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1691706692/2022__MOVE--best-firm-equity-leadership_qjd6o2.png" alt="2022 Best Firm for Equity Leadership - Accounting MOVE Project">
                        <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1691706692/2022__MOVE--best-firm-women_gr4kpq.png" alt="2022 Best Firm for Women - Accounting MOVE Project">
                        <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1673468396/2022_AccountingToday_Best_Firms_for_Young_Accountants_Badge_prekkv.png" alt="2022 Best Firm for Young Accountants - Accounting Today">
                        <img src="https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,h_100/v1634657713/award__ipa-all-star-firms_ium0vb.png" alt="All Star Firms - Inside Public Accounting">
                    </div>

                    <p>&nbsp;</p>
                <?php endif; ?>

            </div>

            <div class="ll-page-grid-area-c">
                <div id="contact" class="p-4 border lg:p-8 bg-neutral-200 border-neutral-400 not-prose print:hidden">
                    <?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
                </div>
            </div>

        </div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->