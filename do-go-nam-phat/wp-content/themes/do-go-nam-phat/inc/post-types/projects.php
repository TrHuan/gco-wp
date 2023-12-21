<?php

add_action( 'init', 'create_project_item' );

function create_project_item() {
	$labels = array(
		'name' => _x('Dự Án', 'post type general name'),
		'singular_name' => _x('Dự Án', 'post type singular name'),
		'add_new' => _x('Thêm Mới', 'Project'),
		'add_new_item' => __('Thêm Mới'),
		'edit_item' => __('Sửa'),
		'new_item' => __('Thêm Mới'),
		'all_items' => __('Tất Cả Dự Án'),
		'view_item' => __('Xem'),
		'search_items' => __('Tìm Kiếm'),
		'not_found' =>  __('No Project found'),
		'not_found_in_trash' => __('No Project found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Dự Án'
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
		'rewrite' => array('slug' => 'du-an'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('project',$args);
}

// create project Taxonomy	
add_action( 'init', 'create_project_categories' );

function create_project_categories() {
	$labels = array(
		'name'                       => _x('Chuyên Mục Dự Án', 'taxonomy general name'),
		'singular_name'              => _x('Category', 'taxonomy singular name'),
		'search_items'               => __('Search Categories'),
		'popular_items'              => __('Popular Categories'),
		'all_items'                  => __('All Categories'),
		'edit_item'                  => __('Edit Category'),
		'update_item'                => __('Update Category'),
		'add_new_item'               => __('Add New Category'),
		'new_item_name'              => __('New Category Name'),
		'separate_items_with_commas' => __('Separate Categories with commas'),
		'add_or_remove_items'        => __('Add or remove Categories'),
		'choose_from_most_used'      => __('Choose from the most used Categories'),
		'not_found'                  => __('No Category found.'),
		'menu_name'                  => __('Categories'),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'show_in_rest'          => true,
		'rewrite'               => array( 'slug' => 'du-an-cat' ),
	);

	register_taxonomy("project-cat", "project", $args);
}