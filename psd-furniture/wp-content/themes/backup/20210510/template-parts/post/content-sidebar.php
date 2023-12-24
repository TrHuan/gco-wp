<?php
/**
 * Template hiển thị nội dung cho post có post format là standard
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="content-box">
            <?php if (has_post_thumbnail()) { ?>
                <div class="content-image">
                    <div class="image">
                        <a class="post-link" href="<?php the_permalink(); ?>" title="">
                            <img src="<?php echo lth_custom_img('full', 270, 180);?>" alt="<?php the_title(); ?>" width="270" height="180">
                        </a>
                    </div>
                </div>
            <?php } ?>

            <div class="content">
                <h4 class="content-name">
                    <a class="post-link" href="<?php the_permalink(); ?>" title="">
                        <?php the_title(); ?>
                    </a> 
                </h4>
            </div>
        </div>
    </div>