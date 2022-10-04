<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$peepsep = ' <span class="sep opacity-60">|</span> ';
$peepdesig = get_field( 'person_desig' );
$peeptitle = get_field( 'person_title' );
$peepauthor = get_field( 'linked_author');
if ( $peepauthor ) {
	$peepid = $peepauthor['ID'];
	$peepname = $peepauthor['display_name'];
	$peepnicename = $peepauthor['user_nicename'];
	$peepfirstname = $peepauthor['user_firstname'];
	$person_archivelink = sprintf( '<a href="/author/%1$s/">%2$s</a>', $peepnicename, $peepname );
	// $peepcard = ( ( $peepid > 0 ) && ( function_exists( 'sitefunx_generate_card' ) ) ) ? sitefunx_generate_card( $peepid, 'vCard' ) : "&nbsp;";
	$peeppostcount = ( $peepauthor ) ? count_user_posts( $peepid, 'post', true ) : 0;
	$recent_year_barrier = date( "Y", strtotime( "-1 year" ) );
} else {
	$peepfirstname = '';
	$peeppostcount = 0;
}
$peepofficeq = get_the_terms( get_the_ID(), 'location' );
$peepdeptq = get_the_terms( get_the_ID(), 'department' );
if( $peepdeptq && !is_wp_error( $peepdeptq ) ) {
	$deptlist = [];
	foreach( $peepdeptq as $dept ) {
		$depts[] = $dept->name;
	}
	$peepdept = join( $peepsep, $depts );
}
if( $peepofficeq && !is_wp_error( $peepofficeq ) ) {
	$officelist = [];
	foreach( $peepofficeq as $office ) {
		$offices[] = $office->name;
	}
	$peepoffice = join( ", ", $offices );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4 md:py-6 lg:py-8' ); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0 ">

		<?php if ( function_exists( 'bcn_display' ) ) { ?>
			<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>

		<div class="peepgrid | md:grid md:grid-cols-3 md:gap-4 lg:grid-cols-4 lg:gap-8">

			<div class="peepgrid-a | pb-8 md:pt-2 md:pb-0">
				<?php ll_people_headshot(); ?>
			</div>

			<div class="peepgrid-b | md:col-span-2 md:row-span-2 lg:col-span-3">
				<header class="mb-4">
					<?php the_title( '<h1 class="entry-title | mb-0 text-brand-blue font-bold">', '</h1>' ); ?>

					<?php if( $peepdesig ) { ?>
						<h6 class="tracking-tight text-brand-blue font-head"><?php echo $peepdesig; ?></h6>
					<?php } ?>

					<?php if( $peeptitle ) { ?>
						<h2 class="text-neutral-900 font-head">
							<?php echo $peeptitle; ?>
							<?php
							// if( $peeptitle === 'Principal' ) {
								// echo ' | ' . $peepdept . ' Department';
							// }
							?>
						</h2>
					<?php } ?>

					<div class="my-4 space-x-4 text-sm text-neutral-600 children:inline-block lg:my-6">
						<?php if( $peepdept ) { ?>
							<span class=""><i class="fa-solid fa-people-group"></i> <?php echo $peepdept; ?></span>
						<?php } ?>
						<?php if( $peepoffice ) { ?>
							<span class=""><i class="fa-solid fa-location-dot"></i> <?php echo $peepoffice; ?></span>
						<?php } ?>
					</div>
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
					<?php
					wp_link_pages(
						array(
							'before' => '<div>' . esc_html__( 'Pages:', 'loadlifter' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			</div>

			<aside class="peepgrid-c | md:mt-0 ">
				<h5 class="text-brand-blue">Contact <?php if ( $peepfirstname != '' ) { echo $peepfirstname; } else { echo get_the_title(); } ?></h5>
				<p class="mb-4 todo">SOCIAL CONTACT BUTTONS</p>
				<blockquote class="peepquote | font-head font-medium italic text-xl text-brand-blue">"We come to work every day excited to make a difference. We will seize the opportunities of our changing world by building on our purpose and the great strength of the BeachFleischman culture."</blockquote>
				<hr class="mt-8">
				<p class="todo">NOTE: Do we want to restrict the above text to a quote... or do we give our folks some flexibility with what they want to feature there?</p>
			</aside>
		</div>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( $peeppostcount > 0 ) : ?>
	<section id="posts-by-<?php the_ID(); ?>" <?php post_class( 'bg-brand-blue-faint py-4 md:py-6 lg:py-8' ); ?>>
		<div class="px-1 md:container md:mx-auto md:px-0 ">
			<h3 id="posts" class="my-4 text-4xl md:my-8 text-brand-blue head-last-bold">Recent Insights by <strong><?php echo $person_archivelink; ?></strong></h3>
			<?php echo do_shortcode( '[display-posts wrapper="div" wrapper_class="grid grid-cols-3 gap-8 -m-4 " layout="card" author="'.$peepnicename.'" date_query_after="' .$recent_year_barrier. '-01-01" posts_per_page="3" orderby="modified" no_posts_message="No recent posts found by this author."]' ); ?>
		</div>
	</section>
<?php endif; ?>
