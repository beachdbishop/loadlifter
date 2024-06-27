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

get_header();

$page_id                        = get_the_ID();
if (get_field('ll_page_title_override')) {
     $page_title                = get_field('ll_page_title_override');
} else {
     $page_title                = get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

$page_excerpt                   = get_the_excerpt();
// $page_featimg                   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
// if ( $page_featimg == true ) {
// 	$page_featimg_url           = $page_featimg[0];
// } else {
// 	$page_featimg_url           = '';
// }
?>

	<main id="primary" class="bg-white dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page' );
			?>

            <?php if ( get_field( 'll_hide_featured_image' ) === false ) :
                echo ll_better_page_hero( $page_title, $page_message );
            endif; ?>

            <article id="post-<?php the_ID(); ?>" <?php if ( !is_front_page() ) { post_class( 'py-4 md:py-6 lg:py-8' ); } ?>>
                <div class="px-2 md:container xl:px-4">

                    <?php if ( get_field( 'll_hide_featured_image' ) === true ) { ?>
                        <?php if ( function_exists( 'bcn_display' ) ) { ?>
                            <div class="breadcrumbs | font-head text-neutral-600 pb-4 md:pb-6 lg:pb-8 dark:text-neutral-400 dark:text-neutral-400" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
                        <?php } ?>

                        <header class="mb-4">
                            <?php the_title( '<h1 class="entry-title | text-brand-blue">', '</h1>' ); ?>
                        </header>
                    <?php } ?>

                    <div <?php ll_content_class( 'entry-content' ); ?>>

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

                    <?php get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

                </div>
            </article>

            <?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
