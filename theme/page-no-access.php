<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

if ( get_field( 'll_page_title_override' ) ) {
	$page_title                     = get_field( 'll_page_title_override' );
} else {
	$page_title                     = get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

$page_featimg                   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $page_featimg == true ) {
	$page_featimg_url               = $page_featimg[0];
} else {
	$page_featimg_url               = '';
}

get_header();
?>

<main id="primary" class="bg-white  |  dark:bg-neutral-900">

	<?php
	while (have_posts()) :
		the_post();
	?>

		<?php echo ll_better_page_hero( $page_title, $page_message ); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
			<div class="px-2 container  |  lg:px-[16px]">

				<div class="mt-4 ll-page-grid  |  md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

					<div <?php ll_content_class( 'entry-content ll-page-grid-area-a  |  md:col-span-2' ); ?>>

						<div class="prose  |  lg:prose-xl">
							<?php the_content(); ?>

							<?php // echo do_shortcode( '[display-posts post_type="post" date_query_after="2018-12-31" date_query_before="2020-01-01" posts_per_page="-1" layout="table-urls" /]' ); ?>
						</div>

					</div>

					<div class="ll-page-grid-area-b">
							<?php echo 'BBB' ?>
					</div>

					<div class="ll-page-grid-area-c">
						<div>CCC</div>
						<?php get_template_part( 'template-parts/form/form', 'webshare' ); ?>
					</div>

				</div>

			</div>
		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
