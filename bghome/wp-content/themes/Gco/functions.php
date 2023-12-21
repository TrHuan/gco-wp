<?php
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");
require_once(CORE . "/init.php");

if (!function_exists('specia_setup')) :
function specia_setup()
{
    /*
 * Make theme available for translation.
 */
    load_theme_textdomain('specia', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
 * Let WordPress manage the document title.
 */
    add_theme_support('title-tag');

    /*
 * Enable support for Post Thumbnails on posts and pages.
 */
    add_theme_support('post-thumbnails');

    add_image_size('product-thumbnail', 100, 100, true);

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'primary_menu' => esc_html__('Primary Menu', 'specia'),
        'menu_categories' => esc_html__('Menu Categories Product', 'specia'),
    ));

    /*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    //Add selective refresh for sidebar widget
    add_theme_support('customize-selective-refresh-widgets');

    //Add custom logo support
    add_theme_support('custom-logo');

    /*
 * WooCommerce Plugin Support
 */
    add_theme_support('woocommerce');

    /*
 * This theme styles the visual editor to resemble the theme style,
 * specifically font, colors, icons, and column width.
 */
    add_editor_style(array('css/editor-style.css', specia_google_font()));
}
endif;
add_action('after_setup_theme', 'specia_setup');

/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*/
function specia_content_width()
{
$GLOBALS['content_width'] = apply_filters('specia_content_width', 1170);
}
add_action('after_setup_theme', 'specia_content_width', 0);

/**
* All Styles & Scripts.
*/
require_once get_template_directory() . '/inc/enqueue.php';

/**
* Bootstrap Nav Walker.
*/
if (!class_exists('specia_nav_walker')) {
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
require_once(get_template_directory() . '/inc/customize/specia-customizer.php');

/**
* widget tạo bài viết mới
*/
class Sidebar_Post extends WP_Widget
{
function __construct()
{
    parent::__construct(
        'sidebar_post',
        'Bài viết theo danh mục',
        array('description'  =>  'Widget hiển thị bài viết mới theo danh mục')
    );
}
function form($instance)
{
    $default = array(
        'title' => 'Tiêu đề ',
        'post_number' => 5,
        'addclass' => '',
        'select' => ''
    );
    $instance = wp_parse_args((array) $instance, $default);
    $title = esc_attr($instance['title']);
    $select = esc_attr($instance['select']);
    $post_number = esc_attr($instance['post_number']);
    $addclass = esc_attr($instance['addclass']);
    echo '<p>Nhập tiêu đề <input type="text" id="' . $this->get_field_id('title') . '" class="widefat" name="' . $this->get_field_name('title') . '" value="' . $title . '"/></p>';
    echo '<p>Số lượng bài viết hiển thị <input type="number" class="widefat" name="' . $this->get_field_name('post_number') . '" value="' . $post_number . '" placeholder="' . $post_number . '" max="30" /></p>';
?>
    <!-- Category Select Menu -->
    <p>
        <select id="<?php echo $this->get_field_id('select'); ?>" name="<?php echo $this->get_field_name('select'); ?>" class="widefat" style="width:100%;">
            <?php foreach (get_terms('category', 'parent=0&hide_empty=0') as $term) { ?>
                <option <?php selected($instance['select'], $term->term_id); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
            <?php } ?>
        </select>
    </p>
    <select name="<?php echo $this->get_field_name('addclass'); ?>" id="<?php echo $this->get_field_id('addclass'); ?>">
        <option <?php selected('post-style-1', $instance['addclass']); ?> value="post-style-1">Style 1 Image Left</option>
        <option <?php selected('post-style-2', $instance['addclass']); ?> value="post-style-2">Style 2 Image Right</option>
        <option <?php selected('post-style-3', $instance['addclass']); ?> value="post-style-3">Style 3 Image Center</option>
        <option <?php selected('post-style-4', $instance['addclass']); ?> value="post-style-4">Style 4 Image Top</option>
        <option <?php selected('post-style-5', $instance['addclass']); ?> value="owl-carousel owl-theme">Style 5 Image Slider</option>
    </select>
    <?php
}
function update($new_instance, $old_instance)
{
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['select'] = strip_tags($new_instance['select']);
    $instance['post_number'] = strip_tags($new_instance['post_number']);
    $instance['addclass'] = strip_tags($new_instance['addclass']);
    return $instance;
}
function widget($args, $instance)
{
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);
    $post_number = $instance['post_number'];
    $select = $instance['select'];
    $addclass = $instance['addclass'];
    echo $before_widget;
    echo $before_title . $title . $after_title;
    $sidebar_post = new WP_Query('posts_per_page=' . $post_number . '&orderby=date&cat=' . $select . '');
    if ($sidebar_post->have_posts()) :
        echo '<ul class="sidebar-post ' . $addclass . '">';
        $i = 1;
        while ($sidebar_post->have_posts()) :
            $sidebar_post->the_post(); ?>
            <?php if ($i == 1) : ?>
                <li>
                    <div class="img-sidebarpost">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
                    </div>
                    <div class="name-sidebarpost">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        <span class="post-time"><i class="far fa-calendar-alt"></i> <?php the_time('d,m,Y') ?></span>
                    </div>
                </li>
            <?php else : ?>
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
    <?php $i++;
        endwhile;
        echo "</ul>";
    endif;
    echo $after_widget;
}
}
add_action('widgets_init', 'create_sidebarpost_widget');
function create_sidebarpost_widget()
{
register_widget('Sidebar_Post');
}

