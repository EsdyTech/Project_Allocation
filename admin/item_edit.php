<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('item_sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
									<a href="add_item.php" class="btn btn-info"  id="add" data-placement="right" title="Click to Add Item" ><i class="icon-plus-sign icon-large"></i> Add Item</a>
					                <script type="text/javascript">
		                             $(document).ready(function(){
		                             $('#add').tooltip('show');
		                             $('#add').tooltip('hide');
		                              });
		                            </script> 
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Edit Device</div>
										<div class="muted pull-right"><a id="return" data-placement="left" title="Click to Return" href="item.php"><i class="icon-arrow-left icon-large"></i> Back</a></div>
																<script type="text/javascript">
																$(document).ready(function(){
																	$('#return').tooltip('show');
																	$('#return').tooltip('hide');
																});
																</script>     
		                            </div>
		                            <div class="block-content collapse in">									
									
									<?php
									$query = mysql_query("select * from item where item_id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									    <form class="form-horizontal" method="post">
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Item Name</label>
											<div class="controls">
											<input type="text" class="span8" value="<?php echo $row['item_name']; ?>" name="item_name" id="inputPassword" placeholder="Item Name" required>
											</div>
										</div>

										<div class="control-group">
										<label class="control-label" for="inputPassword">Item Brand</label>
											<div class="controls">
											<input type="text" class="span8" value="<?php echo $row['item_brand']; ?>" name="item_brand" id="inputPassword" placeholder="Item Brand" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Inventory Code/Serial</label>
											<div class="controls">
											<input type="text" class="span8" value="<?php echo $row['item_serial']; ?>" name="item_serial" id="inputPassword" placeholder="Inventory Code or Serial" required>
											</div>
										</div>
										
										<div id="hide">
										<div class="control-group">
											<label class="control-label" for="inputPassword"  placeholder="Item Status" >Item Status</label>
											<div class="controls">
											<select value="" name="item_status" required>
													<option><?php echo $row['item_status']; ?></option>													
												</select>								
											</div>
										</div>
									   </div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Item Description</label>
											<div class="controls">
													<textarea name="item_description" id="ckeditor_full">
													<?php echo $row['item_description']; ?>
													</textarea>
											</div>
										</div>
										
										<div class="control-group">
										<div class="controls">
										
										<button id="update" data-placement="right" title="Click to update" name="update" type="submit" class="btn btn-info"><i class="icon-save icon-large"></i> Update</button>
										</div>
										</div>
										<script type="text/javascript">
										$(document).ready(function(){
										$('#update').tooltip('show');
										$('#update').tooltip('hide');
										});
										</script> 
										</form>
										
										<?php
										if (isset($_POST['update'])){
                                        $item_name = $_POST['item_name'];
                                        $item_brand = $_POST['item_brand'];
                                        $item_serial = $_POST['item_serial'];
                                        $item_status = $_POST['item_status'];
                                        $item_description = $_POST['item_description'];
										
										
									
										mysql_query("update item set    item_name = '$item_name',
																		item_brand  = '$item_brand',
																		item_serial = '$item_serial',
																		item_status = '$item_status',
																		item_description = '$item_description'
																		where item_id = '$get_id' ")or die(mysql_error());
																										
									    mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Edit item info $item_name $item_serial')")or die(mysql_error());
										?>
										<script>										
										window.location = "item.php";
										$.jGrowl("Item Successfully Update", { header: 'Item update' });
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