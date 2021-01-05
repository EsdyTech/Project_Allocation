<?php
error_reporting(0);
include('./lib/dbcon.php'); 
include('session.php');

/*$oras = strtotime("now");
$ora = date("Y-m-d",$oras);										
mysql_query("update user_log set
logout_Date = '$ora'												
where user_id = '$session_id' ")or die(mysql_error());*/

session_destroy();
echo '<script>window.location = "../index.php";</script>';

?>