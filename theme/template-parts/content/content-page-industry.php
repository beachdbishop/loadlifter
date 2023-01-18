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
$ind_excerpt = get_the_excerpt();
$ind_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $ind_featimg == true ) {
	$ind_featimg_url = $ind_featimg[0];
} else {
	$ind_featimg_url = '';
}
?>

<style>
<?php // We're setting inline styles here because we need to include the responsive gradient AND dynamic image URL in the same background-image declaration; ?>
.ind-feat-image { background-image: <?php echo $gradient; ?>, url('<?php echo esc_url( $ind_featimg_url ); ?>'); }
@media (min-width: 768px) { .ind-feat-image { background-image: <?php echo $easedGradient; ?>, url('<?php echo esc_url( $ind_featimg_url ); ?>'); } }
</style>

<header class="ind-feat-image | py-8 md:py-12 lg:py-24 bg-brand-blue-dark bg-no-repeat bg-cover bg-center print:py-8" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" aria-labelledby="page-title">
	<div class="px-1 md:container md:mx-auto md:px-0">
		<div class="w-full md:w-1/2 lg:w-1/3">
			<h1 class="mb-2 text-lg lg:text-xl text-brand-blue-faint " id="page-title"><i class="fa-duotone <?php echo esc_attr( $ind_icon ); ?>"></i> <?php echo get_the_title(); ?></h1>
			<h2 class="text-4xl leading-none tracking-tight text-transparent bg-gradient-to-r from-brand-blue-pale to-white bg-clip-text lg:text-5xl head-last-bold"><?php echo $ind_message['label']; ?></h2>
			<p class="mt-4 leading-normal text-white lg:text-lg"><?php echo $ind_excerpt; ?></p>
		</div>
		<?php if ( function_exists( 'bcn_display' ) && !is_front_page() ) { ?>
			<div class="breadcrumbs | font-head text-brand-gray-faint mt-4 md:mt-6 lg:mt-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>
	</div>
</header>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0">


		<div class="prose lg:prose-xl entry-content">
			<?php the_content(); ?>

			<div class="clear-both">&nbsp;</div>
		</div>

		<?php get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
