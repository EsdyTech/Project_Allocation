
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
                                  $device_name_query = mysqli_query($con,"select * from project_chapters where studentId = '$matricno' and chapter = '$chapterId'")or die(mysqli_error());					
                                  	$row = mysqli_fetch_array($device_name_query);
                                    $studentIdd = $row['studentId'];  $topicIdd = $row['topicId'];
                                    
                                    $devices = mysqli_query($con,"select * from topics where topicId = '$topicIdd'")or die(mysqli_error());
                                    $rowse = mysqli_fetch_array($devices);
            
                                    $device = mysqli_query($con,"select * from students where matricno = '$studentIdd'")or die(mysqli_error());
                                    $rows = mysqli_fetch_array($device);
        
                          
								              ?>
								
								 <!-- --------------------form ---------------------->						
								<form method="post"  enctype="multipart/form-data">
								STUDENTS FULLNAME:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" readonly value="<?php echo $rows['surname'].' '.$rows['firstname'].' '.$rows['othername']; ?>" name="surname" id="focusedInput" type="text" placeholder = "Surname" required>
                                          </div>
                                        </div>
									
										MATRIC NUMBER:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" readonly value="<?php echo $rows['matricno']; ?>" name="matricno" id="focusedInput" type="text" placeholder = "Matric Number" required>
                                            <!-- <input value="<?php echo $row['pic']; ?>" name="pic" id="focusedInput" type="hidden" > -->
                                          </div>
                                        </div>
                                       

                                        TOPIC:
										<div class="control-group">
											<div class="controls">
                                        <textarea name="topic" id="focusedInput" readonly  class="input focused" required><?php echo $rowse['name']; ?></textarea>			
                                        <input class="input focused"  value="<?php echo $rowse['topicId']; ?>" name="topicId" id="focusedInput" type="hidden" >
			
											</div>
										</div>

                                        SUPERVISOR/LECTURER:
										<div class="control-group">
											<div class="controls">
                                        <input class="input focused" readonly  value="<?php echo $row['lecturerId']; ?>" name="lecturerId" id="focusedInput" type="text" >
			
											</div>
										</div>

                                        CHAPTER
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" readonly value="<?php echo $row['chapter']; ?>" name="chapterName" id="focusedInput" type="text" required>
                                            <input class="input focused"  value="<?php echo $row['projChapId']; ?>" name="chapterId"  type="hidden" >

                                          </div>
                                        </div> 

                                        DESCRIPTION:
										<div class="control-group">
											<div class="controls">
                                        <textarea name="description" id="focusedInput"   class="input focused" required></textarea>						
											</div>
										</div>
                                        START_DATE:  <?php echo $row['startDate']; ?>     END_DATE:<?php echo $row['endDate']; ?>
										<div class="control-group">
											<!-- <div class="controls">
                                        <input class="input focused"  value="<?php echo $rows['topicId'].'  '.$rows['topicId']; ?>" name="topicId" id="focusedInput" type="text" >
											</div> -->
										</div>

									
                                        UPLOAD FILE:
                                        <div class="control-group">
								          <label class="control-label" for="inputPassword">Upload Writeup for <?php echo $row['chapter']; ?></label>
                          <label class="control-label" for="inputPassword"><font color='red'>NOTE: Always use a different name of file when Uploading!</font></label>
								           <div class="controls">
									        <input name="files" class="input-file uniform_on" id="fileInput" type="file" required>
								           </div>
								         </div>
										
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-success" id="update" data-placement="right" title="Click to Upload"><i class="icon-save icon-large"> Upload</i></button>
                                                <!-- <script type="text/javascript">
	                                            $(document).ready(function(){
	                                            $('#update').tooltip('show');
	                                            $('#update').tooltip('hide');
	                                            });
	                                            </script> -->
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
  $studentId = $_POST['matricno'];
  $lecturerId = $_POST['lecturerId'];
  $chapterId = $_POST['chapterId'];
  $description = $_POST['description'];
  $dateSubmitted = date("Y-m-d");

  
  
  
  
  
  //   // $file_name = $_FILES['files']['name'];
  //   // $file_size = $_FILES['files']['size'];
  
  //   //    $extension = getExtension($file_name);
  //   //    $extension = strtolower($extension);
  //   //    if (($extension == "jpg") || ($extension == "jpeg") || ($extension =="png") || ($extension == "gif") ) 
  //      // {
  //   //         echo "<script>alert('This is an image !!');</script>";
  //   //       } 
  //   //        if ($file_size >= 1048576 * 5) {
  //   //   echo "<script>alert('file selected exceeds 5MB size limit!!');</script>";
  //   // 		}
  //   // $result=mysqli_query("SELECT count(*) as total from student_topics");
  //   // $topics=mysqli_fetch_assoc($result);
  //   ///echo $data['total'];
  
  
    $target_dir="writeups/";
    $target_file=$target_dir.basename($_FILES["files"]["name"]);
  
    move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);
    $writeup="writeups/". basename($_FILES["files"]["name"]);


  // // $sql = mysqli_query($con,"insert into project_writeups(studentId,lecturerId,topicId,chapterId,writeup,descr,status,lecturersComment,dateSubmitted,dateApproved) 
  // // values('$studentId','$lecturerId','$topicId','$chapterId','$writeup','$description','Pending Approval','','$dateSubmitted','')")or die(mysqli_error());


$sql = mysqli_query($con,"insert into project_writeups(studentId,lecturerId,topicId,chapterId,writeup,descr,status,lecturersComment,dateSubmitted,dateApproved) 
values('$studentId','$lecturerId','$topicId','$chapterId','$writeup','$description','Pending Approval','','$dateSubmitted','')")or die(mysqli_error());

  if($sql == True){

  echo '<script type="application/javascript">alert("Writeup Uploaded Sucessfully!");</script>';

  }

  else{

      echo '<script type="application/javascript">alert("An Error Occurred!");</script>';

  }
}
  ?>
  