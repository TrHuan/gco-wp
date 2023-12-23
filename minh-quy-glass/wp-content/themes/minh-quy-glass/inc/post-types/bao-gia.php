<?php

add_action( 'init', 'create_testimonial_item' );

function create_testimonial_item() {
	$labels = array(
		'name' => _x('Báo Giá', 'post type general name'),
		'singular_name' => _x('Báo Giá', 'post type singular name'),
		'add_new' => _x('Thêm Mới', 'Testimonial'),
		'add_new_item' => __('Thêm Mới'),
		'edit_item' => __('Sửa'),
		'new_item' => __('Thêm Mới'),
		'all_items' => __('Tất Cả Báo Giá'),
		'view_item' => __('Xem'),
		'search_items' => __('Tìm Kiếm'),
		'not_found' =>  __('No Testimonial found'),
		'not_found_in_trash' => __('No Testimonial found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Báo Giá'
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
		'rewrite' => array('slug' => 'bao-gia'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('bao-gia',$args);
}