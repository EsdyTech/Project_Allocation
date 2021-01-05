 <?php
 include('./lib/dbcon.php'); 
 dbcon(); 
 include('session.php');
 $new_password  = $_POST['new_password'];
 mysql_query("update user set password = '$new_password' where user_id = '$session_id'")or die(mysql_error());
 ?>