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

<?php 

$course_code=$_GET['course_code'];
$id=$_GET['id'];


?>

				<?php	
	             $rr=mysql_query("select * from assignments WHERE id='$id' ");
				 $row = mysql_fetch_array($rr);
				 $lectid=$row['lect_id'];
				 $assignmentt=$row['assignment'];
				 $course_title=$row['course_title'];
				  $percentt=$row['percent'];
				   $filename=$row['filename'];
				    $descr=$row['descr'];
                 ?>	 	
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
										          
    
                                      UPLOAD FILE:
                                        <div class="control-group">
								          <label class="control-label" for="inputPassword">Browse Your Computer</label>
								           <div class="controls">
									        <input name="files" class="input-file uniform_on" id="fileInput" type="file" required>
								           </div>
								         </div>
                                        <input type="hidden" name="course_code" value="<?php echo $course_code;?>"/>
                                         <input type="hidden" name="course_title" value="<?php echo $course_title;?>"/>
                                         <input type="hidden" name="lectid" value="<?php echo $lectid;?>"/>
                                          <input type="hidden" name="assignment" value="<?php echo $assignmentt;?>"/>
                                           <input type="hidden" name="percent" value="<?php echo $percentt;?>"/>
                                            <input type="hidden" name="filename" value="<?php echo $filename;?>"/>
                                             <input type="hidden" name="descr" value="<?php echo $descr;?>"/>
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
 
 
				 $qry = "SELECT * FROM sub_assignments WHERE asgnid='$id' AND stud_matricno='$matricno'"; 
	 $res = mysql_query($qry);
	 if (mysql_affected_rows() ==  1){
	 echo '<script type="application/javascript">alert("This Assignment has been submitted before!");</script>';}
	 else{
 
 $target_dir="assignments/";

            $target_file=$target_dir.basename($_FILES["files"]["name"]);

            move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);

            $sub_assignments="assignments/". basename($_FILES["files"]["name"]);
			
			 //$newname = "assignments/" . $rd2 . "_" . $filename;
         $percent=$_POST['percent'];                       
  $course_code=$_POST['course_code'];$course_title=$_POST['course_title'];$lectid=$_POST['lectid'];$assignment=$_POST['assignment'];$date = date('Y-m-d');$timee=date('H:m:s');

    $qr= "INSERT INTO sub_assignments (lect_id,asgnid,stud_matricno,course_code,course_title,assignment,filename,descr,sub_assignment,datesub,timesub,status,percent,score,remark) VALUES('$lectid','$id','$matricno','$course_code','$course_title','$assignment','$filename','$descr','$sub_assignments','$date','$timee','Submitted','$percent','','')";
   	           $res= mysql_query($qr);
			     if(mysql_affected_rows()>0){
				 
	 	echo '<script type="application/javascript">alert("Assignment Submitted and Uploaded Sucessfully!");</script>';
		echo '<script>window.location= "student_uploadass.php";</script>';
				
				 exit();}
  }
  }}
	   ?>