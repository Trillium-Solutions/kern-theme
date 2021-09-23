<?php
register_post_type( 'reports',
  array(
    'labels' => array(
      'name'        	=> 'Reports',
      'singular_name'   => 'Report',
      'menu_name'	    => 'Reports',
      'add_new_item'	=> 'Add New',
    ),
    'public'              => true,
    'show_ui'             => true,
    'rewrite'             => array( 'slug' => 'reports' ),
    'capability_type'     => 'post',
    'menu_icon' 		  => 'dashicons-welcome-write-blog',
    'supports'            => array( 'title', 'editor'),
  )
);


