<?php while( have_rows('products_category') ): the_row(); ?>
	<?php $term = get_sub_field('category');
	if( $term ): ?>
		<div class="group-prds__alls mb-15s">
			<div class="tops-groups__prds mb-5s">
	            <h2 class="names-groups__prds titles-md__alls fs-16s"><?php echo $term->name; ?></h2>

	            <a href="<?php echo get_category_link($term->term_id); ?>" title="" class="see-groups__prds fs-12s">
					<?php echo __('Tất cả'); ?>
				</a>
	        </div>
	        <div class="slide-prds__groups">
	            <div class="sl-prds__groups swiper-container">
	                <div class="swiper-wrapper">
	                    <?php
						    $terms_child2 = get_sub_field('category_child');
							if( $terms_child2 ) { $i = 0;
								foreach( $terms_child2 as $term_child2 ): $i++;
									if ($i == 1) {
										$cates = $term_child2->term_id;
									}
								endforeach;
							} else {
								$cates = get_sub_field('category');
							}

				            $args = [
				                'post_type' => 'product',
				                'post_status' => 'publish',
				                // 'order_by' => 'rand',
				                'order' => 'DESC',
				                'posts_per_page' => 4,
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
								
			                    <?php while ($tets->have_posts()) {
			                        $tets-> the_post(); ?>
			                        <div class="swiper-slide">
			                        	<?php get_template_part('woocommerce/product-box/product-box', '2'); ?>
			                        </div>
			                    <?php } ?>			                
				                
				            <?php } else {
				                get_template_part('template-parts/content', 'none');
				            }
				            // reset post data
				            wp_reset_postdata();
				        ?>
	                </div>
	                <div class="swiper-button-prev"></div>
	                <div class="swiper-button-next"></div>
	            </div>
	            <div class="group-btns__showss">
	                <div class="showss-button-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
	                <div class="showss-button-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	            </div>
	        </div>
	    </div>
	<?php endif; ?>
<?php endwhile; ?>