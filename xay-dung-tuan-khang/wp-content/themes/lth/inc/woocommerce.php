<?php



// Page shop nhận file archive-product.php

add_theme_support('woocommerce');



// Hiển thị số lượng sản phẩm trên 1 page: return 2 (2 sản phẩm)

add_filter('loop_shop_per_page', 'cols');

if (!function_exists('cols')) {

    function cols($num) {

        return $paged;

    }

}



// Hiển thị số lượng sản phẩm trên 1 hàng: return 3 (3 sản phẩm)

add_filter('loop_shop_columns', 'loop_columns');

if (!function_exists('loop_columns')) {

    function loop_columns($num) {

        return 3;

    }

}



/* Sắp xếp sản phẩm mới nhất trước, hết hàng sau cùng */

add_action( 'pre_get_posts', function ( $q ) {

    if (   !is_admin()                // Target only front end

         && is_woocommerce()          // Target only WooCommerce

         && $q->is_main_query()       // Only target the main query

    ) {

        $q->set( 'meta_key', '_stock_status' );

        // $q->set( 'orderby', array('meta_value' => 'ASC', 'date' => 'DESC') );

    }

}, PHP_INT_MAX );



/*Woocommerce minicart*/

add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {

    global $woocommerce;

    ob_start();

    ?>

 

    <?php global $woocommerce; ?>

    <?php require_once(WOO_DIR . '/cart/mini-cart-ajax.php'); ?>

    <?php

    $fragments['.carts-content'] = ob_get_clean();

    return $fragments;

}



// xóa bỏ css mặc định của woocommerce
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// xóa tab thông tin bổ sung, đánh giá ở chi tiết sản phẩm
add_filter( 'woocommerce_product_tabs', 'remove_product_tabs', 98 );
function remove_product_tabs( $tabs ) {
   unset( $tabs['additional_information'] );
   unset( $tabs['reviews'] );
   unset( $tabs['description'] );
   return $tabs;
}

/**
 * Adds product images to WooCommerce order emails
 */
function sww_add_photos_to_wc_emails( $args ) {
    $args['show_image'] = true;
    $args['show_sku'] = true; 
    return $args;
}
add_filter( 'woocommerce_email_order_items_args', 'sww_add_photos_to_wc_emails' );

// Làm việc với các fields trong trang checkout của woocommerce
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields',99 );
function custom_override_checkout_fields( $fields ) { 
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_country']);
    // unset($fields['billing']['billing_state']);
    // unset($fields['billing']['billing_address_1']);
    // unset($fields['billing']['billing_address_2']);
    // unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
    // unset($fields['billing']['billing_email']);

    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_country']);
    // unset($fields['shipping']['shipping_state']);
    // unset($fields['shipping']['shipping_address_1']);
    // unset($fields['shipping']['shipping_address_2']);
    // unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_company']);
    // unset($fields['shipping']['shipping_email']);

    $fields['billing']['billing_last_name'] = array(
        'label' => __('Họ và tên', 'lth'),
        'placeholder' => _x('Nhập đầy đủ họ và tên của bạn', 'placeholder', 'lth'),
        'required' => true,
        'class' => array('form-row-wide'),
        'clear' => true
    );

    // $fields['billing']['billing_address_1']['placeholder'] = 'Địa chỉ (Số xx, Ngõ xx, ... Hà Nội)';
    // $fields['billing']['billing_address_2']['placeholder'] = 'Địa chỉ 2 (Số xx, Ngõ xx, ... Hà Nội)';

    $fields['shipping']['shipping_last_name'] = array(
        'label' => __('Họ và tên', 'lth'),
        'placeholder' => _x('Nhập đầy đủ họ và tên của người nhận', 'placeholder', 'lth'),
        'required' => true,
        'class' => array('form-row-wide'),
        'clear' => true
    );

    // $fields['shipping']['shipping_address_1']['placeholder'] = 'Địa chỉ (Số xx, Ngõ xx, ... Hà Nội)';
    // $fields['shipping']['shipping_address_2']['placeholder'] = 'Địa chỉ 2 (Số xx, Ngõ xx, ... Hà Nội)';

    $fields['billing']['billing_email'] = array(
        'label' => __('Email', 'lth'),
        'placeholder' => _x('Nhập email của bạn', 'placeholder', 'lth'),
        'required' => false,
        'class' => array('form-row-wide'),
        'clear' => true
    );

    $fields['billing']['billing_email']['placeholder'] = '';

    $fields['shipping']['shipping_email'] = array(
        'label' => __('Email', 'lth'),
        'placeholder' => _x('Nhập email của người nhận', 'placeholder', 'lth'),
        'required' => false,
        'class' => array('form-row-wide'),
        'clear' => true
    );

    $fields['shipping']['shipping_email']['placeholder'] = '';

    return $fields;
}

