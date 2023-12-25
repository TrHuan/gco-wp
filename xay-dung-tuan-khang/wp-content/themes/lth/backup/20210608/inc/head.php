<?php
/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_styles() {
    wp_enqueue_style(THEME_NAME . '-awesome', ASSETS_URI . '/css/font-awesome.min.css', false, THEME_VERSION, 'all');    
    
    wp_enqueue_style(THEME_NAME . '-revolution-settings', ASSETS_URI . '/revolution/css/settings.css', false, THEME_VERSION, 'all');   
    wp_enqueue_style(THEME_NAME . '-revolution-layers', ASSETS_URI . '/revolution/css/layers.css', false, THEME_VERSION, 'all');   
    wp_enqueue_style(THEME_NAME . '-revolution-navigation', ASSETS_URI . '/revolution/css/navigation.css', false, THEME_VERSION, 'all');   

    wp_enqueue_style(THEME_NAME . '-slick', ASSETS_URI . '/css/slick.min.css', false, THEME_VERSION, 'all');    

    wp_enqueue_style(THEME_NAME . '-style', ASSETS_URI . '/css/style.css', false, THEME_VERSION, 'all');    
    wp_enqueue_style(THEME_NAME . '-responsive', ASSETS_URI . '/css/responsive.css', false, THEME_VERSION, 'all');

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
    wp_enqueue_script(THEME_NAME.'-bootstrap', ASSETS_URI .'/js/bootstrap.min.js', false, THEME_VERSION, 'all');
        
    wp_enqueue_script(THEME_NAME.'-tools', ASSETS_URI .'/revolution/js/jquery.themepunch.tools.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-revolution', ASSETS_URI .'/revolution/js/jquery.themepunch.revolution.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-actions', ASSETS_URI .'/revolution/js/extensions/revolution.extension.actions.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-revolution-carousel', ASSETS_URI .'/revolution/js/extensions/revolution.extension.carousel.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-kenburn', ASSETS_URI .'/revolution/js/extensions/revolution.extension.kenburn.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-layeranimation', ASSETS_URI .'/revolution/js/extensions/revolution.extension.layeranimation.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-migration', ASSETS_URI .'/revolution/js/extensions/revolution.extension.migration.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-navigation', ASSETS_URI .'/revolution/js/extensions/revolution.extension.navigation.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-parallax', ASSETS_URI .'/revolution/js/extensions/revolution.extension.parallax.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-slideanims', ASSETS_URI .'/revolution/js/extensions/revolution.extension.slideanims.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-video', ASSETS_URI .'/revolution/js/extensions/revolution.extension.video.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-slick', ASSETS_URI .'/js/slick.min.js', false, THEME_VERSION, 'all');

    wp_enqueue_script(THEME_NAME.'-main', ASSETS_URI .'/js/main.js', false, THEME_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);