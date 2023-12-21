<?php
function theme_plugin_activation() {
        $plugins = array(
                array(
                        'name' => 'Redux Framework',
                        'slug' => 'redux-framework',
                        'required' => true
                ),
                array(
                        'name' => 'Contact Form 7',
                        'slug' => 'contact-form-7',
                        'required' => true
                ),
                array(
                        'name' => 'Regenerate Thumbnails',
                        'slug' => 'regenerate-thumbnails',
                        'required' => true
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
add_action('tgmpa_register', 'theme_plugin_activation');
?>