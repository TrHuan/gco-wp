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

<main class="main-site main-page main-products">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <div class="shop-wrapper fluid-padding-2 pt-120 pb-150">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-sidebar-area pr-60">
                        <?php
                            if (is_active_sidebar('sidebar_shop')) {
                                dynamic_sidebar('sidebar_shop');
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!-- <div class="shop-topbar-wrapper">
                        <div class="grid-list-options">
                            <ul class="view-mode">
                                <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid2"></i></a></li>
                                <li><a href="#product-list" data-view="product-list"><i class="ti-view-list"></i></a></li>
                            </ul>
                        </div>
                        <div class="product-sorting">
                            <div class="text-uppercase shop-product-sorting nav">
                                <a class="active" data-toggle="tab" href="#new-product">Xe máy mới </a>
                                <a data-toggle="tab" href="#accessory-product">Phụ kiện</a>
                            </div>
                            <div class="sorting sorting-bg-1">
                                <form>
                                    <select class="select">
                                        <option value="">Sắp xếp mặc định</option>
                                        <option value="">Sắp xếp theo giá</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div> -->
                    <div class="grid-list-product-wrapper">
                        <div id="new-product" class="product-grid product-view ">
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
</main>

<?php get_footer( 'shop' );
