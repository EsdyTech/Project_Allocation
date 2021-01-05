<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('item_sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Add Device</div>
										<div class="muted pull-right"><a id="return" data-placement="left" title="Click to Return" href="item.php"><i class="icon-arrow-left icon-large"></i> Back</a></div>
										<script type="text/javascript">
										$(document).ready(function(){
										$('#return').tooltip('show');
										$('#return').tooltip('hide');
										});
										</script>                          
		                            </div>
									
		                <div class="block-content collapse in">	
                         <div class="alert alert-success"><i class="icon-info-sign"></i> Please Fill in required details</div>						
							<form class="form-horizontal" method="post">											
								
										<div class="control-group">
											<label class="control-label" for="inputPassword">Item Name</label>
											<div class="controls">
											<input type="text" class="span8" name="item_name" id="inputPassword" placeholder="Item Name" required>
											</div>
										</div>
											
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Item Brand</label>
											<div class="controls">
											<input type="text" class="span8" name="item_brand" id="inputPassword" placeholder="Item Brand" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Inventory Code/Serial</label>
											<div class="controls">
											<input type="text" class="span8" name="item_serial" id="inputPassword" placeholder="Inventory Code or Serial" required>
											</div>
										</div>
										
										<div id="hide">
										<div class="control-group">
											<label class="control-label" for="inputPassword"  placeholder="Item Status" >Item Status</label>
											<div class="controls">
											<select name="item_status"  required>										
													<option>New</option>																									
												</select>								
											</div>
										</div>
										</div>
												
										<div class="control-group">
											<label class="control-label" for="inputPassword">Item Description</label>
											<div class="controls">
													<textarea name="item_description" id="ckeditor_full" required ></textarea>
											</div>
										</div>
											
										<div class="control-group">
										<div class="controls">
										<button name="save" id="save" name="singlebutton" data-placement="right" title="Click here to Save your new data." class="btn btn-primary"><i class="icon-save"></i> Save</button>				
										</div>
										</div>
										<script type="text/javascript">
										$(document).ready(function(){
										$('#save').tooltip('show');
										$('#save').tooltip('hide');
										});
										</script>
							</form>
<?php
if (isset($_POST['save'])){
$item_id = $_POST['item_id'];
$item_name = $_POST['item_name'];
$item_brand = $_POST['item_brand'];
$item_serial = $_POST['item_serial'];
$item_status = $_POST['item_status'];
$item_description = $_POST['item_description'];
										
						
$query = mysql_query("select * from item where item_serial = '$item_serial' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Item Code Already Exist');
window.location = "item.php";
</script>
<?php
}else{
mysql_query("insert into item (item_id,item_name,item_brand,item_serial,item_status,item_description) values('$item_id','$item_name','$item_brand','$item_serial','$item_status','$item_description')")or die(mysql_error());
mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Add Item $item_name $item_brand')")or die(mysql_error());											
?>
<script>
window.location = "item.php";
$.jGrowl("Item Successfully added", { header: 'Item add' });
</script>
<?php
}
}
?>
																										
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