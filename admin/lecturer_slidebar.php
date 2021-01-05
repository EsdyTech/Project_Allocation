     <div class="span3" id="sidebar">
     <?php $querys= mysqli_query($con,"select * from lecturer where username = '$lectid'")or die(mysqli_error());
							  $rows = mysqli_fetch_array($querys);
						?>
	              <img id="admin_avatar" class="img-polaroid"  src="<?php echo $rows['pic']; ?>"> 
                  <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                           <li class="active"> 
						   <a href="lecturer_dashboard.php" style="background-color:#00CC66"><i class="icon-chevron-right"></i><i class="icon-home icon-large"></i>&nbsp;Dashboard</a> 
						   </li>
						 
						 <!------/.* manage device sidebar*------->						
						 <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>&nbsp;Manage Student Project
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs" class="collapse">	
							<li class="">
<a href="lecturerviewstudent_topics.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>Topics/Proposals</a>
                            </li> 	
							<li class="">
<a href="lecturerviewstudent_writeups.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>WriteUps</a>
                            </li> 	
							<li class="">
<a href="lecturer_addChapters.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>Chapters</a>
                            </li> 
							<li class="">
<a href="lecturer_viewchapterlogs1.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>Chapter Log</a>
                            </li> 	
							<li class="">
<a href="lecturerviewstudent_software.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>Softwares</a>
                            </li> 	
                             <!-- <li class="">
<a href="lecturer_uploadass.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>Upload Assignments </a>
                            </li> 					
                            <li class="">
 <a href="lecturer_grade.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>Grade/Score Assignments</a>
                            </li>
                            <li class="">
     <a href="lecturer_viewgrade.php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>View Students Scores</a>
                            </li> -->
						    </ul>
						</li>
						
						
						 <!------/.* manage department sidebar*------->	
						  <!-- <li class="">						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs1"><i class="icon-chevron-right"></i><i class="icon-sitemap icon-large"></i>&nbsp;Courses
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs1" class="collapse">						
                            <li class="">
              <a href="lecturer_viewassign.php"><i class="icon-chevron-right"></i><i class="icon-reorder icon-building"></i> Assigned Courses</a>
                            </li> 
						    </ul>
						</li> -->
						
                         <!------/.* tracsaction sidebar*------->	
					    <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs3"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Students
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs3" class="collapse">					
                            <li class="">
                            <a href="lecturer_viewstudents.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>Assigned Students </a>
                            </li>
							<!-- <li class="">
                            <a href="lecturer_messagestudent.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>Message Student</a>
                            </li> -->
						    </ul>
						</li>
						
						
						<!------/.* System Log sidebar*------->	
						<li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs4"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Profile
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs4" class="collapse">						
                            <li class="">
                            <a href="lecturer_editprofile.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> View/Edit Profile</a>
                            </li>
						    <li class="">
                            <a href="change_passlecturer.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Change Password </a>
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
                        </li> -->
                  </ul>					
				
				<?php include('search_form.php'); ?>																		
</div>