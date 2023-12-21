
<div class="single-recent-post">
    <div class="recent-img">
        <a href="<?php the_permalink(); ?>" title="" class="image">
            <img src="<?php echo lth_custom_img('full', 370, 246);?>" width="370" height="246" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="recent-desc">
        <h6>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a> 
        </h6>
        <span><?php the_time('j'); ?> <?php echo __('Tháng'); ?> <?php the_time('m'); ?>, <?php the_time('Y'); ?></span>
    </div>
</div>