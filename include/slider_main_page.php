<?php
/**
   * Plugin Name: Slider 
   * Plugin URI:
   * Description:A plugin for showing advertisement.
   * Version:1.0
   * Author:Vaibhav Gangrade
   * Author URI:
   */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); //calling main plugin file


function sliderShortcode(){
	?>
	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">

  

   .Slider_container{
   margin-right: <?php  echo  $margin_right_footer.'px'; ?>;
   margin-bottom: <?php echo $margin_bottom_footer.'px' ?>;
  /* float: right;*/
   margin-top: <?php echo $margin_top_footer.'px' ?>;
   margin-left: <?php echo $margin_left_footer.'px' ?>;
   overflow: hidden!important;
   z-index: 9999;
 max-height: 400px;
 width: 100%;

    border:5px solid red;

   }


   .carousel {
   position: relative
   }
   .carousel-inner {
   position: relative;
   width: 100%;
   overflow: hidden
   }
   .carousel-inner>.item {
   display: none;
   -webkit-transition: .6s ease-in-out left;
   -o-transition: .6s ease-in-out left;
   transition: .6s ease-in-out left
   }
   .carousel-inner>.item>a>img,
   .carousel-inner>.item>img {
   line-height: 1
   }
   @media all and (transform-3d),
   (-webkit-transform-3d) {
   .carousel-inner>.item {
   -webkit-transition: -webkit-transform .6s ease-in-out;
   -o-transition: -o-transform .6s ease-in-out;
   transition: -webkit-transform .6s ease-in-out;
   transition: transform .6s ease-in-out;
   transition: transform .6s ease-in-out, -webkit-transform .6s ease-in-out, -o-transform .6s ease-in-out;
   -webkit-backface-visibility: hidden;
   backface-visibility: hidden;
   -webkit-perspective: 1000px;
   perspective: 1000px
   }
   .carousel-inner>.item.active.right,
   .carousel-inner>.item.next {
   -webkit-transform: translate3d(100%, 0, 0);
   transform: translate3d(100%, 0, 0);
   left: 0
   }
   .carousel-inner>.item.active.left,
   .carousel-inner>.item.prev {
   -webkit-transform: translate3d(-100%, 0, 0);
   transform: translate3d(-100%, 0, 0);
   left: 0
   }
   .carousel-inner>.item.active,
   .carousel-inner>.item.next.left,
   .carousel-inner>.item.prev.right {
   -webkit-transform: translate3d(0, 0, 0);
   transform: translate3d(0, 0, 0);
   left: 0
   }
   }
   .carousel-inner>.active,
   .carousel-inner>.next,
   .carousel-inner>.prev {
   display: block
   }
   .carousel-inner>.active {
   left: 0
   }
   .carousel-inner>.next,
   .carousel-inner>.prev {
   position: absolute;
   top: 0;
   width: 100%
   }
   .carousel-inner>.next {
   left: 100%
   }
   .carousel-inner>.prev {
   left: -100%
   }
   .carousel-inner>.next.left,
   .carousel-inner>.prev.right {
   left: 0
   }
   .carousel-inner>.active.left {
   left: -100%
   }
   .carousel-inner>.active.right {
   left: 100%
   }
   .carousel-inner>.item {
  /* position: relative;*/
   display: none;
   -webkit-transition: .6s ease-in-out left;
   -o-transition: .6s ease-in-out left;
   transition: .6s ease-in-out left
   }
   .carousel-inner>.item>a>img,
   .carousel-inner>.item>img {
   	
   line-height: 1
   }
   @media all and (transform-3d),
   (-webkit-transform-3d) {
   .carousel-inner>.item {
   -webkit-transition: -webkit-transform .6s ease-in-out;
   -o-transition: -o-transform .6s ease-in-out;
   transition: -webkit-transform .6s ease-in-out;
   transition: transform .6s ease-in-out;
   transition: transform .6s ease-in-out, -webkit-transform .6s ease-in-out, -o-transform .6s ease-in-out;
   -webkit-backface-visibility: hidden;
   backface-visibility: hidden;
   -webkit-perspective: 1000px;
   perspective: 1000px
   }
   .carousel-inner>.item.active.right,
   .carousel-inner>.item.next {
   -webkit-transform: translate3d(100%, 0, 0);
   transform: translate3d(100%, 0, 0);
   left: 0
   }
   .carousel-inner>.item.active.left,
   .carousel-inner>.item.prev {
   -webkit-transform: translate3d(-100%, 0, 0);
   transform: translate3d(-100%, 0, 0);
   left: 0
   }
   .carousel-inner>.item.active,
   .carousel-inner>.item.next.left,
   .carousel-inner>.item.prev.right {
   -webkit-transform: translate3d(0, 0, 0);
   transform: translate3d(0, 0, 0);
   left: 0
   }
   }
   .carousel-inner>.active,
   .carousel-inner>.next,
   .carousel-inner>.prev {
   display: block
   }
</style>
<div class="col-md-3 Slider_container">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                 <div class="carousel-inner">
            <?php
            global $wpdb;
            $postperpage=5;

$args = array(
   'post_type' => 'simple-slider', //  custom post type name 
   'posts_per_page' => $postperpage, // no of post per page 
   'order_by' => 'date', // Some optional sorting
   'order' => 'ASC', 
   'post_status'=>'publish'
   );


               $data = get_posts($args);
               // print_r($data);
               // die;  
               $i=1;
               foreach ($data as $key => $value) {
               	// print_r($value);
                       if ($i == 1) {
                       	echo '<div class="item active">';
                       }else{
                       	echo '<div class="item">';
                       }
                   echo '<img src="'.get_the_post_thumbnail_url($value->ID).'">';
                   echo '</div>';
                 $i++;
               } ?>
         </div>
      </div>
   </div>


	<?php

}

 add_shortcode('Simple-Slider','sliderShortcode'); //First aparameter is slider name and second parameter is function  name
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
       'Sliderimg_post_column_and_no_setting' /*replace with your own function*/
   ); 
}
 add_action('init','custom_post_type_slider');

?>