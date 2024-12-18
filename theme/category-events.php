<?php
/**
 * The template for displaying Event posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();
?>

	<main id="primary" class="pt-4 bg-white dark:bg-neutral-900 md:pt-6 lg:pt-8">
		<div class="px-2 md:container lg:px-[16px] ">
			<?php if ( function_exists( 'bcn_display' ) ) { ?>
				<div class="breadcrumbs | font-head text-neutral-600 pb-4 md:pb-6 lg:pb-8 dark:text-neutral-400" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
			<?php } ?>

			<header class="flex gap-4 mb-4">
				<div class="basis-2/3">
					<h1 class="text-brand-blue">Events</h1>
				</div>
			</header>

			<div class="">
				<h2 class="mb-4 font-bold font-sans text-neutral-600 dark:text-neutral-400">Upcoming</h2>
				<?php echo do_shortcode( '[display-posts
					category="events"
					tag="upcoming"
					orderby="date"
					order="DESC"
					wrapper="ul"
					wrapper_class="dps-grid-3max cards-ic"
					layout="card-ic"
					no_posts_message="Check back for upcoming events."
					/]' ); ?>

				<div class="mt-8 ll-equal-vert-padding full-bleed not-prose bg-gradient-to-br from-neutral-100 to-neutral-300 dark:bg-gradient-to-br dark:from-neutral-800 dark:to-neutral-600">
					<div class="px-2 md:container lg:px-[16px]">
						<h3 class="mb-4 tracking-wide uppercase font-sans">Archived Events</h3>
						<?php // echo do_shortcode( '[display-posts category="archived-events" orderby="date" order="DESC" wrapper="div" wrapper_class="dps-grid-4max" layout="card-simple" /]' );
						echo do_shortcode('[display-posts
						taxonomy="category"
						tax_term="events"
						tax_operator="IN"
						taxonomy_2="post_tag"
						tax_2_term="upcoming"
						tax_2_operator="NOT IN"
						orderby="date"
						order="DESC"
						wrapper="ul"
						wrapper_class="dps-grid-4max cards-ic"
						layout="card-ic-min"
						/]'); ?>
					</div>
				</div>
			</div>

		</div>
	</main><!-- #main -->

<?php
get_footer();
