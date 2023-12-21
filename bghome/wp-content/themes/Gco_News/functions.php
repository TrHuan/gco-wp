<?php
define('THEME_URL', get_stylesheet_directory() );
define('CORE', THEME_URL . "/core");
require_once( CORE . "/init.php" );

if ( ! function_exists( 'specia_setup' ) ) :
function specia_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'specia', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'product-thumbnail', 100, 100, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'specia' ),
        'menu_categories' => esc_html__( 'Menu Categories Product', 'specia' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	//Add custom logo support
	add_theme_support('custom-logo');
	
	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', specia_google_font() ) );
	
}
endif;
add_action( 'after_setup_theme', 'specia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function specia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'specia_content_width', 1170 );
}
add_action( 'after_setup_theme', 'specia_content_width', 0 );

/**
 * All Styles & Scripts.
 */
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Bootstrap Nav Walker.
 */
if( ! class_exists( 'specia_nav_walker' ) ) {
	require_once get_template_directory() . '/inc/specia-nav-walker.php';
}
	
/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Called Breadcrumb
 */
require_once get_template_directory() . '/inc/breadcrumb/breadcrumb.php';

/**
 * Sidebar.
 */
require_once get_template_directory() . '/inc/sidebar/sidebar.php';

/**
 * Widgets.
 */
require_once get_template_directory() . '/inc/widget/widget_feature.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
require_once get_template_directory() . '/inc/jetpack.php';

/**
 * Load Sanitization file.
 */
require_once get_template_directory() . '/inc/sanitization.php';

/**
 * Called all the Customize file.
 */
require_once( get_template_directory() . '/inc/customize/specia-customizer.php');

/**
 * widget tạo bài viết mới
 */
class Sidebar_Post extends WP_Widget {
    function __construct() {
        parent::__construct(
            'sidebar_post',
            'Bài viết theo danh mục',
            array( 'description'  =>  'Widget hiển thị bài viết mới theo danh mục' )
        );
    }
    function form( $instance ) {
        $default = array(
            'title' => 'Tiêu đề ',
            'post_number' => 5,
            'addclass' => '',
            'select' => ''
        );
        $instance = wp_parse_args( (array) $instance, $default );
        $title = esc_attr($instance['title']);
        $select = esc_attr($instance['select']);
        $post_number = esc_attr($instance['post_number']);
        $addclass = esc_attr($instance['addclass']);
        echo '<p>Nhập tiêu đề <input type="text" id="'.$this->get_field_id('title').'" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/></p>';
        echo '<p>Số lượng bài viết hiển thị <input type="number" class="widefat" name="'.$this->get_field_name('post_number').'" value="'.$post_number.'" placeholder="'.$post_number.'" max="30" /></p>';
        ?>
    <!-- Category Select Menu -->   
    <p>
        <select id="<?php echo $this->get_field_id('select'); ?>" name="<?php echo $this->get_field_name('select'); ?>" class="widefat" style="width:100%;">
            <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
            <option <?php selected( $instance['select'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
            <?php } ?>      
        </select>
    </p>
    <select name="<?php echo $this->get_field_name('addclass'); ?>" id="<?php echo $this->get_field_id('addclass'); ?>">
        <option <?php selected('post-style-1', $instance['addclass']); ?> value="post-style-1">Style 1 Image Left</option>
        <option <?php selected('post-style-2', $instance['addclass']); ?> value="post-style-2">Style 2 Image Right</option>
        <option <?php selected('post-style-3', $instance['addclass']); ?> value="post-style-3">Style 3 Image Center</option>
        <option <?php selected('post-style-4', $instance['addclass']); ?> value="post-style-4">Style 4 Image Top</option>
    </select>
        <?php
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['select'] = strip_tags($new_instance['select']);
        $instance['post_number'] = strip_tags($new_instance['post_number']);
        $instance['addclass'] = strip_tags($new_instance['addclass']);
        return $instance;
    }
    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $post_number = $instance['post_number'];
        $select = $instance['select'];
        $addclass = $instance['addclass'];
        echo $before_widget;
        echo $before_title.$title.$after_title;
        $sidebar_post = new WP_Query('posts_per_page='.$post_number.'&orderby=date&cat='.$select.'');
        if ($sidebar_post->have_posts()):
            echo '<ul class="sidebar-post '.$addclass.'">';
            $i=1;while( $sidebar_post->have_posts() ) :
                $sidebar_post->the_post(); ?>
                <?php if($i==1): ?>
                <li>
                    <div class="img-sidebarpost">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
                    </div>
                    <div class="name-sidebarpost">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        <span class="post-time"><i class="far fa-calendar-alt"></i> <?php the_time('d,m,Y') ?></span>
                    </div>
                </li>
                <?php else: ?>
                <li>
                  <div class="img-sidebarpost">
                     <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
                  </div>
                  <div class="name-sidebarpost">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <span class="post-time"><i class="far fa-calendar-alt"></i> <?php the_time('d,m,Y') ?></span>
                  </div>
                </li> 
                <?php endif ?>
            <?php $i++;endwhile;
            echo "</ul>";
        endif;
        echo $after_widget;
    }
}
add_action( 'widgets_init', 'create_sidebarpost_widget' );
function create_sidebarpost_widget() {
    register_widget('Sidebar_Post');
}

