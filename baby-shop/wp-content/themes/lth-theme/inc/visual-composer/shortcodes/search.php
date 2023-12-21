<?php
if ( ! class_exists( 'Shortcode_Search' ) ) {
    class Shortcode_Search extends Shortcode
    {
        /**
         * Shortcode name.
         *
         * @var  string
         */
        public $shortcode = 'search';
        /**
         * Default $atts .
         *
         * @var  array
         */
        public $default_atts = array();

        public function output_html( $atts, $content = null )
        {
            $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'search', $atts ) : $atts;
            // Extract shortcode parameters.
            extract( $atts );
            $css_class   = array( 'lth-search' );
            $css_class[] = $atts['el_class'];
            if ( ! empty( $atts['search_type'] ) ) {
                $css_class[] = 'search-' . $atts['search_type'];
            }
            $css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'search', $atts );
            ob_start();
            ?>
            <div class="<?php echo esc_attr( implode( ' ', $css_class ) ); ?>" <?php if ($position == 'yes') { ?>style="position: relative; display: flex; flex-wrap: wrap; justify-content: center; align-items: center;"<?php } ?>> 
                <?php get_search_form(); ?>
            </div>
            <?php
            $html = ob_get_clean();

            return apply_filters( 'Shortcode_Search', $html, $atts, $content );
        }
    }

    new Shortcode_Search();
}