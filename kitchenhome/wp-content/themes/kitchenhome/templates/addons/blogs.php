<?php while( have_rows('blogs') ): the_row(); ?>

	<?php $cat = get_sub_field('blogs_categories'); ?>

	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
		<div class="module module__header">
			<div class="module_title">
				<h2 class="title">
					<span class="icofont-star icon"></span>
					<?php the_sub_field('title'); ?>
				</h2>
				<a href="<?php echo get_term_link($cat, 'category'); ?>" rel="nofollow" class="" tabindex="0">
					<?php echo __('Xem thêm...'); ?>
				</a>
			</div>
		</div>

		<div class="module module_blogs">
			<div class="module_content">
				
			    <?php
			    if ($cat) {
		            $args = [
		                'post_type' => 'post',
		                'post_status' => 'publish',
		                // 'order_by' => 'rand',
		                'order' => 'DESC',
		                'posts_per_page' => 6,
		                'category_name' => $cat->name,
		            ];
		            $tets = new WP_Query($args);
		            if ($tets->have_posts()) { ?>

						<div class="slick-slider slick-blogs">
		                    <?php while ($tets->have_posts()) {
		                        $tets-> the_post(); ?>
		                        
		                        <?php get_template_part('template-parts/post/content', ''); ?>
		                    <?php } ?>
		                </div>
		            <?php } ?>  
	            <?php } else {
	                get_template_part('template-parts/content', 'none');
	            }
	            // reset post data
	            wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>