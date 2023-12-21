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
            	<article class="product-content-box vk-shop-detail__top vk-shop__box vk-shop__box--style-1 pt-4 pb-4">
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
						<h1 class="vk-page__title vk-page__title--shop-detail"><?php the_title(); ?></h1>
						 <div class="vk-shop-detail__meta">
                            <ul class="vk-list vk-list--inline vk-shop-detail__meta-list">
                                <li class="vk-list__item"><?php echo __('Thương hiệu:'); ?> <span class="vk-text--green-1"><?php the_field('trademark'); ?></span>
                                </li>
                                <li class="vk-list__item"><?php echo 'Mã hàng:'; ?> <?php echo $product->get_sku(); ?></li>
                            </ul>

                            <div class="_like">
                                <div id="fb-root"></div>
                                <script>(function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-like" data-href="<?php the_permalink(); ?>"
                                     data-layout="button" data-action="like" data-size="small" data-show-faces="true"
                                     data-share="true"></div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">
                            	<?php
                            		global $product;
                            		echo wc_display_product_attributes( $product );
                            	?>

                                <div class="vk-shop-detail__price vk-shop-item__price"><?php echo __('Giá bán:'); ?> <?php echo $product->get_price_html(); ?></div>

                                <div class="vk-shop-detail__button">
                                    <form enctype="multipart/form-data" method="post" class="cart">
										<div class="quantity d-none">
											<input type="number" size="4" class="input-text qty text" 
											title="SL" value="1" name="quantity" min="1" step="1">
										</div>
										<input type="hidden" value="<?php echo $vnid = the_ID(); ?>" name="add-to-cart">
										<button class="add-cart single_add_to_cart_button alt buynow vk-btn vk-btn--red-1 btn-block btn-buy-now" type="submit" data_link_cart="<?php echo wc_get_checkout_url(); ?>">
											<?php echo __('Mua ngay'); ?>
                                        	<span><?php echo __('Xem hàng rồi mua, không mua không sao'); ?></span>
										</button>
									</form>

                                    <form enctype="multipart/form-data" method="post" class="cart">
										<div class="quantity d-none">
											<input type="number" size="4" class="input-text qty text" 
											title="SL" value="1" name="quantity" min="1" step="1">
										</div>
										<input type="hidden" value="<?php echo $vnid = the_ID(); ?>" name="add-to-cart">
										<button class="add-cart single_add_to_cart_button alt buynow vk-btn vk-btn--green-1 btn-block" type="submit">
											<?php echo __('Thêm vào giỏ hàng'); ?>
                                        	<span><?php echo __('Áp dụng khi mua nhiều sản phẩm'); ?></span>
										</button>
									</form>

                                </div>

                                <div class="pt-4">
                                	<?php
                                		$see_more = get_field('see_more');
										if( $see_more ): 
										    $see_more_url = $see_more['url'];
										    $see_more_title = $see_more['title'];
										    $see_more_target = $see_more['target'] ? $see_more['target'] : '_self';
										endif;
                                	?>
                                    <?php echo __('Xem thêm'); ?> <a href="<?php echo esc_url( $see_more_url ); ?>" class="vk-text--blue-1" target="<?php echo esc_attr( $see_more_target ); ?>"><?php echo esc_html( $see_more_title ); ?></a>
                                </div>
                            </div>
                            <div class="col-lg-5 pt-5 pt-lg-0">
                            	<?php
                        			if( have_rows('gr_guaranteed') ):
                        				while( have_rows('gr_guaranteed') ) : the_row();
                        		?>
                            		<h2 class="vk-shop-detail__title-sub"><?php the_sub_field('title'); ?></h2>

                            		<?php
                            			if( have_rows('guaranteed') ):
                            				while( have_rows('guaranteed') ) : the_row();
                            		?>
                            			<div class="vk-ser-item">
		                                    <div class="vk-img vk-img--mw-100">
		                                        <img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('text'); ?>" width="50" height="50">
		                                    </div>
		                                    <div class="vk-ser-item__brief">
		                                        <h3 class="vk-ser-item__title"><?php the_sub_field('text'); ?></h3>
		                                    </div>
		                                </div>
                            		<?php
                            				endwhile;
                            			endif;
                            		endwhile;
                            	endif; ?>
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
				</article>

				<div class="vk-shop-detail__bot vk-shop__box vk-shop__box--style-1">
	                <div class="row justify-content-center">
	                    <div class="col-lg-10">
	                        <div class="vk-shop-detail__content">
	                            <?php the_content(); ?>
	                        </div>
	                    </div>
	                </div>
	            </div>

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
			        <div class="vk-shop-detail__bot vk-shop__box vk-shop__box--style-1">
		                <h2 class="vk-shop-detail__title-sub-1 text-center"><?php echo __('Có thể bạn quan tâm'); ?></h2>

		                <div class="row vk-shop__list vk-slider--style-1" data-slider="relate">
		                    <?php while ($tets->have_posts()) {
			                    $tets-> the_post(); ?>
		                        <div class="_item">
		                        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
		                        </div>
			                <?php } ?>
		                </div>
		            </div>          
			    <?php } wp_reset_postdata(); ?>

			    <?php if (is_active_sidebar('sidebar_blocks_categories')) {
		            dynamic_sidebar('sidebar_blocks_categories');
		        } ?>
			</div>
		</div>
	</div>
</section>
