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
<div class="nav-menu_categories">
	<?php 
		wp_nav_menu( array(
		    'theme_location'    => 'menu_categories', 
		    'menu_id'           => 'menu_category_product', 
		    'menu_class'        => 'menu',
		) );
	?> 
</div>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
<div class="content-single-product">
		<div class="header-single_product">
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			//do_action( 'woocommerce_before_single_product_summary' );

			$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
			$post_thumbnail_id = $product->get_image_id();
			$wrapper_classes   = apply_filters(
				'woocommerce_single_product_image_gallery_classes',
				array(
					'woocommerce-product-gallery',
					'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
					'woocommerce-product-gallery--columns-' . absint( $columns ),
					'images',
				)
			);
			?>

			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
				<ul class="product-content-image_gallery">
					<?php
					$product_id = get_queried_object_id();; // ID của sản phẩm cần lấy thư viện ảnh
					$image_gallery = get_post_meta( $product_id, '_product_image_gallery', true );

					if ( ! empty( $image_gallery ) ) {
						$gallery_ids = explode( ',', $image_gallery );

						foreach ( $gallery_ids as $gallery_id ) {
							$image_src = wp_get_attachment_image_src( $gallery_id, 'full' );
							echo '<li>';
							echo '<img src="' . $image_src[0] . '">';
							echo '</li>';
						}
					}
					?>
				</ul>
				<ul class="product-content-image_gallery_nav">
					<?php
					$product_id = get_queried_object_id();; // ID của sản phẩm cần lấy thư viện ảnh
					$image_gallery = get_post_meta( $product_id, '_product_image_gallery', true );

					if ( ! empty( $image_gallery ) ) {
						$gallery_ids = explode( ',', $image_gallery );

						foreach ( $gallery_ids as $gallery_id ) {
							$image_src = wp_get_attachment_image_src( $gallery_id, 'full' );
							echo '<li>';
							echo '<img src="' . $image_src[0] . '">';
							echo '</li>';
						}
					}
					?>
				</ul>
			</div>
<!-- /////// -->
			<div class="summary entry-summary">
				<?php $time_flashsale_products = get_field('time_flashsale_products');?>
				<?php if ($time_flashsale_products): ?>
					<div class="main-flash-sale__details">
						<div class="img-flash__sale">
			                <img src="<?php bloginfo('template_directory');?>/images/img-time-flash-sale.png" alt="">
			            </div>
						<!--<div id="timer_count_down" data-id="<?php //echo $time_flashsale_products;?>">
							<div class="clock-times"><span id="days"></span><span class="txt">Ngày</span></div>
						 	<div class="clock-times"> <span id="hours"></span><span class="txt">Giờ</span></div>
						  	<div class="clock-times"><span id="minutes"></span><span class="txt">Phút</span></div>
						  	<div class="clock-times"><span id="seconds"></span><span class="txt">Giây</span></div>
						</div>-->


<?php
$date=$time_flashsale_products;
$date2 =  str_replace(',', '/', $date);
$date3 =  str_replace(' ', '/', $date2);
?>

                                                <div id="timer_count_down" data-countdown="<?php echo $date3; ?>">
						</div>
                                                <script>
        jQuery(document).ready(function($) {                 
            $('#timer_count_down').each(function() {
                var $this = $(this), finalDate = $(this).data('countdown');
                $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('<div class="clock-times"><span>%D</span><span class="txt">Ngày</span></div><div class="clock-times"><span>%H</span><span class="txt">Giờ</span></div><div class="clock-times"><span>%M</span><span class="txt">Phút</span></div><div class="clock-times"><span>%S</span><span class="txt">Giây</span></div>'));
                });
            });
        });   
    </script>
					</div>
				<?php endif ?>
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
		<div class="box-conten_single_product">
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
			<div class="woo-sidebar">
				<?php dynamic_sidebar('sidebar_single_product'); ?>
			</div>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
