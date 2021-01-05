<?php include('header.php'); ?>
<?php session_start();?>
<body id="login">
    <div class="container">
		<div class="row-fluid">
			<div class="span6"><div class="title_index"><?php include('title_index.php'); ?></div></div>
			<div class="span6"><div class="pull-right">
            
            			
			<form id="login_form1" class="form-signin" method="post" action="lectlogin.php">
				<h3 class="form-signin-heading">
					<i class="icon-lock"></i> Lecturer Login
				</h3>
				<input type="text"      class="input-block-level"   id="username" name="username" placeholder="Username" required>
				<input type="password"  class="input-block-level"   id="password" name="password" placeholder="Password" required>
				
				<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="lecturerSignup.php" title="Click Here to Sign Up" id="signin" name="Signup" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign Up</a>
			</form>
		
				<?php
				if(isset($_POST['login'])){
				
				$username=$_POST['username'];$password=$_POST['password'];
				
		
		$query = mysqli_query($con,"select * from lecturer where  password='$password' && username='$username'");
        $count = mysqli_num_rows($query);
        $rs = mysqli_fetch_array($query);

        if($count > 0)
        {

		$_SESSION['username']  = $rs['username'];
		$_SESSION['lectsurname']  = $rs['surname'];
		$_SESSION['lectfirstname']  = $rs['firstname'];

		echo '<script>window.location= "admin/lecturer_dashboard.php";</script>';
		}
	 else {
	 	echo '<script type="application/javascript">alert("ERROR!");</script>';

	 }
	 }
				?>		
			
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            </div></div>
		</div>
		<div class="row-fluid">
           <div class="offset2">		
			   <div class="span11"><div class="index-footer"><?php include('link.php'); ?></div></div>		
		   </div>
	    </div>
			<?php include('footer.php'); ?>
    </div>
<?php include('script.php'); ?>
</body>
</html>