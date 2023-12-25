<?php while( have_rows('contacts') ): the_row(); ?>
    <div class="module module__header">
        <div class="module_title">
            <h2 class="title"><?php the_sub_field('title'); ?></h2>
            <p class="info"><?php the_sub_field('description'); ?></p>
        </div>
    </div>

    <div class="module module__html">
        <div class="module_content">
            <?php $content = get_sub_field('content'); ?>
            <?php echo do_shortcode($content); ?>
        </div>                              
    </div>
<?php endwhile; ?>