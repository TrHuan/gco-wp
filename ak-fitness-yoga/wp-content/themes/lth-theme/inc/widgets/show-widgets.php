<?php



// khởi tạo widgets content tin tức

require_once(LIBS_DIR . '/widgets/widget-blogs.php');



// khởi tạo widgets content

if ( class_exists( 'WooCommerce' ) ) {

	// khởi tạo widgets content

	require_once(LIBS_DIR . '/widgets/widget-products.php');

}


// khởi tạo widgets content khách hàng
require_once(LIBS_DIR . '/widgets/widget-testimonials.php');

// khởi tạo widgets content logo
require_once(LIBS_DIR . '/widgets/widget-logo.php');

// khởi tạo widgets content search
require_once(LIBS_DIR . '/widgets/widget-search.php');

if ( class_exists( 'WooCommerce' ) ) {
	// khởi tạo widgets content cart
	require_once(LIBS_DIR . '/widgets/widget-cart.php');
}

// khởi tạo widgets content menu
require_once(LIBS_DIR . '/widgets/widget-menu.php');