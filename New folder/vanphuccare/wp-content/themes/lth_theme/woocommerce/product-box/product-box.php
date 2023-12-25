<?php global $product;
$date_ceart =  get_the_date('Ymd');
$date = date('Ymd');
$new = $date - $date_ceart;

$regular_price = $product->get_regular_price();
$sale_price = $product->get_sale_price();

$dat_url = wc_get_cart_url(); ?>

<div class="item">
    <div class="content">
        <?php if (has_post_thumbnail()) { ?>
            <div class="content-image">
                <a href="<?php the_permalink(); ?>" title="Image" class="image">
                    <img src="<?php echo lth_custom_img('full', 180, 180);?>" width="180" height="180" alt="<?php the_title(); ?>">
                </a>    

                <?php if (get_field('donate')) { ?>
                    <span class="label-box"><?php the_field('donate'); ?></span>
                <?php }  elseif ($sale_price) { 
                    $sale = ($regular_price - $sale_price) * 100 / $regular_price;
                ?>
                    <span class="label-box label-sale"><?php echo round($sale) . '%'; ?></span>
                <?php } elseif ($new <= 3) { ?>
                    <span class="label-box label-new"><?php echo __('Mới'); ?></span>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="content-box">
            <h4 class="content-name">
                <a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
            </h4>

            <div class="content-prices">
                <p class="price"><?php echo $product->get_price_html(); ?></p>
            </div>

            <div class="content-button">
                <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
                     class="%s btn ajax_add_to_cart btn-add-to-cart">Thêm vào giỏ</a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( $product->id ),
                esc_attr( $product->get_sku() ),
                $product->is_purchasable() ? 'add_to_cart_button' : '',
                esc_attr( $product->product_type ),
                esc_html( $product->add_to_cart_text() ) ), $product ); ?>

                <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
                     class="%s btn ajax_add_to_cart btn-bynow" data_bynow="'.$dat_url.'">Mua ngay</a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( $product->id ),
                esc_attr( $product->get_sku() ),
                $product->is_purchasable() ? 'add_to_cart_button' : '',
                esc_attr( $product->product_type ),
                esc_html( $product->add_to_cart_text() ) ), $product ); ?>
            </div>
        </div>
    </div>
</div>