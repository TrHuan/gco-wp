<?php global $product; ?>

<!-- Single Product Start Here -->
<div class="single-makali-product">
    <div class="pro-img">
        <a href="<?php the_permalink(); ?>" title="" class="">
            <img src="<?php echo lth_custom_img('full', 350, 424);?>" width="350" height="424" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="pro-content">
        <h4 class="pro-title">
            <a href="<?php the_permalink(); ?>" title="">
                <?php the_title(); ?>
            </a>
        </h4>
        <div class="price"><?php echo $product->get_price_html(); ?></div>
    </div>
</div>
<!-- Single Product End Here -->