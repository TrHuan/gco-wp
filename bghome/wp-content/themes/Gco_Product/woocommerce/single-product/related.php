<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

    <section class="related products">

    <h2 class="tit-section-carousel"><?php echo __( 'Related products', 'woocommerce' );?></h2>
    <div id="relatedproduct-carousel" class="owl-carousel owl-theme">
    <?php foreach ( $related_products as $related_product ) : ?>
        <?php
        $post_object = get_post( $related_product->get_id() );
        setup_postdata( $GLOBALS['post'] =& $post_object );
    ?>
    <div class="items-product">
        <div class="box-product">
             <div class="img-product">
                 <a href="<?php the_permalink() ;?>"> 
                     <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
                 </a>
                 <div class="details-product">
                    <?php global $product;
                        echo sprintf( '<a href="%s" title="Add to cart" data-quantity="1" class="%s btn-addtocart" %s><i class="fal fa-shopping-cart"></i> '.__( 'Cart', 'woocommerce' ).'</a>',
                            esc_url( $product->add_to_cart_url() ),
                            esc_attr( implode( ' ', array_filter( array(
                                'button', 'product_type_' . $product->get_type(),
                                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                                $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                            ) ) ) ),
                            wc_implode_html_attributes( array(
                                'data-product_id'  => $product->get_id(),
                                'data-product_sku' => $product->get_sku(),
                                'aria-label'       => $product->add_to_cart_description(),
                                'rel'              => 'nofollow',
                            ) ),
                            esc_html( $product->add_to_cart_text() )
                        );
                      ?>
                </div>
                <?php if ( $product->is_on_sale() ) : ?>
                    <div class="box-sale_percentage">
                        <?php echo sale_badge_percentage();?>
                    </div>
                <?php endif;?>
             </div>
             <div class="info-product">
                <a class="name-product" href="<?php the_permalink() ;?>" title=""><?php the_title() ;?></a>
                <p class="sku-product">Mã sản phẩm: <?php global $product;echo $product->get_sku();?></p>
                <p class="price-product"><span><?php global $product;echo $product->get_price_html(); ?></span></p>
             </div>
        </div> 
    </div> 

<?php endforeach; ?>
</div>

</section>
<?php
endif;

wp_reset_postdata();
