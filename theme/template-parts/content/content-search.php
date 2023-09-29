<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<article <?php post_class( 'prose lg:prose-xl mb-4 md:mb-8' ); ?>>
	<header>
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div>
			<?php
			ll_posted_on();
			echo ' | ';
			ll_posted_by();
			?>
		</div>
		<?php endif; ?>
	</header>

	<?php // ll_post_thumbnail(); ?>

	<div>
		<?php the_excerpt(); ?>
	</div>

	<footer>
		<?php ll_entry_footer(); ?>
	</footer>
</article>
