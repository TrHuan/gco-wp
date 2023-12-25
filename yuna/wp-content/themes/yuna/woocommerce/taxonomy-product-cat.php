<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<style type="text/css">
    @media(min-width: 768px) {
        .mt-30 {
            margin-top: -30px;
        }
        .pcontrol select {
            margin-right: 15px;
        }
        .pcontrol select {
            
        }
    }
    .pro .b3 {
        margin-top: 30px;
    }
    .pwrap{
        padding-bottom: 54px;
    }
    .pcontrol {
        padding: 40px 0px 28px;
    }
    .pcontrol select {
        height: 40px;
        border: 1px solid #7e4a9b;
        border-radius: 20px;
        
    }
    .pcontrol select:focus {
        background: #7e4a9b;
        color: #fff;
    }

    .allpro-row > div[class*='col'] {
        margin-bottom: 20px;
    }

    /* filter */
    .vk-sidebar {
        position: sticky;
        top: 62px;
        padding-top: 40px;
    }
    .vk-sidebar__box {
        margin-bottom: 30px;
    }
    .shop-catigory-title {
        font-size: 18px;
        text-transform: uppercase;
        padding-bottom: 10px;
        margin-bottom: 20px;
        color: #9d46ad;
        border-bottom: 3px double #9d46ad;
    }
    .vk-sidebar__title {
        font-size: 24px;
        color: #26c6d0;
        margin-bottom: 10px;
    }
    .vk-list, .vk-sidebar__list, .acc-action, .receive-default ul, .vk-shop-detail__color {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .vk-sidebar__list.vk-sidebar__list--style-2 {
        font-size: 15px;
    }
    .vk-sidebar__list li {
        padding: 5px 0;
    }
    .vk-sidebar__list li a {
        position: relative;
        padding-left: 20px;
        display: block;
    }
    .vk-sidebar__list li a:before {
        content: "\f0c8";/* '\f279'/ "\f0c8"*/
        font-family: FontAwesome;
        position: absolute;
        left: 0;
        top: 0;
    }
    .vk-sidebar__list li.active a:before {
        content: "\f14a";/* '\f26a'/ "\f14a"*/
        color: #9d46ad;
    }
    .vk-shop-detail__color li {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border: 1px solid transparent;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        background-color: #e1e1e1;
        margin-bottom: 5px;
    }
    .vk-shop-detail__color li img {
        
        width: 100%;
        height: 100%;
        -o-object-fit: cover;
        object-fit: cover;
    }
    .vk-shop-detail__color li.active, .vk-shop-detail__color li:hover {
        border-color: #26c6d0;
    }
    .vk-shop-detail__color li:after {
        font-family: FontAwesome;/* Material-Design-Iconic-Font/ FontAwesome*/
            content: "\f00c";/* '\f26b'/ "\f00c"*/
        position: absolute;
        bottom: 0;
        right: 1px;
        color: #fff;
        font-size: 8px;
        display: none;
    }
    .vk-shop-detail__color li:before {
        content: '';
        width: 25px;
        height: 25px;
        background-color: #26c6d0;
        position: absolute;
        bottom: 0;
        right: 0;
        -webkit-transform: translate(50%, 50%) rotate(45deg);
        -ms-transform: translate(50%, 50%) rotate(45deg);
        transform: translate(50%, 50%) rotate(45deg);
        display: none;
    }
    .vk-shop-detail__color li.active:before, .vk-shop-detail__color li.active:after {
        z-index: 99;
        display: block;
    }   
</style>

<?php
    $term = get_queried_object();
    $category_product = get_field('category_product', $term);
    $category_description = $category_product['category_description'];
?>

<main class="main-site main-page main-products">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <section class="pro">
        <?php if ($category_description) { ?>
            <div class="container">
                <div class="mt-30">
                    <?php echo $category_description; ?>
                </div>
            </div>
        <?php } ?>

        <div class="b3">
            <div class="container">
                <div class="pwrap">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 order-md-1 order-2">
                            <div class="vk-sidebar">
                                <?php
                                    if (is_active_sidebar('sidebar_shop')) {
                                        dynamic_sidebar('sidebar_shop');
                                    }
                                ?>
                            </div> <!--./sidebar-->
                        </div>
                        <div class="col-lg-9 col-md-8 order-md-2">
                            <div class="posts-list products-list">
                                <?php
                                    if ( woocommerce_product_loop() ) {
                                        /**
                                         * Hook: woocommerce_before_shop_loop.
                                         *
                                         * @hooked woocommerce_output_all_notices - 10
                                         * @hooked woocommerce_result_count - 20
                                         * @hooked woocommerce_catalog_ordering - 30
                                         */
                                        do_action( 'woocommerce_before_shop_loop' );

                                        woocommerce_product_loop_start();

                                        if ( wc_get_loop_prop( 'total' ) ) {
                                            while ( have_posts() ) {
                                                the_post();

                                                /**
                                                 * Hook: woocommerce_shop_loop.
                                                 */
                                                do_action( 'woocommerce_shop_loop' );

                                                wc_get_template_part( 'content', 'product' );
                                            }
                                        }

                                        woocommerce_product_loop_end();

                                        /**
                                         * Hook: woocommerce_after_shop_loop.
                                         *
                                         * @hooked woocommerce_pagination - 10
                                         */
                                        do_action( 'woocommerce_after_shop_loop' );
                                    } else {
                                        /**
                                         * Hook: woocommerce_no_products_found.
                                         *
                                         * @hooked wc_no_products_found - 10
                                         */
                                        do_action( 'woocommerce_no_products_found' );
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer( 'shop' );
