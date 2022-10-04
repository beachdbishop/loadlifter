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
				<h2 class="leading-none tracking-tight text-transparent bg-gradient-to-r from-brand-blue-pale to-white bg-clip-text lg:text-6xl head-last-bold"><?php echo $brand_message; ?></h2>
			</header>
			<p class="text-lg leading-normal text-brand-blue-faint lg:text-2xl"><?php echo $page_excerpt; ?></p>
		</div>
	</div>
</div>

<div class="py-4 mb-0 bg-gradient-to-br from-brand-blue to-brand-blue-dark md:py-8 2xl:py-12">
	<section class="px-2 md:px-0 md:container md:mx-auto">
		<h2 class="text-brand-blue-pale">Trending Now</h2>
		<?php // echo do_shortcode( '[display-posts post_type="post,page,industries" id="2,1879,2019" ignore_sticky_posts="true" orderby="title" order="DESC" wrapper="div" wrapper_class="flex flex-wrap -mx-4 text-brand-blue-faint" layout="card-ondark" /]' ); ?>
		<?php echo do_shortcode( '[display-posts post_type="post,page,industries" id="2,1879,2019" ignore_sticky_posts="true" orderby="title" order="DESC" wrapper="div" wrapper_class="grid grid-auto-fit gap-8 -m-4 text-brand-blue-faint" layout="card-ondark" /]' ); ?>
	</section>
</div>

<section class="py-4 mb-4 bg-brand-blue-faint md:py-8 2xl:py-12">
	<div class="px-2 md:px-0 md:container md:mx-auto md:flex md:space-x-4">
		<div class="w-full md:w-1/3 lg:1/4">
			<h2 class="text-brand-red">Industry Expertise</h2>
			<p class="my-4">We work collaboratively with your business to take it to the next level. Whether you want to bring your dreams to fruition, solve problems, or get needed support when the stakes are the highest, we work with you to navigate change and prepare your organization for the future.</p>
			<div class="wp-block-buttons | text-center my-4">
				<div class="wp-block-button is-style-outline">
					<a class="wp-block-button__link wp-element-button has-brand-red-color has-text-color">Send us a request for proposal</a>
				</div>
			</div>
		</div>
		<div class="w-full md:mt-0 md:w-2/3 lg:3/4">
			<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="icon-flexgrid--w-label text-brand-blue" layout="li-fa-large-circle" /]' ); ?>
		</div>
	</div>
</section>

<div class="px-2 my-4 md:my-8 md:px-0 md:container md:mx-auto ">
	<h2 class="leading-normal text-brand-blue">Recent Posts</h2>
	<?php echo do_shortcode( '[display-posts posts_per_page="4" ignore_sticky_posts="true" orderby="date" order="DESC" wrapper="div" wrapper_class="grid grid-auto-fit gap-8 -mx-4" layout="card" /]' ); ?>
	<div class="wp-block-buttons | text-center my-4">
		<div class="wp-block-button is-style-outline">
			<a class="wp-block-button__link" href="/blog/">See more</a>
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
