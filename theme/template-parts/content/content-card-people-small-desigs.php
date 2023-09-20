<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$peepauthor = get_field( 'll_people_user' );
$peep_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
if ( $peep_thumbnail ) {
	$headshot = esc_url( $peep_thumbnail[0] );
} else {
	$headshot = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
}
$peep_level = get_field( 'll_people_level' );
?>

<article <?php post_class( 'person-card | group p-2' ); ?>>
	<div class="flex items-center h-full p-4 border rounded-lg border-neutral-200">
		<div class="flex-shrink-0 object-cover object-center mr-4 rounded-full bg-neutral-100 group-hover:border-brand-red" style="background-image: url('<?php echo $headshot; ?>'); background-size: 64px 86px; background-position: center top;">
        <?php if ($peep_level['value'] !== '900') { ?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" aria-label="View <?php echo esc_attr( get_the_title() ); ?>'s bio">
				<div class="w-16 h-16 aspect-square">&nbsp;</div>
			</a>
        <?php } else { ?>
            <div class="w-16 h-16 aspect-square">&nbsp;</div>
        <?php } ?>
		</div>

		<div class="flex-grow">
			<?php
            if ($peep_level['value'] !== '900') {
				$title_classes = 'group-hover:text-brand-red';
                echo sprintf( '<h4 class="leading-none text-brand-gray-dark %1$s"><a href="%3$s" rel="bookmark">%2$s</a> <small>%4$s</small></h4>', $title_classes, get_the_title(), esc_url( get_permalink() ), get_field( 'll_people_designations' ) );
            } else {
				$title_classes = 'group-hover:text-brand-gray-dark';
                echo sprintf( '<h4 class="leading-none text-brand-gray-dark %1$s">%2$s</h4>', $title_classes, get_the_title() );
            }

			if( get_field( 'll_people_title' ) ) {
				echo sprintf( '<p class="text-lg leading-tight text-neutral-600 font-head">%1$s</p>', get_field( 'll_people_title' ) );
			}
			?>
		</div>
	</div>

	<?php
	// Only show designations for non-subsidiary entries
	// if ( ( $peep_level['value'] != 800 ) && ( get_field( 'll_people_designations' ) ) ) {
	// 	echo sprintf( '<p class="italic font-bold leading-tight tracking-tighter text-center font-head text-neutral-500">%1$s</p>', get_field( 'll_people_designations' ) );
	// }

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
</article>
