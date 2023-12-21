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

<section id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>	
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
            	<article class="product-content-box">
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
				</article>

				<article class="lth-product-tabs"> 
					<div class="product-tab-box">
					    <ul class="nav nav-tabs tab-menu">
					        <li class="active">
					        	<a href="#" class="title" data_tab="desc">
					        		<?php echo __('Chi tiết sản phẩm') ?>
					        	</a>
					        </li>
					        <li>
					        	<a href="#" class="title" data_tab="info">
					        		<?php echo __('Thông tin bổ sung') ?>
					        	</a>
					        </li>
					        <li class="">
					        	<a href="#" class="title" data_tab="review">
					        		<?php echo __('Bình luận') ?>
					        	</a>
					        </li>
					    </ul>
					    <div class="tab-content">
					        <div class="tab-pane active" id="desc">
					            <div class="product-details-content">
					                <div class="desc-content-box">
					                    <?php the_content(); ?>
					                </div>

					            </div>    
					        </div>
					        <div class="tab-pane" id="info">
					            <div class="product-info-content">
					                <?php do_action( 'woocommerce_product_additional_information', $product ); ?>
					            </div>    
					        </div>
					        <div class="tab-pane" id="review">	
								<?php comments_template(); ?> 
					        </div>

					    </div>      
					</div>
				</article>

				<article class="related-product">
                    <div class="sec-title-two">
                        <h3><?php echo __('Sản phẩm liên quan') ?></h3>
                        <span class="border"></span>
                    </div>

                    <div class="related-product-items slick-slider slick-products-related">
                    	<?php
						$san_pham_lien_quan = get_field('san_pham_lien_quan');
						if( $san_pham_lien_quan ): ?>
						    <?php foreach( $san_pham_lien_quan as $post ):
						        $permalink = get_permalink( $post );
						        $title = get_the_title( $post );
						        ?>

						        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>

						    <?php endforeach; ?>
						<?php endif; ?> 
                    </div>
                </article>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
				<aside class="sidebars">
                    <?php
                        if (is_active_sidebar('sidebar_single_product')) {
                            dynamic_sidebar('sidebar_single_product');
                        }
                    ?>
                </aside>
			</div>
		</div>
	</div>
</section>
