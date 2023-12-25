<?php while( have_rows('services') ): the_row(); ?>
	<div class="module module_services">
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
	                'post_type' => 'service',
	                'post_status' => 'publish',
	                // 'order_by' => 'rand',
	                'order' => 'DESC',
	                'posts_per_page' => 5,
	            ];
	            $tets = new WP_Query($args);
	            if ($tets->have_posts()) { ?>

					<div class="slick-slider slick-services slick-services-<?php echo $rand; ?>">
	                    <?php while ($tets->have_posts()) {
	                        $tets-> the_post(); ?>
	                        
	                        <?php get_template_part('template-parts/service/content', ''); ?>
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