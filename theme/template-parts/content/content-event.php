<?php
/**
 * Template part for displaying Event posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<?php if ( get_field( 'll_hide_featured_image' ) === false ) :
	ll_featured_image();
endif; ?>

<article id="post-<?php the_ID(); ?>" <?php ll_content_class( 'event px-2 md:container lg:px-[16px]' ); ?>>
	<?php the_content(); ?>
</article>
