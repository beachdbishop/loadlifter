<?php
/**
 *
 * Template Name: Press Release
 * Template Post Type: post
 *
 * This is the template that displays a Press Release
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$post_id = get_the_ID();
$post_excerpt = get_the_excerpt();
$post_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $post_featimg == true ) {
	$post_featimg_url = $post_featimg[0];
} else {
	$post_featimg_url = '';
}
?>

<main id="primary" class="bg-white relative z-10 shadow-xl  |  lg:shadow-2xl dark:bg-neutral-900">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content/content', 'press-release' );

	endwhile; // End of the loop.
	?>

	<?php /*   P R E F O O T E R   A R E A   */   get_template_part( 'template-parts/siteblocks/pre', 'footer' ); ?>

</main><!-- #main -->

<?php
get_footer();
