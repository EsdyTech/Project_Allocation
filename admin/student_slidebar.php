     <div class="span3" id="sidebar" >
     <?php $querys= mysqli_query($con,"select * from students where matricno = '$matricno'")or die(mysqli_error());
							  $rows = mysqli_fetch_array($querys);
						?>
	              <img id="admin_avatar" class="img-polaroid" src="<?php echo $rows['pic'];?>"> 
                  <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" >
                           <li class="active" > 
					<a href="student_dashboard.php" style="background-color:#00CC66"><i class="icon-chevron-right"></i><i class="icon-home icon-large"></i>&nbsp;Dashboard</a> 
						   </li>
						 
						 <!------/.* manage device sidebar*------->						
						 <li >						
						    <a href="javascript:;"  role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs"><i class="icon-chevron-right" ></i><i class="icon-folder-open-alt icon-large" ></i>&nbsp;Project
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs" class="collapse">	
                            
														<li class="">
                  <a href="student_topics.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>Topics/Proposals </a>
                            </li> 			
														<li class="">
                  <a href="student_chapters.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>Writeups </a>
                            </li> 			
														<li class="">
                  <a href="student_software.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>Software </a>
                            </li> 					
                            <!-- <li class="">
            <a href="student_grade.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>Assignment Scores</a>
                            </li> -->
						    </ul>
						</li>
						
						
						 <!------/.* manage department sidebar*------->	
						  <li class="">						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs1"><i class="icon-chevron-right"></i><i class="icon-sitemap icon-large"></i>&nbsp;Supervisor
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs1" class="collapse">						
                            <li class="">
                         <a href="student_viewsupervisor.php"><i class="icon-chevron-right"></i><i class="icon-reorder icon-building"></i>View</a>
                            </li> 
														<!-- <li class="">
                         <a href="student_messagesupervisor.php"><i class="icon-chevron-right"></i><i class="icon-reorder icon-building"></i>Message</a>
                            </li>  -->
						    </ul>
						</li>
						
                         <!------/.* tracsaction sidebar*------->	
					    <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs3"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Profile
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs3" class="collapse">					
                            <li class="">
                            <a href="student_editprofile.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>View/Edit Profile</a>
                            </li>
                            <li class="">
                            <a href="change_passstudent.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>Change Password</a>
                            </li>
						    </ul>
						</li>
						
						
						
						<!------/.* System Log sidebar*------->	
						
					  <!------/.* advance search sidebar*------->
                         
                           </ul>
                        </li>
                  </ul>					
				
				<?php include('search_form.php'); ?>																		
</div>