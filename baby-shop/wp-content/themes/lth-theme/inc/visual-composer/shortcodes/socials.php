<?php
if ( ! class_exists( 'Shortcode_Socials' ) ) {
	class Shortcode_Socials extends Shortcode
	{
		/**
		 * Shortcode name.
		 *
		 * @var  string
		 */
		public $shortcode = 'socials';
		/**
		 * Default $atts .
		 *
		 * @var  array
		 */
		public $default_atts = array();

		public function output_html( $atts, $content = null )
		{
			$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'socials', $atts ) : $atts;
			// Extract shortcode parameters.
			extract( $atts );
			$css_class   = array( 'lth-socials' );
			$css_class[] = $atts['el_class'];
			$css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'socials', $atts );
			ob_start();
			?>
            <div class="<?php echo esc_attr( implode( ' ', $css_class ) ); ?>">
					<?php if( have_rows('socials', 'option') ): ?> 
               	<ul class="socials">
					      <?php while( have_rows('socials', 'option') ): the_row(); ?>
				            <?php
				                $title = get_sub_field('title', 'option');
				                $url = get_sub_field('url', 'option');
				                $icon_image = get_sub_field('icon_image', 'option');
				                $icon_class = get_sub_field('icon_class', 'option');
				            ?>

				            <li>
				                <a href="<?php if ($url) {echo $url;} else { echo '#';} ?>" title="Icon" target="_blank" rel="noopener">
				                    <?php if ($icon_image || $icon_class) { ?>
				                        <span class="icon">
				                            <?php if ($icon_image) { ?>
				                                <img src="<?php echo $icon_image; ?>" alt="Social"  width="60" height="60">
				                            <?php } else { ?>
				                                <i class="<?php echo $icon_class; ?>"></i>
				                            <?php } ?>
				                        </span>
				                    <?php } ?>

				                    <?php if ($title) { ?>
				                        <span class="icon-title"><?php echo $title; ?></span>
				                    <?php } ?>
				                </a>
				            </li>
					      <?php endwhile; ?>
					   </ul>
					<?php endif; ?>
            </div>
			<?php
			$html = ob_get_clean();

			return apply_filters( 'Shortcode_Socials', $html, $atts, $content );
		}
	}

	new Shortcode_Socials();
}