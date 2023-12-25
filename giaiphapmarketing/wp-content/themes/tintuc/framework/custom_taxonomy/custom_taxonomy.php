<?php
add_action( 'init', 'create_news_taxonomies', 0 );

function create_news_taxonomies() {

	// Dòng sự kiện
	$labels = array(
		'name'              => __( 'Dòng sự kiện' ),
		'singular_name'     => __( 'Categories' ),
		'search_items'      => __( 'Search' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category :' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Dòng sự kiện' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'dong-su-kien' ),
	);

	register_taxonomy( 'dong-su-kien', array('post'), $args );

	// Danh mục Video
	$labels = array(
		'name'              => __( 'Danh mục Video' ),
		'singular_name'     => __( 'Categories' ),
		'search_items'      => __( 'Search' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category :' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Danh mục' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'videos' ),
	);

	register_taxonomy( 'videos', array('video'), $args );

	flush_rewrite_rules();
}