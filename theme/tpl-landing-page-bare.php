<?php
/*
 * Template Name: Bare Landing Page
 *
 * This is the template that displays a simplified, distraction-free page. Please note that most internal site links and menus are not shown.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$page_id                    = get_the_ID();
if (get_field('ll_page_title_override')) {
		$page_title             = get_field('ll_page_title_override');
} else {
		$page_title             = get_the_title();
}
$page_message               = get_field( 'll_brand_message' );
$page_excerpt               = get_the_excerpt();
?>

	<main id="primary" class="landing-page | bg-white dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page-lp-bare' );
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
				<div <?php ll_content_class( 'entry-content' ); ?>>
					<?php the_content(); ?>
				</div>
			</article>

		<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
