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
            <div class="post-thumbnail">
                <div class="image">
                    <a class="post-link" href="<?php the_permalink(); ?>">
                        <img src="<?php echo lth_custom_img('full', 480, 320); ?>" alt="<?php the_title(); ?>" width="480" height="320">
                    </a>
                </div>
                <div class="content-date">
                    <p class="date-month">
                        <span><?php the_time('d'); ?></span>
                        <span><?php the_time('m'); ?></span>
                    </p>
                    <p class="year"><?php the_time('y'); ?></p>
                </div>
            </div>
        <?php } ?>
    <?php } ?>

    <div class="post-content">        
        <?php if (is_single()) { ?>
            <h1 class="title"><?php the_title(); ?></h1>
        <?php } else { ?>
            <h4 class="post-title">
                <a class="post-link" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>           
            </h4>
        <?php } ?> 

        <?php if (is_single()) { ?>
            <?php
                $categories = get_the_category();
                $separator = ",";
                $output = '';
                if ($categories) {
                    foreach ($categories as $key => $category) {
                        $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
                    }
                }
            ?>
            <ul class="post-meta">
                <li class="post-date">
                    <span><?php echo __('Posted ond'); ?></span>
                    <span class="post-j"><?php the_time('d'); ?> <?php the_time('M'); ?>,<?php the_time('Y'); ?></span>
                </li>
            </ul>
        <?php } ?> 

        <?php if (is_single()) { ?>
            <div class="content">
                <?php the_content(); ?>
                    
                <div class="content-share">
                    <div class="share-box">
                        <span><i class="icofont-facebook"></i> Share on Facebook</span>

                        <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>" width="119" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <?php if (get_field('excerpt')) { ?>
                <div class="post-excerpt"><?php the_field('excerpt'); ?></div>
            <?php } ?>

            <a class="btn btn-read-more" href="<?php the_permalink(); ?>">
                <span><?php echo __('Xem thêm'); ?></span>
                <i class="icofont-arrow-right icon"></i>
            </a>
        <?php } ?>    
    </div>
</div>