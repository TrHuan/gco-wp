<?php

add_action( 'init', 'create_brand_item' );

function create_brand_item() {
	$labels = array(
		'name' => _x('Brands', 'post type general name'),
		'singular_name' => _x('Brand', 'post type singular name'),
		'add_new' => _x('Add New', 'Brand'),
		'add_new_item' => __('Add New Brand'),
		'edit_item' => __('Edit Brand'),
		'new_item' => __('New Brand'),
		'all_items' => __('All Brands'),
		'view_item' => __('View Brand'),
		'search_items' => __('Search Brand'),
		'not_found' =>  __('No Brand found'),
		'not_found_in_trash' => __('No Brand found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Brands'
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
		'rewrite' => array('slug' => 'brand'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('brand',$args);
}