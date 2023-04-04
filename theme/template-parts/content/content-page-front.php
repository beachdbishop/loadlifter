<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
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
$featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
$brand_message = 'Partners who value your <strong>vision</strong>.';
$page_excerpt = 'Work with us and experience the power of collaboration and what it can accomplish.';
?>

<header class="page-hero | ll-equal-vert-padding bg-brand-blue-dark bg-no-repeat bg-[right_33%_center] bg-cover lg:bg-center print:py-8" style="background-image: <?php echo $easedGradient; ?>, url('<?php echo esc_url( $featimg[0] ); ?>');" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="image" aria-label="<?php esc_attr_e( get_the_title(), 'loadlifter' ); ?>">
    <div class="flex flex-col justify-center px-2 min-h-[240px] md:container md:mx-auto md:px-0 md:min-h-hero">

        <div class="">
            <h1 class="leading-none text-white tracking-light text-shadow-lg shadow-neutral-900 lg:text-6xl"><?php echo $brand_message; ?></h1>
			<h2 class="mt-4 text-2xl leading-normal text-brand-blue-pale text-shadow-lg shadow-neutral-900 lg:text-4xl"><?php echo $page_excerpt; ?></h2>
		</div>

	</div>
    <?php if (function_exists('bcn_display') && !is_front_page()) { ?>
        <div class="breadcrumbs | container mx-auto px-2 md:px-0 font-head text-brand-gray-faint" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
    <?php } ?>
</header>

<article id="post-<?php the_ID(); ?>" <?php if ( !is_front_page() ) { post_class( 'py-4 md:py-6 lg:py-8' ); } ?>>
	<div class="px-1 md:container md:mx-auto md:px-0">

		<header>
			<?php
			if ( !is_front_page() ) {
				the_title( '<h1 class="entry-title | ">', '</h1>' );
			} else {
				the_title( '<h1 class="entry-title | hidden ">', '</h1>' );
			}
			?>
		</header>

		<div class="prose lg:prose-xl entry-content">
			<?php the_content(); ?>

			<div class="clear-both">&nbsp;</div>

			<?php
			wp_link_pages(
				array(
					'before' => '<div>' . esc_html__( 'Pages:', 'loadlifter' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
