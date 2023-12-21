<?php
include_once get_template_directory(). '/load/Custom_Functions.php';
include_once get_template_directory(). '/load/CTPost_CTTax.php';
include_once get_template_directory(). '/load/Performance.php';

include_once get_template_directory(). '/resources/widgets/show-info-customer.php';
include_once get_template_directory(). '/resources/widgets/show-post-new-service.php';
include_once get_template_directory(). '/resources/widgets/show-post-new.php';


/* Create CTPost */
// (title, slug_code, slug)
create_post_type("Dịch Vụ","service","dich-vu");
/* Create CTTax */
// (title, slug, slug_code, post_type)
// create_taxonomy_theme("Danh mục Dịch Vụ","danh-muc-dich-vu","service_cat","service");


// Create menu Theme option use Acf Pro
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Tuỳ chỉnh',      // Title hiển thị khi truy cập vào Options page
        'menu_title'    => 'Tuỳ chỉnh',      // Tên menu hiển thị ở khu vực admin
        'menu_slug'     => 'theme-settings', // Url hiển thị trên đường dẫn của options page
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}


// Title Head Page
if (!function_exists('title')) {
    function title()
    {
        if (is_home() || is_front_page()) {
            return get_option('blogname') .' - '. get_option('blogdescription');
        }

        if (is_archive()) {
            $obj = get_queried_object();
            $return = $obj->name;
                if($return == 'product'){
                    $return_kq = __( 'Sản phẩm', 'text_domain' );
                }else{
                    $return_kq = $return;
                }
            return $return_kq;
        }

        if (is_search()) {
            return __( 'Tìm kiếm cho', 'text_domain' ).' : ['.$_GET['s'].']';
        }

        if (is_404()) {
            return __( '404 Không tìm thấy trang', 'text_domain' );
        }

        return get_the_title();
    }
}


// Url File theme
if (!function_exists('asset')) {
    function asset($path)
    {
        return wp_slash(get_stylesheet_directory_uri() . '/dist/' . $path);
    }
}


// Url image theme
if (!function_exists('getPostImage')) {
    function getPostImage($id, $imageSize = '')
    {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), $imageSize);
        return (!$img) ? asset('images/no-image-wc.png') : $img[0];
    }
}


// Cut String text
if (!function_exists('cut_string')) {
    function cut_string($str,$len,$more){
        if ($str=="" || $str==NULL) return $str;
        if (is_array($str)) return $str;
            $str = trim(strip_tags($str));
        if (strlen($str) <= $len) return $str;
            $str = substr($str,0,$len);
        if ($str != "") {
            if (!substr_count($str," ")) {
              if ($more) $str .= " ...";
              return $str;
            }
            while(strlen($str) && ($str[strlen($str)-1] != " ")) {
                $str = substr($str,0,-1);
            }
            $str = substr($str,0,-1);
            if ($more) $str .= " ...";
        }
        return $str;
    }
}


// Get url page here
if (!function_exists('get_page_link_current')) {
    function get_page_link_current(){
        // Get url page here
        $page_link_current_get = sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['REQUEST_URI']
        );

        // Get url, exclude url GET
        $page_link_current_strstr = strstr($page_link_current_get, '?');
        $page_link_current        = str_replace( $page_link_current_strstr, '', $page_link_current_get );

        return $page_link_current;
    }
}


// Get url page template by name file (vd : template-contact.php)
if (!function_exists('get_link_page_template')) {
    function get_link_page_template($name_file){
        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => $name_file
        ));
        
        $page_template_link = get_page_link($pages[0]->ID);

        return $page_template_link;
    }
}
// Get id page template by name file (vd : template-contact.php)
if (!function_exists('get_id_page_template')) {
    function get_id_page_template($name_file){
        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => $name_file
        ));
        
        $page_template_id = $pages[0]->ID;

        return $page_template_id;
    }
}


// Pagination
function paginationCustom($max_num_pages) {
    echo '<ul class="pagi text-center w-100">';
    if ($max_num_pages > 1) {   // tổng số trang (10)
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // trang hiện tại (8)

        if ($max_num_pages > 9) {
            echo '<li class="list-inline-item"><a href="'.esc_url( get_pagenum_link( 1 ) ).'" class="item">
            ...</a></li>';
        }
        if ($paged > 1) {
            echo '<li class="list-inline-item"><a href="'.esc_url( get_pagenum_link( $paged - 1 ) ).'" class="item">
            «</i></a></li>';
        }
        if ($paged >= 5 && $max_num_pages > 9) {
            echo '<li class="list-inline-item"><a href="'.esc_url( get_pagenum_link( $paged - 5 ) ).'" class="item">
            -5</a></li>';
            echo '<li class="list-inline-item"><a href="javascript:void(0)" class="">&nbsp;</a></li>';
        }

        for($i= 1; $i <= $max_num_pages; $i++) {
            // $half_total_links = floor( 5 / 2);
            $half_total_links = 2;

            $from = $paged - $half_total_links; // trang hiện tại - 2 (8-2= 6)
            $to = $paged + $half_total_links;   // trang hiện tại + 2 (8+2 = 10)

            if ($from < $i && $i < $to) {   // $form cách $to 3 số (từ 6 đến 10 là 7,8,9)
                $class = $i == $paged ? 'active' : 'item';
                echo '<li class="list-inline-item '.$class.'"><a href="'.esc_url( get_pagenum_link( $i ) ).'" class="">'.$i.'</a></li>';
            }
        }

        if ($paged <= $max_num_pages - 5 && $max_num_pages > 9) {
            echo '<li class="list-inline-item"><a href="javascript:void(0)" class="">&nbsp;</a></li>';
            echo '<li class="list-inline-item"><a href="'.esc_url( get_pagenum_link( $paged + 5 ) ).'" class="item">
            +5</a></li>';
        }
        if ($paged + 1 <= $max_num_pages) {
            echo '<li class="list-inline-item"><a href="'.esc_url( get_pagenum_link( $paged + 1 ) ).'" class="item">
            »</i></a></li>';
        }
        if ($max_num_pages > 9) {
            echo '<li class="list-inline-item"><a href="'.esc_url( get_pagenum_link( $max_num_pages ) ).'" class="item">
            ...</a></li>';
        }
    }
    echo '</ul>';
}