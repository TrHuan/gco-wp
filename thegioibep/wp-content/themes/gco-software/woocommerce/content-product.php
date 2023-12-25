<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<?php
    if ( wp_is_mobile() ) { ?>        
        <div class="col-6">
            <?php $cat = get_queried_object();
                $category_style = get_field('category_style', $cat);
                // get_template_part('woocommerce/product-box/product-box', '3');
                if ($category_style == 'style_3') {
                    get_template_part('woocommerce/product-box/product-box', '4');
                } else {
                    get_template_part('woocommerce/product-box/product-box', '3');
                }
            ?>
        </div>
    <?php } else { ?>
        <?php $cat = get_queried_object();
            $category_style = get_field('category_style', $cat);
            if ($category_style == 'style_3') {
                get_template_part('woocommerce/product-box/desktop/product-box', '4');
            } else {
                get_template_part('woocommerce/product-box/desktop/product-box', '3');
            }
        ?>
    <?php }
?>