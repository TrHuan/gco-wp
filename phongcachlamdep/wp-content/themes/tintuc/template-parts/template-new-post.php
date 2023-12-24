<div class="colleft list">
    <ul>
        <?php
        $number_post_new = ot_get_option('number_post_new');
        $args = array(
            'showposts' => $number_post_new,
        );
        $vonglap = new WP_Query($args);
        while($vonglap->have_posts()) : $vonglap->the_post();
        ?>
        <li>
            <?php post_format(get_the_id());?>
            <h3>
                <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
            </h3>
            <a href="<?php the_permalink();?>" title="<?php the_title();?>" <?php post_class();?>>
                <?php the_post_thumbnail('thumb_180x120', array('alt'=>get_the_title()));?>
            </a>
            <?php post_info(get_the_id());?>
            <div class="info-post"><?php eweb_truncate_description('180');?></div>
            <?php related_post();?>
        </li>
        <?php endwhile; wp_reset_query();?>
    </ul>
</div>