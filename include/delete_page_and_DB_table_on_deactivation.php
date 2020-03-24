<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
if(!function_exists('DIS_my_plugin_remove_database')){
	function DIS_my_plugin_remove_database() {
 global $wpdb;
     $drop_table_name ='slider_settings';
     $delete_table = "DROP TABLE IF EXISTS $drop_table_name";
    // echo  $delete_table; die;
     $wpdb->query($delete_table);
     delete_option("my_plugin_db_version");
}

}
 
 
?>

 