/**
* widget thông tin liên hệ
*/
class Contact_Widget extends WP_Widget
{
function __construct()
{
    parent::__construct(
        'contact_widget',
        'Thông tin liên hệ',
        array('description'  =>  'Widget hiển thị thông tin liên hệ')
    );
}
function form($instance)
{
    $default = array(
        'title' => 'Tiêu đề ',
        'hotline' => '',
        'email' => '',
        'address' => '',
        'address2' => '',
        // 'website' => '',
    );
    $instance = wp_parse_args((array) $instance, $default);
    $title = esc_attr($instance['title']);
    $hotline = esc_attr($instance['hotline']);
    $email = esc_attr($instance['email']);
    $address = esc_attr($instance['address']);
    $address2 = esc_attr($instance['address2']);
    // $website = esc_attr($instance['website']);
    echo '<p>Nhập tiêu đề <input type="text" id="' . $this->get_field_id('title') . '" class="widefat" name="' . $this->get_field_name('title') . '" value="' . $title . '"/></p>';
    echo '<p>Địa chỉ 1: <input type="text" id="' . $this->get_field_id('address') . '" class="widefat" name="' . $this->get_field_name('address') . '" value="' . $address . '"/></p>';
    echo '<p>Địa chỉ 2: <input type="text" id="' . $this->get_field_id('address2') . '" class="widefat" name="' . $this->get_field_name('address2') . '" value="' . $address2 . '"/></p>';
    echo '<p>Hotline: <input type="text" id="' . $this->get_field_id('hotline') . '" class="widefat" name="' . $this->get_field_name('hotline') . '" value="' . $hotline . '"/></p>';
    echo '<p>Email: <input type="text" id="' . $this->get_field_id('email') . '" class="widefat" name="' . $this->get_field_name('email') . '" value="' . $email . '"/></p>';
    // echo '<p>Website: <input type="text" id="'.$this->get_field_id('website').'" class="widefat" name="'.$this->get_field_name('website').'" value="'.$website.'"/></p>';
    ?>
<?php
}
function update($new_instance, $old_instance)
{
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['hotline'] = strip_tags($new_instance['hotline']);
    $instance['email'] = strip_tags($new_instance['email']);
    $instance['address'] = strip_tags($new_instance['address']);
    $instance['address2'] = strip_tags($new_instance['address2']);
    // $instance['website'] = strip_tags($new_instance['website']);
    return $instance;
}
function widget($args, $instance)
{
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);
    $hotline = $instance['hotline'];
    $email = $instance['email'];
    $address = $instance['address'];
    $address2 = $instance['address2'];
    // $website = $instance['website'];
    echo $before_widget;
    echo $before_title . $title . $after_title;
?>
    <ul id="list-widget_contact">
        <?php if ($address) { ?>
            <li class="address-widget_contact">
                <i class="fal fa-map-marker-alt"></i>
                <p><span>Địa chỉ: </span><?php echo $address; ?></p>
            </li>
        <?php } ?>
        <?php if ($address2) { ?>
            <li class="address-widget_contact">
                <i class="fal fa-map-marker-alt"></i>
                <p><span>Địa chỉ: </span><?php echo $address2; ?></p>
            </li>
        <?php } ?>
        <?php if ($hotline) { ?>
            <li class="hotline-widget_contact">
                <i class="fal fa-phone"></i>
                <p><span>Hotline: </span><a href="tel:<?php echo $hotline; ?>"><?php echo $hotline; ?></a></p>
            </li>
        <?php } ?>
        <?php if ($email) { ?>
            <li class="email-widget_contact">
                <i class="fal fa-envelope"></i>
                <p><span>Email: </span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
            </li>
        <?php } ?>
        <!--<?php if ($website) { ?> 
      <li class="website-widget_contact">
        <i class="fal fa-envelope"></i><p><span>Website: </span><a href="<?php echo $website; ?>"><?php echo $website; ?></a></p>
      </li>
    <?php } ?> -->
    </ul>
<?php
    echo $after_widget;
}
}
add_action('widgets_init', 'create_contact_widget');
function create_contact_widget()
{
register_widget('Contact_Widget');
}

