<?php

/**
 * Initialize the meta boxes. See /option-tree/assets/theme-mode/demo-meta-boxes.php for reference
 *
 */
add_action( 'admin_init', 'eweb_meta_boxes' );

if ( ! function_exists( 'eweb_meta_boxes' ) ){
	function eweb_meta_boxes() {

		$meta_boxes_post = array(
			'id'        => 'setting-for-product',
			'title'     => 'Cấu hình thêm',
			'desc'      => '',
			'pages'     => array( 'post' ),
			'context'   => 'normal',
			'priority'  => 'high',
			'fields'    => array(
				array(
					'id'          => 'is_feature_post',
					'label'       => 'Bài viết nổi bật',
					'desc'        => '',
					'type'        => 'checkbox',
					'choices'     => array(
						array(
						'value'       => 'feature_post',
						'label'       => 'Đây có phải là bài viết nổi bật không? (Check: Yes - Uncheck: No)',
						)
					)
				),
				// array(
				// 	'id'          => 'is_money_post',
				// 	'label'       => 'Vị trí ăn tiền',
				// 	'desc'        => '',
				// 	'type'        => 'checkbox',
				// 	'choices'     => array(
				// 		array(
				// 		'value'       => 'yes',
				// 		'label'       => 'Đây có phải bài viết được mua vị trí? (Check: Yes - Uncheck: No)',
				// 		)
				// 	)
				// ),
			),
		);

	  	ot_register_meta_box( $meta_boxes_post );
	}
}