
<div class="item">
    <!-- Single Blog Start -->
    <div class="single-blog">
        <?php if (has_post_thumbnail()) { ?>
            <div class="blog-img">
                <a href="<?php the_permalink(); ?>" title="" class="image">
                    <img src="<?php echo lth_custom_img('full', 370, 246);?>" alt="<?php the_title(); ?>">
                </a>
                <div class="entry-meta">
                    <div class="date">
                        <p><span><?php the_time('d'); ?></span> <?php the_time('m, Y'); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="blog-content">
            <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
            <ul class="meta-box">
                <li class="meta-date"><span><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('d/m/Y'); ?></span></li>
                <li><i class="fa fa-user" aria-hidden="true"></i>Bởi <a href="#"> <?php the_author( ); ?></a></li>
            </ul>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="blg-readmore"><?php echo __('Đọc thêm'); ?></a>
        </div>
    </div>
    <!-- Single Blog End -->
</div>