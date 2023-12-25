<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Dự án
 */

class Nhom_Mau extends Custom_Taxonomy_Abstract
{
	public function register_taxonomy($taxonomy)
	{
		$taxonomy->set_taxonomy([
			'taxonomy' 			=> 'muc-du-an',
			'post_type' 		=> 'du-an',
			'name' 				=> __('Danh mục dự án', 'shtheme'),
			'singular_name' 	=> __('Danh mục dự án', 'shtheme'),
		]);

		// $taxonomy->set_taxonomy([
		// 	'taxonomy' 			=> 'vi-tri-du-an',
		// 	'post_type' 		=> 'du-an',
		// 	'name' 				=> __('Tỉnh / TP', 'shtheme'),
		// 	'singular_name' 	=> __('Tỉnh / TP', 'shtheme'),
		// ]);
	}

}

new Nhom_Mau();