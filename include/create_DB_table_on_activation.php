<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    global $wpdb;
    	$table_name ='Slider_settings';
   	$charset_collate = $wpdb->get_charset_collate();
   	$sql ="CREATE TABLE IF NOT EXISTS $table_name(
     		id mediumint(11) NOT NULL AUTO_INCREMENT,
     		slider_img_per_page varchar(100) NOT NULL,
     		border_color varchar(100) NOT NULL,
            Slider_Timer varchar(100) NOT NULL,
            border_width int NOT NULL,
    		PRIMARY KEY  (id) ) $charset_collate;";
   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );




   global $wpdb;
       $table_name = 'Slider_settings';
       $id = '1';
       $slider_img_per_page = '10';
       $border_color = 'black';
       $Slider_Timer = '2000';
       $border_width ='0';
       
       
     $insert_setting =  $wpdb->insert($table_name, array(

          'id' => $id,
          'slider_img_per_page' => $slider_img_per_page,
          'border_color'=> $border_color,
          'Slider_Timer' => $Slider_Timer,
          'border_width'=> $border_width
          

 ));


?>
