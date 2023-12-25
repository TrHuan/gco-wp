<?php while( have_rows('products_category') ): the_row(); ?>
	<?php $term = get_sub_field('category');
	if( $term ): ?>
	    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
	    	<div class="module module__header">
				<div class="module_title">
					<h2 class="title">
						<?php echo $term->name; ?>
					</h2>
				</div>

				<div class="product-cats">
					<ul>
						<?php $terms_child = get_sub_field('category_child');
						if( $terms_child ): ?>
						    <?php foreach( $terms_child as $term_child ): ?>
								<li>
									<a href="<?php echo get_category_link($term_child->term_id); ?>" title=""><?php echo $term_child->name; ?></a>
								</li>
						    <?php endforeach; ?>
						<?php endif; ?>
						<li>
							<a href="<?php echo get_category_link($term->term_id); ?>" title="">
								<?php echo __('Tất cả'); ?>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="module module_products">
				<div class="module_content">			
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

							<div class="slick-slider slick-products-2">
			                    <?php while ($tets->have_posts()) {
			                        $tets-> the_post(); ?>
			                        
			                        <?php get_template_part('woocommerce/product-box/product-box', '2'); ?>
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
		</div>
	<?php endif; ?>
<?php endwhile; ?>