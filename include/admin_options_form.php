<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action('admin_menu','DIS_slider_update_settings');

 function DIS_slider_update_settings(){
  //Callback function
  //Do not delete this function this is callback function for this admin options section
}

if(!function_exists('DIS_slider_update_settings')){
  

function DIS_Update_slider_settings(){
  include_once('update_settings.php');
  ?>
<style type="text/css">
  .update_form_container{
    background-color: wheat;

  }
  form{
    text-align: center;
    padding: 5px;
  }

  .myinput{
    margin-top: 5px;
    width: 200px;
   text-align: center;
    height: 50px;
  }
 
 
.mybtn{
  background-color: teal;
  height: 50px;
  width: 90px;
  color: white;
  border-radius: 5px;

}

.mybtn:hover{
  background-color: black;
  height: 50px;
  width: 90px;
  color: white;
  border-radius: 5px;
}

</style>

<div class="update_form_container">
<h3 style="text-align: center;">Chnage Slider Settings</h3>
<form action="" method="POST">
  <label>No of Slides to Show:</label>
  <input type="number" name="slider_img_per_page" placeholder="Enter no of post" class="myinput" value="<?php echo $settingDataUpdate->slider_img_per_page; ?>" required><br>
   <label>Timer(in milliseconds):</label>
  <input type="text" name="Slider_Timer" placeholder="Enter time for slider repeation" class="myinput" value="<?php echo $settingDataUpdate->Slider_Timer; ?>" required><br>
  <label>Border Color:</label>
  <input type="color" name="border_color" class="myinput" value="<?php echo $settingDataUpdate->border_color; ?>" >
  <br>
  <label>Border Width(in pixels):</label>
  <input type="number" name="border_width" class="myinput" value="<?php echo $settingDataUpdate->border_width; ?>" required>
<br><br>
  <input type="submit" class="mybtn" name="update_setting_data"  value="Save setting">
</form>
</div>

  <?php
}
}

?>