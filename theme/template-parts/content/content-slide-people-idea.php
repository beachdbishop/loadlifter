<?php
/**
 * Template part for displaying people slides w/ idea quotes
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
$peep_idea_quote                = get_field( 'll_people_idea_quote' );
$peep_level = get_field( 'll_people_level' );
?>

<div <?php post_class( 'p-6 transition-colors ease-in-out rounded-lg slide' ); ?> tabindex="0">
    <div class="mb-8">
        <p class="font-serif text-lg italic leading-6 quote text-brand-gray-dark lg:text-xl dark:text-neutral-300"><?php echo $peep_idea_quote; ?></p>
    </div>
    <div class="text-lg text-center cite text-brand-gray">
        <div class="w-40 mx-auto mb-2 bg-top bg-cover border-2 border-white md:mb-4 bg-brand-red-faint group-hover:border-brand-red dark:border-neutral-500" style="background-image: url('<?php echo $headshot; ?>');">
            <?php if ($peep_level['value'] !== '900') { ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php echo get_the_title(); ?>">
                    <div class="w-40 aspect-square">&nbsp;</div>
                </a>
            <?php } else { ?>
                <div class="w-40 aspect-square" aria-label="<?php echo get_the_title(); ?>">&nbsp;</div>
            <?php } ?>
        </div>
        <p class="mt-1 text-2xl font-light lg:text-3xl font-head text-brand-blue dark:text-brand-blue-pale">
            <?php if ($peep_level['value'] !== '900') { ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
            <?php } else { ?>
                <?php echo get_the_title(); ?>
            <?php } ?>
        </p>
        <p class="text-base lg:text-lg text-brand-blue-dark dark:text-neutral-400"><?php echo get_field( 'll_people_title' ); ?></p>
    </div>
</div>
