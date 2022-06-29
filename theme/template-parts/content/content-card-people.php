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
$peepimage = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $peepimage ) {
	$headshot = esc_url( $peepimage[0] );
} else {
	$headshot = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
}
// $maskimage = esc_url( get_template_directory_uri() . '/img/mask__bio.svg' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card | p-4 mb-4 w-full md:w-1/2 lg:w-1/3' ); ?>>

	<!-- <div class="max-w-[260px] mx-auto mb-4 md:mb-8 rounded-full bg-brand-red-faint bg-center bg-cover" style="background-image: url('<?php // echo $headshot; ?>');"> -->
		<!-- <div class="max-w-[300px] aspect-square">&nbsp;</div> -->
	<!-- </div> -->

	<div class="mb-4 md:mb-6 ">
		<div class="w-[320px] mx-auto bg-center bg-cover aspect-square mask-logo" style="background-image: url('<?php echo $headshot; ?>');">&nbsp;</div>
	</div>

	<header>
		<?php the_title( '<h3 class="font-bold leading-tight text-center text-brand-red"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
	</header>
	<p class="italic font-bold leading-tight tracking-tighter text-center uppercase font-head text-brand-red">
		<?php echo $peepdesig; ?>
	</p>
	<p class="leading-tight text-center font-head">
		<?php echo $peeptitle; ?>
	</p>
</article><!-- #post-<?php the_ID(); ?> -->
