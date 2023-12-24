<article class="lth-blogs lth-blogs-highlights">
    <div class="container">               
        <div class="related_posts">
            <h3 class="title-relatedpost">Bài viết liên quan</h3>
            <!-- Hiển thị bài viết theo category -->
            <?php
            $categories = get_the_category($post->ID);
            if ($categories) 
            {
                $category_ids = array();
                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                $args=array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'showposts'=>6, // Số bài viết bạn muốn hiển thị.
                );
                $my_query = new wp_query($args);
                if( $my_query->have_posts() ) 
                {
                    echo '<div id="relatedpost-list" class="row">';
                    while ($my_query->have_posts())
                    {
                        $my_query->the_post();
                        ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 item-relatedpost">
                            <div class="box-relatedpost">
                                <div class="img-relatedpost">
                                    <a href="<?php the_permalink() ;?>"> 
                                        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium');?>" alt="<?php the_title() ;?>">
                                    </a>
                                </div>
                                <div class="info-relatedpost">
                                    <div class="cate-relatedpost"><?php the_category(); ?></div>
                                    <h3 class="name-relatedpost"><a href="<?php the_permalink() ;?>"><?php the_title() ;?></a></h3>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</article>