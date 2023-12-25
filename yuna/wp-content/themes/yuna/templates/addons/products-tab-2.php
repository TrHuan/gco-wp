<?php while( have_rows('products_2') ): the_row(); ?>
<div class="container">
    <h3 class="f1 text-center s18 t2 pb-2"><?php the_sub_field('title'); ?></h3>
    <h2 class="s24 bold t1 text-uppercase text-center pb-4"><?php the_sub_field('description'); ?></h2>

    <?php $terms = get_sub_field('categories');
    if( $terms ): ?>
    <ul class="nav nav-pills justify-content-lg-center justify-content-start mb-4 beauty-tabs"role="tablist">
        <?php $i; foreach( $terms as $term ): $i++; ?>
        <li class="nav-item">
            <a class="<?php if ($i == 1) {echo 'active';}?>" data-toggle="pill" href="#b<?php echo $i; ?>">
                <?php echo esc_html( $term->name ); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

    <div class="tab-content">
        <?php $j; foreach( $terms as $term_2 ): $j++; ?>
        <div class="tab-pane fade <?php if ($j == 1) {echo 'show active';} ?>" id="b<?php echo $j; ?>">
            <div class="row allpro-row">
                <?php
                    $args = array(
                        'post_type'           => 'product',
                        'post_status'         => 'publish',
                        'orderby' => $orderby,
                        'order' => 'DESC',
                        'posts_per_page' => 6,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'term_id',
                                'terms'    => $term_2->term_id,
                            ),
                        ),
                    );
                    $tets = new WP_Query($args);
                    if ($tets->have_posts()) { ?>

                        <?php while ($tets->have_posts()) {
                            $tets-> the_post(); ?>
                            
                            <?php get_template_part('woocommerce/product-box/product-box', '2'); ?>
                        <?php } ?>
                        
                    <?php }
                    wp_reset_postdata();
                ?>                    
            </div>
            <div class="text-center mt-5">
                <a class="btn text-uppercase load-btn" title="" href="<?php echo esc_url( get_term_link( $term_2 ) ); ?>">
                    <?php echo esc_html__('Xem thêm'); ?>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>        
    <?php endif; ?>
</div>
<?php endwhile; ?>