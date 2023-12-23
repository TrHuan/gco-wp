<?php

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => __('Tùy Chỉnh Giao Diện'), // Title hiển thị khi truy cập vào Options page
        'menu_title'    => __('Tùy Chỉnh Giao Diện'), // Tên menu hiển thị ở khu vực admin
        'menu_slug'     => 'lth-theme-options', // Url hiển thị trên đường dẫn của options page
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));

    ///////////////////////////////////////////
	
	acf_add_options_page(array(
		'page_title' 	=> __('Tùy Chỉnh Trang'),
		'menu_title'	=> __('Tùy Chỉnh Trang'),
		'menu_slug'     => 'lth-pages-settings',
        'capability'    => 'edit_posts',
        'redirect'  	=> false,
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Trang Chủ'),
		'menu_title'	=> __('Trang Chủ'),
		'parent_slug'	=> 'lth-pages-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Trang Giới Thiệu'),
		'menu_title'	=> __('Trang Giới Thiệu'),
		'parent_slug'	=> 'lth-pages-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Trang Liên Hệ'),
		'menu_title'	=> __('Trang Liên Hệ'),
		'parent_slug'	=> 'lth-pages-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Trang Tin Tức'),
		'menu_title'	=> __('Trang Tin Tức'),
		'parent_slug'	=> 'lth-pages-settings',
	));
	
	if ( class_exists( 'WooCommerce' ) ) {
		acf_add_options_sub_page(array(
			'page_title' 	=> __('Trang Sản Phẩm'),
			'menu_title'	=> __('Trang Sản Phẩm'),
			'parent_slug'	=> 'lth-pages-settings',
		));
	}
	
	if ( class_exists( 'ACF' ) ) {
		if (get_field('services', 'option') == 'true') {
			acf_add_options_sub_page(array(
				'page_title' 	=> __('Trang Dịch Vụ'),
				'menu_title'	=> __('Trang Dịch Vụ'),
				'parent_slug'	=> 'lth-pages-settings',
			));
		}
		
		if (get_field('projects', 'option') == 'true') {
			acf_add_options_sub_page(array(
				'page_title' 	=> __('Trang Dự Án'),
				'menu_title'	=> __('Trang Dự Án'),
				'parent_slug'	=> 'lth-pages-settings',
			));
		}
	}

	acf_add_options_sub_page(array(
		'page_title' 	=> __('Trang Báo Giá'),
		'menu_title'	=> __('Trang Báo Giá'),
		'parent_slug'	=> 'lth-pages-settings',
	));
}