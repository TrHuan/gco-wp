
<div class="items-news__pages">
    <div class="img-news__pages">
        <a href="<?php the_permalink(); ?>" title="" class="image">
            <img src="<?php echo lth_custom_img('full', 81, 50);?>" alt="<?php the_title(); ?>" width="81" height="50">
        </a>
    </div>
    <div class="intros-news__pages">
        <h3>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="names-news__pages">
                <?php the_title(); ?>
            </a>  
        </h3>
        <p><?php the_excerpt(); ?></p>
        <a title="" href="<?php the_permalink(); ?>" class="see-news__pages">Xem thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
    </div>
</div>