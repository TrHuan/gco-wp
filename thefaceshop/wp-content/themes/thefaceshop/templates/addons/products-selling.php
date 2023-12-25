<?php while( have_rows('products_selling') ): the_row(); ?>
	<div class="module module_products module_products_selling ptb-80">
		<div class="module_title section-title text-center mb-50">
            <h2><?php the_sub_field('title'); ?></h2>
            <p><?php the_sub_field('description'); ?></p>
        </div>

        <?php $featured_posts = get_sub_field('products');
		if( $featured_posts ): ?>
		<div class="module_content">			
		    <?php
		    	$cates = [];
				$i = 0;

				foreach( $featured_posts as $featured_post ):
					$cates[$i] = $featured_post;
					$i++;
				endforeach;

	            $args = [
	                'post_type' => 'product',
	                'post_status' => 'publish',
	                // 'order_by' => 'rand',
	                'order' => 'DESC',
	                'posts_per_page' => 12,
                	'post__in' => $cates,
	            ];
	            $tets = new WP_Query($args);
	            if ($tets->have_posts()) { $i = 0; ?>

					<div class="second-featured-pro-active featured-pro-Màu-style-two owl-carousel">
	                    <?php while ($tets->have_posts()) {
	                        $tets-> the_post(); $i++; ?>

	                        <?php if ($i % 2 == 1) { ?>
	                        	<div class="double-product">
	                        <?php } ?>
		                        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
		                    <?php if ($i % 2 == 0) { ?>
		                    	</div>
		                    <?php } ?>
	                    <?php } ?>
	                </div>
	                
	            <?php } else {
	                get_template_part('template-parts/content', 'none');
	            }
	            // reset post data
	            wp_reset_postdata();
	        ?>
		</div>
		<?php endif; ?>
	</div>
<?php endwhile; ?>