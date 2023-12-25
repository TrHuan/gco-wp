<?php
/**
 * Template Name: Addon Products
 * 
 * @author LTH
 * @since 2020
 */
?>

<?php
    $rands = rand();
    $rand = $rands;

    $id = get_sub_field('id');
    if ($id) {
    	$id = 'lth-' . $id;
    }

    $clas = get_sub_field('class');

    $style = get_sub_field('styles');

    $class = $clas . ' ' . $style;

	$products = get_sub_field('products');

	$img = get_sub_field('banner');
?>

<section <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="product-list lth-products <?php echo $class; ?>">
    <div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">
        <div class="list-cate flex-center-between">
        	<?php
				$title = get_sub_field('title');
				$description = get_sub_field('description');
				
				if ($title || $description) {
			?>
				<?php if ($title) { ?>
					<h2 class="title" style="color: #67bd45; text-transform: uppercase;"><?php echo $title; ?></h2>
				<?php }?>
				<?php if ($description) { ?>
					<p><?php echo $description; ?></p>
				<?php }?>
			<?php } ?>

			<?php
				$show_ps_by_cat = get_sub_field('show_products_by_category');
				
				if ($show_ps_by_cat == 'yes') {
					if( have_rows('categories') ): ?>
						<ul class="flex-center">
						<?php while( have_rows('categories') ): the_row();
							$term = get_sub_field('category');
							$cat = get_term( $term ); ?>
							<li>
								<a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" title="">
						    		<?php echo esc_html( $cat->name ); ?>
						    	</a>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php endif;
				}
			?>            
        </div>
        <div class="row">
        	<?php if ($style == 'style_01') { ?>
	            <div class="col-md-9">
	                <div class="product-ds">
	                    <div class="row">
	                    	<?php if ($products == 'viewed') {
								if(isset($_SESSION["viewed"]) && $_SESSION["viewed"]){
									$data = $_SESSION["viewed"];

									$args = array(
										'post_type' => 'product',
										'post_status' => 'publish',
										'posts_per_page' => $number_show,
										'post__in'	=> $data,
									);

									$getposts = new WP_query( $args);
									global $wp_query; $wp_query->in_the_loop = true; ?>

									<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
										<?php global $product; ?>

										<div class="col-md-4 mgb-20">
											<?php get_template_part('woocommerce/product-box/product-box', ''); ?>
										</div>

									<?php endwhile; wp_reset_postdata(); ?>

								<?php } else { ?> 
									<?php get_template_part('template-parts/content', 'none'); ?>
								<?php } ?>
							<?php } elseif ($products == 'products') { ?>
								<?php
									$products = get_sub_field('select_products');
									if( $products ):
								?>

								    <?php foreach( $products as $post ): 
								        setup_postdata($post); ?>

								        <div class="col-md-4 mgb-20">
											<?php get_template_part('woocommerce/product-box/product-box', ''); ?>
										</div>

								    <?php endforeach; ?>

								<?php 
								    wp_reset_postdata();
									else:
										get_template_part('template-parts/content', 'none');
									endif; 
								?>
							<?php } else {
				                if ($products == 'rand') {
									$orderby = 'rand';
								}

								$show_ps_by_cat2 = get_sub_field('show_products_by_category');
								
								$cates = [];

								if ($show_ps_by_cat2 == 'yes') {
									if( have_rows('categories') ):
										while( have_rows('categories') ): the_row();
											$term = get_sub_field('category');
											$cat = get_term( $term );

											$slug = $cat->slug;

											$cates[$cat->term_id] = $cat->term_id;

										endwhile;
									endif;
								}

								$args = array(
									'post_type' => 'product',
							        'post_status' => 'publish',
							        'posts_per_page' => $number_show,
							        // 'product_cat' => $cates,
							        'orderby' => $orderby,
							        'tax_query' => array(
								        array(
								            'taxonomy' => 'product_cat',
								            'field'    => 'term_id',
								            'terms'    => $cates,
								        ),
								    ),
								);

								$getposts = new WP_query( $args);
								if ($getposts->have_posts()) { ?>

									<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
										<?php global $product; ?>
										
										<div class="col-md-4 mgb-20">
											<?php get_template_part('woocommerce/product-box/product-box', ''); ?>
										</div>
										
									<?php endwhile; wp_reset_postdata(); ?>

								<?php } else { ?> 
									<?php get_template_part('template-parts/content', 'none'); ?>
								<?php } ?>
							<?php } ?>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-3">
	                <div class="banner">
	                    <!-- <a href="" title="" class="effect"> -->
	                    	<img src="<?php echo $img; ?>" alt="" width="1920" height="1080">
	                    <!-- </a> -->
	                </div>
	            </div>
	        <?php } else { ?>
				<div class="col-md-12">
	                <div class="product-slider owl-carousel slider-general">
                    	<?php if ($products == 'viewed') {
							if(isset($_SESSION["viewed"]) && $_SESSION["viewed"]){
								$data = $_SESSION["viewed"];

								$args = array(
									'post_type' => 'product',
									'post_status' => 'publish',
									'posts_per_page' => $number_show,
									'post__in'	=> $data,
								);

								$getposts = new WP_query( $args);
								global $wp_query; $wp_query->in_the_loop = true; ?>

									<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
										<?php global $product; ?>
										
										<?php get_template_part('woocommerce/product-box/product-box', ''); ?>
									<?php endwhile; wp_reset_postdata(); ?>

							<?php } else { ?> 
								<?php get_template_part('template-parts/content', 'none'); ?>
							<?php } ?>
						<?php } elseif ($products == 'products') { ?>
							<?php
								$products = get_sub_field('select_products');
								if( $products ):
							?>

								    <?php foreach( $products as $post ): 
								        setup_postdata($post); ?>

								        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>

								    <?php endforeach; ?>

							<?php 
							    wp_reset_postdata();
								else:
									get_template_part('template-parts/content', 'none');
								endif; 
							?>
						<?php } else {
			                if ($products == 'rand') {
								$orderby = 'rand';
							}

							$show_ps_by_cat2 = get_sub_field('show_products_by_category');
							
							$cates = [];

							if ($show_ps_by_cat2 == 'yes') {
								if( have_rows('categories') ):
									while( have_rows('categories') ): the_row();
										$term = get_sub_field('category');
										$cat = get_term( $term );

										$slug = $cat->slug;

										$cates[$cat->term_id] = $cat->term_id;

									endwhile;
								endif;
							}

							$args = array(
								'post_type' => 'product',
						        'post_status' => 'publish',
						        'posts_per_page' => $number_show,
						        // 'product_cat' => $cates,
						        'orderby' => $orderby,
						        'tax_query' => array(
							        array(
							            'taxonomy' => 'product_cat',
							            'field'    => 'term_id',
							            'terms'    => $cates,
							        ),
							    ),
							);

							$getposts = new WP_query( $args);
							if ($getposts->have_posts()) { ?>

									<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
										<?php global $product; ?>
										
										<?php get_template_part('woocommerce/product-box/product-box', ''); ?>
									<?php endwhile; wp_reset_postdata(); ?>

							<?php } else { ?> 
								<?php get_template_part('template-parts/content', 'none'); ?>
							<?php } ?>
						<?php } ?>
                    </div>
                </div>
	        <?php } ?>
        </div>
    </div>
</section>