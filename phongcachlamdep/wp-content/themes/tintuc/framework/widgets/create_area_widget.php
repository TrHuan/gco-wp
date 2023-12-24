<?php
function eweb_widgets_init() {
	// Content Home
	register_sidebar( array(
		'name' => __( 'Content Home', 'eweb' ),
		'id' => 'content-home',
		'before_widget' => '<div id="%1$s" class="item-cate %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
	));
	// Sidebar
	register_sidebar( array(
		'name' => __( 'Sidebar', 'eweb' ),
		'id' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="%2$s item-cate">',
        'after_widget' => '</div>',
        'before_title' => '<div class="subcat-2"><span>',
        'after_title' => '</span></div>'
	));
	// Sidebar 2
	register_sidebar( array(
		'name' => __( 'Sidebar 2', 'eweb' ),
		'id' => 'sidebar_2',
		'before_widget' => '<div id="%1$s" class="%2$s item-cate">',
        'after_widget' => '</div>',
        'before_title' => '<div class="subcat-2"><span>',
        'after_title' => '</span></div>'
	));
	// Widget Top Home
	register_sidebar( array(
		'name' => __( 'Ads Top Home', 'eweb' ),
		'id' => 'widget-top-home',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="subcat-2"><span>',
        'after_title' => '</span></div>'
	));
	// Widget Middle Home
	register_sidebar( array(
		'name' => __( 'Ads Middle Home', 'eweb' ),
		'id' => 'widget-middle-home',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="subcat"><span class="title_active">',
        'after_title' => '</span></div>'
	));
	// Widget Bottom Home
	register_sidebar( array(
		'name' => __( 'Ads Bottom Home', 'eweb' ),
		'id' => 'widget-bottom-home',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="subcat"><span class="title_active">',
        'after_title' => '</span></div>'
	));
	// Ads Top Category
	register_sidebar( array(
		'name' => __( 'Ads Top Category', 'eweb' ),
		'id' => 'ads-top-cate',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="subcat"><span class="title_active">',
        'after_title' => '</span></div>'
	));
	// Ads Bottom Category
	register_sidebar( array(
		'name' => __( 'Ads Bottom Category', 'eweb' ),
		'id' => 'ads-bottom-cate',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="subcat"><span class="title_active">',
        'after_title' => '</span></div>'
	));
	// Ads Top Single
	register_sidebar( array(
		'name' => __( 'Ads Top Single', 'eweb' ),
		'id' => 'ads-top-single',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="subcat"><span class="title_active">',
        'after_title' => '</span></div>'
	));
	// Ads Bottom Single
	register_sidebar( array(
		'name' => __( 'Ads Bottom Single', 'eweb' ),
		'id' => 'ads-bottom-single',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="subcat"><span class="title_active">',
        'after_title' => '</span></div>'
	));
	// Ads Middle Single
	register_sidebar( array(
		'name' => __( 'Ads Middle Single', 'eweb' ),
		'id' => 'ads-middle-single',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="subcat"><span class="title_active">',
        'after_title' => '</span></div>'
	));
	// Footer Block 1
	register_sidebar( array(
		'name' => __( 'Footer Block 1', 'eweb' ),
		'id' => 'footer-block-1',
		'before_widget' => '<div id="%1$s" class="%2$s box_footer">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
	));
	// Footer Block 2
	register_sidebar( array(
		'name' => __( 'Footer Block 2', 'eweb' ),
		'id' => 'footer-block-2',
		'before_widget' => '<div id="%1$s" class="%2$s box_footer">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
	));
	// Footer Block 3
	register_sidebar( array(
		'name' => __( 'Footer Block 3', 'eweb' ),
		'id' => 'footer-block-3',
		'before_widget' => '<div id="%1$s" class="%2$s box_footer">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
	));
	// Footer Block 4
	register_sidebar( array(
		'name' => __( 'Footer Block 4', 'eweb' ),
		'id' => 'footer-block-4',
		'before_widget' => '<div id="%1$s" class="%2$s box_footer">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
	));
}
add_action( 'widgets_init', 'eweb_widgets_init' );