<?php
/**
 * Template part for displaying landing page content
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
$page_message = get_field( 'll_brand_message' );
$page_excerpt = get_the_excerpt();
$page_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $page_featimg == true ) {
	$page_featimg_url = $page_featimg[0];
} else {
	$page_featimg_url = '';
}
$page_form = get_field( 'll_hs_form_html' );
$page_below_fold_content = get_field( 'll_below_fold' );
?>

<?php ll_page_hero( $page_title, $page_message['label'], $page_featimg_url ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'lp ' ); ?>>
    <div class="px-2 md:container md:mx-auto md:px-0">
        <div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

            <div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>
                <?php the_content(); ?>
            </div>

            <div class="my-16 ll-page-grid-area-b md:my-0 md:col-span-3">
                <?php if ( $page_below_fold_content ) :
                    echo $page_below_fold_content;
                endif; ?>
            </div>

            <div class="ll-page-grid-area-c">
                <?php if ( $page_form ) :
                    echo do_shortcode( $page_form );
                endif; ?>
            </div>

        </div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
