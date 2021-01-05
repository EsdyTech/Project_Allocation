<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<body>

<?php include('header.php'); ?>
<?php include('session.php'); ?>



<?php
error_reporting(0);

// $q = intval($_GET['q']);
$qq = $_GET['qq'];

$q = $_GET['q'];

$result = mysqli_query($con,"select * from students WHERE matricno = '".$q."'");

while($roww = mysqli_fetch_array($result)) {
	 echo "
	 STUDENT FULL NAME:
<div class='control-group'>
<div class='controls'>
<input type='text' name='fullname' readonly value='".$roww['surname']." ".$roww['firstname']." ".$roww['othername']."'/>                                          
 </div>
</div>

LEVEL:
<div class='control-group'>
<div class='controls'>
<input type='text' name='level' readonly value='".$roww['level']."'/>                                          
 </div>
</div>

";  
}



$result = mysqli_query($con,"select * from lecturer WHERE username = '".$qq."'");

while($rww = mysqli_fetch_array($result)) {
	 echo "
	LECTURER NAME:
<div class='control-group'>
<div class='controls'>
<input type='text' name='fullname'readonly value='".$rww['surname']." ".$rww['firstname']."'/>                                          
 </div>
</div>
<input type='hidden' name='lectid' value='".$rww['id']."'/>           
LECTURER MODE:
<div class='control-group'>
<div class='controls'>
<input type='text' readonly name='course_code' value='".$rww['staffType']."'/>                                          
 </div>
</div>
";  
}




?>

</body>
</html>