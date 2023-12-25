<?php
    /*
    Plugin Name: Backlink Plugin
    Plugin URI: http://linkconnect.com/script/wp
    Description: Link Exchange Network.
    Version: 1.2
    Author: linkconnect
    Author URI: http://linkconnect.com
    License: A "linkconnect" license name e.g. GPL2 *
    */

    /*  Copyright 2010  linkconnect.net  (email : plugin@linkconnect.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Linkconnect.net
    */

    if ( ! defined( 'WP_CONTENT_URL' ) )
        define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
    if ( ! defined( 'WP_CONTENT_DIR' ) )
        define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
    if ( ! defined( 'WP_PLUGIN_URL' ) )
        define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
    if ( ! defined( 'WP_PLUGIN_DIR' ) )
        define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
    if ( ! defined( 'LINKCONNECT_NAME' ) )
        define( 'LINKCONNECT_NAME', '56558aa49927761841b7888774ea2212');

    add_action( 'widgets_init', 'load_LinkConnect_Widget' );

    function load_LinkConnect_Widget() {
        if ((defined('WP_ALLOW_MULTISITE') && WP_ALLOW_MULTISITE) || (function_exists('is_multisite') && is_multisite())) {
            if(function_exists('is_super_admin') && is_super_admin()) {
                add_action('admin_notices',  array('LinkConnect_Widget', 'multisiteWarning'));
            }
        }
        return register_widget( 'LinkConnect_Widget' );
    }

    class linkConnect_Widget extends WP_Widget {
        var $linker;

        public function multisiteWarning () {
            echo "<div id='sm-multisite-warning' class='error fade'><p><strong>".
            __('LinkConnect plugin is not multisite compatible.','56558aa49927761841b7888774ea2212')."</strong><br /> " .
            "</p></div>";
        }


        function linkConnect_Widget() {
            $fName = WP_PLUGIN_DIR . '/linkconnect/lc_e00d87a930.php';
            if (!is_readable($fName))
                $fName = dirname (__FILE__) . '/lc_e00d87a930.php';

            require_once ($fName);

            /*
            * Pruner callback will be used to prune all cache from server when something changed.
            * Pruning is not enabled by default.
            *
            * We will prune cache when:
            *  - VoltrankDb::getEnableCachePrune returns true
            *  - VoltrankDb::getPruneCache returns true
            *
            * setPruneCache (true) is triggered when getEnablePruneCache returns true and
            *  - during successful incremental update
            *  - during successful command fullUpdate
            *
            * Full update is triggered once for 72 hours and we want to do it less often.
            * Incremental updates are triggered up to 2 hours depending on changes related to your website.
            *
            * We can do this actions manually but only for debugging purposes, that means we might refresh with intervals greater or equal to 2 hours.
            */

            $this->linker=new linkConnect();

            /**
            * When running in test mode try to avoid being cached.
            * This value is respected by two most popular plugins.
            */
            /*if ($this->linker->__getTestMode ()) {
            define ('DONOTCACHEPAGE', true);
            }*/

            parent::WP_Widget(LINKCONNECT_NAME, __('LinkConnect', 'linkconnect'));
        }


        function widget ($args, $instance) {
            extract ($args);

            echo $before_widget;
            echo $this->linker->display ();
            echo $after_widget;
        }


        function update( $new_instance, $old_instance ) {
            return $old_instance;
        }


        function form( $instance ) {
            if (($fp = @fopen (trailingslashit( dirname(__FILE__) ) . '/linker.err', 'r'))) {
            ?>
            Error log not empty. Few last lines looks like this:<br>
            <?php
                $cnt = 0;
                $lines = array ();
                while (($line = fgets ($fp))) {
                    $lines [$cnt++ % 10] = $line;
                }

                $limit = 10;
                while ($limit-- > 0 && ($line = @$lines[$cnt++ % 10]))
                    echo $line . '<br>';
                return;
            }

        ?>
        Everything works just fine.
        <?php

        }


    }


    //insert backlink to top of conent
    add_filter( 'the_content', 'linkconnect_insert_to_top_the_content_filter', 120 );

    function linkconnect_insert_to_top_the_content_filter( $content ) {

        $fName = WP_PLUGIN_DIR . '/linkconnect/lc_e00d87a930.php';
        if (!is_readable($fName))
            $fName = dirname (__FILE__) . '/lc_e00d87a930.php';

        require_once ($fName);

        $linker=new linkConnect();

        $original_content = $content ; // preserve the original ...
        $add_before_content =  $linker->display();
        $content = $add_before_content . $original_content  ;

        // Returns the content.
        return $content;
    }
?>
