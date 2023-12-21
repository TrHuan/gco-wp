<?php
if ( ! class_exists( 'Shortcode_Logo' ) ) {
	class Shortcode_Logo extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'logo';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'logo', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class   = array( 'lth-logo' );
			$css_class[] = $atts['el_class'];
			if ( ! empty( $atts['logo_type'] ) ) {
				$css_class[] = 'logo-' . $atts['logo_type'];
			}
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'logo', $atts );
			$url_images     = wp_get_attachment_image_url( $atts['logo_image'], 'full' );
			ob_start();
			?>
            <div class="<?php echo esc_attr( implode( ' ', $css_class ) ); ?>" <?php if ($position == 'yes') { ?>style="position: relative; display: flex; flex-wrap: wrap; justify-content: center; align-items: center;"<?php } ?>> 
				<?php 
					$logo = get_field('logo', 'option');
					$w = get_field('width_logo', 'option');
					$h = get_field('height_logo', 'option');
				?>

				<?php if ( $atts['logo_image'] ) { ?>
					<a href="<?php echo get_home_url( $lang ); ?>" title="">
						<img src="<?php echo esc_url( $url_images ); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" style="max-width: <?php echo $w; ?>px;">
					</a>
				<?php } elseif ($logo) { ?>
					<a href="<?php echo get_home_url( $lang ); ?>" title="">
						<img src="<?php echo lth_custom_logo('full', $w, $h); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
					</a>
				<?php } else { ?>
					<h2>
				        <a href="<?php echo get_home_url( $lang ); ?>" title="" class="title"><?php bloginfo('title'); ?></a>
				        <p><?php bloginfo('description'); ?></p>
				    </h2>
				<?php } ?>
			</div>
			<?php
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Logo', $html, $atts, $content );
		}
	}

	new Shortcode_Logo();
}