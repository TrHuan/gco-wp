<?php

// Register Style

function theme_Style()

{

    // css

    wp_register_style('fontawesome-style', get_stylesheet_directory_uri() . "/dist/fonts/fontawesome/fontawesome-all.css", false, 'all');

    wp_enqueue_style('fontawesome-style');



    wp_register_style('bootstrap-style', get_stylesheet_directory_uri() . "/dist/css/bootstrap.min.css", false, 'all');

    wp_enqueue_style('bootstrap-style');

    wp_register_style('mmenu-style', get_stylesheet_directory_uri() . "/dist/css/jquery.mmenu.all.css", false, 'all');

    wp_enqueue_style('mmenu-style');

    wp_register_style('slick-style', get_stylesheet_directory_uri() . "/dist/css/slick.css", false, 'all');

    wp_enqueue_style('slick-style');

    wp_register_style('slick-theme-style', get_stylesheet_directory_uri() . "/dist/css/slick-theme.css", false, 'all');

    wp_enqueue_style('slick-theme-style');

    // wp_register_style( 'magicscroll-style', get_stylesheet_directory_uri() . "/dist/css/magicscroll.css",false, 'all' );

    // wp_enqueue_style('magicscroll-style');

    // wp_register_style( 'magiczoomplus-style', get_stylesheet_directory_uri() . "/dist/css/magiczoomplus.css",false, 'all' );

    // wp_enqueue_style('magiczoomplus-style');

    // wp_register_style( 'animate-style', get_stylesheet_directory_uri() . "/dist/css/animate.css",false, 'all' );

    // wp_enqueue_style('animate-style');

    wp_register_style('fancybox-style', get_stylesheet_directory_uri() . "/dist/css/jquery.fancybox.min.css", false, 'all');

    wp_enqueue_style('fancybox-style');

    wp_register_style('main-style', get_stylesheet_directory_uri() . "/dist/css/style.css", false, 'all');

    wp_enqueue_style('main-style');



    wp_register_style('wp-style', get_stylesheet_directory_uri() . "/dist/css/wp.css", false, 'all');

    wp_enqueue_style('wp-style');



    // js

    wp_register_script('jquery-script', get_stylesheet_directory_uri() . "/dist/js/jquery.min.js", array('jquery'), false, false);

    wp_enqueue_script('jquery-script');

    wp_register_script('mmenu-script', get_stylesheet_directory_uri() . "/dist/js/jquery.mmenu.min.all.js", array('jquery'), false, true);

    wp_enqueue_script('mmenu-script');

    wp_register_script('slick-script', get_stylesheet_directory_uri() . "/dist/js/slick.min.js", array('jquery'), false, true);

    wp_enqueue_script('slick-script');

    // wp_register_script( 'magicscroll-script', get_stylesheet_directory_uri() . "/dist/js/magicscroll.js", array('jquery'),false,true );

    // wp_enqueue_script('magicscroll-script');

    // wp_register_script( 'magiczoomplus-script', get_stylesheet_directory_uri() . "/dist/js/magiczoomplus.js", array('jquery'),false,true );

    // wp_enqueue_script('magiczoomplus-script');

    wp_register_script('popper-script', get_stylesheet_directory_uri() . "/dist/js/popper.min.js", array('jquery'), false, true);

    wp_enqueue_script('popper-script');

    wp_register_script('bootstrap-script', get_stylesheet_directory_uri() . "/dist/js/bootstrap.min.js", array('jquery'), false, true);

    wp_enqueue_script('bootstrap-script');

    // wp_register_script( 'wow-script', get_stylesheet_directory_uri() . "/dist/js/wow.min.js", array('jquery'),false,true );

    // wp_enqueue_script('wow-script');

    // wp_register_script( 'barrating-script', get_stylesheet_directory_uri() . "/dist/js/jquery.barrating.min.js", array('jquery'),false,true );

    // wp_enqueue_script('barrating-script');

    wp_register_script('fancybox-script', get_stylesheet_directory_uri() . "/dist/js/jquery.fancybox.min.js", array('jquery'), false, true);

    wp_enqueue_script('fancybox-script');

    wp_register_script('isotope-script', get_stylesheet_directory_uri() . "/dist/js/isotope.pkgd.min.js", array('jquery'), false, true);

    wp_enqueue_script('isotope-script');

    wp_register_script('imagesloaded-script', get_stylesheet_directory_uri() . "/dist/js/imagesloaded.pkgd.min.js", array('jquery'), false, true);

    wp_enqueue_script('imagesloaded-script');

    wp_register_script('main-script', get_stylesheet_directory_uri() . "/dist/js/main.js", array('jquery'), false, true);

    wp_enqueue_script('main-script');

}

