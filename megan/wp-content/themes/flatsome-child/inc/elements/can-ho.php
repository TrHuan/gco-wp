<?php
add_ux_builder_shortcode('can_ho', array(
        'name'      => __('Căn Hộ'),
        'category'  => __('Content'),
        'styles' => array(
            // 'gco-bootstrap-style' => LTH_CHILD_URI . '/assets/css/bootstrap.min',
            'gco-slick-style' => LTH_CHILD_URI . '/assets/css/slick.min.css',
            // 'gco-elements-style' => LTH_CHILD_URI . '/assets/css/gco-elements',
        ),
        'scripts' => array(
            // 'gco-jquery-script' => LTH_CHILD_URI . '/assets/js/jquery.min',
            'gco-slick-script' => LTH_CHILD_URI . '/assets/js/slick.min.js',
            'gco-main-script' => LTH_CHILD_URI . '/assets/js/main.js',
        ),
        'options' => array(
            'gco_textfield_title'    =>  array(
                'type' => 'textfield',
                'heading' => 'Tiêu Đề',
                'default' => '',
                'step' => '',
            ),
            // trường text nhập liệu
            'gco_post_cat' => array(
                'type' => 'select',
                'heading' => 'Danh Mục',
                'param_name' => 'ids',
                'config' => array(
                    'multiple' => false,
                    'placeholder' => 'Select…',
                    'termSelect' => array(
                        'post_type' => 'du_an',
                        'taxonomies' => 'du_an_cat',
                    ),
                ),
            ),
            'gco_textfield_per_page' =>  array(
                'type' => 'textfield',
                'heading' => 'Số Sản Phẩm Hiển Thị',
                'default' => '',
                'step' => '',
            ),
            'gco_select_style'    =>  array(
                'type' => 'select',
                'heading' => 'Select',
                'default' => 'style-1',
                'options' => array(
                    'style-1' => 'Style 01',
                    'style-2' => 'Style 02',
                ),                  
            ),
        ),
    ));