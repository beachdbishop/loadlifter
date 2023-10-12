<?php
/*
 * Template Name: Service or Industry Page
 * This is the template that displays Services or Industry pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();
?>

	<main id="primary" class="">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page-service' );
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
