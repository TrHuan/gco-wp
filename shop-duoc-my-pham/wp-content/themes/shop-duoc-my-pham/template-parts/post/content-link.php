<?php
/**
 * Template hiển thị nội dung cho post có post format là link
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div>