<?php
add_ux_builder_shortcode('du_an', array(
        'name'      => __('Dự Án'),
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
            // trường text nhập liệu
            'gco_post_cat' => array(
                'type' => 'select',
                'heading' => 'Danh Mục',
                'param_name' => 'ids',
                'config' => array(
                    'multiple' => true,
                    'placeholder' => 'Select…',
                    'termSelect' => array(
                        'post_type' => 'du_an',
                        'taxonomies' => 'du_an_cat',
                    ),
                ),
            ),
        ),
    ));