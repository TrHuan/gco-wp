<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package specia
 */

?>

<?php
	$hide_show_blog_meta = get_theme_mod('hide_show_blog_meta','on'); 
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 colums-product">
   <div class="box-product">
     <div class="img-product">
         <a href="<?php the_permalink() ;?>"> 
             <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
         </a>
         <div class="details-product">
          <?php global $product;
                echo sprintf( '<a href="%s" title="Add to cart" data-quantity="1" class="%s btn-addtocart" %s><i class="fal fa-shopping-cart"></i> Giỏ hàng</a>',
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
        <p class="stars-product">
      <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i>
  </p>
        <p class="price-product"><span><?php global $product;echo $product->get_price_html(); ?></span></p>
     </div>
</div>                              
</div>