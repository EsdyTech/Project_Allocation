<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('transaction_sidebar.php'); ?>
			    
				  <div class="span9" id="content">
                     <div class="row-fluid">
				  
					 <h2 id="sc" align="center"><image src="images/sclogo.png" width="45%" height="45%"/></h2>
				<?php	
	             $count_item=mysql_query("select * from item 	
							 where NOT EXISTS
							(select * from release_details where item.item_id = release_details.item_id)
		                     and item_status='new'
							 OR NOT EXISTS 
	                        (select * from release_details where item.item_id = release_details.item_id)
		                     and item_status = 'Good condition'
							 ORDER BY item.item_id DESC");
	             $count = mysql_num_rows($count_item);
                 ?>		                 					 
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-check"></i>&nbsp;Available Item List</div>
							 <div class="muted pull-right">
								Number of Available Item (s): <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                        </div>
						  
				<h4 id="sc">Available Item (s) List
					<div align="right" id="sc">Date:
						<?php
                            $date = new DateTime();
                            echo $date->format('l, F jS, Y');
                         ?></div>
				 </h4>		  
						   	 

<div class="block-content collapse in">
   <div class="span12">
	
<form id="send" method="post">	
<div class="empty">
    <div class="control-group">
		 <label class="control-label" for="inputEmail">Employee Name</label>
			 <div class="controls">
				  <select name="client_id" class="chzn-select" required/>
				    <option></option>
			          <?php $result =  mysql_query("select * from client")or die(mysql_error()); 
			          while ($row=mysql_fetch_array($result)){ ?>
				   <option value="<?php echo $row['client_id']; ?>&nbspName&nbsp<?php echo $row['dep_name']; ?>"><?php echo $row['firstname']; ?>&nbsp<?php echo $row['middlename']; ?>&nbsp<?php echo $row['lastname']; ?></option>
				    <?php } ?>
				   </select>
		    </div>
	</div>
	
	<div class="pull-right">
	       <ul class="nav nav-pills">
		      <?php	
	           $count_item=mysql_query("select * from item		                   
							 where NOT EXISTS
							(select * from release_details where item.item_id = release_details.item_id)
		                     and item_status='new'							
							 ORDER BY item.item_id DESC") ;
	           $count = mysql_num_rows($count_item);
               ?>
		      <li class="active">
			     <a href="realease.php">Brand New&nbsp;<span class="label label-default"> <?php echo $count;?></span></a>
		      </li>
              
			  <?php	
	           $count_item=mysql_query("select * from item		                   
							 where NOT EXISTS
							(select * from release_details where release_status = 'pending' and item.item_id = release_details.item_id)
		                     and item_status='Good condition'	
							 ORDER BY item.item_id DESC");
	           $count = mysql_num_rows($count_item);
               ?>
			   <li class="">
					<a href="reuse.php">Re-Used Item&nbsp;<span class="label label-default"> <?php echo $count;?></span></a>
				</li>
	
			</ul>
	  </div>	

	<div class="control-group">
		 <label class="control-label" for="inputEmail" >Department Name</label>
			 <div class="controls">
				  <select name="dep_id" class="chzn-select" required/>
				    <option></option>
			          <?php $result =  mysql_query("select * from department")or die(mysql_error()); 
			          while ($row=mysql_fetch_array($result)){ ?>
				   <option value="<?php echo $row['dep_id']; ?>&nbspName&nbsp<?php echo $row['dep_name']; ?>"><?php echo $row['dep_name']; ?></option>
				    <?php } ?>
				   </select>
		    </div>
	</div>
	
					 
	
	  
		  
	  <div class="control-group"> 
		<div class="controls">
		<button  class="btn btn-primary" id="snd" data-placement="right" title="Click to Release"><i class="icon-share"> Release Item</i></button>
         <script type="text/javascript">
	     $(document).ready(function(){
	     $('#snd').tooltip('show');
	     $('#snd').tooltip('hide');
	     });
	    </script>
			 		 
		 <div class="pull-right">
	      <a href="print_new.php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a> 
		       <script type="text/javascript">
		       $(document).ready(function(){
		       $('#print').tooltip('show');
		       $('#print').tooltip('hide');
		       });
		        </script> 	
         </div>
	  </div>
 </div>
</div>                      
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<thead>		
		        <tr>
				    <th class="empty"></th>
					<th>Item Name</th>
					<th>Item Description </th>
					<th>Inventory Code</th>
			        <th>Item Brand  </th>					
					<th>Item Status  </th>                  	                   					              		  
		    </tr>
		</thead>
<tbody>
<!-----------------------------------Content------------------------------------>
	
		<?php
	    $release_query = mysql_query("select * from item		                   
							where NOT EXISTS
							(select * from release_details where item.item_id = release_details.item_id)
		                     and item_status='new'							
							 ORDER BY item.item_id DESC")   or die (mysql_error());
							 while ($row= mysql_fetch_array ($release_query) ){
	                         $id=$row['item_id'];		 
		                    		
		?>
										
		<tr>
		<td width="30" class="empty">
			<input id="" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>&nbspName&nbsp<?php echo $item_name; ?>" >
		</td>
			<td><?php echo $row['item_name']; ?></td>
			<td><?php echo $row['item_description']; ?></td>
			<td><?php echo $row['item_serial']; ?></td>
			<td><?php echo $row['item_brand']; ?></td>			
			<td><div class="alert alert-success"><i class="icon-check"></i><strong><?php echo $row['item_status']; ?></strong></div></td>		
		</tr>
											
	<?php } ?>   

</tbody>
</table>
</form>	
<script>
		jQuery(document).ready(function(){
		jQuery("#send").submit(function(e){
			e.preventDefault();{												
			var formData = jQuery(this).serialize();
			$.ajax({
			type: "POST",
			url: "send.php",
			data: formData,
			success: function(html){
					
			$.jGrowl("Item Successfully Borrow", { header: 'Item Borrow' });
			var delay = 500;
			setTimeout(function(){ window.location = 'item_department.php'  }, delay);  
						
			}
												
		 });
			
	   }
	});
});
</script>
				  		
</div>
</div>

</div>
</div>
</div>

	
<?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
 </body>
</html>