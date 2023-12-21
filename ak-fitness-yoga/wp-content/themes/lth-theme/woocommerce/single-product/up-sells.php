<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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

if ( $upsells ) : ?>

	<div class="products-upsells related-product white-bg ptb-80">
        <div class="container">
             <!-- Section Title Start -->
            <div class="section-title text-center mb-50">
                <h2><?php echo __('Sản phẩm liên quan'); ?></h2>
            </div>
            <!-- Section Title End -->
            <!-- Featured Product Activation Start -->
            <div class="featured-pro-active border-hover-effect owl-carousel">

				<?php foreach ( $upsells as $upsell ) : ?>

					<?php
					$post_object = get_post( $upsell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					get_template_part('woocommerce/product-box/product-box', 'style-01');
					?>

				<?php endforeach; ?>

            </div>
            <!-- Featured Product Activation End -->
        </div>
    </div>

	<?php
endif;

wp_reset_postdata();
