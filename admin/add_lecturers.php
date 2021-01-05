
  <div class="row-fluid" style="margin-left:-60px">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Add Lecturers</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								 <!--------------------form------------------->
								<form method="post">
									
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
										
										<!-- <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="othername" id="focusedInput" type="text" placeholder = "Other Name" required>
                                          </div>
                                        </div> -->
										
										<div class="control-group">
                                          <div class="controls">
     <input class="input focused" name="username" id="focusedInput" type="text" placeholder = "UserName" required>
                                          </div>
                                        </div>
                                        <!-- <div class="control-group">
                                          <div class="controls">
       <input class="input focused" name="password" id="focusedInput" type="password" placeholder = "Password" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <div class="controls">
         <input class="input focused" name="conpassword" id="focusedInput" type="password" placeholder = "Confirm Password" required>
                                          </div>
                                        </div> -->
										
										<div class="control-group">
                                          <div class="controls">
                                           <select name="sex" required>										
													<option>Male</option>
													<option>Female</option>
												</select>	
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                             <input class="input focused" name="phone" id="focusedInput" type="text" placeholder = "Phone" required>
                                          </div>
                                        </div>
                                        <!-- <div class="control-group">
                                          <div class="controls">
                    <input class="input focused" name="address" id="focusedInput" type="text" placeholder = "Address" required>
                                          </div>
                                        </div> -->
                                        <div class="control-group">
                                          <div class="controls">
                                           <select name="staffType" required>										
													<option>Full Time</option>
													<option>Part Time</option>
												</select>	
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <div class="controls">
                                           <select name="status" required>										
													<option>Activated</option>
													<option>Deactivated</option>
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
					
					function Random($length = 10) {
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

if ($_POST['password']!= $_POST['conpassword']){

echo '<script type="application/javascript">alert("Password Mismatch!");</script>';

}
else{


$surname = $_POST['surname'];
$firstname = $_POST['firstname'];
$sex = $_POST['sex'];
$username= $_POST['username'];
$password = 'password';
$phone= $_POST['phone'];
$status = $_POST['status'];
$staffType = $_POST['staffType'];

$query = mysqli_query($con,"select * from lecturer where username = '$username'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Lecturer Exists!');
</script>
<?php
}else{

mysqli_query($con,"insert into lecturer (surname,firstname,sex,username,pic,phone,password,staffType,status) 
values('$surname','$firstname','$sex','$username','uploads/lecturer.jpg','$phone','$password','$staffType','$status')")or die(mysqli_error());

?>
<script>
alert('Lecturer Added Sucessfully!');
window.location = "reg_lecturer.php";
</script>
<?php
}
}
}
?>