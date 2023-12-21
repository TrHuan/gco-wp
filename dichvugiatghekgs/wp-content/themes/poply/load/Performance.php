<?php
// Remove Version Css Js
function remove_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
if (!is_admin()) add_filter( 'style_loader_src', 'remove_ver_css_js', 9999 );
if (!is_admin()) add_filter( 'script_loader_src', 'remove_ver_css_js', 9999 );


// Add Async to the Css Js
function add_async_attribute_css($tag, $handle) {
    // $scripts_to_async = array('main-style');
    // foreach($scripts_to_async as $async_script) {
        // if ($async_script === $handle) {
            return str_replace(' href', ' async="async" href', $tag);
        // }
    // }
    return $tag;
}
// function add_async_attribute_js($tag, $handle) {
//     // $scripts_to_async = array('main-script');
//     // foreach($scripts_to_async as $async_script) {
//         // if ($async_script === $handle) {
//         if ($handle != 'jquery-core' ) {
//             return str_replace(' src', ' defer="defer" src', $tag);
//         }
//         // }
//     // }
//     return $tag;
// }
if (!is_admin()) add_filter('style_loader_tag', 'add_async_attribute_css', 10, 2);
// if (!is_admin()) add_filter('script_loader_tag', 'add_async_attribute_js', 10, 2);


// Add Async to the Css Js 2
// function defer_parsing_of_js ( $url ) {
// if ( FALSE === strpos( $url, '.js' ) ) return $url;
// // if ( strpos( $url, 'jquery.js' ) ) return $url;
// return "$url' async= ";
// }
// if (!is_admin()) add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );

// function defer_parsing_of_js2 ( $url ) {
// if ( FALSE === strpos( $url, '.css' ) ) return $url;
// // if ( strpos( $url, 'jquery.js' ) ) return $url;
// return "$url' defer= ";
// }
// if (!is_admin()) add_filter( 'clean_url', 'defer_parsing_of_js2', 12, 2 );


// Remove JQuery migrate
function remove_jquery_migrate( $scripts ) {
    if ( !is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) { 
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );
// function remove_jquery_migrate( $scripts ) {
//     if( wp_is_mobile() ){
//         return null;
//     } else {
//         if ( !is_admin() && isset( $scripts->registered['jquery'] ) ) {
//             $script = $scripts->registered['jquery'];
//             if ( $script->deps ) { 
//                 $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
//             }
//         }
//     }
// }
// add_action( 'wp_default_scripts', 'remove_jquery_migrate' );


// Clean Header
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head, 10, 0');


// Adding DNS Prefetching
// function wp_dns_prefetch() {
//     echo '
//     <meta http-equiv="x-dns-prefetch-control" content="on">
//     <link rel="dns-prefetch" href="//fonts.googleapis.com" />
//     <link rel="dns-prefetch" href="//fonts.gstatic.com" />
//     <link rel="dns-prefetch" href="//ajax.googleapis.com" />
//     <link rel="dns-prefetch" href="//apis.google.com" />
//     <link rel="dns-prefetch" href="//google-analytics.com" />
//     <link rel="dns-prefetch" href="//www.google-analytics.com" />
//     <link rel="dns-prefetch" href="//ssl.google-analytics.com" />
//     <link rel="dns-prefetch" href="//youtube.com" />
//     <link rel="dns-prefetch" href="//api.pinterest.com" />
//     <link rel="dns-prefetch" href="//connect.facebook.net" />
//     <link rel="dns-prefetch" href="//platform.twitter.com" />
//     <link rel="dns-prefetch" href="//syndication.twitter.com" />
//     <link rel="dns-prefetch" href="//syndication.twitter.com" />
//     <link rel="dns-prefetch" href="//platform.instagram.com" />
//     <link rel="dns-prefetch" href="//s.gravatar.com" />
//     <link rel="dns-prefetch" href="//s0.wp.com" />
//     <link rel="dns-prefetch" href="//stats.wp.com" />
//     ';
// }
// add_action('wp_head', 'wp_dns_prefetch', 0);


// Disable Embeds
function my_deregister_scripts(){
    wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


// Disable Dashicons
function my_deregister_styles()    { 
   wp_deregister_style( 'dashicons' ); 
}
if ( !is_admin() && !is_user_logged_in() ) add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
// Disable Admin bar
function hide_admin_bar_from_front_end(){
    if (is_blog_admin()) {
        return true;
    }
    return false;
}
if ( !is_admin() && !is_user_logged_in() ) add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );


// Disable emojis
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
    return $urls;
}

?>