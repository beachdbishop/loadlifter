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

if ( get_field( 'll_page_title_override' ) ) {
	$page_title = get_field( 'll_page_title_override' );
} else {
	$page_title = get_the_title();
}

$order_class = 'order-' . get_field( 'll_loc_sort_order' );
?>


<li <?php post_class( 'card-ic min  |  group flex flex-col relative border-transparent border-2 ' . $order_class . '  |  focus-within:border-neutral-500' ); ?>>

	<!-- div class="card-text  |  flex flex-col text grow order-1 bg-white  <?php /* if ( 'location' === get_post_type() ) { echo '|  dark:bg-neutral-800 dark:text-neutral-300'; } */ ?>" -->
	<div class="card-text  |  flex flex-col text grow order-1 bg-transparent  |  dark:text-neutral-300">
		<h3 class="my-2 overflow-hidden tracking-wide text-ellipsis">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="focus:underline group-hover:decoration-orient-400 group-hover:underline">
				<?php echo $page_title; ?>
			</a>
		</h3>
	</div>

	<div class="card-img  |  ">
		<?php ll_post_social_image();	?>
	</div>
</li>
