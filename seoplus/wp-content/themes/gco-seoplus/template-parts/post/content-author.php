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

    <div class="post-content">        
        <?php if (is_single()) { ?>
            <h1 class="post-title"><?php the_title(); ?></h1>
        <?php } else { ?>
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
            <div class="post-desc">
                <?php the_excerpt();?>
            </div>
        <?php } ?>

        <?php if (is_single()) { ?>
            <div class="groups-box">
                <div class="post-date">
                    <!-- <span><?php echo __('Posted'); ?></span> --> <?php //the_time('F j, Y g:i a'); ?>
                    <i class="fal fa-calendar-alt icon icon-date" aria-hidden="true"></i>
                    <span class="post-j"><?php the_time('j'); ?> <?php echo __('tháng'); ?> <?php the_time('m'); ?>, <?php the_time('Y'); ?></span>
                </div>

                <div class="post-share">
                    <div class="share-box">
                        <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>" width="119" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                        <span> Chia sẻ <i class="icofont-share icon"></i></span>

                    </div>
                    
                    <!-- <a href="#" title="Bình luận" class="reviews-box btn-popup-reviews" data_popup="popups-reviews"> -->
                    <a href="#comments" title="Bình luận" class="reviews-box btn-popup-reviews">
                        <i class="icofont-comment icon"></i>
                        <span>10</span>
                    </a>
                </div>
            </div>
        <?php } ?>

        <?php if (is_single()) { ?>
            <div class="content"><?php the_content(); ?></div>

            <?php
                $posttags = get_the_tags();
                if ($posttags) { ?>
                    <div class="post-tags">
                        <ul>
                            <?php foreach($posttags as $tag) { ?>
                                <li>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>">
                                        <?php echo $tag->name . ' '; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php }
            ?>

            
        <?php } ?>    
    </div>
</div>