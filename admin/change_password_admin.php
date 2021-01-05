<?php  include('header.php'); ?>
<?php include('session.php');?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('dashboard_slidebar.php'); ?>
               <div class="span9" id="content">
                     <div class="row-fluid">
					  
					  <div class="alert alert-success"><i class="icon-info-sign"></i> Please Fill in required details</div>
					
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><i class="icon-user"></i>&nbsp;Administrator change Password</div>							 
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								
								<?php
								$query = mysql_query("select * from adminlogin where id = '$adminid'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>		
								 <div class="container-fluid">
                                    <div class="row-fluid">
									 <!----------------------form------------------->		
								    <form  method="post" id="change_password" action="change_password_admin.php" class="form-horizontal">
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
									
									
									
		$dev = mysql_query("select * from adminlogin WHERE id='$adminid'")or die(mysql_error());
					$rowii = mysql_fetch_array($dev);
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
   
		  
		$qryi= "UPDATE adminlogin SET password='$new_password' WHERE id='$adminid'";
		
		 $resi=@mysql_query($qryi);
	     if(mysql_affected_rows()>0){
		 echo '<script language="javascript">alert("Password changed and Updated Sucessfully!!!")</script>';
		echo'<script>window.location= "dashboard.php";</script>';				 
	}
			  
		 }
 }

?> 
															
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