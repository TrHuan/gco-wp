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

    $class = get_sub_field('class');

    $owl_xl_items = get_sub_field('owl_xl_items');
	$owl_lg_items = get_sub_field('owl_lg_items');
	$owl_md_items = get_sub_field('owl_md_items');
	$owl_sm_items = get_sub_field('owl_sm_items');
	$owl_items = get_sub_field('owl_items');

	$owl_xl_rows = get_sub_field('owl_xl_rows');
	$owl_lg_rows = get_sub_field('owl_lg_rows');
	$owl_md_rows = get_sub_field('owl_md_rows');
	$owl_sm_rows = get_sub_field('owl_sm_rows');
	$owl_rows = get_sub_field('owl_rows');

	$products = get_sub_field('products');
?>

<article <?php if ($ids) { ?>id="<?php echo $id; ?>" <?php } ?> class="lth-products <?php echo $class; ?>">
	<div class="<?php if (get_sub_field('full_width') == 'yes') { ?>container-fluid<?php } else { ?>container<?php } ?>">       		
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="products-box">
            		<?php
						$title = get_sub_field('title');
						$description = get_sub_field('description');
						
						if ($title || $description) {
					?>
						<div class="title-box">
							<?php if ($title) { ?>
								<h3 class="title">
									<?php echo $title; ?>
								</h3>								
							<?php }?>
							<?php if ($description) { ?>
								<p><?php echo $description; ?></p>
							<?php }?>
						</div>
					<?php } ?>

					<div class="content-box">
						<?php
							$number_show = get_sub_field('number_of_posts_to_show');

							$show_ps_by_cat = get_sub_field('show_products_by_category');
							
							if ($show_ps_by_cat == 'yes') {
								$cat = get_sub_field('category');
								$term = get_term( $cat, 'product_cat' );
							}
						?>

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

								<div class="slick-slider slick-products slick-products-<?php echo $rand; ?>">
									<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
										<?php global $product; ?>
										
										<?php get_template_part('woocommerce/product-box/product-box', ''); ?>
									<?php endwhile; wp_reset_postdata(); ?>
								</div>
							<?php } else { ?> 
								<?php get_template_part('template-parts/content', 'none'); ?>
							<?php } ?>
						<?php } elseif ($products == 'products') { ?>
							<?php
								$products = get_sub_field('select_products');
								if( $products ):
							?>
							    <div class="slick-slider slick-products slick-products-<?php echo $rand; ?>">
								    <?php foreach( $products as $post ): 
								        setup_postdata($post); ?>

								        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>

								    <?php endforeach; ?>
								</div>
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

							$args = array(
								'post_type' => 'product',
						        'post_status' => 'publish',
						        'posts_per_page' => $number_show,
						        'product_cat' => $term->slug,
						        'orderby' => $orderby,
							);

							$getposts = new WP_query( $args);
							if ($getposts->have_posts()) { ?>
								<div class="slick-slider slick-products slick-products-<?php echo $rand; ?>">
									<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
										<?php global $product; ?>
										
										<?php get_template_part('woocommerce/product-box/product-box', ''); ?>
									<?php endwhile; wp_reset_postdata(); ?>
								</div>
							<?php } else { ?> 
								<?php get_template_part('template-parts/content', 'none'); ?>
							<?php } ?>
						<?php } ?>
		            </div>	

					<?php if( have_rows('button') ): ?>
					    <?php while( have_rows('button') ): the_row(); ?>
					    	<?php
						        $text = get_sub_field('title');
						        $url = get_sub_field('url');

						        if ($text) {
					        ?>
							<div class="buttons">
								<a href="<?php if ($url) { echo $url; } elseif ($url == '#' || !$url) { echo __('javascript:0'); } ?>" class="btn" title="<?php echo $text; ?>">
									<?php echo $text; ?>
								</a>
							</div>		
						<?php } endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">		
		jQuery(document).ready(function($) {
		    $(".slick-products-<?php echo $rand; ?>").slick({
		        loop: true,
		        autoplay: false,
		        autoplaySpeed: 3000,
		        dots: true,
		        infinite: true,
		        speed: 500,
		        rows: <?php echo $owl_xl_rows; ?>,
		        slidesPerRow: <?php echo $owl_xl_items; ?>,
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        adaptiveHeight: false,
		        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
		        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
		        responsive: [
		            {
		                breakpoint: 1200,
		                settings: {
		                    rows: <?php echo $owl_lg_rows; ?>,
		                    slidesPerRow: <?php echo $owl_lg_items; ?>,
		                }
		            },
		            {
		                breakpoint: 992,
		                settings: {
		                    rows: <?php echo $owl_md_rows; ?>,
		                    slidesPerRow: <?php echo $owl_md_items; ?>,
		                }
		            },
		            {
		                breakpoint: 768,
		                settings: {
		                    rows: <?php echo $owl_sm_rows; ?>,
		                    slidesPerRow: <?php echo $owl_sm_items; ?>,
		                }
		            },
		            {
		                breakpoint: 480,
		                settings: {
		                    rows: <?php echo $owl_rows; ?>,
		                    slidesPerRow: <?php echo $owl_items; ?>,
		                }
		            }
		        ]
		    });
		});
	</script>
</article>