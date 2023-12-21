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
 * @package WooCommerce/Templates
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
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

<div class="content-single-product">
		<!-- <div class="main-flash-sale__details">
			<div class="img-flash__sale">
                <img src="<?php bloginfo('template_directory');?>/images/img-time-flash-sale.png" alt="">
            </div>
			<div id="timer_count_down" data-id="5">
				<div class="clock-times"><span id="days"></span><span class="txt">Ngày</span></div>
			 	<div class="clock-times"> <span id="hours"></span><span class="txt">Giờ</span></div>
			  	<div class="clock-times"><span id="minutes"></span><span class="txt">Phút</span></div>
			  	<div class="clock-times"><span id="seconds"></span><span class="txt">Giây</span></div>
			</div>
		</div> -->
		<div class="header-single_product">
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>

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
			</div>
		</div>

		<?php if ( $product && $product->is_type( 'woosg' ) ) { ?>
			<div class="content_grouped_product__single">
				<h3 class="caption-content_grouped_product__single">Chọn sản phẩm lẻ trong bộ sưu tập</h3>
				<?php echo do_shortcode('[woosg]');?>
			</div>
	    <?php } ?>
		<div class="box-content_single_product">
			<?php $link_video_posts = get_field('link_video_posts');?>
				<div class="featured-posts-thumbnail">
					<?php if ($link_video_posts == ""): ?>
						<img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" alt="video">
						<?php else: ?>  
				          <a href="<?php echo $link_video_posts;?>" class="swipebox popup-youtube">
				            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" alt="">
				            <span class="play"></span>
				            <div class="ovrly"></div>
				         </a>
					<?php endif ?>
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
		<div class="woo-sidebar">
			<?php dynamic_sidebar('sidebar_single_product'); ?>
		</div>
	</div>
</div>
<?php get_template_part('sections/specia','blog');?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
