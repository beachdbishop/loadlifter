<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Load_Lifter
 */

get_header();
?>

	<main id="primary" class="bg-amber-50 py-8  |  dark:bg-amber-950">

		<section class="px-2 container  |  lg:px-[16px]">
			<header>
				<h1 class="entry-title  |  text-amber-800 dark:text-amber-300"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'loadlifter' ); ?></h1>
			</header>

			<div <?php ll_content_class( 'entry-content' ); ?>>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'loadlifter' ); ?></p>

					<?php get_search_form(); ?>

					<div class="grid gap-4  |  md:grid-cols-2">
						<div>
								<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
						</div>
						<div>
							<h2><?php esc_html_e( 'Most Active Categories', 'loadlifter' ); ?></h2>
							<ul class="not-prose">
								<?php
								wp_list_categories(
									array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									)
								);
								?>
							</ul>
						</div>
					</div>

			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();
