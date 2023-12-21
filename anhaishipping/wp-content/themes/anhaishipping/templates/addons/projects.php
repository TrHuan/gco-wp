<?php while( have_rows('projects') ): the_row(); ?>
	<div class="module module_projects">
		<div class="module_title">
			<h2 class="title">
				<?php the_sub_field('title'); ?>
			</h2>
			<p class="info">
				<?php the_sub_field('description'); ?>
			</p>
		</div>

		<div class="module_content">			
		    <?php
	            $args = [
	                'post_type' => 'project',
	                'post_status' => 'publish',
	                // 'order_by' => 'rand',
	                'order' => 'DESC',
	                'posts_per_page' => 8,
	            ];
	            $tets = new WP_Query($args);
	            if ($tets->have_posts()) { ?>

					<div class="slick-slider slick-projects">
	                    <?php while ($tets->have_posts()) {
	                        $tets-> the_post(); ?>
	                        
	                        <?php get_template_part('template-parts/project/content', ''); ?>
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
<?php endwhile; ?>