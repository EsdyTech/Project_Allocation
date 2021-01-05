<?php include('header.php'); ?>
<?php include('session.php'); ?>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","search_pro.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>



<script>
function showLecturer(str) {
    if (str == "") {
        document.getElementById("txtHintt").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHintt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","search_pro.php?qq="+str,true);
        xmlhttp.send();
    }
}
</script>


  <div class="row-fluid" style="margin-left:-70px">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Assign Students</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								 <!--------------------form------------------->
								<form method="post">
									
										<?php
    $sql = mysqli_query($con,"select * from students where isAssigned = 0")or die(mysqli_error());
     $num = mysqli_num_rows($sql);
   if ($num > 0){
	    
	   echo'STUDENTS MATRIC NO: <div class="control-group">
	   		<div class="controls">
	   <select name="studentId" required onchange="showUser(this.value)">';
	   echo '<option value="">--Select Student MatricNo--</option>';
	   while ($rows=mysqli_fetch_array($sql)){echo'<option value="'.$rows['matricno'].'" class="inputtext">'.$rows['matricno'].'</option>\n';}echo '</select>
	</div>
	</div>';}
				
	  ?> 
      
	  <?php
			    echo"<div id='txtHint'></div>";
			   ?>
               
               <?php
          echo"<div id='txtHint'></div>";
          ?>
          
          
     <?php    
         $sqll = mysqli_query($con,"select * from lecturer")or die(mysqli_error());
$numm = mysqli_num_rows($sqll);
   if ($numm > 0){
	    
	echo'LECTURER USERNAME: <div class="control-group">
	   		<div class="controls">
	   <select name="lecturerId" required onchange="showLecturer(this.value)">';
	   echo '<option value="">--Select Lecturer Name--</option>';
	   while ($rowss=mysqli_fetch_array($sqll)){echo'<option value="'.$rowss['username'].'" class="inputtext">'.$rowss['username'].'</option>\n';}echo '</select>
	</div>
	</div>';}
				
	  ?> 
      
					<?php
                    echo"<div id='txtHintt'></div>";
                    ?>
               
				  <?php
                  echo"<div id='txtHintt'></div>";
                  ?>
                 
                                      
										SESSION:
                                        <div class="control-group">
                                          <div class="controls">
                                           <select name="session" required>		
                                           <option value=" ">--Select Session--</option>								
													<option value="2016/2017 ">2016/2017</option>
          <option value="2017/2018">2017/2018</option>
            <option value="2018/2019">2018/2019</option><option value="2019/2020">2019/2020</option><option value="2020/2021">2020/2021</option><option value="2021/2022">2021/2022</option><option value="2022/2023">2022/2023</option><option value="2023/2024">2023/2024</option><option value="2024/2025">2024/2025</option><option value="2025/2026">2025/2026</option><option value="2026/2027">2027/2028</option><option value="2028/2029">2028/2029</option><option value="2029/2030">2029/2030</option><option value="2030/2031">2030/2031</option>
            <option value="2031/2032">2031/2032</option><option value="2032/2033">2032/2033</option><option value="2033/2034">2033/2034</option><option value="2034/2035">2034/2035</option>
            <option value="2035/2036">2035/2036</option><option value="2036/2037">2036/2037</option><option value="2037/2038">2037/2038</option><option value="2038/2039">2038/2039</option><option value="2039/2040">2039/2040</option>
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

$query = mysqli_query($con, "select * from assign_students where studentId = '$_POST[studentId]'")or die(mysqli_error());
    $count = mysqli_num_rows($query);
	 if ($count > 0){
		 
echo '<script type="application/javascript">alert("This Student has already been assigned!");</script>';
		 
	 }
	 else{
  
$lecturerId=$_POST['lecturerId'];$studentId=$_POST['studentId'];$session=$_POST['session'];$date = date('Y-m-d');

$qr= mysqli_query($con,"insert into assign_students (studentId,lecturerId,session,status,dateReg) 
values('$studentId','$lecturerId','$session','Assigned','$date')")or die(mysqli_error());

		if($qr == True){

        $querys = mysqli_query($con,"UPDATE students SET isAssigned = '1' WHERE matricno='$studentId'")or die(mysqli_error());          
			if($querys == True){

                echo '<script type="application/javascript">alert("Student Assigned Successfully!");</script>';
                echo '<script>window.location= "assign_students.php";</script>';
        
            }	 
				
			 exit();}
  }
	   }
	   ?>