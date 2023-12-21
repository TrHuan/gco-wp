<?php
/*
    Plugin Name: LTH Blocks for Autumn
    Plugin URI: https://themeforest.net/
    Description: LTH Widgets for Autumn Theme
    Version: 1.0.0
    Author: LTH Design Team
    Author URI: https://wordpress.com/wordpress-plugins/
    Text Domain: lth-theme
*/

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Define path to plugin directory.
define('LTH_AUTUMN_BLOCKS_PATH', plugin_dir_path(__FILE__));

// Define URL to plugin directory.
define('LTH_AUTUMN_BLOCKS_URL', plugin_dir_url(__FILE__));

class LthAutumnBlocks {
    private static $instance;
    private $lth_components_dir = 'blocks';
    private $lth_inc_dir = 'inc';

    /**
     * LthAutumnBlocks constructor.
     */
    public function __construct() {

        $this->setup();
        $this->blocks();

        // Load custom widgets assets        
        add_action('enqueue_block_assets', array($this, 'lth_custom_widgets_assets'));
        add_action('wp_enqueue_scripts', array($this, 'lth_custom_widgets_assets'));


        // Customize the url setting to fix incorrect asset URLs. => Load custom blocks assets
        add_filter('lzb/plugin_url', array($this, 'lth_lzb_url'));
        add_action('enqueue_block_assets', array($this, 'lth_custom_blocks_assets'));
        add_action('wp_enqueue_scripts', array($this, 'lth_custom_blocks_assets'));

        // Remove lazy block wrapper 
        add_filter('lzb/block_render/allow_wrapper', array($this, 'lth_block_render_allow_wrapper'), 10, 3);

        // Hide Admin Menu
        add_filter('lzb/show_admin_menu', '__return_false');

        // Show block
        add_action('allowed_block_types_all', array($this, 'lth_allowed_block_types'));

    }


    public static function getInstance() {

        if (!isset(self::$instance) && !(self::$instance instanceof LthAutumnBlocks)) {
            self::$instance = new LthAutumnBlocks();
        }

        return self::$instance;
    }

    public function setup() {    
        
        if (!defined('LTH_AUTUMN_THEME_PATH')) {
            define('LTH_AUTUMN_THEME_PATH', get_template_directory() . '/');
        }

        if (!defined('LTH_AUTUMN_THEME_URL')) {
            define('LTH_AUTUMN_THEME_URL', get_template_directory() . '/');
        }

        if (!defined('LTH_AUTUMN_BLOCKS_INC_PATH')) {
            define('LTH_AUTUMN_BLOCKS_INC_PATH', plugin_dir_path(__FILE__) . $this->lth_inc_dir);
        }

        if (!defined('LTH_AUTUMN_BLOCKS_INC_URL')) {
            define('LTH_AUTUMN_BLOCKS_INC_URL', plugin_dir_url(__FILE__) . $this->lth_inc_dir);
        }

        if (!defined('LTH_AUTUMN_BLOCKS_PATH')) {
            define('LTH_AUTUMN_BLOCKS_PATH', plugin_dir_path(__FILE__) . $this->lth_components_dir);
        }

        if (!defined('LTH_AUTUMN_BLOCKS_URL')) {
            define('LTH_AUTUMN_BLOCKS_URL', plugin_dir_url(__FILE__) . $this->lth_components_dir);
        }
    }

    // Show block
    function lth_allowed_block_types( $allowed_blocks ) {     
        return array(
            'core/columns',
            'core/shortcode',
            'core/freeform',
            'lazyblock/lth-classic',
            'core/code',
            'core/html',
            'core/legacy-widget',
            'core/widget-area',
            // 'lazyblock/lth-advancedsearch',
            // 'lazyblock/lth-banner',
            // 'lazyblock/lth-blocks',
            'lazyblock/lth-blogs',
            'lazyblock/lth-brands',
            // 'lazyblock/lth-shopcart',
            'lazyblock/lth-features',
            'lazyblock/lth-logo',
            'lazyblock/lth-menu',
            'lazyblock/lth-newsletter',
            'lazyblock/lth-products',
            'lazyblock/lth-productscattegories',
            // 'lazyblock/lth-search',
            'lazyblock/lth-section',
            'lazyblock/lth-skin',
            'lazyblock/lth-slider',
            'lazyblock/lth-social',
            'lazyblock/lth-tags',
            'lazyblock/lth-terms',
            'lazyblock/lth-testimonials',
            'lazyblock/lth-title',
        );     
    }

    // Blocks plugin-in
    function lth_lzb_url($url) {
        return LTH_LZB_URL;
    }

    // Disable add wrapper blocks
    function lth_block_render_allow_wrapper($allow_wrapper, $attributes, $context) {
        // Disable all block wrapper
        return false;
    }

