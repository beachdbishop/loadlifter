<?php
/**
 * CPT Locations - BFCO
 *
 * This module relies on ACF PRO and integrates with Display Posts Shortcode.
 *
 * @package Load_Lifter
 */


// BACKEND  BACKEND  BACKEND  BACKEND  BACKEND  BACKEND  BACKEND  BACKEND  BACKEND


// NOTE!!! This CPT is currently generated/built w/ ACF PRO.


// Set active ADMIN COLUMNS for Locations
function ll_edit_locations_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'll_id' => __( 'ID' ),
		'state' => __( 'State' ),
		'll_post_thumb' => __( 'Featured Image' ),
		'date' => __( 'Date' )
	);

	return $columns;
}
add_filter( 'manage_edit-locations_columns', 'll_edit_locations_columns' );


// Enable sorting on specific columns for Locations
function ll_locations_sortable_columns( $columns ) {

	$columns['state'] = 'state';

	return $columns;

}
add_filter( 'manage_edit-locations_sortable_columns', 'll_locations_sortable_columns' );


/* Only run our customization on the 'edit.php' page in the admin. */
function ll_edit_locations_load() {
	add_filter( 'request', 'll_sort_locations' );
}
add_action( 'load-edit.php', 'll_edit_locations_load' );

function ll_sort_locations( $vars ) {
	/* Check if we're viewing the 'location' post type. */
	if ( isset( $vars['post_type'] ) && 'location' == $vars['post_type'] ) {

		/* Check if 'orderby' is set to 'state'. */
		if ( isset( $vars['orderby'] ) && 'state' == $vars['orderby'] ) {

			/* Merge the query vars with our custom variables. */
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'state',
					'orderby' => 'meta_value_num'
				)
			);
		}

	}

	return $vars;
}


// Set data to display in admin columns
function ll_pop_locations_column( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'state' :
			$state = get_post_meta( $post_id, 'll_loc_state', true );
			if ( empty( $state ) )
				echo '<em>' . __( 'Not set', 'loadlifter' ) . '</em>';
			if ( !empty( $state ) )
				echo '<span style="text-transform: capitalize">' . $state . '</span>';

			break;

			/* Just break out of the switch statement for everything else. */
		default :
			break;

	}
}
add_action( 'manage_locations_posts_custom_column', 'll_pop_locations_column', 10, 2 );



// FRONTEND  FRONTEND  FRONTEND  FRONTEND  FRONTEND  FRONTEND  FRONTEND  FRONTEND
