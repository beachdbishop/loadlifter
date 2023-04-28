<?php
/**
 * Template part for displaying Industry page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$ind_id = get_the_ID();
if (get_field('ll_page_title_override')) {
    $page_title = get_field('ll_page_title_override');
} else {
    $page_title = get_the_title();
}
$ind_icon = ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : false;
$ind_message = get_field( 'll_brand_message' );
$ind_excerpt = get_the_excerpt();
$ind_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $ind_featimg == true ) {
	$ind_featimg_url = $ind_featimg[0];
} else {
	$ind_featimg_url = '';
}

$ind_post_category = get_field( 'll_ind_category' );
$ind_cta_standard = get_field( 'll_ind_show_standard_cta' );
$ind_cta_heading = get_field( 'll_ind_cta_heading' );
$ind_cta_body = get_field( 'll_ind_cta_body' );
$ind_cta_button_text = get_field( 'll_ind_cta_button_text' );
$ind_cta_html = get_field( 'll_ind_cta_html' );
$ind_groups_html = get_field( 'll_ind_groups_html' );
$ind_people = get_field( 'll_ind_people' );
$ind_people_display = get_field( 'll_ind_people_display_style' );
?>

<?php ll_page_hero( $page_title, $ind_message['label'], $ind_featimg_url ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="px-2 md:container md:mx-auto md:px-0">
        <div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

            <div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>
                <?php the_content(); ?>
            </div>

            <div class="my-16 ll-page-grid-area-b md:my-0 md:col-span-3">

                <?php if ( $ind_post_category ) : ?>
                    <section class="full-bleed not-prose bg-neutral-900 text-neutral-100 ll-equal-vert-padding">
                        <div class="post-grid | px-2 text-neutral-100 md:container md:mx-auto md:px-0">
                            <div class="flex items-center justify-between mb-4">
                                <h2>Insights</h2>
                                <a href="/blog/" class="px-4 py-2 border-2 rounded-lg border-neutral-300 text-neutral-300 hover:text-brand-blue-pale hover:border-white">View All</a>
                            </div>
                            <?php echo do_shortcode( '[display-posts taxonomy="category" tax_term="' . $ind_post_category->slug . '" tax_operator="IN" taxonomy_2="category" tax_2_term="archived-events" tax_2_operator="NOT IN" orderby="date" order="DESC" posts_per_page="3" wrapper="div" wrapper_class="dps-grid-3max" layout="card-simple" /]' ); ?>
                        </div>
                    </section>
                <?php endif; ?>

                <?php // CTA
                if ( $ind_cta_standard ) :
                    echo '<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-md"></div>';
                    echo '<section class="full-bleed ll-equal-vert-padding bg-gradient-70 from-brand-blue from-30% via-brand-blue-dark via-50% to-brand-blue to-90% bg-180pct animate-sway not-prose text-neutral-100">
                        <div class="px-2 md:container md:mx-auto md:px-0">
                            <div class="flex flex-col items-start gap-4 sm:flex-row sm:items-center lg:gap-8">
                                <div class="prose lg:prose-xl ">
                                    <h2 class="mb-2 text-brand-blue-faint text-shadow shadow-brand-blue-dark">' . $ind_cta_heading . '</h2>
                                    <p class="text-neutral-100 text-shadow shadow-brand-blue-dark">' . $ind_cta_body . '</p>
                                </div>
                                <div class="w-full md:max-w-fit">
                                    <div class="wp-block-button"><a class="border-2 wp-block-button__link wp-element-button has-brand-blue-dark-background-color has-background-color border-brand-blue-dark hover:border-brand-blue-faint hover:text-brand-blue-faint" href="#contact">' . $ind_cta_button_text . '</a></div>
                                </div>
                            </div>
                        </div>
                    </section>';
                elseif ( ( $ind_cta_standard == false ) && ( !empty( $ind_cta_html ) ) ) :
                    echo '<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-md"></div>';
                    echo $ind_cta_html;
                endif;
                ?>

                <?php // INDUSTRY PROFESSIONALS AND INVOLVEMENT   ?>
                <?php if ( ( $ind_people_display != 'hide' ) || ( !empty( $ind_groups_html ) ) ) : ?>
                <section class="bg-white full-bleed not-prose ll-equal-vert-padding">
                    <div class="px-2 md:container md:mx-auto md:px-0">
                        <?php if ( ( $ind_people ) && ( $ind_people_display != 'hide' ) ) : ?>
                            <h2>Industry Professional<?php if( count( $ind_people ) > 1 ) { echo "s"; } ?></h2>

                            <?php
                            if ( $ind_people_display === 'slider' ) :
                                echo do_shortcode( '[display-posts post_type="people" id="' . implode( ', ', $ind_people ) . '" posts_per_page="-1" meta_key="ll_people_level" orderby="meta_value_num" order="ASC" wrapper="div" wrapper_class="slider slider-people mx-auto max-w-5xl" layout="slide-people" /]' );
                            endif;

                            if ( $ind_people_display === 'grid') :
                                $grid_class = (count( $ind_people ) == 1) ? 'grid-cols-4' : 'grid-auto-fit';

                                echo do_shortcode( '[display-posts post_type="people" id="' . implode( ', ', $ind_people ) . '" posts_per_page="-1" meta_key="ll_people_level" orderby="meta_value_num" order="ASC" wrapper="div" wrapper_class="grid ' . $grid_class . ' gap-8" layout="card-people-md" /]' );
                            endif; ?>

                        <?php endif; ?>

                        <?php if ( $ind_groups_html ) :
                            echo $ind_groups_html;
                        endif; ?>
                    </div>
                </section>
                <?php endif; ?>

            </div>

            <div class="ll-page-grid-area-c">
                <div id="contact" class="p-4 border lg:p-8 bg-neutral-200 border-neutral-400 not-prose">
                    <?php if ( is_page( 'Construction' ) ) {
                        get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar-construction' );
                    } else {
                        get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' );
                    } ?>
                </div>
            </div>

        </div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( $ind_people_display === 'slider' ) : ?>
<script>
  const slider = new A11YSlider(document.querySelector(".slider"), {
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true
  });
</script>
<?php endif; ?>
