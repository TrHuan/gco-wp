<div id="mostview_widget">
    <?php
    $title_cate_1 = ot_get_option('title_cate_1');
    $select_cate_1 = ot_get_option('select_cate_1');
    $number_post_cate_1 = ot_get_option('number_post_cate_1');
    ?>
    <h3 class="title"><a href="<?php echo get_category_link($select_cate_1);?>" title="<?php echo $title_cate_1;?>"><?php echo $title_cate_1;?></a></h3>
    <div id="mostview_list">
        <div id="slider">
            <div id="owl-slider" class="owl-carousel hot-news">
                <?php
                $int_select_cate_1 = (int)$select_cate_1;
                $args = array(
                    'category' => $int_select_cate_1,
                    'posts_per_page' => $number_post_cate_1,
                );
                $myposts = get_posts( $args );
                foreach ( $myposts as $post ) : setup_postdata( $post );
                ?>
                <div class="item">
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                        <?php the_post_thumbnail('thumb_135x90', array('alt'=>get_the_title()));?>
                    </a>
                    <?php post_format(get_the_id());?>
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>" <?php post_class();?>><?php eweb_truncate_title('50');?></a>
                    <div class="info-post">
                        <div class="com_share">
                            <i class="fa fa-calendar"></i> <?php echo get_the_date('d-m-Y',$post->ID); ?>
                            <i class="fa fa-user"></i> <?php $author_id = $post->post_author; ?><a class="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'user_nicename' , $author_id ); ?></a>
                            <?php count_number_tag();?>
                        </div>
                        <p><?php eweb_truncate_description('95');?></p>
                    </div>
                </div>
                <?php endforeach; wp_reset_postdata();?>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery(".hot-news").owlCarousel({
                    autoPlay : true,
                    navigation : true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    items : 5,
                    autoHeight : true,
                    transitionStyle:"fade",
                    pagination : false,
                    paginationNumbers : true,
                    navigationText: false
                });
            });
        </script>
    </div>
</div>
<div class="clear"></div>