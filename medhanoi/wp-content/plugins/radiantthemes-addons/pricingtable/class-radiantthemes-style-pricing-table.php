<?php
/**
 * Pricing Table Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Pricing_Table' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Pricing_Table extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Pricing Item', 'radiantthemes-addons' ),
					'base'        => 'rt_pricing_table_style',
					'description' => esc_html__( 'Add pricing item with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/pricingtable/icon/PricingTable-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_blog_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Pricing Style', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_style_variation',
							'value'       => array(
								esc_html__( 'Style One (Detailed)', 'radiantthemes-addons' )       => 'one',
								esc_html__( 'Style Two (Minimal)', 'radiantthemes-addons' )        => 'two',
								esc_html__( 'Style Three (Detailed)', 'radiantthemes-addons' )     => 'three',
								esc_html__( 'Style Four (Minimal)', 'radiantthemes-addons' )       => 'four',
								esc_html__( 'Style Five (With Image)', 'radiantthemes-addons' )    => 'five',
								esc_html__( 'Style Six (Super Minimal)', 'radiantthemes-addons' )  => 'six',
								esc_html__( 'Style Seven (With Image)', 'radiantthemes-addons' )   => 'seven',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'attach_image',
							'heading'     => esc_html__( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_image',
							'dependency'  => array(
								'element' => 'pricing_table_style_variation',
								'value'   => array( 'five', 'seven' ),
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Title', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_title',
							'value'       => esc_html__( 'Basic Pack', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Subtitle', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_subtitle',
							'value'       => '',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Currency Symbol', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_currency_symbol',
							'value'       => '$',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Price (Without Currency Symbol)', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_price',
							'value'       => '199',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Period', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_period',
							'value'       => esc_html__( 'Per Month', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Tagline', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_tagline',
							'value'       => '',
							'admin_label' => true,
						),
						array(
							'type'        => 'textarea_html',
							'heading'     => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name'  => 'content',
							'value'       => '',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Button | Title', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_button',
							'value'       => esc_html__( 'Sign Up Now!', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Button | Link', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_button_link',
							'admin_label' => true,
						),
						array(
							'type'        => 'checkbox',
							'heading'     => esc_html__( 'Highlight', 'radiantthemes-addons' ),
							'description' => esc_html__( 'If checked, item will be highlight By priority', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'spotlight',
							),
							'param_name'  => 'pricing_table_highlight',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_color',
							'description' => esc_html__( 'Set your Pricing Table Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
					),
				)
			);
			add_shortcode( 'rt_pricing_table_style', array( $this, 'radiantthemes_pricing_table_style_func' ) );
		}

		/**
		 * [radiantthemes_pricing_table_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_pricing_table_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'pricing_table_style_variation' => 'one',
					'pricing_table_image'           => '',
					'pricing_table_title'           => 'This is pricing item element',
					'pricing_table_subtitle'        => '',
					'pricing_table_currency_symbol' => '$',
					'pricing_table_price'           => '199',
					'pricing_table_period'          => 'Per Month',
					'pricing_table_tagline'         => '',
					'pricing_table_button'          => 'Buy Now!',
					'pricing_table_button_link'     => '',
					'pricing_table_highlight'       => '',
					'pricing_table_color'           => '',
					'animation'                     => '',
					'extra_class'                   => '',
					'extra_id'                      => '',
				),
				$atts
			);

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );

			wp_register_style(
				'radiantthemes_pricing_table_' . $shortcode['pricing_table_style_variation'] . '',
				plugins_url( 'radiantthemes-addons/pricingtable/css/radiantthemes-pricing-table-element-' . $shortcode['pricing_table_style_variation'] . '.css' ),
				array()
			);
			wp_enqueue_style( 'radiantthemes_pricing_table_' . $shortcode['pricing_table_style_variation'] . '' );

			$random_class = 'rt' . wp_rand();
			if ( $shortcode['pricing_table_color'] ) {
				$custom_css = ".rt-pricing-table.element-one.{$random_class} > .holder > .more .btn,
            .rt-pricing-table.element-two.{$random_class} > .holder > .more .btn,
            .rt-pricing-table.element-three.{$random_class}.spotlight > .holder > .heading,
            .rt-pricing-table.element-three.{$random_class}:hover > .holder > .heading,
            .rt-pricing-table.element-three.{$random_class} > .holder > .list .btn,
            .rt-pricing-table.element-four.{$random_class} > .holder > .more .btn,
            .rt-pricing-table.element-five.{$random_class} > .holder > .more .btn,
            .rt-pricing-table.element-six.{$random_class} > .holder > .more .btn{
            	border-color: {$shortcode['pricing_table_color']} ;
            }

            .rt-pricing-table.element-one.{$random_class} > .holder > .pricing .price,
            .rt-pricing-table.element-one.{$random_class} > .holder > .more .btn,
            .rt-pricing-table.element-two.{$random_class}.spotlight > .holder > .heading .title,
            .rt-pricing-table.element-two.{$random_class}:hover > .holder > .heading .title,
            .rt-pricing-table.element-two.{$random_class} > .holder > .more .btn,
            .rt-pricing-table.element-three.{$random_class}.spotlight > .holder > .list ul li:before,
            .rt-pricing-table.element-three.{$random_class}:hover > .holder > .list ul li:before,
            .rt-pricing-table.element-three.{$random_class} > .holder > .list .btn,
            .rt-pricing-table.element-four.{$random_class} > .holder > .pricing .price,
            .rt-pricing-table.element-four.{$random_class} > .holder > .more .btn,
            .rt-pricing-table.element-six.{$random_class} > .holder > .more .btn{
            	color: {$shortcode['pricing_table_color']} ;
            }

            .rt-pricing-table.element-one.{$random_class}.spotlight > .holder > .pricing .period,
            .rt-pricing-table.element-one.{$random_class}:hover > .holder > .pricing .period,
            .rt-pricing-table.element-one.{$random_class}.spotlight > .holder > .more .btn,
            .rt-pricing-table.element-one.{$random_class}:hover > .holder > .more .btn,
            .rt-pricing-table.element-two.{$random_class}.spotlight > .holder > .more .btn,
            .rt-pricing-table.element-two.{$random_class}:hover > .holder > .more .btn,
            .rt-pricing-table.element-three.{$random_class}.spotlight > .holder > .heading,
            .rt-pricing-table.element-three.{$random_class}:hover > .holder > .heading,
            .rt-pricing-table.element-three.{$random_class}.spotlight > .holder > .list .btn,
            .rt-pricing-table.element-three.{$random_class}:hover > .holder > .list .btn,
            .rt-pricing-table.element-four.{$random_class}.spotlight > .holder:before,
            .rt-pricing-table.element-four.{$random_class}:hover > .holder:before,
            .rt-pricing-table.element-four.{$random_class}.spotlight > .holder > .more .btn,
            .rt-pricing-table.element-four.{$random_class}:hover > .holder > .more .btn,
            .rt-pricing-table.element-five.{$random_class} > .holder > .more .btn,
            .rt-pricing-table.element-six.{$random_class}:hover > .holder > .more .btn,
            .rt-pricing-table.element-seven.{$random_class} > .holder > .more .btn{
            	background-color: {$shortcode['pricing_table_color']} ;
            }";
				wp_add_inline_style( 'radiantthemes_pricing_table_' . $shortcode['pricing_table_style_variation'] . '', $custom_css );
			}
			$pricing_table_id = $shortcode['extra_id'] ? 'id="' . $shortcode['extra_id'] . '"' : '';

			$output  = '<!-- rt-pricing-table -->';
			$output .= '<div class="rt-pricing-table element-' . $shortcode['pricing_table_style_variation'] . ' ' . $shortcode['pricing_table_highlight'] . ' ' . $animation_classes . ' ' . $random_class . ' ' . $shortcode['extra_class'] . '"  ' . $pricing_table_id . ' >';

			require 'template/template-pricing-item-' . $shortcode['pricing_table_style_variation'] . '.php';

			$output .= '</div>' . "\r";
			$output .= '<!-- rt-pricing-table -->' . "\r";

			return $output;
		}
	}
}
