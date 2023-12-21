<?php
    if(function_exists('wp_nav_menu')){
        $args = array(
            'theme_location' 	=> 	'primary',
            'container'         =>  'nav',         // bao ngoài
            'container_class'   =>  'menu-wrap',
            'container_id'      =>  'menu',
            'menu_class'		=>	'menu',        // class ul
            // 'items_wrap'        =>  '<ul id="menu" class="menu">%3$s</ul>'     // thay đổi html ul
        );
        wp_nav_menu( $args );
    }
?>