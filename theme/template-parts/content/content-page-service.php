<?php
/**
 * Template part for displaying Service page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.7) 70%, rgba(0,0,0,0.2) 100%)';
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
$svc_id = get_the_ID();
// $svc_message = get_field( 'll_brand_message' );
if ( get_field( 'll_page_title_override' ) ) {
	$svc_title = get_field( 'll_page_title_override' );
} else {
	$svc_title = get_the_title();
}

$svc_icon = ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : false;
$svc_excerpt = get_the_excerpt();
$svc_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $svc_featimg == true ) {
	$svc_featimg_url = $svc_featimg[0];
} else {
	$svc_featimg_url = '';
}
?>

<style>
<?php if ( $svc_icon ) {
	echo ':root { --page-icon-class: ' . $svc_icon . ' }';
} ?><?php // We're setting inline styles here because we need to include the responsive gradient AND dynamic image URL in the same background-image declaration; ?>.page-hero { background-image: <?php echo $gradient; ?>, url('<?php echo esc_url( $svc_featimg_url ); ?>'); }
@media (min-width: 768px) { .page-hero { background-image: <?php echo $gradientmd; ?>, url('<?php echo esc_url( $svc_featimg_url ); ?>'); } }
</style>

<header class="page-hero | ll-equal-vert-padding bg-brand-blue-dark bg-no-repeat bg-[right_30%_center] bg-cover lg:bg-center print:py-8" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="img" aria-label="<?php the_title_attribute(); ?>">
	<div class="flex flex-col justify-center px-1 md:container md:mx-auto md:px-0 min-h-hero">

		<div class="md:flex">
			<div class="w-full md:w-1/2 lg:w-1/3">
				<h1 class="leading-none text-transparent tracking-light bg-gradient-to-r from-brand-blue-pale to-white bg-clip-text head-last-bold"><?php echo $svc_title; ?></h1>
				<p class="mt-4 leading-normal text-white lg:text-lg"><?php echo $svc_excerpt; ?></p>
			</div>
			<?php if ( $svc_icon ) : ?>
				<div class="hidden w-full md:flex md:items-center md:justify-end md:w-1/2 lg:w-2/3">
					<p class="text-neutral-100">
						<span class="fa-stack fa-4x fa-pull-right">
							<i class="fa-solid fa-circle fa-stack-2x"></i>
							<i class="fa-duotone <?php echo $svc_icon; ?> fa-stack-1x text-brand-blue"></i>
						</span>
					</p>
				</div>
			<?php endif; ?>
		</div>

	</div>
    <?php if ( function_exists( 'bcn_display' ) && !is_front_page() ) { ?>
        <div class="breadcrumbs | container mx-auto px-1 md:px-0 font-head text-brand-gray-faint mt-4 md:mt-6 lg:mt-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
    <?php } ?>
</header>

<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0">

		<div class="prose lg:prose-xl entry-content">
			<?php the_content(); ?>

			<div class="clear-both">&nbsp;</div>
		</div>

		<?php get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

		<?php
		// $parent = array_reverse(get_post_ancestors($post->ID));
		// $page_parent = get_post($parent[0]);
		// if ( 'consulting' == $page_parent->post_name ) {
		// 	get_template_part( 'template-parts/content/content-section', 'consulting' );
		// }
		?>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
