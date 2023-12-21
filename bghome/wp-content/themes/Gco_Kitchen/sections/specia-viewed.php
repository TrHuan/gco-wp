<?php global $vz_options;?>
<h2 class="tit-section-carousel"><?php echo __( 'Recently Viewed Products', 'woocommerce' );?></h2>
<?php 
global $woocommerce;
$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
$viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
?>
<?php 
$query_args = array(
'posts_per_page' => 10, // Hiển thị số lượng sản phẩm đã xem
'post_status'    => 'publish', 
'post_type'      => 'product', 
'post__in'       => $viewed_products, 
'orderby'        => 'rand');
$query_args['meta_query'] = array();
$query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
$viewed = new WP_Query($query_args);
if ( $viewed->have_posts() ) : ?>
    <div id="viewed_product-carousel" class="owl-carousel owl-theme">
        <?php while ( $viewed->have_posts() ) : $viewed->the_post();?>
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
		        <div class="box-sale_percentage">
		            <?php echo sale_badge_percentage();?>
		            <?php if( $product->is_featured() ) {echo '<span class="hot_sale_product">Hot</span>';}?>
		        </div>
             </div>
             <div class="info-product">
                <a class="name-product" href="<?php the_permalink() ;?>" title=""><?php the_title() ;?></a>
                <!-- <p class="stars-product">
	                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i>
	            </p> -->
                <p class="price-product"><span><?php global $product;echo $product->get_price_html(); ?></span></p>
             </div>
        </div>
        </div>
    <?php endwhile; ?>
</div>
<?php endif;wp_reset_postdata();?>