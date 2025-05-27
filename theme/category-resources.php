<?php
/**
 * The template for displaying Event posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$blogposts_limit = 3;
$reports_limit = 3;
$firminfo_limit = 3;

$query_blog_args = [
	'post_type' => 'post',
	'posts_per_page' => $blogposts_limit,
	'post_status' => 'publish',
	'tax_query' => [
		[
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'archived-events',
			'operator' => 'NOT IN',
		],
		[
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'resources',
			'operator' => 'NOT IN',
		],
	],
	'orderby' => 'date',
	'order' => 'DESC'
];
$query_reports_args = [
	'post_type' => 'post',
	'posts_per_page' => $reports_limit,
	'post_status' => 'publish',
	'tax_query' => [
		[
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'resources',
			'operator' => 'IN',
		],
		[
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'reports',
			'operator' => 'IN',
		],
	],
	'orderby' => 'date',
	'order' => 'DESC'
];
$query_firminfo_args = [
	'post_type' => 'post',
	'posts_per_page' => $firminfo_limit,
	'post_status' => 'publish',
	'tax_query' => [
		[
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'resources',
			'operator' => 'IN',
		],
		[
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'firminfo',
			'operator' => 'IN',
		],
	],
	'orderby' => 'date',
	'order' => 'DESC'
];

$postsQuery = new WP_Query( $query_blog_args );
$reportsQuery = new WP_Query( $query_reports_args );
$firminfoQuery = new WP_Query( $query_firminfo_args );
?>

	<main id="primary" class="bg-white  |  dark:bg-neutral-900">
		<div class="page-hero  |  wp-block-cover bg-neutral-950 ll-equal-vert-padding !px-0  |  print:py-4 print:bg-white print:text-black">
			<span aria-hidden="true" class="page-hero-overlay  |  z-[1] absolute top-0 right-0 bottom-0 left-0  |  print:hidden"></span>
			<img width="1920" height="625" src="https://beachfleischman.com/wp-content/uploads/2025/05/feat__resources.jpg" class="wp-block-cover__image-background not-transparent wp-post-image print:hidden not-transparent wp-post-image" alt="" decoding="async" srcset="https://beachfleischman.com/wp-content/uploads/2025/05/feat__resources.jpg 1920w, https://beachfleischman.com/wp-content/uploads/2025/05/feat__resources-500x163.avif 500w, https://beachfleischman.com/wp-content/uploads/2025/05/feat__resources-1200x391.avif 1200w, https://beachfleischman.com/wp-content/uploads/2025/05/feat__resources-768x250.avif 768w, https://beachfleischman.com/wp-content/uploads/2025/05/feat__resources-1536x500.avif 1536w" sizes="(782px < width) 1920px, (max-width: 1920px) 100vw, 1920px">
			<div class="wp-block-cover__inner-container  |  px-2 lg:px-4 print:!px-0">
				<div class="text-neutral-800 flex flex-col justify-center min-h-[240px]  |  md:min-h-(--height-hero) print:min-h-min">
					<hgroup class="space-y-6">
						<h1 class="leading-none text-white tracking-light text-pretty text-shadow-lg/50  |   lg:text-6xl lg:print:!text-xl print:text-black" style="text-wrap: unset;">Resources</h1>
						<p class="font-head text-2xl leading-none text-pretty text-shadow-lg/50 !text-orient-400  |  md:max-w-5xl lg:text-4xl lg:print:!text-base print:!text-black">Gain clarity for the road ahead.</p>
					</hgroup>
				</div>
				<!-- nav class="breadcrumbs  |  mt-4 font-head text-neutral-50  |  sm:mt-0 print:mt-8 print:text-black" aria-label="Breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org"><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to BeachFleischman CPAs." href="https://beachfleischman.com" class="home"><span property="name">Home</span></a><meta property="position" content="1"></span><span aria-hidden="true"> / </span><span property="itemListElement" typeof="ListItem"><span property="name" class="post post-page current-item">Resources</span><meta property="position" content="3"></span></nav -->
			</div>
		</div>


		<section class="ll-equal-vert-padding px-2 container  |  lg:px-[16px]">
			<?php
			if ( $postsQuery->have_posts() ) :
			?>
				<div class="flex items-center justify-between mb-4">
					<h2 class="font-semibold">Recent Blog Posts</h2>
					<?php
					if ( $postsQuery->found_posts > $blogposts_limit ) :
						echo '<a href="/blog/" class="px-5 py-3 font-head font-semibold border-2 border-orient-700 rounded-lg text-orient-700  |  hover:text-orient-900 hover:border-orient-500 dark:hover:text-orient-500 dark:hover:border-orient-900">View All</a>';
					endif;
					?>
				</div>
				<ul class="dps-grid-3max cards-ic">
				<?php
				while ( $postsQuery->have_posts() ) :
					$postsQuery->the_post();
					global $post;
					get_template_part( 'template-parts/content/content', 'card-ic' );
				endwhile;
				?>
				</ul>
			<?php
			wp_reset_query();
			endif;
			?>
		</section>


		<section class="full-bleed ll-equal-vert-padding bg-linear-to-br from-white to-neutral-200  |  dark:from-neutral-900 dark:to-neutral-700">
			<div class="px-2  |  lg:px-[16px]">
				<?php
				if ( $reportsQuery->have_posts() ) :
				?>
					<div class="flex items-center justify-between mb-4">
						<h3 class="font-semibold">Reports</h3>
						<?php
						if ( $reportsQuery->found_posts > $reports_limit ) :
							echo '<a href="/category/reports/" class="px-5 py-3 font-head font-semibold border-2 border-neutral-600 rounded-lg text-neutral-600  |  hover:text-neutral-900 hover:border-neutral-500 dark:border-neutral-400 dark:text-neutral-400 dark:hover:text-neutral-100">View All</a>';
						endif;
						?>
					</div>
					<ul class="dps-grid-3max cards-ic">
					<?php
					while ( $reportsQuery->have_posts() ) :
						$reportsQuery->the_post();
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
		</section>


		<section class="wp-block-cover has-text-color alignfull border-t-4 border-solid border-mahogany-700 ll-equal-vert-padding !px-0 bg-white  |  print:border-none print:bg-white">
			<span aria-hidden="true" class="bg-linear-to-br from-orient-50 to-orient-200 absolute top-0 right-0 bottom-0 left-0  |  dark:from-orient-800 dark:to-orient-950 print:hidden"></span>
			<div class="deferred wp-block-cover__image-background bg-size-[128px] bg-fixed opacity-5  |  print:hidden" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tile-bg-bflogocolor.png');"></div>

			<div class="wp-block-cover__inner-container is-layout-flow wp-block-cover-is-layout-flow px-2 | lg:px-[16px]">
				<?php
				if ( $firminfoQuery->have_posts() ) :
				?>
					<div class="flex items-center justify-between mb-4">
						<h3 class="font-semibold">Firm Information</h3>
						<?php
						if ( $firminfoQuery->found_posts > $firminfo_limit ) :
							echo '<a href="/category/firminfo/" class="px-5 py-3 font-head font-semibold border-2 border-neutral-600 rounded-lg text-neutral-600  |  hover:text-neutral-900 hover:border-neutral-500 dark:border-neutral-400 dark:text-neutral-400 dark:hover:text-neutral-100">View All</a>';
						endif;
						?>
					</div>

					<ul class="dps-grid-3max cards-ic">
					<?php
					while ( $firminfoQuery->have_posts() ) :
						$firminfoQuery->the_post();
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
		</section>

	</main><!-- #main -->

<?php
get_footer();
