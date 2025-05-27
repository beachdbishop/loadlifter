<?php
/**
 * The template for displaying Event posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$events_limit = 3;
$archived_limit = 12;

$query_events_args = [
	'post_type' => 'post',
	'posts_per_page' => $events_limit,
	'post_status' => 'publish',
	'tax_query' => [
		[
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'events',
			'operator' => 'IN',
		],
		[
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'archived-events',
			'operator' => 'NOT IN',
		],
	],
	'orderby' => 'date',
	'order' => 'DESC'
];
$query_archived_events_args = [
	'post_type' => 'post',
	'posts_per_page' => $archived_limit,
	'post_status' => 'publish',
	'tax_query' => [
		[
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'archived-events',
			'operator' => 'IN',
		],
	],
	'orderby' => 'date',
	'order' => 'DESC'
];

$eventsQuery = new WP_Query( $query_events_args );
$archivedEventsQuery = new WP_Query( $query_archived_events_args );
?>

	<main id="primary" class="pt-4 bg-white  |  dark:bg-neutral-900 md:pt-6 lg:pt-8">
		<div class="px-2 container  |  lg:px-[16px] ">
			<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

			<header class="flex gap-4 mb-4">
				<div class="basis-2/3">
					<h1 class="text-orient-800  |  dark:text-orient-400">Events</h1>
				</div>
			</header>

			<div class="">
				<?php
				if ( $eventsQuery->have_posts() ) :
				?>
					<div class="flex items-center justify-between mb-4">
						<h2 class="font-semibold">Upcoming</h2>
						<?php
						// if ( $eventsQuery->found_posts > $blogposts_limit ) :
						// 	echo '<a href="/blog/" class="px-5 py-3 font-head font-semibold border-2 border-orient-700 rounded-lg text-orient-700  |  hover:text-orient-900 hover:border-orient-500 dark:hover:text-orient-500 dark:hover:border-orient-900">View All</a>';
						// endif;
						?>
					</div>
					<ul class="dps-grid-3max cards-ic">
					<?php
					while ( $eventsQuery->have_posts() ) :
						$eventsQuery->the_post();
						global $post;
						get_template_part( 'template-parts/content/content', 'card-ic' );
					endwhile;
					?>
					</ul>
				<?php
				wp_reset_query();
				endif;
				?>

				<div class="mt-8 ll-equal-vert-padding full-bleed bg-linear-to-br from-white to-neutral-200  |  dark:from-neutral-900 dark:to-neutral-700 lg:mt-16">
					<div class="px-2  |  lg:px-[16px]">
						<?php
						if ( $archivedEventsQuery->have_posts() ) :
						?>
							<div class="flex items-center justify-between mb-4">
								<h3 class="font-semibold">Archived Events</h3>
								<?php
								if ( $archivedEventsQuery->found_posts > $blogposts_limit ) :
									echo '<a href="/category/archived-events/" class="px-5 py-3 font-head font-semibold border-2 border-orient-700 rounded-lg text-orient-700  |  hover:text-orient-900 hover:border-orient-500 dark:hover:text-orient-500 dark:hover:border-orient-900">View All</a>';
								endif;
								?>
							</div>
							<ul class="dps-grid-4max cards-ic">
							<?php
							while ( $archivedEventsQuery->have_posts() ) :
								$archivedEventsQuery->the_post();
								global $post;
								get_template_part( 'template-parts/content/content', 'card-ic-min' );
							endwhile;
							?>
							</ul>
						<?php
						wp_reset_query();
						endif;
						?>
					</div>
				</div>
			</div>

		</div>
	</main><!-- #main -->

<?php
get_footer();
