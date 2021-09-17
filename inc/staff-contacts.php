<?php
register_post_type( 'staff-contact',
  array(
    'labels' => array(
      'name'        	=> 'Contact Profiles',
      'singular_name' => 'Staff Contact Profile',
      'menu_name'	    => 'Staff Contacts',
      'add_new_item'	=> 'Add New Profile',
    ),
    'public'              => true,
    'show_ui'             => true,
    'rewrite'             => array( 'slug' => 'staff-contact' ),
    'capability_type'    	=> 'post',
    'menu_icon' 		 			=> 'dashicons-groups',
    'supports'            => array( 'title', 'editor' ),
  )
);

