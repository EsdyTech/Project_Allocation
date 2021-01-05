<?php
include('./lib/dbcon.php'); 
dbcon(); 
if (isset($_POST['delete_department'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM department where dep_id='$id[$i]'");
}
header("location: department.php");
}
?>