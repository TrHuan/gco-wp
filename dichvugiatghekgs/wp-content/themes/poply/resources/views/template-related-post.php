<?php
    global $post;
    $categories = get_the_category($post->ID);

    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args=array(
	    'category__in'         => $category_ids,
	    'post__not_in'         => array($post->ID),
	    'posts_per_page'       => 3,
	    'ignore_sticky_posts'  => 1
    );
    $query = new wp_query( $args );
?>


<div class="pt-5 bdetail-re">
    <h2 class="f2 pb-4 s24 bold bdetail-retit">Tin Tức Liên Quan</h2>
    <div class="bdetail-re-slider">

        <?php
            if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();
        ?>

            <?php get_template_part('resources/views/content/related-post', get_post_format()); ?>

        <?php endwhile; wp_reset_postdata(); else: echo ''; endif; ?>

    </div>
</div>