if (!is_admin()) add_action('wp_enqueue_scripts', 'theme_Style');





// Register Menu and image

if (!function_exists('theme_Setup')) {

    function theme_Setup()

    {

        register_nav_menus(array(

            'primary' => __('Menu chính', 'text_domain'),

            'f_service' => __('Menu footer Dịch Vụ', 'text_domain'),

            'f_useful' => __('Menu footer Hữu Ích', 'text_domain'),

        ));



        // add_theme_support( 'woocommerce' );

        add_theme_support('post-thumbnails');

        add_image_size('p-post', 370, 220, true);

    }

    add_action('after_setup_theme', 'theme_Setup');

}





// Register Sidebar

if (!function_exists('theme_Widgets')) {

    function theme_Widgets()

    {

        $sidebars = [

            //         [

            // 'name'          => __( 'Sidebar tin tức', 'text_domain' ),

            // 'id'            => 'sidebar-news',

            // 'description'   => __( 'Vùng sidebar trang danh mục + chi tiết', 'text_domain' ),

            // 'before_widget' => '<div id="%1$s" class="widget %2$s">',

            // 'after_widget'  => '</div>',

            // 'before_title'  => '<h3 class="widget-title">',

            // 'after_title'   => '</h3>',

            //         ],

            [

                'name'          => __('Sidebar Dịch Vụ', 'text_domain'),

                'id'            => 'sidebar-service',

                'description'   => __('Vùng sidebar trang chi tiết ', 'text_domain'),

                'before_widget' => '<div id="%1$s" class="widget sdetail-aitem %2$s">',

                'after_widget'  => '</div>',

                'before_title'  => '<h2 class="t1 s18 bold text-center">',

                'after_title'   => '</h2>',

            ],

        ];



        foreach ($sidebars as $sidebar) {

            register_sidebar($sidebar);

        }

    }

    add_action('widgets_init', 'theme_Widgets');

}





// Shortcode play on Widget

// add_filter('widget_text','do_shortcode');

// Disables the block editor from managing widgets in the Gutenberg plugin.

add_filter('gutenberg_use_widgets_block_editor', '__return_false');

// Disables the block editor from managing widgets.

add_filter('use_widgets_block_editor', '__return_false');

// Use Block Editor default for Post

add_filter('use_block_editor_for_post', '__return_false');





// Delete class and id of wp_nav_menu()

function wp_nav_menu_attributes_filter($var)

{

    return is_array($var) ? array_intersect($var, array('current-menu-item', 'mega-menu')) : '';

}

add_filter('nav_menu_css_class', 'wp_nav_menu_attributes_filter', 100, 1);

add_filter('nav_menu_item_id', 'wp_nav_menu_attributes_filter', 100, 1);

add_filter('page_css_class', 'wp_nav_menu_attributes_filter', 100, 1);





// Delete span, br on Contact Form 7

add_filter('wpcf7_form_elements', function ($content) {

    // Delete span (ko xoá đc vì sẽ mất thông báo validate)

    // $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    // Delete br

    $content = str_replace('<br />', '', $content);

    return $content;

});



