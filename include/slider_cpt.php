<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Creating custom post type 
if(!function_exists('DIS_custom_post_type_slider')){
function DIS_custom_post_type_slider(){
		register_post_type('simple-slider-image',
   		array(
   			'labels'=>array(
   			'name'=>__('Dynamic Iamge Slider'),
   			'Singular_name'=>__('slider')
   		),
   		'supports'=>array('title','editor','thumbnail'),
   		'public'=>true,
   			'has_archive'=>true,
   			'can_export'=>true,
   			'rewrite'=>array('slug'=>'sliders')
   		));
   	/*  Adding sub menu in custom post type here adding admin option in custom post type */
   	add_submenu_page(
       'edit.php?post_type=simple-slider-image',
       'Post Settings', /*page title*/
       'Display Settings', /*menu title*/
       'manage_options', /*roles and capabiliyt needed*/
       'slider_post_settings',
       'Update_slider_settings' /*replace with your own function*/
   ); 
}
}
add_action('init','DIS_custom_post_type_slider');