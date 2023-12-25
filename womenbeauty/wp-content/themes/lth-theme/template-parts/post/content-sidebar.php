
<div class="single-recent-post">
    <div class="recent-img">
        <a href="<?php the_permalink(); ?>" title="" class="image">
            <img src="<?php echo lth_custom_img('full', 90, 62);?>" width="90" height="62" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="recent-desc">
        <h6>
            <a href="<?php the_permalink(); ?>" title="">
                <?php the_title(); ?>
            </a>
        </h6>
        <span><?php the_time('d m, Y'); ?></span>
    </div>
</div>