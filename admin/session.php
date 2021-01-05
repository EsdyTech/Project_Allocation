<?php
//Start session
error_reporting(0);
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (isset($_SESSION['adminid'])){
$adminid=$_SESSION['adminid'];
}
elseif (isset($_SESSION['username'])){
$lectid=$_SESSION['username'];
}
elseif (isset($_SESSION['matricno'])){
$matricno=$_SESSION['matricno'];
}
else {
		echo '<script>window.location= "../index.php";</script>';
}



?>