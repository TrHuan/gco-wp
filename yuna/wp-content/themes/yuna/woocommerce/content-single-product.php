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

<section class="pro">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6 col-md-6">
                <div class="magic-slider">
                    <div class="MagicSlideshow" data-options="autoplay: true; selectors: bottom; selectors-style: bullets;">
                        <?php echo lth_custom_imgs_single_product('full', 465, 465); ?>	
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-6 col-sm-6">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <h1 class="s24 py-2"><?php the_title(); ?></h1>

                    <div class="pdetail-like">
                        <img src="images/49.jpg" title="" alt="">
                    </div>
                </div>
                <ul class="list-unstyled d-flex align-items-center flex-wrap rate">
                    <li><i class="far fa-star"></i></li>
                    <li><i class="far fa-star"></i></li>
                    <li><i class="far fa-star"></i></li>
                    <li><i class="far fa-star"></i></li>
                    <li><i class="far fa-star"></i></li>
                </ul>
                <ul class="list-unstyled pdetail-info">
                    <li class=""><?php echo __('Mã sản phẩm:'); ?> <?php echo $product->get_sku(); ?></li>
                    (<li>Thương hiệu: <span class="t10">Maybelline</span></li>
                    <li>Dung tích: 180ml</li>)
                </ul>
                <p class="price">
	                <?php
						if ($product->get_price_html()) {
							echo $product->get_price_html();
						} else {
							echo '<span class="amount">';
							echo __('Giá: Liên hệ');
							echo '</span>';
						}
					?>
				</p>
                <div class="pdetail-r">
                    <?php the_excerpt(); ?>
                    <div class="pdetail-quan">
                        <form enctype="multipart/form-data" method="post" class="cart">
							<div class="quantity cart-plus-minus">
								<input type="number" size="4" class="input-text qty text cart-plus-minus-box" 
								title="SL" value="1" name="quantity" min="1" step="1">
							</div>
							<input type="hidden" value="<?php echo $vnid = the_ID(); ?>" name="add-to-cart">
							<button class="add-cart single_add_to_cart_button alt buynow btn-style btn detail-btn" type="submit">
								<!-- <i class="fas fa-shopping-cart"></i> -->
								<?php echo __('Thêm vào giỏ hàng'); ?>
							</button>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if( have_rows('products_like','option') ): ?>  
        <?php while( have_rows('products_like','option') ): the_row(); ?>
		    <div class="b3 pdetail-re">
		        <div class="container">
		            <div class="pwrap">
		                <h2 class="f1 s18 t2 text-center"><?php the_sub_field('title'); ?></h2>
		                <h3 class="bold s24 t1 text-uppercase text-center tit"><?php the_sub_field('title_2'); ?></h3>
		                
	                	<?php
                            $cates = [];
                            $i = 0;

                            $featured_posts = get_sub_field('products');
                            if( $featured_posts ){
                                foreach( $featured_posts as $featured_post ):
                                    $cates[$i] = $featured_post;
                                    $i++;
                                endforeach;
                            }

                            $args = array(
                                'post_type'           => 'product',
                                'post_status'         => 'publish',
                                // 'orderby' => $orderby,
                                // 'order' => 'DESC',
                                // 'posts_per_page' => 6,
                                // 'tax_query' => array(
                                //     array(
                                //         'taxonomy' => 'product_cat',
                                //         'field'    => 'term_id',
                                //         'terms'    => $term,
                                //     ),
                                // ),
                                'post__in' => $cates,
                            );
                            $tets = new WP_Query($args);
                            if ($tets->have_posts()) { ?>

                                <div class="pdetail-reslider">
                                    <?php while ($tets->have_posts()) {
                                        $tets-> the_post(); ?>
                                        
                                        <?php get_template_part('woocommerce/product-box/product-box', '3'); ?>
                                    <?php } ?>
                                </div>
                                
                            <?php }
                            wp_reset_postdata();
                        ?>
		            </div>
		        </div>
		    </div>
		<?php endwhile; ?>
    <?php endif; ?>

    <div class="pdetail">
        <div class="container">
            <ul class="nav nav-pills justify-content-start justify-content-lg-center s15 text-uppercase pdetail-tabs"role="tablist">
                <li class="nav-item">
                    <a class="active" data-toggle="pill" href="#sp1"><?php echo __('Mô tả sản phẩm'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="" data-toggle="pill" href="#sp2"><?php echo __('Đánh giá'); ?></a>
                </li>
            </ul>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="sp1">
                            <div class="pdetail-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sp2">
                            <h2 class="s24 py-4"><?php echo __('Bình luận'); ?></h2>
                            
                            <div class="pdetail-cm">
                                <div id="fb-root"></div>
								<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="Xr1oazwy"></script>
								<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="935" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>