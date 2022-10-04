<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$peepdesig = get_field( 'person_desig' );
$peeptitle = get_field( 'person_title' );
$loc_obj_list = get_the_terms( $post->ID, 'location' );
$peeploc = join( ', ', wp_list_pluck( $loc_obj_list, 'name' ) ); // taxonomy
$dept_obj_list = get_the_terms( $post->ID, 'department' );
$peepdept = join( ', ', wp_list_pluck( $dept_obj_list, 'name' ) ); // taxonomy
$peepimage = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $peepimage ) {
	$headshot = esc_url( $peepimage[0] );
} else {
	$headshot = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
}
// $maskimage = esc_url( get_template_directory_uri() . '/img/mask__bio.svg' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'person-card | p-4 mb-4 group' ); ?>>
	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<div class="headshot | max-w-[160px] mx-auto mb-2 md:mb-4 rounded-full bg-brand-red-faint bg-top bg-cover opacity-70 transition-all delay-100 duration-300 ease-in-out group-hover:opacity-100" style="background-image: url('<?php echo $headshot; ?>');">
			<div class="max-w-[160px] aspect-square">&nbsp;</div>
		</div>

		<header>
			<?php the_title( '<h3 class="font-bold leading-tight text-center text-brand-gray group-hover:text-brand-red">', '</h3>' ); ?>
		</header>
		<p class="italic font-bold leading-tight tracking-tighter text-center uppercase font-head text-neutral-500">
			<?php echo $peepdesig; ?>
		</p>
		<p class="text-lg leading-tight text-center font-head">
			<?php echo $peeptitle; ?>
		</p>

		<footer class="mt-2 text-xs text-center text-neutral-400 group-hover:text-neutral-600 children:block children:px-2 lg:mt-4">
			<span class="">
				<i class="fa-solid fa-people-group"></i>
				<?php echo $peepdept; ?>
			</span>
			<span class="">
				<i class="fa-solid fa-location-dot"></i>
				<?php echo $peeploc; ?>
			</span>

		</footer>
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
