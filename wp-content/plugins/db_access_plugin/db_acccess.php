<?php

/**
 * 
 * @version 0.0.0
 */
/*
Plugin Name: DB_maupulate
Plugin URI: www.google.com
Description: Access Database
Author: Pratap
Version: 0.0.0
Author URI: www.google.com
*/

//echo(" -------------------------------------------------------------" . ABSPATH);

if(! defined('ABSPATH')){
    die;
}
/* 
function example_form(){
    return '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   
   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
   <!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <div class="container">
       <form  method="post">
       <div class="form-group">
       <label for="exampleInputEmail1">Username </label>
       <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username">
       <small id="emailHelp" class="form-text text-muted"></small>
     </div>
       <div class="form-group">
       <label for="exampleInputEmail1">Email address</label>
       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
       <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
     </div>
     <div class="form-group">
       <label for="exampleInputPassword1">Password</label>
       <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
     </div>
     
     <button type="submit" class="btn btn-primary" name="submit_form">Submit</button>
       </form>
   </div>';}
   
   add_shortcode( "form", "example_form" );

   function insert_data(){
    if(isset($_POST['submit_form'])){
        if(!empty($_POST['username']) &&!empty($_POST['password'])&&!empty($_POST['email']) ){
        global $wpdb;
        $username=sanitize_text_field( $_POST['username'] ); 
        $passwd= sanitize_text_field( $_POST['password'] );
        $email=sanitize_email( $_POST['email'] ) ;
        $tablename=$wpdb->prefix."Mytable";
        //$db_query="INSERT INTO $tablename( `user_name`, `password`, `email`) VALUES ($username,$passwd,$email)";
        require_once(ABSPATH."wp-admin/includes/upgrade.php");
        $wpdb->insert($tablename,array(
            'user_name'=>$username,
            'password'=>$passwd,
            'email'=>$email ),
            array(
                '%s',
                '%s',
                '%s'
            ));
           header('HTTP/1.1 301 Moved Permanently');
       
        }else{
            
        }
        
    }else{
    }
    }

add_action( 'wp_head', 'insert_data' );
 */
function example_form(){
   echo '  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <div class="container">
        <form  method="post" action="http://localhost/wordpress/2021/01/12/form/" >
        <div class="form-group">
        <label for="exampleInputEmail1">Username </label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username">
        <small id="emailHelp" class="form-text text-muted"></small>
      </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
      </div>
      
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>';
    

    if(isset($_POST['submit'])){
        if(!empty($_POST['username']) &&!empty($_POST['password'])&&!empty($_POST['email']) ){
            global $wpdb;
            $username=$_POST['username'];
            $passwd=$_POST['password'];
            $email=$_POST['email'];
            $tablename=$wpdb->prefix."Mytable";
            //$db_query="INSERT INTO $tablename( `user_name`, `password`, `email`) VALUES ($username,$passwd,$email)";
            require_once(ABSPATH."wp-admin/includes/upgrade.php");
            $wpdb->insert($tablename,array(
                'user_name'=>$username,
                'password'=>$passwd,
                'email'=>$email ),
                array(
                    '%s',
                    '%s',
                    '%s'
                ));
        
            }else{
                
            }
        echo "<meta http-equiv='refresh' content='0'>";
    }
  
    //echo "<meta http-equiv='refresh' content='0'>";
 
   
    
}
add_shortcode( "form", "example_form" );

function example_display(){
    
    include('display_data.php');
    
    
}
add_shortcode( "form_dis", "example_display" );




class DB_access {
    //methods

    function __construct(){
        add_action('admin_menu',array($this,'fmenu'));


    }

    function fmenu(){
        add_menu_page( 'DbAccess','Data Insert','manage_options','db_form',array($this,'fdisplay') );
        add_menu_page( 'Data_access','Data Display','manage_options','db_display',array($this,'data') );
    }
    function fdisplay(){
        include('insert_form.php');
        insert_data();
        unset($_POST);
        
   }
   function data(){
    include_once('display_data.php');
   }

    function activate(){
       
        
        flush_rewrite_rules( );
    }
    function deactivate(){
       $this->Delete_Table();
        flush_rewrite_rules( );
    }

    

    function Create_Table(){
        global $wpdb;
        $tablename=$wpdb->prefix."Mytable";
        $db_query="CREATE TABLE IF NOT EXISTS $tablename(id int(10)  not null AUTO_INCREMENT, user_name varchar(100), password varchar(100),email varchar(100), PRIMARY KEY (id))";
        require_once(ABSPATH."wp-admin/includes/upgrade.php");
        dbDelta($db_query);

    }
    function Delete_Table(){
        global $wpdb;
        $tablename=$wpdb->prefix."Mytable";
        $db_query="Drop Table $tablename";
       // require_once(ABSPATH."wp-admin/includes/upgrade.php");

        $wpdb->query($db_query);
    }
    
}


//include_once('db_acccess.php');

if( class_exists('DB_access')){

    $db=new DB_access();
   $db->Create_Table();
   
}


//activation 
register_activation_hook(__FILE__, array($db,'activate') );
 //deactivation
register_deactivation_hook( __FILE__, array($db,'deactivate') );