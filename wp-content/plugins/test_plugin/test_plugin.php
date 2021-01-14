<?php
/**
 * 
 * @version 0.0.0
 */
/*
Plugin Name: test plugin
Plugin URI: www.google.com
Description: This is not just a plugin just test
Author: Pratap
Version: 0.0.0
Author URI: www.google.com
*/

//echo(" -------------------------------------------------------------" . ABSPATH);

if(! defined('ABSPATH')){
    die;
}




class TestPlugin {
    //methods

    function __construct(){
      // add_action( 'init' ,array($this,'custom_post_type') );
      add_action('admin_menu',array($this,'fmenu'));
    }
function fmenu(){
    add_menu_page( 'PageTitle','MenuTitle','manage_options','test_menu',array($this,'fdisplay') );

}
    function fdisplay(){
        echo "Plugin Menu";
    }

    function activate(){
        $this->custom_post_type();
        
        flush_rewrite_rules( );
    }

    function deactivate(){
        
        flush_rewrite_rules( );
    }

    
    

    function custom_post_type(){
        register_post_type( 'Book',['public' =>true,'label'=>'Books'] );


       
    }


    function enqueue(){
        
    }

}

if( class_exists('TestPlugin')){

    $testplugin=new TestPlugin();

}

//activation 
register_activation_hook(__FILE__, array($testplugin,'activate') );
 //deactivation
register_deactivation_hook( __FILE__, array($testplugin,'deactivate') );
//uninstall