<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('dashboard_slidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('add_admin.php'); ?>		   			
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
	             $count_dev_name=mysqli_query($con,"select * from adminlogin");
	             $count = mysqli_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="width:800px; margin-left:-100px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Administrator(s) List</div>
								<div class="muted pull-right">
								Number of Administrator: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="reg_admin.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									  <input type="submit" name="delete" onClick="return val()" class="btn btn-danger" value="Delete"/><br><br>
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
												<th>Surname</th>
                                                <th>Firstname</th>
                                                <th>Username</th>
                                           		<th>Paswword</th>
												<th>Picture</th>
												<th>Role</th>
												<th>status</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$device_name_query = mysqli_query($con,"select * from adminlogin")or die(mysqli_error());
													while($row = mysqli_fetch_array($device_name_query)){
													$id = $row['id'];$sn=$sn+1;
													?>
									
												<tr>
												<td width="30">
			<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>												
	                                            <td><?php echo $sn; ?></td>
												<td><?php echo $row['surname']; ?></td>
                                                <td><?php echo $row['firstname']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
												<td><?php echo $row['password']; ?></td>
			<td><img id="avatar1" style="width:50px; height:50px"class="img-responsive" src="<?php echo $row['pic'];?>"></td>
            									<td><?php echo $row['role']; ?></td>
												<td><?php echo $row['status']; ?></td>
												
											    <?php include('toolttip_edit_delete.php'); ?>															
												<td width="75">
												<a rel="tooltip"  title="Edit Administrator Details" id="p<?php echo $id; ?>" href="#<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
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
	$result = mysqli_query($con,"DELETE FROM adminlogin where id='$id[$i]'");
	if($result == True){
				 
	 	echo '<script type="application/javascript">alert("Administrator(s) Deleted Successfully!");</script>';
		echo '<script>window.location= "reg_admin.php";</script>';
		
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