<?php

add_action( 'init', 'create_testimonial_item' );

function create_testimonial_item() {
	$labels = array(
		'name' => _x('Đánh giá của khách', 'post type general name'),
		'singular_name' => _x('Testimonial', 'post type singular name'),
		'add_new' => _x('Mới', 'Testimonial'),
		'add_new_item' => __('Đánh giá của khách'),
		'edit_item' => __('Sửa'),
		'new_item' => __('New Testimonial'),
		'all_items' => __('Tất cả Đánh giá của khách'),
		'view_item' => __('Xem'),
		'search_items' => __('Tìm kiếm'),
		'not_found' =>  __('No Testimonial found'),
		'not_found_in_trash' => __('No Testimonial found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Đánh giá của khách'
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
		'rewrite' => array('slug' => 'testimonial'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('testimonial',$args);
}