/**
* widget Box Icon / Text
*/
class Icon_Widget extends WP_Widget
{
function __construct()
{
    parent::__construct(
        'icon_widget',
        'Box Icon / Text',
        array('description'  =>  'Widget hiển thị box icon text')
    );
}
function form($instance)
{
    $default = array(
        'title' => 'Tiêu đề ',
        'icon1' => '',
        'text1' => '',
        'description1' => '',
        'icon2' => '',
        'text2' => '',
        'description2' => '',
        'icon3' => '',
        'text3' => '',
        'description3' => '',
        'icon4' => '',
        'text4' => '',
        'description4' => '',
    );
    $instance = wp_parse_args((array) $instance, $default);
    $title = esc_attr($instance['title']);
    $icon1 = esc_attr($instance['icon1']);
    $text1 = esc_attr($instance['text1']);
    $description1 = esc_attr($instance['description1']);
    $icon2 = esc_attr($instance['icon2']);
    $text2 = esc_attr($instance['text2']);
    $description2 = esc_attr($instance['description2']);
    $icon3 = esc_attr($instance['icon3']);
    $text3 = esc_attr($instance['text3']);
    $description3 = esc_attr($instance['description3']);
    $icon4 = esc_attr($instance['icon4']);
    $text4 = esc_attr($instance['text4']);
    $description4 = esc_attr($instance['description4']);

    echo '<p>Nhập tiêu đề <input type="text" id="' . $this->get_field_id('title') . '" class="widefat" name="' . $this->get_field_name('title') . '" value="' . $title . '"/></p>';
    echo '<p>Text 1: <input type="text" id="' . $this->get_field_id('text1') . '" class="widefat" name="' . $this->get_field_name('text1') . '" value="' . $text1 . '"/></p>';
    echo '<p>Description 1: <input type="text" id="' . $this->get_field_id('description1') . '" class="widefat" name="' . $this->get_field_name('description1') . '" value="' . $description1 . '"/></p>';
    echo '<p>Icon 1: <input type="text" id="' . $this->get_field_id('icon1') . '" class="widefat" name="' . $this->get_field_name('icon1') . '" value="' . $icon1 . '"/></p><hr>';
    echo '<p>Text 2: <input type="text" id="' . $this->get_field_id('text2') . '" class="widefat" name="' . $this->get_field_name('text2') . '" value="' . $text2 . '"/></p>';
    echo '<p>Description 2: <input type="text" id="' . $this->get_field_id('description2') . '" class="widefat" name="' . $this->get_field_name('description2') . '" value="' . $description2 . '"/></p>';
    echo '<p>Icon 2: <input type="text" id="' . $this->get_field_id('icon2') . '" class="widefat" name="' . $this->get_field_name('icon2') . '" value="' . $icon2 . '"/></p><hr>';
    echo '<p>Text 3: <input type="text" id="' . $this->get_field_id('text3') . '" class="widefat" name="' . $this->get_field_name('text3') . '" value="' . $text3 . '"/></p>';
    echo '<p>Description 3: <input type="text" id="' . $this->get_field_id('description3') . '" class="widefat" name="' . $this->get_field_name('description3') . '" value="' . $description3 . '"/></p>';
    echo '<p>Icon 3: <input type="text" id="' . $this->get_field_id('icon3') . '" class="widefat" name="' . $this->get_field_name('icon3') . '" value="' . $icon3 . '"/></p><hr>';
    echo '<p>Text 4: <input type="text" id="' . $this->get_field_id('text4') . '" class="widefat" name="' . $this->get_field_name('text4') . '" value="' . $text4 . '"/></p>';
    echo '<p>Description 4: <input type="text" id="' . $this->get_field_id('description4') . '" class="widefat" name="' . $this->get_field_name('description4') . '" value="' . $description4 . '"/></p>';
    echo '<p>Icon 4: <input type="text" id="' . $this->get_field_id('icon4') . '" class="widefat" name="' . $this->get_field_name('icon4') . '" value="' . $icon4 . '"/></p>';
?>
<?php
}
function update($new_instance, $old_instance)
{
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['icon1'] = strip_tags($new_instance['icon1']);
    $instance['text1'] = strip_tags($new_instance['text1']);
    $instance['description1'] = strip_tags($new_instance['description1']);
    $instance['icon2'] = strip_tags($new_instance['icon2']);
    $instance['text2'] = strip_tags($new_instance['text2']);
    $instance['description2'] = strip_tags($new_instance['description2']);
    $instance['icon3'] = strip_tags($new_instance['icon3']);
    $instance['text3'] = strip_tags($new_instance['text3']);
    $instance['description3'] = strip_tags($new_instance['description3']);
    $instance['icon4'] = strip_tags($new_instance['icon4']);
    $instance['text4'] = strip_tags($new_instance['text4']);
    $instance['description4'] = strip_tags($new_instance['description4']);

    return $instance;
}
function widget($args, $instance)
{
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);
    $icon1 = $instance['icon1'];
    $text1 = $instance['text1'];
    $description1 = $instance['description1'];
    $icon2 = $instance['icon2'];
    $text2 = $instance['text2'];
    $description2 = $instance['description2'];
    $icon3 = $instance['icon3'];
    $text3 = $instance['text3'];
    $description3 = $instance['description3'];
    $icon4 = $instance['icon4'];
    $text4 = $instance['text4'];
    $description4 = $instance['description4'];
    echo $before_widget;
    echo $before_title . $title . $after_title;
?>
    <ul id="list-widget_icon">
        <?php if ($text1) { ?>
            <li class="items-widget_icon">
                <i class="fal fa-<?php echo $icon1; ?>"></i>
                <div class="infor-widget_icon">
                    <h3><?php echo $text1; ?></h3>
                    <p><?php echo $description1; ?></p>
                </div>
            </li>
        <?php } ?>
        <?php if ($text2) { ?>
            <li class="items-widget_icon">
                <i class="fal fa-<?php echo $icon2; ?>"></i>
                <div class="infor-widget_icon">
                    <h3><?php echo $text2; ?></h3>
                    <p><?php echo $description2; ?></p>
                </div>
            </li>
        <?php } ?>
        <?php if ($text3) { ?>
            <li class="items-widget_icon">
                <i class="fal fa-<?php echo $icon3; ?>"></i>
                <div class="infor-widget_icon">
                    <h3><?php echo $text3; ?></h3>
                    <p><?php echo $description3; ?></p>
                </div>
            </li>
        <?php } ?>
        <?php if ($text1) { ?>
            <li class="items-widget_icon">
                <i class="fal fa-<?php echo $icon4; ?>"></i>
                <div class="infor-widget_icon">
                    <h3><?php echo $text4; ?></h3>
                    <p><?php echo $description4; ?></p>
                </div>
            </li>
        <?php } ?>
    </ul>
<?php
    echo $after_widget;
}
}
add_action('widgets_init', 'create_icon_widget');
function create_icon_widget()
{
register_widget('Icon_Widget');
}

