
<?php if( have_rows('slidershow') ): ?> 
    <section class="slider-l">
        <?php get_template_part('templates/addons/slidershow', ''); ?>            
    </section>
<?php endif; ?>

<?php if( have_rows('products') ): ?> 
    <section class="wel">
        <?php get_template_part('templates/addons/products-tab', ''); ?> 
    </section>
<?php endif; ?>

<?php if( have_rows('banner') ): ?> 
    <section class="banner">
        <div class="container">
            <div class="row no-gutters">
                <?php while( have_rows('banner') ): the_row(); ?>
                    <?php
                        $banner_1 = get_sub_field('banner_1');
                        $btn_url_1 = $banner_1['link'];
                        if( $btn_url_1 ) {
                            $url_btn_1 = $btn_url_1['url'];
                            $btn_title_1 = $btn_url_1['title'];
                            $btn_target_1 = $btn_url_1['target'] ? $btn_url_1['target'] : '_self';
                        }
                        $banner_2 = get_sub_field('banner_2');
                        $btn_url_2 = $banner_2['link'];
                        if( $btn_url_2 ) {
                            $url_btn_2 = $btn_url_2['url'];
                            $btn_title_2 = $btn_url_2['title'];
                            $btn_target_2 = $btn_url_2['target'] ? $btn_url_2['target'] : '_self';
                        }
                        $banner_3 = get_sub_field('banner_3');
                        $btn_url_3 = $banner_3['link'];
                        if( $btn_url_3 ) {
                            $url_btn_3 = $btn_url_3['url'];
                            $btn_title_3 = $btn_url_3['title'];
                            $btn_target_3 = $btn_url_3['target'] ? $btn_url_3['target'] : '_self';
                        }
                    ?>
                    <div class="col-sm-6">
                        <a href="<?php echo $url_btn_1; ?>" target="<?php echo $btn_target_1; ?>" title="" class="link-ef">
                            <img class="w-100" src="<?php echo $banner_1['image']; ?>" title="" alt="<?php echo $btn_title_1; ?>">
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <a href="<?php echo $url_btn_2; ?>" target="<?php echo $btn_target_2; ?>" title="" class="link-ef">
                                    <img class="w-100" src="<?php echo $banner_2['image']; ?>" title="" alt="<?php echo $btn_title_2; ?>">
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="<?php echo $url_btn_3; ?>" target="<?php echo $btn_target_3; ?>" title="" class="link-ef">
                                    <img class="w-100" src="<?php echo $banner_3['image']; ?>" title="" alt="<?php echo $btn_title_3; ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if( have_rows('products_2') ): ?>
    <section class="b3 allpro">
        <?php get_template_part('templates/addons/products-tab', '2'); ?> 
    </section>
<?php endif; ?>

<?php if( have_rows('blogs') ): ?>  
    <section class="blog">
        <div class="container">
            <?php get_template_part('templates/addons/blogs', ''); ?>
        </div>
    </section>    
<?php endif; ?>

