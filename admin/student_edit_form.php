<div class="row-fluid" style="margin-left:-90px">				  
   <a href="reg_students.php" class="btn btn-info" id="add" data-placement="right" title="Click to Add student" ><i class="icon-plus-sign icon-large"></i> Add Students</a>
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
								$query = mysqli_query($con,"select * from students where matricno = '$get_matricno'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>
								
								 <!-- --------------------form ---------------------->						
								<form method="post">
								SURNAME:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['surname']; ?>" name="surname" id="focusedInput" type="text" placeholder = "Surname" required>
                                          </div>
                                        </div>
										FIRSTNAME:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder = "FirstName" required>
                                          </div>
                                        </div>
										OTHERNAME:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['othername']; ?>" name="othername" id="focusedInput" type="text"  placeholder = "Othername" required>
                                          </div>
                                        </div>
										MATRIC NUMBER:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['matricno']; ?>" name="matricno" id="focusedInput" type="text" placeholder = "Matric Number" required>
                                            <input value="<?php echo $row['pic']; ?>" name="pic" id="focusedInput" type="hidden" >
                                          </div>
                                        </div>
                                        <!-- PASSWORD:
										<div class="control-group">
                                          <div class="controls"> -->
                                            <input class="input focused" value="<?php echo $row['password']; ?>" name="password" id="focusedInput" type="hidden" placeholder = "Password" required>
                                          <!-- </div>
                                        </div> -->
										
                                        SEX:
										<div class="control-group">
											<div class="controls">
											<select name="sex" required>
                                            <option value="<?php echo $row['sex'];?>"><?php echo $row['sex'];?></option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>								
											</div>
										</div>
                                       LEVEL:
										<div class="control-group">
											<div class="controls">
											<select name="level" required>
                                            <option value="<?php echo $row['level'];?>"><?php echo $row['level'];?></option>
													<option value="ND1">ND1</option>
													<option value="ND2">ND2</option>
                                                    <option value="HND1">HND1</option>
                                                    <option value="HND2">HND2</option>
												</select>								
											</div>
										</div>
                                        
										STATUS:
										<div class="control-group">
                                          <div class="controls">
                                         <select name="status" required>
                                            <option value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
													<option value="Activated">Activated</option>
													<option value="Deactivated">Deactivated</option>
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
$surname = $_POST['surname'];
$firstname = $_POST['firstname'];
$othername = $_POST['othername'];
$matricno= $_POST['matricno'];
$password = $_POST['password'];
$sex = $_POST['sex'];
$pic=$_POST['pic'];
$level = $_POST['level'];
$status = $_POST['status'];

mysqli_query($con,"update students set surname = '$surname',firstname = '$firstname',othername = '$othername', matricno = '$matricno',password = '$password', sex = '$sex', pic='$pic',level='$level',status='$status' where matricno = '$get_matricno' ")or die(mysqli_error());

echo '<script type="application/javascript">alert("Student Information Updated Successfully!");</script>';
		echo '<script>window.location= "reg_students.php";</script>';
}
?>