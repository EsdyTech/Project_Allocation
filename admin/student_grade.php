<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('student_navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_slidebar.php'); ?>
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
	             $rr=mysql_query("select * from students WHERE matricno='$matricno' ");
				 $row = mysql_fetch_array($rr);
				 $level=$row['level'];
                 ?>	 	
                 <?php	
	             $rri=mysql_query("select * from sub_assignments");
				 $roo= mysql_fetch_array($rri);
				 $lectid=$roo['lect_id'];
                 ?>	 	
                  					
				<?php	
	             $count_dev_name=mysql_query("select * from sub_assignments WHERE stud_matricno='$matricno'");
	             $count = mysql_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="width:1200px; margin-left:-450px">
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
                                                 <th>lecturer_in_charge</th>
                                                <th>course_title</th>
                                                <th>course_code</th>
												<th>date_submitted</th>
                                                <th>time_submitted</th>
                                                <th>status</th>
												<th>percentage%</th>
                                                <th>score</th>
										   </tr>
										</thead>
										<tbody>
									<?php
									
	$device_name_query = mysql_query("select * from sub_assignments WHERE stud_matricno='$matricno'")or die(mysql_error());
								while($row = mysql_fetch_array($device_name_query)){
								$lectid = $row['lect_id'];
								
								$rrs=mysql_query("select * from lecturer  WHERE lec_id='$lectid' ");
									while($rows = mysql_fetch_array($rrs)){
									
										$id = $row['id'];
										$course_code = $row['course_code'];
										$sn=$sn+1;
									?>
									
												<tr>
                                                <td><?php echo $sn; ?></td>
												<td><?php echo $rows['surname'].' '.$rows['firstname']; ?></td>
                                                <td><?php echo $row['course_title']; ?></td>
                                                <td><?php echo $row['course_code']; ?></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['datesub']; ?></td>
     <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['timesub']; ?></td>
                                                 <td><?php echo $row['status']; ?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['percent']; ?></td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['score']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												
		
									
												</tr>
												<?php } }?>
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