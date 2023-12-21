<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<section id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>	
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            	<article class="product-content-box">
	            	<div class="product-images">
						<?php
						/**
						 * Hook: woocommerce_before_single_product_summary.
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						do_action( 'woocommerce_before_single_product_summary' );
						?>
					</div>

					<div class="summary entry-summary">
						<?php
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						// do_action( 'woocommerce_single_product_summary' );						
						?>

						<h1 class="post-name"><?php the_title(); ?></h1>

						<div class="post-price">
							<?php
							if ($product->get_price_html()) {
								echo $product->get_price_html();
							} else {
								echo '<span class="amount">';
								echo __('Giá: Liên hệ');
								echo '</span>';
							}
							?>
						</div>

						<div class="post-describe">
							<div class="describe-box">
								<label><?php echo __('Mô tả'); ?></label>

								<?php the_excerpt(); ?>

								<div class="post-button">
									<a href="<?php echo esc_url(home_url('/lien-he')); ?>" title="" class="btn">
										<?php echo __('Liên hệ'); ?>
									</a>
								</div>
							</div>

							<div class="module module_features">
								<ul class="module_content">
									<?php if( have_rows('features', 'options') ): $i; ?>
										<?php while( have_rows('features', 'options') ): the_row(); ?>

										    <?php
										    	$i++;
								    			$image_icon = get_sub_field('image_icon');
								    			$title = get_sub_field('title');
								    			$content = get_sub_field('content');

								    		?>

								    		<li class="item item-<?php echo $i; ?>">
								    			<div class="content">
								    				<?php if ($image_icon || $class_icon) { ?>
									    				<div class="content-image">
									    					<?php if ($image_icon) { ?>
									    						<img src="<?php echo $image_icon; ?>" alt="Feature" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
									    					<?php } ?>
									    				</div>
									    			<?php } ?>

								    				<?php if ($title || $content) { ?>
									    				<div class="content-box">
									    					<?php if ($title) { ?>
									    						<h4 class="text-1"><?php echo $title; ?></h4>
									    					<?php } ?>
									    					<?php if ($content) { ?>
									    						<p class="text-2"><?php echo $content; ?></p>
									    					<?php } ?>
									    				</div>
									    			<?php } ?>
								    			</div>
								    		</li>
										<?php endwhile; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>

					<?php
					/**
					 * Hook: woocommerce_after_single_product_summary.
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_upsell_display - 15
					 * @hooked woocommerce_output_related_products - 20
					 */
					do_action( 'woocommerce_after_single_product_summary' );
					?>
				</article>
			</div>
		</div>
	</div>
</section>

<section class="lth-product-tabs">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="module module_products module_product_tabs"> 
                    <div class="module_title">
                        <h2 class="title"><?php echo __('Chi tiết sản phẩm') ?></h2>
                    </div>

                    <div class="module_content">

                        <?php the_content(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<?php
    $cates = [];

    $id = get_queried_object_id();

    $terms = get_the_terms( $id, 'product_cat' );

    if ( $terms && ! is_wp_error( $terms ) ) :
                                 
        foreach ( $terms as $term ) {
            $cat_term_id = $term->term_id;

            $cates[$term->term_id] = $cat_term_id;
        }

    endif; 


    foreach ($cates as $kg) {
        // var_dump($kg);
        $kq .= $kg . ' ';
    }

    $args = [
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'post__not_in' => array($id),
        // 'cat' => $kq,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $kq,
            )
        ),

    ];
    $tets = new WP_Query($args);
    if ($tets->have_posts()) { ?>
    <section class="lth-products">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_products module_other_products"> 
                        <div class="module_title">
                            <h2 class="title"><?php echo __('Sản phẩm liên quan'); ?></h2>
                        </div>

                        <div class="module_content">

                            <div class="slick-slider slick-other-products">
			                    <?php while ($tets->have_posts()) {
			                        $tets-> the_post(); ?>
			                        
			                        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
			                    <?php } ?>
			                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>                     
    <?php } else {
        //get_template_part('template-parts/content', 'none');
    }
    // reset post data
    wp_reset_postdata();
?>