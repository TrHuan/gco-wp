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
						<h1 class="product_title entry-title"><?php the_title(); ?></h1>

						<div class="post-price">

							<?php
								$regular_price = $product->get_regular_price();
								$sale_price = $product->get_sale_price();
							?>

							<?php if ($sale_price) { 
								 $sale = ($regular_price - $sale_price) * 100 / $regular_price;
							?>
								<span class="on-sale">- <?php echo round($sale) . '%'; ?> <?php echo __('SALE'); ?></span>
							<?php } ?>

							<?php echo $product->get_price_html(); ?>

						</div>	

						<div class="post-meta post_thuong_hieu">
							<ul>
								<?php if (get_field('thuong_hieu')) { ?>
									<li><span><?php echo __('Thương hiệu: '); ?></span><?php echo get_field('thuong_hieu'); ?></li>
								<?php } ?>
							</ul>
						</div>

						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>

						<?php if( have_rows('qua_tang') ) { ?>
							<div class="post-gift">
								<label><?php echo __('Quà tặng'); ?></label>

								<ul>
									<?php
									    while( have_rows('qua_tang') ) : the_row();
									        $text = get_sub_field('text'); ?>

									        <li><img src="<?php echo ASSETS_URI; ?>/images/icon-10.png" alt="Icon"> <?php echo $text; ?></li>
									    <?php endwhile;						
									?>
								</ul>
							</div>
						<?php } ?>

						<div class="post-meta">
							<ul>
								<?php if (get_field('chi_tiet')) { ?>
									<li><span><?php echo __('Loại: '); ?></span><?php echo get_field('chi_tiet'); ?></li>
								<?php } ?>

								<li class="tags">
									<span><?php echo __('Tags: '); ?></span>
									<?php $tags = wp_get_post_terms( get_the_id(), 'product_tag' );
									foreach($tags as $tag) { ?>
										<a href="<?php get_term_link( $tag, 'product_tag' ); ?>" title="">
											<?php echo $tag->name; ?>
										</a>
									<?php } ?>
								</li>
							</ul>
						</div>

						<div class="post-btn">
							<form enctype="multipart/form-data" method="post" class="cart">
								<div class="quantity">
									<label><?php echo __('Số lượng:'); ?></label>
									<input type="number" size="4" class="input-text qty text" 
									title="SL" value="1" name="quantity" min="1" step="1">
								</div>
								<input type="hidden" value="<?php echo $vnid = the_ID(); ?>" name="add-to-cart">
								<button class="add-cart single_add_to_cart_button alt" type="submit">
									<img src="<?php echo ASSETS_URI; ?>/images/icon-11.png" alt="Icon">
									<?php echo __('Thêm vào giỏ hàng'); ?>
								</button>

								<a href="?add-to-cart=10021165" rel="nofollow" data-product_id="10021165" data-product_sku="" class="btn btn-popup btn-buynow" data_popup="buynow">Mua ngay</a>

								<?php //echo apply_filters( 'woocommerce_loop_add_to_cart_link',
								// sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
								//      class="%s btn ajax_add_to_cart btn-popup btn-buynow" data_popup="buynow">Mua ngay</a>',
								// esc_url( $product->add_to_cart_url() ),
								// esc_attr( $product->id ),
								// esc_attr( $product->get_sku() ),
								// $product->is_purchasable() ? 'add_to_cart_button' : '',
								// esc_attr( $product->product_type ),
								// esc_html( $product->add_to_cart_text() ) ), $product ); ?>
							</form>
						</div>

						<div class="post-hotline">
							<div class="hotline-icon">
                                <img src="<?php echo ASSETS_URI . '/images/icon-01.png' ?>" alt="Icon" width="27" height="30">
                            </div>
                            <div class="hotline-content">
                                <span><?php echo __('TỔNG ĐÀI tư vấn miễn phí khách hàng'); ?></span>
                                <span class="number"><?php the_field('hotline', 'option'); ?> <span><?php the_field('open', 'option'); ?></span></span>
                            </div>
						</div>
					</div>
				</article>

				<article class="lth-product-tabs"> 
					<div class="product-tab-box">
					    <ul class="nav nav-tabs tab-menu">
					        <li class="active">
					        	<a href="#" class="title" data_tab="tab-1">
					        		<?php echo __('Mô tả sản phẩm') ?>
					        	</a>
					        </li>
					        <li>
					        	<a href="#tab-2" class="title" data_tab="tab-1">
					        		<?php echo __('Thông số kỹ thuật') ?>
					        	</a>
					        </li>
					        <li class="">
					        	<a href="#" class="title" data_tab="tab-3">
					        		<?php echo __('Hình ảnh thực tế') ?>
					        	</a>
					        </li>
					        <li class="">
					        	<a href="#" class="title" data_tab="tab-4">
					        		<?php echo __('Hướng dẫn lắp đặt') ?>
					        	</a>
					        </li>
					    </ul>
					    <div class="tab-content">
					        <div class="tab-pane active" id="tab-1">
					            <div class="product-details-content">
					                <div class="desc-content-box">
					                    <?php the_content(); ?>
					                </div>

					            </div>    
					        <!-- </div>
					        <div class="tab-pane" id="tab-2"> -->
					            <div class="product-info-content" id="tab-2">
					                <?php the_field('thong_so_ky_thuat'); ?>
					            </div>    

					            <div class="sales-policy-content">
					                <?php the_field('chinh_sach_ban_hang'); ?>
					            </div>  
					        </div>
					        <div class="tab-pane" id="tab-3">	
								<div class="slick-slider slick-product-images-for">
									<?php $images = get_field('hinh_anh_thuc_te');
									if( $images ): ?>
									    <div class="ul">
									        <?php foreach( $images as $image ): ?>
									            <div class="item">
									                <img src="<?php echo esc_url($image); ?>" alt="Image" />
									            </div>
									        <?php endforeach; ?>
									    </div>
									<?php endif; ?>
								</div>

								<div class="slick-slider slick-product-images-nav">
									<?php $images = get_field('hinh_anh_thuc_te');
									if( $images ): ?>
									    <div class="ul">
									        <?php foreach( $images as $image ): ?>
									            <div class="item">
									                <img src="<?php echo esc_url($image); ?>" alt="Image" />
									            </div>
									        <?php endforeach; ?>
									    </div>
									<?php endif; ?>
								</div>
					        </div>
					        <div class="tab-pane" id="tab-4">	
								<?php the_field('huong_dan_lap_dat'); ?>
					        </div>  

				            <div class="entry-button">
    							<?php echo __('Khảo sát và lắp đặt miễn phí'); ?>
    							<a href="#" class="btn btn-popup" title="" data_popup="registration"><?php echo __('Đăng kí ngay'); ?></a>
    						</div>
					    </div>      
					</div>
				</article>

				<?php
					$id = get_queried_object_id();

					$wpseo_primary_term = new WPSEO_Primary_Term( 'product_cat', $id );
					$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
					$term = get_term( $wpseo_primary_term );

				    $args = [
				        'post_type' => 'product',
				        'post_status' => 'publish',
				        'posts_per_page' => 6,
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
			        <article class="lth-products lth-products-involve">
			        	<div class="entry-header">
		                	<h2 class="title"><?php echo __('Sản phẩm liên quan'); ?></h2>
		                </div>

		                <div class="products" style="max-width: 100%;">
		                	<div class="slick-slider slick-products-2">
			                    <?php while ($tets->have_posts()) {
				                    $tets-> the_post(); ?>
			                        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
				                <?php } ?>
				            </div>
		                </div>
		            </article>          
			    <?php } wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>

