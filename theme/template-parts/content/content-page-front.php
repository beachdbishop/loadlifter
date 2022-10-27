<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
$featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
$brand_message = 'Partners who value your <strong>vision</strong>.';
$page_excerpt = 'Work with us and experience the power of collaboration and what it can accomplish.';
?>

<div class="ind-feat-image | py-8 md:py-12 lg:py-20 bg-brand-blue-dark bg-center bg-cover bg-fixed" style="background-image: <?php echo $gradient; ?>, url('<?php echo esc_url( $featimg[0] ); ?>');" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="image" aria-label="<?php esc_attr_e( get_the_title(), 'loadlifter' ); ?>">
	<div class="px-1 min-h-[240px] flex items-center md:container md:mx-auto md:px-0 md:flex md:min-h-hero ">
		<div class="w-full md:w-1/2 ">
			<header class="mb-4">
				<h1 class="leading-none tracking-tight text-transparent bg-gradient-to-r from-brand-blue-pale to-white bg-clip-text lg:text-6xl head-last-bold"><?php echo $brand_message; ?></h1>
			</header>
			<p class="text-lg leading-normal text-brand-blue-faint lg:text-2xl"><?php echo $page_excerpt; ?></p>
		</div>
	</div>
</div>

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

		<div class="entry-content">
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
