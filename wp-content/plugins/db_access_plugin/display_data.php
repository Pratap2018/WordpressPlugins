<?php 

    global $wpdb;
    $tablename= $wpdb->prefix."Mytable";
    $result=$wpdb->get_results("select * from $tablename");
    
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($result as $row){
      $id=$row->id;
      $username=$row->user_name;
      $email=$row->email;

  ?> 
    <tr>
      <th scope="row"><?php echo $id ?></th>
      <td><?php echo $username ?></td>
      <td><?php echo $email ?></td>
    </tr>
   <?php }  ?>
  </tbody>
</table>
</div>


