<?php include('header.php'); ?>
<?php include('session.php'); ?>
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
					 <div id="sc" align="center"><image src="images/sclogo.png" width="45%" height="45%"/></div>
				<?php	
	             $count_item=mysql_query("select * from item");
	             $count = mysql_num_rows($count_item);
                 ?>	 
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Item Stock (s) List</div>
                          <div class="muted pull-right">
								Number of All Item: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
						  </div>
						  
                 <h4 id="sc">Item Stock List 
					<div align="right" id="sc">Date:
						<?php
                            $date = new DateTime();
                            echo $date->format('l, F jS, Y');
                         ?></div>
				 </h4>

<br>				 
<div class="container-fluid">
  <div class="row-fluid"> 
     <div class="empty">
	 
	 <div class="pull-left">
	       <ul class="nav nav-pills">
		      <?php	
	           $count_item=mysql_query("select * from item	
		       ORDER BY item.item_id DESC");
	           $count = mysql_num_rows($count_item);
               ?>
		      <li class="active">
			     <a href="item.php">Brand New&nbsp;<span class="label label-default"> <?php echo $count;?></span></a>
		      </li>
              
			  <?php	
	           $count_item1=mysql_query("select * from release_details where remarks='/ Re-used'	
		       ORDER BY release_details.release_details_id DESC");
	           $count1 = mysql_num_rows($count_item1);
               ?>
			 
			   <li class="">
					<a href="reuse_item.php">Re-Used Item&nbsp;<span class="label label-default"> <?php echo $count1;?></span></a>
				</li>
	
			</ul>
	     </div>
		 
	     <div class="pull-right">
		   <a href=".php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a> 		      
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
	
<div class="block-content collapse in">
    <div class="span12">
	<form action="" method="post">
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<thead>		
		        <tr>			        
					<th class="empty"></th>
					<th>Item Name</th>
					<th>Item Description </th>
					<th>Inventory Code</th>
			        <th>Item Brand  </th>					
					<th>Item Status / Remarks </th>					
					<th>Item Realease Status  </th>
                    <th class="empty"></th>					
		    </tr>
		</thead>
<tbody>
<!-----------------------------------Content------------------------------------>
<?php
		$device_query = mysql_query("select * from item					    
		ORDER BY item.item_id DESC")or die(mysql_error());
		while($row = mysql_fetch_array($device_query)){
		$id = $row['item_id'];
?>
										
		<tr>
		<td><?php
			   $device_query2 = mysql_query("select * from item 
		       ORDER BY item.item_id DESC ")or die(mysql_error());
		       $dev=mysql_fetch_assoc($device_query2);
		       if($row['item_status']=='New')
		       {
			   echo '<i class="icon-check"></i><div id="hide"><strong>'.$row['item_status'].'</strong></div>';
		       }
		       else if($row['item_status']=='In-Used')
			   {
			   echo '<i class="icon-ok"></i><div id="hide"> <strong>'.$row['item_status'].'</strong></div>';
		       }
			   else if($row['item_status']=='Good condition')
			   {
			   echo '<i class="icon-ok"></i><div id="hide"><strong>'.$row['item_status'].'</strong></div>';
		       }
			   else
			   {
			   echo '<i class="icon-ok"></i><div id="hide"><strong>'.$row['item_status'].'</strong></div>';
		       };
			  ?>
		</td>
			<td><?php echo $row['item_name']; ?></td>
			<td><?php echo $row['item_description']; ?></td>
			<td><?php echo $row['item_serial']; ?></td>
			<td><?php echo $row['item_brand']; ?></td>					
			<td><?php
			   $device_query1 = mysql_query("select * from release_details
		       where item_id ='$id' and remarks =' / Brand new'
		       ORDER BY release_details.release_details_id DESC")or die(mysql_error());
		       $dev1=mysql_fetch_assoc($device_query1);
		       if($row['item_status']=='New')
		       {
			   echo '<div class="alert alert-success"><i class="icon-check"></i><strong>'.$row['item_status'].'</strong></div>';
		       }
		       else if($row['item_status']=='In-Used')
			   {
			   echo '<div class="alert alert-warning"><i class="icon-ok"> </i><strong>'.$row['item_status'].''.$dev1['remarks'].'</strong></div>';
			   }
			   else if ($row['item_status']=='Good condition')
			   {
			   echo '<div class="alert alert-warning"><i class="icon-ok"></i><strong>'.$row['item_status'].''.$dev1['remarks'].'</strong></div>';
		       }
			    else
			   { 
			   echo '<div class="alert alert-danger"><i class="icon-wrench"></i><strong>'.$row['item_status'].' </strong></div>';
		       };
			   
			  ?></td>
 <?php
		$device_query12 = mysql_query("select * from release_details
		where item_id ='$id' and remarks =' / Brand new'
		ORDER BY release_details.release_details_id DESC")or die(mysql_error());
		$dev2=mysql_fetch_assoc($device_query12);		
?>
			 <td><?php echo $dev2['release_status']; ?></td>
			<?php include('toolttip_edit_delete.php'); ?>												
			<td class="empty" width="80"><a rel="tooltip"  title="Edit item" id="i<?php echo $id; ?>" href="item_edit.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"> Edit</i></a></td>
		</tr>
											
	<?php } ?>   

</tbody>
</table>
</form>		
		
			  		
</div>
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