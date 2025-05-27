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

$page_id                        = get_the_ID();
$page_id_industries             = ( wp_get_environment_type() == 'local' ) ? '3196' : '31923';

if ( get_field( 'll_page_title_override' ) ) {
	$page_title                 	= get_field( 'll_page_title_override' );
} else {
	$page_title                 	= get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

$page_icon											= ( get_field( 'll_page_icon' ) ) ? get_field( 'll_page_icon' ) : false;
$page_excerpt 									= get_the_excerpt();
$page_post_category							= get_field( 'll_ind_category' );
$page_cta_standard 							= get_field( 'll_ind_show_standard_cta' );
$page_cta_heading 							= get_field( 'll_ind_cta_heading' );
$page_cta_body 									= get_field( 'll_ind_cta_body' );
$page_cta_button_text 					= get_field( 'll_ind_cta_button_text' );
$page_cta_html 									= get_field( 'll_ind_cta_html' );
$page_groups_html 							= get_field( 'll_ind_groups_html' );
$page_people 										= get_field( 'll_ind_people' );
$page_people_display 						= get_field( 'll_ind_people_display_style' );
$page_form 											= get_field( 'ls_hs_form_html' );
$hero_cta1_text 								= get_field( 'll_hero_cta1_text' );
$hero_cta1_url 									= get_field( 'll_hero_cta1_url' );
$hero_cta2_text									= get_field( 'll_hero_cta2_text' );
$hero_cta2_url 									= get_field( 'll_hero_cta2_url' );


if ( $page_post_category ) {
	$qargs = [
		'post_type' => 'post',
		'posts_per_page' => 3,
		'post_status' => 'publish',
		'tax_query' => [
			[
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $page_post_category->slug,
			],
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
		'order' => 'DESC',
	];

	$resargs = [
		'post_type' => 'post',
		'posts_per_page' => 3,
		'post_status' => 'publish',
		'post__in' => get_option( 'sticky_posts' ),
		'tax_query' => [
			[
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' =>  $page_post_category->slug,
			],
			[
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => 'resources',
				'operator' => 'IN',
			],
		],
		'orderby' => 'date',
		'order' => 'DESC',
	];

	$query_team_args = [
		'post_type' => 'people',
		'post__in' => $page_people,
		'posts_per_page' => -1,
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_key' => 'll_people_last_name',
	];

	$postsQuery = new WP_Query( $qargs );
	$resourcesQuery = new WP_Query( $resargs );
	$teamQuery = new WP_Query( $query_team_args );
}
?>

	<main id="primary" class="bg-white  |  dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php echo ll_better_page_hero( $page_title, $page_message, $hero_cta1_text, $hero_cta1_url, $hero_cta2_text, $hero_cta2_url ); ?>

			<article id="post-<?php the_ID(); ?>"	<?php post_class(); ?>>
				<div class="px-2 container  |  lg:px-[16px]">
					<div class="mt-4 ll-page-grid  |  md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

						<div <?php ll_content_class( 'entry-content ll-page-grid-area-a  |  md:col-span-2' ); ?>>

							<?php the_content(); ?>

						</div>

						<div class="my-16 ll-page-grid-area-b  |  md:my-0 md:col-span-3">

							<?php if ( ( $page_post_category ) && ( $postsQuery->have_posts() ) ) : ?>

								<section class="full-bleed not-prose bg-neutral-800 text-neutral-100 ll-equal-vert-padding  |  print:hidden">
									<div class="post-grid  |  px-2  |  lg:px-[16px]">
										<div class="flex items-center justify-between mb-4">
											<h2>Insights</h2>
											<a href="/blog/" class="px-5 py-3 font-head font-semibold border-2 border-orient-400 rounded-lg text-orient-400  |  hover:text-neutral-100 hover:border-brand-blue">View All</a>
										</div>
										<?php
										echo '<ul class="dps-grid-3max cards-ic" data-cat="' . $page_post_category->slug . '">';
										while ( $postsQuery->have_posts() ) :
											$postsQuery->the_post();
											global $post;

											get_template_part( 'template-parts/content/content', 'card-ic-min' );
										endwhile;
										echo '</ul>';
										?>
									</div>
								</section>

								<?php /* The visual gap Eric requested between Insights and the CTA section */ ?>
								<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-md"></div>

							<?php
							wp_reset_query();
							endif;
							?>

							<?php
							if ( $page_cta_standard ) :

								get_template_part(
									'template-parts/layout/chunk', 'cta',
									$args = [
										'class' => 'cta-part',
										'part_data' => [
											'cta_heading' => $page_cta_heading,
											'cta_body' => $page_cta_body,
											'cta_button_text' => $page_cta_button_text,
											'cta_button_url' => '#contact',
										]
									]
								);

							elseif ( ( $page_cta_standard == false ) && ( !empty( $page_cta_html ) ) ) :
								echo do_shortcode( $page_cta_html );
							endif;
							?>

							<?php // SERVICE PROFESSIONALS AND INVOLVEMENT   ?>
							<?php if ( $page_people_display !== 'hide' || !empty( $page_groups_html ) ) : ?>
								<section class="full-bleed not-prose ll-equal-vert-padding  |  print:hidden">
									<div class="px-2  |  lg:px-[16px]">
										<?php
										$wrapper_class = '';
										if ( $page_people_display !== 'hide' && !empty( $page_people ) ) :
											$wrapper_class = count( $page_people ) > 4 ? 'slider slider-people mx-auto max-w-5xl' : 'dps-grid-4max';
											$wrapper_part = count( $page_people ) > 4 ? 'slide-people' : 'card-people-md';
											?>
											<h2>
												<?php
												$title_term = ( $post->post_parent == $page_id_industries ) ? 'Industry Professional' : 'Our Advisor';
												echo ll_is_plural( $page_people ) ? "{$title_term}s" : $title_term;
												?>
											</h2>

											<?php
											if ( $wrapper_class ) :
												echo '<div class="mt-4 ' . esc_attr( $wrapper_class ) . '">';
												while ( $teamQuery->have_posts() ) :
													$teamQuery->the_post();
													get_template_part(
														'template-parts/content/content',
														$wrapper_part
													);
												endwhile;
												echo '</div>';
											endif;

											wp_reset_postdata();
											?>
										<?php endif; ?>

										<?php
										// if ( !empty( $page_groups_html ) ) :
										// 	echo do_shortcode( $page_groups_html );
										// endif;
										?>
									</div>
								</section>
							<?php endif; ?>

						</div>

						<div class="ll-page-grid-area-c">
							<?php
							if ( get_field( 'll_normal_contact_form_location' ) == 1 ) :
								echo '<div id="contact" class="container-contact-form not-prose mb-8  |  lg:mb-16 motion-safe:animate-fade-in-from-top">';
								get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' );
								echo '</div>';
							endif;
							?>

							<?php
							if ( ( get_field( 'll_normal_contact_form_location' ) != 1 ) && ( $page_form ) ) :
								echo '<div id="contact" class="container-contact-form not-prose mb-8  |  lg:mb-16 motion-safe:animate-fade-in-from-top">';
								echo do_shortcode( $page_form );
								echo '</div>';
							endif;
							?>

							<?php if ( ( $page_post_category ) && ( $resourcesQuery->have_posts() ) ) :
							echo '<div class="ll-equal-vert-padding prose |    border border-pink-400 border-dashed">';
								echo '<h3>Resources</h3>';
								echo '<ul class="cards-ic" data-cat="' . $page_post_category->slug . '">';
								while ( $resourcesQuery->have_posts() ) :
									$resourcesQuery->the_post();
									global $post;

									// echo '<li><a href="' . esc_url( get_permalink( $post->ID ) ) . '">' . the_title() . '</a></li>';
									the_title( '<li class=""><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
								endwhile;
								echo '</ul>';
							echo '</div>';
							endif;
							?>

							<div class="h-1">&nbsp;</div>
						</div>

					</div>
				</div>
			</article>

			<?php if ( ( $page_people_display !== 'hide' ) && ( count( $page_people ) > 4 ) ) : ?>
				<script>
					const slider = new A11YSlider(document.querySelector(".slider"), {
						arrows: false,
						autoplay: true,
						autoplaySpeed: 5000,
						dots: true
					});
				</script>
			<?php endif; ?>

		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
