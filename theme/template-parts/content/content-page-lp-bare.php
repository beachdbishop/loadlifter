<?php
/**
 * Template part for displaying landing page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$page_id                    = get_the_ID();
if (get_field('ll_page_title_override')) {
    $page_title             = get_field('ll_page_title_override');
} else {
    $page_title             = get_the_title();
}
$page_message               = get_field( 'll_brand_message' );
$page_excerpt               = get_the_excerpt();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'lp ' ); ?>>

    <div <?php ll_content_class( 'entry-content' ); ?>>
        <?php the_content(); ?>
    </div>

</article><!-- post-<?php the_ID(); ?> -->