<div class="lth-popups buynow">
    <div class="popups-box">
        <div class="popups-content">
            <a href="#" class="close-box"><i class="fal fa-times icon"></i></a>

            <div class="popup-content">
                <div class="content">
                    <div class="entry-header">
                        <h2 class="title"><?php echo __('Đặt hàng'); ?></h2>
                    </div>

                    <div class="entry-content">

                        <article class="product-content-box">
			            	<div class="product-images">
								<div class="slick-slider slick-product-images-for">
							    	<img src="<?php echo lth_custom_img('full', 324, 174);?>" width="324" height="174" alt="<?php the_title(); ?>">
							    </div>
							</div>

							<div class="summary entry-summary">
								<h2 class="product_title entry-title" data_title="<?php the_title(); ?>"><?php the_title(); ?>

								<?php
									if ($product->get_sale_price()) {
										$pr = $product->get_sale_price();
									} else {
										$pr = $product->get_regular_price();
									}
								?>

								<div class="post-price" data_price="<?php echo $pr; ?>">
									<?php echo $product->get_price_html(); ?>
								</div>	</h2>

								<?php if( have_rows('qua_tang') ) { ?>
									<div class="post-gift">
										<label><?php echo __('Quà tặng'); ?></label>

										<ul data_gift="<?php while( have_rows('qua_tang') ) : the_row(); echo get_sub_field('text').', '; endwhile; ?>">
											<?php
											    while( have_rows('qua_tang') ) : the_row();
											        $text = get_sub_field('text'); ?>

											        <li><img src="<?php echo ASSETS_URI; ?>/images/icon-10.png" alt="Icon"> <?php echo $text; ?></li>
											    <?php endwhile;						
											?>
										</ul>
									</div>
								<?php } ?>

								<div class="post-btn">
									<form enctype="multipart/form-data" method="post" class="cart">
										<div class="quantity">
											<label><?php echo __('Số lượng:'); ?></label>
											<input id="qtynumber" type="number" size="4" class="input-text qty text" 
											title="SL" value="1" name="quantity" min="1" step="1">
											<span id="datanumber" class="data_val d-none"></span>
										</div>
										<input type="hidden" value="<?php echo $vnid = the_ID(); ?>" name="add-to-cart">
									</form>
								</div>
							</div>

							<div class="post-price post-tong-price">
								<label><?php echo __('Tổng tiền') ?></label>

								<?php echo $product->get_price_html(); ?>
							</div>
						</article>

                    	<h3><?php echo __('Thông tin nhận hàng'); ?></h3>
                        <?php echo do_shortcode('[contact-form-7 id="10022078" title="Thông tin nhận hàng"]'); ?>	

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>