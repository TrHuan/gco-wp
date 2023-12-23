<?php

add_action( 'init', 'create_brand_item' );

function create_brand_item() {
	$labels = array(
		'name' => _x('Đối Tác', 'post type general name'),
		'singular_name' => _x('Đối Tác', 'post type singular name'),
		'add_new' => _x('Thêm Mới', 'Brand'),
		'add_new_item' => __('Thêm Mới'),
		'edit_item' => __('Sửa'),
		'new_item' => __('Thêm Mới'),
		'all_items' => __('Tất Cả Đối Tác'),
		'view_item' => __('Xem'),
		'search_items' => __('Tìm Kiếm'),
		'not_found' =>  __('No Brand found'),
		'not_found_in_trash' => __('No Brand found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Đối Tác'
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
		'rewrite' => array('slug' => 'doi-tac'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('brand',$args);
}