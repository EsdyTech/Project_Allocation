<?php error_reporting(0);include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
    <?php include('student_navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_slidebar.php'); ?>
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
	             $count_dev_name=mysqli_query($con,"select * from project_chapters where studentId = '$matricno'");
	             $count = mysqli_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="margin-left:-350px; width:1400px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Chapter(s) List</div>
								<div class="muted pull-right">
								Number of Chapters: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
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
                                                <th>Level</th>
												<th>Topic</th>
												<th>Chapter</th>
												<th>status</th>
                                                <th>Chapter_status</th>
												<th>Start_Date</th>
												<th>End_Date</th>
												<th>Date Activated</th>
                                                <th>Upload_Writeups</th>
										   </tr>
										</thead>
										<tbody>
						<?php
	                    $device_name_query = mysqli_query($con,"select * from project_chapters where studentId = '$matricno'")or die(mysqli_error());						while($row = mysqli_fetch_array($device_name_query)){
                        $studentIdd = $row['studentId'];  $topicIdd = $row['topicId'];
                        
                        $devices = mysqli_query($con,"select * from topics where topicId = '$topicIdd'")or die(mysqli_error());
                        while($rowse = mysqli_fetch_array($devices)){

					$device = mysqli_query($con,"select * from students where matricno = '$studentIdd'")or die(mysqli_error());
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
												<td><?php echo $rows['level']; ?></td>
												<td><?php echo $rowse['name']; ?></td>
												<td><?php echo $row['chapter']; ?></td>
												<td><?php echo $row['status']; ?></td>
                                                <td><?php echo $row['status2']; ?></td>
												<td><?php echo $row['startDate']; ?></td>
												<td><?php echo $row['endDate']; ?></td>
												<td><?php echo $row['dateActivated']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
                                                <td width="100px">
<a rel="tooltip"  title="Approve Students Topic" id="p<?php echo $matricno; ?>" href="student_uploadwriteups.php<?php echo '?studentId='.$matricno; ?>&<?php echo 'projChapId='.$row['projChapId'];?>&<?php echo 'chapter='.$row['chapter'];?>"  data-toggle="modal" class="btn btn-success">Upload</a> 
												</td>									
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