<?php
if ( ! class_exists( 'Shortcode_Slider' ) ) {
	class Shortcode_Slider extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'slider';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'slider', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class   = array( 'lth-slider' );
			$css_class[] = $atts['el_class'];
			$css_class[] = $atts['slider_custom_id'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'slider', $atts );
			$owl_class    = array( 'owl-slick' );

			ob_start();
			?>
			<?php if ($atts['groups_style'] == '1') { ?>
	            <div class="vk-home__banner">
		            <div class="container">
		                <div class="vk-slider--style-2" data-slider="banner" data-url-img="<?php echo ASSETS_URI; ?>">
		                	<?php echo wpb_js_remove_wpautop( $content ); ?>
		                </div>
		            </div>
		        </div>
		    <?php } elseif ($atts['groups_style'] == '2') { ?>
		    	<div class="vk-home__cat mb-4">
		            <div class="container">
		                <div class="row">
		                	<?php echo wpb_js_remove_wpautop( $content ); ?>
		                </div>

		            </div>
		        </div>
		    <?php } elseif ($atts['groups_style'] == '3') { ?>
		        <div class="vk-home__cat mb-4">
		            <div class="container">
		                <div class="vk-shop__box vk-shop__box--style-2">

		                    <div class="vk-cat__list row no-gutters">
		                    	<?php echo wpb_js_remove_wpautop( $content ); ?>
		                    </div>
		                </div> <!--./box-->
		            </div>
		        </div>
		    <?php } elseif ($atts['groups_style'] == '4') { ?>
		    	<div class="vk-services">
		    		<div class="container">
                        <div class="vk-service__list row">
                        	<?php echo wpb_js_remove_wpautop( $content ); ?>
                        </div>
                    </div>
                </div>
		    <?php } elseif ($atts['groups_style'] == '5') { ?>
		    	<div class="vk-shop__mid">
                    <div class="vk-shop__row row no-gutters align-items-center">
                        <div class="col-lg-3 _left">
                            <h2 class="vk-sidebar__title mb-0"><?php echo $atts['groups_title']; ?></h2>
                        </div> <!--./left-->
                        <div class="col-lg-9 _right">
                            <div class="vk-brand__list vk-slider--style-1" data-slider="brand">
                            	<?php echo wpb_js_remove_wpautop( $content ); ?>
                            </div> <!--./list-->
                        </div><!--./right-->
                    </div>
                </div> <!--./mid-->
		    <?php } ?>
			<?php
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Slider', $html, $atts, $content );
		}
	}

	new Shortcode_Slider();
}