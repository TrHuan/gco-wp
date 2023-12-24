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

                    <?php
                        $blogs = get_sub_field('posts');
                        if( $blogs ):
                    ?>
                        <div class="content-box">
                            <div class="groups-box">
                                <?php $j; foreach( $blogs as $post ):  $j++;
                                    setup_postdata($post); ?>

                                    <div class="item <?php if ($j == '1') { echo 'active'; } ?>">
                                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php 
                        wp_reset_postdata();
                        else:
                            get_template_part('template-parts/content', 'none');
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</article>