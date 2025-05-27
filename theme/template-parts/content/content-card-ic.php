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
	$page_title                 = get_field( 'll_page_title_override' );
} else {
	$page_title                 = get_the_title();
}

$type_class = 'posttype-' . get_post_type();
$order_class = 'order-' . get_field( 'll_loc_sort_order' );
$peep_level = get_field( 'll_people_level' );
?>



<li <?php post_class( 'card-ic  |  ' . $type_class . ' group flex flex-col relative border-neutral-100 border-2 ' . $order_class . '  |  focus-within:border-neutral-500 dark:border-neutral-700' ); ?>>

	<div class="card-text  |  flex flex-col text grow order-1 bg-white  |  dark:bg-neutral-900 dark:text-neutral-300">
		<h3 class="my-2 overflow-hidden tracking-wide text-ellipsis  |  ">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="focus:underline group-hover:decoration-orient-400 group-hover:underline">
				<?php echo $page_title; ?>
			</a>
		</h3>

		<?php
		if ( 'locations' === get_post_type() ) {
			// Custom code for 'location' post type
			// if ( !empty( get_field( 'll_loc_fax' ) ) ) {
			// 	$loc_fax_html = '<p class="leading-snug" property="faxNumber">F: ' . ll_format_phone_number( get_field( 'll_loc_fax' ), 'beach' ) . '</p>';
			// } else {
			// 	$loc_fax_html = '';
			// }
			?>
			<div class="not-italic mb-2" property="address" typeof="PostalAddress">
				<p class="street-address  |  leading-snug" property="streetAddress"><?php echo get_field( 'll_loc_street1' ) . ', ' . get_field( 'll_loc_street2' ); ?></p>
				<p class="locality  |  leading-snug mb-2">
					<span property="addressLocality"><?php echo get_field( 'll_loc_city' ); ?></span>,
					<span class="state" property="addressRegion"><?php echo get_field( 'll_loc_state' ); ?></span>
					<span class="zip" property="postalCode"><?php echo get_field( 'll_loc_zip' ); ?></span>
				</p>
				<p class="leading-snug" property="telephone"><?php echo ll_format_phone_number( get_field( 'll_loc_phone' ), 'beach'); ?></p>
				<?php // echo $loc_fax_html; ?>
			</div>
			<?php
		} elseif ( 'people' === get_post_type() ) {
			?>
			<div class="mb-2">
				<?php
				// if ( ( $peep_level['value'] != 800 ) && ( get_field( 'll_people_designations' ) ) ) {
				// 	echo sprintf( '<p class="italic font-semibold leading-tight tracking-tighter font-head ">%1$s</p>', get_field( 'll_people_designations' ) );
				// }

				if( get_field( 'll_people_title' ) ) { /* Job Title */
					echo sprintf( '<h4 class="leading-tight">%1$s</h4>', get_field( 'll_people_title' ) );
				}
				?>
			</div>
			<?php
		} else {

			if ( has_excerpt() ) {
				?>
				<p class="mt-2 mb-4 text-sm  |  lg:text-base"><?php echo get_the_excerpt(); ?></p>
				<?php
			}
		}
		?>

		<p class="card-meta  |  mt-auto mb-3 text-sm  |  lg:text-base">
			<?php
			if ( 'people' === get_post_type() ) {
				if ( $peep_level['value'] != 800 ) {
					if ( get_field_object( 'll_people_department' ) ) {
						$peep_department = get_field_object( 'll_people_department' );
						$peep_dept_value = $peep_department['value'];
						if ( $peep_dept_value ) {
							ll_people_show_dept_list( $peep_dept_value, ['icons' => false] );
						}
					}
				}
			}
			?>

			<?php if ( ( 'post' === get_post_type() ) && ( !in_category( 'events' ) ) && ( !in_category( 'resources' ) ) ) {
				echo '<span>' . esc_html( get_the_date() ) . '</span>';
				echo " | ";
				ll_posted_by();
			} ?>

			<?php if ( ( 'post' === get_post_type() ) && ( in_category( 'resources' ) ) ) {
				$terms_list = wp_get_post_categories( $post->ID, array( 'fields' => 'names', 'exclude' => '286', 'order' => 'DESC' ) );
				if ( $terms_list ) { // Check $terms_list has value
					// $res_types = ['guides', 'reports', 'firm-information'];
					foreach ( $terms_list as $term ) {
						// if ( in_array( $term, $res_types ) ) {
							echo '<span class="cat uppercase">' . esc_html( $term ) . '</span>';
						// }
					}
				}
			} ?>
		</p>
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
