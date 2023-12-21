<?php

add_action( 'init', 'create_blocks_item' );

function create_blocks_item() {
	$labels = array(
		'name' => _x('Blocks', 'post type general name'),
		'singular_name' => _x('Blocks', 'post type singular name'),
		'add_new' => _x('Add New', 'Blocks'),
		'add_new_item' => __('Add New Blocks'),
		'edit_item' => __('Edit Blocks'),
		'new_item' => __('New Blocks'),
		'all_items' => __('All Blocks'),
		'view_item' => __('View Blocks'),
		'search_items' => __('Search Blocks'),
		'not_found' =>  __('No Blocks found'),
		'not_found_in_trash' => __('No Blocks found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Blocks'
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
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'blocks'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('blocks',$args);
}