<?php

add_action( 'init', 'create_feature_item' );

function create_feature_item() {
	$labels = array(
		'name' => _x('Features', 'post type general name'),
		'singular_name' => _x('Feature', 'post type singular name'),
		'add_new' => _x('Add New', 'Feature'),
		'add_new_item' => __('Add New Feature'),
		'edit_item' => __('Edit Feature'),
		'new_item' => __('New Feature'),
		'all_items' => __('All Features'),
		'view_item' => __('View Feature'),
		'search_items' => __('Search Feature'),
		'not_found' =>  __('No Feature found'),
		'not_found_in_trash' => __('No Feature found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Features'
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
		'rewrite' => array('slug' => 'feature'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('feature',$args);
}