<?php
    $post_id            = get_the_ID();
    $post_title         = get_the_title($post_id);
    // $post_content       = wpautop(get_the_content($post_id));
    $post_date          = get_the_date('d/m/Y',$post_id);
    $post_link          = get_permalink($post_id);
    $post_image         = getPostImage($post_id,"p-post");
    $post_excerpt       = cut_string(get_the_excerpt($post_id),200,'...');
    $post_author        = get_the_author_meta( 'nicename', get_the_author_meta( get_the_author() ) );
    $post_tag           = get_the_tags($post_id);
    $post_comment       = wp_count_comments($post_id);
    $post_comment_total = $post_comment->total_comments;
?>

<article class="blog-item">
    <figure class="blog-img">
        <a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
            <img src="<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>">
        </a>
    </figure>
    <figcaption class="f2 bold s18 py-3 blog-info-tit">
        <h2 class="blog-item-tit">
            <a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
                <?php echo $post_title; ?>
            </a>
        </h2>
    </figcaption>
</article>