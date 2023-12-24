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

<section class="product-details-area fluid-padding-3 ptb-130">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="product-details product-gallery pr-40">
                    <div class="row">
                    	<?php echo lth_custom_imgs_single_product('full', 290, 368); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="product-details-content">
                    <h1><?php the_title(); ?></h1>
                    <div class="py-3 product-price">
                        <?php
						if ($product->get_price_html()) {
							echo $product->get_price_html();
						} else {
							echo '<span class="amount">';
							echo __('Giá: Liên hệ');
							echo '</span>';
						}
						?>
                    </div>
                    <div class="product-overview">
                        <h5 class="pd-sub-title"><?php echo __('Mô tả sản phẩm'); ?></h5>
                        <?php echo $product->get_short_description(); ?>
                    </div>
                    <div class="quickview-plus-minus">
                        <form enctype="multipart/form-data" method="post" class="cart">
							<div class="quantity cart-plus-minus">
								<input type="text" size="4" class="input-text qty text cart-plus-minus-box" 
								title="SL" value="1" name="quantity" min="1" step="1">
							</div>
							<input type="hidden" value="<?php echo $vnid = the_ID(); ?>" name="add-to-cart">
							<button class="add-cart single_add_to_cart_button alt buynow btn-style" type="submit">
								<?php echo __('Thêm vào giỏ hàng'); ?>
							</button>
						</form>
                    </div>
                    <div class="product-categories">
                        <h5 class="pd-sub-title"><?php echo __('Danh mục'); ?></h5>
                        <ul>
                        	<?php
						        $terms = get_the_terms( $post->ID, 'product_cat' );
					 
								if ( $terms && ! is_wp_error( $terms ) ) :
								 
								    foreach ( $terms as $term ) { ?>
								    	<li>
								        	<a href="<?php echo get_term_link($term, 'category'); ?>" title="<?php echo $cat = $term->name;; ?>"><?php echo $cat = $term->name;; ?></a>
								        </li>
								    <?php }

								endif; 
							?>
                        </ul>
                    </div>
                    <div class="product-share">
                        <h5 class="pd-sub-title"><?php echo __('Chia sẻ:'); ?></h5>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="icofont icofont-social-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/share?text=&url=<?php the_permalink(); ?>"><i class="icofont icofont-social-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.pinterest.com/pin/create/button/?url=&media=&description=<?php the_permalink(); ?>"><i class="icofont icofont-social-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="module_content" style="padding: 0 5px;">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>