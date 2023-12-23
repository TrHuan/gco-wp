<?php
// Add custom Theme Functions here

define('LTH_UX_SHORTCODES_PATH', get_template_directory() . '/inc/shortcodes');
define('LTH_UX_BUILDER_PATH', get_template_directory() . '/inc/builder');
define('LTH_UX_ELEMENTS_PATH', get_template_directory() . '/inc/builder/shortcodes');
define('LTH_UX_ELEMENTS_URI', get_template_directory_uri() . '/inc/builder/shortcodes');
define('LTH_CHILD_PATH', get_theme_file_path());
define('LTH_CHILD_URI', get_theme_file_uri());

$my_theme = wp_get_theme();
define('THEME_NAME', sanitize_title($my_theme->get('Name')));
define('THEME_VERSION', $my_theme->get('Version)'));

function lth_ux_builder_template($path)
{
    ob_start();
    include get_theme_file_path() . '/inc/elements/templates/' . $path;
    return ob_get_clean();
}

function lth_ux_builder_thumbnail($name)
{
    return get_theme_file_uri() . '/inc/elements/thumbnails/' . $name . '.svg';
}

function lth_ux_builder_template_thumb($name)
{
    return get_theme_file_uri() . '/inc/elements/templates/thumbs/' . $name . '.jpg';
}


// Add structure
foreach (glob(__DIR__ . "/inc/structure/*.php") as $filename) {
    require_once $filename;
}


// Add structure
foreach (glob(__DIR__ . "/inc/woocommerce/*.php") as $filename) {
    require_once $filename;
}


// Add Shortcodes
foreach (glob(__DIR__ . "/inc/shortcodes/*.php") as $filename) {
    require_once $filename;
}
foreach (glob(__DIR__ . "/inc/shortcodes/ux_countdown/*.php") as $filename) {
    require_once $filename;
}

// Add UX Builder Elements
add_action('ux_builder_setup', function () {

    foreach (glob(__DIR__ . "/inc/elements/*.php") as $filename) {
        require_once $filename;
    }
});

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_after_shop_loop_item1', 'woocommerce_template_loop_add_to_cart', 10);


// Cài đặt những plugins cần thiết
require_once(get_theme_file_path() . '/inc/plugins/class-tgm-plugin-activation.php');
require_once(get_theme_file_path() . '/inc/plugins/plugins.php');


// Thay doi logo admin wordpress
function login_css()
{ ?>
    <style>
        .login h1 a {
            background-image: url("<?php echo LTH_CHILD_URI . '/assets/css/admin/' ?>images/logo.png");
            background-size: 100%;
            width: 120px;
            height: 46px;
        }
    </style>
    <?php }
// add_action('login_head', 'login_css');

// add css admin
function lth_addmin_custom_css()
{
    wp_enqueue_style('css-lth-admin', LTH_CHILD_URI . '/assets/css/admin/admin.css', false, 'all');
}
add_action('admin_head', 'lth_addmin_custom_css');

// add css admin customize
function lth_enqueue_customizer_stylesheet()
{
    wp_enqueue_style('lth-customizer-admin', LTH_CHILD_URI . '/assets/css/admin/admin.css', false, 'all');
}
add_action('customize_controls_print_styles', 'lth_enqueue_customizer_stylesheet');

if (!function_exists('lth_flatsome_editor_style')) {
    function lth_flatsome_editor_style($url)
    { ?>
        <style>
            app-actions {
                display: none !important;
            }
        </style>
<?php }
}
add_filter('mce_css', 'lth_flatsome_editor_style');


