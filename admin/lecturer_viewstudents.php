<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('lecturer_navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('lecturer_slidebar.php'); ?>
				<div class="span3" id="adduser">
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
				<?php	$code=$_GET['course_code'];	?>
				<div class="empty">
                    <div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 Nigerian Association of computer science students	
                    </div>
               </div>
              		
			   			
                 <?php	
	             $rrs=mysqli_query($con,"select * from assign_students WHERE lecturerId='$lectid'");
				  $count = mysqli_num_rows($rrs);
				 $roww = mysqli_fetch_array($rrs);
				 $lectsurname=$roww['surname'];
				 $lectfirstname=$roww['firstname'];
				 $lectothername=$roww['othername'];
                 ?>	 	
                        <div id="block_bg" class="block" style="width:1250px; margin-left:-400px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Students </div>
								<div class="muted pull-right">
								You have <span class="badge badge-info"><?php  echo $count; ?></span>Student(s) in Total
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="lecturer_viewgrade.php" method="post">
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
                                                <th>s/n</th>
                                                <th>surname</th>
                                                <th>firstname</th>
                                                <th>othername</th>
                                                 <th>matricno</th>
                                                <th>sex</th>
                                                <th>pic</th>
                                                <th>level</th>
                                                <th>status</th>
										   </tr>
										</thead>
										<tbody>
									<?php
									$device= mysqli_query($con,"select * from assign_students WHERE lecturerId='$lectid'")or die(mysqli_error());
								while($rowt = mysqli_fetch_array($device)){
								$studentId=$rowt['studentId'];
$device_name_query = mysqli_query($con,"select * from students WHERE matricno='$studentId'")or die(mysqli_error());
								while($row = mysqli_fetch_array($device_name_query)){
								
								$code=$row['course_code'];
										$id = $row['id'];
										$sn=$sn+1;
		
									?>
									
												<tr>
												 <td><?php echo $sn; ?></td>
                                                 <td><?php echo $row['surname']; ?></td>
                                                <td><?php echo $row['firstname']; ?></td>
                                                <td><?php echo $row['othername']; ?></td>
                                                 <td><?php echo $row['matricno']; ?></td>
                                                  <td><?php echo $row['sex']; ?></td>
                                                <td><img id="avatar1" class="img-responsive" src="<?php echo $row['pic'];  ?>"></td>
                                                 <td><?php echo $row['level']; ?></td>
                                                 <td><?php echo $rowt['status']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>															
												
									
												</tr>
												<?php }}?>
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