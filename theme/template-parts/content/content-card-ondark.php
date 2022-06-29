<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card | p-4 mb-4 w-full md:w-1/2 lg:w-1/3' ); ?>>

	<div class="">
		<a class="papercorners-60" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" rel="bookmark"><?php ll_featured_image( array( 'size' => 'card' ) ); ?></a>
		<header>
			<?php the_title( '<h3 class="my-2 font-bold tracking-wide text-brand-blue-faint"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
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