// Remove Contact Form 7 script and css, add call funtion in contact.php

// add_filter( 'wpcf7_load_js', '__return_false' );

// add_filter( 'wpcf7_load_css', '__return_false' );



// Call funtion in contact.php

// if ( function_exists( 'wpcf7_enqueue_scripts' ) ) { wpcf7_enqueue_scripts(); }

// if ( function_exists( 'wpcf7_enqueue_styles' ) ) { wpcf7_enqueue_styles(); }





// Setup SMTP

// function setup_smtp_email($phpmailer)

// {

//     $phpmailer->isSMTP();

//     $phpmailer->Host        = 'smtp.gmail.com';

//     $phpmailer->Port        = get_field('smtp_port', 'option');

//     $phpmailer->SMTPAuth    = true;

//     $phpmailer->Username    = get_field('smtp_user', 'option');

//     $phpmailer->Password    = get_field('smtp_pass', 'option');

//     $phpmailer->SMTPSecure  = get_field('smtp_encryption', 'option');

// }

// add_action('phpmailer_init', 'setup_smtp_email');





// Remove admin menu

function custom_admin_menu()

{

    // remove

    remove_menu_page('index.php');                             // index

    remove_menu_page('edit-comments.php');                     // comments

    // remove_menu_page('tools.php');                             // tools

    remove_menu_page('edit.php?post_type=acf-field-group');    // acf field

    remove_menu_page('wpclever');                              // woo quick-view

    // remove_menu_page( 'woocommerce' );                           // woo chính (đơn hàng, cài đặt, ...)

    remove_menu_page('woocommerce-marketing');                 // woo marketing (tiếp thị)



    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');   // tag post

    // remove_submenu_page('themes.php', 'theme-editor.php');                // themes
    
    // remove_menu_page('plugins.php');

    // remove_submenu_page( 'plugins.php', 'plugin-editor.php' );              // plugins

    remove_submenu_page('options-general.php', 'options-writing.php');    // setting

    remove_submenu_page('options-general.php', 'options-discussion.php');

    remove_submenu_page('options-general.php', 'options-media.php');

    remove_submenu_page('options-general.php', 'options-privacy.php');

    remove_submenu_page('wpcf7', 'wpcf7-integration');                    // cf7

    remove_submenu_page('contact-form-listing', 'import_cf7_csv');        // cf7 db

    remove_submenu_page('contact-form-listing', 'shortcode');

    remove_submenu_page('contact-form-listing', 'extentions');

    remove_submenu_page('contact-form-listing', 'mounstride-CRM');

    remove_submenu_page('plugins.php', 'remove_taxonomy_base_slug');      // remove_taxonomy_base_slug

    remove_submenu_page('options-general.php', 'breadcrumb-navxt');       // breadcrumb-navxt

    // xoá chỉnh sửa code theme, plugin trong admin
    define('DISALLOW_FILE_EDIT', true);



    global $menu;       // Global to get menu array

    global $submenu;    // Global to get submenu array



    // rename

    $menu[10][0] = 'Thư viện ảnh';                      // gallery

    if ($menu[45][0] == 'Advanced CF7 DB') {

        $menu[45][0] = 'Dữ liệu form';                  // cf7 db

    }

    $submenu['themes.php'][5][0] = 'Giao diện';         // submenu theme



    // remove

    $submenu['themes.php'][6][1] = '';                  // submenu customize

    // $submenu['edit.php?post_type=product'][16][1] = ''; // woo tag

    // $submenu['edit.php?post_type=product'][17][1] = ''; // woo attribute

}

add_action('admin_menu', 'custom_admin_menu');









// Query_post_by_custompost

function query_post_by_custompost($posttype_name, $numPost)

{

    $qr =  new WP_Query(array(

        'post_type'     => $posttype_name,

        'showposts'     => $numPost,

        'order'         => 'DESC',

        'orderby'       => 'date'

    ));

    return $qr;

}

