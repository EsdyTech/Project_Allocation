<?php  include('header.php'); ?>
<?php include('session.php');?>
    <body>
		<?php include('student_navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_slidebar.php'); ?>
               <div class="span9" id="content">
                     <div class="row-fluid">
					  
					  <div class="alert alert-success"><i class="icon-info-sign"></i> Please Fill in required details</div>
					
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><i class="icon-user"></i>&nbsp;Students View/Edit Profile</div>							 
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								
								<?php
								$query = mysqli_query($con,"select * from students where matricno = '$matricno'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>		
								 <div class="container-fluid">
                                    <div class="row-fluid">
									 <!----------------------form------------------->		
								    <form  method="post" id="change_password" action="student_editprofile.php" class="form-horizontal">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Surname</label>
											<div class="controls">
		<input type="text" id="current_password" name="surname" value="<?php echo $row['surname'];?>"  placeholder="Current Password" required/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Firstname</label>
											<div class="controls">
						<input type="text" id="new_password" name="firstname" value="<?php echo $row['firstname'];?>" placeholder="New Password">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Othername</label>
											<div class="controls">
<input type="text" id="retype_password" name="othername" value="<?php echo $row['othername'];?>" placeholder="Re-type Password" required/>
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="inputPassword">Matric Number</label>
											<div class="controls">
<input type="text" id="retype_password" name="matricno" value="<?php echo $row['matricno'];?>" readonly placeholder="Re-type Password" required/>
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
                                        <div class="control-group">
											<label class="control-label" for="inputPassword">Level</label>
											<div class="controls">
                                    <select name="level">
                                    <option value="<?php echo $row['level'];?>"><?php echo $row['level'];?></option>
                                    <option value="ND1">ND1</option>
                                    <option value="ND2">ND2</option>
                                    <option value="HND1">HND1</option>
                                    <option value="HND2">HND2</option>
                                    </select>											</div>
										</div>
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
$matricno=$_POST['matricno'];
$sex=$_POST['sex'];
$level=$_POST['level'];


	$qryi = mysqli_query($con,"UPDATE students SET surname='$surname', firstname='$firstname', othername='$othername', matricno='$matricno', sex='$sex', level='$level' WHERE matricno='$matricno'")or die(mysqli_error());							  		
	
	     if($qryi == True){
		 echo '<script language="javascript">alert("Information Updated Sucessfully!!!")</script>';
		echo'<script>window.location= "student_dashboard.php";</script>';				 
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