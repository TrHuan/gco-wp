<?php while( have_rows('products_highlights') ): the_row(); ?>
	<div class="module module_products">
		<div class="module_title">
			<h2 class="title">
				<?php the_sub_field('title'); ?>
			</h2>
			<p class="info">
				<?php the_sub_field('description'); ?>
			</p>
		</div>

		<div class="module_content">
			<?php $featured_posts = get_sub_field('content');
			if( $featured_posts ): ?>			
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
		                'posts_per_page' => 8,
	                	'post__in' => $cates,
		            ];
		            $tets = new WP_Query($args);
		            if ($tets->have_posts()) { ?>

						<div class="slick-slider slick-products-highlights">
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

				<?php
					$btn_url = get_sub_field('button');
	    			if( $btn_url ) {
					    $url_btn = $btn_url['url'];
					    $btn_title = $btn_url['title'];
					    $btn_target = $btn_url['target'] ? $btn_url['target'] : '_self';
					}
				?>
				<?php if ($btn_url) { ?>
					<div class="module_button">
						<a href="<?php echo $url_btn; ?>" target="<?php echo $target; ?>" title="" class="btn">
							<?php echo $btn_title; ?>
						</a>
					</div>
				<?php } ?>
			<?php endif; ?>
		</div>
	</div>
<?php endwhile; ?>