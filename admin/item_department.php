<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body id="class_div">
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('item_location_slidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">					 					 
						
                        <div class="block">
								<div class="navbar navbar-inner block-header">
								    <div class="muted pull-left"><i class="icon-reorder icon-building"></i> Department Display List</div>
									
						<div id="" class="muted pull-right">
								<?php 
								$my_department = mysql_query("select * from department ")or die(mysql_error());
								$count_my_department = mysql_num_rows($my_department);?>
								Number of Display Department: <span class="badge badge-info"><?php echo $count_my_department; ?></span>
						</div>
								
								</div>								
                            <div class="block-content collapse in">
                                <div class="span12">
									<ul	 id="da-thumbs" class="da-thumbs">
										<?php 
										$query = mysql_query("select * from department")or die(mysql_error());									
										$count = mysql_num_rows($query);
										
										if ($count > 0){
										while($row = mysql_fetch_array($query)){
										$dep_id = $row['dep_id'];
										?>
										
										<li id="del<?php echo $id; ?>">
												<a href="myitem.php<?php echo '?dep_id='.$dep_id; ?>">
													<img src ="<?php echo $row['thumbnails'] ?>" width="130" height="148" class="img-polaroid" alt="">
													<div>
													<span><p><?php echo $row['dep_name']; ?></p></span>
													</div>
												</a>
												
												<?php include('count_item.php') ?>
												<p class="class"><?php echo $row['dep_name']; ?>
												<?php if($not_count == '0'){
				                                 }else{ ?>
					                            <span class="badge badge-success"><?php echo $not_count; ?></span>
				                                 <?php } ?>
												</p>
									    </li>
										<?php } }else{ ?>										
									     <div class="alert alert-info"><i class="icon-info-sign"></i> No Department Currently Added</div>
										<?php  } ?>
									</ul>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>									
                </div>				
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('../Technical Staff/script.php'); ?>
    </body>
