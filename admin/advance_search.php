<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
$item_name = $_POST['item_name'];
$item_serial = $_POST['item_serial'];
?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('advance_search_slidebar.php'); ?>
				<div class="span9" id="content">
                     <div class="row-fluid">
					 
					 <div class="empty">
			 	         <div class="alert alert-success">
                            <strong> Advance Search Result List</strong>
                       </div>
			        </div>
				
					 <h2 id="sc" align="center"><image src="images/sclogo.png" width="45%" height="45%"/></h2>
					 <?php	
	             $count_item=mysql_query("select * from release_details    
	                             LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
		                         where item_name LIKE '%$item_name%' 							
							     and item_serial LIKE '%$item_serial%'");
	             $count = mysql_num_rows($count_item);
                 ?>	 
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Item Search Result List</div>
                          <div class="muted pull-right">
								Number of Search Item : <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
						  </div>
						  
  <h4 id="sc">Device List 
    <div align="right" id="sc">Date:
		<?php
            $date = new DateTime();
             echo $date->format('l, F jS, Y');
        ?></div>
  </h4>
  
<br/>
 	
<div class="block-content collapse in">
    <div class="span12">
	<form action="" method="post">
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<thead>		
		        <tr>			        
					<th>Employee Full Name</th>
					<th>Item Borrow </th>
					<th>Item Code</th>
			        <th>Realease status  </th>
					<th>Item Status / Remarks</th>
					<th>Date Borrow  </th>
					<th>Date Returned   </th>				
                    <th>Department Name </th>
                    					
		    </tr>
		</thead>
<tbody>
<?php
		$search_query = mysql_query("select * from release_details    
	                             LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 LEFT JOIN department ON release_details.dep_id = department.dep_id
		                         where item_name LIKE '%$item_name%' 							
							     and item_serial LIKE '%$item_serial%'")or die(mysql_error());
		while($row = mysql_fetch_array($search_query)){
		$release_details_id=$row['release_details_id'];
		 $id=$row['release_id'];
		 $client_id = $row['client_id'];
		 $item_id = $row['item_id'];
		 $dep_id = $row['dep_id'];
		?>
		<tr>
            <td><?php echo $row['firstname']; ?>
		    <?php echo $row['middlename']; ?>
		    <?php echo $row['lastname']; ?></td>
		    <td> <?php echo $row['item_name']; ?></td>	
			<td><?php echo $row['item_serial']; ?></td>
			<td><?php
			   $release_status_query = mysql_query("select * from release_details ")or die(mysql_error());
		       $dev=mysql_fetch_assoc($release_status_query);
		       if($row['release_status']=='pending')
		       {
			   echo '<div class="alert alert-danger"><i class="icon-ok"> </i><strong>'.$row['release_status'].'</strong></div>'; 
               }
		       else 
			   {
			  echo '<div class="alert alert-success"><i class="icon-ok"></i><strong>'.$row['release_status'].'</strong></div>';
		       };
			  ?>
			</td>
	
		<td><?php
			   $item_status_query = mysql_query("select * from item 
			   LEFT JOIN release_details ON item.item_id = release_details.item_id")or die(mysql_error());
		       $dev=mysql_fetch_assoc($item_status_query);
		       if($row['item_status']=='In-Used')
		       {
			   echo '<div class="alert alert-warning"><i class="icon-ok"> </i><strong>'.$row['item_status'].''.$row['remarks'].'</strong></div>';
		       }
		       else if($row['item_status']=='Good condition')
			   {
			   echo '<div class="alert alert-warning"><i class="icon-ok"></i><strong>'.$row['item_status'].''.$row['remarks'].'</strong></div>';
               }
		       else 
			   {
			  echo '<div class="alert alert-warning"><i class="icon-ok"></i><strong>'.$row['item_status'].'</strong></div>';
		       };
			  ?>
		</td>
            <td><?php echo date("M d, Y H:i:s",strtotime($row['date_borrow'])); ?></td>
			<td><?php echo ($row['date_return'] == "0000-00-00 00:00:00") ? "" : date("M d, Y H:i:s",strtotime($row['date_return'])); ?></td>
			<td><div class="alert alert-success"><?php echo $row['dep_name']; ?></td>
						
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