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

					    <div class="social-sharing mt-30 social-box">
                            <ul>
                                <li><label>Chia sẻ</label></li>
                                <li>
				                	<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>%2Fdocs%2Fplugins%2F&layout=button&size=small&width=76&height=20&appId" width="76" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
				                	<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				                </li>
				                <li>
				                	<a class="twitter-share-button"
									  href="http://twitter.com/share?text=Im Sharing on Twitter&url=<?php the_permalink(); ?>">
									<i class="fa fa-twitter" aria-hidden="true"></i></a>
				                </li>
				                <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
					</div>

					<div class="lth-product-tabs"> 
						<div class="product-tab-box">
						    <ul class="nav nav-tabs tab-menu">
						        <li class="active">
						        	<a href="#" class="title" data_tab="desc">
						        		<?php echo __('Mô tả') ?>
						        	</a>
						        </li>
						        <!-- <li>
						        	<a href="#" class="title" data_tab="info">
						        		<?php //echo __('Thông tin bổ sung') ?>
						        	</a>
						        </li> -->
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
						        <!-- <div class="tab-pane" id="info">
						            <div class="product-info-content">
						                <?php //do_action( 'woocommerce_product_additional_information', $product ); ?>
						            </div>    
						        </div> -->
						        <div class="tab-pane" id="review">	
									<div id="review_form_wrapper">
									    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5" data-width="1120"></div>

									    <div id="fb-root"></div>
									    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=897190940472200&autoLogAppEvents=1" nonce="KKXi8B1J"></script>
									</div>
						        </div>

						    </div>      
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

						<?php
						$id = get_queried_object_id();

						$wpseo_primary_term = new WPSEO_Primary_Term( 'product_cat', $id );
						$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
						$term = get_term( $wpseo_primary_term );

					    $args = [
					        'post_type' => 'product',
					        'post_status' => 'publish',
					        'posts_per_page' => 12,
					        'orderby' => 'date',
					        'order' => 'DESC',
					        'post__not_in' => array($id),
					        'tax_query' => array(
					            array(
					                'taxonomy' => 'product_cat',
					                'field' => 'id',
					                'terms' => $term->term_id,
					            )
					        ),

					    ];
					    $tets = new WP_Query($args);
					    if ($tets->have_posts()) { ?>
						<div class="related-product white-bg pb-80">
				            <div class="container">
				                 <!-- Section Title Start -->
				                <div class="section-title text-center mb-50">
				                    <h2><?php echo __('12 sản phẩm khác cùng danh mục: '); ?></h2>
				                </div>
				                <!-- Section Title End -->
				                <!-- Featured Product Activation Start -->
				                <div class="featured-pro-active border-hover-effect owl-carousel">
				                    <?php while ($tets->have_posts()) {
				                        $tets-> the_post(); ?>
				                        
				                        <?php get_template_part('woocommerce/product-box/product-box', 'style-01'); ?>
				                    <?php } ?>
				                </div>
				                <!-- Featured Product Activation End -->
				            </div>
				        </div>                 
					    <?php }
					    wp_reset_postdata();
					?>
				</article>
			</div>
		</div>
	</div>
</section>
