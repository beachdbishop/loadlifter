<?php
/**
 * Template part for displaying cybersecurity landing page content
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
?>

<?php ll_page_hero( $page_title, $page_message['label'], $page_featimg_url ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'lp ' ); ?>>
	<div class="px-2 md:container md:mx-auto md:px-0">

		<div <?php ll_content_class( 'entry-content' ); ?>>

			<?php the_content(); ?>

			<div class="clear-both">&nbsp;</div>
		</div>


		<?php // commenting out for now... should probably include desired form within the page content
		// get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
