<?php
if ( ! class_exists( 'Shortcode_Shopcart' ) ) {
    class Shortcode_Shopcart extends Shortcode
    {
        /**
         * Shortcode name.
         *
         * @var  string
         */
        public $shortcode = 'shopcart';
        /**
         * Default $atts .
         *
         * @var  array
         */
        public $default_atts = array();

        public function output_html( $atts, $content = null )
        {
            $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'shopcart', $atts ) : $atts;
            // Extract shortcode parameters.
            extract( $atts );
            $css_class   = array( 'lth-shopcart' );
            $css_class[] = $atts['el_class'];
            $css_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '', 'shopcart', $atts );
            // $url_images     = wp_get_attachment_image_url( $atts['logo_image'], 'full' );
            global $woocommerce;
            ob_start();
            ?>
            <div class="<?php echo esc_attr( implode( ' ', $css_class ) ); ?>" <?php if ($position == 'yes') { ?>style="position: relative; display: flex; flex-wrap: wrap; justify-content: center; align-items: center;"<?php } ?>> 
                <div class="cart-header clearfix">
                    <?php require_once(WOO_DIR . '/cart/header-cart-ajax.php'); ?>
                </div>
            </div>
            <?php
            $html = ob_get_clean();

            return apply_filters( 'Shortcode_Shopcart', $html, $atts, $content );
        }
    }

    new Shortcode_Shopcart();
}