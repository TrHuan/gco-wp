
<div class="items-news__mains">
    <?php if (has_post_thumbnail()) { ?>
        <div class="img-news__mains">
            <a href="<?php the_permalink(); ?>" title="" class="image">
                <img src="<?php echo lth_custom_img('full', 380, 203);?>" width="380" height="203" alt="<?php the_title(); ?>">
            </a>
        </div>
    <?php } ?>
    <div class="intros-news__mains">
        <h3>
            <a href="<?php the_permalink(); ?>" title="" class="name-news__mains titles-bold__alls fs-17s mb-10s">
                <?php the_title(); ?>
            </a> 
        </h3>
        <div class="mb-40s fs-15s"><?php wpautop(the_excerpt()); ?></div>
        <ul class="days-news__bottoms">
            <li>
                <p class="days-news fs-13s"><?php the_time('d'); ?> <?php the_time('m,'); ?> <?php echo __('Thg'); the_time('Y'); ?></p>
            </li>
            <li>
                <a href="<?php the_permalink(); ?>" class="btn-see__news fs-14s"><?php echo __('Đọc tiếp'); ?></a>
            </li>
        </ul>
    </div>
</div>