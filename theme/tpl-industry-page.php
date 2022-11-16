<?php
/*
 * Template Name: Industry Page
 * This is the template that displays an industry
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();
?>

	<main id="primary" class="industry-page | bg-white">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page-industry' );
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
