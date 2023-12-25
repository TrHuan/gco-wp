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

    // trình soạn thảo, widget: đưa về phiên bản cũ
    remove_theme_support( 'widgets-block-editor' );

    // đăng ký menu
    register_nav_menus(array(
        'main_menu'   => __('Main Menu'),
    ));

    // cho phép sử dụng thumbnails
    add_theme_support('post-thumbnails');

    // remove admin bar font end
    add_filter('show_admin_bar', '__return_false');

    // add image for menu
    add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
    function my_wp_nav_menu_objects( $items, $args ) { 
        foreach( $items as $item ) {
            $icon = get_field('icon_class', $item);
            if( $icon ) {                
                $item->title .= ' <i class="'.$icon.' icon"></i>';                
            }

            $img = get_field('image', $item); 
            if( $img ) {                
                $item->title .= '<img src="'.$img.'" alt="Icon">';                
            }
        }      
        return $items;        
    }

}
add_action('after_setup_theme', 'lth_theme_setup');

function lth_sidebar_register() {
    // Add widget

    register_sidebar (
        array (
            'name' => __('Languages'),
            'id'        => 'languages',
            'before_widget' => '<div class="languages img-languages__headers">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );

    register_sidebar (
        array (
            'name' => __('Tin Tức'),
            'id'        => 'sidebar_blog',
            'before_widget' => '<div class="sidebar-box">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );

    register_sidebar (
        array (
            'name' => __('Chi Tiết Tin Tức'),
            'id'        => 'sidebar_single_blog',
            'before_widget' => '<div class="sidebar-box">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );

    ///// Hiển thị widget
    // if (is_active_sidebar('sidebar_blog')) {
    //     dynamic_sidebar('sidebar_blog');
    // }    

    // register_sidebar (
    //     array (
    //         'name' => __('Page Sidebar'),
    //         'id'        => 'sidebar_page',
    //         'before_widget' => '<div class="sidebar-box">',
    //         'after_widget' => '</div>',
    //         'before_title' => '<h3>',
    //         'after_title' => '</h3>',
    //     )
    // );

    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar (
            array (
                'name' => __('Sản Phẩm'),
                'id'        => 'sidebar_product',
                'before_widget' => '<div class="sidebar-box sidebar-product">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );

        register_sidebar (
            array (
                'name' => __('Lọc Sản Phẩm'),
                'id'        => 'product_filter',
                'before_widget' => '<div class="sidebar-box product_filter">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );

        register_sidebar (
            array (
                'name' => __('Chi Tiết Sản Phẩm'),
                'id'        => 'sidebar_single_product',
                'before_widget' => '<div class="sidebar-box sidebar-product">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );
    }

    /////////////////////////////////////////

    register_sidebar (
        array (
            'name' => __('Footer 01'),
            'id'        => 'footer_01',
            'before_widget' => '<div class="footer-box">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );

    register_sidebar (
        array (
            'name' => __('Footer 02'),
            'id'        => 'footer_02',
            'before_widget' => '<div class="footer-box">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );

    register_sidebar (
        array (
            'name' => __('Footer 03'),
            'id'        => 'footer_03',
            'before_widget' => '<div class="footer-box">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );

}
add_action('widgets_init', 'lth_sidebar_register');

if ( class_exists( 'ACF' ) ) {
    // Thay favicon admin wordpress
    function favicon4admin() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_field('favicon', 'option').'" />';
    }
    add_action( 'admin_head', 'favicon4admin' );

    // Thay doi logo admin wordpress page login
    function custom_admin_logo() {
        echo '<style type="text/css">
        body.login div#login h1 a {
            background-image: url('.get_field('logo', 'option').') !important;
            background-position: 0 !important;
            background-size: 100% 100%;
            width: '.get_field('width_logo', 'option').'px;
            height: '.get_field('height_logo', 'option').'px;
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
            'title' => '<img src="'.get_field('logo', 'option').'" style="height: 15px; position: relative; top: 0; background: #fff; padding: 5px;" />',
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
}

// Remove change footer
function remove_footer_admin () {
    echo __('');
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Thay đổi item menu trong admin
function lth_admin_menu( $__return_true ) {
    return array(
        'index.php', // Menu Bảng tin
        'themes.php', // Menu Giao diện
        'lth-theme-options', // Theme options
        'lth-pages-settings', // Pages settings
        'edit.php?post_type=html-blocks', // html-blocks
        'edit.php?post_type=page', // Menu Trang
        'edit.php', // Menu Bài viết
        'edit.php?post_type=product', // Menu Sản phẩm
        // 'wc', // WooCommerce
        'edit.php?post_type=slidershow', // slidershow
        'edit.php?post_type=feature', // feature
        'edit.php?post_type=brand', // brand
        'edit.php?post_type=testimonial', // Testimonials
        'edit.php?post_type=service', // services
        'edit.php?post_type=project', // projects
        'users.php', // Menu Thành viên
        'wpcf7', // Wpcf7
        'cfdb7-list.php', // Wpcf7
        'wp-mail-smtp', // Wpcf7
        'mlang', // Polylang
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

// remove update plugin
function disable_update_plugin( $value ) {
   unset( $value->response['advanced-custom-fields-pro/acf.php'] );
   unset( $value->response['testimonials/testimonials.php'] );
   unset( $value->response['polylang-pro/polylang.php'] );
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

        .acf-field-gallery > .acf-input > *,
        #toplevel_page_lth-pages-settings .wp-first-item  {
            display: none !important;
        }

        .acf-field-gallery .acf-gallery.ui-resizable {
            display: block !important;
        }       

        .postbox-container .acf-field-flexible-content[data-name="row_header_footer"],
        .postbox-container .acf-field-flexible-content[data-name="row"] {
            max-width: 680px !important;
            width: 100%;
            margin: 0 auto;
        }

        .editor-styles-wrapper .wp-block-group {
            border: 1px solid #000;
            padding: 10px;
        }
        .edit-post-visual-editor__post-title-wrapper .editor-post-title {
            border: none;
            padding: 0;
        }
        .lazyblock .lzb-content-title {
            margin: 0;
            padding: 0;
            border: none;
        }
        .lzb-content-controls .components-base-control__label {
            display: none;
        }
        .block-list-appender>.block-editor-inserter {
            display: flex;
            justify-content: flex-end;
        }
        .interface-interface-skeleton__sidebar .interface-complementary-area {
            width: 450px;
        }
        .interface-interface-skeleton__sidebar .lzb-gutenberg-classic-editor .block-library-rich-text__tinymce {
            height: 500px;
        }

    </style>';
}

function more_posts_per_search_page( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
            $query->set('posts_per_page',12);
        }
    }
}
add_action( 'pre_get_posts','more_posts_per_search_page' );

add_action('pre_get_posts', 'reorder_my_cpt');    
function reorder_my_cpt( $q ) {
  if ( !is_admin() || !$q->is_main_query() ) {
    return;
  }
  $s = get_current_screen();

  if ( $s->base === 'edit' && $s->post_type === 'project' ) {
    $q->set('orderby', 'ID');
    $q->set('order', 'DESC');
  }

  if ( $s->base === 'edit' && $s->post_type === 'service' ) {
    $q->set('orderby', 'ID');
    $q->set('order', 'DESC');
  }
  
  if ( $s->base === 'edit' && $s->post_type === 'testimonial' ) {
    $q->set('orderby', 'ID');
    $q->set('order', 'DESC');
  }
}

/**
* Remove Item Menu Admin
*/
add_action( 'admin_init', 'remove_menu_pages' );
function remove_menu_pages() {
    // remove_menu_page( 'edit.php?post_type=acf-field-group' );
    remove_menu_page( 'acf-options' );
    remove_menu_page( 'edit.php?post_type=lazyblocks' );
}