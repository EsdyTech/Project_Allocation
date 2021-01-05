<?php  include('header.php'); ?>
<?php include('session.php');?>
    <body>
		<?php include('lecturer_navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('lecturer_slidebar.php'); ?>
               <div class="span9" id="content">
                     <div class="row-fluid">
					  <div class="alert alert-success"><i class="icon-info-sign"></i> Please Fill in required details</div>
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><i class="icon-user"></i>&nbsp;Lecturer View/Edit Profile</div>							 
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								
								<?php
								$query = mysqli_query($con,"select * from lecturer where username = '$lectid'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>		
								 <div class="container-fluid">
                                    <div class="row-fluid">
									 <!----------------------form------------------->		
								    <form  method="post" id="change_password" action="lecturer_editprofile.php" class="form-horizontal">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Surname</label>
											<div class="controls">
		<input type="text" id="current_password" name="surname" value="<?php echo $row['surname'];?>"  placeholder="SURNAME" required/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Firstname</label>
											<div class="controls">
						<input type="text" id="new_password" name="firstname" value="<?php echo $row['firstname'];?>" placeholder="FIRSTNAME">
											</div>
										</div>
										<!-- <div class="control-group">
											<label class="control-label" for="inputPassword">Othername</label>
											<div class="controls">
<input type="text" id="retype_password" name="othername" value="<?php echo $row['othername'];?>" placeholder="OTHERNAME" required/>
											</div>
										</div> -->
                                        <div class="control-group">
											<label class="control-label" for="inputPassword">Username</label>
											<div class="controls">
<input type="text" id="retype_password" name="username" value="<?php echo $row['username'];?>"  placeholder="USERNAME" required/>
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="inputPassword">Phone Number</label>
											<div class="controls">
<input type="text" id="retype_password" name="phone" value="<?php echo $row['phone'];?>" placeholder="PHONE NUMBER" required/>
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="inputPassword">Sex</label>
											<div class="controls">
									<select name="sex">
                                    <option value="<?php echo $row['sex'];?>"><?php echo $row['sex'];?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    </select>
											</div>
										</div>
                                        <!-- <div class="control-group">
											<label class="control-label" for="inputPassword">Address</label>
											<div class="controls">
<input type="text" id="retype_password" name="address" value="<?php echo $row['address'];?>" placeholder="ADDRESS" required/>
                                        </div>
										</div> -->
										<div class="control-group">
											<div class="controls">
											<button type="submit" name="save" class="btn btn-info"><i class="icon-save"></i> Save</button>
											</div>
										</div>
									</form>
                              
                                    <?php
									
									
									
		
	if (isset($_POST['save'])){

	$surname=$_POST['surname'];
	$firstname=$_POST['firstname'];
	$othername=$_POST['othername'];
	$username=$_POST['username'];
	$phone=$_POST['phone'];
	$sex=$_POST['sex'];
	$address=$_POST['address'];

$query = mysqli_query($con,"UPDATE lecturer SET surname='$surname', firstname='$firstname',username='$username',phone='$phone', sex='$sex' WHERE username='$lectid'")or die(mysqli_error());
			
		if($query == True){
			
			echo '<script language="javascript">alert("Lecturer Information Updated Sucessfully!!!")</script>';
			echo'<script>window.location= "lecturer_dashboard.php";</script>';				 
			
		}
				
	}

?> 
									
									
									
									
						
                                    
                                    
                                    
                                    
                                    
                                    
				
  		<!-- <script>
			jQuery(document).ready(function(){
			jQuery("#change_password").submit(function(e){
					e.preventDefault();
						
						var password = jQuery('#password').val();
						var current_password = jQuery('#current_password').val();
						var new_password = jQuery('#new_password').val();
						var retype_password = jQuery('#retype_password').val();
						if (password != current_password)
						{
						$.jGrowl("Password does not match with your current password  ", { header: 'Change Password Failed' });
						}else if  (new_password != retype_password){
						$.jGrowl("Password does not match with your new password  ", { header: 'Change Password Failed' });
						}else if ((password == current_password) && (new_password == retype_password)){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "update_password_admin.php",
						data: formData,
						success: function(html){
					
						$.jGrowl("Your password is successfully change", { header: 'Change Password Success' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'dashboard.php'  }, delay);  
						
						}
						
						
					});
			
					}
				});
			});
	</script>-->
										
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
				 </div>
                </div>
	         </div>
        </div>	                 	 
<?php include('footer.php'); ?>
</div>
</div>	   
<?php include('script.php'); ?>
 </body>
</html>