function query_post_by_custompost_paged($posttype_name, $numPost)

{

    $qr =  new WP_Query(array(

        'post_type'     => $posttype_name,

        'showposts'     => $numPost,

        'order'         => 'DESC',

        'orderby'       => 'date',

        'paged'         => (get_query_var('paged')) ? get_query_var('paged') : 1

    ));

    return $qr;

}





// Query_post_by_category

function query_post_by_category($cat_id, $numPost)

{

    $qr =  new WP_Query(array(

        'cat'           => $cat_id,

        'showposts'     => $numPost,

        'order'         => 'DESC',

        'orderby'       => 'date'

    ));

    return $qr;

}

function query_post_by_category_paged($cat_id, $numPost)

{

    $qr =  new WP_Query(array(

        'cat'           => $cat_id,

        'showposts'     => $numPost,

        'order'         => 'DESC',

        'orderby'       => 'date',

        'paged'         => (get_query_var('paged')) ? get_query_var('paged') : 1

    ));

    return $qr;

}





// Query_post_by_tag

// function query_post_by_tag($tag_id, $numPost){

//     $qr =  new WP_Query( array(

//                         'tag_id'        => $tag_id,

//                         'showposts'     => $numPost,

//                         'order'         => 'DESC',

//                         'orderby'       => 'date'

//                 ) );

//     return $qr;

// }

// function query_post_by_tag_paged($tag_id, $numPost){

//     $qr =  new WP_Query( array(

//                         'tag_id'        => $tag_id,

//                         'showposts'     => $numPost,

//                         'order'         => 'DESC',

//                         'orderby'       => 'date',

//                         'paged'         => (get_query_var('paged')) ? get_query_var('paged') : 1

//                 ) );

//     return $qr;

// }





// Query_post_by_taxonomy

function query_post_by_taxonomy($posttype_name, $taxonomy_name, $term_id, $numPost)

{

    $qr =  new WP_Query(array(

        'post_type'     =>  $posttype_name,

        'tax_query'     =>  array(

            array(

                'taxonomy'  => $taxonomy_name,

                'field'     => 'id',

                'terms'     => $term_id,

                'operator'  => 'IN'

            )

        ),

        'showposts'     =>  $numPost,

        'order'         =>  'DESC',

        'orderby'       =>  'date'

    ));

    return $qr;

}

function query_post_by_taxonomy_paged($posttype_name, $taxonomy_name, $term_id, $numPost)

{

    $qr =  new WP_Query(array(

        'post_type'     =>  $posttype_name,

        'tax_query'     =>  array(

            array(

                'taxonomy'  => $taxonomy_name,

                'field'     => 'id',

                'terms'     => $term_id,

                'operator'  => 'IN'

            )

        ),

        'showposts'     =>  $numPost,

        'order'         =>  'DESC',

        'orderby'       =>  'date',

        'paged'         => (get_query_var('paged')) ? get_query_var('paged') : 1

    ));

    return $qr;

}





// Query_post_by_only_taxonomy ($taxonomy_name là loại trù taxonomy_name đó ra)

// function query_post_by_only_taxonomy($posttype_name, $taxonomy_name, $numPost){

//     $qr =  new WP_Query( array(

//                         'post_type'     =>  $posttype_name,

//                         'tax_query'     =>  array(

//                                                 array(

//                                                         'taxonomy'  => $taxonomy_name,

//                                                         'operator' => 'NOT EXISTS'

//                                                 )),

//                         'showposts'     =>  $numPost,

//                         'order'         =>  'DESC',

//                         'orderby'       =>  'date'

//                 ) );

//     return $qr;

// }

// function query_post_by_only_taxonomy_paged($posttype_name, $taxonomy_name, $numPost){

//     $qr =  new WP_Query( array(

//                         'post_type'     =>  $posttype_name,

//                         'tax_query'     =>  array(

