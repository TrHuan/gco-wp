<?php
/**
 * Template hiển thị nội dung cho post có post format là gallery
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h3><?php the_title(); ?></h3>

    <?php the_content(); ?>
</div>