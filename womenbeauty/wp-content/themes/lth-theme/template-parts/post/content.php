
<!-- Single Blog Start -->
<div class="single-blog">
    <div class="blog-img">
        <a href="<?php the_permalink(); ?>" title="" class="image">
            <img src="<?php echo lth_custom_img('full', 370, 253);?>" width="370" height="253" alt="<?php the_title(); ?>">
        </a>
        <div class="entry-meta">
            <div class="date">
                <p><?php the_time('d'); ?></p>
                <span><?php the_time('m'); ?></span>
            </div>
        </div>
    </div>
    <div class="blog-content">
        <h4>
            <a href="<?php the_permalink(); ?>" title="">
                <?php the_title(); ?>
            </a>
        </h4>
        <ul class="meta-box">
            <li class="meta-date">
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('m'); ?> <?php the_time('d'); ?>, <?php the_time('Y'); ?></span>
            </li>
            <li>
                <i class="fa fa-user" aria-hidden="true"></i>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <?php echo __('By'); ?> <?php the_author(   ); ?>                    
                </a>
            </li>
        </ul>
        <?php the_excerpt(); ?>
        <div class="small-btn">
            <a href="<?php the_permalink(); ?>" title=""><?php echo __('Chi tiết'); ?></a>
        </div>
    </div>
</div>
<!-- Single Blog End -->