//                                                 array(

//                                                         'taxonomy'  => $taxonomy_name,

//                                                         'operator' => 'NOT EXISTS'

//                                                 )),

//                         'showposts'     =>  $numPost,

//                         'order'         =>  'DESC',

//                         'orderby'       =>  'date',

//                         'paged'         =>  (get_query_var('paged')) ? get_query_var('paged') : 1

//                 ) );

//     return $qr;

// }





// Query_page

// function query_page(){

//     $qr =  new WP_Query( array(

//                         'post_type'      => 'page',

//                         'showposts'      => -1,

//                         'order'          => 'DESC',

//                         'orderby'        => 'menu_order'

//                 ) );

//     return $qr;

// }





// Query_page_by_page_parent

// function query_page_by_page_parent($page_id){

//     $qr =  new WP_Query( array(

//                         'post_type'      => 'page',

//                         'post_parent'    => $page_id,

//                         'showposts'      => -1,

//                         'order'          => 'DESC',

//                         'orderby'        => 'menu_order'

//                 ) );

//     return $qr;

// }





// Query_search_post

function query_search_post($keyword, $posttype_array, $numPost)

{

    $qr =  new WP_Query(array(

        's'              => $keyword,

        'post_type'      => $posttype_array,

        'showposts'      => $numPost,

        'order'          => 'DESC',

        'orderby'        => 'type'

    ));

    return $qr;

}

function query_search_post_paged($keyword, $posttype_array, $numPost)

{

    $qr =  new WP_Query(array(

        's'              => $keyword,

        'post_type'      => $posttype_array,

        'showposts'      => $numPost,

        'order'          => 'DESC',

        'orderby'        => 'type',

        'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1

    ));

    return $qr;

}





// Query_search_post_by_category

// function query_search_post_by_category($keyword, $cat_id, $posttype_name, $numPost){

//     $qr =  new WP_Query( array(

//                         's'              => $keyword,

//                         'cat'            => $cat_id,

//                         'post_type'      => $posttype_name,

//                         'showposts'      => $numPost,

//                         'order'          => 'DESC',

//                         'orderby'        => 'type'

//                 ) );

//     return $qr;

// }

// function query_search_post_by_category_paged($keyword, $cat_id, $posttype_name, $numPost){

//     $qr =  new WP_Query( array(

//                         's'              => $keyword,

//                         'cat'            => $cat_id,

//                         'post_type'      => $posttype_name,

//                         'showposts'      => $numPost,

//                         'order'          => 'DESC',

//                         'orderby'        => 'type',

//                         'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1

//                 ) );

//     return $qr;

// }





// Query_search_post_by_taxonomy

// function query_search_post_by_taxonomy($keyword, $term_id, $posttype_name, $taxonomy_name, $numPost){

//     $qr =  new WP_Query( array(

//                         's'              => $keyword,

//                         'tax_query'      => array(

//                                                 array(

//                                                         'taxonomy'  => $taxonomy_name,

//                                                         'field'     => 'id',

//                                                         'terms'     => $term_id,

//                                                         'operator'  => 'IN'

//                                                 )),

//                         'post_type'      => $posttype_array,

//                         'showposts'      => $numPost,

//                         'order'          => 'DESC',

//                         'orderby'        => 'type'

//                 ) );

//     return $qr;

// }

// function query_search_post_by_taxonomy_paged($keyword, $term_id, $posttype_name, $taxonomy_name, $numPost){

//     $qr =  new WP_Query( array(

//                         's'              => $keyword,

//                         'tax_query'      => array(

//                                                 array(

//                                                         'taxonomy'  => $taxonomy_name,

//                                                         'field'     => 'id',

//                                                         'terms'     => $term_id,

//                                                         'operator'  => 'IN'

//                                                 )),

//                         'post_type'      => $posttype_array,

//                         'showposts'      => $numPost,

//                         'order'          => 'DESC',

