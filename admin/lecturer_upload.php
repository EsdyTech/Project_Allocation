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
        xmlhttp.open("GET","search.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>



<script>
function showCourse(str) {
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
        xmlhttp.open("GET","search.php?qq="+str,true);
        xmlhttp.send();
    }
}
</script>


  <div class="row-fluid" style="margin-left:-90px">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Upload Assignments</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								 <!--------------------form------------------->
								<form method="post" enctype="multipart/form-data">
										          
     <?php    
$sqll ="SELECT * FROM assign_course WHERE lec_id='$lectid'"; $rrr =mysql_query($sqll); $numm = mysql_num_rows($rrr);
   if ($numm > 0){
	    
	   echo'COURSE CODE: <div class="control-group">
	   		<div class="controls">
	   <select name="courseid" onchange="showCourse(this.value)">';
	   echo '<option value="">--Select Course Code--</option>';
	   while ($rowss=mysql_fetch_array($rrr)){echo'<option value="'.$rowss['course_code'].'" class="inputtext">'.$rowss['course_code'].'</option>\n';}echo '</select>
	</div>
	</div>';}
				
	  ?> 
      
					<?php
                    echo"<div id='txtHintt'></div>";
                    ?>
               
				  <?php
                  echo"<div id='txtHintt'></div>";
                  ?>
                         <?php
                  echo"<div id='txtHintt'></div>";
                  ?>		
                  <?php
                  echo"<div id='txtHintt'></div>";
                  ?>	
                   <?php
                  echo"<div id='txtHintt'></div>";
                  ?>					
                                      UPLOAD FILE:
                                        <div class="control-group">
								          <label class="control-label" for="inputPassword">Browse Your Computer</label>
								           <div class="controls">
									        <input name="files" class="input-file uniform_on" id="fileInput" type="file" required>
								           </div>
								         </div>
                                         NAME OF ASSIGNMENT:
                                       <div class="control-group">
                                          <div class="controls">
									        <input name="name" type="text" required>
								           </div>
								         </div>
                                         
                                           PERCENTAGE OF ASSIGNMENT:
                                       <div class="control-group">
                                          <div class="controls">
									        <input name="percent" type="text" required>
								           </div>
								         </div>
                                         
                                       DESCRIPTION OF ASSIGNMENT:
                                       <div class="control-group">
                                          <div class="controls">
									        <input name="descr" type="text" required>
								           </div>
								         </div>
										SESSION:
                                        <div class="control-group">
                                          <div class="controls">
                                           <select name="session" required>										
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
   // function to get the characters after .!!
   function getExtension($str)
  {
   $i = strrpos($str,".");
   if (!$i)
   {
     return "";
   }
   $len = strlen($str) - $i;
   $ext = substr($str,$i+1,$len);
   return $ext;
  }
   
  ?>
 
                    
                   
                   
                   
                   
                   
                   
                   
                   
                   
					<?php
if (isset($_POST['save'])){

   
    $file_name = $_FILES['files']['name'];
  $file_size = $_FILES['files']['size'];

   
     $extension = getExtension($file_name);
     $extension = strtolower($extension);
     if (($extension == "jpg") || ($extension == "jpeg") || ($extension =="png") || ($extension == "gif") ) 
 	{
          // if file extension is not .jpg, .jpeg, .png, .gif
          echo "<script>alert('This is an image !!');</script>";
        } 
         if ($file_size >= 1048576 * 5) {
    echo "<script>alert('file selected exceeds 5MB size limit!!');</script>";
			}
			
 else{
 
 
 
 $target_dir="assignments/";

            $target_file=$target_dir.basename($_FILES["files"]["name"]);

            move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);

            $assignments="assignments/". basename($_FILES["files"]["name"]);
			
			 //$newname = "assignments/" . $rd2 . "_" . $filename;
                               
 $name = $_POST['name'];$percent = $_POST['percent'];
$lecturer=$_POST['lecturer'];$surname=$_POST['surname'];$firstname=$_POST['firstname'];$course_title=$_POST['course_title'];$course_code=$_POST['course_code'];$courseid=$_POST['courseid'];$course_unit=$_POST['course_unit'];$level=$_POST['level'];$semester=$_POST['semester'];$session=$_POST['session'];$descr=$_POST['descr'];$date = date('Y-m-d');$timee=date('H:m:s');

    $qr= "INSERT INTO assignments (lect_id,course_id,course_title,course_code,course_unit,level,semester,assignment,filename,descr,percent,datee,timee,status) VALUES('$lectid','$courseid','$course_title','$course_code','$course_unit','$level','$semester','$assignments','$name','$descr','$percent','$date','$timee','Active')";
   	           $res= mysql_query($qr);
			     if(mysql_affected_rows()>0){
				 
	 	echo '<script type="application/javascript">alert("Student Assignment Uploaded Sucessfully!");</script>';
		echo '<script>window.location= "lecturer_uploadass.php";</script>';
				
				 exit();}
  }
  }
	   ?>