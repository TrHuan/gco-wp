<?php while( have_rows('products') ): the_row(); ?>
    <div class="container">
        <h2 class="f1 t2 s18 text-center"><?php the_sub_field('title'); ?></h2>
        <h3 class="bold s24 t1 text-uppercase text-center pb-3 wel-tit"><?php the_sub_field('title_2'); ?></h3>
        <div class="lg-w-60 text-center m-auto wel-sum"><?php the_sub_field('description'); ?></div>

        <?php if( have_rows('product') ): ?>
        <ul class="nav nav-pills justify-content-start justify-content-lg-center wel-tabs"role="tablist">
            <?php $i; while( have_rows('product') ): the_row(); $i++; ?>
                <li class="nav-item">
                    <a class="<?php if ($i == 1) {echo 'active';} ?>" data-toggle="pill" href="#sp<?php echo $i; ?>"><img src="<?php the_sub_field('logo'); ?>" alt=""></a>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>

    <?php if( have_rows('product') ): ?>
    <div class="container-flush">
        <div class="tab-content">
            <?php $j; while( have_rows('product') ): the_row(); $j++; ?>
            <div class="tab-pane fade <?php if ($j == 1) {echo 'show active';} ?>" id="sp<?php echo $j; ?>">
                <div class="row no-gutters">
                    <?php
                    $countdown_time = get_sub_field('countdown_time');
                    if ($countdown_time) :
                    ?>
                    <div class="col-md-6" style="background: url(<?php echo ASSETS_URI; ?>/images/1.jpg) no-repeat center center; background-size: cover;">
                        <div class="wel-l">
                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                <div class="sale-slider-item-info">
                                    <h2 class="f1 t2 s18 pb-2 text-center"><?php echo $countdown_time['title']; ?></h2>
                                    <h3 class="bold s30 t1 text-center text-uppercase"><?php echo $countdown_time['description']; ?></h3>
                                    <ul class="medium s60 t3 list-unstyled d-flex flex-wrap align-items-center justify-content-center text-uppercase slider-count">
                                        <li class="d-inline-block b2 count-date"><strong class=""><?php echo $countdown_time['date']; ?></strong></li>
                                        <li class="d-inline-block b2 count-hours"><strong class=""><?php echo $countdown_time['hours']; ?></strong></li>
                                        <li class="d-inline-block b2 count-minute"><strong class=""><?php echo $countdown_time['minute']; ?></strong></li>
                                        <li class="d-inline-block b2 count-second"><strong class=""><?php echo $countdown_time['second']; ?></strong></li>
                                    </ul>
                                    
                                    <div class="text-center">
                                        <?php
                                        $btn_url = $countdown_time['button'];
                                        if( $btn_url ) {
                                            $url_btn = $btn_url['url'];
                                            $btn_title = $btn_url['title'];
                                            $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
                                        }
                                        ?>
                                        <a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>" title="" class="btn detail-btn">
                                            <?php echo $btn_title; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-md-6 b3">
                        <div class="wel-r">                                    
                            <?php
                                $cates = [];
                                $i = 0;

                                $featured_posts = get_sub_field('category');
                                if( $featured_posts ){
                                    foreach( $featured_posts as $featured_post ):
                                        $cates[$i] = $featured_post;
                                        $i++;
                                    endforeach;
                                }

                                $args = array(
                                    'post_type'           => 'product',
                                    'post_status'         => 'publish',
                                    // 'orderby' => $orderby,
                                    // 'order' => 'DESC',
                                    // 'posts_per_page' => 6,
                                    // 'tax_query' => array(
                                    //     array(
                                    //         'taxonomy' => 'product_cat',
                                    //         'field'    => 'term_id',
                                    //         'terms'    => $term,
                                    //     ),
                                    // ),
                                    'post__in' => $cates,
                                );
                                $tets = new WP_Query($args);
                                if ($tets->have_posts()) { ?>

                                    <div class="sale-slider">
                                        <?php while ($tets->have_posts()) {
                                            $tets-> the_post(); ?>
                                            
                                            <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                                        <?php } ?>
                                    </div>
                                    
                                <?php }
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
<?php endwhile; ?>