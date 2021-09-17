<?php 
$labels = array(
        'name'               => _x( 'News', 'post type general name' ),
        'singular_name'      => _x( 'News Post', 'post type singular name' ),
        'menu_name'          => _x( 'News', 'admin menu'),
        'name_admin_bar'     => _x( 'News Post', 'add new on admin bar'),
        'add_new'            => _x( 'Add New', 'News Post'),
        'add_new_item'       => __( 'Add New Post'),
        'new_item'           => __( 'New Post'),
        'edit_item'          => __( 'Edit News Post'),
        'view_item'          => __( 'View News Post'),
        'all_items'          => __( 'All News'),
        'search_items'       => __( 'Search News'),
        'parent_item_colon'  => __( 'Parent News Post:'),
        'not_found'          => __( 'No news found.'),
        'not_found_in_trash' => __( 'No news items found in Trash.')
    );

$args = array(
        'menu_icon'          => 'dashicons-megaphone',
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,       
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'news' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'revisions', 'editor'),
    );

register_post_type( 'news', $args );











