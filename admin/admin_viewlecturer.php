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
	             $count_dev_name=mysql_query("select * from lecturer");
	             $count = mysql_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="width:1200px; margin-left:-450px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> lecturer(s) List</div>
								<div class="muted pull-right">
								Number of Lecturer: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="admin_viewlecturer.php" method="post">
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
                                                <th>s/n</th>
												<th>Surname</th>
                                                <th>Firstname</th>
                                                <th>Othername</th>
                                           		<th>Username</th>
                                                <th>Password</th>
                                                <th>Phone</th>
												<th>sex</th>
												<th>Picture</th>
												<th>Address</th>
                                                <th>status</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$device_name_query = mysql_query("select * from lecturer")or die(mysql_error());
													while($row = mysql_fetch_array($device_name_query)){
													$lec_id = $row['lec_id'];$sn=$sn+1;
													?>
									
												<tr>
												<td width="30">
			<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $lec_id; ?>">
												</td>												
	                                            <td><?php echo $sn; ?>
												<td><?php echo $row['surname']; ?>
                                                <td><?php echo $row['firstname']; ?>
                                                <td><?php echo $row['othername']; ?>
                                                <td><?php echo $row['username']; ?></td>
												<?php echo $row['middlename']; ?>
												<?php echo $row['lastname']; ?></td>
												<td><?php echo $row['password']; ?></td>
												<td><?php echo $row['phone']; ?></td>
												<td><?php echo $row['sex']; ?></td>
			<td><img id="avatar1" style="width:50px; height:50px"class="img-responsive" src="<?php echo $row['pic'];?>"></td>
                                                <td><?php echo $row['address']; ?></td>
												<td><?php echo $row['status']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												<td width="75">
												<a rel="tooltip"  title="Edit Lecturer Info" id="p<?php echo $lec_id; ?>" href="edit_lecturer.php<?php echo '?id='.$lec_id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
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
$idd=$_POST['selector'];
$N = count($idd);
//echo $N;
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM lecturer where lec_id='$idd[$i]'");
	if(mysql_affected_rows()>0){
				 
	 	echo '<script type="application/javascript">alert("Lecturer(s) Information Deleted Successfully!");</script>';
		echo '<script>window.location= "admin_viewlecturer.php";</script>';
		
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