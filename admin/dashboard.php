<?php 
error_reporting(0);
session_start(); include('header.php'); ?>
<?php
include('session.php');


?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
			 <?php include('dashboard_slidebar.php'); ?>		
                <div class="span9" id="content">
                    <div class="row-fluid">
         	         <?php 
                      $query = mysqli_query($con,"select * from adminlogin where  id ='$adminid'");
                        $row = mysqli_fetch_array($query);			
			         ?>
                    <div class="col-lg-12">
                      <div class="alert alert-success alert-dismissable">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <img id="avatar1" class="img-responsive" src="<?php echo $row['pic']; ?>"><strong> Welcome! <?php echo $row['surname']." ".$row['firstname'];  ?></strong>
                      </div>
                    </div>
     
                        <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>PROJECT ALLOCATION AND MANAGEMENT SYSTEM (ADMINISTRATOR DASHBOARD)</div>
                            <div class="muted pull-right"><i class="icon-time"></i>&nbsp;<?php include('time.php'); ?></div>
                        </div>
                        <div class="block-content collapse in">
                                <div class="span12">
                                
                        <div class="block-content collapse in">
                        <div id="page-wrapper">
                                    
                                    
        
        
                <!-- <div class="row-fluid">				
                    <div class="span6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                        <i class="fa fa-desktop fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $stocks; ?></div>
                                        <div>All Stocked</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href=".php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div> -->
				
                
                
                
<!--                 
                     <div class="span6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                      <i class="fa fa-share-square fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $result;?></div>
                                        <div>Availabe New Item</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href=".php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>
				 </div>
 </div> 				 							 -->
<div id="page-wrapper">
           <div class="row-fluid">
		   
           
           
           
<!--            
			 <div class="span6">
                       <div class="panel panel-green">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                      <i class="fa fa-share-square fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $reuse;?></div>
                                        <div>Availabe Re-Used Item</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href=".php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div> -->
                    <?php
                      $query = mysqli_query($con,"select * from lecturer");
                        $countLecturers = mysqli_num_rows($query);			
			         ?>
                    <div class="span6">
                    <div class="panel panel-green">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                       <i class="fa fa-group fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $client;?></div>
                                        <div>Registered Lecturers</div><br/>
                                        <div><h2><?php echo  $countLecturers;?></h2></div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="reg_lecturer.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>   				
             
        
        
                 
                     <?php
                      $query = mysqli_query($con,"select * from students");
                        $countStudents = mysqli_num_rows($query);				
			         ?>
					<div class="span6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                       <i class="fa fa-group fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $client;?></div>
                                        <div>Registered Students</div><br/>
                                        <div><h2><?php echo  $countStudents;?></h2></div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="reg_students.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>   				
              </div>	       
        </div>  	
        <div id="page-wrapper">
           <div class="row-fluid">
		
        
        
          
                    <?php
                      $query = mysqli_query($con,"select * from assign_students");
                        $countAssign = mysqli_num_rows($query);					
			         ?>
			<div class="span6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                       <i class="fa icon-ok  fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $Realease;?></div>
                                        <div>Assigned Students-Lecturers</div><br/>
                                        <div><h2><?php echo  $countAssign;?></h2></div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="assign_students.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>
			
            
            
            			<?php
                      $query = mysqli_query($con,"select * from topics");
                        $countTopics = mysqli_num_rows($query);					
			         ?>		
					<div class="span6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                         <i class="fa fa-desktop fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $return;?></div>
                                        <div>Added Topics</div><br/>
                                        <div><h2><?php echo  $countTopics;?></h2></div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="reg_topics.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>         			  
      </div>
 </div>
 


               
				
				
			                 </div>
                            </div>
                        </div>
                        <!-- /block -->
						
                    </div>
                    </div>
                 
                </div>
            </div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>
