<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_code = $_GET['code']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('dashboard_slidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('admin_edit_course.php'); ?>		   			
				</div>
				<?php	
	             $count_dev_name=mysql_query("select * from course");
	             $count = mysql_num_rows($count_dev_name);
                 ?>	
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
                        <div id="block_bg" class="block" style="width:1010px; margin-left:-100px" >
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Course(s) List</div>
								<div class="muted pull-right">
								Number of Course: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                             <div class="block-content collapse in">
                                <div class="span12">
								<form action="edit_courses.php" method="post">
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
                                                <th>S/N</th>
												<th>Course_Title</th>
												<th>Course_Code</th>
												<th>Course_Unit</th>
												<th>Level</th>
                                                <th>Semester</th>
                                                <th>Status</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$device_name_query = mysql_query("select * from course")or die(mysql_error());
													while($row = mysql_fetch_array($device_name_query)){
													$code = $row['course_code'];
													$sn=$sn+1;
													?>
									
												<tr>
												<td width="30">
<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $code; ?>">
												</td>												
	                                            
												<td><?php echo $sn; ?></td>
												<td><?php echo strtoupper($row['course_title']); ?>
												<?php echo $row['middlename']; ?>
												<?php echo $row['lastname']; ?></td>
												<td><?php echo $row['course_code']; ?></td>
												<td><?php echo $row['course_unit']; ?></td>
												<td><?php echo $row['level']; ?></td>
                                                <td><?php echo $row['semester']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
												
											    <?php include('toolttip_edit_delete.php'); ?>															
												<td width="75">
												<a rel="tooltip"  title="Edit Course" id="p<?php echo $code; ?>" href="edit_courses.php<?php echo '?code='.$code; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
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
<?php  

if (isset($_POST['delete'])){
$codee=$_POST['selector'];
$N = count($codee);
//echo $N;
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM course where course_code='$codee[$i]'");
	if(mysql_affected_rows()>0){
				 
	 	echo '<script type="application/javascript">alert("Course(s) Deleted Successfully!");</script>';
		echo '<script>window.location= "reg_course.php";</script>';
		
	}			
}
}


?>

                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>