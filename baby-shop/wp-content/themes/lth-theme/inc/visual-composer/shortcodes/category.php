<?php
if ( ! class_exists( 'Shortcode_Category' ) ) {
	class Shortcode_Category extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'category';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'category', $atts ) : $atts;
			extract( $atts );
			$css_class   = array( 'lth-category' );
			$css_class[] = $atts['el_class'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'category', $atts );
			$term_id = $atts['cat_slug'];
			$term = get_term_by( 'id', $term_id, 'product_cat' );
    		$thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			$url_images     = wp_get_attachment_image_url( $atts['banner_img'], 'full' );
			$position    = $atts['content_position'];
			$top    = $atts['position_top'];
			$bottom    = $atts['position_bottom'];
			$left    = $atts['position_left'];
			$right    = $atts['position_right'];
			$image_width    = $atts['image_width'];
			$image_height    = $atts['image_height'];
			ob_start();
			?>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 _item">
                <div class="vk-cat-item ">

                    <a class="thumb" href="<?php echo get_category_link($term); ?>">
						<img src="<?php echo $url_images; ?>" alt="<?php echo $term->name; ?>" width="120" height="120">
                    </a>


                    <div class="vk-cat-item__brief">
                        <h3 class="vk-cat-item__title">
                        	<a class="thumb" href="<?php echo get_category_link($term_id); ?>" title="">
								<?php echo $term->name; ?>
	                        </a>
                        </h3>
                    </div>
                </div> <!--./vk-cat-item-->
            </div>
			<?php
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Category', $html, $atts, $content );
		}
	}

	new Shortcode_Category();
}