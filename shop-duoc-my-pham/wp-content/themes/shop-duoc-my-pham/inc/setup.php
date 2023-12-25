<?php

/**

 * Setup

 * 

 * @author LTH

 * @since 2020

 */



function lth_theme_setup() {

    // cho phép hiển thị title trên trình duyệt

    add_theme_support('title-tag');



    // đăng ký menu

    register_nav_menus(array(

        'main_menu'   => __('Main Menu'),

        // 'footer_menu' => __('Footer Menu'),

    ));



    // cho phép sử dụng thumbnails

    add_theme_support('post-thumbnails');



    // đăng ký post format

    add_theme_support ('post-formats', array(

        'aside',

        'gallery',

        'link'

    ));



    // Tắt tính năng tạo ảnh thumbnail của wordpress

    function lth_remove_unused_image_size( $sizes) { 

       unset( $sizes['thumbnail']);

       unset( $sizes['medium']);

       unset( $sizes['large']);

       unset( $sizes['post-thumbnail']);

       unset( $sizes['twentyfourteen-full-width']);

    }

    add_filter('intermediate_image_sizes_advanced', 'lth_remove_unused_image_size');

    // Tạo custom_img bằng bfi_thumb

    require_once(LIBS_DIR . '/bfi_thumb/settings.php');



    // Cài đặt những plugins cần thiết

    require_once(LIBS_DIR . '/plugins/class-tgm-plugin-activation.php');

    require_once(LIBS_DIR . '/plugins/plugins.php');



    // theme options

    require_once(LIBS_DIR . '/theme-options.php');



    // testimonials
    require_once(LIBS_DIR . '/post-types/testimonials.php');



    // trình soạn thảo: đưa về phiên bản cũ
    add_filter('use_block_editor_for_post', '__return_false');



    // remove admin bar font end
    add_filter('show_admin_bar', '__return_false');



    add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
    function my_wp_nav_menu_objects( $items, $args ) { 
        foreach( $items as $item ) {
            $icon = get_field('icon', $item);
            if( $icon ) {                
                $item->title .= ' <i class="'.$icon.'"></i>';                
            }  

            $img = get_field('image', $item); 
            if( $img ) {                
                $item->title .= '<img src="'.$img.'">';                
            }
        }      
        return $items;        
    }

}

add_action('after_setup_theme', 'lth_theme_setup');



// require_once(LIBS_DIR . '/login/functions.php');



/**

* Khởi tạo widget sidebar

*/

function lth_sidebar_register() {

    // Sidebar Home

    // register_sidebar (

    //     array (

    //         'name' => __('Sidebar Home'),

    //         'id'        => 'sidebar_home',

    //         'before_widget' => '<article class="sidebar-box">',

    //         'after_widget' => '</article>',

    //         'before_title' => '<h3>',

    //         'after_title' => '</h3>',

    //     )

    // );



    // Sidebar Blogs

    register_sidebar (

        array (

            'name' => __('Sidebar Blogs'),

            'id'        => 'sidebar_blogs',

            'before_widget' => '<article class="sidebar-box">',

            'after_widget' => '</article>',

            'before_title' => '<h3>',

            'after_title' => '</h3>',

        )

    );

    // Sidebar Blogs

    register_sidebar (

        array (

            'name' => __('Sidebar Blogs Detail'),

            'id'        => 'sidebar_blogs_detail',

            'before_widget' => '<article class="sidebar-box">',

            'after_widget' => '</article>',

            'before_title' => '<h3>',

            'after_title' => '</h3>',

        )

    );



    // Sidebar Shop

    // register_sidebar (

    //     array (

    //         'name' => __('Sidebar Shop'),

    //         'id'        => 'sidebar_shop',

    //         'before_widget' => '<article class="sidebar-box">',

    //         'after_widget' => '</article>',

    //         'before_title' => '<h3>',

    //         'after_title' => '</h3>',

    //     )

    // );



    // Sidebar Product Detail

    register_sidebar (

        array (

            'name' => __('Sidebar Product Detail'),

            'id'        => 'sidebar_product_detail',

            'before_widget' => '<article class="sidebar-box">',

            'after_widget' => '</article>',

            'before_title' => '<h3>',

            'after_title' => '</h3>',

        )

    );

}

add_action('widgets_init', 'lth_sidebar_register');



