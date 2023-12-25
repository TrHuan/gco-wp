<?php

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme Options', // Title hiển thị khi truy cập vào Options page
        'menu_title'    => 'Theme Options', // Tên menu hiển thị ở khu vực admin
        'menu_slug'     => 'lth-theme-options', // Url hiển thị trên đường dẫn của options page
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Options Page Blogs',
	// 	'menu_title'	=> 'Page Blogs',
	// 	'parent_slug'	=> 'lth-theme-options',
	// ));
	
	// if ( class_exists( 'WooCommerce' ) ) {
	// 	acf_add_options_sub_page(array(
	// 		'page_title' 	=> 'Options Page Products',
	// 		'menu_title'	=> 'Page Products',
	// 		'parent_slug'	=> 'lth-theme-options',
	// 	));
	// }
	
	if (get_field('projects', 'option') == 'yes') {
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Options Page Projects',
			'menu_title'	=> 'Page Projects',
			'parent_slug'	=> 'lth-theme-options',
		));
	}
	
	if (get_field('services', 'option') == 'yes') {
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Options Page Services',
			'menu_title'	=> 'Page Services',
			'parent_slug'	=> 'lth-theme-options',
		));
	}
	
	acf_add_options_page(array(
		'page_title' 	=> 'Pages Build',
		'menu_title'	=> 'Pages Build',
		'menu_slug'     => 'lth-pages-build',
        'capability'    => 'edit_posts',
        'redirect'  => false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Page Home',
		'menu_title'	=> 'Page Home',
		'parent_slug'	=> 'lth-pages-build',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Trang Giới Thiệu',
		'menu_title'	=> 'Trang Giới Thiệu',
		'parent_slug'	=> 'lth-pages-build',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Trang Liên Hệ',
		'menu_title'	=> 'Trang Liên Hệ',
		'parent_slug'	=> 'lth-pages-build',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Trang Thiết Kế',
		'menu_title'	=> 'Trang Thiết Kế',
		'parent_slug'	=> 'lth-pages-build',
	));
}