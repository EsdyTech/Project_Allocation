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
                              <strong>It will redirect Transfer to the Department you select</strong>
                            </div>
			               </div>
						   
						    <?php $location_query = mysql_query("select * from department	                     
	                         where dep_id = '$dep_id'")or die(mysql_error());
	                         $location_row = mysql_fetch_array($location_query);
	                        ?>	
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">From:&nbsp;<?php echo $location_row['dep_name']; ?>&nbsp;Transfer Employee with Item Borrow</div>
										<div class="muted pull-right">
										<a id="return" data-placement="left" title="Click to Return" href="myitem_reuse.php<?php echo '?dep_id='.$dep_id; ?>"><i class="icon-arrow-left"></i> Back</a>
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
									   
												
										<div class="control-group">
		                                  <label class="control-label" for="inputEmail">Transfer TO</label>
			                                <div class="controls">
				                            <select name="dep_id" class="span5" required/>
				                             <option>&larr; Select Department &rarr;</option>
			                                 <?php $result =  mysql_query("select * from department")or die(mysql_error()); 
			                                  while ($row=mysql_fetch_array($result)){ ?>
				                             <option value="<?php echo $row['dep_id']; ?>&nbspName&nbsp<?php echo $row['dep_name']; ?>"><?php echo $row['dep_name']; ?></option>
				                             <?php } ?>
				                           </select>
		                                </div>
	                                   </div>
										
								
										<div class="control-group">
										<div class="controls">
										
										<button id="move" data-placement="right" title="Click to Transfer Employee with Item" name="transfer" type="submit" class="btn btn-success"><i class="icon-move"></i> Transfer</button>
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
										if (isset($_POST['transfer'])){											
										$dep_id = $_POST['dep_id'];										
										mysql_query("update release_details set										           
										dep_id = '$dep_id'													
										where item_id ='$get_id'")or die(mysql_error());
													
										mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username',' $client_id Transfer with Item name $get_id to Department ID $dep_id')")or die(mysql_error());
										?>
										<script>
										window.location = "myitem_reuse.php<?php echo '?dep_id='.$dep_id; ?>"; 
										$.jGrowl("item Transfer Successfully", { header: 'item Transfer' });
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