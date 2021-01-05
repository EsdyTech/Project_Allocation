<?php
include('./lib/dbcon.php');
if (isset($_POST['delete_course'])){

$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM course where id='$id[$i]'");
}
header("location: reg_course.php");
}
?>