<div class="row-fluid" style="margin-left:-60px">				  
   <!-- <a href="reg_students.php" class="btn btn-info" id="add" data-placement="right" title="Click to Add student" ><i class="icon-plus-sign icon-large"></i> Add Students</a> -->
   <script type="text/javascript">
	$(document).ready(function(){
	$('#add').tooltip('show');
	$('#add').tooltip('hide');
	});
	</script> 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Students</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysqli_query($con,"select * from students where matricno = '$studentId'")or die(mysqli_error());
                                $row = mysqli_fetch_array($query);
                                
                               $device_name_query = mysqli_query($con,"select * from student_topics where studentId = '$studentId'")or die(mysqli_error());
                            $rows = mysqli_fetch_array($device_name_query);
                               $topicIdd = $rows['topicId'];


                                $devices = mysqli_query($con,"select * from topics where topicId = '$topicIdd'")or die(mysqli_error());
                                $rowse = mysqli_fetch_array($devices);
        
                          
								?>
								
								 <!-- --------------------form ---------------------->						
								<form method="post">
								STUDENTS FULLNAME:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" readonly value="<?php echo $row['surname'].' '.$row['firstname'].' '.$row['othername']; ?>" name="surname" id="focusedInput" type="text" placeholder = "Surname" required>
                                          </div>
                                        </div>
									
										MATRIC NUMBER:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" readonly value="<?php echo $row['matricno']; ?>" name="matricno" id="focusedInput" type="text" placeholder = "Matric Number" required>
                                            <!-- <input value="<?php echo $row['pic']; ?>" name="pic" id="focusedInput" type="hidden" > -->
                                          </div>
                                        </div>
                                        <!-- PASSWORD:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['password']; ?>" name="password" id="focusedInput" type="Password" placeholder = "Password" required>
                                          </div>
                                        </div> -->
										
                                        SEX:
										<div class="control-group">
											<div class="controls">
                                            <input class="input focused" readonly value="<?php echo $row['sex']; ?>" name="password" id="focusedInput" type="text" >
						
											</div>
										</div>
                                       LEVEL:
										<div class="control-group">
											<div class="controls">
                                            <input class="input focused" readonly value="<?php echo $row['level']; ?>" name="password" id="focusedInput" type="text" >
						
											</div>
										</div>
                                        TOPIC:
										<div class="control-group">
											<div class="controls">
                                        <textarea name="topic" id="focusedInput" readonly  class="input focused" required><?php echo $rowse['name']; ?></textarea>			
                                        <input class="input focused"  value="<?php echo $rows['topicId']; ?>" name="topicId" id="focusedInput" type="hidden" >
			
											</div>
										</div>

                                        LECTURERS/SUPERVISORS COMMENT:
										<div class="control-group">
											<div class="controls">
                                        <textarea name="comment" id="focusedInput"   class="input focused" required></textarea>						
											</div>
										</div>

										UPDATE STATUS:
										<div class="control-group">
                                          <div class="controls">
                                         <select name="status" required>
                                            <option value="">--Select Status--</option>
													<option value="Approved">Approved</option>
                                                    <option value="Pending Approval">Pending Approval</option>
                                                    <option value="Rejected">Rejected</option>

												</select>	
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success" id="update" data-placement="right" title="Click to Update"><i class="icon-save icon-large"> Update</i></button>
                                                <script type="text/javascript">
	                                            $(document).ready(function(){
	                                            $('#update').tooltip('show');
	                                            $('#update').tooltip('hide');
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
if (isset($_POST['update'])){

$matricno = $_POST['matricno'];
$topicId = $_POST['topicId'];
$comment = $_POST['comment'];
$status= $_POST['status'];
$dateApproved = date("Y-m-d");


if ($status == 'Approved'){
  $device_name_query = mysqli_query($con,"select * from project_writeups where studentId = '$studentId' and status = 'Approved' and chapterId ='$chapterId'")or die(mysqli_error());						
  $count = mysqli_num_rows($device_name_query);
  }
  
  if ($count > 0){
    echo '<script type="application/javascript">alert("A WriteUp for this Chapter has been approved for this Student!");</script>';
  
  }
  else {

mysqli_query($con,"update project_writeups set lecturersComment = '$comment',status = '$status',dateApproved = '$dateApproved' where studentId = '$matricno' and topicId ='$topicId' and projWriteupId ='$projWriteupId'")or die(mysqli_error());

if($status == 'Approved'){
  mysqli_query($con,"update project_chapters set status2 = 'Completed' where studentId = '$matricno' and topicId ='$topicId' and chapter ='$chapter'")or die(mysqli_error());
}
 if($status == 'Pending Approval'){
  mysqli_query($con,"update project_chapters set status2 = 'Ongoing' where studentId = '$matricno' and topicId ='$topicId' and chapter ='$chapter'")or die(mysqli_error());
}
 if($status == 'Rejected'){
  mysqli_query($con,"update project_chapters set status2 = 'Ongoing' where studentId = '$matricno' and topicId ='$topicId' and chapter ='$chapter'")or die(mysqli_error());
}
echo '<script type="application/javascript">alert("'.$status.'");</script>';
		// echo '<script>window.location= "reg_students.php";</script>';
}
}
?>