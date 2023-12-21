<?php
if ( ! class_exists( 'Shortcode_Slideritem' ) ) {
	class Shortcode_Slideritem extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'slideritem';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'slideritem', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class   = array( 'lth-slideritem' );
			$css_class[] = $atts['el_class'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'slideritem', $atts );
			$url_images     = wp_get_attachment_image_url( $atts['banner_img'], 'full' );
			$banner_link    = vc_build_link( $atts['banner_link'] );
			$image_width    = $atts['image_width'];
			$image_height    = $atts['image_height'];
			ob_start();
			?>
	        <div class="_item">
                <div class="vk-banner vk-img">
                    <?php if ( $banner_link['url'] ) :
							$banner_link['url'] = apply_filters( 'shortcode_vc_link', $banner_link['url'] );
							?>
                        <a href="<?php echo esc_url( $banner_link['url'] ); ?>"
                         target="<?php echo esc_attr( $banner_link['target'] ); ?>">
                         	<img src="<?php echo esc_url( $url_images ) ?>" alt="<?php echo get_the_title(); ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>">
                        </a>
					<?php else: ?>
                        <figure class="thumb-link">
                        	<img src="<?php echo esc_url( $url_images ) ?>" alt="<?php echo get_the_title(); ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>">
                        </figure>
					<?php endif; ?>
                </div>
            </div>
			<?php
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Slideritem', $html, $atts, $content );
		}
	}

	new Shortcode_Slideritem();
}