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
    <li style="margin: 5px 0 0 0;">
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
    </li>
    <li style="margin: 0;">
        <div class="number-evaluate__prds">
            <?php
            $rating_count = $product->get_rating_count();
            $review_count = $product->get_review_count();
            $average      = $product->get_average_rating();
            if ( $rating_count > 0 ) { ?>
                <div class="woocommerce-product-rating">
                    <?php if ( comments_open() ) : ?>
                        <p class="woocommerce-review-link" rel="nofollow"> &nbsp; | (<?php printf( _n( '%s đánh giá', '%s đánh giá', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</p>
                    <?php endif ?>
                </div>
                <?php } else { ?>
                    <div class="woocommerce-product-rating">
                        
                        <p class="woocommerce-review-link" rel="nofollow"> &nbsp; | (0 đánh giá)</p>
                        
                    </div>
                <?php } ?>
        </div>
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
                    <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
                    <i class="fa fa-star-o" aria-hidden="true" style="color: #ffa103;"></i>
                </span>
            </p>
        </div>
    </li>
    <li>
        <div class="number-evaluate__prds">
            <div class="number-evaluate__prds">
                <?php
                $rating_count = $product->get_rating_count();
                $review_count = $product->get_review_count();
                $average      = $product->get_average_rating();
                if ( $rating_count > 0 ) { ?>
                    <div class="woocommerce-product-rating">
                        <?php if ( comments_open() ) : ?>
                            <p class="woocommerce-review-link" rel="nofollow"> &nbsp; | (<?php printf( _n( '%s đánh giá', '%s đánh giá', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</p>
                        <?php endif ?>
                    </div>
                <?php } else { ?>
                    <div class="woocommerce-product-rating">
                        
                        <p class="woocommerce-review-link" rel="nofollow"> &nbsp; | (0 đánh giá)</p>
                        
                    </div>
                <?php } ?>
            </div>
        </div>
    </li>
    
</ul>