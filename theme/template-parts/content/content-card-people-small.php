<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$peepauthor                     = get_field( 'll_people_user' );
$peep_thumbnail                 = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
if ( $peep_thumbnail ) {
	$headshot                       = esc_url( $peep_thumbnail[0] );
} else {
	$headshot                       = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
}
$peep_level                     = get_field( 'll_people_level' );
?>

<article <?php post_class( 'person-card  |  group p-2' ); ?>>
	<div class="flex items-center h-full p-4 border rounded-lg border-neutral-200  |  dark:border-neutral-600">
		<div class="shrink-0 object-cover object-center mr-4 rounded-full bg-neutral-100 bg-no-repeat  |  group-hover:border-brand-red" style="background-image: url('<?php echo $headshot; ?>'); background-size: 64px 86px; background-position: center top;">
			<?php if ($peep_level['value'] !== '900') { ?>
				<a class="" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" aria-label="View <?php echo esc_attr( get_the_title() ); ?>'s bio">
					<div class="size-16 aspect-square">&nbsp;</div>
				</a>
			<?php } else { ?>
				<div class="size-16 aspect-square">&nbsp;</div>
			<?php } ?>
		</div>

		<div class="grow">
			<?php
			if ($peep_level['value'] !== '900') {
				$title_classes = 'dark:text-neutral-200 group-hover:text-brand-red';
				echo sprintf( '<h3 class="leading-none text-brand-gray-dark  |  %1$s"><a class="" href="%3$s" rel="bookmark">%2$s </a></h3>', $title_classes, get_the_title(), esc_url( get_permalink() ) );
			} else {
				$title_classes = 'dark:text-neutral-200 group-hover:text-brand-gray-dark';
				echo sprintf( '<h3 class="leading-none text-brand-gray-dark  |  %1$s">%2$s</h3>', $title_classes, get_the_title() );
			}

			if( get_field( 'll_people_title' ) ) {
				echo sprintf( '<p class="text-lg leading-tight text-neutral-600 font-head  |  dark:text-neutral-300">%1$s</p>', get_field( 'll_people_title' ) );
			}
			?>
		</div>
	</div>
</article>
