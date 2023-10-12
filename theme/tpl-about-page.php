<?php
/*
 * Template Name: About Page
 * This is the template that displays a page in the About section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();
?>

	<main id="primary" class="about-page | ">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page-about' );
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
