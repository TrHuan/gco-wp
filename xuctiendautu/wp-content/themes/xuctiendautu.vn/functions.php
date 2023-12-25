<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );

// Tat Gutenberg editor
add_filter('use_block_editor_for_post', '__return_false', 10);
// widget classic
add_filter('user_widgets_block_editor', '__return_false', 10);
// Disable XMLRPC (security tab) 
add_filter('xmlrpc_enabled', '__return_false');

/* Added back to top button */
function bss_custom_scripts() {
	wp_enqueue_script('back-to-top-script', get_stylesheet_directory_uri() . '/vn-data/themes/xuctiendautu.vn/js/back-to-top.js', array( 'jquery' ), false, true);
}
add_action('wp_enqueue_scripts', 'bss_custom_scripts');
function html_bss_back_to_top() { ?>
     <a href="#top" class="back-to-top-button"><img src="/vn-data/themes/xuctiendautu.vn/icon/back-to-top.svg" alt="icon back to top"></a>
<?php }
add_action('wp_footer', 'html_bss_back_to_top');

// Allow SVG (post/page tab)
function ignore_upload_ext($checked, $file, $filename, $mimes){
	if(!$checked['type']){
		$wp_filetype = wp_check_filetype( $filename, $mimes );
		$ext = $wp_filetype['ext'];
		$type = $wp_filetype['type'];
		$proper_filename = $filename;
		if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
			$ext = $type = false;
		}
		$checked = compact('ext','type','proper_filename');
	}
	return $checked;
}
add_filter('wp_check_filetype_and_ext', 'ignore_upload_ext', 10, 4);

// Automatically set the image Title, Alt-Text, Caption & Description upload (image tab)
add_action( 'add_attachment', 'vnex_set_image_meta_image_upload' );
function vnex_set_image_meta_image_upload( $post_ID ) {
	if ( wp_attachment_is_image( $post_ID ) ) {
	$vnex_image_title = get_post( $post_ID )->post_title;
	$vnex_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',
	$vnex_image_title );
	$vnex_image_title = ucwords( strtolower( $vnex_image_title ) );
	$vnex_my_image_meta = array(
	'ID' => $post_ID,
	'post_title' => $vnex_image_title,
	'post_excerpt' => '',
	);
	update_post_meta( $post_ID, '_wp_attachment_image_alt',	$vnex_image_title );
	wp_update_post( $vnex_my_image_meta );
	}
}

// Remove unnecessary links from wp_head (setting tab)
// Remove RSD Link Tag
remove_action('wp_head', 'rsd_link');
// Hide WordPress version
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
// Remove wlwmanifest Link
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);