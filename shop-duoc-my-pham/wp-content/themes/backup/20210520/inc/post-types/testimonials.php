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

// create Testimonial Taxonomy	
// add_action( 'init', 'create_testimonial_categories' );

// function create_testimonial_categories() {
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
// 		'rewrite'               => array( 'slug' => 'testimonial-cat' ),
// 	);

// 	register_taxonomy("testimonial_filter", "testimonial", $args);
// }
// end create Testimonial