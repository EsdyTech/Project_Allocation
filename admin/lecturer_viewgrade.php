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
                 Nigerian Association of computer science students	
                    </div>
               </div>
              		
			   			
                 <?php	
	             $rrs=mysql_query("select * from lecturer WHERE lec_id='$lectid' ");
				 $roww = mysql_fetch_array($rrs);
				 $lectsurname=$roww['surname'];
				 $lectfirstname=$roww['firstname'];
				 $lectothername=$roww['othername'];
                 ?>	 	
                        <div id="block_bg" class="block" style="width:1300px; margin-left:-480px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Courses </div>
								<div class="muted pull-right">
								You have <span class="badge badge-info"><?php  echo $count; ?></span>  Assignment(s) in Total
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="lecturer_viewgrade.php" method="post">
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
                                                <th>level</th>
                                                <th>student name</th>
                                                <th>course_title</th>
                                                <th>course_code</th>
                                                <th>name of assignment</th>
                                                <th>description</th>
                                                 <th>Percentage%</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Score</th>
                                                <th>Date Uploaded</th>
                                                <th>Time Uploaded</th>
										   </tr>
										</thead>
										<tbody>
									<?php
$device_name_query = mysql_query("select * from sub_assignments WHERE lect_id='$lectid'")or die(mysql_error());
								while($row = mysql_fetch_array($device_name_query)){
								$matricno=$row['stud_matricno'];
			$rss=mysql_query("select * from students WHERE matricno='$matricno'");
				 while($rrw = mysql_fetch_array($rss)){
								$code=$row['course_code'];
										$id = $row['id'];
										$sn=$sn+1;
		
									?>
									
												<tr>
																								
												 <td><?php echo $sn; ?></td>
                                                 <td><?php echo $row['stud_matricno']; ?></td>
                                                 <td><?php echo $rrw['level']; ?></td>
                                                 <td><?php echo $rrw['surname'].'&nbsp;'.$rrw['firstname']; ?></td>
                                                <td><?php echo $row['course_title']; ?></td>
                                                <td><?php echo $row['course_code']; ?></td>
                                                <td><?php echo $row['filename']; ?></td>
                                                <td><?php echo $row['descr']; ?></td>
                     <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['percent'].'%'; ?></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['score']; ?></td>
                                                <td><?php echo $row['datesub']; ?></td>
                                                 <td><?php echo $row['timesub']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												
									
												</tr>
												<?php }}?>
										</tbody>
									</table>
                                   
									</form>
                                </div>
                                
                            </div>
                            
                        </div>
                        <!-- /block <a href="<?php //echo $row['assignment']; ?>" rel="tooltip"  title="Download File" id="d<?php //echo $id; ?>"  role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-download-alt icon-large"></i></a>-->
                    </div>
                </div>
            </div>
            
          
            
            
            
            
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>