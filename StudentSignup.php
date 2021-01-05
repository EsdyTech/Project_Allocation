<?php include('header.php'); ?>
<?php session_start();?>
<body id="login">
    <div class="container">
		<div class="row-fluid">
			<div class="span6"><div class="title_index"><?php include('title_index.php'); ?></div></div>
			<div class="span6"><div class="pull-right">
            
            			
			<form id="login_form1" class="form-signin" method="post" action="StudentSignup.php">
				<h3 class="form-signin-heading">
					<i class="icon-lock"></i>Student Sigup Page
				</h3>
				<input type="text"      class="input-block-level"   id="username" name="surname" placeholder="surname" required>
                <input type="text"      class="input-block-level"   id="username" name="firstname" placeholder="firstname" required>
                <input type="text"      class="input-block-level"   id="username" name="othername" placeholder="OtherName" required>
                <input type="text"      class="input-block-level"   id="username" name="matricno" placeholder="Matric_No" required>
                <select name="level" class="input-block-level" required>										
													<option>ND1</option>	
                                                    <option>ND2</option>
													<option>HND1</option>
													<option>HND2</option>
												</select>	                
                <select name="sex" class="input-block-level" required>										
													<option>Male</option>
													<option>Female</option>
												</select>					
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
                $othername=$_POST['othername'];
                $matricno=$_POST['matricno'];
                $level=$_POST['level'];
                $sex=$_POST['sex'];
                $password=$_POST['password'];
              $pic ='uploads/student.jpg';
				
				 $qry = "SELECT * FROM students WHERE matricno='$matricno'"; 
	 $res = mysql_query($qry);
	 if (mysql_affected_rows()  > 0){

        echo '<script type="application/javascript">alert("A student with this matric Number Exists!");</script>';
  
     }

     else {
        $resq = mysql_query("insert into students (surname,firstname,othername,matricno,password,sex,pic,level,status) 
        values('$surname','$firstname','$othername','$matricno','$password','$sex','$pic','$level','Activate')")or die(mysql_error());


        if ($resq){

            echo '<script type="application/javascript">alert("Successfully Registered!");</script>';
      
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