<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('dashboard_slidebar.php'); ?>
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
	             $count_dev_name=mysql_query("select * from course");
	             $count = mysql_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="width:1200px; margin-left:-450px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Course(s) List</div>
								<div class="muted pull-right">
								Number of Courses: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_emp.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-placement="right" title="Click to Delete check item"  data-toggle="modal" href="#item_delete" id="delete"   class="btn btn-danger" name="delete_emp"><i class="icon-trash icon-large"> Delete</i></a>
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
												<th>Course title</th>
                                                <th>course code</th>
                                                <th>course unit</th>
                                           		<th>level</th>
												<th>semester</th>
												<th>status</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$device_name_query = mysql_query("select * from course")or die(mysql_error());
													while($row = mysql_fetch_array($device_name_query)){
													$course_code = $row['course_code'];$sn=$sn+1;
													?>
									
												<tr>
												<td width="30">
			<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $matricno; ?>">
												</td>												
	                                            <td><?php echo $sn; ?>
												<td><?php echo $row['course_title']; ?>
                                                <td><?php echo $row['course_code']; ?>
                                                <td><?php echo $row['course_unit']; ?>
                                                <td><?php echo $row['level']; ?></td>
												<?php echo $row['middlename']; ?>
												<?php echo $row['lastname']; ?></td>
												<td><?php echo $row['semester']; ?></td>
												<td><?php echo $row['status']; ?></td>
												
											    <?php include('toolttip_edit_delete.php'); ?>															
												<td width="75">
												<a rel="tooltip"  title="Edit Course Info" id="p<?php echo $course_code; ?>" href="edit_employee.php<?php echo '?id='.$course_code; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
												</td>
		
									
												</tr>
												<?php } ?>
										</tbody>
									</table>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>