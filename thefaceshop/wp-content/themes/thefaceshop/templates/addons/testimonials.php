
	<div class="module module_testimonials">
		<?php if (get_sub_field('title') || get_sub_field('description')) { ?>
			<div class="module_title section-title text-center mb-50">
	            <h2><?php the_sub_field('title'); ?></h2>
	            <p><?php the_sub_field('description'); ?></p>
	        </div>
	    <?php } ?>

		<div class="module_content">
			
		    <?php
	            $args = [
	                'post_type' => 'testimonial',
	                'post_status' => 'publish',
	                'order_by' => 'rand',
	                // 'order' => 'ASC',
	                'posts_per_page' => $number,
	            ];
	            $tets = new WP_Query($args);
	            if ($tets->have_posts()) { ?>

					<div class="testmonial-active testmonial-Màu-two owl-carousel">
	                    <?php while ($tets->have_posts()) {
	                        $tets-> the_post(); ?>
	                        
	                        <?php get_template_part('template-parts/testimonial/content', ''); ?>
	                    <?php } ?>
	                </div>
	                
	            <?php } else {
	                get_template_part('template-parts/content', 'none');
	            }
	            // reset post data
	            wp_reset_postdata();
	        ?>
		</div>
	</div>