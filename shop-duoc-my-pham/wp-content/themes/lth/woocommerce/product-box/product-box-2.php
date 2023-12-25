<?php global $product; ?>

<div class="items-ingredient__slide">
    <?php if (has_post_thumbnail()) { ?>
        <div class="img-ingredient mb-20s">
            <a href="#" title="">
                <img src="<?php echo lth_custom_img('full', 334, 367);?>" width="334" height="367" alt="<?php the_title(); ?>">
            </a>
        </div>
    <?php } ?>
    <div class="intros-ingredient__slides">
        <h3><a href="#" class="title-ingredient__slides fs-28s mb-20s"><?php the_title(); ?> </a></h3>
        <p class="fs-16s titles-light__alls"><?php the_excerpt(); ?></p>
    </div>
</div>