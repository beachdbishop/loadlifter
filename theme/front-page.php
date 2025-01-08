<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$page_id_industries             = ( wp_get_environment_type() == 'local' ) ? '3196' : '31923';
$featimg                        = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
$featvideo                      = get_field( 'll_page_hero_video' );
$brand_message                  = get_field( 'll_brand_message' );
$page_excerpt                   = get_the_excerpt();
$trending                       = get_field( 'll_front_trending_items' );
$video_heading                  = 'Partners who value your vision';
$video_subheading               = 'Work with our advisors and experience the power of collaboration and what it can accomplish.';
$hero_cta1_text									= get_field( 'll_hero_cta1_text' );
$hero_cta1_url									= get_field( 'll_hero_cta1_url' );
$hero_cta2_text									= get_field( 'll_hero_cta2_text' );
$hero_cta2_url									= get_field( 'll_hero_cta2_url' );
?>

	<main id="primary" class="front-page | bg-white dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page-front' );
			?>

			<!-- <div class="page-hero | ll-equal-vert-padding bg-orient-900 bg-no-repeat overflow-hidden flex items-center justify-center print:py-8"> -->
			<div class="page-hero | wp-block-cover bg-neutral-950 ll-equal-vert-padding !px-0">
				<span class="page-hero-overlay | z-[1] absolute top-0 right-0 bottom-0 left-0"></span>

				<!-- <video playsinline autoplay muted loop poster="<?php echo $featimg[0]; ?>" class="absolute top-[-200px] left-0 object-cover w-full h-[1080px] print:hidden"> -->
				<video playsinline autoplay muted loop poster="<?php echo $featimg[0]; ?>" class="wp-block-cover__video-background intrinsic-ignore print:hidden" data-object-fit="cover">
					<source src="<?php echo $featvideo; ?>">
					<track src="<?php echo get_stylesheet_directory_uri(); ?>/img/beachfleischman-arizona-silent.vtt" kind="captions" srclang="en" label="english_captions">
					Your browser does not support the video tag.
				</video>

				<!-- <div class="overlay | absolute top-0 left-0 w-full h-[1080px] bg-neutral-800/70 lg:bg-transparent lg:bg-hero-gradient"></div> -->

				<!-- <div class="relative flex flex-col justify-center px-2 min-h-[240px] md:container lg:px-[16px] md:min-h-hero text-left"> -->
				<div class="wp-block-cover__inner-container text-left flex flex-col justify-center px-2 space-y-6 min-h-[240px] lg:px-[16px] md:min-h-hero">
					<h1 class="leading-none text-white tracking-light text-shadow shadow-neutral-950 lg:text-6xl">
						<?php echo $video_heading; ?>
					</h1>

					<p class="text-2xl leading-normal font-head max-w-[44ch] !text-orient-400 text-shadow shadow-neutral-950 lg:text-4xl">
						<?php echo $video_subheading; ?>
					</p>

					<?php if ( ( !empty( $hero_cta1_text ) ) && ( !empty( $hero_cta1_url ) ) ) : ?>
					<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
						<div class="inline-block m-0">
							<a class="border-2 inline-flex items-center justify-center px-5 py-3 font-head font-semibold no-underline rounded-lg text-neutral-100 !bg-brand-red-dark border-brand-red-dark shadow-md shadow-neutral-950 hover:border-white hover:text-white" href="<?php echo $hero_cta1_url; ?>">
								<?php echo $hero_cta1_text; ?>
							</a>
						</div>
						<?php if ( ( !empty( $hero_cta2_text ) ) && ( !empty( $hero_cta2_url ) ) ) { ?>
							<div class="inline-block m-0">
								<a class="border-2 inline-flex items-center justify-center px-5 py-3 font-head font-semibold no-underline rounded-lg bg-transparent border-neutral-200 text-neutral-200 shadow-md shadow-neutral-950 hover:bg-transparent hover:border-orient-400 hover:text-orient-400" href="<?php echo $hero_cta2_url; ?>">
									<?php echo $hero_cta2_text; ?>
								</a>
							</div>
						<?php } ?>
					</div>
					<?php endif; ?>

				</div>
			</div>

			<?php if ( get_the_content() ) : ?>
				<?php // Only display the content if it exists ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'll-equal-vert-padding bg-white dark:bg-neutral-800' ); ?>>
					<div class="px-2 md:container lg:px-[16px]">
						<header>
							<?php the_title( '<h1 class="entry-title | hidden ">', '</h1>' ); ?>
						</header>

						<div <?php ll_content_class( 'entry-content' ); ?>>
							<?php the_content(); ?>
						</div>

					</div>
				</article>
			<?php endif; ?>


			<section class="full-bleed ll-equal-vert-padding not-prose bg-brand-blue-dark bg-gradient-70 from-brand-blue-dark from-30% via-brand-blue via-50% to-brand-blue-dark to-90% bg-180pct">
				<div class="px-2 z-10 wp-block-group post-grid lg:px-[16px] has-orient-200-color">
					<h2 id="trending" class="mb-4  text-orient-200  |  lg:mb-8">Trending now</h2>
					<?php echo do_shortcode(
						'[display-posts
						post_type="post,page,industries"
						id="' . implode( ', ', $trending ) . '"
						ignore_sticky_posts="true"
						orderby="modified"
						order="DESC"
						wrapper="ul"
						wrapper_class="dps-grid-3max cards-ic text-orient-200"
						layout="card-ic-min" /]'
					); ?>
				</div>
			</section>


			<section class="full-bleed ll-equal-vert-padding not-prose bg-brand-gray-pale dark:bg-neutral-900 dark:text-neutral-300">
				<div class="ind-grid | px-2 lg:px-[16px]">
					<h2 id="industries" class="mb-4 lg:mb-8">Industry Knowledge</h2>
					<?php echo do_shortcode(
						'[display-posts
						post_type="page"
						post_parent="' . $page_id_industries . '"
						orderby="title"
						order="ASC"
						posts_per_page="-1"
						wrapper="div"
						wrapper_class="ind-card-flips is-style-default mx-auto max-w-6xl"
						layout="card-ic-flip-sm" /]'
					); ?>
				</div>
			</section>

			<section class="full-bleed ll-equal-vert-padding not-prose dark:bg-neutral-800 dark:text-neutral-300">
				<div class="post-grid | px-2 lg:px-[16px]">
					<div class="flex items-center justify-between mb-4">
						<h2 id="recent">Recent Posts</h2>
						<a href="/blog/" class="px-5 py-3 font-head font-semibold border-2 border-brand-blue rounded-lg text-brand-blue hover:text-brand-blue-dark hover:border-brand-blue-dark dark:text-orient-400 dark:border-orient-400 dark:hover:text-orient-200 dark:hover:border-orient-200">View All</a>
					</div>
					<?php

					echo do_shortcode(
						'[display-posts
						taxonomy="category"
						tax_term="events"
						tax_operator="NOT IN"
						posts_per_page="4"
						ignore_sticky_posts="true"
						orderby="date"
						order="DESC"
						wrapper="ul"
						wrapper_class="dps-grid-4max cards-ic"
						layout="card-ic" /]'
					); ?>
				</div>
			</section>

		<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
