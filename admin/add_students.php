
  <div class="row-fluid" style="margin-left:-70px" >
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Add Students</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								 <!--------------------form------------------->
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
    <input class="input focused" name="matricno" id="focusedInput" type="text" placeholder = "Students Matric Number" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="surname" id="focusedInput" type="text" placeholder = "Surname" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="firstname" id="focusedInput" type="text" placeholder = "First Name" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="othername" id="focusedInput" type="text" placeholder = "Other Name" required>
                                          </div>
                                        </div>
										
										<div class="control-group">	
											<div class="controls">
											<select name="level" required>	
													<option value="ND2">ND2</option>
													<option value="HND2">HND2</option>
												</select>								
											</div>
										</div>
										
										<div class="control-group">
                                          <div class="controls">
                                           <select name="sex" required>										
													<option value="Male">Male</option>
													<option  value="Female">Female</option>
												</select>	
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                           <select name="status" required>										
													<option value="Activated">Activated</option>
													<option value="Deactivated">Deactivated</option>
												</select>	
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
					
					function Random($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

					?>
                    
                    
                    
                    
					<?php
if (isset($_POST['save'])){
$matricno = trim($_POST['matricno']);
$surname = $_POST['surname'];
$firstname = $_POST['firstname'];
$othername = $_POST['othername'];
$sex = $_POST['sex'];
$level = $_POST['level'];
$status = $_POST['status'];
$password='password';

$query = mysqli_query($con,"select * from students where matricno = '$matricno'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Students Exists!');
</script>
<?php
}else{

mysqli_query($con,"insert into students (surname,firstname,othername,matricno,password,sex,pic,level,isAssigned,status) 
values('$surname','$firstname','$othername','$matricno','$password','$sex','uploads/student.jpg','$level','0','$status')")or die(mysqli_error());

 echo '<script language="javascript">alert("New Student Successfully added!!!")</script>';
		echo'<script>window.location= "reg_students.php";</script>';

?>
<?php
}
}
?>