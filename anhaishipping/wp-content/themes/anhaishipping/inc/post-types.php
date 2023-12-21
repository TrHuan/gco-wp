<?php

if ( class_exists( 'ACF' ) ) {
	// if (get_field('slidershow', 'option') == 'true') {
	// 	require_once(LIBS_DIR . '/post-types/slidershow.php');
	// }

	// if (get_field('features', 'option') == 'true') {
	// 	require_once(LIBS_DIR . '/post-types/features.php');
	// }

	// if (get_field('brands', 'option') == 'true') {
	// 	require_once(LIBS_DIR . '/post-types/brands.php');
	// }

	if (get_field('testimonials', 'option') == 'true') {
		require_once(LIBS_DIR . '/post-types/testimonials.php');
	}

	//////////

	if (get_field('projects', 'option') == 'true') {
		require_once(LIBS_DIR . '/post-types/projects.php');
	}

	if (get_field('services', 'option') == 'true') {
		require_once(LIBS_DIR . '/post-types/services.php');
	}
}

// add_action( 'init', 'create_bang_gia_item' );
// function create_bang_gia_item() {
// 	$labels = array(
// 		'name' => _x('Bảng Giá', 'post type general name'),
// 		'singular_name' => _x('Bảng Giá', 'post type singular name'),
// 		'add_new' => _x('Thêm Mới', 'Banggia'),
// 		'add_new_item' => __('Thêm Mới'),
// 		'edit_item' => __('Sửa'),
// 		'new_item' => __('Thêm Mới'),
// 		'all_items' => __('Tất Cả Bảng Giá'),
// 		'view_item' => __('Xem'),
// 		'search_items' => __('Tìm Kiếm'),
// 		'not_found' =>  __('No Item found'),
// 		'not_found_in_trash' => __('No Item found in Trash'), 
// 		'parent_item_colon' => '',
// 		'menu_name' => 'Bảng Giá'
// 	);

// 	$args = array(
// 		'labels' => $labels,
// 		'public' => true,
// 		'publicly_queryable' => true,
// 		'exclude_from_search' => true,
// 		'show_ui' => true, 
// 		'show_in_menu' => true, 
// 		'show_in_nav_menus' => true,
// 		'query_var' => true,
// 		'rewrite' => true,
// 		'capability_type' => 'post',
// 		'has_archive' => true, 
// 		'hierarchical' => true,
// 		'menu_position' => 4,	
// 		'supports'            => array(
// 			'title',
// 			'excerpt',
// 			'editor',
// 			'thumbnail',
// 		),
// 		'rewrite' => array('slug' => 'bang_gia'),
// 		'with_front' => FALSE,
// 		'menu_icon' => 'dashicons-welcome-widgets-menus',

// 	);

// 	register_post_type('bang-gia',$args);
// }

add_action( 'init', 'create_doi_tau_item' );
function create_doi_tau_item() {
	$labels = array(
		'name' => _x('Đội Tàu', 'post type general name'),
		'singular_name' => _x('Đội Tàu', 'post type singular name'),
		'add_new' => _x('Thêm Mới', 'Doitau'),
		'add_new_item' => __('Thêm Mới'),
		'edit_item' => __('Sửa'),
		'new_item' => __('Thêm Mới'),
		'all_items' => __('Tất Cả Đội Tàu'),
		'view_item' => __('Xem'),
		'search_items' => __('Tìm Kiếm'),
		'not_found' =>  __('No Item found'),
		'not_found_in_trash' => __('No Item found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Đội Tàu'
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
		'rewrite' => array('slug' => 'doi_tau'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('doi-tau',$args);
}

// create service Taxonomy	
add_action( 'init', 'create_doi_tau_categories' );

function create_doi_tau_categories() {
	$labels = array(
		'name'                       => _x('Chuyên Mục Đội Tàu', 'taxonomy general name'),
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
		'rewrite'               => array( 'slug' => 'doi-tau-cat' ),
	);

	register_taxonomy("doi-tau-cat", "doi-tau", $args);
}

add_action( 'init', 'create_thu_vien_item' );
function create_thu_vien_item() {
	$labels = array(
		'name' => _x('Thư Viện', 'post type general name'),
		'singular_name' => _x('Thư Viện', 'post type singular name'),
		'add_new' => _x('Thêm Mới', 'Doitau'),
		'add_new_item' => __('Thêm Mới'),
		'edit_item' => __('Sửa'),
		'new_item' => __('Thêm Mới'),
		'all_items' => __('Tất Cả Thư Viện'),
		'view_item' => __('Xem'),
		'search_items' => __('Tìm Kiếm'),
		'not_found' =>  __('No Item found'),
		'not_found_in_trash' => __('No Item found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Thư Viện'
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
		'rewrite' => array('slug' => 'thu_vien'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('thu-vien',$args);
}

// create service Taxonomy	
add_action( 'init', 'create_thu_vien_categories' );

function create_thu_vien_categories() {
	$labels = array(
		'name'                       => _x('Chuyên Mục Thư Viện', 'taxonomy general name'),
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
		'rewrite'               => array( 'slug' => 'thu-vien-cat' ),
	);

	register_taxonomy("thu-vien-cat", "thu-vien", $args);
}