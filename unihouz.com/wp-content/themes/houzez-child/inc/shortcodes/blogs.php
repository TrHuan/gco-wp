<!--  -->
<?php function insert_blog_shortcode() { ?>	
    <div class="">
        <div class="blog-shortcode">
            <?php
                $args = new WP_Query(array(
                    'post_type'=>'post',
                    'post_status'=>'publish',
                    'posts_per_page'=> 4
                ));
            ?>
            <?php $i=1; while ($args->have_posts()) : $args->the_post(); ?>
            <?php if($i==1){ ?>
                <div class="blog-firt">
                <div class="blog-image">
                        <a href="<?php the_permalink() ;?>" class="thumb">
                            <?php the_post_thumbnail("thumbnail",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="title">
                            <a href="<?php the_permalink() ;?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="desc">
                            <?php echo wp_trim_words( get_the_content(), 25, '.' ); ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="blog-second">
                    <div class="blog-items">
                        <div class="blog-content">
                            <h3 class="title">
                                <a href="<?php the_permalink() ;?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="desc">
                                <?php echo wp_trim_words( get_the_content(), 25, '.' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php $i++; endwhile ; wp_reset_query() ;?>
        </div>
    </div>
<?php
}
add_shortcode( 'blog_custom_shortcode', 'insert_blog_shortcode' );
?>