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

<article id="post-<?php the_ID(); ?>" <?php ll_content_class( 'event' ); ?>>
	<?php if ( get_field( 'll_hide_featured_image' ) === false ) : ?>
		<style>
		<?php // We're setting inline styles here because we need to include the responsive gradient AND dynamic image URL in the same background-image declaration; ?>
		.post-feat-image {background-image: <?php echo $gradient; ?>, url('<?php echo $post_featimg_url; ?>')}
		@media (min-width: 768px) {.post-feat-image {background-image: <?php echo $gradientmd; ?>, url('<?php echo $post_featimg_url; ?>')}}
		</style>
		<div class="post-feat-image | bg-center bg-cover" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="img" aria-label="<?php the_title_attribute(); ?>">
			<div class="px-1 py-8 md:container md:mx-auto md:px-0 md:py-12 lg:py-24 print:py-8">
				<div class="w-full min-h-[40vw] md:min-h-[30vw] lg:min-h-[20vw] md:w-1/2 lg:w-1/3">&nbsp;</div>
			</div>
		</div>
	<?php endif; ?>

	<?php the_content(); ?>

</article>