//                         'orderby'        => 'type',

//                         'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1

//                 ) );

//     return $qr;

// }





// Query_post_views_hot

// function query_post_views_hot($numPost){

//     $qr =  new WP_Query( array(

//                         'meta_key'       => 'post_views_count',

//                         'showposts'      => $numPost,

//                         'order'          => 'DESC',

//                         'orderby'        => 'meta_value_num'

//                 ) );

//     return $qr;

// }

// function query_post_views_hot_paged($numPost){

//     $qr =  new WP_Query( array(

//                         'meta_key'       => 'post_views_count',

//                         'showposts'      => $numPost,

//                         'order'          => 'DESC',

//                         'orderby'        => 'meta_value_num',

//                         'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1

//                 ) );

//     return $qr;

// }





// Query_post_buy_hot

// function query_post_buy_hot($posttype_name, $numPost){

//     $qr =  new WP_Query( array(

//                         'post_type'      => $posttype_name,

//                         'meta_key'       => 'total_sales',

//                         'showposts'      => $numPost,

//                         'order'          => 'DESC',

//                         'orderby'        => 'meta_value_num'

//                 ) );

//     return $qr;

// }

// function query_post_buy_hot_paged($posttype_name, $numPost){

//     $qr =  new WP_Query( array(

//                         'post_type'      => $posttype_name,

//                         'meta_key'       => 'total_sales',

//                         'showposts'      => $numPost,

//                         'order'          => 'DESC',

//                         'orderby'        => 'meta_value_num',

//                         'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1

//                 ) );

//     return $qr;

// }







// Edit Footer on Admin

if (!function_exists('remove_footer_admin')) {

    function remove_footer_admin()

    {

        echo 'Thiết kế website bởi <a href="http://gco.vn/" target="_blank">GCO</a>';

    }

    add_filter('admin_footer_text', 'remove_footer_admin');

}





// Close all Update

if (!function_exists('remove_core_updates')) {

    function remove_core_updates()

    {

        global $wp_version;

        return (object) array('last_checked' => time(), 'version_checked' => $wp_version,);

    }

    add_filter('pre_site_transient_update_core', 'remove_core_updates');

    add_filter('pre_site_transient_update_plugins', 'remove_core_updates');

    add_filter('pre_site_transient_update_themes', 'remove_core_updates');

}





// Custom Favicon

if (!function_exists('custom_favicon')) {

    function custom_favicon()

    {

        echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_field('favicon', 'option') . '" />';

    }

    add_action('wp_head', 'custom_favicon');

}





// Custom logo admin bar

if (!function_exists('wpb_custom_logo')) {

    function wpb_custom_logo()

    {

        echo '

            <style type="text/css">

                #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon::before {

                    background-image: url(' . get_field('favicon', 'option') . ');

                    background-position: left center;

                    background-repeat: no-repeat;

                    background-size: contain;

                    -moz-background-size: contain;

                    -webkit-background-size: contain;

                    -o-background-size: contain;

                    -ms-background-size: contain;

                    content: "";

                    display: inline-block;

                    height: 20px;

                    left: 3px;

                    top: 3px;

                    width: 25px;

                }

            </style>';

    }

    add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

}





// Custom logo admin login

if (!function_exists('my_login_logo_one')) {

    function my_login_logo_one()

    {

        echo '

            <style type="text/css">

                body.login div#login h1 a {

                    background-image: url(' . get_field('favicon', 'option') . ');

                    background-position: center center;

                    background-repeat: no-repeat;

                    background-size: contain;

                    -moz-background-size: contain;

                    -webkit-background-size: contain;

                    -o-background-size: contain;

                    -ms-background-size: contain;

                    display: inline-block;

                    height: 200px;

                    line-height: 0;

                    margin: -30px auto 0;

                    width: 200px;

                }

            </style>';

    }

    add_action('login_enqueue_scripts', 'my_login_logo_one');

}

