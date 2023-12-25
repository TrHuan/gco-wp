<section class="slider">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-sm-9">
                <div class="slider-posts-news">
                    <div class="title-posts-news">Mới cập nhật</div>
                    <div class="append_recent">
                        <div id="owl-slider" class="owl-carousel">
                            <?php
                            $args = array(
                                'showposts' => 15,
                                'orderby' => 'date'
                            );
                            $vonglap = new WP_Query($args);
                            while($vonglap->have_posts()) : $vonglap->the_post();
                            ?>
                            <div class="item">
                                <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                                <!-- <div class="date" data-time="<?php the_time('F j, Y'); ?>">Cập nhật <?php the_time('g:i a'); ?> <?php echo get_the_date('d-m-Y',$post->ID); ?></div> -->
                            </div>
                            <?php endwhile; wp_reset_query();?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3">
                <?php get_search_form();?>
            </div>
        </div>
    </div>
</section>