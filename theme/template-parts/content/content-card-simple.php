<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<article <?php post_class( 'post-card | p-4 mb-4 ' ); ?>>

	<div class="group dark:text-neutral-300">
		<a class="" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" rel="bookmark"><?php ll_featured_image( array( 'size' => 'card' ) ); ?></a>
		<header>
			<?php the_title( '<h3 class="my-2 overflow-hidden tracking-wide text-current text-ellipsis"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="">', '</a></h3>' ); ?>
		</header>
	</div>

</article>
