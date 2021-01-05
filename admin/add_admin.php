
  <div class="row-fluid" style="margin-left:-70px">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Add New Administrator</i></div>
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
										
										<div class="control-group">
                                          <div class="controls">
             <input class="input focused" name="username" id="focusedInput" type="text" placeholder = "Username" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                           <select name="role" required>										
													<option>Super Administrator</option>
													<option>Administrator</option>
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

//echo Random();
?>
                    
                    
                    
                    
					<?php
if (isset($_POST['save'])){
$surname = $_POST['surname'];
$firstname = $_POST['firstname'];
$username = $_POST['username'];
$role = $_POST['role'];

$status = $_POST['status'];
$password=Random();

$query = mysqli_query($con,"select * from adminlogin where username='$username'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Administrator with this username Exists!');
</script>
<?php
}else{

mysqli_query($con,"insert into adminlogin (surname,firstname,username,password,pic,role,status) 
values('$surname','$firstname','$username','$password','uploads/admin2.jpg','$role','$status')")or die(mysqli_error());

 echo '<script language="javascript">alert("New Administrator Successfully added!!!")</script>';
		echo'<script>window.location= "reg_admin.php";</script>';

?>
<?php
}
}
?>