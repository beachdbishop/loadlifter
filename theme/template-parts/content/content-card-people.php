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
$peep_title = get_field( 'll_people_title' );
$peep_level = get_field( 'll_people_level' );
$peep_department = get_field_object( 'll_people_department' );
$peep_dept_value = $peep_department['value'];
$peep_dept = $peep_dept_value['label'];
$peep_location = get_field_object( 'll_people_location' );
$peep_loc_value = $peep_location['value'];
$peep_loc = $peep_loc_value['label'];


// if ( get_field( 'linked_author' ) ) {
// 	$peepauthor = get_field( 'linked_author');
// 	$has_linked_author = true;
// 	$author_id = 'user_' . $peepauthor['ID'];
// 	$author_desigs = get_field('ll_user_designations', $author_id);
// 	$author_title = get_field('ll_user_title', $author_id);
// 	$author_thumbnail = get_field('ll_user_headshot', $author_id);
// 	if ( $author_thumbnail ) {
// 		$headshot = esc_url( $author_thumbnail['url'] );
// 	} else {
// 		$headshot = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
// 	}
// 	$author_org = get_field('ll_user_organization', $author_id);

// 	$author_dept = get_field_object('ll_user_department', $author_id);
// 	$author_dept_value = $author_dept['value'];
// 	$author_dep = $author_dept_value['label'];

// 	$author_location = get_field_object('ll_user_location', $author_id);
// 	$author_loc_value = $author_location['value'];
// 	$author_loc = $author_loc_value['label'];

// 	// $author_industries = get_field('ll_user_industries', $author_id);
// 	// $author_services = get_field('ll_user_services', $author_id);
// } else {
// 	$has_linked_author = false;
// 	$author_desigs = get_field( 'person_desig' );
// 	$author_title = get_field( 'person_title' );
// 	$loc_obj_list = get_the_terms( $post->ID, 'location' );
// 	$author_loc = join( ', ', wp_list_pluck( $loc_obj_list, 'name' ) ); // taxonomy
// 	$dept_obj_list = get_the_terms( $post->ID, 'department' );
// 	$author_dep = join( ', ', wp_list_pluck( $dept_obj_list, 'name' ) ); // taxonomy
// 	$author_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
// 	if ( $author_thumbnail ) {
// 		$headshot = esc_url( $author_thumbnail[0] );
// 	} else {
// 		$headshot = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
// 	}
// 	// $maskimage = esc_url( get_template_directory_uri() . '/img/mask__bio.svg' );
// }

// if ( $has_linked_author ) {
// 	$post_class = 'person-card | p-4 mb-4 group';
// } else {
// 	$post_class = 'person-card | p-4 mb-4 group border-2 border-brand-red-faint border-dashed';
// }
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
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
