<?php
/**
 * The Template for displaying products in a product tag. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-tag.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' ); ?>

<?php require_once(LIBS_DIR . '/breadcrumbs/breadcrumb-categories.php'); ?>

<main class="main-site main-page main-products">
    <div class="main-container">
        <div class="main-content">

            <article class="lth-products products-list">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="products-box">
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
            </article>

        </div>     
    </div>
</main>

<?php get_footer( 'shop' );
