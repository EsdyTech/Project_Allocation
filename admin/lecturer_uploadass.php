<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('lecturer_navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('lecturer_slidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('lecturer_upload.php'); ?>		   			
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
	             $count_dev_name=mysql_query("select * from assign_course");
	             $count = mysql_num_rows($count_dev_name);
                 ?>	 
                  <?php	
	             $rrs=mysql_query("select * from lecturer WHERE lec_id='$lectid'");
				 $roww = mysql_fetch_array($rrs);
				 $surname=$roww['surname'];
				 $firstname=$roww['firstname'];
				 $othername=$roww['othername'];
                 ?>	 
                        <div id="block_bg" class="block" style="width:1200px; margin-left:-100px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Course(s) Assigned</div>
								<div class="muted pull-right">
								Number of Courses Assigned: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_course.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<input type="submit" name="delete" class="btn btn-danger" value="Delete"/>
                                    <br><br>
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
												<th><font color="#0000FF">s/n</font></th>
                                                <th><font color="#0000FF">lecturer_in_charge</font></th>
                                                <th><font color="#0000FF">course_title</font></th>
                                                <th><font color="#0000FF">course_code</font></th>
                                                <th><font color="#0000FF">Name of assignment</font></th>
                                                <th><font color="#0000FF">Description</font></th>
                                                 <th><font color="#0000FF">Percentage%</font></th>
                                                <th><font color="#0000FF">Date Uploaded</font></th>
                                                <th><font color="#0000FF">Time Uploaded</font></th>
												<th><font color="#0000FF">Download Assignment</font></th>
										   </tr>
										</thead>
										<tbody>
									<?php
								$device_name_query = mysql_query("select * from assignments WHERE lect_id='$lectid' ")or die(mysql_error());
								while($row = mysql_fetch_array($device_name_query)){
								$code=$row['course_code'];
										$id = $row['id'];
										$sn=$sn+1;
		
									?>
									
												<tr>
                                                <td width="30">
					<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $code; ?>">
												</td>
												<td width="30"> <?php echo $sn; ?></td>												
												 <td><?php echo $surname.' '. $firstname; ?></td>
                                                <td><?php echo $row['course_title']; ?></td>
                                                <td><?php echo $row['course_code']; ?></td>
                                                 <td><?php echo $row['filename']; ?></td>
                                                <td><?php echo $row['descr']; ?></td>
                                                 <td><?php echo $row['percent'].'%'; ?></td>
                                                <td><?php echo $row['datee']; ?></td>
                                                 <td><?php echo $row['timee']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												<td width="75">
												<a href="<?php echo $row['assignment']; ?>" rel="tooltip"  title="Download File" id="d<?php echo $id; ?>"  role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-download-alt icon-large"></i></a>
												</td>
												</tr>
												<?php }?>
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