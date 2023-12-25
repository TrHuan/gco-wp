<?php while( have_rows('contacts') ): the_row(); ?>
    <div class="text-register__sale mb-20s">
        <h2 class="titles-md__alls titles-register__sale mb-10s fs-16s"><?php the_sub_field('title'); ?></h2>
        <p><?php the_sub_field('description'); ?></p>
    </div>
    <?php $content = get_sub_field('content');
    echo do_shortcode($content); ?>
<?php endwhile; ?>