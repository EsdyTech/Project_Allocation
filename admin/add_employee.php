
  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Add Employee</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								 <!--------------------form------------------->
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="employee_id_no" id="focusedInput" type="text" placeholder = "Employee ID Number" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="firstname" id="focusedInput" type="text" placeholder = "First Name" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="middlename" id="focusedInput" type="text" placeholder = "Middle Name" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="lastname" id="focusedInput" type="text" placeholder = "Last Name" required>
                                          </div>
                                        </div>
										
										<div class="control-group">	
											<div class="controls">
											<select name="type" required>										
													<option>Regular</option>
													<option>Contractual</option>
												</select>								
											</div>
										</div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="contact_no" id="focusedInput" type="text" placeholder = "Contact Number" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="position" id="focusedInput" type="text" placeholder = "Position" required>
                                          </div>
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
$client_id = $_POST['client_id'];
$employee_id_no = $_POST['employee_id_no'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$type = $_POST['type'];
$contact_no = $_POST['contact_no'];
$position = $_POST['position'];

$query = mysql_query("select * from client where employee_id_no = '$employee_id_no'")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Employee ID Already Exist');
</script>
<?php
}else{

mysql_query("insert into client (client_id,employee_id_no,firstname,middlename,lastname,type,contact_no,position) 
values('$client_id','$employee_id_no','$firstname','$middlename','$lastname','$type','$contact_no','$position')")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Add Employee $firstname,$middlename,$lastname')")or die(mysql_error());
?>
<script>
window.location = "employee.php";
$.jGrowl("New Employee Successfully added", { header: 'Employee added' });
</script>
<?php
}
}
?>