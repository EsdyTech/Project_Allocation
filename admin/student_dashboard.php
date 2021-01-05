<?php 
error_reporting(0);

session_start(); 
include('header.php'); ?>
<?php
include('session.php');

?>
    <body>
		<?php include('student_navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
			 <?php include('student_slidebar.php'); ?>		
                <div class="span9" id="content">
                    <div class="row-fluid">
         	         <?php $query= mysqli_query($con,"select * from students where matricno = '$matricno'")or die(mysqli_error());
			         $row = mysqli_fetch_array($query);	
					 $level=$row['level'];		
			         ?>
                    <div class="col-lg-12">
                      <div class="alert alert-success alert-dismissable">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <img id="avatar1" class="img-responsive" src="<?php echo $row['pic']; ?>"><strong> Welcome! <?php echo $row['surname']." ".$row['firstname']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MATRIC NUMBER&nbsp;&nbsp;:&nbsp;&nbsp;".$row['matricno'];  ?></strong>
                      </div>
                    </div>
     
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>STUDENTS DASHBOARD</div>
								<div class="muted pull-right"><i class="icon-time"></i>&nbsp;<?php include('time.php'); ?></div>
                            </div>
                            <div class="block-content collapse in">
							        <div class="span12">
                <?php    
                $qus= mysqli_query($con,"select * from project_chapters WHERE studentId='$matricno' and status2 = 'Ongoing'")or die(mysqli_error());
			         $rowsss = mysqli_fetch_array($qus);	
                           $reuses= mysqli_num_rows($qus);
                           
                           if ($reuses > 0){
                           ?>					

             <font color='Green'><h2> New Chapter Activated:&nbsp; <?php echo $rowsss['chapter'];?></h2></font>
<div class="block-content collapse in">
<div id="page-wrapper">
                           <?php } else {}?>
        <?php 
                     
                           $querys= mysqli_query($con,"select * from student_topics WHERE studentId ='$matricno' and status='Approved'")or die(mysqli_error());
			         $rowss = mysqli_fetch_array($querys);	
					 	  $count = mysqli_num_rows($querys);	
			         ?>
        
        
                <div class="row-fluid">				
                    <div class="span6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                        <i class="fa fa-desktop fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $count; ?></div>
                                        <div>Project Approved Topic</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="student_topics.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>
				
                
                <?php $querysi= mysqli_query($con,"select * from project_writeups WHERE studentId='$matricno'")or die(mysqli_error());
			         $rows = mysqli_fetch_array($querys);	
					 	  $result = mysqli_num_rows($querysi);	
			         ?>
                
                
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
                                        <div>Number of Writeups Submitted</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="student_chapters.php">							  
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
		   
           
           <?php $qu= mysqli_query($con,"select * from project_chapters WHERE studentId='$matricno' and status2 = 'Completed'")or die(mysqli_error());
			         $rowss = mysqli_fetch_array($qu);	
                           $reuse = mysqli_num_rows($qu);	
                           
                        
			         ?>
           
           
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
                                        <div>Number of Chapters Completed</div><br/>
                                        
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="student_chapters.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>
		
        <?php $qur= mysqli_query($con,"select * from sub_assignments WHERE stud_matricno='$matricno'")or die(mysqli_error());
			         $rowii= mysqli_fetch_array($qur);	
					 	  $client = mysqli_num_rows($qur);	
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
                                        <div class="huge"><?php ?></div>
                                        <div>Students Profile</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="student_editprofile.php">							  
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
