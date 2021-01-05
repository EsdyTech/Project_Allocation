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

                                        CHAPTER										
                                        <div class="control-group">
                                          <div class="controls">
                                         <select name="chapter" required>
                                            <option value="">--Select Chapter--</option>
													<option value="Chapter One">Chapter One</option>
													<option value="Chapter Two">Chapter Two</option>
                                                    <option value="Chapter Three">Chapter Three</option>
                                                    <option value="Chapter Four">Chapter Four</option>
                                                    <option value="Chapter Five">Chapter Five</option>
                                                    <option value="Chapter Six">Chapter Six</option>
												</select>	
                                          </div>
                                        </div>
                                       START DATE:
										<div class="control-group">
											<div class="controls">
                      <input class="input focused"   name="startDate" id="focusedInput" type="date" >
						
											</div>
										</div>
                    END DATE:
										<div class="control-group">
											<div class="controls">
                      <input class="input focused" name="endDate" id="focusedInput" type="date" >
					
											</div>
										</div>

										 STATUS:
										<div class="control-group">
                                          <div class="controls">
                                         <select name="status" required>
                                            <option value="">--Select Status--</option>
													<option value="Activated">Activated</option>
												</select>	
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-success" id="update" data-placement="right" title="Click to Update"><i class="icon-save icon-large">Update</i></button>
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
if (isset($_POST['save'])){



$matricno = $_POST['matricno'];
$topicId= $_POST['topicId'];

$chapter = $_POST['chapter'];
$status = $_POST['status'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$dateActivated = date("Y-m-d");

$query = mysqli_query($con,"select * from project_chapters where studentId = '$matricno' and chapter = '$chapter' and status='$status '")or die(mysqli_error());
$count = mysqli_num_rows($query);
$rows = mysqli_fetch_array($query);

if ($count > 0){ ?>
<script>
alert('This Chapter has been Activated for this student!');
</script>
<?php
}
else {
mysqli_query($con,"insert into project_chapters (studentId,topicId,lecturerId,chapter,status,status2,startDate,endDate,dateActivated) 
values('$matricno','$topicId','$lectid','$chapter','$status','Ongoing','$startDate','$endDate','$dateActivated')")or die(mysqli_error());

?>
<script>
$.jGrowl("New Chapter Added Successfully For this Student", { header: 'Topic added' });
</script>
<?php
}
}
?>
