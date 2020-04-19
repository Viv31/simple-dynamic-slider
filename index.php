<?php
/**
   * Plugin Name: dynamic Image Slider 
   * Plugin URI:
   * Description:A plugin for making Simple slider add images in post type Set featured image section and  paste shortcode on your page where you want to show slider [Dynamic-Image-Slider] Shortcode   .
   * Version:1.0
   * Author:Vaibhav Gangrade
   * Author URI:
   */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); //calling main plugin file

$plugin = 'simple-dynamic-slider-master/index.php';
 /* Plugin directory path after plugin folder*/
 if (is_plugin_active($plugin))
            { 
include_once('include/slider_shortcode.php');
  include_once('include/create_DB_table_on_activation.php');
  
  register_activation_hook(__FILE__, 'insert_data_on_plugin_activation');
include_once('include/slider_cpt.php');
include_once('include/admin_options_form.php');
include_once('include/delete_page_and_DB_table_on_deactivation.php');
register_deactivation_hook( __FILE__, 'DIS_my_plugin_remove_database' ); 
}


?>