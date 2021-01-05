<!-- Modal -->
<div id="myModal4" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Please check the Item</h3>
	</div>
	<?php
		$query = mysql_query("select * from item where item_id = '$get_id'")or die(mysql_error());
		$row = mysql_fetch_array($query);
		?>
		<div class="modal-body">
					<form method="post" class="form-horizontal" action="return.php" >	
					
					    <div class="control-group">
						<label class="control-label" for="inputPassword">Item Name</label>
							<div class="controls">
								<input type="text" class="span8" value="<?php echo $row['item_name']; ?>" name="item_name" id="inputPassword" placeholder="Item Name" required>
								</div>
						</div>
								
						<div class="control-group">
							<div class="controls">
								<select value="" <?php echo $row['item_status']; ?> name="item_status" required>
									<option>Good condition</option>
									<option>Defective</option>
									</select>								
							</div>
						</div>	

		</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
						<button class="btn btn-info" name="return"><i class="icon-save icon-large"></i> Confirm</button>
					</div>
					</form>
</div>
<!-- end  Modal -->