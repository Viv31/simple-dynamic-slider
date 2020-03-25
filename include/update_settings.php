<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wpdb;
   $select_time_and_post_for_update ="SELECT * FROM slider_settings WHERE id ='1'";
   $Post_Setting_data_for_update = $wpdb->get_results($select_time_and_post_for_update);  
   /*print_r($data);
   die;*/
   foreach ($Post_Setting_data_for_update as $settingDataUpdate) {
      /*echo $settingDataUpdate->id;
      echo $settingDataUpdate->posts_per_page;
      echo "<br>";
      echo $settingDataUpdate->no_of_column_perpage;
      die;*/
   }

if(isset($_POST['update_setting_data'])){

if(wp_verify_nonce($_POST['_nonce'],'update-settings')){

 $posts_per_page_update = sanitize_text_field($_POST['slider_img_per_page']);
  // echo $posts_per_page_update; 
   $border_color = sanitize_hex_color($_POST['border_color']);
   //echo $border_color;
   $timer_duration = sanitize_text_field($_POST['Slider_Timer']);
   //echo $timer_duration;
   $border_width = sanitize_text_field($_POST['border_width']);
   //echo $border_width;


   $update_UI_settings = $wpdb->update('slider_settings',
    array('id'=>$settingDataUpdate->id,
      'slider_img_per_page'=>$posts_per_page_update,
      'border_color'=>$border_color,
      'Slider_Timer'=>$timer_duration,
      'border_width'=>$border_width,

    ),
    array('id'=>$settingDataUpdate->id));
   if(is_wp_error($update_UI_settings)){
    echo "error occure";
   }
   else{   echo "Setting Updated Successfully";
         //echo"<script>location.reload();</script>";
   }

}
else{
  die('no direct access');
}

  

}


?>