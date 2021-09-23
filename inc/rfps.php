<?php
register_post_type( 'rfp',
  array(
    'labels' => array(
      'name'        	=> 'RFPs',
      'singular_name'   => 'RFP',
      'menu_name'	    => 'RFPs',
      'add_new_item'	=> 'Add New',
    ),
    'public'              => true,
    'show_ui'             => true,
    'rewrite'             => array( 'slug' => 'procurement' ),
    'capability_type'     => 'post',
    'menu_icon' 		      => 'dashicons-paperclip',
    'supports'            => array( 'title', 'editor'),
  )
);


