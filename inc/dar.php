<?php
register_post_type( 'dial-a-ride',
  array(
    'labels' => array(
      'name'        	=> 'Dial-A-Ride',
      'singular_name' => 'DAR',
      'menu_name'	    => 'Dial-A-Ride',
      'add_new_item'	=> 'Add New Page',
    ),
    'public'              => true,
    'show_ui'             => true,
    'rewrite'             => array( 'slug' => 'dial-a-ride' ),
    'capability_type'    	=> 'post',
    'menu_icon' 		 			=> 'dashicons-star-filled',
    'supports'           	=> array( 'title', 'editor'),
  )
);