/*
 * Tùy chỉnh hiển thị thông tin chuyển khoản trong woocommerce
 */
add_filter('woocommerce_bacs_accounts', '__return_false');
 
add_action( 'woocommerce_email_before_order_table', 'lth_email_instructions', 10, 3 );
function lth_email_instructions( $order, $sent_to_admin, $plain_text = false ) {
 
    if ( ! $sent_to_admin && 'bacs' === $order->get_payment_method() && $order->has_status( 'on-hold' ) ) {
        lth_bank_details( $order->get_id() );
    }
 
}
 
add_action( 'woocommerce_thankyou_bacs', 'lth_thankyou_page' );
function lth_thankyou_page($order_id){
    lth_bank_details($order_id);
}
 
function lth_bank_details( $order_id = '' ) {
    $bacs_accounts = get_option('woocommerce_bacs_accounts');
    if ( ! empty( $bacs_accounts ) ) {
        ob_start();
        echo '<div>';
        ?>
        <h4><strong><?php echo __('Thông tin chuyển khoản'); ?></strong></h4>

        <ul>
            <?php
            foreach ( $bacs_accounts as $bacs_account ) {
                $bacs_account = (object) $bacs_account;
                
                $stk = $bacs_account->account_number;
                $account_name = $bacs_account->account_name;
                $bank_name = $bacs_account->bank_name;
                $bank_branch = $bacs_account->sort_code;
                $icon = $bacs_account->iban;
                ?>
                <!-- <td style="width: 200px;border: 1px solid #ebebeb;padding: 6px 10px;"><?php if($icon):?><img src="<?php echo $icon;?>" alt=""/><?php endif;?></td> -->
                <li style="border: 1px solid #ebebeb;padding: 10px 15px;">
                    <p><strong>Chủ tài khoản:</strong> <?php echo $account_name;?></p>
                    <p><strong>STK:</strong> <?php echo $stk;?></p>
                    <p><strong>Ngân hàng:</strong> <?php echo $bank_name;?></p>
                    <p><strong>Chi nhánh:</strong> <?php echo $bank_branch;?></p>
                </li>
            <?php } ?>
        </ul>
        <?php echo '</div>';
        echo ob_get_clean();;
    }
}

// sản phẩm đã xem
function viewedProduct(){
    session_start();
    if(!isset($_SESSION["viewed"])){
        $_SESSION["viewed"] = array();
    }
    if(is_singular('product')){
        $_SESSION["viewed"][get_the_ID()] = get_the_ID();
    }
}
add_action('wp', 'viewedProduct');

/**
* Optimize WooCommerce Scripts
* Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
*/
add_action( 'wp_enqueue_scripts', 'conditionally_load_woc_js_css' );
function conditionally_load_woc_js_css(){
//remove generator meta tag
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

    wp_dequeue_style( 'woocommerce_frontend_styles' );
    wp_dequeue_style( 'woocommerce_fancybox_styles' );
    wp_dequeue_style( 'woocommerce_chosen_styles' );
    wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
    wp_dequeue_script( 'woocommerce' );
    wp_dequeue_script( 'prettyPhoto' );
    wp_dequeue_script( 'prettyPhoto-init' );
    wp_dequeue_script( 'jquery-placeholder' );
    wp_dequeue_script( 'fancybox' );
    wp_dequeue_script( 'jqueryui' );
    wp_dequeue_script( 'wcqi-js' );
    wp_dequeue_script( 'jquery-cookie' );
    wp_dequeue_script( 'jquery-blockUI' );

    wp_dequeue_style( 'wc-block-style' );
}

// breadcrumb 
function woocommerce_remove_breadcrumb(){
remove_action( 
    'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
}
add_action(
    'woocommerce_before_main_content', 'woocommerce_remove_breadcrumb'
);
function woocommerce_custom_breadcrumb(){
    woocommerce_breadcrumb();
}
add_action( 'woo_custom_breadcrumb', 'woocommerce_custom_breadcrumb' );
// end breadcrumb 

// add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2); 
// function change_existing_currency_symbol( $currency_symbol, $currency ) {
//     switch( $currency ) {
//         case 'đ': $currency_symbol = 'đ'; break;
//     }
//     return $currency_symbol;
// }

add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
function custom_woocommerce_catalog_orderby( $sortby ) {
    $sortby['date_asc'] = 'Cũ nhất';
    return $sortby;
}