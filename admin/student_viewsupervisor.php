<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('student_navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_slidebar.php'); ?>
				<div class="span3" id="adduser">
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
						
				<div class="empty">
                    <!-- <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <strong>Note!:</strong> Select the checbox if you want to delete?
                    </div> -->
               </div>
			   			<?php	
	             $rr=mysqli_query($con,"select * from students WHERE matricno='$matricno' ");
				 $row = mysqli_fetch_array($rr);
				 $level=$row['level'];
                 ?>	 					
				<?php	
	             $count_dev_name=mysqli_query($con,"select * from course WHERE level='$level'");
	             $count = mysqli_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="width:1200px; margin-left:-390px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">ASSIGNED SUPERVISOR/LECTURER</div>
								<!-- <div class="muted pull-right">
								Number of Courses Offered: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div> -->
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_course.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									
									<script type="text/javascript">
									 $(document).ready(function(){
									 $('#delete').tooltip('show');
									 $('#delete').tooltip('hide');
									 });
									</script>
									<?php include('modal_delete.php'); ?>
									<thead>
										  <tr>
												<th>Surname</th>
                                                <th>Firstname</th>
                                                <th>Username</th>
                                           		<th> Staff_Mode</th>
												<th>sex</th>
                                                <th>picture</th>
												<th>Session</th>
												<th>status</th>
												<th>Date Assigned</th>
										   </tr>
										</thead>
										<tbody>
						<?php
						$device_name_query = mysqli_query($con,"select * from assign_students where studentId = '$matricno'")or die(mysqli_error());
						while($row = mysqli_fetch_array($device_name_query)){
						$lecturerId = $row['lecturerId'];

					$device = mysqli_query($con,"select * from lecturer where username = '$lecturerId'")or die(mysqli_error());
					while($rows = mysqli_fetch_array($device)){

						?>
									
												<tr>
												<td><?php echo $rows['surname']; ?>
                                                <td><?php echo $rows['firstname']; ?>
                                                <td><?php echo $rows['username']; ?>
                                                <td><?php echo $rows['staffType']; ?></td>
												<td><?php echo $rows['sex']; ?></td>
                <td><img id="avatar1" style="width:50px; height:50px"class="img-responsive" src="<?php echo $rows['pic'];?>"></td>
												<td><?php echo $row['session']; ?></td>
												<td><?php echo $row['status']; ?></td>
												<td><?php echo $row['dateReg']; ?></td>
																				
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
                        <!-- /block <a href="<?php //echo $row['assignment']; ?>" rel="tooltip"  title="Download File" id="d<?php //echo $id; ?>"  role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-download-alt icon-large"></i></a>-->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>