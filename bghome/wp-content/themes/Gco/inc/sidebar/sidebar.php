<?php	
function specia_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Archive Posts', 'specia' ),
		'id' => 'sidebar-primary',
		'description' => __( 'Widget Archive Posts', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar Single Posts', 'specia' ),
		'id' => 'sidebar_single_posts',
		'description' => __( 'Widget single Posts', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar Bộ sưu tập', 'specia' ),
		'id' => 'sidebar-collection',
		'description' => __( 'Sidebar Widget collection', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar woocommerce', 'specia' ),
		'id' => 'sidebar-woocommerce',
		'description' => __( 'Sidebar Widget woocommerce', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar Single Product', 'specia' ),
		'id' => 'sidebar_single_product',
		'description' => __( 'Widget single product', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Left', 'specia' ),
		'id' => 'footer-widget-left',
		'description' => __( 'Footer Widget Left', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Right', 'specia' ),
		'id' => 'footer-widget-right',
		'description' => __( 'Footer Widget Right', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'specia_widgets_init' );
 
?>