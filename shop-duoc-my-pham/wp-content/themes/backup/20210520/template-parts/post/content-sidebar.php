<?php
/**
 * Template hiển thị nội dung cho post có post format là standard
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

<div class="news-item mgt-20 mgb-20">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if (has_post_thumbnail()) { ?>
            <a class="post-link zoom" href="<?php the_permalink(); ?>">
                <img src="<?php echo lth_custom_img('full', 270, 180);?>" alt="<?php the_title(); ?>" width="270" height="180">
            </a>
        <?php } ?>

        <div class="post-content">   
            <h4 class="post-title">
                <a class="post-link" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>           
            </h4>

            <?php if (get_field('excerpt')) { ?>
                <div class="post-excerpt"><?php the_field('excerpt'); ?></div>
            <?php } ?>
        </div>
    </div>
</div>