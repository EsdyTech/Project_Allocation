<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('student_navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_slidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('student_upload.php'); ?>		   			
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
	             $count_dev_name=mysql_query("select * from sub_assignments WHERE stud_matricno='$matricno'");
	             $count = mysql_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="width:1500px; margin-left:-100px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> ALL SUBMITTED ASSIGNMENTS AND THEIR SCORES</div>
								<div class="muted pull-right">
								Numbers of All Assignments: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_course.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-placement="right" title="Click to Delete check item"  data-toggle="modal" href="#item_delete" id="delete"  class="btn btn-danger" name="delete_course"><i class="icon-trash icon-large"> Delete</i></a>
									<script type="text/javascript">
									 $(document).ready(function(){
									 $('#delete').tooltip('show');
									 $('#delete').tooltip('hide');
									 });
									</script>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
                                                <th>s/n</th>
												<th>matricno</th>
												<th>course_code</th>
                                                <th>course_title</th>
                                                <th>Name of assignment</th>
                                                <th>description</th>
                                                <th>submitted_Assignment</th>
												<th>Date</th>
                                                <th>Time</th>
                                                <th>percentage%</th>
                                                <th>Score</th>
                                                <th>Remark</th>
										   </tr>
										</thead>
										<tbody>
													<?php
$device_name_query = mysql_query("select * from sub_assignments WHERE stud_matricno='$matricno'")or die(mysql_error());
													while($row = mysql_fetch_array($device_name_query)){
													$id = $row['id'];
													$sn=$sn+1;
													?>
									
												<tr>
												<td width="30">
						<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>												
	                                            <td><?php echo $sn; ?></td>
												<td><?php echo $row['stud_matricno']; ?></td>
                                                <td><?php echo $row['course_code']; ?></td>
                                                <td><?php echo $row['course_title']; ?></td>
                                                 <td><?php echo $row['filename']; ?></td>
                                                  <td><?php echo $row['descr']; ?></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $row['sub_assignment']; ?>" rel="tooltip"  title="Download Submitted Assignment" id="d<?php echo $id; ?>"  role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-download-alt icon-large"></i></a></td>
                                                <td><?php echo $row['datesub']; ?></td>
                                                <td><?php echo $row['timesub']; ?></td>
                                                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['percent']; ?></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['score']; ?></td>
                                                <td><?php echo $row['remark']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												
									
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