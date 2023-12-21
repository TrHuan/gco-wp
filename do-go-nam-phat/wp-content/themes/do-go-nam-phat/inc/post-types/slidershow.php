<?php

add_action( 'init', 'create_slidershow_item' );

function create_slidershow_item() {
	$labels = array(
		'name' => _x('Slidershows', 'post type general name'),
		'singular_name' => _x('Slidershow', 'post type singular name'),
		'add_new' => _x('Add New', 'Slidershow'),
		'add_new_item' => __('Add New Slidershow'),
		'edit_item' => __('Edit Slidershow'),
		'new_item' => __('New Slidershow'),
		'all_items' => __('All Slidershows'),
		'view_item' => __('View Slidershow'),
		'search_items' => __('Search Slidershow'),
		'not_found' =>  __('No Slidershow found'),
		'not_found_in_trash' => __('No Slidershow found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Slidershows'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 4,	
		'supports'            => array(
			'title',
			'excerpt',
			'editor',
			'thumbnail',
		),
		'rewrite' => array('slug' => 'slidershow'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('slidershow',$args);
}