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
        // 'footer_1'    => __('Footer 01'),
        // 'footer_2'    => __('Footer 02'),
        // 'footer_3'    => __('Footer 03'),
        // 'footer_4'    => __('Footer 04'),
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

function lth_sidebar_register() {
    // Add widget
    register_sidebar (
        array (
            'name' => __('Single Blogs'),
            'id'        => 'sidebar_blog',
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
        // register_sidebar (
        //     array (
        //         'name' => __('Products'),
        //         'id'        => 'sidebar_product',
        //         'before_widget' => '<div class="sidebar-box">',
        //         'after_widget' => '</div>',
        //         'before_title' => '<h3>',
        //         'after_title' => '</h3>',
        //     )
        // );

        register_sidebar (
            array (
                'name' => __('Single Product'),
                'id'        => 'sidebar_single_product',
                'before_widget' => '<div class="sidebar-box">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );
    }

    /////////////////////////////////////////

    // register_sidebar (
    //     array (
    //         'name' => __('Projects'),
    //         'id'        => 'sidebar_project',
    //         'before_widget' => '<div class="sidebar-box">',
    //         'after_widget' => '</div>',
    //         'before_title' => '<h3>',
    //         'after_title' => '</h3>',
    //     )
    // );

    register_sidebar (
        array (
            'name' => __('Dịch vụ'),
            'id'        => 'sidebar_single_project',
            'before_widget' => '<div class="sidebar-box">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );

    // register_sidebar (
    //     array (
    //         'name' => __('Services'),
    //         'id'        => 'sidebar_service',
    //         'before_widget' => '<div class="sidebar-box">',
    //         'after_widget' => '</div>',
    //         'before_title' => '<h3>',
    //         'after_title' => '</h3>',
    //     )
    // );

    // register_sidebar (
    //     array (
    //         'name' => __('Single Service'),
    //         'id'        => 'sidebar_single_service',
    //         'before_widget' => '<div class="sidebar-box">',
    //         'after_widget' => '</div>',
    //         'before_title' => '<h3>',
    //         'after_title' => '</h3>',
    //     )
    // );

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
        'lth-pages-build', // Pages Build
        'edit.php?post_type=page', // Menu Trang
        'edit.php', // Menu Bài viết
        'edit.php?post_type=product', // Menu Sản phẩm
        // 'woocommerce', // WooCommerce
        'edit.php?post_type=slidershow', // slidershow
        'edit.php?post_type=feature', // feature
        'edit.php?post_type=brand', // brand
        'edit.php?post_type=testimonial', // Testimonials
        'edit.php?post_type=thiet-ke', // services
        'edit.php?post_type=thi-cong', // projects
        'users.php', // Menu Thành viên
        'wpcf7', // Wpcf7
        'contact-form-listing', // Wpcf7
        'wp-mail-smtp', // Wpcf7
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
        #toplevel_page_lth-pages-build .wp-first-item  {
            display: none !important;
        }

        .acf-field-gallery .acf-gallery.ui-resizable {
            display: block !important;
        }

        #acf-group_609f4a79e3e96 .acf-field-609f4a83a1543,
        #acf-group_609f328d01fe1 {
            //display: none !important;
        }
    </style>';
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

function more_posts_per_search_page( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
            $query->set('posts_per_page',12);
        }
    }
}
add_action( 'pre_get_posts','more_posts_per_search_page' );

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
        if (is_category() || is_single() || is_tax()  || is_tag()) {
            if (is_category()) {
                // $archive_page = get_pages(
                //     array(
                //         'meta_key' => '_wp_page_template',
                //         'meta_value' => 'templates/blogs.php'
                //     )
                // );
                // $archive_id = $archive_page[0]->ID;
                // $archive_name = $archive_page[0]->post_title;
                // echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';

                single_cat_title();
            }

            if (is_tax()) {
                // if ( is_tax( 'thiet-ke-cat' ) ) {
                //     $archive_page = get_pages(
                //         array(
                //             'meta_key' => '_wp_page_template',
                //             'meta_value' => 'templates/services.php'
                //         )
                //     );
                //     $archive_id = $archive_page[0]->ID;
                //     $archive_name = $archive_page[0]->post_title;
                //     echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';
                // }

                // if ( is_tax( 'thi-cong-cat' ) ) {
                //     $archive_page = get_pages(
                //         array(
                //             'meta_key' => '_wp_page_template',
                //             'meta_value' => 'templates/projects.php'
                //         )
                //     );
                //     $archive_id = $archive_page[0]->ID;
                //     $archive_name = $archive_page[0]->post_title;
                //     echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';
                // }

                single_cat_title();
            }

            if (is_tag()) {
                // $archive_page = get_pages(
                //     array(
                //         'meta_key' => '_wp_page_template',
                //         'meta_value' => 'templates/blogs.php'
                //     )
                // );
                // $archive_id = $archive_page[0]->ID;
                // $archive_name = $archive_page[0]->post_title;
                // echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';
            
                single_cat_title();
            }

            if (is_single()) {
                if ( get_post_type() == 'thiet-ke' ) {                    
                    $archive_page = get_pages(
                        array(
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'templates/services.php'
                        )
                    );
                    $archive_id = $archive_page[0]->ID;
                    $archive_name = $archive_page[0]->post_title;
                    echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';

                    // $cat = 'service_cat';
                }

                $terms = wp_get_object_terms( get_the_ID(),  $cat );

                foreach( $terms as $term ) {
                    echo '<a href="' . esc_url( get_term_link( $term->slug, 'service_cat' ) ) . '">' . esc_html( $term->name ) . '</a>'; 
                }

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

                if ( get_post_type() == 'thi-cong' ) {                    
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

                // the_category();

                // echo " / ";
                echo '<span>' . get_the_title() . '</span>';
            }
        } elseif (is_page()) {

            global $post;
            $page_slug = $post->post_name;

            if ($page_slug == 'checkout') {
                echo '<a href="'. wc_get_cart_url() .'">';
                    echo __('Giỏ hàng');
                echo '</a>';
            }

            the_title();
        }

        if (!is_single()) {
            if ( get_post_type() == 'thi-cong' ) {                    
                $archive_page = get_pages(
                    array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/projects.php'
                    )
                );
                $archive_id = $archive_page[0]->ID;
                echo $archive_name = $archive_page[0]->post_title;
            }

            if ( get_post_type() == 'thiet-ke' ) {                    
                $archive_page = get_pages(
                    array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/services.php'
                    )
                );
                $archive_id = $archive_page[0]->ID;
                echo $archive_name = $archive_page[0]->post_title;
            }
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

function add_fields_user($profile_fields){
    // $profile_fields['avatar_upload'] = 'Image ';
    if ( !class_exists( 'WooCommerce' ) ) {
        $profile_fields['phone'] = 'Phone ';
    }
    // $profile_fields['zalo'] = 'Zalo ';
    $profile_fields['facebook'] = 'Facebook';
    $profile_fields['youtube'] = 'Youtube';
    $profile_fields['googleplus'] = 'Google+';
    $profile_fields['twitter'] = 'Twitter';
    return $profile_fields;
}
add_filter('user_contactmethods', 'add_fields_user');

add_action('pre_get_posts', 'reorder_my_cpt');    
function reorder_my_cpt( $q ) {
  if ( !is_admin() || !$q->is_main_query() ) {
    return;
  }
  $s = get_current_screen();

  if ( $s->base === 'edit' && $s->post_type === 'thi-cong' ) {
    $q->set('orderby', 'ID');
    $q->set('order', 'DESC');
  }
  
  if ( $s->base === 'edit' && $s->post_type === 'thiet-ke' ) {
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