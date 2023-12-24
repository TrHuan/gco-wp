<div id="hotnews">
    <div class="left">
        <ul class="listslider">
            <?php
            $args = array(
                'showposts' => 4,
                /*'orderby' => 'date',
                'meta_query' => array(
                    array(
                        'key' => 'is_feature_post',
                        'value' => 'feature_post',
                        'compare' => 'LIKE'
                    )
                )*/
            );
            $vonglap = new WP_Query($args);
            $i=1;while($vonglap->have_posts()) : $vonglap->the_post();
            if($i==1){?>
            <li class="items first">
                <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                    <?php the_post_thumbnail('thumb_440x255', array('alt'=>get_the_title()));?>
                </a>
                <h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
                <p><?php eweb_truncate_description('300');?></p>
            </li>
            <?php }else{?>
            <li class="items last">
                <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                    <?php the_post_thumbnail('thumb_135x90', array('alt'=>get_the_title()));?>
                </a>
                <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
            </li>
            <?php } $i++; endwhile; wp_reset_query();?>
        </ul>
    </div>
    <div class="center">
        <ul>
            <?php
            $args = array(
                'showposts' => 6,
                'offset' => 4,
                /*'orderby' => 'date',
                'meta_query' => array(
                    array(
                        'key' => 'is_feature_post',
                        'value' => 'feature_post',
                        'compare' => 'LIKE'
                    )
                )*/
            );
            $vonglap = new WP_Query($args);
            while($vonglap->have_posts()) : $vonglap->the_post();
            ?>
            <li>
                <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                    <?php the_post_thumbnail('thumb_75x60', array('alt'=>get_the_title()));?>
                </a>
                <div class="info-post">
                    <?php post_format(get_the_id());?>
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                    <span class="date timepost" data-time="<?php echo get_the_date('d-m-Y',$post->ID); ?>"><?php echo timeago(); ?></span>
                </div>
            </li>
            <?php endwhile; wp_reset_query();?>
        </ul>
    </div>
    <div class="right">
        <?php if ( ! dynamic_sidebar( 'ads-top-home' ) ) : ?>
        <?php endif;?>
    </div>
</div>