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
								$query = mysql_query("select * from assign_students where studentId = '$matricno'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>		
								 <div class="container-fluid">
                                    <div class="row-fluid">
									 <!----------------------form------------------->		
								    <form  method="post" id="change_password" class="form-horizontal">
                                    <div class="control-group">
											<label class="control-label" for="inputEmail">From</label>
											<div class="controls">
		<input type="text" id="current_password" name="studentId" value="<?php echo $row['studentId'];?>"  readonly required/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputEmail">To Lecturer/Supervisor</label>
											<div class="controls">
		<input type="text" id="current_password" name="lecturerId" value="<?php echo $row['lecturerId'];?>"  readonly required/>
											</div>
										</div>
                                        <label class="control-label" for="inputEmail">Message</label>
											<div class="controls">
                                            <textarea name="message" id="focusedInput"   class="input focused" required></textarea>						
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
											<button type="submit" name="save" class="btn btn-info"><i class="icon-save"></i> Send</button>
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


		  
		$qryi= "UPDATE students SET surname='$surname', firstname='$firstname', othername='$othername', matricno='$matricno', sex='$sex', level='$level' WHERE matricno='$matricno'";
		
		 $resi=@mysql_query($qryi);
	     if(mysql_affected_rows()>0){
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