/*text editer*/
function ilc_mce_buttons($buttons)
{
array_push(
    $buttons,
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

function add_the_table_plugin($plugins)
{
$plugins['table'] = get_template_directory_uri() . '/js/table.min.js';
return $plugins;
}
add_filter('mce_external_plugins', 'add_the_table_plugin');

if (!function_exists('hiepdesign_mce_text_sizes')) {
function hiepdesign_mce_text_sizes($initArray)
{
    $initArray['fontsize_formats'] = "10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px 40px";
    return $initArray;
}
add_filter('tiny_mce_before_init', 'hiepdesign_mce_text_sizes', 99);
}
/*excerpt editer*/
function the_excerpt_max_charlength($charlength)
{
$excerpt = get_the_excerpt();
$charlength++;

if (mb_strlen($excerpt) > $charlength) {
    $subex = mb_substr($excerpt, 0, $charlength - 5);
    $exwords = explode(' ', $subex);
    $excut = - (mb_strlen($exwords[count($exwords) - 1]));
    if ($excut < 0) {
        echo mb_substr($subex, 0, $excut);
    } else {
        echo $subex;
    }
    echo '...';
} else {
    echo $excerpt;
}
}
if (!function_exists('specia_logo')) {
function specia_logo()
{ ?>
    <?php
    global $vz_options;
    if ($vz_options['logo-on'] == 0) :
    ?>
        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <?php if (function_exists('the_custom_logo')) : the_custom_logo();
            endif; ?>
        <?php else : ?>
            <img src="<?php echo $vz_options['logo-image']['url'] ?>" alt="" />
        <?php endif; ?>
        </a>
    <?php
}
}


/* Count view post
**/
function postview_set($postID)
{
$count_key  = 'postview_number';
$count      = get_post_meta($postID, $count_key, true);
if ($count == '') {
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
} else {
    $count++;
    update_post_meta($postID, $count_key, $count);
}
}

function postview_get($postID)
{
$count_key  = 'postview_number';
$count      = get_post_meta($postID, $count_key, true);
if ($count == '') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return '0 ' . __('Lượt xem', 'shtheme');
}
return $count . ' ' . __('Lượt xem', 'shtheme');
}

add_filter('use_block_editor_for_post', '__return_false');

add_filter('use_widgets_block_editor', '__return_false');

add_filter('woocommerce_get_availability', 'custom_get_availability', 1, 2);
function custom_get_availability($availability, $product)
{
if ($availability['availability'] == '') {
    $availability['availability'] = __('Tình trạng: <span>Còn hàng</span>', 'woocommerce');
}
return $availability;
}
// add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
// function change_existing_currency_symbol( $currency_symbol, $currency ) {
//  switch( $currency ) {
//  case 'VND': $currency_symbol = 'VNĐ'; break;
//  }
//  return $currency_symbol;
// }

add_filter('woocommerce_product_tabs', 'woo_customize_tabs', 100, 1);
function woo_customize_tabs($tabs)
{

unset($tabs['reviews']);    // Remove the reviews tab

$tabs['description']['title'] = __('Chi tiết sản phẩm'); // Rename the description tab

return $tabs;
}

add_filter('woocommerce_product_tabs', 'woo_new_product_tab');
function woo_new_product_tab($tabs)
{
// Adds the new tab
$tabs['specifications_tab'] = array(
    'title'     => __('Thông số kỹ thuật', 'woocommerce'),
    'priority'  => 15,
    'callback'  => 'woo_new_product_tab_content'
);
$tabs['instructions_tab'] = array(
    'title'     => __('Hướng dẫn bảo quản', 'woocommerce'),
    'priority'  => 16,
    'callback'  => 'woo_tab_instructions_products'
);
return $tabs;
}
function woo_new_product_tab_content()
{
$specifications_products = get_field('specifications_products');

echo '<div class="content-specifications_products">' . $specifications_products . '</div>';
}
function woo_tab_instructions_products()
{
$instructions_products = get_field('instructions_products');

echo '<div class="content-instructions_products">' . $instructions_products . '</div>';
}

add_filter('woocommerce_output_related_products_args', 'jk_related_products_args');
function jk_related_products_args($args)
{

$args['posts_per_page'] = 8; // 4 related products
$args['columns'] = 4; // arranged in 2 columns
return $args;
}
global $devvn_quickbuy;
remove_action('woocommerce_single_product_summary', array($devvn_quickbuy, 'add_button_quick_buy'), 35);
/*Xóa trường không cần thiết trong trang thanh toán*/
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{
unset($fields['billing']['billing_last_name']);
unset($fields['billing']['billing_company']);
unset($fields['billing']['billing_country']);
unset($fields['billing']['billing_address_2']);
unset($fields['billing']['billing_city']);
unset($fields['billing']['billing_state']);
unset($fields['billing']['bilzzzzzzzzzling_postcode']);
unset($fields['billing']['billing_postcode']);
return $fields;
}

function devvn_wc_custom_get_price_html($price, $product)
{
if ($product->get_price() == 0) {
    if ($product->is_on_sale() && $product->get_regular_price()) {
        $regular_price = wc_get_price_to_display($product, array('qty' => 1, 'price' => $product->get_regular_price()));

        $price = wc_format_price_range($regular_price, __('Liên hệ', 'woocommerce'));
    } else {
        $price = '<span class="amount">' . __('Liên hệ', 'woocommerce') . '</span>';
    }
}
return $price;
}
add_filter('woocommerce_get_price_html', 'devvn_wc_custom_get_price_html', 10, 2);

// add_filter('woocommerce_sale_flash', 'my_custom_sale_flash');
// function my_custom_sale_flash($text) {
//     global $product;
//     $percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
//     return '<span class="onsale">'.$percentage.'%</span>';  
// }    

/*Woocommerce minicart*/
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
ob_start();
    ?>
    <span class="quanlity-minicart">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
<?php $fragments['span.quanlity-minicart'] = ob_get_clean();
return $fragments;
});
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
ob_start();
?>
    <div class="minicart-quickcart">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['div.minicart-quickcart'] = ob_get_clean();
    return $fragments;
});

