<?php
/**
 * Template part for displaying Service page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

// $gradient = 'linear-gradient(to right, rgba(0,102,142,1) 0%, rgba(0,102,142,0.8) 70%, rgba(0,102,142,0.2) 100%)';
// $gradientmd = 'linear-gradient(to right, rgba(0,102,142,1) 0%, rgba(0,102,142,0.9) 30%, rgba(0,102,142,0.2) 70%, rgba(0,102,142,0) 100%)';
$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.7) 70%, rgba(0,0,0,0.2) 100%)';
$gradientmd = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
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
} ?>
<?php // We're setting inline styles here because we need to include the responsive gradient AND dynamic image URL in the same background-image declaration; ?>
.svc-feat-image { background-image: <?php echo $gradient; ?>, url('<?php echo esc_url( $svc_featimg_url ); ?>'); }
@media (min-width: 768px) { .svc-feat-image { background-image: <?php echo $gradientmd; ?>, url('<?php echo esc_url( $svc_featimg_url ); ?>'); } }
</style>

<header class="svc-feat-image | py-8 md:py-12 lg:py-24 bg-brand-blue-dark bg-no-repeat bg-cover print:py-8" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="img" aria-label="<?php the_title_attribute(); ?>">
	<div class="px-1 md:container md:mx-auto md:px-0">

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

		<?php if ( function_exists( 'bcn_display' ) && !is_front_page() ) { ?>
			<div class="breadcrumbs | font-head text-brand-gray-faint mt-4 md:mt-6 lg:mt-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>
	</div>
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
