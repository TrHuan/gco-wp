<?php



// khởi tạo widgets content blogs

require_once(LIBS_DIR . '/widgets/widget-blogs.php');



// khởi tạo widgets content

if ( class_exists( 'WooCommerce' ) ) {

	// khởi tạo widgets content

	require_once(LIBS_DIR . '/widgets/widget-products.php');

}