add_filter('woocommerce_show_page_title', '__return_false');

add_filter('woocommerce_dropdown_variation_attribute_options_args', 'fun_select_default_option', 10, 1);
function fun_select_default_option($args)
{

    if (count($args['options']) > 0) //Check the count of available options in dropdown
        $args['selected'] = $args['options'][0];
    return $args;
}

add_action('woocommerce_after_add_to_cart_button', 'add_custom_addtocart_and_checkout');
function add_custom_addtocart_and_checkout()
{
    global $product;

    $addtocart_url = wc_get_checkout_url() . '?add-to-cart=' . $product->get_id();
    $button_class  = 'single_add_to_cart_button button alt custom-checkout-btn';
    $button_text   = __("Mua ngay", "woocommerce");

    if ($product->is_type('simple')) :
    ?>
        <script>
            jQuery(document).ready(function($) {
                var url = '<?php echo $addtocart_url; ?>',
                    qty = 'input.qty',
                    button = 'a.custom-checkout-btn';

                // On input/change quantity event
                $(qty).on('input change', function() {
                    $(button).attr('href', url + '&quantity=' + $(this).val());
                });
            });
        </script>
    <?php
    elseif ($product->is_type('variable')) :

        $addtocart_url = wc_get_checkout_url() . '?add-to-cart=';
    ?>
        <script>
			jQuery(document).ready(function($) {
				var url    = '<?php echo $addtocart_url; ?>',
					vid    = 'input[name="variation_id"]',
					pid    = 'input[name="product_id"]',
					tip    = 'li.button-variable-item.selected',
					color    = 'li.color-variable-item.selected',
					qty    = 'input.qty',
					button = 'a.custom-checkout-btn';

				// Once DOM is loaded
				setTimeout( function(){
					if( $(vid).val() != '' ){
						$(button).attr('href', url + $(vid).val() + '&quantity=' + $(qty).val() + '&variation_id=' + $(vid).val() + '&attribute_pa_kich-thuoc=' + $(tip).data('value') + '&attribute_pa_mau-sac=' + $(color).data('value'));
					}
				}, 300 );

				// On input/change quantity event
				$(qty).on('input change', function() {
					if( $(vid).val() != '' ){
						$(button).attr('href', url + $(vid).val() + '&quantity=' + $(this).val() + '&variation_id=' + $(vid).val() + '&attribute_pa_kich-thuoc=' + $(tip).data('value') + '&attribute_pa_mau-sac=' + $(color).data('value'));
					}
				});

				// On select attribute field change event
				$('.variations_form').on('change blur', 'table.variations li.selected', function() {
					if( $(vid).val() != '' ){
						$(button).attr('href', url + $(vid).val() + '&quantity=' + $(qty).val() + '&variation_id=' + $(vid).val() + '&attribute_pa_kich-thuoc=' + $(this).data('value') + '&attribute_pa_mau-sac=' + $(color).data('value'));
					}
				});
			});
		</script>
    <?php
    elseif ($product->is_type('woosg')) :
    ?>
        <script>
            jQuery(function($) {
                $(document).on('click', 'a.single_add_to_cart_button', function(e) {
                    e.preventDefault()
                    window.localStorage.setItem('buynow', true)
                    document.querySelector('button.single_add_to_cart_button').click()
                })
            })
            document.addEventListener('DOMContentLoaded', function() {
                if (window.localStorage.getItem('buynow')) {
                    window.localStorage.removeItem('buynow')
                    window.location.href = '<?php echo wc_get_checkout_url() ?>'
                }
            })
        </script>
    <?php
    endif;
    echo '<a href="' . $addtocart_url . '" class="' . $button_class . '">' . $button_text . '</a>';
}

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);
function woo_remove_product_tabs($tabs)
{
    unset($tabs['additional_information']);   // Remove the additional information tab
    return $tabs;
}
add_action('woocommerce_after_shop_loop_item', 'get_star_rating');
function get_star_rating()
{
    global $woocommerce, $product;
    $average = $product->get_average_rating();

    echo '<div class="star-rating"><span style="width:' . (($average / 5) * 100) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __('out of 5', 'woocommerce') . '</span></div>';
}

