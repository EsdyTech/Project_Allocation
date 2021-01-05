<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('department_slidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_department_form.php'); ?>		   			
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
				   
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Location List</div>                           
							<div id="" class="muted pull-right">
								<?php 
								$my_department = mysql_query("select * from department ")or die(mysql_error());
								$count_my_department = mysql_num_rows($my_department);?>
								Number of Department: <span class="badge badge-info"><?php echo $count_my_department; ?></span>
						    </div>
							</div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_department.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<a data-placement="right" title="Click to Delete check item" data-toggle="modal" href="#delete_department" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
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
													<th>location</th>
													<th>Thumbnails</th>
													<th></th>
										   </tr>
										</thead>
										<tbody>
										<?php
										$department_query = mysql_query("select * from department")or die(mysql_error());
										while($location_row = mysql_fetch_array($department_query)){
										$id = $location_row['dep_id'];
										?>
												
										<tr>
											<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											</td>
											<td><?php echo $location_row['dep_name']; ?></td>
											<td><?php echo $location_row['thumbnails']; ?></td>
											
											<?php include('toolttip_edit_delete.php'); ?>																											
											<td width="125">
											<a rel="tooltip"  title="Edit Department" id="e<?php echo $id; ?>" href="edit_department.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> Edit Location</a>
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


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>