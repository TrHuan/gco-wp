<?php
if ( !class_exists( 'Visual_Composer' ) ) {
	class Visual_Composer
	{
		public $data_responsive;

		public function __construct()
		{
			$this->define_constants();
			add_filter( 'generate_carousel_data_attributes', array( $this, 'generate_carousel_data_attributes' ), 10, 2 );
			add_filter( 'vc_iconpicker-type-elementorcustomfonts', array( $this, 'iconpicker_type_elementorcustomfonts' ) );
			// add_filter( 'getProducts', array( $this, 'getProducts' ), 10, 3 );
			add_action( 'vc_after_mapping', array( $this, 'autocomplete' ) );
			add_action( 'vc_before_init', array( $this, 'map_shortcode' ) );
		}

		/**
		 * Define  Constants.
		 */
		private function define_constants()
		{
			
		}

		/**
		 * Define constant if not already set.
		 *
		 * @param  string $name
		 * @param  string|bool $value
		 */
		private function define( $name, $value )
		{
			if ( !defined( $name ) ) {
				define( $name, $value );
			}
		}

		/**
		 * load param autocomplete render
		 * */
		public function autocomplete()
		{
			add_filter( 'vc_autocomplete_blog_post_ids_callback', array( $this, 'vc_include_field_search' ), 10, 1 );
			add_filter( 'vc_autocomplete_blog_post_ids_render', 'vc_include_field_render', 10, 1 );
			add_filter( 'vc_autocomplete_productsslider_ids_callback', array( $this, 'productIdAutocompleteSuggester' ), 10, 1 );
			add_filter( 'vc_autocomplete_productsgrid_ids_callback', array( $this, 'productIdAutocompleteSuggester' ), 10, 1 );
			add_filter( 'vc_autocomplete_productsslider_ids_render', array( $this, 'productIdAutocompleteRender' ), 10, 1 );
			add_filter( 'vc_autocomplete_banner_ids_callback', array( $this, 'productIdAutocompleteSuggester' ), 10, 1 );
			add_filter( 'vc_autocomplete_banner_ids_render', array( $this, 'productIdAutocompleteRender' ), 10, 1 );
		}

		public function getCategoryChildsFull( $parent_id, $array, $level, &$dropdown )
		{
			$keys = array_keys( $array );
			$i    = 0;
			while ( $i < count( $array ) ) {
				$key  = $keys[$i];
				$item = $array[$key];
				$i++;
				if ( $item->category_parent == $parent_id ) {
					$name       = str_repeat( '- ', $level ) . $item->name;
					$value      = $item->slug;
					$dropdown[] = array(
						'label' => $name . '(' . $item->count . ')',
						'value' => $value,
					);
					unset( $array[$key] );
					$array = $this->getCategoryChildsFull( $item->term_id, $array, $level + 1, $dropdown );
					$keys  = array_keys( $array );
					$i     = 0;
				}
			}

			return $array;
		}

		/**
		 * Suggester for autocomplete by id/name/title/sku
		 * @since 4.4
		 *
		 * @param $query
		 *
		 * @return array - id's from products with title/sku.
		 */
		public function productIdAutocompleteSuggester( $query )
		{
			global $wpdb;
			$product_id      = (int)$query;
			$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.ID AS id, a.post_title AS title, b.meta_value AS sku
					FROM {$wpdb->posts} AS a
					LEFT JOIN ( SELECT meta_value, post_id  FROM {$wpdb->postmeta} WHERE `meta_key` = '_sku' ) AS b ON b.post_id = a.ID
					WHERE a.post_type = 'product' AND ( a.ID = '%d' OR b.meta_value LIKE '%%%s%%' OR a.post_title LIKE '%%%s%%' )", $product_id > 0 ? $product_id : -1, stripslashes( $query ), stripslashes( $query )
			), ARRAY_A
			);
			$results         = array();
			if ( is_array( $post_meta_infos ) && !empty( $post_meta_infos ) ) {
				foreach ( $post_meta_infos as $value ) {
					$data          = array();
					$data['value'] = $value['id'];
					$data['label'] = esc_html__( 'Id', 'elementor' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'elementor' ) . ': ' . $value['title'] : '' ) . ( ( strlen( $value['sku'] ) > 0 ) ? ' - ' . esc_html__( 'Sku', 'elementor' ) . ': ' . $value['sku'] : '' );
					$results[]     = $data;
				}
			}

			return $results;
		}

		/**
		 * Find product by id
		 * @since 4.4
		 *
		 * @param $query
		 *
		 * @return bool|array
		 */
		public function productIdAutocompleteRender( $query )
		{
			$query = trim( $query['value'] ); // get value from requested
			if ( !empty( $query ) ) {
				// get product
				$product_object = wc_get_product( (int)$query );
				if ( is_object( $product_object ) ) {
					$product_sku         = $product_object->get_sku();
					$product_title       = $product_object->get_title();
					$product_id          = $product_object->get_id();
					$product_sku_display = '';
					if ( !empty( $product_sku ) ) {
						$product_sku_display = ' - ' . esc_html__( 'Sku', 'elementor' ) . ': ' . $product_sku;
					}
					$product_title_display = '';
					if ( !empty( $product_title ) ) {
						$product_title_display = ' - ' . esc_html__( 'Title', 'elementor' ) . ': ' . $product_title;
					}
					$product_id_display = esc_html__( 'Id', 'elementor' ) . ': ' . $product_id;
					$data               = array();
					$data['value']      = $product_id;
					$data['label']      = $product_id_display . $product_title_display . $product_sku_display;

					return !empty( $data ) ? $data : false;
				}

				return false;
			}

			return false;
		}

		function vc_include_field_search( $search_string )
		{
			$query                           = $search_string;
			$data                            = array();
			$args                            = array(
				's'         => $query,
				'post_type' => 'post',
			);
			$args['vc_search_by_title_only'] = true;
			$args['numberposts']             = -1;
			if ( 0 === strlen( $args['s'] ) ) {
				unset( $args['s'] );
			}
			add_filter( 'posts_search', 'vc_search_by_title_only', 500, 2 );
			$posts = get_posts( $args );
			if ( is_array( $posts ) && !empty( $posts ) ) {
				foreach ( $posts as $post ) {
					$data[] = array(
						'value' => $post->ID,
						'label' => $post->post_title,
						'group' => $post->post_type,
					);
				}
			}

			return $data;
		}

		function bootstrap_settings( $dependency, $value_dependency )
		{
			$data_value     = array();
			$data_bootstrap = array(
				// array(
				// 	'type'       => 'dropdown',
				// 	'heading'    => esc_html__( 'Rows space', 'elementor' ),
				// 	'param_name' => 'boostrap_rows_space',
				// 	'value'      => array(
				// 		esc_html__( 'Default', 'elementor' ) => 'rows-space-0',
				// 		esc_html__( '10px', 'elementor' )    => 'rows-space-10',
				// 		esc_html__( '20px', 'elementor' )    => 'rows-space-20',
				// 		esc_html__( '30px', 'elementor' )    => 'rows-space-30',
				// 		esc_html__( '40px', 'elementor' )    => 'rows-space-40',
				// 		esc_html__( '50px', 'elementor' )    => 'rows-space-50',
				// 		esc_html__( '60px', 'elementor' )    => 'rows-space-60',
				// 		esc_html__( '70px', 'elementor' )    => 'rows-space-70',
				// 		esc_html__( '80px', 'elementor' )    => 'rows-space-80',
				// 		esc_html__( '90px', 'elementor' )    => 'rows-space-90',
				// 		esc_html__( '100px', 'elementor' )   => 'rows-space-100',
				// 	),
				// 	'std'        => 'rows-space-0',
				// 	'group'      => esc_html__( 'Boostrap settings', 'elementor' ),
				// 	'dependency' => array(
				// 		'element' => $dependency, 'value' => array( $value_dependency ),
				// 	),
				// ),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Items per row on Desktop', 'elementor' ),
					'param_name'  => 'boostrap_bg_items',
					'value'       => array(
						esc_html__( '1 item', 'elementor' )  => '12',
						esc_html__( '2 items', 'elementor' ) => '6',
						esc_html__( '3 items', 'elementor' ) => '4',
						esc_html__( '4 items', 'elementor' ) => '3',
						esc_html__( '5 items', 'elementor' ) => '15',
						esc_html__( '6 items', 'elementor' ) => '2',
					),
					'description' => esc_html__( '(Item per row on screen resolution of device >= 1500px )', 'elementor' ),
					'group'       => esc_html__( 'Boostrap settings', 'elementor' ),
					'std'         => '12',
					'dependency'  => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Items per row on Desktop', 'elementor' ),
					'param_name'  => 'boostrap_xl_items',
					'value'       => array(
						esc_html__( '1 item', 'elementor' )  => '12',
						esc_html__( '2 items', 'elementor' ) => '6',
						esc_html__( '3 items', 'elementor' ) => '4',
						esc_html__( '4 items', 'elementor' ) => '3',
						esc_html__( '5 items', 'elementor' ) => '15',
						esc_html__( '6 items', 'elementor' ) => '2',
					),
					'description' => esc_html__( '(Item per row on screen resolution of device >= 1200px and < 1500px )', 'elementor' ),
					'group'       => esc_html__( 'Boostrap settings', 'elementor' ),
					'std'         => '12',
					'dependency'  => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Items per row on tablet', 'elementor' ),
					'param_name'  => 'boostrap_lg_items',
					'value'       => array(
						esc_html__( '1 item', 'elementor' )  => '12',
						esc_html__( '2 items', 'elementor' ) => '6',
						esc_html__( '3 items', 'elementor' ) => '4',
						esc_html__( '4 items', 'elementor' ) => '3',
						esc_html__( '5 items', 'elementor' ) => '15',
						esc_html__( '6 items', 'elementor' ) => '2',
					),
					'description' => esc_html__( '(Item per row on screen resolution of device >= 992px and < 1200px )', 'elementor' ),
					'group'       => esc_html__( 'Boostrap settings', 'elementor' ),
					'std'         => '12',
					'dependency'  => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Items per row on landscape tablet', 'elementor' ),
					'param_name'  => 'boostrap_md_items',
					'value'       => array(
						esc_html__( '1 item', 'elementor' )  => '12',
						esc_html__( '2 items', 'elementor' ) => '6',
						esc_html__( '3 items', 'elementor' ) => '4',
						esc_html__( '4 items', 'elementor' ) => '3',
						esc_html__( '5 items', 'elementor' ) => '15',
						esc_html__( '6 items', 'elementor' ) => '2',
					),
					'description' => esc_html__( '(Item per row on screen resolution of device >=768px and < 992px )', 'elementor' ),
					'group'       => esc_html__( 'Boostrap settings', 'elementor' ),
					'std'         => '12',
					'dependency'  => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Items per row on portrait Mobile', 'elementor' ),
					'param_name'  => 'boostrap_sm_items',
					'value'       => array(
						esc_html__( '1 item', 'elementor' )  => '12',
						esc_html__( '2 items', 'elementor' ) => '6',
						esc_html__( '3 items', 'elementor' ) => '4',
						esc_html__( '4 items', 'elementor' ) => '3',
						esc_html__( '5 items', 'elementor' ) => '15',
						esc_html__( '6 items', 'elementor' ) => '2',
					),
					'description' => esc_html__( '(Item per row on screen resolution of device >=576px  add < 768px )', 'elementor' ),
					'group'       => esc_html__( 'Boostrap settings', 'elementor' ),
					'std'         => '12',
					'dependency'  => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Items per row on Mobile', 'elementor' ),
					'param_name'  => 'boostrap_xs_items',
					'value'       => array(
						esc_html__( '1 item', 'elementor' )  => '12',
						esc_html__( '2 items', 'elementor' ) => '6',
						esc_html__( '3 items', 'elementor' ) => '4',
						esc_html__( '4 items', 'elementor' ) => '3',
						esc_html__( '5 items', 'elementor' ) => '15',
						esc_html__( '6 items', 'elementor' ) => '2',
					),
					'description' => esc_html__( '(Item per row on screen resolution of device >=320px  add < 576px )', 'elementor' ),
					'group'       => esc_html__( 'Boostrap settings', 'elementor' ),
					'std'         => '12',
					'dependency'  => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
			);
			if ( $dependency == null && $value_dependency == null ) {
				foreach ( $data_bootstrap as $value ) {
					unset( $value['dependency'] );
					$data_value[] = $value;
				}
			} else {
				$data_value = $data_bootstrap;
			}

			return $data_value;
		}

		function carousel_settings( $dependency, $value_dependency )
		{
			$data_value    = array();
			$data_carousel = array(
				array(
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( '1 Row', 'elementor' )  => '1',
						esc_html__( '2 Rows', 'elementor' ) => '2',
						esc_html__( '3 Rows', 'elementor' ) => '3',
						esc_html__( '4 Rows', 'elementor' ) => '4',
						esc_html__( '5 Rows', 'elementor' ) => '5',
						esc_html__( '6 Rows', 'elementor' ) => '6',
					),
					'std'        => '1',
					'heading'    => esc_html__( 'The number of rows which are shown on block', 'elementor' ),
					'param_name' => 'owl_number_row',
					'group'      => esc_html__( 'Carousel settings', 'elementor' ),
					'dependency' => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Yes', 'elementor' ) => 'true',
						esc_html__( 'No', 'elementor' )  => 'false',
					),
					'std'        => 'false',
					'heading'    => esc_html__( 'Vertical Mode', 'elementor' ),
					'param_name' => 'owl_vertical',
					'group'      => esc_html__( 'Carousel settings', 'elementor' ),
					'dependency' => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Yes', 'elementor' ) => 'true',
						esc_html__( 'No', 'elementor' )  => 'false',
					),
					'std'        => 'false',
					'heading'    => esc_html__( 'verticalSwiping', 'elementor' ),
					'param_name' => 'owl_verticalswiping',
					'group'      => esc_html__( 'Carousel settings', 'elementor' ),
					'dependency' => array(
						'element' => 'owl_vertical', 'value' => array( 'true' ),
					),
				),
				array(
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Yes', 'elementor' ) => 'true',
						esc_html__( 'No', 'elementor' )  => 'false',
					),
					'std'        => 'false',
					'heading'    => esc_html__( 'AutoPlay', 'elementor' ),
					'param_name' => 'owl_autoplay',
					'group'      => esc_html__( 'Carousel settings', 'elementor' ),
					'dependency' => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'       => 'textfield',
					'heading'     => esc_html__( 'Autoplay Speed', 'elementor' ),
					'param_name'  => 'owl_autoplayspeed',
					'value'       => '1000',
					'suffix'      => esc_html__( 'milliseconds', 'elementor' ),
					'description' => esc_html__( 'Autoplay speed in milliseconds', 'elementor' ),
					'group'       => esc_html__( 'Carousel settings', 'elementor' ),
					'dependency'  => array(
						'element' => 'owl_autoplay', 'value' => array( 'true' ),
					),
				),
				array(
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'No', 'elementor' )  => 'false',
						esc_html__( 'Yes', 'elementor' ) => 'true',
					),
					'std'         => 'true',
					'heading'     => esc_html__( 'Navigation', 'elementor' ),
					'param_name'  => 'owl_navigation',
					'description' => esc_html__( "Show buton 'next' and 'prev' buttons.", 'elementor' ),
					'group'       => esc_html__( 'Carousel settings', 'elementor' ),
					'dependency'  => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'No', 'elementor' )  => 'false',
						esc_html__( 'Yes', 'elementor' ) => 'true',
					),
					'std'         => 'true',
					'heading'     => esc_html__( 'Dots', 'elementor' ),
					'param_name'  => 'owl_dots',
					'description' => esc_html__( "Show buton 'next' and 'prev' buttons.", 'elementor' ),
					'group'       => esc_html__( 'Carousel settings', 'elementor' ),
					'dependency'  => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Yes', 'elementor' ) => 'true',
						esc_html__( 'No', 'elementor' )  => 'false',
					),
					'std'         => 'false',
					'heading'     => esc_html__( 'Loop', 'elementor' ),
					'param_name'  => 'owl_loop',
					'description' => esc_html__( "Inifnity loop. Duplicate last and first items to get loop illusion.", 'elementor' ),
					'group'       => esc_html__( 'Carousel settings', 'elementor' ),
					'dependency'  => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
				),
				array(
					'type'       => 'textfield',
					'heading'     => esc_html__( 'Slide Speed', 'elementor' ),
					'param_name'  => 'owl_slidespeed',
					'value'       => '300',
					'suffix'      => esc_html__( 'milliseconds', 'elementor' ),
					'description' => esc_html__( 'Slide speed in milliseconds', 'elementor' ),
					'group'       => esc_html__( 'Carousel settings', 'elementor' ),
					'dependency'  => array(
						'element' => $dependency, 'value' => array( $value_dependency ),
					),
					'edit_field_class' => 'vc_col-sm-8',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( "The items on desktop (Screen resolution of device >= 1500px )", 'elementor' ),
					'param_name' => 'owl_ls_items',
					'value'      => '4',
					'suffix'     => esc_html__( 'item(s)', 'elementor' ),
					'group'      => esc_html__( 'Carousel settings', 'elementor' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( "The items on desktop (Screen resolution of device >= 1200px and < 1500px )", 'elementor' ),
					'param_name' => 'owl_xl_items',
					'value'      => '4',
					'suffix'     => esc_html__( 'item(s)', 'elementor' ),
					'group'      => esc_html__( 'Carousel settings', 'elementor' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( "The items on tablet (Screen resolution of device >= 992px < 1200px )", 'elementor' ),
					'param_name' => 'owl_lg_items',
					'value'      => '3',
					'suffix'     => esc_html__( 'item(s)', 'elementor' ),
					'group'      => esc_html__( 'Carousel settings', 'elementor' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( "The items on tablet (Screen resolution of device >=768px and < 992px )", 'elementor' ),
					'param_name' => 'owl_md_items',
					'value'      => '2',
					'suffix'     => esc_html__( 'item(s)', 'elementor' ),
					'group'      => esc_html__( 'Carousel settings', 'elementor' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( "The items on mobile landscape(Screen resolution of device >=576px and < 768px)", 'elementor' ),
					'param_name' => 'owl_sm_items',
					'value'      => '2',
					'suffix'     => esc_html__( 'item(s)', 'elementor' ),
					'group'      => esc_html__( 'Carousel settings', 'elementor' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( "The items on mobile landscape(Screen resolution of device >=320px and < 576px)", 'elementor' ),
					'param_name' => 'owl_ts_items',
					'value'      => '1',
					'suffix'     => esc_html__( 'item(s)', 'elementor' ),
					'group'      => esc_html__( 'Carousel settings', 'elementor' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
			);
			if ( $dependency == null && $value_dependency == null ) {
				$match = array(
					'owl_navigation_style',
					'owl_autoplayspeed',
					'owl_rows_space',
					'owl_verticalswiping',
				);
				foreach ( $data_carousel as $value ) {
					if ( !in_array( $value['param_name'], $match ) ) {
						unset( $value['dependency'] );
					}
					$data_value[] = $value;
				}
			} else {
				$data_value = $data_carousel;
			}

			return $data_value;
		}

		public function map_shortcode()
		{
			/* Map New product */
			$product_cat_array = array(
				esc_html__( 'All', 'elementor' ) => 'all',
			);
			$args             = array();
			$terms        = get_terms( 'product_cat', $args );
			foreach ( $terms  as $term ) {
				$product_cat_array[$term->name] = $term->term_id;
			}
			/* Map New blog */
			$categories_array = array(
				esc_html__( 'All', 'elementor' ) => '',
			);
			$args             = array();
			$categories       = get_categories( $args );
			foreach ( $categories as $category ) {
				$categories_array[$category->name] = $category->slug;
			}
			/* Map New Custom menu */
			$all_menu = array();
			$menus    = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
			if ( $menus && count( $menus ) > 0 ) {
				foreach ( $menus as $m ) {
					$all_menu[$m->name] = $m->slug;
				}
			}
			/* ADD PARAM*/
			// vc_add_params(
			// 	'blog',
			// 	$this->carousel_settings( null, null )
			// );
			// vc_add_params(
			// 	'productsslider',
			// 	$this->carousel_settings( null, null )
			// 	// array_merge( $this->carousel_settings( 'productsliststyle', 'owl' ), $this->bootstrap_settings( 'productsliststyle', 'grid' ) )
			// );
			// vc_add_params(
			// 	'productsgrid',
			// 	$this->bootstrap_settings( null, null )
			// 	// array_merge( $this->carousel_settings( 'productsliststyle', 'owl' ), $this->bootstrap_settings( 'productsliststyle', 'grid' ) )
			// );
			vc_add_params(
				'slider',
				$this->carousel_settings( null, null )
			);

			//////////////////////////

			vc_remove_element( 'vc_column_text' );
			vc_remove_element( 'vc_icon' );
			vc_remove_element( 'vc_zigzag' );
			vc_remove_element( 'vc_text_separator' );
			vc_remove_element( 'vc_hoverbox' );
			vc_remove_element( 'vc_facebook' );
			vc_remove_element( 'vc_tweetmeme' );
			vc_remove_element( 'vc_pinterest' );
			vc_remove_element( 'vc_toggle' );
			vc_remove_element( 'vc_single_image' );
			vc_remove_element( 'vc_gallery' );
			vc_remove_element( 'vc_images_carousel' );
			vc_remove_element( 'vc_tta_tabs' );
			vc_remove_element( 'vc_tta_tour' );
			vc_remove_element( 'vc_tta_accordion' );
			vc_remove_element( 'vc_message' );
			vc_remove_element( 'vc_tta_pageable' );
			vc_remove_element( 'vc_custom_heading' );
			vc_remove_element( 'vc_cta' );
			vc_remove_element( 'vc_widget_sidebar' );
			vc_remove_element( 'vc_posts_slider' );
			vc_remove_element( 'vc_raw_html' );
			vc_remove_element( 'vc_raw_js' );
			vc_remove_element( 'vc_flickr' );
			vc_remove_element( 'vc_basic_grid' );
			vc_remove_element( 'vc_media_grid' );
			vc_remove_element( 'vc_masonry_grid' );
			vc_remove_element( 'vc_masonry_media_grid' );
			vc_remove_element( 'vc_wp_search' );
			vc_remove_element( 'vc_wp_meta' );
			vc_remove_element( 'vc_wp_recentcomments' );
			vc_remove_element( 'vc_wp_calendar' );
			vc_remove_element( 'vc_wp_pages' );
			vc_remove_element( 'vc_wp_tagcloud' );
			vc_remove_element( 'vc_wp_custommenu' );
			vc_remove_element( 'vc_wp_text' );
			vc_remove_element( 'vc_wp_posts' );
			vc_remove_element( 'vc_wp_categories' );
			vc_remove_element( 'vc_wp_archives' );
			vc_remove_element( 'vc_wp_rss' );
			vc_remove_element( 'vc_gutenberg' );
			vc_remove_element( 'vc_acf' );
			
			// vc_remove_element( 'woocommerce_cart' );
			// vc_remove_element( 'woocommerce_checkout' );
			vc_remove_element( 'woocommerce_order_tracking' );
			vc_remove_element( 'woocommerce_my_account' );
			vc_remove_element( 'recent_products' );
			vc_remove_element( 'featured_products' );
			vc_remove_element( 'product' );
			vc_remove_element( 'products' );
			vc_remove_element( 'add_to_cart' );
			vc_remove_element( 'add_to_cart_url' );
			vc_remove_element( 'product_page' );
			vc_remove_element( 'product_category' );
			vc_remove_element( 'product_categories' );
			vc_remove_element( 'sale_products' );
			vc_remove_element( 'best_selling_products' );
			vc_remove_element( 'top_rated_products' );
			vc_remove_element( 'product_attribute' );

			//////////////////////////

			/* Map new Custom Logo. */
			// vc_map(
			// 	array(
			// 		'name'     => esc_html__( 'Elementor: Logo', 'elementor' ),
			// 		'base'     => 'logo',
			// 		'category' => esc_html__( 'Elements Builder', 'elementor' ),
			// 		'params'   => array(
			// 			array(
			// 				'type'       => 'attach_image',
			// 				'heading'    => esc_html__( 'Logo Image', 'elementor' ),
			// 				'param_name' => 'logo_image',
			// 			),
			// 		),
			// 	)
			// );

			/* Map new Custom Search. */
			// vc_map(
			// 	array(
			// 		'name'     => esc_html__( 'Elementor: Search', 'elementor' ),
			// 		'base'     => 'search',
			// 		'category' => esc_html__( 'Elements Builder', 'elementor' ),
			// 		'params'   => array(
			// 			// array(
			// 			// 	'type'       => 'attach_image',
			// 			// 	'heading'    => esc_html__( 'Search Icon', 'elementor' ),
			// 			// 	'param_name' => 'search_icon',
			// 			// ),
			// 		),
			// 	)
			// );

			//////////////////////////

			/* Map new Custom Heading. */
			// vc_map(
			// 	array(
			// 		'name'                    => esc_html__( 'Elementor: Custom Heading', 'elementor' ),
			// 		'base'                    => 'custom_heading',
			// 		'show_settings_on_create' => true,
			// 		'category'                => esc_html__( 'Elements Builder', 'elementor' ),
			// 		'description'             => esc_html__( 'Custom Heading content', 'elementor' ),
			// 		'params'                  => array(
			// 			array(
			// 				'type'        => 'dropdown',
			// 				'heading'     => esc_html__( 'Text source', 'elementor' ),
			// 				'param_name'  => 'source',
			// 				'value'       => array(
			// 					esc_html__( 'Custom text', 'elementor' )        => '',
			// 					esc_html__( 'Post or Page Title', 'elementor' ) => 'post_title',
			// 				),
			// 				'std'         => '',
			// 				'description' => esc_html__( 'Select text source.', 'elementor' ),
			// 			),
			// 			array(
			// 				'type'        => 'textarea',
			// 				'heading'     => esc_html__( 'Text', 'elementor' ),
			// 				'param_name'  => 'text',
			// 				'admin_label' => true,
			// 				'value'       => esc_html__( 'This is custom heading element', 'elementor' ),
			// 				'description' => esc_html__( 'Note: If you are using non-latin characters be sure to activate them under Settings/WPBakery Page Builder/General Settings.', 'elementor' ),
			// 				'dependency'  => array(
			// 					'element'  => 'source',
			// 					'is_empty' => true,
			// 				),
			// 			),
			// 			array(
			// 				'type'        => 'vc_link',
			// 				'heading'     => esc_html__( 'URL (Link)', 'elementor' ),
			// 				'param_name'  => 'link',
			// 				'description' => esc_html__( 'Add link to custom heading.', 'elementor' ),
			// 			),
			// 			array(
			// 				'type'       => 'font_container',
			// 				'param_name' => 'font_container',
			// 				'value'      => 'tag:h2|text_align:left',
			// 				'settings'   => array(
			// 					'fields' => array(
			// 						'tag'                     => 'h2',
			// 						// default value h2
			// 						'text_align',
			// 						'font_size',
			// 						'line_height',
			// 						'color',
			// 						'tag_description'         => esc_html__( 'Select element tag.', 'elementor' ),
			// 						'text_align_description'  => esc_html__( 'Select text alignment.', 'elementor' ),
			// 						'font_size_description'   => esc_html__( 'Enter font size.', 'elementor' ),
			// 						'line_height_description' => esc_html__( 'Enter line height.', 'elementor' ),
			// 						'color_description'       => esc_html__( 'Select heading color.', 'elementor' ),
			// 					),
			// 				),
			// 			),
			// 			array(
			// 				'type'        => 'checkbox',
			// 				'heading'     => esc_html__( 'Use theme default font family?', 'elementor' ),
			// 				'param_name'  => 'use_theme_fonts',
			// 				'value'       => array( esc_html__( 'Yes', 'elementor' ) => 'yes' ),
			// 				'description' => esc_html__( 'Use font family from the theme.', 'elementor' ),
			// 			),
			// 			array(
			// 				'type'       => 'google_fonts',
			// 				'param_name' => 'google_fonts',
			// 				'value'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
			// 				'settings'   => array(
			// 					'fields' => array(
			// 						'font_family_description' => esc_html__( 'Select font family.', 'elementor' ),
			// 						'font_style_description'  => esc_html__( 'Select font styling.', 'elementor' ),
			// 					),
			// 				),
			// 				'dependency' => array(
			// 					'element'            => 'use_theme_fonts',
			// 					'value_not_equal_to' => 'yes',
			// 				),
			// 			),
			// 			array(
			// 				'type'       => 'param_group',
			// 				'param_name' => 'heading_reponsive',
			// 				'heading'    => esc_html__( 'Extend Reponsive Options', 'elementor' ),
			// 				'params'     => array(
			// 					array(
			// 						'type'        => 'dropdown',
			// 						'heading'     => esc_html__( 'Screen Device', 'elementor' ),
			// 						'param_name'  => 'screen',
			// 						'value'       => array(
			// 							esc_html__( '1366px', 'elementor' )  => '1366',
			// 							esc_html__( '1280px', 'elementor' )  => '1280',
			// 							esc_html__( '991px', 'elementor' )   => '991',
			// 							esc_html__( '767px ', 'elementor' )  => '767',
			// 							esc_html__( '480px ', 'elementor' )  => '480',
			// 							esc_html__( '320px ', 'elementor' )  => '320',
			// 							esc_html__( 'Custom ', 'elementor' ) => 'custom',
			// 						),
			// 						'std'         => '1366',
			// 						'admin_label' => true,
			// 					),
			// 					array(
			// 						'type'       => 'textfield',
			// 						'heading'    => esc_html__( 'Screen Custom', 'elementor' ),
			// 						'param_name' => 'screen_custom',
			// 						'suffix'     => esc_html__( 'px', 'elementor' ),
			// 						'dependency' => array( 'element' => 'screen', 'value' => array( 'custom' ) ),
			// 					),
			// 					array(
			// 						'type'       => 'font_container',
			// 						'param_name' => 'responsive_font_container',
			// 						'settings'   => array(
			// 							'fields' => array(
			// 								'text_align',
			// 								'font_size',
			// 								'line_height',
			// 								'color',
			// 								'text_align_description'  => esc_html__( 'Select text alignment.', 'elementor' ),
			// 								'font_size_description'   => esc_html__( 'Enter font size.', 'elementor' ),
			// 								'line_height_description' => esc_html__( 'Enter line height.', 'elementor' ),
			// 								'color_description'       => esc_html__( 'Select heading color.', 'elementor' ),
			// 							),
			// 						),
			// 					),
			// 				),
			// 				'group'      => esc_html__( 'Responsive Options', 'elementor' ),
			// 			),
			// 			array(
			// 				'param_name'       => 'custom_heading_custom_id',
			// 				'heading'          => esc_html__( 'Hidden ID', 'elementor' ),
			// 				'type'             => 'el_id',
			// 				'settings'         => array(
			// 					'auto_generate' => true,
			// 				),
			// 				'edit_field_class' => 'hidden',
			// 			),
			// 		),
			// 	)
			// );

			/* Map new Tabs element. */
			// vc_map(
			// 	array(
			// 		'name'                    => esc_html__( 'Elementor: Tabs', 'elementor' ),
			// 		'base'                    => 'tabs2',
			// 		'icon'        			  => false,
			// 		'is_container'            => true,
			// 		'show_settings_on_create' => false,
			// 		'as_parent'               => array(
			// 			'only' => 'vc_tta_section',
			// 		),
			// 		'category'                => esc_html__( 'Elements Builder', 'elementor' ),
			// 		'description'             => esc_html__( 'Tabs content', 'elementor' ),
			// 		'params'                  => array(
			// 			array(
			// 				'type'       => 'datepicker',
			// 				'heading'    => esc_html__( 'Countdown', 'elementor' ),
			// 				'param_name' => 'time_countdown',
			// 			),
			// 			array(
			// 				'type'             => 'colorpicker',
			// 				'heading'          => esc_html__( 'Tab Head Color', 'elementor' ),
			// 				'param_name'       => 'tab_color',
			// 				'std'              => '#000000',
			// 				'edit_field_class' => 'vc_col-sm-6 vc_col-xm-12',
			// 			),
			// 			array(
			// 				'type'             => 'dropdown',
			// 				'value'            => array(
			// 					esc_html__( 'Left', 'elementor' )  => 'left',
			// 					esc_html__( 'Right', 'elementor' ) => 'right',
			// 				),
			// 				'std'              => 'left',
			// 				'heading'          => esc_html__( 'Tab Position', 'elementor' ),
			// 				'param_name'       => 'tab_position',
			// 				'edit_field_class' => 'vc_col-sm-6 vc_col-xm-12',
			// 			),
			// 			array(
			// 				'type'        => 'textfield',
			// 				'heading'     => esc_html__( 'Title', 'elementor' ),
			// 				'param_name'  => 'tab_title',
			// 				'description' => esc_html__( 'The title of shortcode', 'elementor' ),
			// 				'admin_label' => true,
			// 				'group'       => esc_html__( 'Title Settings', 'elementor' ),
			// 			),
			// 			array(
			// 				'type'       => 'vc_link',
			// 				'heading'    => esc_html__( 'Button Link', 'elementor' ),
			// 				'param_name' => 'tab_link_button',
			// 			),
			// 			array(
			// 				'type'       => 'checkbox',
			// 				'heading'    => esc_html__( 'Title Icon', 'elementor' ),
			// 				'param_name' => 'use_tabs_icon',
			// 				'value'      => false,
			// 				'group'      => esc_html__( 'Title Settings', 'elementor' ),
			// 			),
			// 			array(
			// 				'param_name' => 'icon_type',
			// 				'heading'    => esc_html__( 'Icon Library', 'elementor' ),
			// 				'type'       => 'dropdown',
			// 				'value'      => array(
			// 					esc_html__( 'Font Awesome', 'elementor' )  => 'fontawesome',
			// 					esc_html__( 'Font Flaticon', 'elementor' ) => 'elementorcustomfonts',
			// 				),
			// 				'group'      => esc_html__( 'Title Settings', 'elementor' ),
			// 				'dependency' => array(
			// 					'element' => 'use_tabs_icon',
			// 					'value'   => 'true',
			// 				),
			// 			),
			// 			array(
			// 				'param_name'  => 'icon_elementorcustomfonts',
			// 				'heading'     => esc_html__( 'Icon', 'elementor' ),
			// 				'description' => esc_html__( 'Select icon from library.', 'elementor' ),
			// 				'type'        => 'iconpicker',
			// 				'settings'    => array(
			// 					'emptyIcon' => false,
			// 					'type'      => 'elementorcustomfonts',
			// 				),
			// 				'group'       => esc_html__( 'Title Settings', 'elementor' ),
			// 				'dependency'  => array(
			// 					'element' => 'icon_type',
			// 					'value'   => 'elementorcustomfonts',
			// 				),
			// 			),
			// 			array(
			// 				'param_name'  => 'icon_fontawesome',
			// 				'heading'     => esc_html__( 'Icon', 'elementor' ),
			// 				'description' => esc_html__( 'Select icon from library.', 'elementor' ),
			// 				'type'        => 'iconpicker',
			// 				'settings'    => array(
			// 					'emptyIcon'    => true,
			// 					'iconsPerPage' => 4000,
			// 				),
			// 				'group'       => esc_html__( 'Title Settings', 'elementor' ),
			// 				'dependency'  => array(
			// 					'element' => 'icon_type',
			// 					'value'   => 'fontawesome',
			// 				),
			// 			),
			// 			array(
			// 				'param_name' => 'icon_image',
			// 				'heading'    => esc_html__( 'Icon Image', 'elementor' ),
			// 				'type'       => 'attach_image',
			// 				'group'      => esc_html__( 'Title Settings', 'elementor' ),
			// 				'dependency' => array(
			// 					'element' => 'use_tabs_icon',
			// 					'value'   => 'true',
			// 				),
			// 			),
			// 			vc_map_add_css_animation(),
			// 			array(
			// 				'param_name'       => 'ajax_check',
			// 				'heading'          => esc_html__( 'Using Ajax Tabs', 'elementor' ),
			// 				'type'             => 'dropdown',
			// 				'value'            => array(
			// 					esc_html__( 'Yes', 'elementor' ) => '1',
			// 					esc_html__( 'No', 'elementor' )  => '0',
			// 				),
			// 				'std'              => '0',
			// 				'edit_field_class' => 'vc_col-sm-4 vc_col-xm-12',
			// 			),
			// 			array(
			// 				'param_name'       => 'short_title',
			// 				'heading'          => esc_html__( 'Short Product Title', 'elementor' ),
			// 				'type'             => 'dropdown',
			// 				'value'            => array(
			// 					esc_html__( 'Yes', 'elementor' ) => '1',
			// 					esc_html__( 'No', 'elementor' )  => '0',
			// 				),
			// 				'std'              => '1',
			// 				'edit_field_class' => 'vc_col-sm-4 vc_col-xm-12',
			// 			),
			// 			array(
			// 				'type'             => 'textfield',
			// 				'heading'          => esc_html__( 'Active Section', 'elementor' ),
			// 				'param_name'       => 'active_section',
			// 				'std'              => 0,
			// 				'edit_field_class' => 'vc_col-sm-2 vc_col-xm-12',
			// 			),
			// 			array(
			// 				'type'             => 'checkbox',
			// 				'heading'          => esc_html__( 'Tabs Filter', 'elementor' ),
			// 				'param_name'       => 'use_tabs_filter',
			// 				'value'            => false,
			// 				'edit_field_class' => 'vc_col-sm-2 vc_col-xm-12',
			// 			),
			// 			/* TABS FILTER OPTIONS */
			// 			array(
			// 				'param_name' => 'ajax_filter',
			// 				'heading'    => esc_html__( 'Enable Ajax Tabs Filter', 'elementor' ),
			// 				'type'       => 'dropdown',
			// 				'value'      => array(
			// 					esc_html__( 'Yes', 'elementor' ) => 'yes',
			// 					esc_html__( 'No', 'elementor' )  => 'no',
			// 				),
			// 				'std'        => 'yes',
			// 				'dependency' => array(
			// 					'element' => 'use_tabs_filter',
			// 					'value'   => array( 'true' ),
			// 				),
			// 			),
			// 			array(
			// 				'type'             => 'attach_image',
			// 				'heading'          => esc_html__( 'Image Banner', 'elementor' ),
			// 				'param_name'       => 'tabs_banner',
			// 				'group'            => esc_html__( 'Filter Options', 'elementor' ),
			// 				'dependency'       => array(
			// 					'element' => 'use_tabs_filter',
			// 					'value'   => array( 'true' ),
			// 				),
			// 				'edit_field_class' => 'vc_col-sm-3 vc_col-xm-12',
			// 			),
			// 			array(
			// 				'type'             => 'taxonomy',
			// 				'heading'          => esc_html__( 'Product Category', 'elementor' ),
			// 				'param_name'       => 'taxonomy',
			// 				'settings'         => array(
			// 					'multiple'    => true,
			// 					'hide_empty'  => true,
			// 					'taxonomy'    => 'product_cat',
			// 					'placeholder' => 'Select Categories',
			// 				),
			// 				'placeholder'      => esc_html__( 'Choose category', 'elementor' ),
			// 				'description'      => esc_html__( 'Note: If you want to narrow output, select category(s) above. Only selected categories will be displayed.', 'elementor' ),
			// 				'group'            => esc_html__( 'Filter Options', 'elementor' ),
			// 				'dependency'       => array(
			// 					'element' => 'use_tabs_filter',
			// 					'value'   => array( 'true' ),
			// 				),
			// 				'edit_field_class' => 'vc_col-sm-9 vc_col-xm-12',
			// 			),
			// 		),
			// 		'js_view'                 => 'VcBackendTtaTabsView',
			// 		'custom_markup'           => '
   //                  <div class="vc_tta-container" data-vc-action="collapse">
   //                      <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
   //                          <div class="vc_tta-tabs-container">'
			// 			. '<ul class="vc_tta-tabs-list">'
			// 			. '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
			// 			. '</ul>
   //                          </div>
   //                          <div class="vc_tta-panels vc_clearfix {{container-class}}">
   //                            {{ content }}
   //                          </div>
   //                      </div>
   //                  </div>',
			// 		'default_content'         => '
   //                      [vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'elementor' ), 1 ) . '"][/vc_tta_section]
   //                      [vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'elementor' ), 2 ) . '"][/vc_tta_section]
   //                  ',
			// 		'admin_enqueue_js'        => array(
			// 			vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ),
			// 		),
			// 	)
			// );

			/* Map new Custom Html. */
			// vc_map(
			// 	array(
			// 		'name'                    => esc_html__( 'Elementor: Html', 'elementor' ),
			// 		'base'                    => 'html',
			// 		'category'                => esc_html__( 'Elements Builder', 'elementor' ),
			// 		'description'             => esc_html__( 'Display a custom html.', 'elementor' ),
			// 		'params'                  => array(
			// 			array(
			// 				// 'type'       => 'textfield',
			// 				'type'       => 'textarea_html',
			// 				'heading'    => esc_html__( 'Html Content', 'elementor' ),
			// 				'param_name' => 'html_content',
			// 			),
			// 			array(
			// 				'param_name'       => 'html_custom_id',
			// 				'heading'          => esc_html__( 'Hidden ID', 'elementor' ),
			// 				'type'             => 'el_id',
			// 				'settings'         => array(
			// 					'auto_generate' => true,
			// 				),
			// 				'edit_field_class' => 'hidden',
			// 			),
			// 		),
			// 	)
			// );

			/* Map new Custom Menu. */
			// vc_map(
			// 	array(
			// 		'name'        => esc_html__( 'Elementor: Custom Menu', 'elementor' ),
			// 		'base'        => 'custommenu', // shortcode
			// 		'category'    => esc_html__( 'Elements Builder', 'elementor' ),
			// 		'description' => esc_html__( 'Display a custom menu.', 'elementor' ),
			// 		'params'      => array(
			// 			array(
			// 				'type'        => 'dropdown',
			// 				'heading'     => esc_html__( 'Menu', 'elementor' ),
			// 				'param_name'  => 'menu',
			// 				'value'       => $all_menu,
			// 				'admin_label' => true,
			// 				'description' => esc_html__( 'Select menu to display.', 'elementor' ),
			// 			),
			// 		),
			// 	)
			// );

			/* Map New Groups */
			vc_map(
				array(
					'name'                    => esc_html__( 'Elementor: Groups', 'elementor' ),
					'base'                    => 'slider',
					'category'                => esc_html__( 'Elements Builder', 'elementor' ),
					'description'             => esc_html__( 'Display a custom slide.', 'elementor' ),
					'as_parent'               => array( 'only' => 'slideritem, banner, category, iconbox' ),
					'content_element'         => true,
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Style', 'elementor' ),
							'param_name' => 'groups_style',
							'value'      => array(
								esc_html__( 'Slider', 'elementor' ) => '1',
								esc_html__( 'Banner', 'elementor' ) => '2',
								esc_html__( 'Category', 'elementor' ) => '3',
								esc_html__( 'Category 2', 'elementor' ) => '5',
								esc_html__( 'Icon Box', 'elementor' ) => '4',
							),
							'std'        => '1',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Groups Title', 'elementor' ),
							'param_name' => 'groups_title',
						),
						array(
							'param_name'       => 'slider_custom_id',
							'heading'          => esc_html__( 'Hidden ID', 'elementor' ),
							'type'             => 'el_id',
							'settings'         => array(
								'auto_generate' => true,
							),
							'edit_field_class' => 'hidden',
						),
					),
				)
			);

			/* Map New Slider */
			vc_map(
				array(
					'name'     => esc_html__( 'Elementor: Slider', 'elementor' ),
					'base'     => 'slideritem',
					'category' => esc_html__( 'Elements Builder', 'elementor' ),
					'params'   => array(
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Image', 'elementor' ),
							'param_name' => 'banner_img',
						),
						array(
							'type'       => 'vc_link',
							'heading'    => esc_html__( 'Banner Link', 'elementor' ),
							'param_name' => 'banner_link',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Image Width', 'elementor' ),
							'param_name' => 'image_width',
							'value'      => '1200',
							'edit_field_class' => 'vc_col-sm-4',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Image Height', 'elementor' ),
							'param_name' => 'image_height',
							'value'      => '800',
							'edit_field_class' => 'vc_col-sm-4',
						),
					),
				)
			);

			/* Map New Banner */
			vc_map(
				array(
					'name'     => esc_html__( 'Elementor: Banner', 'elementor' ),
					'base'     => 'banner',
					'category' => esc_html__( 'Elements Builder', 'elementor' ),
					'params'   => array(
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Banner Image', 'elementor' ),
							'param_name' => 'banner_img',
						),
						array(
							'type'       => 'vc_link',
							'heading'    => esc_html__( 'Banner Link', 'elementor' ),
							'param_name' => 'banner_link',
						),
						// array(
						// 	'type'       => 'textfield',
						// 	'heading'    => esc_html__( 'Banner Title', 'elementor' ),
						// 	'param_name' => 'banner_title',
						// ),
						// array(
						// 	'type'       => 'dropdown',
						// 	'heading'    => esc_html__( 'Content Position', 'elementor' ),
						// 	'param_name' => 'content_position',
						// 	'value'      => array(
						// 		esc_html__( 'Yes', 'elementor' )  => 'yes',
						// 		esc_html__( 'No', 'elementor' ) => 'no',
						// 	),
						// 	'std'        => 'no',
						// ),
						// array(
						// 	'type'       => 'textfield',
						// 	'heading'    => esc_html__( 'Position Top', 'elementor' ),
						// 	'param_name' => 'position_top',
						// 	'value'      => 'auto',
						// 	'dependency' => array( 'element' => 'content_position', 'value' => array( 'yes' ) ),
						// ),
						// array(
						// 	'type'       => 'textfield',
						// 	'heading'    => esc_html__( 'Position Bottom', 'elementor' ),
						// 	'param_name' => 'position_bottom',
						// 	'value'      => 'auto',
						// 	'dependency' => array( 'element' => 'content_position', 'value' => array( 'yes' ) ),
						// ),
						// array(
						// 	'type'       => 'textfield',
						// 	'heading'    => esc_html__( 'Position Left', 'elementor' ),
						// 	'param_name' => 'position_left',
						// 	'value'      => 'auto',
						// 	'dependency' => array( 'element' => 'content_position', 'value' => array( 'yes' ) ),
						// ),
						// array(
						// 	'type'       => 'textfield',
						// 	'heading'    => esc_html__( 'Position Right', 'elementor' ),
						// 	'param_name' => 'position_right',
						// 	'value'      => 'auto',
						// 	'dependency' => array( 'element' => 'content_position', 'value' => array( 'yes' ) ),
						// ),
						// array(
						// 	'type'       => 'textfield',
						// 	'heading'    => esc_html__( 'Image Width', 'elementor' ),
						// 	'param_name' => 'image_width',
						// 	'value'      => '1200',
						// 	'edit_field_class' => 'vc_col-sm-4',
						// ),
						// array(
						// 	'type'       => 'textfield',
						// 	'heading'    => esc_html__( 'Image Height', 'elementor' ),
						// 	'param_name' => 'image_height',
						// 	'value'      => '800',
						// 	'edit_field_class' => 'vc_col-sm-4',
						// ),
					),
				)
			);

			/* Map New Blog */
			vc_map(
				array(
					'name'        => esc_html__( 'Elementor: Blog', 'elementor' ),
					'base'        => 'blog', // shortcode
					'category'    => esc_html__( 'Elements Builder', 'elementor' ),
					'description' => esc_html__( 'Display a blog lists.', 'elementor' ),
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Type Post', 'elementor' ),
							'param_name' => 'select_post',
							'value'      => array(
								esc_html__( 'New Posts', 'elementor' ) => '0',
								esc_html__( 'Featured Posts', 'elementor' )   => '1',
							),
							'std'        => '0',
						),
						array(
							'param_name'  => 'category_slug',
							'type'        => 'dropdown',
							'value'       => $categories_array, // here I'm stuck
							'heading'     => esc_html__( 'Category:', 'elementor' ),
							"admin_label" => true,
							'dependency'  => array(
								'element' => 'select_post',
								'value'   => array( '0' ),
							),
						),
						array(
							'type'        => 'autocomplete',
							'heading'     => esc_html__( 'Select a Post', 'elementor' ),
							'param_name'  => 'post_ids',
							'description' => esc_html__( 'Only work with Post.', 'elementor' ),
							'settings'    => array(
								'multiple' => true,
								'sortable' => true,
								'groups'   => false,
							),
							'dependency'  => array(
								'element' => 'select_post',
								'value'   => array( '1' ),
							),
							'admin_label' => true,
						),
						array(
							'type'       => 'textfield',
							'heading'     => esc_html__( 'Number Post', 'elementor' ),
							'param_name'  => 'per_page',
							'value'       => 3,
							'suffix'      => esc_html__( 'item(s)', 'elementor' ),
							'admin_label' => true,
							'dependency'  => array(
								'element' => 'select_post',
								'value'   => array( '0' ),
							),
							'edit_field_class' => 'vc_col-sm-4',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Order by', 'elementor' ),
							'param_name'  => 'orderby',
							'value'       => array(
								esc_html__( 'None', 'elementor' )     => 'none',
								esc_html__( 'ID', 'elementor' )       => 'ID',
								esc_html__( 'Author', 'elementor' )   => 'author',
								esc_html__( 'Name', 'elementor' )     => 'name',
								esc_html__( 'Date', 'elementor' )     => 'date',
								esc_html__( 'Modified', 'elementor' ) => 'modified',
								esc_html__( 'Rand', 'elementor' )     => 'rand',
							),
							'std'         => 'date',
							'description' => esc_html__( 'Select how to sort retrieved posts.', 'elementor' ),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Order', 'elementor' ),
							'param_name'  => 'order',
							'value'       => array(
								esc_html__( 'ASC', 'elementor' )  => 'ASC',
								esc_html__( 'DESC', 'elementor' ) => 'DESC',
							),
							'std'         => 'DESC',
							'description' => esc_html__( "Designates the ascending or descending order.", 'elementor' ),
						),
						array(
							'type'       => 'textfield',
							'heading'     => esc_html__( 'Title', 'elementor' ),
							'param_name'  => 'video_title',
							'value'       => '',
							'group'       => esc_html__( 'Video options', 'elementor' ),
						),
						// array(
						// 	'type'       => 'textfield',
						// 	'heading'     => esc_html__( 'Description', 'elementor' ),
						// 	'param_name'  => 'video_description',
						// 	'value'       => '',
						// 	'suffix'      => esc_html__( 'item(s)', 'elementor' ),
						// 	'group'       => esc_html__( 'Video options', 'elementor' ),
						// ),
						array(
							'type'       => 'textfield',
							'heading'     => esc_html__( 'Video', 'elementor' ),
							'param_name'  => 'video',
							'value'       => '',
							'group'       => esc_html__( 'Video options', 'elementor' ),
						),
						array(
							'param_name'       => 'blog_custom_id',
							'heading'          => esc_html__( 'Hidden ID', 'elementor' ),
							'type'             => 'el_id',
							'settings'         => array(
								'auto_generate' => true,
							),
							'edit_field_class' => 'hidden',
						),
					),
				)
			);

			/* new icon box*/
			vc_map(
				array(
					'name'     => esc_html__( 'Elementor: Icon Box', 'elementor' ),
					'base'     => 'iconbox',
					'category' => esc_html__( 'Elements Builder', 'elementor' ),
					'params'   => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Title', 'elementor' ),
							'param_name'  => 'title',
							'admin_label' => true,
						),
						array(
							'param_name' => 'text_content',
							'heading'    => esc_html__( 'Content', 'elementor' ),
							'type'       => 'textarea',
						),
						array(
							'param_name' => 'icon_type',
							'heading'    => esc_html__( 'Icon Library', 'elementor' ),
							'type'       => 'dropdown',
							'value'      => array(
								esc_html__( 'Image', 'elementor' ) => 'image',
								esc_html__( 'Font Awesome', 'elementor' )  => 'fontawesome',
							),
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Banner Image', 'elementor' ),
							'param_name' => 'icon_img',
							'dependency'  => array(
								'element' => 'icon_type',
								'value'   => 'image',
							),
						),
						array(
							'param_name'  => 'icon_fontawesome',
							'heading'     => esc_html__( 'Icon', 'elementor' ),
							'description' => esc_html__( 'Select icon from library.', 'elementor' ),
							'type'        => 'iconpicker',
							'settings'    => array(
								'emptyIcon'    => false,
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'icon_type',
								'value'   => 'fontawesome',
							),
						),
						array(
							'type'        => 'vc_link',
							'heading'     => esc_html__( 'Link', 'elementor' ),
							'param_name'  => 'link',
							'description' => esc_html__( 'The Link to Icon', 'elementor' ),
						),
					),
				)
			);

			/* Map New Testimonial */
			// vc_map(
			// 	array(
			// 		'name'     => esc_html__( 'Elementor: Testimonials', 'elementor' ),
			// 		'base'     => 'testimonials',
			// 		'category' => esc_html__( 'Elements Builder', 'elementor' ),
			// 		'params'   => array(
			// 			array(
			// 				'type'       => 'textfield',
			// 				'heading'     => esc_html__( 'Number Post', 'elementor' ),
			// 				'param_name'  => 'per_page',
			// 				'value'       => 3,
			// 				'suffix'      => esc_html__( 'item(s)', 'elementor' ),
			// 				'admin_label' => true,
			// 			),
			// 			array(
			// 				'type'        => 'dropdown',
			// 				'heading'     => esc_html__( 'Order by', 'elementor' ),
			// 				'param_name'  => 'orderby',
			// 				'value'       => array(
			// 					esc_html__( 'None', 'elementor' )     => 'none',
			// 					esc_html__( 'ID', 'elementor' )       => 'ID',
			// 					esc_html__( 'Author', 'elementor' )   => 'author',
			// 					esc_html__( 'Name', 'elementor' )     => 'name',
			// 					esc_html__( 'Date', 'elementor' )     => 'date',
			// 					esc_html__( 'Modified', 'elementor' ) => 'modified',
			// 					esc_html__( 'Rand', 'elementor' )     => 'rand',
			// 				),
			// 				'std'         => 'date',
			// 				'description' => esc_html__( 'Select how to sort retrieved posts.', 'elementor' ),
			// 			),
			// 			array(
			// 				'type'        => 'dropdown',
			// 				'heading'     => esc_html__( 'Order', 'elementor' ),
			// 				'param_name'  => 'order',
			// 				'value'       => array(
			// 					esc_html__( 'ASC', 'elementor' )  => 'ASC',
			// 					esc_html__( 'DESC', 'elementor' ) => 'DESC',
			// 				),
			// 				'std'         => 'DESC',
			// 				'description' => esc_html__( 'Designates the ascending or descending order.', 'elementor' ),
			// 			),
			// 		),
			// 	)
			// );

			/* Map Socials */
			// vc_map(
			// 	array(
			// 		'name'        => esc_html__( 'Elementor: Socials', 'elementor' ),
			// 		'base'        => 'socials', // shortcode
			// 		'category'    => esc_html__( 'Elements Builder', 'elementor' ),
			// 		'description' => esc_html__( 'Display a social list.', 'elementor' ),
			// 		'params'      => array(
			// 			array(
			// 				'type'        => 'checkbox',
			// 				'heading'     => esc_html__( 'Display on', 'elementor' ),
			// 				'param_name'  => 'use_socials',
			// 				'admin_label' => true,
			// 				'class'       => 'checkbox-display-block',
			// 				'value'       => $socials,
			// 			),
			// 			array(
			// 				'type'       => 'dropdown',
			// 				'heading'    => esc_html__( 'Style', 'elementor' ),
			// 				'param_name' => 'socials_style',
			// 				'value'      => array(
			// 					esc_html__( 'Circle', 'elementor' ) => 'style-circle',
			// 					esc_html__( 'Square', 'elementor' ) => 'style-square',
			// 				),
			// 				'std'        => '',
			// 			),
			// 		),
			// 	)
			// );

			/* Map New Simple */
			// vc_map(
			// 	array(
			// 		'name'        => esc_html__( 'Elementor: List Box', 'elementor' ),
			// 		'base'        => 'listbox', // shortcode
			// 		'category'    => esc_html__( 'Elements Builder', 'elementor' ),
			// 		'description' => esc_html__( 'Display a Simple.', 'elementor' ),
			// 		'params'      => array(
			// 			array(
			// 				'type'        => 'textfield',
			// 				'heading'     => esc_html__( 'Title', 'elementor' ),
			// 				'param_name'  => 'title',
			// 				'admin_label' => true,
			// 			),
			// 			// array(
			// 			// 	'type'       => 'attach_images',
			// 			// 	'heading'    => esc_html__( 'Gallery', 'elementor' ),
			// 			// 	'param_name' => 'partner_banner',
			// 			// ),
			// 			array(
			// 				'type'       => 'param_group',
			// 				'heading'    => esc_html__( 'List item', 'elementor' ),
			// 				'param_name' => 'items',
			// 				'params'     => array(
			// 					array(
			// 						'type'        => 'textfield',
			// 						'heading'     => esc_html__( 'Title', 'elementor' ),
			// 						'param_name'  => 'title',
			// 						'admin_label' => true,
			// 					),
			// 					array(
			// 						'type'        => 'textfield',
			// 						'heading'     => esc_html__( 'Custom links', 'elementor' ),
			// 						'param_name'  => 'custom_links',
			// 						'description' => esc_html__( 'Enter links for each item', 'elementor' ),
			// 					),
			// 					array(
			// 						'type'        => 'dropdown',
			// 						'heading'     => esc_html__( 'Custom link target', 'elementor' ),
			// 						'param_name'  => 'custom_links_target',
			// 						'description' => esc_html__( 'Select where to open  custom links.', 'elementor' ),
			// 						'value'       => array(
			// 							esc_html__( 'Same window', 'elementor' ) => '_self',
			// 							esc_html__( 'New window', 'elementor' )  => '_blank',
			// 						),
			// 					),
			// 				),
			// 			),
			// 		),
			// 	)
			// );

			/* new Look Book*/
			// vc_map(
			// 	array(
			// 		'name'     => esc_html__( 'Elementor: Look Book', 'elementor' ),
			// 		'base'     => 'lookbook',
			// 		'category' => esc_html__( 'Elements Builder', 'elementor' ),
			// 		'params'   => array(
			// 			array(
			// 				'type'       => 'attach_image',
			// 				'heading'    => esc_html__( 'Avatar', 'elementor' ),
			// 				'param_name' => 'avatar',
			// 			),
			// 			array(
			// 				'type'        => 'textfield',
			// 				'heading'     => esc_html__( 'Name', 'elementor' ),
			// 				'param_name'  => 'name',
			// 				'admin_label' => true,
			// 			),
			// 			array(
			// 				'type'        => 'textfield',
			// 				'heading'     => esc_html__( 'Direction', 'elementor' ),
			// 				'param_name'  => 'dir',
			// 				'admin_label' => true,
			// 			),
			// 		),
			// 	)
			// );

			if ( class_exists( 'WooCommerce' ) ) {
				/* Map new Custom Cart. */
				// vc_map(
				// 	array(
				// 		'name'     => esc_html__( 'Elementor: Shop Cart', 'elementor' ),
				// 		'base'     => 'shopcart',
				// 		'category' => esc_html__( 'Elements Builder', 'elementor' ),
				// 		'params'   => array(
				// 			// array(
				// 			// 	'type'       => 'attach_image',
				// 			// 	'heading'    => esc_html__( 'Cart Icon', 'elementor' ),
				// 			// 	'param_name' => 'cart_icon',
				// 			// ),
				// 		),
				// 	)
				// );

				/* Map New Categories */
				vc_map(
					array(
						'name'        => esc_html__( 'Elementor: Category', 'elementor' ),
						'base'        => 'category', // shortcode
						'category'    => esc_html__( 'Elements Builder', 'elementor' ),
						'description' => esc_html__( 'Display a Category.', 'elementor' ),
						'params'      => array(
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__( 'Banner Category', 'elementor' ),
								'param_name' => 'banner_img',
							),
							array(
								'param_name'  => 'cat_slug',
								'type'        => 'dropdown',
								'value'       => $product_cat_array, // here I'm stuck
								'heading'     => esc_html__( 'Category:', 'elementor' ),
								"admin_label" => true,
							),
						),
					)
				);

				vc_map(
					array(
						'name'        => esc_html__( 'Elementor: Products', 'elementor' ),
						'base'        => 'productsgrid', // shortcode
						'category'    => esc_html__( 'Elements Builder', 'elementor' ),
						'description' => esc_html__( 'Display a product list.', 'elementor' ),
						'params'      => array(	
							/*Products */
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__( 'Title', 'elementor' ),
								'param_name' => 'title',
								'value'      => '',
								"admin_label" => true,
							),
							array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Target', 'elementor' ),
								'param_name'  => 'target',
								'value'       => array(
									// esc_html__( 'Best Selling Products', 'elementor' ) => 'best-selling',
									// esc_html__( 'Top Rated Products', 'elementor' )    => 'top-rated',
									esc_html__( 'Recent Products', 'elementor' )       => 'recent-product',
									// esc_html__( 'Product Category', 'elementor' )      => 'product-category',
									// esc_html__( 'Product Brand', 'elementor' )         => 'product-brand',
									esc_html__( 'Products', 'elementor' )              => 'products',
									// esc_html__( 'Featured Products', 'elementor' )     => 'featured_products',
									// esc_html__( 'On Sale', 'elementor' )               => 'on_sale',
									// esc_html__( 'On New', 'elementor' )                => 'on_new',
								),
								'description' => esc_html__( 'Choose the target to filter products', 'elementor' ),
								'std'         => 'recent-product',
							),
							array(
								'param_name'  => 'product_cat_slug',
								'type'        => 'dropdown',
								'value'       => $product_cat_array,
								'heading'     => esc_html__( 'Category:', 'elementor' ),
								'dependency' => array(
									'element'            => 'target',
									'value' => array(
										'recent-product',
									),
								),
							),
							array(
								'type'        => "dropdown",
								'heading'     => esc_html__( "Order by", 'elementor' ),
								'param_name'  => "orderby",
								'value'       => array(
									'',
									esc_html__( 'Date', 'elementor' )          => 'date',
									esc_html__( 'ID', 'elementor' )            => 'ID',
									esc_html__( 'Author', 'elementor' )        => 'author',
									esc_html__( 'Title', 'elementor' )         => 'title',
									esc_html__( 'Modified', 'elementor' )      => 'modified',
									esc_html__( 'Random', 'elementor' )        => 'rand',
									esc_html__( 'Comment count', 'elementor' ) => 'comment_count',
									esc_html__( 'Menu order', 'elementor' )    => 'menu_order',
									esc_html__( 'Sale price', 'elementor' )    => '_sale_price',
								),
								'std'         => 'date',
								'description' => esc_html__( "Select how to sort.", 'elementor' ),
								'dependency'  => array(
									'element'            => 'target',
									'value_not_equal_to' => array(
										'products',
									),
								),
							),
							array(
								'type'        => "dropdown",
								'heading'     => esc_html__( "Order", 'elementor' ),
								'param_name'  => "order",
								'value'       => array(
									esc_html__( 'ASC', 'elementor' )  => 'ASC',
									esc_html__( 'DESC', 'elementor' ) => 'DESC',
								),
								'std'         => 'DESC',
								'description' => esc_html__( "Designates the ascending or descending order.", 'elementor' ),
								'dependency'  => array(
									'element'            => 'target',
									'value_not_equal_to' => array(
										'products',
									),
								),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__( 'Product per page', 'elementor' ),
								'param_name' => 'per_page',
								'value'      => 6,
								'dependency' => array(
									'element'            => 'target',
									'value_not_equal_to' => array(
										'products',
									),
								),
								'edit_field_class' => 'vc_col-sm-4',
							),
							array(
								'type'        => 'autocomplete',
								'heading'     => esc_html__( 'Products', 'elementor' ),
								'param_name'  => 'ids',
								'settings'    => array(
									'multiple'      => true,
									'sortable'      => true,
									'unique_values' => true,
								),
								'save_always' => true,
								'description' => esc_html__( 'Enter List of Products', 'elementor' ),
								'dependency'  => array( 'element' => "target", 'value' => array( 'products' ) ),
							),
							array(
								'param_name'       => 'products_custom_id',
								'heading'          => esc_html__( 'Hidden ID', 'elementor' ),
								'type'             => 'el_id',
								'settings'         => array(
									'auto_generate' => true,
								),
								'edit_field_class' => 'hidden',
							),
						),
					)
				);
			}
		}
	}

	new Visual_Composer();
}
VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Accordion' );

class WPBakeryShortCode_Tabs extends WPBakeryShortCode_VC_Tta_Accordion
{
}

class WPBakeryShortCode_Slider extends WPBakeryShortCodesContainer
{
}