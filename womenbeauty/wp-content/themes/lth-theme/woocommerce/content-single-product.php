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

<section class="main-product-thumbnail white-bg ptb-90 product-content-single">
    <div class="container">
        <div class="row">
            <!-- Main Thumbnail Image Start -->
            <div class="col-lg-4 col-md-6 mb-all-40">
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
            </div>
            <!-- Main Thumbnail Image End -->
            <!-- Thumbnail Description Start -->
            <div class="col-lg-8 col-md-6">
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
					do_action( 'woocommerce_single_product_summary' );
					?>

				    <div class="social-sharing mt-30 social-box">
                        <ul>
                            <li><label>Chia sẻ</label></li>
                            <li>
			                	<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>%2Fdocs%2Fplugins%2F&layout=button&size=small&width=76&height=20&appId" width="76" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
			                	<a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
			                </li>
			                <li>
			                	<a class="twitter-share-button"
								  href="http://twitter.com/share?text=Im Sharing on Twitter&url=<?php the_permalink(); ?>">
								<i class="fab fa-twitter" aria-hidden="true"></i></a>
			                </li>
			                <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
			                <li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                        </ul>
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
				</div>
            </div>
            <!-- Thumbnail Description End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</section>

<section class="thumnail-desc">
    <div class="container">
        <div class="thumb-desc-inner">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="main-thumb-desc nav tabs-area" role="tablist">
                        <li><a class="active" data-toggle="tab" href="#dtail"><?php echo __('Mô tả') ?></a></li>
                        <li><a data-toggle="tab" href="#review"><?php echo __('Đánh giá') ?></a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content">
                        <div id="dtail" class="tab-pane fade show active">
                            <?php the_content(); ?>
                        </div>
                        <div id="review" class="tab-pane fade">
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=636475073366509&autoLogAppEvents=1';
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="2" data-width="100%"></div>

                        </div>
                    </div>
                    <!-- Product Thumbnail Tab Content End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Container End -->
</section>

<?php $cates = [];

$id = get_queried_object_id();

$terms = get_the_terms( $id, 'product_cat' );

if ( $terms && ! is_wp_error( $terms ) ) :
                             
    foreach ( $terms as $term ) {
        $cat_term_id = $term->term_id;

        $cates[$term->term_id] = $cat_term_id;
    }

endif; 


foreach ($cates as $kg) {
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
	<section class="new-arrival no-border-style ptb-90">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h2><?php echo __('Sản phẩm liên quan'); ?></h2>
            </div>
            <!-- Section Title End -->
            <div class="our-pro-active owl-carousel">
                <?php while ($tets->have_posts()) {
                    $tets-> the_post(); ?>
                    
                    <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                <?php } ?>
            </div>
        </div>
    </section>              
<?php } wp_reset_postdata(); ?>