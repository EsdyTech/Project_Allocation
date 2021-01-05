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
                                <div id="" class="muted pull-left"><i class="icon-user"></i>&nbsp;Students change Password</div>							 
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
								    <form  method="post" id="change_password" action="change_passstudent.php" class="form-horizontal">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Current Password</label>
											<div class="controls">
		<input type="password" id="current_password" name="current_password"  placeholder="Current Password" required/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">New Password</label>
											<div class="controls">
						<input type="password" id="new_password" name="new_password" placeholder="New Password">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Re-type Password</label>
											<div class="controls">
<input type="password" id="retype_password" name="retype_password" placeholder="Re-type Password" required/>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
											<button type="submit" name="save" class="btn btn-info"><i class="icon-save"></i> Save</button>
											</div>
										</div>
									</form>
                              
                                    <?php
									
									
									
		$dev = mysqli_query($con,"select * from students WHERE matricno='$matricno'")or die(mysqli_error());
					$rowii = mysqli_fetch_array($dev);
					$password=$rowii['password'];
									
if (isset($_POST['save'])){

$current_password=$_POST['current_password'];
$new_password=$_POST['new_password'];
$retype_password=$_POST['retype_password'];

if ($current_password!=$password){

echo '<script language="javascript">alert("Your Current Password does not match!!!")</script>';

}
else if ($new_password!=$retype_password){

echo '<script language="javascript">alert("Password does not match!!")</script>';

}
else{
   
		  
		$qryi = mysqli_query($con,"UPDATE students SET password='$new_password' WHERE matricno='$matricno'")or die(mysqli_error());							  		
		
	     if($qryi == True){
		 echo '<script language="javascript">alert("Password changed and Updated Sucessfully!!!")</script>';
		echo'<script>window.location= "student_dashboard.php";</script>';				 
	}
			  
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