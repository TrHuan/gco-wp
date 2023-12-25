<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<article id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            	<div class="sidebars sidebars-product-detail sticky-top">
                    <!-- Sidebar -->
                    <?php if (is_active_sidebar('sidebar_product_detail')) { ?>

                        <aside class="lth-sidebars">
                            <?php dynamic_sidebar('sidebar_product_detail'); ?>
                        </aside>

                    <?php } ?>
                </div>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            	<div class="product-content-box">
	            	<div class="product-images">
						<?php
						/**
						 * Hook: woocommerce_before_single_product_summary.
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						do_action( 'woocommerce_before_single_product_summary' );
						?>
					</div>

					<div class="summary entry-summary">
						<?php
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action( 'woocommerce_single_product_summary' );
						?>
					</div>

					<?php
					/**
					 * Hook: woocommerce_after_single_product_summary.
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_upsell_display - 15
					 * @hooked woocommerce_output_related_products - 20
					 */
					do_action( 'woocommerce_after_single_product_summary' );
					?>
				</div>

				<div class="product-contents description">
        			<div class="content-box">
        				<?php the_content(); ?>
        			</div>
        		</div>

    			<div class="comments-facebook-box">
    				<?php get_template_part('templates/addons/comment-facebook', ''); ?>
    			</div>
			</div>
		</div>
	</div>
</article>

<?php
	$products = get_field('products');
	if( $products ):
?>
	<article class="lth-products lth-related-products-4">
		<div class="container">       		
	        <div class="row">
	            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	            	<div class="products-box">
						<div class="title-box">
							<h3 class="title"><?php echo __('Sản phẩm liên quan'); ?></h3>
						</div>
						    <div class="content-box">
						    	<div class="slick-slider slick-related-products">
								    <?php foreach( $products as $post ): 
								        setup_postdata($post); ?>

								        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>

								    <?php endforeach; ?>
								</div>
						    </div>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</article>
<?php endif; ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
