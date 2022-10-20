<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$peepauthor = get_field( 'll_people_user' );
$peep_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $peep_thumbnail ) {
	$headshot = esc_url( $peep_thumbnail[0] );
} else {
	$headshot = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
}
$peep_desigs = get_field( 'll_people_designations' );
$peep_org = get_field( 'll_people_organization' );
$peep_title = get_field( 'll_people_title' );
$peep_level = get_field( 'll_people_level' );
$peep_department = get_field_object( 'll_people_department' );
$peep_dept_value = $peep_department['value'];
$peep_dept = $peep_dept_value['label'];
$peep_location = get_field_object( 'll_people_location' );
$peep_loc_value = $peep_location['value'];
$peep_loc = $peep_loc_value['label'];

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'person-card | p-4 mb-4 group' ); ?>>
	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<div class="headshot | max-w-[160px] mx-auto mb-2 md:mb-4 rounded-full bg-brand-red-faint bg-top bg-cover opacity-70 transition-all delay-100 duration-300 ease-in-out group-hover:opacity-100" style="background-image: url('<?php echo $headshot; ?>');" aria-label="">
			<div class="max-w-[160px] aspect-square">&nbsp;</div>
		</div>

		<header>
			<?php the_title( '<h3 class="font-bold leading-none text-center text-brand-gray group-hover:text-brand-red">', '</h3>' ); ?>
		</header>
		<p class="italic font-bold leading-tight tracking-tighter text-center uppercase font-head text-neutral-500">
			<?php echo $peep_desigs; ?>
		</p>
		<p class="text-lg leading-tight text-center font-head">
			<?php echo $peep_title; ?>
		</p>

		<?php if ( ( $peep_dept ) && ( $peep_dept != 'No Dept' ) ) { ?>
			<footer class="mt-2 text-sm text-center text-neutral-400 group-hover:text-neutral-600 children:block children:px-2 lg:mt-4">
				<span class="">
					<i class="fa-solid fa-people-group"></i>
					<?php echo $peep_dept; ?>
				</span>
				<span class="">
					<i class="fa-solid fa-location-dot"></i>
					<?php echo $peep_loc; ?>
				</span>
			</footer>
		<?php } ?>
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
