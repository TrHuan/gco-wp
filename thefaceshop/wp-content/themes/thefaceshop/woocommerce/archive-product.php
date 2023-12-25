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
    <section class="lth-products ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                     <div class="sidebars">
                        <!-- Sidebar -->
                        <?php
                            if (is_active_sidebar('sidebar_product')) { ?>

                            <aside class="lth-sidebars">
                                <?php dynamic_sidebar('sidebar_product'); ?>
                            </aside>

                        <?php } ?>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                	<?php $img = get_the_post_thumbnail_url(woocommerce_get_page_id( 'shop' )); ?>

					<?php if ($img) {?>
						<div class="shop-banner mb-40">
	                       <img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
	                   </div>
					<?php } ?>              

					<div class="module_title module_title_products_list">
	                    <h1 class="title">
	                        <?php
		                        if (is_tax()) {
		                        	woocommerce_page_title();
		                        } else {
		                        	echo __('Sản phẩm');
		                        }
	                        ?>
	                    </h1>
	                </div>  	

					<div class="module_products">
	                    <div class="posts-list products-list grid-list border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
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
    </section>

    <?php if( have_rows('contacts', 'options') ): ?>
        <section class="lth-contacts">
            <div class="container">                   
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php get_template_part('templates/addons/contact', ''); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( have_rows('features', 'options') ): ?>
        <section class="lth-features">
            <div class="container">                   
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php get_template_part('templates/addons/features', ''); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer( 'shop' );
