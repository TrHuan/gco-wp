
<div class="item">
    <div class="content">
        <div class="content-header">
            <?php if (has_post_thumbnail()) { ?>
                <div class="content-image">
                    <a href="<?php the_permalink(); ?>" title="" class="image">
                        <img src="<?php echo lth_custom_img('full', 333, 230);?>" width="333" height="230" alt="<?php the_title(); ?>">
                    </a>
                </div>
            <?php } ?>

            <div class="content-box">
                <h3 class="content-name">
                    <a href="<?php the_permalink(); ?>" title="" class="name-news__mains titles-bold__alls fs-17s mb-10s">
                        <?php the_title(); ?>
                    </a> 
                </h3>

                <div class="content-excerpt">
                    <?php wpautop(the_excerpt()); ?>
                </div>
            </div>
        </div>
        <div class="content-footer content-button">
            <a href="<?php the_permalink(); ?>" class="" title="">
                <?php echo __('Đặt dịch vụ'); ?> <img src="<?php echo ASSETS_URI ?>/images/icon-04.png" alt="Icon">
            </a>
        </div>
    </div>
</div>