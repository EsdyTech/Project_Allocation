<div class="row-fluid" style="margin-left:-90px">				  
   <a href="reg_lecturer.php" class="btn btn-info" id="add" data-placement="right" title="Click to Add lecturer" ><i class="icon-plus-sign icon-large"></i> Add Lecturer</a>
   <script type="text/javascript">
	$(document).ready(function(){
	$('#add').tooltip('show');
	$('#add').tooltip('hide');
	});
	</script> 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Lecturer</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysqli_query($con,"select * from lecturer where username = '$get_id'")or die(mysqli_error());
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
                                            <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder = placeholder = "First Name" required> 
                                          </div>
                                        </div>
										<!-- OTHERNAME:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['othername']; ?>" name="othername" id="focusedInput" type="text"  placeholder = "Othername" required>
                                          </div>
                                        </div> -->
										USERNAME:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['username']; ?>" name="username" id="focusedInput" type="text" placeholder = "Username" required>
                                          </div>
                                        </div>
                                        <!-- PASSWORD:
										<div class="control-group">
                                          <div class="controls"> -->
                                            <input class="input focused" value="<?php echo $row['password']; ?>" name="password" id="focusedInput" type="hidden" placeholder = "Password" required>
                                          <!-- </div>
                                        </div> -->
										PHONE NUMBER:
                                        <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['phone']; ?>" name="phone" id="focusedInput" type="text" placeholder = "Phone Number" required>
                                          </div>
                                        </div>
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
                                        STAFF MODE:
										<div class="control-group">
											<div class="controls">
											<select name="staffType" required>
                                            <option value="<?php echo $row['staffType'];?>"><?php echo $row['staffType'];?></option>
													<option value="Full Time">Full Time</option>
													<option value="Part Time">Part Time</option>
												</select>								
											</div>
										</div>
                                        
									   <!-- ADDRESS:
									   <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['address']; ?>" name="address" id="focusedInput" type="text" placeholder = "Address" required>
                                          </div>
                                        </div> -->
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
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$sex = $_POST['sex'];
$pic='uploads/lecturer.jpg';
$status = $_POST['status'];
$staffType = $_POST['staffType'];

mysqli_query($con,"update lecturer set surname = '$surname',firstname = '$firstname', sex = '$sex', username = '$username', pic='$pic',phone = '$phone', password = '$password', staffType='$staffType',status='$status' where username = '$get_id' ")or die(mysqli_error());

echo '<script type="application/javascript">alert("Lecturer Information Updated Successfully!");</script>';
		echo '<script>window.location= "reg_lecturer.php";</script>';
}
?>