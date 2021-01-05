<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<body>

<?php include('header.php'); ?>
<?php include('session.php'); ?>



<?php
error_reporting(0);

$q = intval($_GET['q']);
$qq = $_GET['qq'];

$sql="SELECT * FROM lecturer WHERE lec_id = '".$q."'";
$result = mysql_query($sql);
while($roww = mysql_fetch_array($result)) {
	 echo "
	 LECTURER SURNAME:
<div class='control-group'>
<div class='controls'>
<input type='text' name='surname' value='".$roww['surname']."'/>                                          
 </div>
</div>

LECTURER FIRSTNAME:
<div class='control-group'>
<div class='controls'>
<input type='text' name='firstname' value='".$roww['firstname']."'/>                                          
 </div>
</div>

";  
}




$sql="SELECT * FROM course WHERE course_code = '".$qq."'";
$result = mysql_query($sql);
while($rww = mysql_fetch_array($result)) {
	 echo "
	 COURSE TITLE:
<div class='control-group'>
<div class='controls'>
<input type='text' readonly name='course_title' value='".$rww['course_title']."'/>                                          
 </div>
</div>
<input type='hidden' name='courseid' value='".$rww['id']."'/>           
COURSE CODE:
<div class='control-group'>
<div class='controls'>
<input type='text' readonly name='course_code' value='".$rww['course_code']."'/>                                          
 </div>
</div>

COURSE UNIT:
<div class='control-group'>
<div class='controls'>
<input type='text' readonly name='course_unit' value='".$rww['course_unit']."'/>                                          
 </div>
</div>

LEVEL:
<div class='control-group'>
<div class='controls'>
<input type='text' readonly name='level' value='".$rww['level']."'/>                                          
 </div>
</div>

SEMESTER:
<div class='control-group'>
<div class='controls'>
<input type='text' readonly name='semester' value='".$rww['semester']."'/>                                          
 </div>
</div>
";  
}




?>

</body>
</html>