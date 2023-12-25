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


foreach(glob(BLOCKS_DIR . '/lazyblock-*/*.php') as $file) {
    require_once($file);
}

// require_once(BLOCKS_DIR . '/lazyblock-blocks/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-blocks/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-blocks/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-section/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-section/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-section/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-shortcode/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-shortcode/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-shortcode/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-banner/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-banner/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-banner/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-blogs/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-blogs/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-blogs/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-brand/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-brand/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-brand/frontend.php');

// // require_once(BLOCKS_DIR . '/lazyblock-cart/attributes.php');
// // require_once(BLOCKS_DIR . '/lazyblock-cart/editor.php');
// // require_once(BLOCKS_DIR . '/lazyblock-cart/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-categories/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-categories/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-categories/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-classic/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-classic/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-classic/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-contact/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-contact/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-contact/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-faq/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-faq/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-faq/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-features/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-features/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-features/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-gallery/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-gallery/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-gallery/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-html-blocks/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-html-blocks/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-html-blocks/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-list/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-list/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-list/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-list-text/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-list-text/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-list-text/frontend.php');

// // require_once(BLOCKS_DIR . '/lazyblock-logo/attributes.php');
// // require_once(BLOCKS_DIR . '/lazyblock-logo/editor.php');
// // require_once(BLOCKS_DIR . '/lazyblock-logo/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-menu/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-menu/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-menu/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-products/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-products/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-products/frontend.php');

// // require_once(BLOCKS_DIR . '/lazyblock-search/attributes.php');
// // require_once(BLOCKS_DIR . '/lazyblock-search/editor.php');
// // require_once(BLOCKS_DIR . '/lazyblock-search/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-slider/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-slider/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-slider/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-tab/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-tab/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-tab/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-testimonials/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-testimonials/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-testimonials/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-title/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-title/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-title/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-toggle/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-toggle/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-toggle/frontend.php');

// /////////////////////////////////////////////////////////////////////////

// require_once(BLOCKS_DIR . '/lazyblock-about/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-about/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-about/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-support/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-support/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-support/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-project/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-project/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-project/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-why-choose/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-why-choose/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-why-choose/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-why-choose-2/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-why-choose-2/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-why-choose-2/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-receive-messages/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-receive-messages/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-receive-messages/frontend.php');

// require_once(BLOCKS_DIR . '/lazyblock-favorite/attributes.php');
// require_once(BLOCKS_DIR . '/lazyblock-favorite/editor.php');
// require_once(BLOCKS_DIR . '/lazyblock-favorite/frontend.php');

function lth_allowed_block_types( $allowed_blocks ) {     
    return array(
        'core/columns',
        'core/freeform', // Classic
        'lazyblock/lth-section',
        // 'lazyblock/lth-shortcode',
        // 'lazyblock/lth-blocks',
        'lazyblock/lth-banner',
        'lazyblock/lth-blogs',
        'lazyblock/lth-brand',
        // 'lazyblock/lth-shopcart',
        'lazyblock/lth-categories',
        'lazyblock/lth-classic',
        'lazyblock/lth-contact',
        // 'lazyblock/lth-faq',
        // 'lazyblock/lth-features',
        // 'lazyblock/lth-gallery',
        'lazyblock/lth-html-blocks',
        'lazyblock/lth-list',
        'lazyblock/lth-list-text',
        // 'lazyblock/lth-logo',
        // 'lazyblock/lth-menu',
        // 'lazyblock/lth-products',
        // 'lazyblock/lth-search',
        'lazyblock/lth-slider',
        // 'lazyblock/lth-tab',
        'lazyblock/lth-testimonials',
        'lazyblock/lth-title',
        // 'lazyblock/lth-toggle',

        ////////////////////////////////////
        
        'lazyblock/lth-about',
        'lazyblock/lth-support',
        'lazyblock/lth-project',
        'lazyblock/lth-why-choose',
        'lazyblock/lth-why-choose-2',
        'lazyblock/lth-receive-messages',
        'lazyblock/lth-favorite',

    );  
} add_action('allowed_block_types', 'lth_allowed_block_types', 11);