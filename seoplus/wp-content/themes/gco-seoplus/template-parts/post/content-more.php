<?php
/**
 * Template hiển thị nội dung cho post có post format là standard
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

<?php 
    global $userdata; 
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (!is_single()) { ?>
        <?php if (has_post_thumbnail()) { ?>
            <div class="post-thumbnail">
                <div class="image">
                    <a class="post-link" href="<?php the_permalink(); ?>">
                        <img src="<?php echo lth_custom_img('full', 480, 270); ?>" alt="<?php the_title(); ?>" width="480" height="320">
                    </a>
                </div>
            </div>
        <?php } ?>
    <?php } ?>

    <div class="post-content more">        
            <div class="post-category">
                <a class="post-link" href="<?php the_permalink(); ?>">
                    <?php echo __('Kiến thức'); ?>
                </a>
            </div>
            <h4 class="post-title">
                <a class="post-link" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>           
            </h4>
    </div>
</div>