    /** 
     * Get all directories
     */
    function getDirContents($path, $exclude) {
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        $files = array();
        foreach ($rii as $file)
            if (!$file->isDir()) {
                if (strpos($file->getPathname(), $exclude) === false) {
                    $files[] = $file->getPathname();
                }
            }
        return $files;
    }

    /**
     * Functions
     * Require all PHP files in the /$dir/ directory
     * If want excludes 
     */
    function lth_require_all($dir, $exclude = '') {

        $files_dir = array();
        if ($exclude == '') {
            $files_dir = glob($dir . "/*.php");
            foreach ($files_dir as $function) {
                $function = basename($function);
                require $dir . '/' . $function;
            }
        } else {
            $files_dir = $this->getDirContents($dir, '_');
            foreach ($files_dir as $function) {
                if (strpos($function, '.php') !== false) {
                    require $function;
                }
            }
        }
    }

    // => Block modules
    public function blocks() {
        
        // Define path and URL to the LZB plugin.
        define('LTH_LZB_PATH', LTH_AUTUMN_BLOCKS_INC_PATH . '/lzb/');
        define('LTH_LZB_URL', LTH_AUTUMN_BLOCKS_INC_URL . '/lzb/');

        // Include the LZB plugin.
        require_once LTH_LZB_PATH . 'lazy-blocks.php';


        // Register and load all blocks.         
        $this->lth_require_all(LTH_AUTUMN_BLOCKS_PATH . $this->lth_components_dir, '_');
    }

    // => Enqueue your custom blocks 
    function lth_custom_blocks_assets() {

        // wp_enqueue_style(
        //     'lth-customs-editor-styles',
        //     get_template_directory() . 'assets/css/customs.css',
        //     false,
        //     wp_get_theme()->get('Version')
        // );       

        // if ( class_exists( 'WooCommerce' ) ) {
        //     wp_enqueue_style(
        //         'lth-product-editor-styles',
        //         get_template_directory() . 'assets/css/product.css',
        //         false,
        //         wp_get_theme()->get('Version')
        //     );      
        // }

        // wp_enqueue_style(
        //     'lth-bootstrap-styles',
        //      plugin_dir_url(__FILE__) . 'assets/vendors/bootstrap/bootstrap.min.css',
        //     false,
        //     wp_get_theme()->get('Version')
        // );
        // wp_register_script(
        //     'lth-bootstrap-scripts',
        //     plugin_dir_url(__FILE__) . 'assets/vendors/bootstrap/bootstrap.min.js',
        //     array('jquery'),
        //     true,
        //     wp_get_theme()->get('Version')
        // );
        // wp_enqueue_script('lth-bootstrap-scripts');

        // wp_enqueue_style(
        //     'lth-fontawesome-styles',
        //      plugin_dir_url(__FILE__) . 'assets/vendors/fontawesome/css/all.fontawesome.min.css',
        //     false,
        //     wp_get_theme()->get('Version')
        // );

        wp_enqueue_style(
            'lth-slick-styles',
             plugin_dir_url(__FILE__) . 'assets/vendors/slick/slick.min.css',
            false,
            wp_get_theme()->get('Version')
        );
        wp_register_script(
            'lth-slick-scripts',
            plugin_dir_url(__FILE__) . 'assets/vendors/slick/slick.min.js',
            array('jquery'),
            true,
            wp_get_theme()->get('Version')
        );
        wp_enqueue_script('lth-slick-scripts');

        // wp_register_script(
        //     'lth-countdown-scripts',
        //     plugin_dir_url(__FILE__) . 'assets/vendors/countdown/jquery.countdown.min.js',
        //     array('jquery'),
        //     true,
        //     wp_get_theme()->get('Version')
        // );
        // wp_enqueue_script('lth-countdown-scripts');

        // wp_enqueue_script(
        //     'lth-custom-block-scripts',
        //     plugin_dir_url(__FILE__) . 'assets/js/lth-blocks.js',
        //     array(),
        //     true,
        //     wp_get_theme()->get('Version')
        // );
        // wp_enqueue_script('lth-custom-block-scripts');
    }

    // => Enqueue your custom widgets 
    function lth_custom_widgets_assets() {
        // wp_enqueue_style(
        //     'lth-custom-widget-styles',
        //     LTH_AUTUMN_THEME_URL . 'assets/css/lth-widgets.css',
        //     false,
        //     wp_get_theme()->get('Version')
        // );

        // wp_enqueue_script(
        //     'lth-custom-widget-scripts',
        //     LTH_AUTUMN_THEME_URL . 'assets/js/lth-widgets.js',
        //     array(),
        //     true,
        //     wp_get_theme()->get('Version')
        // );
    }
}

// Init instance core to launch
return LthAutumnBlocks::getInstance();
