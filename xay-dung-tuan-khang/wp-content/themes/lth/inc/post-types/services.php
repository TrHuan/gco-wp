<?php

add_action( 'init', 'create_service_item' );

function create_service_item() {
	$labels = array(		
		'name' => _x('Dịch vụ', 'post type general name'),
		'singular_name' => _x('Dịch vụ', 'post type singular name'),
		'add_new' => _x('Thêm Mới', 'Project'),
		'add_new_item' => __('Dịch vụ'),
		'edit_item' => __('Dịch vụ'),
		'new_item' => __('Dịch vụ'),
		'all_items' => __('Tất cả Dịch vụ'),
		'view_item' => __('Xem'),
		'search_items' => __('Tìm kiếm'),
		'not_found' =>  __('No Project found'),
		'not_found_in_trash' => __('No Project found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Dịch vụ'
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
		'rewrite' => array('slug' => 'dich-vu'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('thi-cong',$args);
}

// create service Taxonomy	
add_action( 'init', 'create_service_categories' );

function create_service_categories() {
	$labels = array(
		'name'                       => _x('Danh mục thiết kế', 'taxonomy general name'),
		'singular_name'              => _x('Danh mục', 'taxonomy singular name'),
		'search_items'               => __('Tìm kiếm'),
		'popular_items'              => __('Popular Categories'),
		'all_items'                  => __('Tất cả danh mục'),
		'edit_item'                  => __('Sửa'),
		'update_item'                => __('Update Category'),
		'add_new_item'               => __('Mới'),
		'new_item_name'              => __('New Category Name'),
		'separate_items_with_commas' => __('Separate Categories with commas'),
		'add_or_remove_items'        => __('Add or remove Categories'),
		'choose_from_most_used'      => __('Choose from the most used Categories'),
		'not_found'                  => __('No Category found.'),
		'menu_name'                  => __('Danh mục'),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'show_in_rest'          => true,
		'rewrite'               => array( 'slug' => 'thi-cong-cat' ),
	);

	register_taxonomy("thi-cong-cat", "thi-cong", $args);
}