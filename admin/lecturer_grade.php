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
						
				<div class="empty">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <strong>Note!:</strong> Select the checbox if you want to delete?
                    </div>
               </div>
			   			<?php	
	             $rr=mysql_query("select * from assign_course WHERE lec_id='$lectid' ");
				 $row = mysql_fetch_array($rr);
				 //$level=$row['level'];
                 ?>	 					
				<?php	
	             $count_dev_name=mysql_query("select * from course WHERE level='$level'");
	             $count = mysql_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="width:1200px; margin-left:-450px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Courses</div>
								<div class="muted pull-right">
								Number of Courses Offered: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_course.php" method="post">
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
                                                <th>course_title</th>
                                                <th>course_code</th>
												<th>Course_Unit</th>
                                                <th>Semester</th>
                                                <th>level</th>
                                                <th>session</th>
												<th>view</th>
										   </tr>
										</thead>
										<tbody>
									<?php
								$device_name_query = mysql_query("select * from assign_course WHERE lec_id='$lectid'")or die(mysql_error());
								while($row = mysql_fetch_array($device_name_query)){
										$id = $row['id'];
										$course_code=$row['course_code'];
										$sn=$sn+1;
									?>
									
												<tr>
												<td><?php echo $sn; ?></td>												
                                                <td><?php echo $row['course_title']; ?></td>
                                                <td><?php echo $row['course_code']; ?></td>
                                                <td><?php echo $row['course_unit']; ?></td>
                                                <td><?php echo $row['semester']; ?></td>
                                                 <td><?php echo $row['level']; ?></td>
                                                 <td><?php echo $row['session']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												<td width="75">
<a rel="tooltip"  title="View Course" id="v<?php echo $course_code; ?>"  href="lecturer_gradeass.php<?php echo '?course_code=' . $course_code; ?>" class="btn btn-info">&nbsp;<i class="icon-file-alt icon-large"></i>&nbsp;<?php //echo $row['subject_id']; ?></a>
												</td>
		
									
												</tr>
												<?php } ?>
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