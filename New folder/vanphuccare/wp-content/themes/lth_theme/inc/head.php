<?php
/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_styles() {
    // file css
    wp_enqueue_style(THEME_NAME . '-bootstrap', ASSETS_URI . '/css/bootstrap.min.css', false, THEME_VERSION, 'all');
    // wp_enqueue_style(THEME_NAME . '-slick', ASSETS_URI . '/css/slick.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-swiper', ASSETS_URI . '/css/swiper-bundle.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-fancybox', ASSETS_URI . '/css/jquery.fancybox.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-icofont', ASSETS_URI . '/css/icofont.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-typo', ASSETS_URI . '/css/typo.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-font-segoeui', ASSETS_URI . '/css/font-segoeui.css', false, THEME_VERSION, 'all');

    wp_enqueue_style(THEME_NAME . '-customs', ASSETS_URI . '/css/customs.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-reponsives', ASSETS_URI . '/css/reponsives.css', false, THEME_VERSION, 'all');

}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

/**
 * Add js
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_scripts() {
    wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/js/jquery.min.js', false, THEME_VERSION, 'all');
    // wp_enqueue_script(THEME_NAME.'-bootstrap', ASSETS_URI .'/js/bootstrap.min.js', false, THEME_VERSION, 'all');
    // wp_enqueue_script(THEME_NAME.'-slick', ASSETS_URI .'/js/slick.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-swiper', ASSETS_URI .'/js/swiper-bundle.min.js', false, THEME_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'-fancybox', ASSETS_URI .'/js/jquery.fancybox.min.js', false, THEME_VERSION, 'all');
    // wp_enqueue_script(THEME_NAME.'-countdown', ASSETS_URI .'/js/countdown.min.js', false, THEME_VERSION, 'all');
    
    wp_enqueue_script(THEME_NAME.'-main', ASSETS_URI .'/js/main.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);