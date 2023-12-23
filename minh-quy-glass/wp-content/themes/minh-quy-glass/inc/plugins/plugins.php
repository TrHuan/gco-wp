<?php

function lth_plugin_activation() {

 

        // Khai bao plugin can cai dat

        $plugins = array(



                array(

                        'name'               => 'Advanced Custom Fields Pro', // The plugin name

                        'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name)

                        'source'             => get_template_directory() . '/inc/plugins/advanced-custom-fields-pro.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



                array(

                        'name' => 'Advanced Editor Tools',

                        'slug' => 'tinymce-advanced',

                        'required' => true,

                ),



                array(

                        'name' => 'WooCommerce',

                        'slug' => 'woocommerce',

                        'required' => true,

                ),



                array(

                        'name' => 'Contact Form 7',

                        'slug' => 'contact-form-7',

                        'required' => true,

                ),



                array(

                        'name' => 'Translatepress Multilingual',

                        'slug' => 'translatepress-multilingual',

                        'required' => true,

                ),



                array(

                        'name' => 'Yoast SEO',

                        'slug' => 'wordpress-seo',

                        'required' => true,

                ),



                array(

                        'name' => 'WP Super Cache',

                        'slug' => 'wp-super-cache',

                        'required' => true,

                ),



                array(

                        'name' => 'WordPress Importer',

                        'slug' => 'wordpress-importer',

                        'required' => true,

                ),

        );

 

        // Thiet lap TGM

        $configs = array(

                'menu' => 'tp_plugin_install',

                'has_notice' => true,

                'dismissable' => false,

                'is_automatic' => true

        );

        tgmpa( $plugins, $configs );

 

}

add_action('tgmpa_register', 'lth_plugin_activation');

?>