/**
 * widget thông tin liên hệ
 */
class Contact_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'contact_widget',
            'Thông tin liên hệ',
            array( 'description'  =>  'Widget hiển thị thông tin liên hệ' )
        );
    }
    function form( $instance ) {
        $default = array(
            'title' => 'Tiêu đề ',
            'hotline' => '0',
            'email' => '@',
            'address' => '',
        );
        $instance = wp_parse_args( (array) $instance, $default );
        $title = esc_attr($instance['title']);
        $hotline = esc_attr($instance['hotline']);
        $email = esc_attr($instance['email']);
        $address = esc_attr($instance['address']);
        echo '<p>Nhập tiêu đề <input type="text" id="'.$this->get_field_id('title').'" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/></p>';
        echo '<p>Hotline: <input type="text" id="'.$this->get_field_id('hotline').'" class="widefat" name="'.$this->get_field_name('hotline').'" value="'.$hotline.'"/></p>';
        echo '<p>Email: <input type="text" id="'.$this->get_field_id('email').'" class="widefat" name="'.$this->get_field_name('email').'" value="'.$email.'"/></p>';
        echo '<p>Địa chỉ: <input type="text" id="'.$this->get_field_id('address').'" class="widefat" name="'.$this->get_field_name('address').'" value="'.$address.'"/></p>';
        ?>
        <?php
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['hotline'] = strip_tags($new_instance['hotline']);
        $instance['email'] = strip_tags($new_instance['email']);
        $instance['address'] = strip_tags($new_instance['address']);
        return $instance;
    }
    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $hotline = $instance['hotline'];
        $email = $instance['email'];
        $address = $instance['address'];
        echo $before_widget;
        echo $before_title.$title.$after_title;
        ?>
        <ul id="list-widget_contact">
          <li class="address-widget_contact">
            <i class="fal fa-map-marker-alt"></i><p>Địa chỉ: <?php echo $address;?></p>
          </li>
          <li class="hotline-widget_contact">
            <i class="fal fa-phone"></i><p>Hotline: <a href="tel:<?php echo $address;?>"><?php echo $hotline;?></a></p>
          </li>
          <li class="email-widget_contact">
            <i class="fal fa-envelope"></i><p>Email: <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></p>
          </li>
        </ul>
        <?php
        echo $after_widget;
    }
}
add_action( 'widgets_init', 'create_contact_widget' );
function create_contact_widget() {
    register_widget('Contact_Widget');
}

/*text editer*/
function ilc_mce_buttons($buttons){
  array_push($buttons,
     "backcolor",
     "anchor",
     "underline",
     "media",
     "subscript",
     "superscript",
     "alignjustify",
     "fontselect",
     "fontsizeselect",
     "fontfamilyselect",
     "table",
     "cleanup"
);
  return $buttons;
}
add_filter("mce_buttons_2", "ilc_mce_buttons");

