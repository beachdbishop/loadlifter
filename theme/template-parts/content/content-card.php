<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<article <?php post_class( 'post-card | p-4 mb-4 animate-fade-in' ); ?>>

	<div class="group dark:text-neutral-300">
		<a class="" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" rel="bookmark"><?php ll_featured_image( array( 'size' => 'card' ) ); ?></a>
		<header>
			<?php the_title( '<h3 class="my-2 overflow-hidden leading-tight break-words text-brand-blue text-ellipsis dark:text-brand-blue-pale"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		</header>
		<div class="text-sm ">
			<?php the_excerpt(); ?>
		</div>
        <footer class="mt-2 text-xs">
		<?php if ( 'post' === get_post_type() ) {
            ll_posted_on();
            echo " | ";
            ll_posted_by();
        } ?>
        </footer>
	</div>

</article>
