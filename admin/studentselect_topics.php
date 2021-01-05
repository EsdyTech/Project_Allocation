
  <div class="row-fluid" style="margin-left:-70px" >
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large">Select Topics</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								 <!--------------------form------------------->
								<form method="post" enctype="multipart/form-data">
										<div class="control-group">
                                          <!-- <div class="controls">
    <input class="input focused" name="matricno" id="focusedInput" type="text" placeholder = "Students Matric Number" required>
                                          </div> -->
                                        </div>
										
										<div class="control-group">
                                          <!-- <div class="controls">
                                            <input class="input focused" name="surname" id="focusedInput" type="text" placeholder = "Surname" required>
                                          </div> -->
                                        </div>
										
										<div class="control-group">
                                          <!-- <div class="controls">
                                            <input class="input focused" name="firstname" id="focusedInput" type="text" placeholder = "First Name" required>
                                          </div> -->
                                        </div>
<!-- 										
										<div class="control-group">
								          <label class="control-label" for="inputPassword">Browse Your Computer</label>
									        <input name="files" class="input-file uniform_on" id="fileInput" type="file" required>
                                        </div> -->
										
                                        <?php    
$sqll = mysqli_query($con,"select * from topics");
$numm = mysqli_num_rows($sqll);
   if ($numm > 0){
	    
	echo'SELECT_TOPIC: <div class="control-group">
	   		<div class="controls">
	   <select name="topicId" required ">';
	   echo '<option value="">--Select Topic--</option>';
	   while ($rowss=mysqli_fetch_array($sqll)){echo'<option value="'.$rowss['topicId'].'" class="inputtext">'.$rowss['name'].'</option>\n';}echo '</select>
	</div>
	</div>';}
				
	  ?> 
										
                                       	
										<div class="control-group">
								          <label class="control-label" for="inputPassword">Upload Project Topic Proposal</label>
									        <input name="files" class="input-file uniform_on" id="fileInput" type="file" required>
                                        </div>
										<div class="control-group">
                                          <!-- <div class="controls">
                                           <select name="status" required>										
													<option value="Activated">Activated</option>
													<option value="Deactivated">Deactivated</option>
												</select>	
                                          </div> -->
                                        </div>
										<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info" id="save" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large"> Save</i></button>
												<script type="text/javascript">
	                                            $(document).ready(function(){
	                                            $('#save').tooltip('show');
	                                            $('#save').tooltip('hide');
	                                            });
	                                            </script>
                                          </div>
                                        </div>
                                </form>
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>				 
                    
                            
                                        
					<?php
          
if (isset($_POST['save'])){


  $topicId = $_POST['topicId'];
$date = date("Y-m-d");

$target_dir="proposals/";

$target_file=$target_dir.basename($_FILES["files"]["name"]);

move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);
  $proposal="proposals/". basename($_FILES["files"]["name"]);


  // $file_name = $_FILES['files']['name'];
  // $file_size = $_FILES['files']['size'];

  //    $extension = getExtension($file_name);
  //    $extension = strtolower($extension);
  //    if (($extension == "jpg") || ($extension == "jpeg") || ($extension =="png") || ($extension == "gif") ) 
 	// {
  //         echo "<script>alert('This is an image !!');</script>";
  //       } 
  //        if ($file_size >= 1048576 * 5) {
  //   echo "<script>alert('file selected exceeds 5MB size limit!!');</script>";
  // 		}
  $result=mysqli_query($con,"SELECT count(*) as total from student_topics where studentId='$matricno'");
  $topics=mysqli_fetch_assoc($result);
  ///echo $data['total'];


$query = mysqli_query($con,"select * from student_topics where studentId = '$matricno' and topicId='$topicId'")or die(mysqli_error());
$count = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);


if ($count > 0){ ?>
<script>
alert('You have already selected this topic!');
</script>
<?php
}

else if ($topics['total'] == 3) {?>
<script>
alert('Maximum Topic Selected!');
</script>
<?php
}


else{


mysqli_query($con,"insert into student_topics (studentId,topicId,status,proposal,dateReg) 
values('$matricno','$topicId','Pending','$proposal','$date')")or die(mysqli_error());

		echo'<script>window.location= "student_topics.php";</script>';

?>
<?php
}
 
}
?>