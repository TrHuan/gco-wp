<?php
function codex_custom_init() {

	// Video
	$labels = array(
		'name' => 'Video',
		'singular_name' => 'All Posts',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Post',
		'edit_item' => 'Edit Post',
		'new_item' => 'New Post',
		'all_items' => 'Video',
		'view_item' => 'View Post',
		'search_items' => 'Search Posts',
		'not_found' =>  'No posts found',
		'not_found_in_trash' => 'No posts found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Video'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'menu_icon' => 'dashicons-video-alt3',
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'video','with_front' => true ),
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => true,
		//'menu_position' => 7,
		'supports' => array( 'title'),
		//'taxonomies' =>array('','post_tag')
		'taxonomies' =>array('','')
	);
	register_post_type( 'video', $args );

	flush_rewrite_rules();
}
add_action( 'init', 'codex_custom_init' );