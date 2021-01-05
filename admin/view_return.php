<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('transaction_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">

					     <!-----------------------------------sc logo for print------------------------------------>	
						<h2 id="sc" align="center"><image src="images/sclogo.png" width="45%" height="45%"/></h2>
		
				<?php	
	             $count_item=mysql_query("select * from release_details 
				                 LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
		                        where release_status='Returned' and  remarks=' / Brand new' ORDER BY release_details.release_details_id DESC");
	             $count = mysql_num_rows($count_item);
                 ?>	
						
            <!-------------------------------block ------------------------------>
            <div id="block_bg" class="block">
                  <div class="navbar navbar-inner block-header">							
								    <div class="muted pull-left"><i class="icon-reorder icon-building"></i> Return Item List</div>
                                <div id="" class="muted pull-right">
								<?php 
								$return_item = mysql_query("select * from release_details 
				                 LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
		                        where release_status='Returned'ORDER BY release_details.release_details_id DESC")or die(mysql_error());
								$count_my_item = mysql_num_rows($return_item);?>
								Number of Item Return: <span class="badge badge-info"><?php echo $count_my_item; ?></span>
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
						 
<!-----------------------------------device categorized by their Item status using nav pills------------------------------------>	
	
<div class="container-fluid">
 <div class="row-fluid">
 <br/> 
	<div class="pull-left">
	    <ul class="nav nav-pills">
		     <?php	
		     $count_item=mysql_query("select * from release_details 
				                 LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 LEFT JOIN department ON release_details.dep_id=department.dep_id
		                        where release_status='Returned' and  remarks=' / Brand new' ORDER BY release_details.release_details_id DESC");
	           $count = mysql_num_rows($count_item);
               ?>
		      <li class="active">
			     <a href="view_return.php">All&nbsp;<span class="label label-default"> <?php echo $count;?></span></a>
		      </li>
		
		     <?php	
	           $count_item=mysql_query("select * from release_details 
				                 LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 LEFT JOIN department ON release_details.dep_id=department.dep_id
		                       where release_status='Returned' and item_status = 'Good condition' and remarks=' / Brand new' ORDER BY release_details.release_details_id DESC");
	           $count = mysql_num_rows($count_item);
               ?>					
				<li class="">
					<a href="good_condition.php">Good Condition&nbsp;<span class="label label-default"> <?php echo $count;?></span></a>
				</li>
				
				<?php	
	           $count_item=mysql_query("select * from release_details 
				                 LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 LEFT JOIN department ON release_details.dep_id=department.dep_id
		                        where release_status='Returned' and item_status = 'Defective' and remarks=' / Brand new' ORDER BY release_details.release_details_id DESC");
	           $count = mysql_num_rows($count_item);
               ?>					
				<li class="">
					<a href="defective.php">Defective&nbsp;<span class="label label-default"> <?php echo $count;?></span></a>
				</li>
				
			</ul>
	  </div> 
	  
	  	<div class="pull-right">
	    <ul class="nav nav-pills">
		        <?php	
	           $count_item=mysql_query("select * from release_details 
				                 LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 LEFT JOIN department ON release_details.dep_id=department.dep_id
		                        where release_status='Returned' and  remarks=' / Brand new' ORDER BY release_details.release_details_id DESC");
	           $count = mysql_num_rows($count_item);
               ?>
		      <li class="active">
			     <a href="view_return.php">Brand New&nbsp;<span class="label label-default"> <?php echo $count;?></span></a>
		      </li>
			  
		       <?php	
	           $count_item=mysql_query("select * from release_details 
				                 LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 LEFT JOIN department ON release_details.dep_id=department.dep_id
		                        where release_status='Returned' and  remarks='/ Re-used' ORDER BY release_details.release_details_id DESC");
	           $count = mysql_num_rows($count_item);
               ?>		     			
				<li class="">
					<a href="view_reuse_returned_item.php">Re-Used Item&nbsp;<span class="label label-default"> <?php echo $count;?></span></a>
				</li>
               
			   
			</ul>
	  </div>
	  
	</div> 
</div> 
		
<div class="container-fluid">
  <div class="row-fluid"> 
     <div class="empty">
	     <div class="pull-right">
		   <a href="print_all_stock.php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a> 		      
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
	<form action="" method="post"><!-----------------------------------table form------------------------------------>	
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<thead>		
		     <tr>			        
					
					<th>Employee Full Name</th>
					<th>Item Borrow </th>
					<th>Item Code</th>
			        <th>Realease status  </th>
					<th>Item Status  </th>
					<th>Date Borrow  </th>
					<th>Date Returned   </th>				
                    <th>Department Name </th>
					
		    </tr>
		</thead>
<tbody>
<!-----------------------------------table Content------------------------------------>									
 <?php
$returne_item = mysql_query("select * from release_details 
				                 LEFT JOIN item ON release_details.item_id = item.item_id
	                             LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
								 LEFT JOIN client ON tbl_release.client_id=client.client_id
								 LEFT JOIN department ON release_details.dep_id=department.dep_id								 
		                        where release_status='Returned' and  remarks=' / Brand new' ORDER BY release_details.release_details_id DESC")or die(mysql_error());
while($row = mysql_fetch_array($returne_item)){
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
			   LEFT JOIN release_details ON item.item_id = release_details.item_id
			   where release_status='Returned' and  remarks=' / Brand new' ")or die(mysql_error());
		       $dev=mysql_fetch_assoc($item_status_query);
		       if($row['item_status']=='Good condition')
			   {
			   echo '<div class="alert alert-warning"><i class="icon-ok"></i><strong>'.$row['item_status'].''.$row['remarks'].'</strong></div>';
               }
		       else 
			   {
			  echo '<div class="alert alert-danger"><i class="icon-wrench"></i><strong>'.$row['item_status'].'</strong></div>';
		       };
			  ?>
		</td>
            <td><?php echo date("M d, Y H:i:s",strtotime($row['date_borrow'])); ?></td>
			<td><?php echo ($row['date_return'] == "0000-00-00 00:00:00") ? "" : date("M d, Y H:i:s",strtotime($row['date_return'])); ?></td>
			<td><div class="alert alert-success"><?php echo $row['dep_name']; ?></div></td>
			
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
  </div>
</div>
<?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
</body>