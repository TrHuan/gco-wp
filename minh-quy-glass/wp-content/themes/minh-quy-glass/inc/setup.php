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
    if ( class_exists( 'ACF' ) ) {

        if (get_field('projects', 'option') == 'true') {
            $title_project_cat = 'project_cat';
            $project_cat = 'Danh Mục Dự Án';
        }

        if (get_field('services', 'option') == 'true') {
            $title_service_cat = 'service_cat';
            $service_cat = 'Danh Mục Dịch Vụ';
        }

    }
    register_nav_menus(array(
        'main_menu'   => __('Main Menu'),
        'footer_1'    => __('Footer 01'),
        'footer_2'    => __('Footer 02'),
        'footer_3'    => __('Footer 03'),
        'footer_4'    => __('Footer 04'),
        $title_project_cat => __($project_cat),
        $title_service_cat => __($service_cat),
    ));

    // cho phép sử dụng thumbnails
    add_theme_support('post-thumbnails');

    // trình soạn thảo: đưa về phiên bản cũ
    add_filter('use_block_editor_for_post', '__return_false');

    // remove admin bar font end
    add_filter('show_admin_bar', '__return_false');

    // add image for menu
    add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
    function my_wp_nav_menu_objects( $items, $args ) { 
        foreach( $items as $item ) {
            $icon = get_field('icon_class', $item);
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

function lth_sidebar_register() {
    // Add widget
    register_sidebar (
        array (
            'name' => __('Tin Tức'),
            'id'        => 'sidebar_blog',
            'before_widget' => '<div class="sidebar-box sidebar-blogs">',
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

    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar (
            array (
                'name' => __('Sản Phẩm'),
                'id'        => 'sidebar_products',
                'before_widget' => '<div class="sidebar-box sidebar-product">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );

        // register_sidebar (
        //     array (
        //         'name' => __('Chi Tiết Sản Phẩm'),
        //         'id'        => 'sidebar_single_product',
        //         'before_widget' => '<div class="sidebar-box sidebar-product">',
        //         'after_widget' => '</div>',
        //         'before_title' => '<h3>',
        //         'after_title' => '</h3>',
        //     )
        // );
    }

    /////////////////////////////////////////

    if ( class_exists( 'ACF' ) ) {

        if (get_field('projects', 'option') == 'true') {
            // register_sidebar (
            //     array (
            //         'name' => __('Dự Án'),
            //         'id'        => 'sidebar_project',
            //         'before_widget' => '<div class="sidebar-box sidebar-project">',
            //         'after_widget' => '</div>',
            //         'before_title' => '<h3>',
            //         'after_title' => '</h3>',
            //     )
            // );

            // register_sidebar (
            //     array (
            //         'name' => __('Chi Tiết Dự Án'),
            //         'id'        => 'sidebar_single_project',
            //         'before_widget' => '<div class="sidebar-box sidebar-project">',
            //         'after_widget' => '</div>',
            //         'before_title' => '<h3>',
            //         'after_title' => '</h3>',
            //     )
            // );
        }

        if (get_field('services', 'option') == 'true') {
            register_sidebar (
                array (
                    'name' => __('Dịch Vụ'),
                    'id'        => 'sidebar_service',
                    'before_widget' => '<div class="sidebar-box sidebar-service">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3>',
                    'after_title' => '</h3>',
                )
            );

            register_sidebar (
                array (
                    'name' => __('Chi Tiết Dịch Vụ'),
                    'id'        => 'sidebar_single_service',
                    'before_widget' => '<div class="sidebar-box sidebar-service">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3>',
                    'after_title' => '</h3>',
                )
            );
        }
        
        register_sidebar (
            array (
                'name' => __('Báo Giá'),
                'id'        => 'sidebar_quotes',
                'before_widget' => '<div class="sidebar-box sidebar-quotes">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );

        // register_sidebar (
        //     array (
        //         'name' => __('Chi Tiết Báo Giá'),
        //         'id'        => 'sidebar_single_quotes',
        //         'before_widget' => '<div class="sidebar-box sidebar-quotes">',
        //         'after_widget' => '</div>',
        //         'before_title' => '<h3>',
        //         'after_title' => '</h3>',
        //     )
        // );
       

    }

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
        'edit.php?post_type=page', // Menu Trang
        'edit.php', // Menu Bài viết
        'edit.php?post_type=product', // Menu Sản phẩm
        // 'woocommerce', // WooCommerce
        'edit.php?post_type=slidershow', // slidershow
        'edit.php?post_type=feature', // feature
        'edit.php?post_type=brand', // brand
        'edit.php?post_type=testimonial', // Testimonials
        'edit.php?post_type=service', // services
        'edit.php?post_type=project', // projects
        'edit.php?post_type=bao-gia', // bao-gias
        'users.php', // Menu Thành viên
        'wpcf7', // Wpcf7
        'contact-form-listing', // Wpcf7
        'wp-mail-smtp', // Wpcf7
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

        .acf-field-gallery > .acf-input > *,
        #toplevel_page_lth-pages-settings .wp-first-item  {
            display: none !important;
        }

        .acf-field-gallery .acf-gallery.ui-resizable {
            display: block !important;
        }

        #acf-group_60ab5d77d2049 .acf-field-60ab5d77e5675,
        #acf-group_609f328d01fe1 {
            display: none !important;
        }
    </style>';
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
        // echo " / ";
        if (is_category() || is_single() || is_tax()) {
            if (is_category()) {
                $archive_page = get_pages(
                    array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/blogs.php'
                    )
                );
                $archive_id = $archive_page[0]->ID;
                $archive_name = $archive_page[0]->post_title;
                echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';

                single_cat_title();
            }

            if (is_tax()) {
                if ( is_tax( 'bao-gia' ) ) {
                    $archive_page = get_pages(
                        array(
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'templates/bao-gia.php'
                        )
                    );
                    $archive_id = $archive_page[0]->ID;
                    $archive_name = $archive_page[0]->post_title;
                    echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';
                }

                single_cat_title();
            }

            if (is_single()) {
                if ( get_post_type() == 'post' ) {                    
                    $archive_page = get_pages(
                        array(
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'templates/blogs.php'
                        )
                    );
                    $archive_id = $archive_page[0]->ID;
                    $archive_name = $archive_page[0]->post_title;
                    echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';
                }

                if ( get_post_type() == 'project' ) {                    
                    $archive_page = get_pages(
                        array(
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'templates/projects.php'
                        )
                    );
                    $archive_id = $archive_page[0]->ID;
                    $archive_name = $archive_page[0]->post_title;
                    echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';
                }

                if (get_post_type() == 'bao-gia') {
                    $archive_page = get_pages(
                        array(
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'templates/bao-gia.php'
                        )
                    );
                    $archive_id = $archive_page[0]->ID;
                    $archive_name = $archive_page[0]->post_title;
                    echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';
                }

                // the_category();

                // echo " / ";
                echo '<span>' . get_the_title() . '</span>';
            }
        } elseif (get_post_type() == 'bao-gia') { 
            $archive_page = get_pages(
                array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'templates/bao-gia.php'
                )
            );
            $archive_id = $archive_page[0]->ID;
            echo '<span>' . $archive_name = $archive_page[0]->post_title . '</span>';
        } elseif (is_page()) {
            echo '<span>' . get_the_title() . '</span>';
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

// comment
function my_wpdiscuz_shortcode() {
    $html = "";
    
    if (file_exists(ABSPATH . 'wp-content/plugins/wpdiscuz/themes/default/comment-form.php')) {
        ob_start();
        include_once ABSPATH . 'wp-content/plugins/wpdiscuz/themes/default/comment-form.php';
        return ob_get_clean();
    }

    return $html;
}
add_shortcode('wpdiscuz_comments', 'my_wpdiscuz_shortcode');

function approve_comment($comment_id, $comment_object) {
   //get id of the post that was commented
   $post_id = $comment_object->comment_post_ID;

   //approve comment for "post" type
    if( 'post' == get_post_type( $post_id )|| 'page' == get_post_type( $post_id )) {
       $retrieved_comment = get_comment( $comment_id, ARRAY_A );
       //approve comment    
       $commentarr = $retrieved_comment;
       $commentarr['comment_ID'] = $comment_id;
       $commentarr['comment_approved'] = 1;
       wp_update_comment( $commentarr );
   }
}
// end comment

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
  
  if ( $s->base === 'edit' && $s->post_type === 'bao-gia' ) {
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
}