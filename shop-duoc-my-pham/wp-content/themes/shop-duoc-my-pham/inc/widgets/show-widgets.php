<?php



// khởi tạo widgets content blogs

require_once(LIBS_DIR . '/widgets/widget-blogs.php');



// khởi tạo widgets categories blog

// require_once(LIBS_DIR . '/widgets/widget-categories.php');



if ( class_exists( 'WooCommerce' ) ) {

	// khởi tạo widgets content products

	require_once(LIBS_DIR . '/widgets/widget-products.php');



	// khởi tạo widgets content product taxonomies

	// require_once(LIBS_DIR . '/widgets/widget-product-taxonomies.php');



	// khởi tạo widgets categories product

	// require_once(LIBS_DIR . '/widgets/widget-product-categories.php');


}
