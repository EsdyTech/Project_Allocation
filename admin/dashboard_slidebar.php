     <div class="span3" id="sidebar">
          <?php 
                 $query = mysqli_query($con,"select * from adminlogin where  id ='$adminid'");
                        $rows = mysqli_fetch_array($query);	
						?>
	              <img id="admin_avatar" class="img-polaroid" src="<?php echo $rows['pic']; ?>"> 
                  <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                           <li class="active"> 
						   <a href="dashboard.php" style="background-color:#00CC66"><i class="icon-chevron-right"></i><i class="icon-home icon-large"></i>&nbsp;Dashboard</a> 
						   </li>
						 
						 <!------/.* manage device sidebar*------->						
						 <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>&nbsp;Manage Users
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs" class="collapse">	
                             <li class="">
                            <a href="reg_students.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>  Students</a>
                            </li> 					
                             <li class="">
                            <a href="reg_lecturer.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>  Lecturers</a>
                            </li> 
                           
						    </ul>
						</li>
						
						
						 <!------/.* manage department sidebar*------->	
						  <!-- <li class="">						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs1"><i class="icon-chevron-right"></i><i class="icon-sitemap icon-large"></i>&nbsp;Manage Courses
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs1" class="collapse">						
                            <li class="">
                            <a href="reg_course.php"><i class="icon-chevron-right"></i><i class="icon-reorder icon-building"></i> Add Courses</a>
                            </li> 
                            <li class="">
                          <a href="assign.php"><i class="icon-chevron-right"></i><i class="icon-reorder icon-building"></i> Assign Courses</a>
                            </li> 	
						    </ul>
						</li> -->
						
            <li class="">						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs1"><i class="icon-chevron-right"></i><i class="icon-sitemap icon-large"></i>&nbsp;Manage Project
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs1" class="collapse">						
                            <li class="">
                            <a href="reg_topics.php"><i class="icon-chevron-right"></i><i class="icon-reorder icon-building"></i> Add Topics</a>
                            </li> 
                            <li class="">
                          <a href="assign_students.php"><i class="icon-chevron-right"></i><i class="icon-reorder icon-building"></i>Assign students</a>
                            </li> 	
                            <!-- <li class="">
                          <a href="#"><i class="icon-chevron-right"></i><i class="icon-reorder icon-building"></i>Project Calendar</a>
                            </li>  -->
						    </ul>
						</li>
                         <!------/.* tracsaction sidebar*------->	
					    <!-- <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs2"><i class="icon-chevron-right"></i><i class="icon-retweet icon-large"></i>&nbsp;View/Edit
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs2" class="collapse">						
						    <li class="">
                            <a href="admin_viewstudents.php"><i class="icon-chevron-right"></i><i class="icon-eye-open"></i> View Students</a>
                            </li>
							<li class="">
                            <a href="admin_viewlecturer.php"><i class="icon-chevron-right"></i><i class="icon-eye-open"></i> View Lecturers</a>
                            </li>
                            <li class="">
                            <a href="admn_viewcourses.php"><i class="icon-chevron-right"></i><i class="icon-eye-open"></i> View Courses</a>
                            </li>
                            <li class="">
                     <a href="admin_viewassign.php"><i class="icon-chevron-right"></i><i class="icon-eye-open"></i> View Assigned Courses</a>
                            </li>
						    </ul>
						</li> -->
						
					  <!------/.* manage PPES user sidebar*------->	
						<li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs3"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Manage Admin/Users
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs3" class="collapse">						
                            <li class="">
                            <a href="reg_admin.php"><i class="icon-chevron-right"></i><i class="icon-user"></i>&nbsp;Add Administrator</a>
                            </li>
						    <!-- <li class="">
                            <a href="#"><i class="icon-chevron-right"></i><i class="icon-user"></i>&nbsp;Message Administrator</a>
                            </li>
                            <li class="">
                            <a href="#"><i class="icon-chevron-right"></i><i class="icon-user"></i>&nbsp;Message Lecturers</a>
                            </li>
                            <li class="">
                            <a href="#"><i class="icon-chevron-right"></i><i class="icon-user"></i>&nbsp;Message Students</a>
                            </li> -->
						    </ul>
						</li>
						
						<!------/.* System Log sidebar*------->	
						<!-- <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs4"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Projects log
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs4" class="collapse">						
                            <li class="">
                            <a href="activity_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Activity Log</a>
                            </li>
						    <li class="">
                            <a href="user_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> User Log</a>
                            </li>
						    </ul>
						</li> -->
						<li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs4"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Students Topic/Chapter
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs4" class="collapse">						
                            <li class="">
                            <a href="adminviewstudents_topics.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Topic Log</a>
                            </li>
						    <li class="">
                            <a href="adminviewstudents_chapters.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Chapter Log</a>
                            </li>
						    </ul>
						</li>
					  <!------/.* advance search sidebar*------->
                         <!-- <li class="">
                           <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs5"><i class="icon-chevron-right"></i><i class="icon-search icon-large"></i>&nbsp;Advance Search 
						   <div class="muted pull-right"><i class="caret"></i></div></a>
                           </a>
                           <ul id="bs5" class="collapse">
                           <li>
                           <a href="#myModal1" data-toggle="modal" tabindex="-1" ><i class="icon-chevron-right"></i><i class="icon-search"></i>&nbsp;Realease Item</a>
                           </li>
                           </ul>
                        </li>
                  </ul>					 -->
				
				<?php include('search_form.php'); ?>																		
</div>