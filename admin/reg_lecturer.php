<?php error_reporting(0);include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('dashboard_slidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('add_lecturers.php'); ?>		   			
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
	             $count_dev_name=mysqli_query($con,"select * from lecturer");
	             $count = mysqli_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="width:1210px; margin-left:-100px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Lecturer(s) List</div>
								<div class="muted pull-right">
								Number of Lecturer: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in" style="margin-left:10px; width:1200px">
                                <div class="span12">
								<form action="reg_lecturer.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<input type="submit" name="delete" onClick="return val()" class="btn btn-danger" value="Delete"/>
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
												<th>Surname</th>
                                                <th>Firstname</th>
                                           		<th>username</th>
												<th>phone</th>
												<th>sex</th>
                                                 <th>Picture</th>
												 <th>Staff Mode</th>
                                                <th>status</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$device_name_query = mysqli_query($con,"select * from lecturer")or die(mysqli_error());
													while($row = mysqli_fetch_array($device_name_query)){
													$id = $row['username'];
													?>
									
												<tr>
												<td width="30">
		<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>												
	                                            
												<td><?php echo $row['surname']; ?></td>
                                                <td><?php echo $row['firstname']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
												<td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['sex']; ?></td>
                    <td><img id="avatar1" style="width:50px; height:50px"class="img-responsive" src="<?php echo $row['pic'];?>"></td>
												<td><?php echo $row['staffType']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												<td width="75">
												<a rel="tooltip"  title="Edit Employee Info" id="p<?php echo $id; ?>" href="edit_lecturer.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
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
$id=$_POST['selector'];
$N = count($id);
//echo $N;
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con,"DELETE FROM lecturer where username='$id[$i]'");
	if($result == True){
				 
	 	echo '<script type="application/javascript">alert("Lecturer(s) Deleted Successfully!");</script>';
		echo '<script>window.location= "reg_lecturer.php";</script>';
		
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