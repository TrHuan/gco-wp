<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>

<?php if (!$product->get_price_html()) { ?>
    <div class="pro-ref">
        <?php $instock = get_post_meta( get_the_ID(), '_stock_status', true );
            if ($instock == 'instock') {
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
                echo __('Còn hàng');
            } else if ($instock == 'onbackorder') {
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
                echo __('Chờ hàng');
            } else {
                // echo __('<i class="fa fa-close" aria-hidden="true"></i>');
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
                echo __('Hết hàng');
            }
        ?>
    </div>
<?php } ?>

<div class="social-sharing mt-30">
    <ul class="d-flex">
        <li class="t-list">Chia sẻ:</li>
        <li>
            <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>" width="119" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </li>
        <li>
            <a class="twitter-share-button" href="https://twitter.com/intent/tweet?<?php the_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </li>
        <li>
            <a href="https://plus.google.com/share?url=<%= url %>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            <meta content="<%= title %>" property="og:title"/>
            <meta content="article" property="og:type"/>
            <meta content="<%= url %>" property="og:url"/>
            <meta content="<%= img  %>" property="og:image"/>
            <meta content="<%= desc %>" property="og:description"/>
        </li>
    </ul>
</div>