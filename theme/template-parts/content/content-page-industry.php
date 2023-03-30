<?php
/**
 * Template part for displaying Industry page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.9) 60%, rgba(0,0,0,0.7) 75%, rgba(0,0,0,0.5) 90%, rgba(0,0,0,0.2) 100%)';
$easedGradient = 'linear-gradient(
	  to right,
	  hsla(0, 0%, 0%, 0.97) 0%,
	  hsla(210, 50%, 0.78%, 0.959) 8.1%,
	  hsla(210, 66.67%, 2.35%, 0.928) 15.5%,
	  hsla(206.25, 61.54%, 5.1%, 0.88) 22.5%,
	  hsla(206.67, 62.79%, 8.43%, 0.817) 29%,
	  hsla(207, 62.5%, 12.55%, 0.744) 35.3%,
	  hsla(207.78, 61.36%, 17.25%, 0.664) 41.2%,
	  hsla(207.43, 62.5%, 21.96%, 0.578) 47.1%,
	  hsla(208.24, 62.04%, 26.86%, 0.492) 52.9%,
	  hsla(207.92, 62.73%, 31.57%, 0.406) 58.8%,
	  hsla(208.17, 62.16%, 36.27%, 0.326) 64.7%,
	  hsla(208.13, 62.14%, 40.39%, 0.253) 71%,
	  hsla(208.06, 62.33%, 43.73%, 0.19) 77.5%,
	  hsla(207.76, 62.03%, 46.47%, 0.142) 84.5%,
	  hsla(207.84, 62.45%, 48.04%, 0.111) 91.9%,
	  hsla(207.87, 62.25%, 48.82%, 0.1) 100%
	)';
$ind_id = get_the_ID();

$ind_icon = ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : false;
$ind_message = get_field( 'll_brand_message' );
// $ind_excerpt = get_the_excerpt();
$ind_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $ind_featimg == true ) {
	$ind_featimg_url = $ind_featimg[0];
} else {
	$ind_featimg_url = '';
}

$ind_post_category = get_field( 'll_ind_category' );
$ind_cta_html = get_field( 'll_ind_cta_html' );
$ind_groups_html = get_field( 'll_ind_groups_html' );
$ind_people = get_field( 'll_ind_people' );
$ind_people_display = get_field( 'll_ind_people_display_style' );
// if ( $ind_people_display === 'slider' ) {
//     add_action( 'wp_enqueue_scripts', 'll_forceenq_a11y_slider_assets' );
// }
?>

<style><?php // We're setting inline styles here because we need to include the responsive gradient AND dynamic image URL in the same background-image declaration; ?>.page-hero { background-image: <?php echo $gradient; ?>, url('<?php echo esc_url( $ind_featimg_url ); ?>'); }
@media (min-width: 768px) { .page-hero { background-image: <?php echo $easedGradient; ?>, url('<?php echo esc_url( $ind_featimg_url ); ?>'); } }</style>

<header class="page-hero | py-8 md:py-12 bg-brand-blue-dark bg-no-repeat bg-[right_33%_center] bg-cover lg:bg-center print:py-8" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" aria-label="<?php the_title_attribute(); ?>">
	<div class="flex flex-col justify-center px-2 md:container md:mx-auto md:px-0 min-h-hero">

		<div class="">
            <h1 class="leading-none text-white tracking-light text-shadow-lg shadow-neutral-900 md:text-6xl"><?php echo get_the_title(); ?></h1>
			<h2 class="mt-4 text-2xl leading-normal text-brand-blue-pale text-shadow-lg shadow-neutral-900 md:text-4xl"><?php echo $ind_message['label']; ?></h2>
			<!-- <p class="mt-4 leading-normal text-white lg:text-lg"><?php // echo $ind_excerpt; ?></p> -->
		</div>

	</div>
    <?php if (function_exists('bcn_display') && !is_front_page()) { ?>
        <div class="breadcrumbs | container mx-auto px-2 md:px-0 font-head text-brand-gray-faint mt-4 md:mt-6 lg:mt-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
    <?php } ?>
</header>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="px-2 md:container md:mx-auto md:px-0">
        <div class="entry-cont | industry-page-grid my-4 md:gap-8 md:my-8 md:grid md:auto-rows-auto lg:my-16 lg:gap-16">

            <div class="ind-grid-area-a md:col-span-2 | prose lg:prose-xl">
                <?php the_content(); ?>
            </div>

            <div class="my-16 ind-grid-area-b md:my-0 md:col-span-3">

                <?php if ( $ind_post_category ) : ?>
                    <section class="py-4 full-bleed not-prose bg-neutral-900 text-neutral-100 md:py-8 lg:py-16">
                        <div class="post-grid | px-2 text-neutral-100 md:container md:mx-auto md:px-0">
                            <div class="flex items-center justify-between mb-4">
                                <h3>Insights</h3>
                                <a href="/blog/" class="px-4 py-2 border-2 rounded-lg border-neutral-300 text-neutral-300 hover:text-brand-blue-pale hover:border-white">View All</a>
                            </div>
                            <?php echo do_shortcode( '[display-posts taxonomy="category" tax_term="' . $ind_post_category->slug . '" tax_operator="IN" taxonomy_2="category" tax_2_term="archived-events" tax_2_operator="NOT IN" orderby="date" order="DESC" posts_per_page="3" wrapper="div" wrapper_class="dps-grid-3max" layout="card-simple" /]' ); ?>
                        </div>
                    </section>
                <?php endif; ?>

                <?php // CTA
                if ( $ind_cta_html ) :
                    echo '<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-md"></div>';
                    echo $ind_cta_html;
                endif;
                ?>

                <?php // INDUSTRY PROFESSIONALS AND INVOLVEMENT   ?>
                <section class="py-4 bg-white full-bleed not-prose md:py-8 lg:py-16">
                    <div class="px-2 md:container md:mx-auto md:px-0">
                        <?php if ( ( $ind_people ) && ( $ind_people_display != 'hide' ) ) : ?>
                            <h3 class="text-brand-red">Industry Professionals</h3>

                            <?php
                            if ( $ind_people_display === 'slider' ) :
                                echo do_shortcode( '[display-posts post_type="people" id="' . implode( ', ', $ind_people ) . '" posts_per_page="-1" meta_key="ll_people_level" orderby="meta_value_num" order="ASC" wrapper="div" wrapper_class="slider slider-people mx-auto max-w-5xl" layout="slide-people" /]' );
                            endif;

                            if ( $ind_people_display === 'grid' ) :
                                // echo '<pre class="todo">$ind_people = ' . implode( ', ', $ind_people ) . '</pre>';
                                echo do_shortcode( '[display-posts post_type="people" id="' . implode( ', ', $ind_people ) . '" posts_per_page="-1" meta_key="ll_people_level" orderby="meta_value_num" order="ASC" wrapper="div" wrapper_class="grid grid-auto-fit gap-8" layout="card-people-md" /]' );
                            endif; ?>

                        <?php endif; ?>

                        <?php if ( $ind_groups_html ) :
                            echo $ind_groups_html;
                        endif; ?>
                    </div>
                </section>

            </div>

            <div class="ind-grid-area-c">
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
