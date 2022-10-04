<?php

// Register Custom Post Type > People
function ll_register_people_cpt() {

	$labels = array(
		'name'                  => _x( 'People', 'Post Type General Name', 'loadlifter' ),
		'singular_name'         => _x( 'Person', 'Post Type Singular Name', 'loadlifter' ),
		'menu_name'             => __( 'People', 'loadlifter' ),
		'name_admin_bar'        => __( 'People', 'loadlifter' ),
		'archives'              => __( 'Archives', 'loadlifter' ),
		'attributes'            => __( 'Person Attributes', 'loadlifter' ),
		'parent_item_colon'     => __( 'Parent Item:', 'loadlifter' ),
		'all_items'             => __( 'All People', 'loadlifter' ),
		'add_new_item'          => __( 'Add New Person', 'loadlifter' ),
		'add_new'               => __( 'Add New', 'loadlifter' ),
		'new_item'              => __( 'New Person', 'loadlifter' ),
		'edit_item'             => __( 'Edit Person', 'loadlifter' ),
		'update_item'           => __( 'Update Person', 'loadlifter' ),
		'view_item'             => __( 'View Person', 'loadlifter' ),
		'view_items'            => __( 'View People', 'loadlifter' ),
		'search_items'          => __( 'Search Person', 'loadlifter' ),
		'not_found'             => __( 'Not found', 'loadlifter' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'loadlifter' ),
		'featured_image'        => __( 'Featured Image', 'loadlifter' ),
		'set_featured_image'    => __( 'Set featured image', 'loadlifter' ),
		'remove_featured_image' => __( 'Remove featured image', 'loadlifter' ),
		'use_featured_image'    => __( 'Use as featured image', 'loadlifter' ),
		'insert_into_item'      => __( 'Insert into person', 'loadlifter' ),
		'uploaded_to_this_item' => __( 'Uploaded to this person', 'loadlifter' ),
		'items_list'            => __( 'People list', 'loadlifter' ),
		'items_list_navigation' => __( 'People list navigation', 'loadlifter' ),
		'filter_items_list'     => __( 'Filter people list', 'loadlifter' ),
	);
	$rewrite = array(
		'slug'                  => 'people',
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => __( 'Person', 'loadlifter' ),
		'description'           => __( 'Key People', 'loadlifter' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( 'location' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-businesswoman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'				=> $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'people', $args );

}
add_action( 'init', 'll_register_people_cpt', 0 );


// Register Custom Taxonomy
function ll_locations() {

	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'loadlifter' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'loadlifter' ),
		'menu_name'                  => __( 'Locations', 'loadlifter' ),
		'all_items'                  => __( 'All Items', 'loadlifter' ),
		'parent_item'                => __( 'Parent Item', 'loadlifter' ),
		'parent_item_colon'          => __( 'Parent Item:', 'loadlifter' ),
		'new_item_name'              => __( 'New Item Name', 'loadlifter' ),
		'add_new_item'               => __( 'Add New Item', 'loadlifter' ),
		'edit_item'                  => __( 'Edit Item', 'loadlifter' ),
		'update_item'                => __( 'Update Item', 'loadlifter' ),
		'view_item'                  => __( 'View Item', 'loadlifter' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'loadlifter' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'loadlifter' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'loadlifter' ),
		'popular_items'              => __( 'Popular Items', 'loadlifter' ),
		'search_items'               => __( 'Search Items', 'loadlifter' ),
		'not_found'                  => __( 'Not Found', 'loadlifter' ),
		'no_terms'                   => __( 'No items', 'loadlifter' ),
		'items_list'                 => __( 'Items list', 'loadlifter' ),
		'items_list_navigation'      => __( 'Items list navigation', 'loadlifter' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'location', array( 'people' ), $args );

}

function ll_departments() {

	$labels = array(
		'name'                       => _x( 'Departments', 'Taxonomy General Name', 'loadlifter' ),
		'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'loadlifter' ),
		'menu_name'                  => __( 'Depts', 'loadlifter' ),
		'all_items'                  => __( 'All Departments', 'loadlifter' ),
		'parent_item'                => __( 'Parent Dept', 'loadlifter' ),
		'parent_item_colon'          => __( 'Parent Dept:', 'loadlifter' ),
		'new_item_name'              => __( 'New Dept Name', 'loadlifter' ),
		'add_new_item'               => __( 'Add New Dept', 'loadlifter' ),
		'edit_item'                  => __( 'Edit Dept', 'loadlifter' ),
		'update_item'                => __( 'Update Dept', 'loadlifter' ),
		'view_item'                  => __( 'View Dept', 'loadlifter' ),
		'separate_items_with_commas' => __( 'Separate depts with commas', 'loadlifter' ),
		'add_or_remove_items'        => __( 'Add or remove depts', 'loadlifter' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'loadlifter' ),
		'popular_items'              => __( 'Popular Departments', 'loadlifter' ),
		'search_items'               => __( 'Search Departments', 'loadlifter' ),
		'not_found'                  => __( 'Not Found', 'loadlifter' ),
		'no_terms'                   => __( 'No depts', 'loadlifter' ),
		'items_list'                 => __( 'Departments list', 'loadlifter' ),
		'items_list_navigation'      => __( 'Departments list navigation', 'loadlifter' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'department', array( 'people' ), $args );

}

// Register Custom Taxonomy
function ll_levels() {

	$labels = array(
		'name'                       => _x( 'Levels', 'Taxonomy General Name', 'loadlifter' ),
		'singular_name'              => _x( 'Level', 'Taxonomy Singular Name', 'loadlifter' ),
		'menu_name'                  => __( 'Levels', 'loadlifter' ),
		'all_items'                  => __( 'All Levels', 'loadlifter' ),
		'parent_item'                => __( 'Parent Level', 'loadlifter' ),
		'parent_item_colon'          => __( 'Parent Level:', 'loadlifter' ),
		'new_item_name'              => __( 'New Level Name', 'loadlifter' ),
		'add_new_item'               => __( 'Add New Level', 'loadlifter' ),
		'edit_item'                  => __( 'Edit Level', 'loadlifter' ),
		'update_item'                => __( 'Update Level', 'loadlifter' ),
		'view_item'                  => __( 'View Level', 'loadlifter' ),
		'separate_items_with_commas' => __( 'Separate levels with commas', 'loadlifter' ),
		'add_or_remove_items'        => __( 'Add or remove levels', 'loadlifter' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'loadlifter' ),
		'popular_items'              => __( 'Popular Levels', 'loadlifter' ),
		'search_items'               => __( 'Search Levels', 'loadlifter' ),
		'not_found'                  => __( 'Not Found', 'loadlifter' ),
		'no_terms'                   => __( 'No levels', 'loadlifter' ),
		'items_list'                 => __( 'Levels list', 'loadlifter' ),
		'items_list_navigation'      => __( 'Levels list navigation', 'loadlifter' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'level', array( 'people' ), $args );

}


function ll_sort_order_people( $orderby ) {
	global $wpdb;

	if ( is_archive() && get_query_var( "post_type" ) == "people" ) {
		return "$wpdb->posts.menu_order ASC";
	}

	return $orderby;
}

add_action( 'init', 'll_locations', 0 );
add_action( 'init', 'll_departments', 0 );
add_action( 'init', 'll_levels', 0 );
add_filter( 'posts_orderby', 'll_sort_order_people' );