/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_styles()
{
    wp_enqueue_style('css-lth-bootstrap', LTH_CHILD_URI . '/assets/css/bootstrap.min.css', false, 'all');
    wp_enqueue_style('css-lth-fontawesome', LTH_CHILD_URI . '/assets/css/all.fontawesome.min.css', false, 'all');
    wp_enqueue_style('css-lth-customs', get_theme_file_uri() . '/assets/css/customs.css', false, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

/**
 * Add js
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_scripts()
{
	// file css
	wp_enqueue_style('css-lth-slick', LTH_CHILD_URI . '/assets/css/slick.min.css', false, 'all');

	////////////////////////////////////////////////////////////////////////////////////////////////////

    wp_enqueue_script('js-lth-jquery', LTH_CHILD_URI .'/assets/js/jquery.min.js', false, 'all');
    wp_enqueue_script('js-lth-slick', LTH_CHILD_URI .'/assets/js/slick.min.js', false, 'all');
    wp_enqueue_script('js-lth-main', LTH_CHILD_URI . '/assets/js/main.js', false, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);

// Làm việc với các fields trong trang checkout của woocommerce
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields', 99);
function custom_override_checkout_fields($fields)
{
    $fields['billing']['billing_phone'] = array(
        'label' => __('Số điện thoại', 'lth'),
        'placeholder' => _x('Số điện thoại', 'placeholder', 'lth'),
        'required' => true,
        'class' => array('form-row-wide'),
        'minlength' => '10',
        'maxlength' => '11',
        'clear' => true
    );

    $fields['billing']['billing_phone']['placeholder'] = 'Số điện thoại';

    $fields['shipping']['shipping_phone'] = array(
        'label' => __('Số điện thoại', 'lth'),
        'placeholder' => _x('Số điện thoại của người nhận', 'placeholder', 'lth'),
        'required' => true,
        'class' => array('form-row-wide'),
        'minlength' => '10',
        'maxlength' => '11',
        'clear' => true
    );

    $fields['shipping']['billing_phone']['placeholder'] = 'Số điện thoại của người nhận';

    return $fields;
}

add_filter('posts_search', 'my_search_is_exact', 20, 2);
function my_search_is_exact($search, $wp_query)
{

    global $wpdb;

    if (empty($search)) {
        return $search;
    } else {


        $q = $wp_query->query_vars;
        $n = !empty($q['exact']) ? '' : '%';

        $search = $searchand = '';

        foreach ((array)$q['search_terms'] as $term) :

            $term = esc_sql(like_escape($term));

            // $search.= "{$searchand}($wpdb->posts.post_title REGEXP '[[:<:]]{$term}[[:>:]]') OR ($wpdb->posts.post_content REGEXP '[[:<:]]{$term}[[:>:]]')";

            $search .= "{$searchand}($wpdb->posts.post_title REGEXP '[[:<:]]{$term}[[:>:]]')";

            $searchand = ' AND ';

        endforeach;

        if (!empty($search)) :
            $search = " AND ({$search}) ";
            if (!is_user_logged_in())
                $search .= " AND ($wpdb->posts.post_password = '') ";
        endif;

        return $search;
    }
}

// thay text buttom đặt hàng trong list sản phẩm
add_filter('woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text');
function woo_custom_cart_button_text()
{
    return __('Đặt Tour', 'woocommerce');
}

// thay text buttom đặt hàng trong chi tiết sản phẩm
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
function woo_custom_cart_button_text_2()
{
    return __('Đặt Tour', 'woocommerce');
}

// Register Custom Post Type Du An
function custom_post_type_du_an() {

	$labels = array(
		'name'                  => _x( 'Dự Án', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Dự Án', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Dự Án', 'text_domain' ),
		'add_new'               => __( 'Thêm Mới', 'text_domain' ),
	);
	$args = array(
		'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'du_an' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'         => array( 'du_an_cat' ),
	);
	register_post_type( 'du_an', $args );

}
add_action( 'init', 'custom_post_type_du_an', 0 );

// Register Custom Post Type Du An Cat
function du_an_cat() {
    $labels = array(
        'name'                          => 'Danh Mục',
        'singular_name'                 => 'Danh Mục',
        'add_new_item'                  => 'Thêm Mới',
    );
    
    $args = array(
        'labels'                        => $labels,
        'public'                        => true,
        'hierarchical'                  => true,
        'show_ui'                       => true,
        'show_in_nav_menus'             => true,
        'rewrite'                       => array( 'slug' => 'du_an_cat' ),
        'query_var'                     => true
    );
    
    register_taxonomy( 'du_an_cat', 'du_an', $args );
}
add_action('init', 'du_an_cat');

add_filter('use_block_editor_for_post', '__return_false');

require_once(LTH_CHILD_PATH . '/plugins/acf/acf.php');