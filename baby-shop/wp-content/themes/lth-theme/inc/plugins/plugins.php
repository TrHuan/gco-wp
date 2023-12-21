<?php

function lth_plugin_activation() {

 

        // Khai bao plugin can cai dat

        $plugins = array(


                array(

                        'name'               => 'WPBakery Page Builder', // The plugin name

                        'slug'               => 'js_composer', // The plugin slug (typically the folder name)

                        'source'             => get_template_directory() . '/inc/plugins/js_composer.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



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

                        'name'               => 'Testimonials', // The plugin name

                        'slug'               => 'testimonials', // The plugin slug (typically the folder name)

                        'source'             => get_template_directory() . '/inc/plugins/testimonials.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



                array(

                        'name' => 'Contact Form 7',

                        'slug' => 'contact-form-7',

                        'required' => true,

                ),



                array(

                        'name' => 'Contact Form CFDB7',

                        'slug' => 'contact-form-cfdb7',

                        'required' => true,

                ),



                array(

                        'name'               => 'Polylang Pro', // The plugin name

                        'slug'               => 'polylang-pro', // The plugin slug (typically the folder name)

                        'source'             => get_template_directory() . '/inc/plugins/polylang-pro.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



                array(

                        'name'               => 'Theme Translation For Polylang', // The plugin name

                        'slug'               => 'theme-translation-for-polylang', // The plugin slug (typically the folder name)

                        'source'             => get_template_directory() . '/inc/plugins/theme-translation-for-polylang.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),

                

                array(

                        'name' => 'Site Reviews Woocommerce',

                        'slug' => 'site-reviews-woocommerce',

                        'source'             => get_template_directory() . '/inc/plugins/site-reviews-woocommerce.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



                array(

                        'name' => 'Wp Mail Smtp',

                        'slug' => 'wp-mail-smtp',

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