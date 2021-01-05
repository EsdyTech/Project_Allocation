<?php
include('./lib/dbcon.php');
dbcon();
if (isset($_POST['delete_technical_user'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM technical_user where tech_id='$id[$i]'");
}
header("location: technical_user.php");
}
?>