<?php
/**
 * Template hiển thị nội dung cho post có post format là aside
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post-aside'); ?>>
    <?php the_author(); ?>@<?php the_time('F j, Y g:i a'); ?>

    <?php the_content(); ?>
</div>