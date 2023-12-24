<?php /* Template Name: Template Home */

get_header();?>
    <div id="main">
        <?php get_template_part('template-parts/tempalte-post-update');?>
        <section class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-xs-12">
                        <div class="flw news-posts">
                            <div class="row">
                                <div class="col-lg-8 col-sm-8 col-xs-12">
                                    <ul class="left">
                                        <?php
                                        $tin_hot = ot_get_option('tin_hot');
                                        if(!empty($tin_hot)) $tin_hot = $tin_hot;
                                        else $tin_hot = 1;
                                        $args = array(
                                            'showposts' => 4,
                                            'cat' => $tin_hot,
                                        );
                                        $i=1;
                                        $vonglap = new WP_Query($args);
                                        while($vonglap->have_posts()) : $vonglap->the_post();
                                            if($i==1){?>
                                                <li>
                                                    <a class="thumbnail" href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                        <?php the_post_thumbnail('thumb_545x280', array('alt'=>get_the_title()));?>
                                                    </a>
                                                    <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                        <?php the_title();?>
                                                    </a>
                                                    <p><?php echo eweb_truncate_description('245');?></p>
                                                </li>
                                            <?php }else{?>
                                                <li>
                                                    <a class="thumbnail" href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                        <?php the_post_thumbnail('thumb_180x130', array('alt'=>get_the_title()));?>
                                                    </a>
                                                    <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                        <?php the_title();?>
                                                    </a>
                                                </li>
                                            <?php }
                                        $i++;endwhile; wp_reset_query();?>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-sm-4 hidden-xs">
                                    <ul class="right">
                                        <?php
                                        $args = array(
                                            'showposts' => 8,
                                            'cat' => $tin_hot,
                                            'offset' => 4,
                                            // 'orderby' => 'date',
                                            // 'meta_query' => array(
                                            //     array(
                                            //         'key' => 'is_money_post',
                                            //         'value' => 'yes',
                                            //         'compare' => 'LIKE'
                                            //     )
                                            // )
                                        );
                                        $vonglap = new WP_Query($args);
                                        while($vonglap->have_posts()) : $vonglap->the_post();
                                            $class = array('thumb-left');
                                            ?>
                                            <li <?php post_class($class);?>>
                                                <a class="thumbnail" href="<?php the_permalink();?>" title="<?php the_title();?>">
                                                    <?php the_post_thumbnail('thumb_75x60', array('alt'=>get_the_title()));?>
                                                </a>
                                                <a class="bold" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                                            </li>
                                        <?php endwhile; wp_reset_query();?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <?php if ( ! dynamic_sidebar( 'widget-top-home' ) ) :
                        endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php if ( ! dynamic_sidebar( 'widget-middle-home' ) ) :
                        endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="main-content">
                        <div class="col-md-9 col-sm-12 col-xs-12 main-left">
                            <div class="row">
                                <div class="col-lg-8 col-sm-8 col-xs-12 posts-left">
                                    <?php if ( ! dynamic_sidebar( 'content-home' ) ) :
                                    endif;?>
                                </div>
                                <div class="col-lg-4 col-sm-4 hidden-xs posts-right">
                                    <?php get_sidebar();?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 hidden-sm hidden-xs main-right">
                            <?php if ( ! dynamic_sidebar( 'sidebar_2' ) ) :
                            endif;?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php if ( ! dynamic_sidebar( 'widget-bottom-home' ) ) :
                        endif;?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php get_footer();?>