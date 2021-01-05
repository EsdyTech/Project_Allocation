<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
<?php
if (isset($_GET['id'])){
$idd=$_GET['id'];

$query = mysql_query("select * from assignments")or die(mysql_error());
$row = mysql_fetch_array($query);
header('Content-Disposition:attachment;filename='.$row[assignment].'');


}


?>
</body>
</html>
