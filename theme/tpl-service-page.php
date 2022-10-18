<?php
/*
 * Template Name: Service Page
 * This is the template that displays ...
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();
?>

	<main id="primary" class="service-page | bg-white">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page-service' );
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
