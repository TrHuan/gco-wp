<?php
if ( ! class_exists( 'Shortcode_Lookbook' ) ) {
	class Shortcode_Lookbook extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'lookbook';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'lookbook', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class   = array( 'lth-lookbook' );
			$css_class[] = $atts['el_class'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'lookbook', $atts );
			ob_start();
			?>
            <div class="<?php echo esc_attr( implode( ' ', $css_class ) ); ?>">
				<?php
				if ( $atts['avatar'] ) {
					$image_thumb = wp_get_attachment_image( $atts['avatar'], 'full' );
					echo '<figure>' . wp_specialchars_decode( $image_thumb ) . '</figure>';
				}
				?>
				<?php if ( $atts['name'] ): ?>
                    <h4 class="name"><?php echo esc_html( $atts['name'] ); ?></h4>
				<?php endif; ?>
				<?php if ( $atts['dir'] ): ?>
                    <p class="dir"><?php echo esc_html( $atts['dir'] ); ?></p>
				<?php endif; ?>
            </div>
			<?php
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Lookbook', $html, $atts, $content );
		}
	}

	new Shortcode_Lookbook();
}