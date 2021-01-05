<div class="row-fluid">				  
   <a href="employee.php" class="btn btn-info" id="add" data-placement="right" title="Click to Add employee" ><i class="icon-plus-sign icon-large"></i> Add Employee</a>
   <script type="text/javascript">
	$(document).ready(function(){
	$('#add').tooltip('show');
	$('#add').tooltip('hide');
	});
	</script> 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Device Name</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysql_query("select * from client where client_id = '$get_id'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>
								
								 <!-- --------------------form ---------------------->						
								<form method="post">
								
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['employee_id_no']; ?>" name="employee_id_no" id="focusedInput" type="text" placeholder = "Employee ID Number" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder = placeholder = "First Name" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['middlename']; ?>" name="middlename" id="focusedInput" type="text"  placeholder = "Middle Name" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['lastname']; ?>" name="lastname" id="focusedInput" type="text" placeholder = "Last Name" required>
                                          </div>
                                        </div>
										
										
										<div class="control-group">
											<div class="controls">
											<select value="" <?php echo $row['type']; ?> name="type" required>
													<option>Regular</option>
													<option>Contractual</option>
												</select>								
											</div>
										</div>
									   
									   <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['contact_no']; ?>" name="contact_no" id="focusedInput" type="text" placeholder = "Contact Number" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['position']; ?>" name="position" id="focusedInput" type="text" placeholder = "Position" required>
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
$employee_id_no = $_POST['employee_id_no'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$type = $_POST['type'];
$contact_no = $_POST['contact_no'];
$position = $_POST['position'];

mysql_query("update client set 
                           employee_id_no = '$employee_id_no',
                           firstname = '$firstname',
						   middlename = '$middlename',
						   lastname = '$lastname',
						   type = '$type',
						   contact_no = '$contact_no',
						   position = '$position'
                           where client_id = '$get_id' ")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Edit Employee $firstname,$middlename,$lastname')")or die(mysql_error());	
?>
<script>
  window.location = "employee.php";
 $.jGrowl("Employee Infomation Successfully Update", { header: 'Employee info Updated' });  
</script>
<?php
}
?>