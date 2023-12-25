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

<?php $cat = get_queried_object(); ?>

<main class="main-site main-page main-products">
	<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <div class="main-shop-page">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 order-2 order-lg-1 mt-all-40">
                    <div class="sidebars">
                        <?php if (is_active_sidebar('sidebar_product')) { ?>
                            <aside class="lth-sidebars">
                                <?php dynamic_sidebar('sidebar_product'); ?>
                            </aside>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-lg-9 order-1 order-lg-2">
            		<div class="grid-view">
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
										do_action( 'woocommerce_shop_loop' ); ?>
										<div class="col-lg-4 col-md-4 col-sm-6 col-6">
											<?php wc_get_template_part( 'content', 'product' ); ?>
										</div>
									<?php }
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
</main>

<?php get_footer( 'shop' );
