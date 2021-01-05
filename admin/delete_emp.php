
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
include('./lib/dbcon.php');

if (isset($_POST['delete_emp'])){
$matricnoo=$_POST['selector'];
$N = count($matricno);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE * FROM students where matricno='$matricnoo[$i]'");
	if(mysql_affected_rows()>0){
				 
	 	echo '<script type="application/javascript">alert("Student Deleted Successfully!");</script>';
		echo '<script>window.location= "reg_students.php";</script>';
	}			
}
}
?>