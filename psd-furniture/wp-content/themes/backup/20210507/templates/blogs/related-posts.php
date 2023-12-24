<article class="lth-blogs">
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
                            <div class="slick-slider slick-posts slick-related-posts-4">
                                <?php foreach( $blogs as $post ): 
                                    setup_postdata($post); ?>

                                    <div class="item">
                                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="post-thumbnail">
                                                    <div class="image">
                                                        <a class="post-link" href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo lth_custom_img('full', 480, 320); ?>" alt="<?php the_title(); ?>">
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <div class="post-content"> 
                                                <h4 class="post-title">
                                                    <a class="post-link" href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>           
                                                </h4>

                                                <?php
                                                    $categories = get_the_category();
                                                    $separator = ",";
                                                    $output = '';
                                                    if ($categories) {
                                                        foreach ($categories as $key => $category) {
                                                            $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
                                                        }
                                                    }
                                                ?>
                                                <ul class="post-meta">
                                                    <li class="post-date">
                                                        <i class="fal fa-calendar-alt icon icon-date" aria-hidden="true"></i>
                                                        <span class="post-j"><?php the_time('j'); ?>/<?php the_time('m'); ?>/<?php the_time('Y'); ?></span>
                                                    </li>
                                                    <li class="post-author">
                                                        <span><?php echo __('Đăng bởi: '); ?></span> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                                    </li>
                                                    <li class="post-in">
                                                        <span><?php echo __('Danh mục: '); ?></span> <?php echo trim($output, $separator); ?>
                                                    </li>
                                                </ul>
                                                
                                                <?php if (get_field('excerpt')) { ?>
                                                    <div class="post-excerpt"><?php the_field('excerpt'); ?></div>
                                                <?php } ?>

                                                <a class="btn btn-read-more" href="<?php the_permalink(); ?>">
                                                    <span><?php echo __('Đọc tiếp'); ?></span>
                                                </a>
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