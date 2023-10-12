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
?>

	<main id="primary" class="landing-page | ">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page-lp-bare' );
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
