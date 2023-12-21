<?php
    $post_id            = get_the_ID();
    $post_title         = get_the_title($post_id);
    // $post_content        = wpautop(get_the_content($post_id));
    $post_date          = get_the_date('d/m/Y',$post_id);
    $post_link          = get_permalink($post_id);
    $post_image         = getPostImage($post_id,"p-post");
    $post_excerpt       = cut_string(get_the_excerpt($post_id),150,'...');
    $post_author        = get_the_author_meta( 'nicename', get_the_author_meta( get_the_author() ) );
    $post_tag           = get_the_tags($post_id);
?>

<article class="d-flex flex-column text-center color-item">
    <figure class="color-img">
        <img src="<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>" width="476" height="283">
    </figure>
    <figcaption class="text-white color-info">
        <h3 class="f2 bold s30 color-item-tit">
            <a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
                <?php echo $post_title; ?>
            </a>
        </h3>
        <div class="color-content">
            <p><?php echo $post_excerpt; ?></p>
        </div>
        <a href="<?php echo $post_link; ?>" title="" class="btn read-btn">Xem thêm</a>
    </figcaption>
</article>