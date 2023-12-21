<?php
if ( ! class_exists( 'Shortcode_Tabs' ) ) {
	class Shortcode_Tabs extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'tabs2';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public static function generate_css( $atts )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'tabs2', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css        = '';
			$tabs_color = $atts['tab_color'] != '' ? $atts['tab_color'] : '#000';

			return $css;
		}

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'tabs2', $atts ) : $atts;
			// Extract shortcode parameters.
			extract(
				shortcode_atts(
					$this->default_atts,
					$atts
				)
			);
			$css_class   = array( 'lth-tabs' );
			$css_class[] = $atts['el_class'];
			$css_class[] = $atts['tabs_custom_id'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'tabs2', $atts );
			$sections    = self::get_all_attributes( 'vc_tta_section', $content );
			$rand        = uniqid();
			ob_start();
			?>
            <div class="<?php echo esc_attr( implode( ' ', $css_class ) ); ?>">
				<?php if ( $sections && is_array( $sections ) && count( $sections ) > 0 ): ?>
                    <div class="tab-head">
                        <ul class="tab-link">
							<?php foreach ( $sections as $key => $section ): ?>
                                <li class="<?php if ( $key == $atts['active_section'] ): ?>active<?php endif; ?>">
                                    <a <?php echo $key == $atts['active_section'] ? 'class="loaded"' : ''; ?>
                                            data-ajax="<?php echo esc_attr( $atts['ajax_check'] ) ?>"
                                            data-animate="<?php echo esc_attr( $atts['css_animation'] ); ?>"
                                            data-section="<?php echo esc_attr( $section['tab_id'] ); ?>"
                                            data-id="<?php echo get_the_ID(); ?>"
                                            href="#<?php echo esc_attr( $section['tab_id'] ); ?>-<?php echo esc_attr( $rand ); ?>">
										<?php if ( isset( $section['title_image'] ) ) :
											$image_thumb = resize_image( $section['title_image'], $tab_link_width, $tab_link_height, true );
											?>
                                            <figure><?php echo wp_specialchars_decode( $image_thumb['img'] ); ?></figure>
										<?php else : ?>
                                            <span><?php echo isset( $section['title'] ) ? esc_html( $section['title'] ) : ''; ?></span>
										<?php endif; ?>
                                    </a>
                                </li>
							<?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="content-tabs <?php echo ( $atts['use_tabs_filter'] == true ) ? esc_attr( 'has-filter' ) : ''; ?>">
                        <div class="tab-container">
							<?php foreach ( $sections as $key => $section ): ?>
                                <div class="tab-panel <?php if ( $key == $atts['active_section'] ): ?>active<?php endif; ?>"
                                     id="<?php echo esc_attr( $section['tab_id'] ); ?>-<?php echo esc_attr( $rand ); ?>">
									<?php if ( $atts['ajax_check'] == '1' ) :
										echo $key == $atts['active_section'] ? do_shortcode( $section['content'] ) : '';
									else :
										echo do_shortcode( $section['content'] );
									endif; ?>
                                </div>
							<?php endforeach; ?>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
			<?php
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Tabs', $html, $atts, $content );
		}
	}

	new Shortcode_Tabs();
}