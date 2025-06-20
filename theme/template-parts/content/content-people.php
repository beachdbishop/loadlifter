<?php
/**
 * Template part for displaying a Person (single view)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$peepsep                        = ' <span class="sep opacity-60">|</span> ';
$peepauthor                     = get_field( 'll_people_user' );
$peep_thumbnail                 = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $peep_thumbnail ) {
	$headshot                   = esc_url( $peep_thumbnail[0] );
} else {
	$headshot                   = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
}

if ( get_field( 'll_people_organization' ) === 'BeachFleischman' ) {
	$peep_class                 = 'internal';
} else {
	$peep_class                 = 'external';
}

$peep_level                     = get_field( 'll_people_level' );

if ( $peepauthor ) {
	$peepid                     = $peepauthor['ID'];
	$peepname                   = $peepauthor['display_name'];
	$peepnicename               = $peepauthor['user_nicename'];
	// $peepfirstname           = $peepauthor['user_firstname'];
	$person_archivelink         = sprintf( '<a href="/author/%1$s/">%2$s</a>', $peepnicename, $peepname );

	$args = [
		'author' => $peepid,
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 4,
		// 'suppress_filters' => true,
		'date_query' => ['after' => '-12 months']
	];

	$peepRecentPosts = new WP_Query( $args );
	$peepRecentPostsCount = $peepRecentPosts->found_posts; // how many posts match the query args

} else {
	$peepRecentPostsCount = 0;
}
?>

<article <?php post_class( 'py-4 md:py-6 lg:py-8' ); ?>>
	<div class="px-2 md:container lg:px-[16px]">

		<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

		<div class="peepgrid peep-<?php echo $peep_class; ?> peep-<?php echo esc_attr( $peep_level['value'] ); ?> | md:grid md:grid-cols-3 gap-4 lg:grid-cols-4 lg:gap-16">

			<div class="peepgrid-a | pb-8 md:pt-2 md:pb-0 md:order-2">
				<?php
				// echo "<div class=\"headshot-wrapper | relative before:content-[''] before:absolute before:top-2 before:left-2 before:w-full before:h-full before:bg-transparent before:bg-repeat before:bg-[bottom_right] before:bg-headshot print:before:bg-none\">";
				?>
				<div class="headshot-wrapper | relative before:content-[''] before:absolute before:top-2 before:left-2 before:w-full before:h-full before:bg-neutral-200 dark:before:bg-neutral-600 print:before:bg-none">
					<?php ll_people_headshot(); ?>
				</div>
			</div>

			<div class="peepgrid-b |  md:col-span-2 md:row-span-2 md:order-1 lg:col-span-3">
				<header class="mb-4">
					<?php
					if ( $peep_class === 'internal' ) {
						the_title( '<h1 class="entry-title | mb-0 text-orient-800  |  dark:text-orient-400 print:text-xl">', '</h1>' );

						if( get_field( 'll_people_designations' ) ) {
							echo sprintf( '<h2 class="leading-normal tracking-tight text-neutral-500 print:text-base">%1$s</h2>', get_field( 'll_people_designations' ) );
						}

						if( get_field( 'll_people_title' ) ) {
							echo sprintf( '<h2 class="text-neutral-700 dark:text-neutral-400 print:text-base">%1$s</h2>', get_field( 'll_people_title' ) );
						}

						if ( ( get_field_object( 'll_people_department' ) ) || ( get_field_object( 'll_people_location' ) ) ) {
							echo '<div class="py-4 my-4 space-x-4 border-t border-b border-solid border-neutral-200 text-neutral-700  |  dark:text-neutral-400 dark:border-neutral-700 print:my-1 print:text-sm">';
								$peep_department = get_field_object( 'll_people_department' );
								$peep_dept_value = $peep_department['value'];
								if ( $peep_dept_value ) {
									ll_people_show_dept_list( $peep_dept_value );
								}

								$peep_location = get_field_object( 'll_people_location' );
								$peep_loc_value = $peep_location['value'];
								$peep_loc = $peep_loc_value['label'];
								if ( $peep_loc ) {
									ll_people_show_location( $peep_loc );
								}

							echo '</div>';
						}
					} else {
						the_title( '<h1 class="entry-title | mb-0 text-brand-blue font-bold">', '</h1>' );

						if( get_field( 'll_people_title' ) ) {
							echo sprintf( '<h2 class="text-neutral-900">%1$s</h2>', get_field( 'll_people_title' ) );
						}

						if ( get_field( 'll_people_organization' ) ) {
							echo sprintf( '<h2 class="text-neutral-600">%1$s</h2>', get_field( 'll_people_organization' ) );
						}
					}
					?>
				</header>

				<div <?php ll_content_class( 'entry-content' ); ?>>
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span> "%s"</span>', 'loadlifter' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
					?>
					<div class="clear-both">&nbsp;</div>

				</div>
			</div>

			<aside class="peepgrid-c | md:mt-0 md:order-3">
				<?php get_template_part( 'template-parts/form/form-hubspot-contact', 'main' ); ?>

				<?php if ( get_field( 'll_people_quote' ) ) { ?>
				<hr class="mt-8">
				<blockquote class="peepquote | font-head font-medium italic text-xl text-brand-blue">&quot;<?php echo esc_html( get_field( 'll_people_quote' ) ); ?>&quot;</blockquote>
				<?php } ?>

			</aside>
		</div>

	</div>

</article>



<?php if ( $peepRecentPostsCount > 0 ) : ?>
	<section id="posts-by-<?php the_ID(); ?>" <?php post_class( 'bg-neutral-100 ll-equal-vert-padding dark:bg-neutral-950' ); ?>>
		<div class="px-2 md:container lg:px-[16px]">
			<h3 id="posts" class="mt-2 mb-4 text-4xl md:mb-8 text-brand-blue head-last-bold dark:text-neutral-300">Recent Insights by <strong><?php echo $person_archivelink; ?></strong></h3>
			<ul class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
				<?php /* Start the Loop */
				while ( $peepRecentPosts->have_posts() ) :
					$peepRecentPosts->the_post();
					global $post;

					get_template_part('template-parts/content/content', 'card-ic');
				endwhile;
				?>
			</ul>

		</div>
	</section>
<?php endif; ?>
