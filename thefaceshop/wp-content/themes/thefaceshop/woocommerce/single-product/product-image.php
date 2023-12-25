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

<?php
	global $product;
?>

<div class="main-product-thumbnail">
    <div class="tab-content">
    	<?php echo lth_custom_imgs_single_product('full', 500, 500); ?>
    </div>

    <div class="product-thumbnail">
        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
        	<?php echo lth_custom_imgs_single_product_2('full', 150, 150); ?>
        </div>
    </div>
</div>