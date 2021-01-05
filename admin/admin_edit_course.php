<?php error_reporting(0);?>
<div class="row-fluid" style="margin-left:-90px">				  
   <a href="reg_course.php" class="btn btn-info" id="add" data-placement="right" title="Click to Add Courses" ><i class="icon-plus-sign icon-large"></i> Add Courses</a>
   <script type="text/javascript">
	$(document).ready(function(){
	$('#add').tooltip('show');
	$('#add').tooltip('hide');
	});
	</script> 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Courses</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysql_query("select * from course where course_code = '$get_code'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>
								
								 <!-- --------------------form ---------------------->						
								<form method="post">
								
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['course_title']; ?>" name="title" id="focusedInput" type="text" placeholder = "Course Title" style="width:295px" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['course_code']; ?>" name="code" id="focusedInput" type="text" placeholder = placeholder = "Course Code" required>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['course_unit']; ?>" name="unit" id="focusedInput" type="text" placeholder = placeholder = "Course Unit" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
											<div class="controls">
											<select name="level" required>
													<option value="<?php echo $row['level']; ?>"><?php echo $row['level']; ?></option>
                                                    <option>ND1</option>
													<option>ND2</option>
                                                    <option>HND1</option>
                                                    <option>HND2</option>
												</select>								
											</div>
										</div>
									   
									   <div class="control-group">
                                          <div class="controls">
                                           <select name="semester" required>
                                           <option value="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
													<option>First</option>
													<option>Second</option>
												</select>	
                                           
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                           <select name="status" required>
                                           <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
													<option>Activated</option>
													<option>Deactivated</option>
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

$title = $_POST['title'];
$code= $_POST['code'];
$unit = $_POST['unit'];
$level = $_POST['level'];
$semester = $_POST['semester'];
$status = $_POST['status'];

mysql_query("update course set  course_title = '$title',course_code = '$code',course_unit = '$unit',level = '$level',semester = '$semester', status = '$status' where course_code = '$get_code'")or die(mysql_error());

?>
<script>
  window.location = "reg_course.php";
 $.jGrowl("Course Infomation Successfully Update", { header: 'Course info Updated' });  
</script>
<?php
}
?>