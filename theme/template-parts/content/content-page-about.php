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

?>

<?php ll_page_hero( $page_title, $page_message['label'], $page_featimg_url ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="px-2 md:container md:mx-auto md:px-0">
        <div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

            <div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>
                <?php the_content(); ?>
            </div>

            <div class="my-16 ll-page-grid-area-b md:my-0 md:col-span-3">
                <?php /* nothing in this section at this time. */ ?>
            </div>

            <div class="ll-page-grid-area-c">

                <div class="px-4 lg:px-8 lg:mb-8 not-prose ">
                    <h3 class="mb-4">Connect with us!</h3>
                    <div class="text-brand-blue"><?php echo do_shortcode( '[social_links /]' ); ?></div>
                </div>

                <div id="contact" class="p-4 border lg:p-8 bg-neutral-200 border-neutral-400 not-prose">
                    <?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
                </div>

            </div>

        </div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( $page_people_display === 'slider' ) : ?>
<script>
  const slider = new A11YSlider(document.querySelector(".slider"), {
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true
  });
</script>
<?php endif; ?>
