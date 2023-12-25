<?php while( have_rows('products_highlights') ): the_row(); ?>
	<h3 class="titles-oranges__alls"><?php the_sub_field('title'); ?></h3>
    <div class="list-hot__mains">
    	<?php
		    $cates = get_sub_field('category');

            $args = [
                'post_type' => 'product',
                'post_status' => 'publish',
                // 'order_by' => 'rand',
                'order' => 'DESC',
                'posts_per_page' => 6,
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

				<div class="row gutter-6">
                    <?php while ($tets->have_posts()) {
                        $tets-> the_post(); ?>
                        <div class="col-6">
                        	<?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                        </div>
                    <?php } ?>
                </div>
                
            <?php } else {
                get_template_part('template-parts/content', 'none');
            }
            // reset post data
            wp_reset_postdata();
        ?>
    </div>
<?php endwhile; ?>