
<?php if( have_rows('products') ): ?>
	<?php while( have_rows('products') ): the_row(); ?>
	<div class="module module_products">
	    <div class="module_title">
	    	<?php if (get_sub_field('title')) { ?>
				<h2 class="title"><?php echo get_sub_field('title'); ?></h2>
			<?php } ?>
            <?php if (get_sub_field('description')) { ?>
            	<p class="infor"><?php echo get_sub_field('description'); ?></p>
            <?php } ?>
		</div>

		<?php 
		$terms = get_sub_field('categories');
		if( $terms ): $i; ?>
			<div class="module_tab_title">
			    <ul>
			    <?php foreach( $terms as $term ): $i++; ?>
			        <li>
		                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" title="<?php echo esc_html( $term->name ); ?>" class="<?php if ($i == 1) { ?>active<?php } ?>" data_tab="tab-<?php echo $i; ?>"><?php echo esc_html( $term->name ); ?></a>
		            </li>
			    <?php endforeach; ?>
			    </ul>
			</div>
		<?php endif; ?>

	    <div class="module_content module_tab_content">

	    	<?php 
			$terms = get_sub_field('categories');
			if( $terms ): $j; ?>
			    <?php foreach( $terms as $term ): $j++; ?>
			    	<div class="tab-panel tab-<?php echo $j; ?> <?php if ($j == 1) { ?>active<?php } ?>">
			            <div class="slick-slider slick-products">
			                <?php	
							$args = array(
								'post_type' => 'product',
						        'post_status' => 'publish',
						        'posts_per_page' => 16,
						        'product_cat' => $term->slug,
							);

							$pr = new WP_query( $args);
							if ($pr->have_posts()) { ?>

								<?php while ($pr->have_posts()) : $pr->the_post(); ?>									
									<?php get_template_part('woocommerce/product-box/product-box', ''); ?>
									
								<?php endwhile; wp_reset_postdata(); ?>

							<?php } else { ?> 
								<?php get_template_part('template-parts/content', 'none'); ?>
							<?php } ?>
			            </div>
			        </div>
			    <?php endforeach; ?>
			<?php endif; ?>
	    </div>
	</div>
	<?php endwhile; ?>
<?php endif; ?>