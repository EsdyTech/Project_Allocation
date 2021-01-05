<?php error_reporting(0);
include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
    <?php include('student_navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
            <?php include('student_slidebar.php'); ?>		
				<div class="span3" id="adduser">
				<?php include('student_software2.php'); ?>		   			
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
	             $count_dev_name=mysqli_query($con,"select * from software where studentId = '$matricno'");
	             $count = mysqli_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="margin-left:-80px; width:900px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Software Link(s) List</div>
								<div class="muted pull-right">
								Number of Added Links: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="student_software.php" method="post">
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
                                                <th>S/N</th>
												<th>MATRICNO</th>
                                                <th>LINK TO DOWNLOAD SOFTWARE</th>
												<th>DATE_SUBMITTED</th>
												
												<!-- <th></th> -->
										   </tr>
										</thead>
										<tbody>
													<?php
													$device_name_query = mysqli_query($con,"select * from software where studentId = '$matricno'")or die(mysqli_error());
													while($row = mysqli_fetch_array($device_name_query)){
                                                    $id = $row['id'];
                                                  $sn = $sn+1;

                                                    
													?>
									
												<tr>
												<td width="30">
			<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>												
                                                <td><?php echo $sn; ?></td>
												<td><?php echo $row['studentId']; ?></td>
                                                <td><?php echo $row['link']; ?></td>
												<td><?php echo $row['dateReg']; ?></td>
											    <?php include('toolttip_edit_delete.php'); ?>	</td>
												<!-- <td width="100px">
												<a rel="tooltip"  title="Edit Employee Info" id="p<?php echo $matricno; ?>" href="edit_student.php<?php echo '?matricno='.$matricno; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
												</td> -->
		
									
												</tr>
                                                <?php 
                                            
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
	$result = mysqli_query($con,"DELETE FROM software where id='$mat[$i]'");
	if($result == True){
				 
	 	echo '<script type="application/javascript">alert("Link Deleted Successfully!");</script>';
		echo '<script>window.location= "student_software.php";</script>';
		
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