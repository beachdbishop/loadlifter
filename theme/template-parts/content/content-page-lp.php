<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.7) 70%, rgba(0,0,0,0.2) 100%)';
$gradientmd = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
$page_id = get_the_ID();
$page_excerpt = get_the_excerpt();
$page_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $page_featimg == true ) {
	$page_featimg_url = $page_featimg[0];
} else {
	$page_featimg_url = '';
}
?>

<style>
<?php // We're setting inline styles here because we need to include the responsive gradient AND dynamic image URL in the same background-image declaration; ?>
.ind-feat-image { background-image: <?php echo $gradient; ?>, url('<?php echo esc_url( $page_featimg_url ); ?>'); }
@media (min-width: 768px) { .ind-feat-image { background-image: <?php echo $gradientmd; ?>, url('<?php echo esc_url( $page_featimg_url ); ?>'); } }
</style>

<div class="ind-feat-image | py-8 md:py-12 lg:py-24 bg-brand-blue-dark bg-center bg-cover bg-fixed print:py-8" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="image" aria-label="<?php esc_attr( get_the_title() ); ?>">
	<div class="px-1 md:container md:mx-auto md:px-0">
		<div class="w-full md:w-1/2 lg:w-1/3">
			<header class="mb-4">
				<?php the_title( '<h1 class="text-4xl leading-none tracking-tight text-transparent bg-gradient-to-r from-brand-blue-pale to-white bg-clip-text lg:text-5xl head-last-bold">', '</h1>' ); ?>
			</header>
			<p class="leading-normal text-white lg:text-lg"><?php echo $page_excerpt; ?></p>
		</div>
	</div>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'lp ' ); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0">

		<div class="prose lg:prose-xl entry-content">

			<?php the_content(); ?>

			<div class="clear-both">&nbsp;</div>
		</div>


		<?php // commenting out for now... should probably include desired form within the page content
		// get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
