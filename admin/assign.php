<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('dashboard_slidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('assign_course.php'); ?>		   			
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
                        <div id="block_bg" class="block" style="width:1300px; margin-left:-100px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Course(s) Assigned</div>
								<div class="muted pull-right">
								Number of Courses Assigned: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="assign.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<input type="submit" name="delete"  onClick="return val()" class="btn btn-danger" value="Delete"/>
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
                                                <th>lecturer id</th>
												<th>Surname</th>
												<th>firstname</th>
                                                <th>coursetitle</th>
                                                <th>coursecode</th>
												<th>Course_Unit</th>
                                                <th>Semester</th>
                                                <th>level</th>
                                                <th>session</th>
                                                <th>date</th>
                                                 <th>status</th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$device_name_query = mysql_query("select * from assign_course")or die(mysql_error());
													while($row = mysql_fetch_array($device_name_query)){
													$id = $row['id'];
													$sn=$sn+1;
													?>
									
												<tr>
												<td width="30">
						<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>												
	                                            
												<td><?php echo $row['lec_id']; ?></td>
                                                <td><?php echo $row['surname']; ?></td>
												<td><?php echo strtoupper($row['firstname']); ?>
												<?php echo $row['middlename']; ?>
												<?php echo $row['lastname']; ?></td>
                                                <td><?php echo $row['course_title']; ?></td>
                                                <td><?php echo $row['course_code']; ?></td>
                                                <td><?php echo $row['course_unit']; ?></td>
                                                <td><?php echo $row['semester']; ?></td>
                                                 <td><?php echo $row['level']; ?></td>
                                                <td><?php echo $row['session']; ?></td>
                                                <td><?php echo $row['datee']; ?></td>
												<td><?php echo $row['status']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												
									
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
$idd=$_POST['selector'];
$N = count($idd);
//echo $N;
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM assign_course where id='$idd[$i]'");
	if(mysql_affected_rows()>0){
				 
	 	echo '<script type="application/javascript">alert("Deleted Successfully!");</script>';
		echo '<script>window.location= "assign.php";</script>';
		
	}			
}
}


?>

 <script language="javascript">
function val()
{
	var flag=confirm("Are you sure you want to Delete?");
	if(!flag)
	return false;
	else
	return true;
}
</script>



                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>