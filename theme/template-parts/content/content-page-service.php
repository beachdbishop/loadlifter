<?php
/**
 * Template part for displaying Service page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$svc_id = get_the_ID();
if ( get_field( 'll_page_title_override' ) ) {
	$svc_title = get_field( 'll_page_title_override' );
} else {
	$svc_title = get_the_title();
}

$svc_icon = ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : false;
$svc_message = get_field( 'll_brand_message' );
$svc_excerpt = get_the_excerpt();
$svc_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $svc_featimg == true ) {
	$svc_featimg_url = $svc_featimg[0];
} else {
	$svc_featimg_url = '';
}

$svc_post_category = get_field( 'll_ind_category' );
$svc_cta_html = get_field( 'll_ind_cta_html' );
// $svc_groups_html = get_field( 'll_ind_groups_html' );
$svc_people = get_field( 'll_ind_people' );
$svc_people_display = get_field( 'll_ind_people_display_style' );
?>

<?php ll_page_hero( $svc_title, $svc_message['label'], $svc_featimg_url ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="px-2 md:container md:mx-auto md:px-0">
        <div class="entry-cont | industry-page-grid mt-4 md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

            <div class="ind-grid-area-a md:col-span-2 | prose lg:prose-xl">
                <?php the_content(); ?>
            </div>

            <div class="my-16 ind-grid-area-b md:my-0 md:col-span-3">

                <?php if ( $svc_post_category ) : ?>
                    <section class="py-4 full-bleed not-prose bg-neutral-900 text-neutral-100 md:py-8 lg:py-16">
                        <div class="post-grid | px-2 text-neutral-100 md:container md:mx-auto md:px-0">
                            <div class="flex items-center justify-between mb-4">
                                <h2>Insights</h2>
                                <a href="/blog/" class="px-4 py-2 border-2 rounded-lg border-neutral-300 text-neutral-300 hover:text-brand-blue-pale hover:border-white">View All</a>
                            </div>
                            <?php echo do_shortcode( '[display-posts taxonomy="category" tax_term="' . $svc_post_category->slug . '" tax_operator="IN" taxonomy_2="category" tax_2_term="archived-events" tax_2_operator="NOT IN" orderby="date" order="DESC" posts_per_page="3" wrapper="div" wrapper_class="dps-grid-3max" layout="card-simple" /]' ); ?>
                        </div>
                    </section>
                <?php endif; ?>

                <?php // CTA
                if ( $svc_cta_html ) :
                    echo '<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-md"></div>';
                    echo $svc_cta_html;
                endif;
                ?>

                <?php
                // SERVICE PROFESSIONALS AND INVOLVEMENT
                if ( $svc_people_display != 'hide' ) :
                ?>
                <section class="py-4 bg-white full-bleed not-prose md:py-8 lg:py-16">
                    <div class="px-2 md:container md:mx-auto md:px-0">
                        <?php if ( ( $svc_people ) && ( $svc_people_display != 'hide' ) ) : ?>
                            <h3 class="text-brand-red">Industry Professionals</h3>

                            <?php
                            if ( $svc_people_display === 'slider' ) :
                                echo do_shortcode( '[display-posts post_type="people" id="' . implode( ', ', $svc_people ) . '" posts_per_page="-1" meta_key="ll_people_level" orderby="meta_value_num" order="ASC" wrapper="div" wrapper_class="slider slider-people mx-auto max-w-5xl" layout="slide-people" /]' );
                            endif;

                            if ( $svc_people_display === 'grid' ) :
                                echo do_shortcode( '[display-posts post_type="people" id="' . implode( ', ', $svc_people ) . '" posts_per_page="-1" meta_key="ll_people_level" orderby="meta_value_num" order="ASC" wrapper="div" wrapper_class="grid grid-auto-fit gap-8" layout="card-people-md" /]' );
                            endif; ?>

                        <?php endif; ?>

                    </div>
                </section>
                <?php endif; ?>

            </div>

            <div class="ind-grid-area-c">
                <div id="contact" class="p-4 border lg:p-8 bg-neutral-200 border-neutral-400 not-prose">
                    <?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
                </div>
            </div>

        </div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( $svc_people_display === 'slider' ) : ?>
<script>
  const slider = new A11YSlider(document.querySelector(".slider"), {
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true
  });
</script>
<?php endif; ?>