function add_the_table_plugin( $plugins ) {
    $plugins['table'] = get_template_directory_uri() . '/js/table.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'add_the_table_plugin' );

if ( ! function_exists( 'hiepdesign_mce_text_sizes' ) ) {
    function hiepdesign_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px 40px";
        return $initArray;
    }
    add_filter( 'tiny_mce_before_init', 'hiepdesign_mce_text_sizes', 99 );
}
/*excerpt editer*/
function the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $excerpt;
    }
}
if (!function_exists('specia_logo') ) {
    function specia_logo(){ ?>
    <?php
    global $vz_options;
    if($vz_options['logo-on'] == 0 ) : 
    ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php if ( function_exists( 'the_custom_logo' ) ) : the_custom_logo(); endif; ?>
        <?php else: ?>
                <img src="<?php echo $vz_options['logo-image']['url']?>" alt=""/>
        <?php endif;?>
    </a>
    <?php
    }
}

/*tối ưu phân phối javascript:*/
add_filter('clean_url', function($urlcss)
{
if (FALSE === strpos($urlcss, '.css')) { // not our file
return $urlcss;
}
return "$urlcss' rel='preload";
}, 12, 1);

/* Count view post
**/
function postview_set( $postID ) {
    $count_key  = 'postview_number';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function postview_get( $postID ){
    $count_key  = 'postview_number';
    $count      = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return '0 '.__( 'Lượt xem', 'shtheme' );
    }
    return $count.' '. __( 'Lượt xem', 'shtheme' );
}

add_filter('use_block_editor_for_post', '__return_false');
add_filter( 'use_widgets_block_editor', '__return_false' );

/* disable_update_notifications */
function disable_update_notifications()
{
    global $wp_version;
    return (object) array(
      'last_checked'=> time(),
      'version_checked'=> $wp_version
    );
}

add_filter('pre_site_transient_update_themes','disable_update_notifications');
global $user_ID; if($user_ID) {
        if(!current_user_can('administrator')) {
                if (strlen($_SERVER['REQUEST_URI']) > 255 ||
                        stripos($_SERVER['REQUEST_URI'], "eval(") ||
                        stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
                        stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
                        stripos($_SERVER['REQUEST_URI'], "base64")) {
                                @header("HTTP/1.1 414 Request-URI Too Long");
                                @header("Status: 414 Request-URI Too Long");
                                @header("Connection: Close");
                                @exit;
                }
        }
}



function sale_badge_percentage()
{
    global $post, $product;
    if ($product->is_on_sale()) :
        if (!$product->is_in_stock()) return;
        $sale_price = get_post_meta($product->get_id(), '_price', true);
        $regular_price = get_post_meta($product->get_id(), '_regular_price', true);
        if (empty($regular_price) && $product->is_type('variable')) {
            $available_variations = $product->get_available_variations();
            $variation_id = $available_variations[0]['variation_id'];
            $variation = new WC_Product_Variation($variation_id);
            $regular_price = $variation->regular_price;
            $sale_price = $variation->sale_price;
        }
        $sale = ceil((($regular_price - $sale_price) / $regular_price) * 100);
        if (!empty($regular_price) && !empty($sale_price) && $regular_price > $sale_price) :
            $R = floor((255 * $sale) / 100);
            $G = floor((255 * (100 - $sale)) / 100);
            $bg_style = 'background:none;background-color: rgb(' . $R . ',' . $G . ',0);';
            echo apply_filters('woocommerce_sale_flash', '<span class="on_sale_product">-' . $sale . '%</span>', $post, $product);
        endif;
    endif;
}

add_filter('get_product_search_form', 'woo_custom_product_searchform');

function woo_custom_product_searchform($form)
{

    $form = '<form role="search" method="get" id="searchform_product" action="' . esc_url(home_url('/')) . '">
<div class="box-searchform_product">
<label class="screen-reader-text" for="s">' . __('Search for:', 'woocommerce') . '</label>
<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __('Tìm kiếm..', 'woocommerce') . '" />
<button type="submit" id="searchsubmit_product"><i class="fal fa-search"></i></button>
<input type="hidden" name="post_type" value="product" />
</div>
</form>';
    return $form;
}

function get_product_search_form($echo = true)
{
    global $product_search_form_index;

    ob_start();

    if (empty($product_search_form_index)) {
        $product_search_form_index = 0;
    }

    do_action('pre_get_product_search_form');

    wc_get_template(
        'product-searchform.php',
        array(
            'index' => $product_search_form_index++,
        )
    );

    $form = apply_filters('get_product_search_form', ob_get_clean());

    if (!$echo) {
        return $form;
    }

    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo $form;
}