/**

* Remove Parent Category from Child Category URL

*/
add_filter('term_link', 'lth_no_category_parents', 1000, 3);
function lth_no_category_parents($url, $term, $taxonomy) {

    if($taxonomy == 'category'){

        $term_nicename = $term->slug;

        $url = trailingslashit(get_option( 'home' )) . user_trailingslashit( $term_nicename, 'category' );

    }

    return $url;

}
// Rewrite url mới
function lth_no_category_parents_rewrite_rules($flash = false) {

    $terms = get_terms( array(

        'taxonomy' => 'category',

        'post_type' => 'post',

        'hide_empty' => false,

    ));

    if($terms && !is_wp_error($terms)){

        foreach ($terms as $term){

            $term_slug = $term->slug;

            add_rewrite_rule($term_slug.'/?$', 'index.php?category_name='.$term_slug,'top');

            add_rewrite_rule($term_slug.'/page/([0-9]{1,})/?$', 'index.php?category_name='.$term_slug.'&paged=$matches[1]','top');

            add_rewrite_rule($term_slug.'/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?category_name='.$term_slug.'&feed=$matches[1]','top');

        }

    }

    if ($flash == true) {

        flush_rewrite_rules(false);

    }

}
add_action('init', 'lth_no_category_parents_rewrite_rules'); 
/*Sửa lỗi khi tạo mới category bị 404*/
function lth_new_category_edit_success() {
    lth_no_category_parents_rewrite_rules(true);
}
add_action('created_category','lth_new_category_edit_success');
add_action('edited_category','lth_new_category_edit_success');
add_action('delete_category','lth_new_category_edit_success');


function add_fields_user($profile_fields){
    // $profile_fields['avatar_upload'] = 'Image ';
    if ( !class_exists( 'WooCommerce' ) ) {
        $profile_fields['phone'] = 'Phone ';
    }
    $profile_fields['zalo'] = 'Zalo ';
    $profile_fields['facebook'] = 'Facebook';
    $profile_fields['googleplus'] = 'Google+';
    $profile_fields['twitter'] = 'Twitter';
    return $profile_fields;
}
add_filter('user_contactmethods', 'add_fields_user');


// Sắp xếp sản phẩm trong addmin (acf - relationship) từ mới đến cũ
function my_relationship_query( $args, $field, $post_id ) {   
    $args['orderby'] = 'date';
    $args['order'] = 'DESC';
    return $args;    
}
add_filter('acf/fields/relationship/query', 'my_relationship_query', 10, 3);

// Thay doi logo admin wordpress page login
function custom_admin_logo() {
    echo '<style type="text/css">
    body.login div#login h1 a {
        background-image: url('  . get_bloginfo('template_directory') . '/inc/admin-images/logo.png) !important;
        background-position: 0 !important;
        background-size: 100% 100%;
        width: 250px;
        height: 96px;
    }
    </style>';
}
add_action( 'login_enqueue_scripts', 'custom_admin_logo' );

// Thay logo admin wordpress
function remove_logo_and_submenu() {
    global $wp_admin_bar;
    //the following codes is to remove sub menu
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    //and this is to change wordpress logo
    $wp_admin_bar->add_menu( array(
        'id' => 'wp-logo',
        'title' => '<img src="'.get_stylesheet_directory_uri().'/inc/admin-images/logo-2.png" style="width: 40px; position: relative; top: 4px;" />',
        'href' => __('#'),
        'meta' => array(
            'title' => __('LTH - Theme by LTH'),
            'tabindex' => 1,
        ),
    ));
    //and this is to add new sub menu.
    $wp_admin_bar->add_menu( array(
        'parent' => 'wp-logo',
        'id' => 'sub-menu-id-1',
        'title' => __('About us'),
        'href' => __('#'),
    ));
}
add_action( 'wp_before_admin_bar_render', 'remove_logo_and_submenu' );

