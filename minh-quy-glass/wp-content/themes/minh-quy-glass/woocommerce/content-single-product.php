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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<article class="module module_single module_single_product">
            		<div class="module_title">
                		<h1 class="title">Cửa mở quay 180 độ</h1>
                	</div>

                	<div class="module_content">
						<div class="summary entry-summary content-box">
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
							//do_action( 'woocommerce_single_product_summary' );
							?>

							<div class="product-tab-box">
							    <div class="module_tab_title">
							    	<ul>
								        <li class="">
								        	<a href="#" data_tab="tab-1" class="active">
								        		<?php echo __('Chi tiết sản phẩm') ?>
								        	</a>
								        </li>
								        <li>
								        	<a href="#" data_tab="tab-2">
								        		<?php echo __('Thông tin khác') ?>
								        	</a>
								        </li>
								    </ul>
							    </div>

							    <div class="module_tab_content">
							        <div class="tab-panel active tab-1">
							            <div class="product-details-content">
							                <div class="desc-content-box">
							                    <?php the_content(); ?>
							                </div>

							            </div>    
							        </div>
							        <div class="tab-panel tab-2">
							            <div class="product-info-content">
							                <?php the_field('other_information_product'); ?>
							            </div>    
							        </div>
							    </div>      
							</div>
						</div>                		
                	
		            	<div class="content-image">
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
			</div>
		</div>
	</div>
</section>

<section class="lth-products">	
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<?php
					$other_products = get_field('other_products');
					if( $other_products ): ?>
					<div class="module module_products module_other_products">
	                    <div class="module_title">
					    	<?php if ($other_products['title']) { ?>
								<h2 class="title"><?php echo $other_products['title']; ?></h2>
							<?php } ?>
				            <?php if ($other_products['description']) { ?>
				            	<p class="infor"><?php echo $other_products['description']; ?></p>
				            <?php } ?>
						</div>

						<div class="module_content">
		                    <div class="slick-slider slick-other-products">

								<?php echo lth_custom_img_other_products('full', 330, 250);?>
		                    	
		                    </div>
		                </div>
	                </div>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</section>