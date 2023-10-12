<?php
/*
 * Template Name: Careers Page
 * This is the template that displays an pages in the Careers section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();
?>

	<main id="primary" class="careers-page | ">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page-careers' );
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
