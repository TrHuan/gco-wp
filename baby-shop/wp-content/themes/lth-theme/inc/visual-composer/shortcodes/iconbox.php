<?php
if ( ! class_exists( 'Shortcode_Iconbox' ) ) {
	class Shortcode_Iconbox extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'iconbox';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'iconbox', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class   = array( 'lth-iconbox' );
			$css_class[] = $atts['el_class'];
			$css_class[] = $atts['style'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'iconbox', $atts );

			if ( $atts['icon_type'] == 'image' ) {
				$icon = wp_get_attachment_image( $atts['icon_img'], 'full' );
			} else {
				$icon = '<span class="' . $atts[ 'icon_' . $atts['icon_type'] ] . '"></span>';
			}

			$link_icon        = vc_build_link( $atts['link'] );
			$link_icon['url'] = apply_filters( 'shortcode_vc_link', $link_icon['url'] );
			ob_start();
			?>
          <div class="col-lg-4 _item">
              <div class="vk-service-item">
                  <div class="vk-img vk-img--mw100">
                      <?php if ( $link_icon['url'] ) : ?>
	                     <a href="<?php echo esc_url( $link_icon['url'] ); ?>"
	                       target="<?php echo esc_attr( $link_icon['target'] ); ?>" class="icon">
									<?php echo wp_specialchars_decode( $icon ); ?>
	                     </a>
							<?php else: ?>
	                     <div class="icon"><?php echo wp_specialchars_decode( $icon ); ?></div>
							<?php endif; ?>
                  </div>
                  <div class="vk-service-item__brief">
                      <h3 class="vk-service-item__title">
                      	<a href="<?php echo esc_url( $link_icon['url'] ); ?>"
	                         target="<?php echo esc_attr( $link_icon['target'] ); ?>">
									<?php echo esc_html( $atts['title'] ); ?> <br> <?php echo wp_specialchars_decode( $atts['text_content'] ); ?>
	                      </a>
                      </h3>
                  </div>
              </div>
          </div> <!--./item-->
			<?php
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Iconbox', $html, $atts, $content );
		}
	}

	new Shortcode_Iconbox();
}