// Minimum CSS to remove +/- default buttons on input field type number
if (defined('YITH_WCWL') && !function_exists('yith_wcwl_get_items_count')) {
    function yith_wcwl_get_items_count()
    {
        ob_start();
    ?>
        <?php echo esc_html(yith_wcwl_count_all_products()); ?>
    <?php
        return ob_get_clean();
    }
    add_shortcode('yith_wcwl_items_count', 'yith_wcwl_get_items_count');
}

if (defined('YITH_WCWL') && !function_exists('yith_wcwl_ajax_update_count')) {
    function yith_wcwl_ajax_update_count()
    {
        wp_send_json(array(
            'count' => yith_wcwl_count_all_products()
        ));
    }
    add_action('wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count');
    add_action('wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count');
}

if (defined('YITH_WCWL') && !function_exists('yith_wcwl_enqueue_custom_script')) {
    function yith_wcwl_enqueue_custom_script()
    {
        wp_add_inline_script(
            'jquery-yith-wcwl',
            "
    jQuery( function( $ ) {
      $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
        $.get( yith_wcwl_l10n.ajax_url, {
          action: 'yith_wcwl_update_wishlist_count'
        }, function( data ) {
          $('.yith-wcwl-items-count').html( data.count );
        } );
      } );
    } );
  "
        );
    }
    add_action('wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20);
}

