<?php
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="container">
    <form  method="post" >
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
  
  <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>





<?php
function insert_data(){
if(isset($_POST)){
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
    
}else{

}
}
?>