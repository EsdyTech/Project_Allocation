<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php

if (isset($_GET['assignId']) && isset($_GET['matricno'])){

$assignId=$_GET['assignId'];
$matricno = $_GET['matricno'];

	$result = mysqli_query($con,"DELETE FROM assign_students where assignId='$assignId'");
	if($result == True){
				 
        $querys = mysqli_query($con,"UPDATE students SET isAssigned = '0' WHERE matricno='$matricno'")or die(mysqli_error());          
			if($querys == True){

				echo '<script type="application/javascript">alert("Deleted Successfully!");</script>';
				echo '<script>window.location= "assign_students.php";</script>';
			}
    }	
}
else {

    echo '<script>window.location= "assign_students.php";</script>';
}	

?>