// Minimum CSS to remove +/- default buttons on input field type number
add_action('wp_footer', 'custom_quantity_fields_script');
function custom_quantity_fields_script()
{
    ?>
    <script type='text/javascript'>
        jQuery(function($) {
            if (!String.prototype.getDecimals) {
                String.prototype.getDecimals = function() {
                    var num = this,
                        match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                    if (!match) {
                        return 0;
                    }
                    return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
                }
            }
            // Quantity "plus" and "minus" buttons
            $(document.body).on('click', '.plus, .minus', function() {
                var $qty = $(this).closest('.quantity').find('.qty'),
                    currentVal = parseFloat($qty.val()),
                    max = parseFloat($qty.attr('max')),
                    min = parseFloat($qty.attr('min')),
                    step = $qty.attr('step');

                // Format values
                if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
                if (max === '' || max === 'NaN') max = '';
                if (min === '' || min === 'NaN') min = 0;
                if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

                // Change the value
                if ($(this).is('.plus')) {
                    if (max && (currentVal >= max)) {
                        $qty.val(max);
                    } else {
                        $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
                    }
                } else {
                    if (min && (currentVal <= min)) {
                        $qty.val(min);
                    } else if (currentVal > 0) {
                        $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
                    }
                }

                // Trigger change event
                $qty.trigger('change');
            });
        });
    </script>
<?php
}