// Remove change footer
function remove_footer_admin () {
    echo __('');
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Thay đổi item menu trong admin
function lth_admin_menu( $__return_true ) {
    return array(
        'index.php', // Menu Bảng tin
        'edit.php?post_type=page', // Menu Trang
        'edit.php', // Menu Bài viết
        'edit.php?post_type=product', // Menu Sản phẩm
        // 'woocommerce', // WooCommerce
        'edit.php?post_type=testimonial', // Testimonials
        'users.php', // Menu Thành viên
        'wpcf7', // Wpcf7
        'contact-form-listing', // Wpcf7
        'lth-theme-options', // Theme options
        'themes.php', // Menu Giao diện
        'plugins.php', // Menu Plugins
        'upload.php', // Menu Media
        'edit-comments.php', // Menu Bình luận 
        'tools.php', // Menu Công cụ
        'options-general.php', // Menu Cài đặt
        'separator1', // Đoạn Cách
   );
}
add_filter( 'custom_menu_order', 'lth_admin_menu' );
add_filter( 'menu_order', 'lth_admin_menu' );

// Loại bỏ các css, js ko dùng
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head, 10, 0');

//* Remove Emoji from WordPress
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//* Remove WP Embed Script
function stop_loading_wp_embed() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
        // wp_deregister_script('jquery');
    }
}
add_action('init', 'stop_loading_wp_embed');

// Remove jQuery migrate
function remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];

        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

// remove update plugin
function disable_update_plugin( $value ) {
   unset( $value->response['advanced-custom-fields-pro/acf.php'] );
   unset( $value->response['contact-form-cfdb7/contact-form-cfdb-7.php'] );
   return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_update_plugin' );

// add css admin
add_action('admin_head', 'addmin_custom_css');
function addmin_custom_css() {
    echo '<style>
        .acf-repeater .acf-row .acf-row-handle.order {
            font-size: 20px;
            color: #000;
            font-weight: 600;
        }
        .acf-flexible-content .layout .acf-fc-layout-handle,
        .acf-repeater .acf-row:nth-child(2n) > .acf-row-handle.remove,
        .acf-repeater .acf-row:nth-child(2n) > .acf-row-handle.order {
            background: #000;
            color: #fff;
        }
        .acf-flexible-content .layout {
            border-color: #000;
        }
        .acf-flexible-content .layout .acf-fc-layout-handle {
            border: none;
        }
        .acf-flexible-content .layout .acf-fc-layout-controls .acf-icon {
            color: #fff;
            background: none;
            border: none;
        }
    </style>';
        // .acf-flexible-content > .values > .layout > .acf-fields {
        //     display: none;
        // }
        // .acf-flexible-content > .values > .layout.-collapsed > .acf-fields {
        //     display: block;
        // }
}

if ( ! function_exists( 'lth_mce_buttons' ) ) {
    function lth_mce_buttons($buttons){
        array_push($buttons,
             "alignjustify",
             "subscript",
             "superscript"
        );
        return $buttons;
    }
    add_filter("mce_buttons", "lth_mce_buttons");
}

if ( ! function_exists( 'lth_mce_buttons_2' ) ) {
    function lth_mce_buttons_2($buttons){
        array_push($buttons,
             "backcolor",
             "anchor",
             // "fontselect",
             "fontsizeselect",
             "cleanup"
        );
        return $buttons;
    }
    add_filter("mce_buttons_2", "lth_mce_buttons_2");
}

// Customize mce editor font sizes
if ( ! function_exists( 'lth_mce_text_sizes' ) ) {
   function lth_mce_text_sizes( $initArray ){
      $initArray['fontsize_formats'] = "15px 20px 30px 35px 40px 45px 50px";
      return $initArray;
   }
   add_filter( 'tiny_mce_before_init', 'lth_mce_text_sizes' );
}

// breadcrumb
function the_breadcrumb() {
    echo '<nav class="woocommerce-breadcrumb">';
    if (!is_home()) {
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo __('Trang chủ');
        echo "</a>";
        echo " / ";
        if (is_category() || is_single()) {
            if (is_category()) {
                single_cat_title();
            }

            if (is_single()) {
                the_category();
                echo " / ";
                the_title();
            }
        } elseif (is_page()) {;
            the_title();
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"Archive for "; the_time('F jS, Y');}
    elseif (is_month()) {echo"Archive for "; the_time('F, Y');}
    elseif (is_year()) {echo"Archive for "; the_time('Y');}
    elseif (is_author()) {echo"Author Archive";}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Archives";}
    elseif (is_search()) {echo"Search Results";}
    echo '</nav>';
}
// end breadcrumb

function more_posts_per_search_page( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
            $query->set('posts_per_page',12);
            $query->set('post_type',array( 'post'));
        }
    }
}
add_action( 'pre_get_posts','more_posts_per_search_page' );

/**
* Remove Item Menu Admin
*/
add_action( 'admin_init', 'remove_menu_pages' );
function remove_menu_pages() {
    // remove_menu_page( 'edit.php?post_type=acf-field-group' );
    remove_menu_page( 'acf-options' );
}