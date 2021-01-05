<?php include('header.php'); ?>
<?php session_start();?>
<body id="login">
    <div class="container">
		<div class="row-fluid">
			<div class="span6"><div class="title_index"><?php include('title_index.php'); ?></div></div>
			<div class="span6"><div class="pull-right">
            
            			
			<form id="login_form1" class="form-signin" method="post" action="lecturerSignup.php">
				<h3 class="form-signin-heading">
					<i class="icon-lock"></i>Lecturer Sigup Page
				</h3>
				<input type="text"      class="input-block-level"   id="username" name="surname" placeholder="surname" required>
                <input type="text"      class="input-block-level"   id="username" name="firstname" placeholder="firstname" required>
                <input type="email"      class="input-block-level"   id="username" name="email" placeholder="Email" required>            
                <select name="staffType" class="input-block-level" required>										
													<option>Full Time</option>
													<option>Part Time</option>
												</select>		
                 <select name="sex" class="input-block-level" required>										
													<option>Male</option>
													<option>Female</option>
												</select>				
           <input type="text"  class="input-block-level"   id="password" name="phone" placeholder="Phone Number" required>
	
                <input type="password"  class="input-block-level"   id="password" name="password" placeholder="Password" required>
                <input type="password"  class="input-block-level"   id="password" name="conpassword" placeholder="Confirm Password" required>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button data-placement="right" title="Click Here to Save" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i>Sign Up</button>
				

			</form>
		
				<?php
				if(isset($_POST['login'])){

                    if($_POST['password'] != $_POST['conpassword'])
                    
                    {

  echo '<script type="application/javascript">alert("Password Mismatch!");</script>';

                    }
			else{	
                $surname=$_POST['surname'];
                $firstname=$_POST['firstname'];
                $email=$_POST['email'];
                $staffType=$_POST['staffType'];
                $password=$_POST['password'];
                $sex=$_POST['sex'];
                $phone=$_POST['phone'];
				$pic = 'uploads/lecturer.jpg';
				
				 $qry = "SELECT * FROM lecturer WHERE username='$email'"; 
	 $res = mysql_query($qry);
	 if (mysql_affected_rows()  > 0){

        echo '<script type="application/javascript">alert("This Email has been Used!");</script>';
  
     }

     else {
        $resq = mysql_query("insert into lecturer (surname,firstname,sex,username,pic,phone,password,staffType,status) 
        values('$surname','$firstname','$sex','$email','$pic','$phone','$password','$staffType','Activated')")or die(mysql_error());


        if ($resq){

            echo '<script type="application/javascript">alert("Successfully Registered!");</script>';
            echo '<script>window.location= "lectlogin.php";</script>';

      
         }
else{

    echo '<script type="application/javascript">alert("An error occured!");</script>';

}



     }
	
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