<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 *
 * @see https://inclusive-components.design/cards/
 */

?>

<li <?php post_class( 'card-ic | group flex flex-col relative border-transparent border-2 shadow-orient-700 focus-within:shadow-lg focus-within:border-neutral-500 dark:border-neutral-700 dark:shadow-orient-500' ); ?>>

	<div class="card-text | flex flex-col text grow order-1">
		<?php the_title( '<h3 class="my-2 overflow-hidden tracking-wide text-current text-ellipsis"><a href="' . esc_url( get_permalink() ) . '" class="group-hover:decoration-brand-blue-pale focus:underline group-hover:underline">', '</a></h3>' ); ?>
	</div>

	<div class="card-img | ">
		<?php
		// echo wp_get_attachment_image( get_post_thumbnail_id(), 'medium' );
		ll_featured_image( array( 'size' => 'card' ) );
		?>
	</div>

</li>
