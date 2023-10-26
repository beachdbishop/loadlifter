<?php
/**
 *
 * Template Name: Event
 * Template Post Type: post
 *
 * This is the template that displays an Event (webinar, seminar, mixer, etc)
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

<main id="primary" class="">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content/content', 'event' );

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
