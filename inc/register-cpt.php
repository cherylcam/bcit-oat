<?php

function bcit_oat_register_custom_post_types() {
    $labels = array(
        'name'               => _x( 'Certifications', 'post type general name' ),
        'singular_name'      => _x( 'Certification', 'post type singular name'),
        'menu_name'          => _x( 'Certifications', 'admin menu' ),
        'name_admin_bar'     => _x( 'Certification', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'certification' ),
        'add_new_item'       => __( 'Add New Certification' ),
        'new_item'           => __( 'New Certification' ),
        'edit_item'          => __( 'Edit Certification' ),
        'view_item'          => __( 'View Certification' ),
        'all_items'          => __( 'All Certifications' ),
        'search_items'       => __( 'Search Certifications' ),
        'parent_item_colon'  => __( 'Parent Certifications:' ),
        'not_found'          => __( 'No certification found.' ),
        'not_found_in_trash' => __( 'No certification found in Trash.' ),
        'archives'           => __( 'Certification Archives'),
        'insert_into_item'   => __( 'Insert into certification'),
        'uploaded_to_this_item' => __( 'Uploaded to this certification'),
        'filter_item_list'   => __( 'Filter certifications list'),
        'items_list_navigation' => __( 'Certifications list navigation'),
        'items_list'         => __( 'Certifications list'),
        'featured_image'     => __( 'Certification feature image'),
        'set_featured_image' => __( 'Set certification feature image'),
        'remove_featured_image' => __( 'Remove certification feature image'),
        'use_featured_image' => __( 'Use as feature image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'certifications' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-network',
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
    );
    register_post_type( 'bcit-oat-cert', $args );
}
add_action( 'init', 'bcit_oat_register_custom_post_types' );