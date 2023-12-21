<?php

if ( ! class_exists( 'Shortcode_Newsletter' ) ) {

	class Shortcode_Newsletter extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'newsletter';

		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'newsletter', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );

			$css_class   = array( 'lth-newsletter' );
			$css_class[] = $atts['el_class'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'newsletter', $atts );
			$contact_form_7 = $atts['contact_form_7'];
			ob_start();
			?>
            <div class="<?php echo esc_attr( implode( ' ', $css_class ) ); ?>"
                 style="<?php if ($atts['background_image']) { echo 'background-image: ' .wp_get_attachment_image_url( $atts['background_image'], 'full' ).';'; } else { echo 'background-color: '.$atts['background_color'].';';  } ?>">
                 <?php echo $atts['contact_form_7']; ?>
            </div>
			<?php
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Newsletter', $html, $atts, $content );
		}
	}

	new Shortcode_Newsletter();
}