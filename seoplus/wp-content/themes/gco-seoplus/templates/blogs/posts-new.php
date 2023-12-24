<article class="lth-blogs lth-blogs-highlights">
    <div class="container">               
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="posts-box">
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


                        <div class="content-box">
                            <div class="groups-box">
                                <?php
								
								global $global_post_ids;
								$global_post_ids = array();
								
                                $blog = new WP_Query(array(
								'cat' => 2,	
                                'post_type'=>'post',
                                'post_status'=>'publish',
                                'orderby' => 'Date',
                                'order' => 'DESC',
                                'posts_per_page'=> 7));
                                ?>
                                <?php $j=1;while ($blog->have_posts()) : $blog->the_post(); ?>
                                    <div class="item <?php if ($j == '1') { echo 'active'; } ?>">
                                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											
											<?php $global_post_ids[] = get_the_ID(); ?>
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="post-thumbnail">
                                                    <div class="image">
                                                        <a class="post-link" href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo lth_custom_img('full', 583, 328); ?>" alt="<?php the_title(); ?>">
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <div class="post-content"> 
                                                <div class="post-category">
                                                    <a class="post-link" href="<?php the_permalink(); ?>">
                                                        <?php echo __('Kiến thức'); ?>
                                                    </a>
                                                </div>

                                                <h4 class="post-title">
                                                    <a class="post-link" href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>           
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                <?php $j++;endwhile; wp_reset_query();?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</article>