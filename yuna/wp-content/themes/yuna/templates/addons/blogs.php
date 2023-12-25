<?php while( have_rows('blogs') ): the_row(); ?>
	<?php $cat = get_sub_field('category'); ?>

	<div class="module module__header">
		<div class="module_title">
			<h2 class="title">
				
			</h2>
		</div>
	</div>

	<div class="module module_blogs">
		<div class="module_content">
			
		    
		</div>
	</div>

	<h3 class="f1 text-center s18 t2 pb-2"><?php the_sub_field('description'); ?></h3>
    <h2 class="s24 bold t1 text-uppercase text-center pb-4"><?php the_sub_field('title'); ?></h2>

    <div class="blog-wrap">
    	<?php
        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            // 'order_by' => 'rand',
            'order' => 'DESC',
            'posts_per_page' => 6,
        ];
        $tets = new WP_Query($args);
        if ($tets->have_posts()) { ?>

			<div class="blog-slider">
                <?php while ($tets->have_posts()) {
                    $tets-> the_post(); ?>
                    
                    <?php get_template_part('template-parts/post/content', ''); ?>
                <?php } ?>
            </div>
        <?php }
        // reset post data
        wp_reset_postdata(); ?>
    </div>
<?php endwhile; ?>