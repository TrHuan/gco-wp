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
            <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
            <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
            <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
            <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
            <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
        </span>
    </p>
</div>

<div class="rating-item d-none">
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
            <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
            <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
            <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
            <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
            <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
        </span>
    </p>
</div>