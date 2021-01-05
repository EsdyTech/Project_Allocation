<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['dep_id']; ?><!-----------------------------------get device location details------------------------------------>	
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('item_location_slidebar.php'); ?>
                <div class="span9" id="content">				    
					 <a href="item_department.php" class="btn btn-info"  id="return" data-placement="right" title="Click to return" ><i class="icon-arrow-left icon-large"></i> Back</a>
					  <script type="text/javascript">
		              $(document).ready(function(){
		              $('#return').tooltip('show');
		              $('#return').tooltip('hide');
		              });
		             </script>

                        
					    <!-----------------------------------sc logo for print------------------------------------>	
						<h2 id="sc" align="center"><image src="images/sclogo.png" width="45%" height="45%"/></h2>

               <!-------------------------------block ------------------------------>
			<?php $location_query = mysql_query("select * from department	                     
	                     where dep_id = '$get_id'")or die(mysql_error());
	                     $location_row = mysql_fetch_array($location_query);
	         ?>
            <div id="block_bg" class="block">
                  <div class="navbar navbar-inner block-header">
							  <div class=" pull-left"><i class="icon-building"></i> Department <?php echo $location_row['dep_name']; ?> </div>
							  
                                <div class="pull-right" id="">
								<?php 
								$my_device = mysql_query("select * from release_details    
	                             LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 where dep_id = '$get_id' and remarks=' / Brand new'
	                             ORDER BY release_details.release_details_id DESC ")or die(mysql_error());
								$count_my_device = mysql_num_rows($my_device);?>
								Number of Device: <span class="badge badge-info"><?php echo $count_my_device; ?></span>							
								</div>					
                    </div>
							
<!-----------------------------------for Print display visible------------------------------------>								
<h4 id="sc">Location:<?php echo $location_row['dep_name']; ?> all Item List
<div align="right" id="sc">Date:
<?php
 $date = new DateTime();
 echo $date->format('l, F jS, Y');
 ?></div>
</h4>

 <!-----------------------------------device categorized by their location details using nav pills------------------------------------>	
	
<div class="block-content collapse in">
     <div class="empty">
	     <div class="pull-left">
	       <ul class="nav nav-pills">
		      <?php	
	           $count_item=mysql_query("select * from release_details    
	                             LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 where dep_id = '$get_id' and remarks=' / Brand new'
	                             ORDER BY release_details.release_details_id DESC ");
	           $count = mysql_num_rows($count_item);
               ?>
		      <li class="active">
			     <a href="myitem.php<?php echo '?dep_id='.$get_id; ?>">Brand New&nbsp;<span class="label label-default"> <?php echo $count;?></span></a>
		      </li>
              
			<?php	
	           $count_item1=mysql_query("select * from release_details    
	                             LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 where dep_id = '$get_id' and remarks='/ Re-used'	  
	                             ORDER BY release_details.release_details_id DESC ");
	           $count1 = mysql_num_rows($count_item1);
               ?>
			   <li class="">
					<a href="myitem_reuse.php<?php echo '?dep_id='.$get_id; ?>">Re-Used Item&nbsp;<span class="label label-default"> <?php echo $count1;?></span></a>
				</li>
	
			</ul>
	     </div>
      
	     <div class="pull-right">
        <?php
         $my_device = mysql_query("select * from release_details    
	                             LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 where dep_id = '$get_id' and remarks=' / Brand new'
	                             ORDER BY release_details.release_details_id DESC ")or die(mysql_error());
         while($row = mysql_fetch_array($my_device));
		$release_details_id=$row['release_details_id'];
		 $id=$row['release_id'];
		 $client_id = $row['client_id'];
		 $item_id = $row['item_id']; 
		 
         ?>
		   <a class="btn btn-info" id="print" data-placement="left" title="Click to Print" href="print_list_inventory.php<?php echo '?dep_id='.$get_id; ?>" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a>		      
		   <script type="text/javascript">
		     $(document).ready(function(){
		     $('#print').tooltip('show');
		     $('#print').tooltip('hide');
		     });
		   </script>        	   
         </div>
      </div>
    </div> 

<div class="block-content collapse in">
<div class="span12">
	<form action="" method="post"><!-----------------------------------table form------------------------------------>	
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
					<th class="empty">Manage Item</th>
		    </tr>
		</thead>
<tbody>
<!-----------------------------------table Content------------------------------------>									
 <?php
$my_device = mysql_query("select * from release_details    
	                             LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 where dep_id = '$get_id' and remarks=' / Brand new'
	                             ORDER BY release_details.release_details_id DESC ")or die(mysql_error());
while($row = mysql_fetch_array($my_device)){
	     $release_details_id=$row['release_details_id'];
		 $id=$row['release_id'];
		 $client_id = $row['client_id'];
		 $item_id = $row['item_id'];	                                               
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
			<td><div class="alert alert-success"><?php echo $location_row['dep_name']; ?></td>
			
			<?php include('toolttip_edit_delete.php'); ?>
             <td width="185" class="empty">
			 <a rel="tooltip"  title="Return Item" id="e<?php echo $item_id; ?>" href="return.php<?php echo '?item_id='.$item_id; ?>&<?php echo 'client_id='.$client_id; ?>&<?php echo 'dep_id='.$get_id; ?>"<?php echo (($row['release_status'] == 'Returned' )) ? "disabled onclick='return false;'" : ""; ?> class="btn btn-warning"><i class="glyphicon glyphicon-check icon-white"></i> Returned </a>
			 <a rel="tooltip"  title="Transfer Employee with Item Borrow" id="t<?php echo $item_id; ?>" href="transfer.php<?php echo '?item_id='.$item_id; ?>&<?php echo 'client_id='.$client_id; ?>&<?php echo 'dep_id='.$get_id; ?>"<?php echo (($row['release_status'] == 'Returned' )) ? "disabled onclick='return false;'" : ""; ?> class="btn btn-success"><i class="icon-move"></i> Transfer </a>
			 </td>		
		</tr>
											
	<?php } ?>   
</tbody>
</table>
</form>	
 <!---------------------------------------------------- /block --------------------------------------------->
             </div>
          </div>
        </div>
     </div>
	 <?php include('footer.php'); ?>
  </div>
</div>
</div>
<?php include('script.php'); ?>
</body>