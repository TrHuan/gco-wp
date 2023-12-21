<?php
if ( ! class_exists( 'Shortcode_Html' ) ) {
	class Shortcode_Html extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'html';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'html', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class   = array( 'lth-html' );
			$css_class[] = $atts['style'];
			$css_class[] = $atts['el_class'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'html', $atts );
			$html_content = $atts['html_content'];

			ob_start();
			?>
            <div class="<?php echo esc_attr( implode( ' ', $css_class ) ); ?>">
                <?php echo $html_content; ?>
            </div>
			<?php $html = ob_get_clean();

			return apply_filters( 'Shortcode_Html', $html, $atts, $content );
		}
	}

	new Shortcode_Html();
}