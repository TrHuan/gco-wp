<?php
if ( ! class_exists( 'Shortcode_Testimonials' ) ) {
	class Shortcode_Testimonials extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'testimonials';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'testimonials', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class                = array( 'lth-testimonials equal-container better-height' );
			$css_class[]              = $atts['el_class'];
			$css_class[]              = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'testimonials', $atts );
			$args                     = array(
				'post_type'           => 'testimonial',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'suppress_filter'     => true,
				'orderby'             => $atts['orderby'],
				'order'               => $atts['order'],
				'posts_per_page'      => $atts['per_page'],
			);
			$loop_posts               = new WP_Query( $args );
			ob_start();
			?>
            <div class="<?php echo esc_attr( implode( ' ', $css_class ) ); ?>">
				<?php if ( $loop_posts->have_posts() ) : ?>
                    <div class="testimonials-list-owl owl-slick <?php echo esc_attr( $class_dot ); ?>" <?php echo esc_attr( $owl_settings ); ?>>
						<?php while ( $loop_posts->have_posts() ) : $loop_posts->the_post();
							get_template_part('template-parts/testimonial/content', '');
						endwhile; ?>
                    </div>
				<?php else :
					get_template_part( 'content', 'none' );
				endif; ?>
            </div>
			<?php
			wp_reset_postdata();
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Testimonials', $html, $atts, $content );
		}
	}

	new Shortcode_Testimonials();
}