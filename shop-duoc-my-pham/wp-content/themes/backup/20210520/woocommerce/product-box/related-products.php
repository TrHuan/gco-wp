<article class="lth-products">
    <div class="container">               
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="products-box">
                    <?php
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');

                        if ($title || $description) {
                    ?>
                        <div class="title-box">
                            <?php if ($title) { ?>
                                <h3 class="title"><?php echo $title; ?></h3>
                            <?php }?>
                            <?php if ($description) { ?>
                                <p><?php echo $description; ?></p>
                            <?php }?>
                        </div>
                    <?php } ?>

                    <?php
                        $products = get_sub_field('products');
                        if( $products ):
                    ?>
                        <div class="content-box">
                            <div class="slick-slider slick-related-products-4">
                                <?php foreach( $products as $post ): 
                                    setup_postdata($post); ?>

                                    <?php get_template_part('woocommerce/product-box/product-box', ''); ?>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php 
                        wp_reset_postdata();
                        endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</article>