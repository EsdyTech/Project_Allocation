<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $dep_id = $_GET['dep_id']; ?>
<?php $client_id = $_GET['client_id']; ?>
<?php $get_id = $_GET['item_id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('item_location_slidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
								
                          <div class="empty">
			 	             <div class="alert alert-success">
                              <strong>We Stronly Recommed to Please Check the Item</strong>
                            </div>
			               </div>
						   
						    <?php $location_query = mysql_query("select * from department	                     
	                         where dep_id = '$dep_id'")or die(mysql_error());
	                         $location_row = mysql_fetch_array($location_query);
	                        ?>	
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Department Name:&nbsp;<?php echo $location_row['dep_name']; ?>&nbsp;Return Form </div>
										<div class="muted pull-right">
										<a id="return" data-placement="left" title="Click to Return" href="myitem.php<?php echo '?dep_id='.$dep_id; ?>"><i class="icon-arrow-left"></i> Back</a>
										</div>
										<script type="text/javascript">
										$(document).ready(function(){
										$('#return').tooltip('show');
										$('#return').tooltip('hide');
										});
										</script>  
		                            </div>
									 <?php
									$query1 = mysql_query("select * from client where client_id = '$client_id'")or die(mysql_error());
									$row1 = mysql_fetch_array($query1);
									?>									 
		                            <div class="block-content collapse in">    
									 
									<?php
									$query = mysql_query("select * from item where item_id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									 <form class="form-horizontal" method="post">
									       
										 <div class="control-group">
											<label class="control-label" for="inputPassword">Employee Name</label>
											   <div class="controls">
											   <input type="text" class="span5" value="<?php echo $row1['firstname']; ?>&nbsp;<?php echo $row1['middlename']; ?>&nbsp;<?php echo $row1['lastname']; ?>" name="firstname" id="inputPassword" placeholder="Employee Name" readonly="readonly" required>
											</div>
										 </div>
											
											<div class="control-group">
											   <label class="control-label" for="inputPassword">Item Name</label>
											     <div class="controls">
											       <input type="text" class="span5" value="<?php echo $row['item_name']; ?>" name="item_name" id="inputPassword" placeholder="Item Name" readonly="readonly" required>
											    </div>
										    </div>
											
											<div class="control-group">
										       <label class="control-label" for="inputPassword">Item Brand</label>
											    <div class="controls">
											     <input type="text" class="span5" value="<?php echo $row['item_brand']; ?>" name="item_brand" id="inputPassword" placeholder="Item Brand" readonly="readonly" required>
											    </div>
										    </div>
										
										   <div class="control-group">
											  <label class="control-label" for="inputPassword">Inventory Code/Serial</label>
											    <div class="controls">
											     <input type="text" class="span5" value="<?php echo $row['item_serial']; ?>" name="item_serial" id="inputPassword" placeholder="Inventory Code or Serial" readonly="readonly" required>
											  </div>
										  </div>
										
										<label class="control-label" for="inputPassword">Item Status</label>
											<div class="controls">										
											  <select value="" <?php echo $row['item_status']; ?> name="item_status" class="span5" required >
													<option></option>
													<option>Good condition</option>
													<option>Defective</option>
												</select>								
											</div>
                                         <br>
										<div class="control-group">
										<div class="controls">
										
										<button id="move" data-placement="right" title="Click to Return Item" name="Return" type="submit" class="btn btn-warning"><i class="icon-move"></i> Return</button>
										</div>
										</div>
									
										<script type="text/javascript">
										$(document).ready(function(){
										$('#move').tooltip('show');
										$('#move').tooltip('hide');
										});
										</script>  
										</form>
										
										<?php
										if (isset($_POST['Return'])){
											
										$item_name = $_POST['item_name'];	
									    $item_status = $_POST['item_status'];
										mysql_query("update release_details
                                        LEFT JOIN item on release_details.item_id = item.item_id 
                                        set 
										item_name='$item_name',
										item_status='$item_status',
										release_status='Returned',
										date_return = NOW()
                                        where release_details.item_id ='$get_id'")or die(mysql_error());	
													
										mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username',' $client_id Return Item  $get_id to Department ID $dep_id')")or die(mysql_error());			
										?>
										<script>
										window.location = "myitem.php<?php echo '?dep_id='.$dep_id; ?>"; 
										$.jGrowl("Item Successfully Return", { header: 'Return Item' });
										</script>
										<?php
										}
										
										?>
									
								
		                            </div>
		                        </div>
		                        <!-- /block -->
		                    </div>
		                </div>
            </div>	
<script>
	jQuery(document).ready(function(){
		jQuery("#opt11").hide();
		jQuery("#opt12").hide();
		jQuery("#opt13").hide();		

		jQuery("#qtype").change(function(){	
			var x = jQuery(this).val();			
			if(x == '1') {
				jQuery("#opt11").show();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
			} else if(x == '2') {
				jQuery("#opt11").hide();
				jQuery("#opt12").show();
				jQuery("#opt13").hide();
			}
		});
		
	});
</script>			
		<?php include('footer.php'); ?>  
		 </div>
		<?php include('script.php'); ?>
    </body>
</html>