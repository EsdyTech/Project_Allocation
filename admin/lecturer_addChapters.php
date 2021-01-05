<?php error_reporting(0);include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
    <?php include('lecturer_navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('lecturer_slidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php // include('add_students.php'); ?>		   			
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
	             $count_dev_name=mysqli_query($con,"select * from assign_students where lecturerId = '$lectid'");
	             $count = mysqli_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="margin-left:-350px; width:1010px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i>Assigned Student(s) List</div>
								<div class="muted pull-right">
								Number of Assigned Students: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="reg_students.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                   <!-- <input type="submit" name="delete"  onClick="return val()" class="btn btn-danger" value="Delete"/> -->
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
												<!-- <th></th> -->
												<th>Surname</th>
                                                <th>Firstname</th>
                                                <th>Othername</th>
                                           		<th>Matric No</th>
												<th>sex</th>
                                                <th>picture</th>
												<th>level</th>
												<th>Lecturer</th>
												<th>status</th>
												<th>Date Assigned</th>
												<th>View Approved Topic</th>
										   </tr>
										</thead>
										<tbody>
						<?php
						$device_name_query = mysqli_query($con,"select * from assign_students where lecturerId = '$lectid'")or die(mysqli_error());
						while($row = mysqli_fetch_array($device_name_query)){
						$studentId = $row['studentId'];

					$device = mysqli_query($con,"select * from students where matricno = '$studentId'")or die(mysqli_error());
					while($rows = mysqli_fetch_array($device)){

						?>
									
												<tr>
												<!-- <td width="30">
			<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $matricno; ?>">
												</td>												 -->
	                                            
												<td><?php echo $rows['surname']; ?>
                                                <td><?php echo $rows['firstname']; ?>
                                                <td><?php echo $rows['othername']; ?>
                                                <td><?php echo $rows['matricno']; ?></td>
												<td><?php echo $rows['sex']; ?></td>
                <td><img id="avatar1" style="width:50px; height:50px"class="img-responsive" src="<?php echo $rows['pic'];?>"></td>
												<td><?php echo $rows['level']; ?></td>
												<td><?php echo $row['lecturerId']; ?></td>
												<td><?php echo $row['status']; ?></td>
												<td><?php echo $row['dateReg']; ?></td>
												
											    <?php include('toolttip_edit_delete.php'); ?>															
				<td width="100px">
				<a rel="tooltip"  title="Approve Students Topic" id="p<?php echo $matricno; ?>" href="lecturer_addChapters2.php<?php echo '?studentId='.$studentId; ?>"  data-toggle="modal" class="btn btn-success">View Topic</a>
												</td>
		
									
												</tr>
												<?php 
											}
										 }
											
											?>
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
$mat=$_POST['selector'];
$N = count($mat);
//echo $N;
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con,"DELETE FROM students where matricno='$mat[$i]'");
	if($result == True){
				 
	 	echo '<script type="application/javascript">alert("Student(s) Deleted Successfully!");</script>';
		echo '<script>window.location= "reg_students.php";</script>';
		
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