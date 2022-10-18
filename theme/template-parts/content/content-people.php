<?php
/**
 * Template part for displaying a Person (single view)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$peepsep = ' <span class="sep opacity-60">|</span> ';
$peepauthor = get_field( 'll_people_user' );
$peep_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $peep_thumbnail ) {
	$headshot = esc_url( $peep_thumbnail[0] );
} else {
	$headshot = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
}
$peep_desigs = get_field( 'll_people_designations' );
$peep_title = get_field( 'll_people_title' );
$peep_level = get_field( 'll_people_level' );
$peep_department = get_field_object( 'll_people_department' );
$peep_dept_value = $peep_department['value'];
$peep_dept = $peep_dept_value['label'];
$peep_location = get_field_object( 'll_people_location' );
$peep_loc_value = $peep_location['value'];
$peep_loc = $peep_loc_value['label'];
$peep_quote = get_field( 'll_people_quote' );

if ( $peepauthor ) {
	$peepid = $peepauthor['ID'];
	$peepname = $peepauthor['display_name'];
	$peepnicename = $peepauthor['user_nicename'];
	$peepfirstname = $peepauthor['user_firstname'];
	$person_archivelink = sprintf( '<a href="/author/%1$s/">%2$s</a>', $peepnicename, $peepname );
	$peeppostcount = ( $peepauthor ) ? count_user_posts( $peepid, 'post', true ) : 0;
	$recent_year_barrier = date( "Y", strtotime( "-1 year" ) );
} else {
	$peepfirstname = '';
	$peeppostcount = 0;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4 md:py-6 lg:py-8' ); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0 ">

		<?php if ( function_exists( 'bcn_display' ) ) { ?>
			<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>

		<div class="peepgrid | md:grid md:grid-cols-3 md:gap-4 lg:grid-cols-4 lg:gap-x-10 lg:gap-y-8">

			<div class="peepgrid-a | pb-8 md:pt-2 md:pb-0">
				<?php ll_people_headshot(); ?>
			</div>

			<div class="peepgrid-b | md:col-span-2 md:row-span-2 lg:col-span-3">
				<header class="mb-4">
					<?php the_title( '<h1 class="entry-title | mb-0 text-brand-blue font-bold">', '</h1>' ); ?>

					<?php if( $peep_desigs ) { ?>
						<h2 class="leading-normal tracking-tight text-neutral-500"><?php echo $peep_desigs; ?></h2>
					<?php } ?>

					<?php if( $peep_title ) { ?>
						<h2 class="text-neutral-900">
							<?php echo $peep_title; ?>
						</h2>
					<?php } ?>

					<?php if ( ( $peep_dept ) || ( $peep_loc ) ) { ?>
						<div class="py-4 my-4 space-x-4 border-t border-b border-solid text-neutral-500 border-neutral-200 children:inline-block">

							<?php if( $peep_dept ) { ?>
								<span class="inline-comma-sep"><i class="fa-solid fa-people-group"></i> <?php echo '<span class="">' . esc_html($peep_dept) . '</span>'; ?></span>
							<?php } ?>

							<?php if( $peep_loc ) { ?>
								<span class=""><i class="fa-solid fa-location-dot"></i> <?php echo esc_html( $peep_loc ); ?></span>
							<?php } ?>

						</div>
					<?php } ?>
				</header>

				<div class="entry-content">
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

			<aside class="peepgrid-c | md:mt-0 ">
				<h5 class="text-brand-blue">Contact <?php if ( $peepfirstname != '' ) { echo $peepfirstname; } else { echo get_the_title(); } ?></h5>
				<p class="mb-4 todo">SOCIAL CONTACT BUTTONS</p>
				<?php if ( $peep_quote ) { ?>
				<hr class="mt-8">
				<blockquote class="peepquote | font-head font-medium italic text-xl text-brand-blue">&quot;<?php echo esc_html( $peep_quote ); ?>&quot;</blockquote>
				<?php } ?>

			</aside>
		</div>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( $peeppostcount > 0 ) : ?>
	<section id="posts-by-<?php the_ID(); ?>" <?php post_class( 'bg-brand-blue-faint py-4 md:py-6 lg:py-8' ); ?>>
		<div class="px-1 md:container md:mx-auto md:px-0 ">
			<h3 id="posts" class="mt-2 mb-4 text-4xl md:mb-8 text-brand-blue head-last-bold">Recent Insights by <strong><?php echo $person_archivelink; ?></strong></h3>
			<?php echo do_shortcode( '[display-posts wrapper="div" wrapper_class="dps-grid-4max" layout="card" author="'.$peepnicename.'" date_query_after="' .$recent_year_barrier. '-01-01" posts_per_page="3" orderby="modified" no_posts_message="No recent posts found by this author."]' ); ?>
		</div>
	</section>
<?php endif; ?>
