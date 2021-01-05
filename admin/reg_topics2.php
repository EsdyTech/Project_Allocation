<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
    <?php include('lecturer_navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
            <?php include('lecturer_slidebar.php'); ?>	
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
	             $count_dev_name=mysql_query("select * from topics");
	             $count = mysql_num_rows($count_dev_name);
                 ?>	 
                        <div id="block_bg" class="block" style="width:1020px; margin-left:-400px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-folder-open-alt"></i> Topic(s) List</div>
								<div class="muted pull-right">
								Number of Topics: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="reg_course.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
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
                                                <th>S/N</th>
												<th>Name</th>
												<th> Code</th>
                                                <th>Status</th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$device_name_query = mysql_query("select * from topics")or die(mysql_error());
													while($row = mysql_fetch_array($device_name_query)){
													$code = $row['course_code'];
													$sn=$sn+1;
													?>
									
												<tr>
																						
	                                            
												<td><?php echo $sn; ?></td>
												<td><?php echo strtoupper($row['name']); ?></td>
                                                <td><?php echo $row['code']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
												
											    <?php include('toolttip_edit_delete.php'); ?>															
												
											<td>
                                            
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
$codee=$_POST['selector'];
$N = count($codee);
//echo $N;
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM topics where code='$codee[$i]'");
	if(mysql_affected_rows()>0){
				 
	 	echo '<script type="application/javascript">alert("Course(s) Deleted Successfully!");</script>';
		echo '<script>window.location= "reg_course.php";</script>';
		
	}			
}
}


?>

                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>