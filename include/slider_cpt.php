<?php
//Creating custom post type 
function custom_post_type_slider(){
		register_post_type('simple-slider',
   		array(
   			'labels'=>array(
   			'name'=>__('Simple Slider'),
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
       'edit.php?post_type=simple-slider',
       'Post Settings', /*page title*/
       'Display Settings', /*menu title*/
       'manage_options', /*roles and capabiliyt needed*/
       'slider_post_settings',
       'Update_slider_settings' /*replace with your own function*/
   ); 
}



 add_action('init','custom_post_type_slider');