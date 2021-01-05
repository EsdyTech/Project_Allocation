<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('lecturer_navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('lecturer_slidebar.php'); ?>
				<div class="span3" id="adduser">
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
				<?php	$code=$_GET['course_code'];	?>
				<div class="empty">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <strong>Note!:</strong> Select the checbox if you want to delete?
                    </div>
               </div>
              		
			   			
                 <?php	
	             $rrs=mysql_query("select * from lecturer WHERE lec_id='$lectid' ");
				 $roww = mysql_fetch_array($rrs);
				 $lectsurname=$roww['surname'];
				 $lectfirstname=$roww['firstname'];
				 $lectothername=$roww['othername'];
                 ?>	 	
                        <div id="block_bg" class="block" style="width:1250px; margin-left:-480px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Courses </div>
								<div class="muted pull-right">
								You have <span class="badge badge-info"><?php  echo $count; ?></span>  Assignment(s) in Total
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="lecturer_gradeass.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                   
									<script type="text/javascript">
									 $(document).ready(function(){
									 $('#delete').tooltip('show');
									 $('#delete').tooltip('hide');
									 });
									</script>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
                                                <th>s/n</th>
                                                <th>student matric no</th>
                                                <th>student name</th>
                                                <th>course_title</th>
                                                <th>course_code</th>
                                                 <th>filename</th>
                                                  <th>description</th>
                                                 <th>Percentage%</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Score</th>
                                                <th>Date Uploaded</th>
                                                <th>Time Uploaded</th>
												<th>Download Student Assignment</th>
										   </tr>
										</thead>
										<tbody>
									<?php
$device_name_query = mysql_query("select * from sub_assignments WHERE course_code='$code' AND lect_id='$lectid'")or die(mysql_error());
								while($row = mysql_fetch_array($device_name_query)){
								$matricno=$row['stud_matricno'];
			$rss=mysql_query("select * from students WHERE matricno='$matricno'");
				 while($rrw = mysql_fetch_array($rss)){
								$code=$row['course_code'];
										$id = $row['id'];
										$sn=$sn+1;
		
									?>
									
												<tr>
														<input type="hidden" name="id[]" value="<?php echo $id;?>"/>										
												 <td><?php echo $sn; ?></td>
                                                 <td><?php echo $row['stud_matricno']; ?></td>
                                                 <td><?php echo $rrw['surname'].'&nbsp;'.$rrw['firstname']; ?></td>
                                                <td><?php echo $row['course_title']; ?></td>
                                                <td><?php echo $row['course_code']; ?></td>
                                                <td><?php echo $row['filename']; ?></td>
                                                <td><?php echo $row['descr']; ?></td>
                     <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['percent'].'%'; ?></td>
                                                  <td><input type="text" name="score[]"/></td>
                                                <td><?php echo $row['datesub']; ?></td>
                                                 <td><?php echo $row['timesub']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												<td width="75">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $row['sub_assignment']; ?>" rel="tooltip"  title="Download student Assignments" id="d<?php echo $id; ?>"  role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-download-alt icon-large"></i></a>
												</td>
									
												<?php }}?>
										</tbody>
									</table>
                                    <div class="control-group" style="margin-left:200px;">
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
                        <!-- /block <a href="<?php //echo $row['assignment']; ?>" rel="tooltip"  title="Download File" id="d<?php //echo $id; ?>"  role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-download-alt icon-large"></i></a>-->
                    </div>
                </div>
            </div>
            
           <?php

if (isset($_POST['save'])){
$jj=(-1);


	  foreach ($_POST["id"] as $id) { $jj+=1; 
	 
	 $score=$_POST['score'][$jj];
	  
   $qry= "SELECT * FROM sub_assignments WHERE id='$id'";
   $res= mysql_query($qry);
	     if(mysql_affected_rows() >0){ $row=mysql_fetch_array($res);
		
		  $idd=$row['id'];
		  
		$qryi= "UPDATE sub_assignments SET score='$score' WHERE id='$idd'";
		
		 $resi=@mysql_query($qryi);
	     if(mysql_affected_rows()>0){
		 echo '<script language="javascript">alert("Assignment Graded Sucessfully!!!")</script>';
		echo'<script>window.location= "lecturer_viewgrade.php";</script>';				 
	}
			  
		 }
 }
}

?> 
            
            
            
            
            
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>