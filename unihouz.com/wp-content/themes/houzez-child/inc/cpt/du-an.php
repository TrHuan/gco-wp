<?php

class Mau_Sac extends CPT_Abstract
{
	public function register_post_type($cpt)
	{
		$cpt->set_post_type(array(
			'post_type' 	=> 'du-an',
			'name' 			=> _x( 'Dự án', 'Post Type General Name', 'shtheme' ),
			'singular_name' => _x( 'Dự án', 'Post Type Singular Name', 'shtheme' ),
			'supports'		=> [ 'title', 'editor', 'thumbnail', 'excerpt' , 'revisions' ],
			'menu_icon'		=> 'dashicons-editor-contract',
			'rewrite'		=> [ 'slug' => 'du-an'],
			'menu_position'	=> 6
		));
		// $cpt->set_no_slug_post_type( 'du-an' );
		//$cpt->set_no_gutenberg_post_types('du-an);

		$cpt->set_post_type(array(
			'post_type' 	=> 'chu-dau-tu',
			'name' 			=> _x( 'Chủ đầu tư', 'Post Type General Name', 'shtheme' ),
			'singular_name' => _x( 'Chủ đầu tư', 'Post Type Singular Name', 'shtheme' ),
			'supports'		=> [ 'title', 'editor', 'thumbnail', 'excerpt' , 'revisions' ],
			'menu_icon'		=> 'dashicons-businessperson',
			'rewrite'		=> [ 'slug' => 'chu-dau-tu'],
			'menu_position'	=> 6
		));
	}
}
new Mau_Sac();