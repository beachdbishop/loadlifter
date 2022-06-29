<?php

// Register Custom Post Type > Industries
if ( !function_exists( 'll_register_industries_cpt' ) ) {
    // Register Custom Post Type
    function ll_register_industries_cpt() {

        $labels = array(
            'name'                  => _x( 'Industries', 'Post Type General Name', 'loadlifter' ),
            'singular_name'         => _x( 'Industry', 'Post Type Singular Name', 'loadlifter' ),
            'menu_name'             => __( 'Industries', 'loadlifter' ),
            'name_admin_bar'        => __( 'Industry', 'loadlifter' ),
            'archives'              => __( 'Industry Archives', 'loadlifter' ),
            'attributes'            => __( 'Industry Attributes', 'loadlifter' ),
            'parent_item_colon'     => __( 'Parent Industry area:', 'loadlifter' ),
            'all_items'             => __( 'All Industries', 'loadlifter' ),
            'add_new_item'          => __( 'Add New Industry', 'loadlifter' ),
            'add_new'               => __( 'Add Industry', 'loadlifter' ),
            'new_item'              => __( 'New Industry', 'loadlifter' ),
            'edit_item'             => __( 'Edit Industry', 'loadlifter' ),
            'update_item'           => __( 'Update Industry', 'loadlifter' ),
            'view_item'             => __( 'View Industry', 'loadlifter' ),
            'view_items'            => __( 'View Industries', 'loadlifter' ),
            'search_items'          => __( 'Search Industry', 'loadlifter' ),
            'not_found'             => __( 'Not found', 'loadlifter' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'loadlifter' ),
            'featured_image'        => __( 'Featured Image', 'loadlifter' ),
            'set_featured_image'    => __( 'Set featured image', 'loadlifter' ),
            'remove_featured_image' => __( 'Remove featured image', 'loadlifter' ),
            'use_featured_image'    => __( 'Use as featured image', 'loadlifter' ),
            'insert_into_item'      => __( 'Insert into item', 'loadlifter' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'loadlifter' ),
            'items_list'            => __( 'Items list', 'loadlifter' ),
            'items_list_navigation' => __( 'Items list navigation', 'loadlifter' ),
            'filter_items_list'     => __( 'Filter items list', 'loadlifter' ),
        );
        $rewrite = array(
            'slug'                  => 'industries',
            'with_front'            => true,
            'pages'                 => false,
            'feeds'                 => false,
        );
        $args = array(
            'label'                 => __( 'Industry', 'loadlifter' ),
            'description'           => __( 'Industry areas', 'loadlifter' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'revisions', 'thumbnail', 'excerpt', 'page-attributes' ),
            'taxonomies'            => array( 'category' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 21,
            'menu_icon'             => 'dashicons-superhero',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'industries',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'industries', $args );
    }
}
add_action( 'init', 'll_register_industries_cpt', 0 );


// Admin columns tweaks?

// FRONTEND ... override templates? Integrate w/ Display Posts Shortcode?

// Enqueue styles?


