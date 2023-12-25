<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="pr-single-image">
    <?php
        global $product;
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();

        $date_ceart =  get_the_date('Ymd');
        $date = date('Ymd');
        $new = $date - $date_ceart;
    ?>

    <?php if ($new <= 3) { ?>
        <span class="sticker-new">new</span>
    <?php } ?>

    <?php if ($sale_price) { 
        $sale = ($regular_price - $sale_price) * 100 / $regular_price;
    ?>
        <span class="sticker-sale"><?php echo '-' . round($sale) . '%'; ?></span>
    <?php } ?>

    <div class="slick-slider slick-product-images-for">
        <?php echo lth_custom_imgs_single_product('full', 368, 466); ?>
    </div>

    <div class="slick-slider slick-product-images-nav">
        <?php echo lth_custom_imgs_single_product('full', 120, 145); ?>
    </div>
</div>