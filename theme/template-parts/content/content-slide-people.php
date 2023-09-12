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

$peep_level = get_field( 'll_people_level' );
?>

<article
	id="post-<?php the_ID(); ?>"
	<?php post_class( 'slide | static aspect-[3/5] group bg-no-repeat bg-center bg-cover bg-brand-red-faint shadow-lg shadow-neutral-400/50 cursor-pointer flex flex-col' ); ?>
	style="background-image: url('<?php echo $headshot; ?>');"
	onclick="window.location = '<?php echo esc_url( get_permalink() ); ?>';"
	>

	<div class="seethru | grow bg-transparent">&nbsp;</div>

	<div class="slide-info | shrink-0 h-2/5 bg-white px-6 py-2 z-10 ">
		<header>
			<?php
			$title_classes = ( $peep_level['value'] === '800' ) ? 'group-hover:text-brand-gray-dark' : 'group-hover:text-brand-red';
			echo sprintf( '<p class="font-head text-2xl leading-none text-center text-brand-gray %1$s">%2$s</p>', $title_classes, get_the_title() );
			?>
		</header>
		<?php
		// Only show designations for non-subsidiary entries
		if ( ( $peep_level['value'] != 800 ) && ( get_field( 'll_people_designations' ) ) ) {
			echo sprintf( '<p class="my-1 italic font-bold leading-none tracking-tighter text-center font-head text-neutral-600">%1$s</p>', get_field( 'll_people_designations' ) );
		}
		if( get_field( 'll_people_title' ) ) {
			echo sprintf( '<p class="leading-none text-center font-head">%1$s</p>', get_field( 'll_people_title' ) );
		}
		// if ( $peep_level['value'] != 800 ) {
		// 	if ( ( get_field_object( 'll_people_department' ) ) || ( get_field_object( 'll_people_location' ) ) ) {
		// 		echo '<footer class="mt-2 text-sm text-center text-neutral-400 children:block children:px-2 lg:mt-4">';
		// 			$peep_department = get_field_object( 'll_people_department' );
		// 			$peep_dept_value = $peep_department['value'];
		// 			if ( $peep_dept_value ) {
		// 				ll_people_show_dept_list( $peep_dept_value );
		// 			}
		// 			$peep_location = get_field_object( 'll_people_location' );
		// 			$peep_loc_value = $peep_location['value'];
		// 			$peep_loc = $peep_loc_value['label'];
		// 			if ( $peep_loc ) {
		// 				ll_people_show_location( $peep_loc );
		// 			}
		// 		echo '</footer>';
		// 	}
		// }
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