// chuyển tabs woocommerce lên phải
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 30 );
// Remove short description
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
    return array(
        'width' => 180,
        'height' => 120,
        'crop' => 1,
    );
});


add_action('woocommerce_before_thankyou', 'woocommerce_list_tracks_pays', 5);

add_action('woocommerce_before_checkout_form', 'woocommerce_list_tracks_pays', 5);

add_action('woocommerce_before_cart', 'woocommerce_list_tracks_pays', 5);
function woocommerce_list_tracks_pays()
{
?>
    <ul class="list-tracks__pays">
        <li>
            <div class="items-tracks__pays paying-tracks">
                <div class="box-pays__icons">
                    <img src="<?php bloginfo('template_directory'); ?>/images/checks-pays-list-icons-1.png">
                </div>
                <p class="titles-pays__tracks">Giỏ hàng</p>
            </div>
        </li>
        <li>
            <div class="items-tracks__pays">
                <div class="box-pays__icons">
                    <img src="<?php bloginfo('template_directory'); ?>/images/checks-pays-list-icons-2.png">
                </div>
                <p class="titles-pays__tracks">Xác nhận thông tin</p>
            </div>
        </li>
        <li>
            <div class="items-tracks__pays">
                <div class="box-pays__icons">
                    <img src="<?php bloginfo('template_directory'); ?>/images/checks-pays-list-icons-3.png">
                </div>
                <p class="titles-pays__tracks">Thanh toán</p>
            </div>
        </li>
    </ul>
<?php
}

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 20);
// Disable Woocommerce Header in WP Admin 
add_action('admin_head', 'Hide_WooCommerce_Breadcrumb');

function Hide_WooCommerce_Breadcrumb()
{
    echo '<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
padding-left: 25px;
}
.woocommerce-layout__header {
display: none;
}
.woocommerce-layout__activity-panel-tabs {
display: none;
}
.woocommerce-layout__header-breadcrumbs {
display: none;
}
.woocommerce-embed-page .woocommerce-layout__primary{
display: none;
}
.woocommerce-embed-page #screen-meta, .woocommerce-embed-page #screen-meta-links{top:0;}
</style>';
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
/* disable_update_notifications */
function disable_update_notifications()
{
    global $wp_version;
    return (object) array(
        'last_checked' => time(),
        'version_checked' => $wp_version
    );
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

add_filter('pre_site_transient_update_themes', 'disable_update_notifications');
global $user_ID;
if ($user_ID) {
    if (!current_user_can('administrator')) {
        if (
            strlen($_SERVER['REQUEST_URI']) > 255 ||
            stripos($_SERVER['REQUEST_URI'], "eval(") ||
            stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
            stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
            stripos($_SERVER['REQUEST_URI'], "base64")
        ) {
            @header("HTTP/1.1 414 Request-URI Too Long");
            @header("Status: 414 Request-URI Too Long");
            @header("Connection: Close");
            @exit;
        }
    }
}
function my_enqueue_scripts() {
    wp_enqueue_script('jquery');
    wp_localize_script( 'jquery', 'MS_Ajax', array(
        'ajaxurl'       => admin_url( 'admin-ajax.php' ),
        'nextNonce'     => wp_create_nonce( 'myajax-next-nonce' ))
    );
}
add_action('wp_enqueue_scripts','my_enqueue_scripts');

