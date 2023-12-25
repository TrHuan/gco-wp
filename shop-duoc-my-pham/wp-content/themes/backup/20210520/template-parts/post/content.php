<?php
/**
 * Template hiển thị nội dung cho post có post format là standard
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (!is_single()) { ?>
        <?php if (has_post_thumbnail()) { ?>
            <a class="post-link" href="<?php the_permalink(); ?>">
                <img src="<?php echo lth_custom_img('full', 480, 320); ?>" alt="<?php the_title(); ?>" width="480" height="320">
                <div class="author">
                    <span><?php the_time('j'); ?></span>
                    <span><?php echo __('Tháng'); ?> <?php the_time('m'); ?></span>
                </div>
            </a>
        <?php } ?>
    <?php } ?>

    <div class="news-text">
        <?php if (is_single()) { ?>
            <h1 class="post-title"><?php the_title(); ?></h1>
        <?php } else { ?>
            <h3><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a> </h3>
        <?php } ?> 

        <p class="upload mgb-20"><?php the_time('j'); ?>/<?php the_time('m'); ?>/<?php the_time('y'); ?></p>     

        <?php if (is_single()) { ?>
            <div class="content"><?php the_content(); ?></div>
        <?php } else { ?>
            <?php if (get_field('excerpt')) { ?>
                <div class="desc"><?php the_field('excerpt'); ?></div>
            <?php } ?>
        <?php } ?>    
    </div>
</div>