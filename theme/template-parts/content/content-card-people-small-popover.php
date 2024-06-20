<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$slug = 'p' . get_the_ID();
$peepauthor = get_field( 'll_people_user' );
$peep_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
if ( $peep_thumbnail ) {
	$headshot = esc_url( $peep_thumbnail[0] );
} else {
	$headshot = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
}
$peep_level = get_field( 'll_people_level' );
?>


<li class="person-card popcard | @container" data-pop="<?php echo esc_attr( $slug ); ?>">
	<div class="flex flex-col @2xs:flex-row gap-2 items-center h-full p-4 border rounded-lg bg-white border-neutral-200 dark:border-neutral-600 dark:bg-neutral-800">

		<div class="card-text | flex-grow order-1 md:text-center">
			<?php echo sprintf( '<h3 class="text-2xl lg:text-3xl !leading-none text-brand-blue dark:text-brand-blue-pale">%1$s <small>%2$s</small></h3>', get_the_title(), get_field( 'll_people_designations' ) ); ?>
			<?php echo sprintf( '<p class="text-lg leading-tight text-neutral-600 font-head dark:text-neutral-500">%1$s</p>', get_field( 'll_people_title' ) ); ?>
		</div>

		<?php if ( !empty( get_field( 'll_people_short_bio' ) ) ) { ?>
			<div class="card-button | order-last">
				<button class="font-head rounded-md text-brand-blue px-3 py-1 border border-brand-blue bg-transparent dark:text-brand-blue-pale dark:border-brand-blue-pale" aria-label="Read more about <?php echo get_the_title(); ?>" aria-expanded="false" popovertarget="popbio-<?php echo esc_attr( $slug ); ?>">More</button>
				<div id="popbio-<?php echo esc_attr( $slug ); ?>" popover class="prose p-4 border-2 border-brand-blue max-h-[90vh] md:max-w-2xl md:p-8 dark:bg-neutral-800 dark:text-neutral-100 dark:border-neutral-500" role="tooltip">

					<div class="absolute top-0 right-0 size-8 text-center">
						<button popovertarget="popbio-<?php echo esc_attr( $slug ); ?>" popovertargetaction="hide" class="text-brand-blue dark:text-neutral-300">
							<span><i class="fa-regular fa-circle-xmark"></i></span>
							<span class="sr-only">Close</span>
						</button>
					</div>

					<h3 class="text-brand-red dark:text-brand-blue-pale"><?php echo get_the_title(); ?></h3>
					<div class="float-right ml-4 mb-4 bg-red-400 max-w-32 aspect-headshot md:max-w-48">
						<img src="<?php echo esc_attr( $headshot ); ?>" alt="<?php echo get_the_title(); ?>" class="object-cover" width="200" height="267" />
					</div>
					<?php echo get_field( 'll_people_short_bio' ); ?>
				</div>
			</div>
		<?php } ?>

		<div class="card-img | flex-shrink-0 order-0 object-cover object-center rounded-full bg-neutral-100 bg-no-repeat bg-cover" style="background-image: url(<?php echo esc_attr( $headshot ); ?>); background-position: center top;">
			<div class="w-16 h-16 lg:w-32 lg:h-32 aspect-square">&nbsp;</div>
		</div>

	</div>
</li>
