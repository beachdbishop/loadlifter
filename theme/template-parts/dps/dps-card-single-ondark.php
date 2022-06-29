<?php
/**
 * DPS Card partial (on a dark background)
 *
 * @package
 * @author Daniel Bishop <dbishop@beachfleischman.com>
 * @since 	1.0.2
 * @license GPL-2.0+
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card | p-4 mb-4 w-full' ); ?>>

	<div class="">
		<a class="papercorners-60" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" rel="bookmark"><?php ll_featured_image( array( 'size' => 'card' ) ); ?></a>
		<header>
			<?php the_title( '<h4 class="my-2 font-bold tracking-wide text-brand-red-faint hover:text-brand-red-pale"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
		</header>
		<div class="text-sm ">
			<?php the_excerpt(); ?>
		</div>
		<footer class="mt-2 text-xs">
			<?php
				ll_posted_on();
				echo " | ";
				ll_posted_by();
			?>
		</footer>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
