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
    ));

    // cho phép sử dụng thumbnails
    add_theme_support('post-thumbnails');

    // trình soạn thảo: đưa về phiên bản cũ
    add_filter('use_block_editor_for_post', '__return_false');
    remove_theme_support( 'widgets-block-editor' );

    // remove admin bar font end
    add_filter('show_admin_bar', '__return_false');

    // add image for menu
    add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
    function my_wp_nav_menu_objects( $items, $args ) { 
        foreach( $items as $item ) {
            $icon = get_field('icon_class', $item);
            if( $icon ) {                
                $item->title .= ' <span class="'.$icon.' icon"></span>';                
            // } else {
            //     $item->title .= ' <span class="icofont-simple-down icon"></span>';
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
            'name' => __('Footer'),
            'id'        => 'widget_footer_1',
            'before_widget' => '<div class="footer-box">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        )
    );

    register_sidebar (
        array (
            'name' => __('Footer 2'),
            'id'        => 'widget_footer_2',
            'before_widget' => '<div class="footer-box">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        )
    );

    register_sidebar (
        array (
            'name' => __('Footer 3'),
            'id'        => 'widget_footer_3',
            'before_widget' => '<div class="footer-box">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        )
    );

    register_sidebar (
        array (
            'name' => __('Footer 4'),
            'id'        => 'widget_footer_4',
            'before_widget' => '<div class="footer-box">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        )
    );

    register_sidebar (
        array (
            'name' => __('Footer Bottom'),
            'id'        => 'widget_footer_5',
            'before_widget' => '<div class="footer-box">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        )
    );

    register_sidebar (
        array (
            'name' => __('Comments'),
            'id'        => 'widget_comment',
            'before_widget' => '<div class="comment-box">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        )
    );

    // register_sidebar (
    //     array (
    //         'name' => __('Tin Tức'),
    //         'id'        => 'sidebar_blog',
    //         'before_widget' => '<div class="sidebar-box">',
    //         'after_widget' => '</div>',
    //         'before_title' => '<h3>',
    //         'after_title' => '</h3>',
    //     )
    // );

    // register_sidebar (
    //     array (
    //         'name' => __('Chi Tiết Tin Tức'),
    //         'id'        => 'sidebar_single_blog',
    //         'before_widget' => '<div class="sidebar-box">',
    //         'after_widget' => '</div>',
    //         'before_title' => '<h3>',
    //         'after_title' => '</h3>',
    //     )
    // );

    ///// Hiển thị widget
    // if (is_active_sidebar('sidebar_blog')) {
    //     dynamic_sidebar('sidebar_blog');
    // }

    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar (
            array (
                'name' => __('Sản Phẩm'),
                'id'        => 'sidebar_shop',
                'before_widget' => '<div class="sidebar-box sidebar-products vk-sidebar__box">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="shop-catigory-title">',
                'after_title' => '</h4>',
            )
        );

        // register_sidebar (
        //     array (
        //         'name' => __('Chi Tiết Sản Phẩm'),
        //         'id'        => 'sidebar_single_product',
        //         'before_widget' => '<div class="sidebar-box sidebar-products sidebar-products-single">',
        //         'after_widget' => '</div>',
        //         'before_title' => '<h3>',
        //         'after_title' => '</h3>',
        //     )
        // );
    }

    /////////////////////////////////////////

    // if ( class_exists( 'ACF' ) ) {

    //     register_sidebar (
    //         array (
    //             'name' => __('Dự Án'),
    //             'id'        => 'sidebar_project',
    //             'before_widget' => '<div class="sidebar-box sidebar-project">',
    //             'after_widget' => '</div>',
    //             'before_title' => '<h3>',
    //             'after_title' => '</h3>',
    //         )
    //     );

    //     register_sidebar (
    //         array (
    //             'name' => __('Chi Tiết Dự Án'),
    //             'id'        => 'sidebar_single_project',
    //             'before_widget' => '<div class="sidebar-box sidebar-project">',
    //             'after_widget' => '</div>',
    //             'before_title' => '<h3>',
    //             'after_title' => '</h3>',
    //         )
    //     );

    //     register_sidebar (
    //         array (
    //             'name' => __('Dịch Vụ'),
    //             'id'        => 'sidebar_service',
    //             'before_widget' => '<div class="sidebar-box sidebar-service">',
    //             'after_widget' => '</div>',
    //             'before_title' => '<h3>',
    //             'after_title' => '</h3>',
    //         )
    //     );

    //     register_sidebar (
    //         array (
    //             'name' => __('Chi Tiết Dịch Vụ'),
    //             'id'        => 'sidebar_single_service',
    //             'before_widget' => '<div class="sidebar-box sidebar-service">',
    //             'after_widget' => '</div>',
    //             'before_title' => '<h3>',
    //             'after_title' => '</h3>',
    //         )
    //     );

    // }

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
            background-image: url('.get_field('favicon', 'option').') !important;
            background-position: 0 !important;
            background-size: 100% 100%;
            width: 80px;
            height: 77px;
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
            'title' => '<img src="'.get_field('favicon', 'option').'" style="height: 15px; position: relative; top: 0; background: #fff; padding: 5px;" />',
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

function getPostViews($postID, $is_single = true){
   global $post;
   if(!$postID) $postID = $post->ID;
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if(!$is_single){
        return '<span class="svl_show_count_only">'.$count.' Views</span>';
    }
    $nonce = wp_create_nonce('devvn_count_post');
    if($count == "0"){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="svl_post_view_count" data-id="'.$postID.'" data-nonce="'.$nonce.'">0 View</span>';
    }
    return '<span class="svl_post_view_count" data-id="'.$postID.'" data-nonce="'.$nonce.'">'.$count.' Views</span>';
}
 
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == "0" || empty($count) || !isset($count)){
        add_post_meta($postID, $count_key, 1);
        update_post_meta($postID, $count_key, 1);
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
 
add_action( 'wp_ajax_svl-ajax-counter', 'svl_ajax_callback' );
add_action( 'wp_ajax_nopriv_svl-ajax-counter', 'svl_ajax_callback' );
function svl_ajax_callback() {
    if ( !wp_verify_nonce( $_REQUEST['nonce'], "devvn_count_post")) {
        exit();
    }
    $count = 0;
   if ( isset( $_GET['p'] ) ) {
      global $post;
      $postID = intval($_GET['p']);
      $post = get_post( $postID );
      if($post && !empty($post) && !is_wp_error($post)){
         setPostViews($post->ID);
         $count_key = 'post_views_count';
          $count = get_post_meta($postID, $count_key, true);
      }
   }
   die($count.' Views');
}
 
add_action( 'wp_footer', 'svl_ajax_script', PHP_INT_MAX );
function svl_ajax_script() {
   if(!is_single()) return;
   ?>
   <script>
   (function($){
      $(document).ready( function() {
         $('.svl_post_view_count').each( function( i ) {
            var $id = $(this).data('id');
            var $nonce = $(this).data('nonce');
            var t = this;
            $.get('<?php echo admin_url( 'admin-ajax.php' ); ?>?action=svl-ajax-counter&nonce='+$nonce+'&p='+$id, function( html ) {
               $(t).html( html );
            });
         });
      });
   })(jQuery);
   </script>
   <?php
}


/**
* Remove Item Menu Admin
*/
add_action( 'admin_init', 'remove_menu_pages' );
function remove_menu_pages() {
    // remove_menu_page( 'edit.php?post_type=acf-field-group' );
    remove_menu_page( 'acf-options' );
}