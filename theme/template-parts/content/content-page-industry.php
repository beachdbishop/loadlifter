<?php
/**
 * Template part for displaying Industry page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.9) 60%, rgba(0,0,0,0.7) 75%, rgba(0,0,0,0.5) 90%, rgba(0,0,0,0.2) 100%)';
$gradientmd = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
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
$page_content_main = get_field( 'll_content_main' );
$page_content_sec = get_field( 'll_content_secondary' );
$ind_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $ind_featimg == true ) {
	$ind_featimg_url = $ind_featimg[0];
} else {
	$ind_featimg_url = '';
}
?>

<style>
<?php // We're setting inline styles here because we need to include the responsive gradient AND dynamic image URL in the same background-image declaration; ?>
/* .page-hero { background-image: <?php // echo $gradient; ?>, url('<?php // echo esc_url( $ind_featimg_url ); ?>'); }
@media (min-width: 768px) { .page-hero { background-image: <?php // echo $easedGradient; ?>, url('<?php // echo esc_url( $ind_featimg_url ); ?>'); } } */
.page-hero { background-image: <?php echo $easedGradient; ?>, url('<?php echo esc_url( $ind_featimg_url ); ?>'); }
</style>

<header class="page-hero | py-8 md:py-12 bg-brand-blue-dark bg-no-repeat bg-[right_33%_center] bg-cover lg:bg-center print:py-8" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" aria-label="<?php the_title_attribute(); ?>">
	<div class="flex flex-col justify-center px-1 md:container md:mx-auto md:px-0 min-h-hero">

		<div class="">
            <h1 class="leading-none text-white tracking-light text-shadow-lg shadow-neutral-900 md:text-6xl"><?php echo get_the_title(); ?></h1>
			<h2 class="mt-4 text-2xl leading-normal text-brand-blue-pale text-shadow-lg shadow-neutral-900 md:text-4xl"><?php echo $ind_message['label']; ?></h2>
			<!-- <p class="mt-4 leading-normal text-white lg:text-lg"><?php // echo $ind_excerpt; ?></p> -->
		</div>

	</div>
    <?php if (function_exists('bcn_display') && !is_front_page()) { ?>
        <div class="breadcrumbs | container mx-auto px-1 md:px-0 font-head text-brand-gray-faint mt-4 md:mt-6 lg:mt-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
    <?php } ?>
</header>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0">
        <div class="entry-cont | industry-page-grid mt-4 md:mt-8 md:grid md:auto-rows-auto md:gap-2 lg:mt-16 lg:gap-8">

            <div class="ind-grid-area-a md:col-span-2 | prose lg:prose-xl">
                <?php echo do_shortcode( $page_content_main ); ?>
            </div>

            <?php if ( $page_content_sec ) { ?>
            <div class="ind-grid-area-b md:col-span-3">
                <?php echo do_shortcode( $page_content_sec ); ?>
            </div>
            <?php } ?>

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
