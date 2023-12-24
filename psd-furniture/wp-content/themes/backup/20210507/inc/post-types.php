<?php

// create Testimonial
add_action( 'init', 'create_testimonial_item' );

function create_testimonial_item() {
	$labels = array(
		'name' => _x('Testimonials', 'post type general name'),
		'singular_name' => _x('Testimonial', 'post type singular name'),
		'add_new' => _x('Add New', 'Testimonial'),
		'add_new_item' => __('Add New Testimonial'),
		'edit_item' => __('Edit Testimonial'),
		'new_item' => __('New Testimonial'),
		'all_items' => __('All Testimonials'),
		'view_item' => __('View Testimonial'),
		'search_items' => __('Search Testimonial'),
		'not_found' =>  __('No Testimonial found'),
		'not_found_in_trash' => __('No Testimonial found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Testimonials'
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
		'menu_icon' => 'dashicons-editor-quote',

	);

	register_post_type('testimonial',$args);
}
// end create Testimonial

// create Project
add_action( 'init', 'create_project_item' );

function create_project_item() {
	$labels = array(
		'name' => _x('Projects', 'post type general name'),
		'singular_name' => _x('Project', 'post type singular name'),
		'add_new' => _x('Add New', 'Project'),
		'add_new_item' => __('Add New Project'),
		'edit_item' => __('Edit Project'),
		'new_item' => __('New Project'),
		'all_items' => __('All Projects'),
		'view_item' => __('View Project'),
		'search_items' => __('Search Project'),
		'not_found' =>  __('No Project found'),
		'not_found_in_trash' => __('No Project found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Projects'
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
		'rewrite' => array('slug' => 'project'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-editor-quote',

	);

	register_post_type('project',$args);
}

// create Project Taxonomy	
// add_action( 'init', 'create_project_categories' );

// function create_project_categories() {
// 	$labels = array(
// 		'name'                       => _x('Categories', 'taxonomy general name'),
// 		'singular_name'              => _x('Category', 'taxonomy singular name'),
// 		'search_items'               => __('Search Categories'),
// 		'popular_items'              => __('Popular Categories'),
// 		'all_items'                  => __('All Categories'),
// 		'edit_item'                  => __('Edit Category'),
// 		'update_item'                => __('Update Category'),
// 		'add_new_item'               => __('Add New Category'),
// 		'new_item_name'              => __('New Category Name'),
// 		'separate_items_with_commas' => __('Separate Categories with commas'),
// 		'add_or_remove_items'        => __('Add or remove Categories'),
// 		'choose_from_most_used'      => __('Choose from the most used Categories'),
// 		'not_found'                  => __('No Category found.'),
// 		'menu_name'                  => __('Categories'),
// 	);

// 	$args = array(
// 		'hierarchical'          => false,
// 		'labels'                => $labels,
// 		'show_ui'               => true,
// 		'show_admin_column'     => true,
// 		'query_var'             => true,
// 		'rewrite'               => array( 'slug' => 'project-cat' ),
// 	);

// 	register_taxonomy("project_filter", "project", $args);
// }
// end create Project

// create service
add_action( 'init', 'create_service_item' );

function create_service_item() {
	$labels = array(
		'name' => _x('Services', 'post type general name'),
		'singular_name' => _x('service', 'post type singular name'),
		'add_new' => _x('Add New', 'service'),
		'add_new_item' => __('Add New service'),
		'edit_item' => __('Edit Service'),
		'new_item' => __('New Service'),
		'all_items' => __('All Services'),
		'view_item' => __('View Service'),
		'search_items' => __('Search Service'),
		'not_found' =>  __('No Service found'),
		'not_found_in_trash' => __('No Service found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Services'
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
		'rewrite' => array('slug' => 'service'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-editor-quote',

	);

	register_post_type('service',$args);
}

// create service Taxonomy	
add_action( 'init', 'create_service_categories' );

function create_service_categories() {
	$labels = array(
		'name'                       => _x('Categories', 'taxonomy general name'),
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
		'rewrite'               => array( 'slug' => 'service-cat' ),
	);

	register_taxonomy("service_cat", "service", $args);
}
// end create service