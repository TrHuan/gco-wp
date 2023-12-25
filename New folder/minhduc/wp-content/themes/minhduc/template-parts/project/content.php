
<div class="items-prj__mains">
    <?php if (has_post_thumbnail()) { ?>
        <a href="<?php the_permalink(); ?>" title="" class="img-prj__mains">
            <img src="<?php echo lth_custom_img('full', 385, 250);?>" width="385" height="250" alt="<?php the_title(); ?>">
        </a>
    <?php } ?>
     <a href="<?php the_permalink(); ?>" title="" class="names-prj__mains fs-16s  titles-medium__alls">
        <?php the_title(); ?>
    </a> 
</div>