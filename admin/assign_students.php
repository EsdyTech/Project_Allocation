<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('dashboard_slidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('assign_students2.php'); ?>		   			
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
	             $count_dev_name=mysqli_query($con,"select * from assign_students");
	             $count = mysqli_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="width:1300px; margin-left:-100px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Student(s) Assigned</div>
								<div class="muted pull-right">
								Number of Students Assigned: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="assign_students.php" method="post">
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
												<th></th>
                                                <th>S/N</th>
                                                <th>Student Matricno</th>
												<th>Student FullName</th>
												<th>Lecturer FullName</th>
                                                <th>Lecturer Mode</th>
                                                <th>Session</th>
                                                <th>Date Assigned</th>
                                                 <th>Status</th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$device_name_query = mysqli_query($con,"select * from assign_students")or die(mysqli_error());
													while($row = mysqli_fetch_array($device_name_query)){
                                                    $studentId = $row['studentId'];  $lecturerId = $row['lecturerId'];$id = $row['assignId'];

                                                    $device_name= mysqli_query($con,"select * from students where matricno='$studentId '")or die(mysqli_error());
													while($roww = mysqli_fetch_array($device_name)){

                                                    $device= mysqli_query($con,"select * from lecturer where username='$lecturerId'")or die(mysqli_error());
													while($rowww = mysqli_fetch_array($device)){
													$sn=$sn+1;
													?>
									
												<tr>
												<td width="30">
								<a href="deleteAssignedStudent.php?assignId=<?php echo $id;?>&matricno=<?php echo $studentId;?>"  onClick="return val()" class='btn btn-danger' value="Delete">Delete</a>
								<!-- <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
								<input  class="uniform_on" name="matricno[]" type="hidden" value="<?php echo $roww['matricno']; ?>"> -->

												</td>												
                                                <td><?php echo $sn; ?></td>
												<td><?php echo $roww['matricno']; ?></td>
                                                <td><?php echo $roww['surname'].' '. $roww['firstname']; ?></td>
                                                <td><?php echo $rowww['surname'].' '. $rowww['firstname']; ?></td>
                                                <td><?php echo $rowww['staffType']; ?></td>
                                                <td><?php echo $row['session']; ?></td>
                                                <td><?php echo $row['dateReg']; ?></td>
												<td><?php echo $row['status']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												
									
												</tr>
                                                <?php 
                                                    } 
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

// $idd=$_POST['selector'];
// $mat = $_POST['matricno'];
// $N = count($idd);
// //echo $N;
// for($i=0; $i < $N; $i++)
// {
// 	$result = mysqli_query($con,"DELETE FROM assign_students where assignId='$idd[$i]'");
// 	if($result == True){
				 
//  		$querys = mysqli_query($con,"UPDATE students SET isAssigned = '0' WHERE matricno='$mat[$i]'")or die(mysqli_error());          
// 			if($querys == True){

// 				echo '<script type="application/javascript">alert("Deleted Successfully!");</script>';
// 				echo '<script>window.location= "assign_students.php";</script>';
// 			}
// 	}			
// }
// }
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