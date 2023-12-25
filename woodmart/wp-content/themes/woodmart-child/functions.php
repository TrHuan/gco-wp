<?php
/**
 * Enqueue script and styles for child theme
 */
function woodmart_child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'woodmart-style' ), woodmart_get_theme_info( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'woodmart_child_enqueue_styles', 1000 );

//Option Page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

function devvn_remove_slug( $post_link, $post ) {
    if ( !in_array( get_post_type($post), array( 'product' ) ) || 'publish' != $post->post_status ) {
        return $post_link;
    }
	if('product' == $post->post_type){
    	$post_link = str_replace( '/san-pham/', '/', $post_link ); //Thay product bằng slug hiện tại của bạn
    }else{
    	$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    }    
    return $post_link;
}
add_filter( 'post_type_link', 'devvn_remove_slug', 10, 2 );
function devvn_parse_request( $query ) {
    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'product', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'devvn_parse_request' );
// Remove product cat base
add_filter('term_link', 'devvn_no_term_parents', 1000, 3);
function devvn_no_term_parents($url, $term, $taxonomy) {
    if($taxonomy == 'product_cat'){
        $term_nicename = $term->slug;
        $url = trailingslashit(get_option( 'home' )) . user_trailingslashit( $term_nicename, 'category' );
    }
    return $url;
}
// Add our custom product cat rewrite rules
add_filter('rewrite_rules_array', 'devvn_no_product_cat_parents_rewrite_rules');
function devvn_no_product_cat_parents_rewrite_rules($rules) {
    $new_rules = array();
    $terms = get_terms( array(
        'taxonomy' => 'product_cat',
        'post_type' => 'product',
        'hide_empty' => false,
    ));
    if($terms && !is_wp_error($terms)){
        foreach ($terms as $term){
            $term_slug = $term->slug;
            $new_rules[$term_slug.'/?$'] = 'index.php?product_cat='.$term_slug;
            $new_rules[$term_slug.'/page/([0-9]{1,})/?$'] = 'index.php?product_cat='.$term_slug.'&paged=$matches[1]';
            $new_rules[$term_slug.'/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?product_cat='.$term_slug.'&feed=$matches[1]';
        }
    }
    return $new_rules + $rules;
}
add_filter('woocommerce_product_description_heading',
'remove_product_description_heading');
function remove_product_description_heading() {
    return '';
}

function devvn_wc_custom_get_price_html( $price, $product ) {
    if ( $product->get_price() == 0 ) {
        if ( $product->is_on_sale() && $product->get_regular_price() ) {
            $regular_price = wc_get_price_to_display( $product, array( 'qty' => 1, 'price' => $product->get_regular_price() ) );
 
            $price = wc_format_price_range( $regular_price, __( 'Free!', 'woocommerce' ) );
        } else {
            $price = '<span class="amount">' . __( 'Liên hệ', 'woocommerce' ) . '</span>';
        }
    }
    return $price;
}
add_filter( 'woocommerce_get_price_html', 'devvn_wc_custom_get_price_html', 10, 2 );

function devvn_oft_custom_get_price_html( $price, $product ) {
    if ( !is_admin() && !$product->is_in_stock()) {
       $price = '<span class="amount">' . __( 'LH:  02836118888', 'woocommerce' ) . '</span>';
    }
    return $price;
}
add_filter( 'woocommerce_get_price_html', 'devvn_oft_custom_get_price_html', 99, 2 );

//* Activate shortcode function in Post Title
add_filter( 'the_title', 'do_shortcode' );
//For Yoast SEO
add_filter( 'wpseo_title', 'do_shortcode' );;
//* Shortcode: [year]
add_shortcode( 'year' , 'get_year' );
    function get_year() {
    $year = date("Y");
    return "$year";
}
 
//* Shortcode: [month]
add_shortcode( 'month' , 'get_month' );
    function get_month() {
    $month = date("n");
    return "$month";
}

add_filter('woocommerce_structured_data_product_offer','devvn_woocommerce_structured_data_product_offer', 10, 2);
function devvn_woocommerce_structured_data_product_offer($markup_offer, $product){
    if ('' !== $product->get_price()) {
        if ($product->is_type('variable')) {
            if(isset($markup_offer['price'])){
                $markup_offer['price'] = 0;
            }
            $markup_offer['priceSpecification']['price'] = 0;
        } else {
            $markup_offer['price'] = 0;
            if(isset($markup_offer['priceSpecification']['price'])){
                $markup_offer['priceSpecification']['price'] = 0;
            }
        }
    }
    return $markup_offer;
}

add_filter('posts_clauses', 'devvn_order_by_stock_status', 2000);
function devvn_order_by_stock_status($posts_clauses) {
    global $wpdb;
    if (is_woocommerce() && (is_shop() || is_product_category() || is_product_tag())) {
        $posts_clauses['join'] .= " INNER JOIN $wpdb->postmeta istockstatus ON ($wpdb->posts.ID = istockstatus.post_id) ";
        $posts_clauses['orderby'] = " istockstatus.meta_value ASC, " . $posts_clauses['orderby'];
        $posts_clauses['where'] = " AND istockstatus.meta_key = '_stock_status' AND istockstatus.meta_value <> '' " . $posts_clauses['where'];
    }
    return $posts_clauses;
}

//remove passwd strength meter
add_action('wp_print_scripts', 'remove_password_strength_meter');
function remove_password_strength_meter() {
    // Deregister script about password strenght meter
if ( is_user_logged_in() ) {
   // your code for logged in user 
} else {
   wp_dequeue_script('zxcvbn-async');
   wp_deregister_script('zxcvbn-async');
}
}

// // remove wp version number from scripts and styles
function remove_css_js_version( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_css_js_version', 9999 );
add_filter( 'script_loader_src', 'remove_css_js_version', 9999 );
// remove wp version number from head and rss
function artisansweb_remove_version() {
    return '';
}
add_filter('the_generator', 'artisansweb_remove_version');

function add_async_to_jquery( $tag, $handle, $src ) {
    // Check for our registered handle and add async
    if ( 'jquery' === $handle ) {
        return str_replace( ' src=', ' async src=', $tag );
    }
    // Allow all other tags to pass
    return $tag;
}
//Optimize by De-regiter CSS and JS not use
function my_deregister_scripts(){
	if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
 	wp_dequeue_script( 'wp-embed' );
	if (is_front_page() || is_single() ) wp_dequeue_script('wc-cart-fragments');
	// Check if WooCommerce plugin is active
	if( function_exists( 'is_woocommerce' ) ){
		// Check if it's any of WooCommerce page
		if(! is_woocommerce() && ! is_cart() && ! is_checkout() ) { 		
			
			## Dequeue WooCommerce styles
			wp_dequeue_style('woocommerce-layout'); 
			wp_dequeue_style('woocommerce-general'); 
			wp_dequeue_style('woocommerce-smallscreen'); 	
			## Dequeue WooCommerce scripts
			wp_dequeue_script('wc-cart-fragments');
			wp_dequeue_script('wc-cart-fragments');
			wp_dequeue_script('woocommerce'); 
			wp_dequeue_script('wc-add-to-cart'); 
		
			wp_deregister_script( 'js-cookie' );
			wp_dequeue_script( 'js-cookie' );
 
		}
	}	
}
add_action( 'wp_footer', 'my_deregister_scripts' );

// thông tin theme
$my_theme = wp_get_theme();
define('THEME_NAME', sanitize_title($my_theme->get('Name')));
define('THEME_VERSION', $my_theme->get('Version)'));

function lth_theme_styles() {
    // file css
    wp_enqueue_style(THEME_NAME . '-lth-icofont', get_stylesheet_directory_uri() . '/assets/css/icofont.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-lth-customs', get_stylesheet_directory_uri() . '/assets/css/lth-customs.css', false, THEME_VERSION, 'all');

}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

function lth_theme_scripts() {    
    wp_enqueue_script(THEME_NAME.'-lth-main', get_stylesheet_directory_uri() .'/assets/js/lth-main.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);

add_action( 'init', 'create_tuyen_dung_item' );
function create_tuyen_dung_item() {
    $labels = array(
        'name' => _x('Tuyển Dụng', 'post type general name'),
        'singular_name' => _x('Tuyển Dụng', 'post type singular name'),
        'add_new' => _x('Thêm Mới', 'post type singular name'),
        'add_new_item' => __('Thêm Mới', 'post type singular name'),
        'edit_item' => __('Sửa'),
        'new_item' => __('Thêm Mới'),
        'all_items' => __('Tất Cả Tuyển Dụng'),
        'view_item' => __('Xem'),
        'search_items' => __('Tìm Kiếm'),
        'not_found' =>  __('No tuyển dụng found'),
        'not_found_in_trash' => __('No tuyển dụng found in Trash'), 
        'parent_item_colon' => '',
        'menu_name' => 'Tuyển Dụng'
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
        'rewrite' => array('slug' => 'tuyen-dung'),
        'with_front' => FALSE,
        'menu_icon' => 'dashicons-welcome-widgets-menus',

    );

    register_post_type('tuyen-dung',$args);
}

// create tuyen_dung Taxonomy  
add_action( 'init', 'create_tuyen_dung_categories' );
function create_tuyen_dung_categories() {
    $labels = array(
        'name'                       => _x('Chuyên Mục Tuyển Dụng', 'taxonomy general name'),
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
        'rewrite'               => array( 'slug' => 'tuyen-dung-cat' ),
    );

    register_taxonomy("tuyen-dung-cat", "tuyen-dung", $args);
}

register_sidebar (
    array (
        'name' => __('Chi tiết tuyển dụng'),
        'id'        => 'sidebar_recruitment',
        'before_widget' => '<div class="recruitment-box">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    )
);

register_sidebar (
    array (
        'name' => __('Nộp đơn ứng tuyển'),
        'id'        => 'sidebar_quick_application',
        'before_widget' => '<div class="quick-application-box">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    )
);

function my_custom_upload_mimes($mimes = array()) {
// Add a key and value for the CSV file type
$mimes['csv'] = "text/csv";
return $mimes;
}
add_action('upload_mimes', 'my_custom_upload_mimes');

// add_action( 'init', 'create_cau_hoi_item' );
// function create_cau_hoi_item() {
//     $labels = array(
//         'name' => _x('Câu Hỏi Thường Gặp', 'post type general name'),
//         'singular_name' => _x('Câu Hỏi Thường Gặp', 'post type singular name'),
//         'add_new' => _x('Thêm Mới', 'post type singular name'),
//         'add_new_item' => __('Thêm Mới', 'post type singular name'),
//         'edit_item' => __('Sửa'),
//         'new_item' => __('Thêm Mới'),
//         'all_items' => __('Tất Cả Câu Hỏi Thường Gặp'),
//         'view_item' => __('Xem'),
//         'search_items' => __('Tìm Kiếm'),
//         'not_found' =>  __('No Câu Hỏi Thường Gặp found'),
//         'not_found_in_trash' => __('No Câu Hỏi Thường Gặp found in Trash'), 
//         'parent_item_colon' => '',
//         'menu_name' => 'Câu Hỏi Thường Gặp'
//     );

//     $args = array(
//         'labels' => $labels,
//         'public' => true,
//         'publicly_queryable' => true,
//         'exclude_from_search' => true,
//         'show_ui' => true, 
//         'show_in_menu' => true, 
//         'show_in_nav_menus' => true,
//         'query_var' => true,
//         'rewrite' => true,
//         'capability_type' => 'post',
//         'has_archive' => true, 
//         'hierarchical' => true,
//         'menu_position' => 4,   
//         'supports'            => array(
//             'title',
//             'excerpt',
//             'editor',
//             'thumbnail',
//         ),
//         'rewrite' => array('slug' => 'cau-hoi'),
//         'with_front' => FALSE,
//         'menu_icon' => 'dashicons-welcome-widgets-menus',

//     );

//     register_post_type('cau-hoi',$args);
// }

add_action('init', function(){

    $listques = get_field('listques', 'options'); 

    // var_dump($listques);

});