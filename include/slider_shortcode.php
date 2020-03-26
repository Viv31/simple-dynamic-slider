<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
  
if(!function_exists('DIS_sliderShortcode')){
function DIS_sliderShortcode(){

    global $wpdb;
   $update_positions_and_posts ="SELECT * FROM Slider_settings";
   $Post_Setting_data = $wpdb->get_results($update_positions_and_posts);
    /*  print_r($Post_Setting_data);
   die;*/
   foreach ($Post_Setting_data as $settingData) {
    /*echo $settingData->posts_per_page;
    echo "<br>";
    echo $settingData->no_of_column_perpage;
    die;*/
   }
  /* print_r($settingData);
   die;*/
   $postperpage = $settingData->slider_img_per_page;
   $border_color = $settingData->border_color;
   $border_width = $settingData->border_width;
   

   $Slider_Timer = $settingData->Slider_Timer;
   //echo $border_color;

	?>
	<style type="text/css">
		* {box-sizing:border-box}

/* Slideshow container */
.slider-container {
  max-width: 100%;
  position: relative;
  margin: auto;
  border:<?php echo esc_html($border_width).'px'; ?> solid <?php echo esc_html($border_color);?>;
}

/* Hide the images by default */
.Slides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.textBlock {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.image_no {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.Slider_dot {
  cursor: pointer;
  height: 10px;
  width: 10px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .Slider_dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
	</style>
<div class="slider-container">
<!-- Full-width images with number and caption text -->
  <?php
           
            global $wpdb;
   $update_positions_and_posts ="SELECT * FROM Slider_settings";
   $Post_Setting_data = $wpdb->get_results($update_positions_and_posts);
    /*  print_r($Post_Setting_data);
   die;*/
   foreach ($Post_Setting_data as $settingData) {
    /*echo $settingData->posts_per_page;
    echo "<br>";
    echo $settingData->no_of_column_perpage;
    die;*/
   }
  /* print_r($settingData);
   die;*/
   $postperpage = $settingData->slider_img_per_page;
   $border_color = $settingData->border_color;
   

   $Slider_Timer = $settingData->Slider_Timer;
   //echo $border_color;

$args = array(
   'post_type' => 'dynamic-Image-Slider', //  custom post type name 
   'posts_per_page' => $postperpage, // no of post per page 
   'order_by' => 'date', // Some optional sorting
   'order' => 'ASC', 
   'post_status'=>'publish'
   );
?>
<?php
$caption_text="Developed by vaibhav";
               $data = get_posts($args);
               // print_r($data);
               // die;  
               $i=1;
               foreach ($data as $key => $value) {
               	// print_r($value);
                      
                   echo '<div class="Slides fade"><div class="image_no">'.$i.'</div><img src="'.get_the_post_thumbnail_url($value->ID).'">';
                   echo '</div><div class="textBlock">'.$caption_text.'</div>';
                 $i++;
               } 
               ?>
               	
               </div>


<?php 
//For making dots dynamic
 foreach ($data as $key => $value) {
  ?>
<div style="text-align:center;display: inline-block;">
  <span class="Slider_dot"></span> 
  </div>

  <?php
}


?>
<!-- The dots/circles -->

<script type="text/javascript">
	var slideIndex = 0;
	var timer ='<?php echo esc_html($Slider_Timer) ?>';
simple_Slider();

function simple_Slider() {
  var i;
  var slides = document.getElementsByClassName("Slides");
  var dots = document.getElementsByClassName("Slider_dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(simple_Slider, timer); // Change image every 2 seconds
}

</script>


	<?php

}
}
add_shortcode('Dynamic-Image-Slider','DIS_sliderShortcode'); //First aparameter is slider name and second parameter is function  name