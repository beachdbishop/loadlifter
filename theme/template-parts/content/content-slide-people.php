<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$peepauthor                     = get_field( 'll_people_user' );
$peep_thumbnail                 = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $peep_thumbnail ) {
	$headshot                   = esc_url( $peep_thumbnail[0] );
} else {
	$headshot                   = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
}
$peep_level                     = get_field( 'll_people_level' );
?>

<article <?php post_class( 'slide | static aspect-[3/5] group bg-no-repeat bg-center bg-cover bg-brand-red-faint shadow-lg shadow-neutral-400/50 cursor-pointer flex flex-col dark:shadow-none' ); ?>
	style="background-image: url('<?php echo $headshot; ?>');"
	onclick="window.location = '<?php echo esc_url( get_permalink() ); ?>';"
	>

	<div class="seethru | grow bg-transparent">&nbsp;</div>

	<div class="slide-info | shrink-0 h-2/5 bg-white px-6 py-2 z-10 dark:bg-neutral-800">
		<header>
			<?php
			$title_classes = ( $peep_level['value'] === '800' ) ? 'group-hover:text-brand-gray-dark' : 'group-hover:text-brand-red';
			echo sprintf( '<p class="font-head text-2xl leading-none text-center %1$s">%2$s</p>', $title_classes, get_the_title() );
			?>
		</header>
		<?php
		// Only show designations for non-subsidiary entries
		if ( ( $peep_level['value'] != 800 ) && ( get_field( 'll_people_designations' ) ) ) {
			echo sprintf( '<p class="my-1 italic font-bold leading-none tracking-tighter text-center font-head text-neutral-500">%1$s</p>', get_field( 'll_people_designations' ) );
		}
		if( get_field( 'll_people_title' ) ) {
			echo sprintf( '<p class="leading-none text-center font-head">%1$s</p>', get_field( 'll_people_title' ) );
		}
		?>
	</div>
</article>
