<?php

/**
 * The template for displaying IDEA Committee page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$page_id = get_the_ID();
if (get_field('ll_page_title_override')) {
    $page_title = get_field('ll_page_title_override');
} else {
    $page_title = get_the_title();
}
$page_message = get_field( 'll_brand_message' );
$page_excerpt = get_the_excerpt();
$page_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $page_featimg == true ) {
    $page_featimg_url = $page_featimg[0];
} else {
    $page_featimg_url = '';
}


$idea_quotes = [
    "abyma" => [
      "id" => 1,
      "name" => "Ashley Byma",
      "title" => "Tax Senior Manager",
      "headshot" => "2018/10/bio_sq-abyma.jpg",
      "quote" => "Inclusion is the meaningful acceptance of a diverse group of people in your community."
    ],
    "jmiessner" => [
      "id" => 2,
      "name" => "Julia Miessner",
      "title" => "Principal",
      "headshot" => "2018/10/bio_sq-jmiessner.jpg",
      "quote" => "Inclusion is a culture where everyone feels a sense of belonging and support."
    ],
    "gkhawam" => [
      "id" => 3,
      "name" => "Gina Khawam",
      "title" => "Tax Manager",
      "headshot" => "2022/01/bio_sq-gkhawam.jpg",
      "quote" => "Diversity is being able to look at a group of people and seeing different ethnicities, religions, cultures, languages being spoken, etc. and acknowledging and celebrating that those differences exist."
    ],
    "culibarri" => [
      "id" => 5,
      "name" => "Christine Ulibarri",
      "title" => "Principal",
      "headshot" => "2018/10/bio_sq-culibarri.jpg",
      "quote" => "Everyone—again, everyone—should be free to achieve their own greatness on their own merits and not be suppressed by the thoughts, opinions, or actions of others."
    ],
    "kmattull" => [
      "id" => 6,
      "name" => "Karen Mattull",
      "title" => "COO, Internal Operations/Principal",
      "headshot" => "2018/10/bio_sq-kmattull.jpg",
      "quote" => "I believe in=> compassion, justice, openness, respect, feeling valued, and making others feel valued."
    ],
    "cmetcalf" => [
      "id" => 7,
      "name" => "Caryn Metcalf",
      "title" => "Graphic Designer",
      "headshot" => "2022/08/bio_sq-cmetcalf.jpg",
      "quote" => "The IDEA committee is important, because it keeps our firm accountable to change, to become more diverse, to make that a goal."
    ],
    "tjones" => [
      "id" => 8,
      "name" => "Travis Jones",
      "title" => "Principal",
      "headshot" => "2018/10/bio_sq-tjones.jpg",
      "quote" => "We all have a story, and I welcome the opportunity to be a part of the solution by bringing my voice to the IDEA committee."
    ],
    "emajchrzak" => [
      "id" => 9,
      "name" => "Eric Majchrzak",
      "title" => "CEO",
      "headshot" => "2018/10/bio_sq-emajchrzak.jpg",
      "quote" => "Our IDEA committee is critical to not only creating a diverse workplace, but nurturing an environment where people are heard, feel respected, have a sense of belonging, and can be contributors to the success of our firm. We believe that embracing the full potential of people within our firm and community is the right thing to do."
    ],
    "mfleischman" => [
      "id" => 10,
      "name" => "Marc Fleischman",
      "title" => "Senior Advisor",
      "headshot" => "2018/10/bio_sq-mfleischman.jpg",
      "quote" => "If we acknowledge and embrace the different perspectives and backgrounds of our team members, we can develop pathways to ensure they all have an opportunity to excel in their jobs."
    ],
    "chutchins" => [
      "id" => 11,
      "name" => "Cheryl Hutchins",
      "title" => "Learning & Organizational Development Specialist",
      "headshot" => "2022/08/bio_sq-chutchins.jpg",
      "quote" => "The IDEA committee pursues intentional change in diversity, equity, and inclusion at BeachFleischman. Better communities are not built by happenstance. Instead of waiting for gradual improvement, we come together to culivate progress in our firm, in our community, and in the accounting industry at large."
    ]
];
?>

<main id="primary" class="bg-white">
    <?php if ( get_field( 'll_hide_featured_image' ) === false ) :
        ll_page_hero( $page_title, $page_message['label'], $page_featimg_url );
    endif; ?>

    <article id="post-<?php the_ID(); ?>" <?php if (!is_front_page()) { post_class( 'pt-4 md:pt-6 lg:pt-8' ); } ?>>
        <div class="px-1 md:container md:mx-auto md:px-0">
            <?php if ( get_field( 'll_hide_featured_image' ) === true ) { ?>
                <?php if ( function_exists( 'bcn_display' ) ) { ?>
                    <div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
                <?php } ?>

                <header class="mb-4">
                    <?php the_title( '<h1 class="entry-title | text-brand-blue">', '</h1>' ); ?>
                </header>
            <?php } ?>

            <div <?php ll_content_class( 'entry-content' ); ?>>

                <?php the_content(); ?>

                <div class="clear-both">&nbsp;</div>

                <section class="mb-0 full-bleed ll-equal-vert-padding bg-gradient-70 from-brand-blue from-30% via-brand-blue-dark via-50% to-brand-blue to-90% bg-180pct animate-sway text-neutral-200 on-darkbg">
                    <div class="container">
                        <div class="max-w-3xl md:mx-auto not-prose">
                            <h2>Thoughts from some of our IDEA Committee Members</h2>
                            <div class="slider slider-quotes">
                            <?php
                            foreach ( $idea_quotes as $q ) {

                                echo sprintf(
                                    '<div class="p-6 transition-colors ease-in-out rounded-lg slide | q-%1$s" tabindex="0"><div class="mb-8"><p class="text-lg leading-6 quote text-brand-gray-dark lg:text-xl">%2$s</p></div><div class="text-lg text-center cite text-brand-gray"><img class="w-40 h-auto mx-auto rounded-full shadow-md shadow-brand-blue-dark/50" src="https://beachfleischman.com/wp-content/uploads/%3$s" alt="%4$s"><h4 class="mt-2 text-xl font-bold text-brand-blue">%5$s</h4><p class="text-base text-brand-blue-dark">%6$s</p></div></div>',
                                    esc_attr( $q['id'] ),
                                    $q['quote'],
                                    $q['headshot'],
                                    esc_attr( $q['name'] ),
                                    $q['name'],
                                    $q['title']
                                );

                            }
                            ?>
                            </div>
                            <script>const slider = new A11YSlider(document.querySelector(".slider"), {
                                slidesToShow: 1,
                                arrows: true,
                                autoplay: true,
                                autoplaySpeed: 6500,
                            });</script>
                        </div>
                    </div>
                </section>

                <?php
                wp_link_pages(
                    array(
                        'before' => '<div>' . esc_html__( 'Pages:', 'loadlifter' ),
                        'after'  => '</div>',
                    )
                );
                ?>

            </div>

            <?php get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

        </div>
    </article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->
<?php
get_footer();
