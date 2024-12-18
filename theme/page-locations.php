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

$page_id = get_the_ID();
if (get_field('ll_page_title_override')) {
	$page_title = get_field('ll_page_title_override');
} else {
	$page_title = get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message = get_field( 'll_custom_subheader' );
} else {
	$brand_message = get_field( 'll_brand_message' );
	$page_message = $brand_message['label'];
}

$page_excerpt = get_the_excerpt();
$hero_cta1_text = get_field( 'll_hero_cta1_text' );
$hero_cta1_url = get_field( 'll_hero_cta1_url' );
$hero_cta2_text = get_field( 'll_hero_cta2_text' );
$hero_cta2_url = get_field( 'll_hero_cta2_url' );
?>

	<main id="primary" class="bg-white dark:bg-neutral-900">

	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<?php echo ll_better_page_hero( $page_title, $page_message, $hero_cta1_text, $hero_cta1_url, $hero_cta2_text, $hero_cta2_url ); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="px-2 md:container lg:px-[16px]">
				<div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

					<div <?php ll_content_class( 'll-page-grid-area-a | entry-content md:col-span-2' ); ?>>
						<?php the_content(); ?>

						<ul class="cards-ic not-prose is-style-list-none grid gap-4 text-neutral-600 mt-8  |  lg:grid-cols-2 lg:gap-8 dark:text-neutral-400">
						<?php
						foreach( LL_COMPANY_LOCATIONS as $office ) {
							// echo '<div>' . $office['city'] . '</div>';
							// echo '<li class="card-ic card-' . $office['city'] . ' | group flex flex-col relative border-neutral-200 border-2 shadow-orient-700 focus-within:shadow-lg focus-within:border-neutral-500 dark:border-neutral-700 dark:shadow-orient-500">';
							echo '<li class="card-ic card--' . strtolower( $office['city'] ) . '  |  group flex flex-col ">';

							echo '<div class="card-text  |  bg-orient-100 order-1 grow !p-8  |  dark:text-neutral-300">';
							echo '<h3 class="font-semibold leading-tight text-2xl mb-2">';
							echo '<a class="" href="/locations' . $office['link'] . '">' . $office['city'] . ', ' . $office['state'] . '</a>';
							echo '</h3>';
							echo ll_footer_address_clean( $office );
							echo '</div>';

							echo '<div class="card-img  |  bg-mahogany-300 overflow-hidden">';
							echo '<img alt="" src="' . $office['mapshot'] . '" class="min-h-60 w-full object-cover transition duration-200 ease-in-out group-hover:scale-110" />';
							echo '</div>';

							echo '</li>';
						}
						?>
						</ul>

					</div>

					<div class="ll-page-grid-area-b | my-16 md:my-0 md:col-span-3">
						<!-- BBB -->
					</div>

					<div class="ll-page-grid-area-c">
						<?php if ( get_field( 'll_normal_contact_form_location' ) == 1 ) : ?>
							<div id="contact" class="container-contact-for not-prose motion-preset-slide-up mb-8 lg:mb-16">
								<?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
							</div>
						<?php endif; ?>

						<?php // get_template_part( 'template-parts/form/form', 'webshare' ); ?>

						<div class="h-1">&nbsp;</div>
					</div>

				</div>
			</div>
		</article>

		<?php
	endwhile; // End of the loop.
	?>

	</main><!-- #main -->

<?php
get_footer();
