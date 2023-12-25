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
            	<article class="product-content-box ptb-80">
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

				<!-- Product Thumbnail Description Start -->
		        <article class="thumnail-desc white-bg">
		            <div class="container">
		                <div class="thumb-desc-inner">
		                    <div class="row">
		                        <div class="col-sm-12">
		                            <ul class="main-thumb-desc nav tabs-area" role="tablist">
		                                <li><a class="active" data-toggle="tab" href="#dtail"><?php echo __('Mô tả'); ?></a></li>
		                                <li><a data-toggle="tab" href="#review"><?php echo __('Bình luận'); ?></a></li>
		                            </ul>
		                            <!-- Product Thumbnail Tab Content Start -->
		                            <div class="tab-content thumb-content">
		                                <div id="dtail" class="tab-pane fade show active">
		                                	<?php the_content(); ?>
		                                </div>
		                                <div id="review" class="tab-pane fade">
		                                    <!-- Reviews Start -->
		                                    <div class="review">
		                                        <div id="fb-root"></div>
												<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=897190940472200&autoLogAppEvents=1" nonce="IF8UVuqi"></script>

												<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#<?php the_permalink(); ?>" data-width="870" data-numposts="5"></div>
		                                    </div>
		                                    <!-- Reviews End -->
		                                </div>
		                            </div>
		                            <!-- Product Thumbnail Tab Content End -->
		                        </div>
		                    </div>
		                    <!-- Row End -->
		                </div>
		            </div>
		            <!-- Container End -->
		        </article>
		        <!-- Product Thumbnail Description End -->

		        <?php if( have_rows('products_related') ): ?>
		        	<?php while( have_rows('products_related') ): the_row(); ?>
			        <!-- Related Product Start Here-->
			        <div class="related-product white-bg ptb-80">
			            <div class="module module_products">
			                 <!-- Section Title Start -->
			                <div class="section-title text-center mb-50">
			                    <h2><?php the_sub_field('title'); ?></h2>
	            				<p><?php the_sub_field('description'); ?></p>
			                </div>
			                <!-- Section Title End -->
			                <!-- Featured Product Activation Start -->
			                <div class="featured-pro-active border-hover-effect owl-carousel">
			                    <?php
								$relateds = [];
								$i = 0;

								$featured_posts = get_sub_field('products');
								if( $featured_posts ){
									foreach( $featured_posts as $featured_post ):
										$relateds[$i] = $featured_post;
										$i++;
									endforeach;

							        $args = [
							            'post_type' => 'product',
							            'post_status' => 'publish',
						            	'posts_per_page' => 12,
							            'orderby' => 'date',
							            'order' => 'DESC',
							            'post__in' => $relateds,
							            'post__not_in' => array($id),

							        ];
							        $wp_query_related = new WP_Query($args);
							        if ($wp_query_related->have_posts()) { ?>
								        <?php while ($wp_query_related->have_posts()) {
			                                $wp_query_related-> the_post();
			                                //load file tương ứng với post format
			                                get_template_part('woocommerce/product-box/product-box', '');
			                            } ?>                    
							        <?php } else {
							            //get_template_part('template-parts/content', 'none');
							        }
							        // reset post data
							        wp_reset_postdata();
							    }
						    ?>
			                </div>
			                <!-- Featured Product Activation End -->
			            </div>
			        </div>
			        <!-- Related Product End Here-->
			        <?php endwhile; ?>
		        <?php endif; ?>		
	                    		                    
                <?php
			        $cates = [];

			        $id = get_queried_object_id();

			        $terms = get_the_terms( $id, 'product_cat' );

			        if ( $terms && ! is_wp_error( $terms ) ) :
			                                     
			            foreach ( $terms as $term ) {
			                $cat_term_id = $term->term_id;

			                $cates[$term->term_id] = $cat_term_id;
			            }

			        endif; 


			        foreach ($cates as $kg) {
			            // var_dump($kg);
			            $kq .= $kg . ' ';
			        }

			        $args = [
			            'post_type' => 'product',
			            'post_status' => 'publish',
			            'posts_per_page' => 12,
			            'orderby' => 'date',
			            'order' => 'DESC',
			            'post__not_in' => array($id),
			            // 'cat' => $kq,
			            'tax_query' => array(
			                array(
			                    'taxonomy' => 'product_cat',
			                    'field' => 'id',
			                    'terms' => $kq,
			                )
			            ),

			        ];
			        $wp_query_other = new WP_Query($args);
			        if ($wp_query_other->have_posts()) { ?>
			        	<article class="related-product pb-80">
							<div class="module module_products">
								<?php if( have_rows('products_category', 'options') ): ?>
				                    <div class="section-title text-center mb-50">
				                    	<?php while( have_rows('products_category', 'options') ): the_row(); ?>
						                    <h2><?php the_sub_field('title'); ?></h2>
			            					<p><?php the_sub_field('description'); ?></p>
						                <?php endwhile; ?>
					                </div>
				                <?php endif; ?>

			                    <div class="featured-pro-active border-hover-effect owl-carousel">
							        <?php while ($wp_query_other->have_posts()) {
			                            $wp_query_other-> the_post();
			                            //load file tương ứng với post format
			                            get_template_part('woocommerce/product-box/product-box', '');
			                        } ?>    
			                    </div>
			                </div>
		                </article>
			        <?php } else {
			            //get_template_part('template-parts/content', 'none');
			        }
			        // reset post data
			        wp_reset_postdata();
			    ?>
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