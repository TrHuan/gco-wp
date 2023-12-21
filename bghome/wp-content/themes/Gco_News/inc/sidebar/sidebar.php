<?php	
function specia_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Primary', 'specia' ),
		'id' => 'sidebar-primary',
		'description' => __( 'Sidebar Widget Primary', 'specia' ),
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
		'name' => __( 'Footer Widget One', 'specia' ),
		'id' => 'footer-widget-one',
		'description' => __( 'Footer Widget One', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Two', 'specia' ),
		'id' => 'footer-widget-two',
		'description' => __( 'Footer Widget Two', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Three', 'specia' ),
		'id' => 'footer-widget-three',
		'description' => __( 'Footer Widget Three', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Four', 'specia' ),
		'id' => 'footer-widget-four',
		'description' => __( 'Footer Widget Four', 'specia' ),
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
	
}
add_action( 'widgets_init', 'specia_widgets_init' );
 
?>