<?php while( have_rows('products_highlights') ): the_row(); ?>
	<div class="module module_products">
		<div class="module_title">
			<h2 class="title">
				<?php the_sub_field('title'); ?>
			</h2>
		</div>

		<div class="module_content">
			<?php
			    $cates = get_sub_field('category');

	            $args = [
	                'post_type' => 'product',
	                'post_status' => 'publish',
	                // 'order_by' => 'rand',
	                'order' => 'DESC',
	                'posts_per_page' => 8,
                	'tax_query' => array(
				        array(
				            'taxonomy' => 'product_cat',
				            'field'    => 'term_id',
				            'terms'    => $cates,
				        ),
				    ),
	            ];
	            $tets = new WP_Query($args);
	            if ($tets->have_posts()) { ?>

					<div class="slick-slider slick-products">
	                    <?php while ($tets->have_posts()) {
	                        $tets-> the_post(); ?>
	                        
	                        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
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