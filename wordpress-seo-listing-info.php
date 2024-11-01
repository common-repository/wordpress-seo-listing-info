<?php
/*
Plugin Name: WordPress SEO Listing Info 
Plugin URI: http://wordpress.org/extend/plugins/wordpress-seo-listing-info/
Description: This plugin extends WordPress SEO by Yoast to add meta decription and title info to the post & page listing screen.
Author: Neil Pie
Author URI: http://profiles.wordpress.org/neil_pie
Version: 1.2
License: WTFPL
*/
/* This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://sam.zoy.org/wtfpl/COPYING for more details. */


class WordPressSeoListingInfo {

    public function __construct(){

                add_filter('manage_posts_columns', array(&$this,'add_column_headers'));
            add_action('manage_posts_custom_column',array(&$this,'add_column_content'),10,2);
      
    add_filter('manage_pages_columns', array(&$this,'add_column_headers'));
            add_action('manage_pages_custom_column',array(&$this,'add_column_content'),10,2);
      
    }
    public function add_column_headers($defaults) {
        $defaults['_yoast_wpseo_title'] = 'SEO Title';

        $defaults['_yoast_wpseo_metadesc'] = 'SEO Description';
        return $defaults;
    }

    public function add_column_content($column_name, $post_ID) {
        $content = '';
        if ($column_name == '_yoast_wpseo_title') {
            $content = get_post_meta($post_ID, '_yoast_wpseo_title',true);

        }
        if ($column_name == '_yoast_wpseo_metadesc') {
            $content = get_post_meta($post_ID, '_yoast_wpseo_metadesc',true);

        }

        echo  $content ;

    }

}
    $WordPressSeoListingInfo = new WordPressSeoListingInfo();
