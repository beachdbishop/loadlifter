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
$peep_level = get_field( 'll_people_level' );
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
		<?php
		if ( 'people' === get_post_type() ) {
		 	$peep_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		 	if ( $peep_thumbnail ) {
		 		$headshot = esc_url( $peep_thumbnail[0] );
		 	} else {
		 		$headshot = esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' );
		 	}
		 	?>
		 	<div
				class="bg-no-repeat bg-cover"
				style="background-image: url('<?php echo $headshot; ?>'); background-position: center top -5rem;"
			>
		 		<a
					class=""
					href="<?php echo esc_url( get_permalink() ); ?>"
					rel="bookmark"
					aria-label="<?php echo get_the_title(); ?>"
				>
		 			<div class="aspect-card">&nbsp;</div>
		 		</a>
		 	</div>
			<?php
		} else {

			ll_post_social_image();

		}
		?>
	</div>
</li>
