 <?php
 include('./lib/dbcon.php'); 
 include('session.php');
 
 
                            if (isset($_POST['change'])) {
                               

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
                                $adminthumbnails = "uploads/" . $_FILES["image"]["name"];
								if (isset($adminid)){
mysql_query("update adminlogin set pic = '$adminthumbnails' where id  = '$adminid'")or die(mysql_error());
				 
	 	echo '<script type="application/javascript">alert("Uploaded Sucessfully!");</script>';
		echo '<script>window.location= "dashboard.php";</script>';
		
							}
							else if (isset($matricno)){
							mysql_query("update students set pic = '$adminthumbnails' where matricno  = '$matricno'")or die(mysql_error());
				 
	 	echo '<script type="application/javascript">alert("Uploaded Sucessfully!");</script>';
		echo '<script>window.location= "student_dashboard.php";</script>';
							
							
							}
							else if (isset($lectid)){
							
							mysql_query("update lecturer set pic = '$adminthumbnails' where username  = '$lectid'")or die(mysql_error());
				 
	 	echo '<script type="application/javascript">alert("Uploaded Sucessfully!");</script>';
		echo '<script>window.location= "lecturer_dashboard.php";</script>';
							
							}	
							}	
								 ?>