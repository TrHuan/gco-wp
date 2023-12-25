<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product; ?>

<ul class="evaluate-star__prds mb-10s" style="width: 100%; display: flex; flex-wrap: wrap;">
    <li style="margin: 5px 15px 0 0;">
        <div class="rating-item">
            <p class="rating" style="display: inline-block; position: relative;">
                <?php echo $ave = do_shortcode('[site_reviews_summary hide="bars,if_empty,rating,summary" assigned_posts="$product->ID"]'); ?>
            </p>
        </div>
    </li>
    <li style="margin: 0;">
        <div class="number-evaluate__prds"><?php echo __('('.do_shortcode('[site_reviews_summary hide="bars,if_empty,stars,summary" assigned_posts="$product->ID"]').' đánh giá)') ?></div>
    </li>
</ul>

<ul class="evaluate-star__prds mb-10s d-none">
    <li>
        <div class="rating-item">
            <p class="rating" style="display: inline-block; position: relative;">
                <?php if ($ave = $product->get_average_rating()) : ?>
                    <span style="width: <?php echo $ave/5*100; ?>%; overflow: hidden; white-space: nowrap; display: inline-block; position: absolute; top: 0; left: 0;" class="active">
                        <span class="fa fa-star icon" style="color: #ffa103;"></span>
                        <span class="fa fa-star icon" style="color: #ffa103;"></span>
                        <span class="fa fa-star icon" style="color: #ffa103;"></span>
                        <span class="fa fa-star icon" style="color: #ffa103;"></span>
                        <span class="fa fa-star icon" style="color: #ffa103;"></span>
                    </span>
                <?php endif; ?>

                <span style="width: <?php echo 100; ?>%; overflow: hidden; white-space: nowrap; display: inline-block;">
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                </span>
            </p>
        </div>
    </li>
    <li>
        <p class="number-evaluate__prds"><?php echo __('('.$ave.' đánh giá)') ?></p>
    </li>
</ul>