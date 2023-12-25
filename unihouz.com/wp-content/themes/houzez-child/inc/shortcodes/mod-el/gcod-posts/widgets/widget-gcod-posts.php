<?php
namespace Elementor;

use Modules;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Gcod_Posts extends Widget_Base {

   public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      // wp_register_script( 'gcod-custom-elementor-scripts', plugin_dir_url(__FILE__) . 'assets/js/gcod-elementor.js', [], '1.0.0', true );
      // wp_register_style( 'style-handle', 'path/to/file.css');
   }

   // public function get_script_depends() {
   //     return [ 'gcod-custom-elementor-scripts' ];
   // }

   // public function get_style_depends() {
   //     return [ 'style-handle' ];
   // }

	// 1. Config settings
	private $settings = [
		'name'	=> 'gcod-posts',
		'title'	=> 'GCO Posts',
		'icon'	=> 'eicon-parallax',
	];

	// method list
	public function get_name() {
		return $this->settings['name'];
	}

	public function get_title() {
		return __( $this->settings['title'] , 'gcodemo' );
	}

	public function get_icon() {
		return $this->settings['icon'];
	}

	// 2. Define Controls
	protected function _register_controls() {

		/*
		 * start control section and followup with adding control fields.
		 * end control after all control field and repeat if you need other control section respectively.
		*/

		// Start Section
		// $this->start_controls_section(
		// 	'section_layout',
		// 	[
		// 		'label' => esc_html__( 'Layout', 'gcodemo' ),
		// 	]
		// );

		// $this->add_control(
		// 	'gcod_image',
		// 	[
		// 		'label' => __( 'Choose Image', 'plugin-domain' ),
		// 		'type' => Controls_Manager::MEDIA,
		// 		'default' => [
		// 			'url' => Utils::get_placeholder_image_src(),
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'gcod_image_2',
		// 	[
		// 		'label' => __( 'Choose Image', 'plugin-domain' ),
		// 		'type' => Controls_Manager::MEDIA,
		// 		'default' => [
		// 			'url' => Utils::get_placeholder_image_src(),
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'sample_text',
		// 	[
		// 		'label' => __( 'Primary Text', 'gcodemo' ),
		// 		'type' => Controls_Manager::TEXT,
		// 		'default' => '',
		// 		'title' => __( 'Enter some text', 'gcodemo' ),
		// 	]
		// );
		// $this->end_controls_section();
		// End Section		

		// Start Section
		$this->start_controls_section(
			'section_query',
			[
				'label' => esc_html__( 'Basic', 'gcodemo' ),
			]
		);

		$this->add_control(
			'heading_text',
			[
				'label' => __( 'Heading Text', 'gcodemo' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'title' => __( 'Enter some text', 'gcodemo' ),
			]
		);

		$this->add_control(
			'url_text',
			[
				'label' => __( 'URL', 'gcodemo' ),
				'type' => Controls_Manager::URL,
				'default' => '',
				'title' => __( 'Enter some text', 'gcodemo' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'description_text',
			[
				'label' => __( 'Description Text', 'gcodemo' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'title' => __( 'Enter some text', 'gcodemo' ),
			]
		);

		$this->add_control(
			'style_posts',
			[
				'label' => __( 'Styles', 'gcodemo' ),
				'type' => Controls_Manager::SELECT ,
				'title' => __( 'Enter some text', 'gcodemo' ),
				'default' => 1,
				'options' => [
					1  => __( 'Style 01', 'gcodemo' ),
					2  => __( 'Style 02', 'gcodemo' ),
					3  => __( 'Style 03', 'gcodemo' ),

				]
			]
		);

		// $this->add_control(
		// 	'posts_per_page',
		// 	[
		// 		'label'   => __( 'Number of Posts', 'gcodemo' ),
		// 		'type'    => Controls_Manager::SELECT,
		// 		'default' => 5,
		// 		'options' => [
		// 			1  => __( 'One', 'gcodemo' ),
		// 			2  => __( 'Two', 'gcodemo' ),
		// 			5  => __( 'Five', 'gcodemo' ),
		// 			10 => __( 'Ten', 'gcodemo' ),
		// 			-1 => __( 'All', 'gcodemo' ),

		// 		]
		// 	]
		// );

		$this->end_controls_section();
		// End Section

	}

	// 3. Render views
	protected function render( $instance = [] ) {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$custom_text = ! empty( $settings['heading_text'] ) ? $settings['heading_text'] : '';
		$target = $settings['url_text']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['url_text']['nofollow'] ? ' rel="nofollow"' : '';
		$url_text = ! empty( $settings['url_text']['url'] ) ? $settings['url_text']['url'] : '';
		$infor_text = ! empty( $settings['description_text'] ) ? $settings['description_text'] : '';
		$style_posts = ! empty( $settings['style_posts'] ) ? (int)$settings['style_posts'] : 1;
		// $custom_photo = ! empty( $settings['gcod_image'] ) ? $settings['gcod_image'] : '#';

		// include all views files
		require dirname(__DIR__) . '/views/frontend.tpl.php';

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Gcod_Posts() );
