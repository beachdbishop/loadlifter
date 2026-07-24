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

$page_id = get_the_ID();
if (get_field('ll_page_title_override')) {
  $page_title = get_field('ll_page_title_override');
} else {
	$page_title = get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message = get_field( 'll_custom_subheader' );
} else {
	$brand_message = get_field( 'll_brand_message' );
	$page_message = $brand_message['label'];
}

$page_excerpt = get_the_excerpt();
$page_form = get_field( 'ls_hs_form_html' );
?>

	<main id="primary" class="bg-white relative z-10 shadow-xl  |  lg:shadow-2xl dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page' );
			?>

			<?php if ( get_field( 'll_hide_featured_image' ) === false ) :
					echo ll_better_page_hero( $page_title, $page_message );
			endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php if ( !is_front_page() ) { post_class( 'py-4  |  lg:py-16' ); } ?>>
				<div class="px-2 container  |  lg:px-4">

					<?php if ( get_field( 'll_hide_featured_image' ) === true ) { ?>
						<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

						<header class="mb-4">
							<?php the_title( '<h1 class="entry-title  |  text-orient-800  |  dark:text-orient-400">', '</h1>' ); ?>
						</header>
					<?php } ?>

					<div <?php ll_content_class( 'entry-content' ); ?>>

						<?php the_content(); ?>

						<!-- div class="clear-both">&nbsp;</div -->

						<?php
						wp_link_pages(
							array(
								'before' => '<div>' . esc_html__( 'Pages:', 'loadlifter' ),
								'after'  => '</div>',
							)
						);
						?>
					</div>

					<?php // get_template_part( 'template-parts/form/form', 'hubspot' ); ?>
					<?php
					if ( get_field( 'll_normal_contact_form_location' ) == 1 ) :
						echo '<div id="contact" class="container-contact-form not-prose  |  motion-safe:animate-fade-in-from-top">';
						get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' );
						echo '</div>';
					endif;
					?>

					<?php
					if ( ( get_field( 'll_normal_contact_form_location' ) != 1 ) && ( $page_form ) ) :
						echo '<div id="contact" class="container-contact-form not-prose  |  motion-safe:animate-fade-in-from-top">';
						echo do_shortcode( $page_form );
						echo '</div>';
					endif;
					?>

				</div>
			</article>

			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
