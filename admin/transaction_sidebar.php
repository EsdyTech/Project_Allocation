     <div class="span3" id="sidebar">
	              <img id="admin_avatar" class="img-polaroid" src="<?php echo $row['adminthumbnails']; ?>"> 
                  <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                           <li class=""> 
						   <a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-home icon-large"></i>&nbsp;Dashboard</a> 
						   </li>
						 
						 <!------/.* manage device sidebar*------->						
						 <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt icon-large"></i>&nbsp;Master File
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs" class="collapse">						
                            <li class="">
                            <a href="item.php"><i class="icon-chevron-right"></i><i class="icon-desktop"></i> Item </a>
                            </li>
                            <li class="">
                            <a href="employee.php"><i class="icon-chevron-right"></i><i class="icon-group"></i> Register Employee</a>
                            </li> 					   							
						    </ul>
						</li>
						
						
						 <!------/.* manage department sidebar*------->	
						  <li class="">						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs1"><i class="icon-chevron-right"></i><i class="icon-sitemap icon-large"></i>&nbsp;Manage Department
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs1" class="collapse">						
                            <li class="">
                             <a href="item_department.php"><i class="icon-chevron-right"></i><i class="icon-reorder icon-building"></i> Department </a>
                            </li>
                            <li class="">
                            <a href="department.php"><i class="icon-chevron-right"></i><i class="icon-reorder icon-building"></i> Add Department</a>
                            </li> 					   							
						    </ul>
						</li>
						
                         <!------/.* tracsaction sidebar*------->	
					    <li class="active">						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs2"><i class="icon-chevron-right"></i><i class="icon-retweet icon-large"></i>&nbsp;Transaction
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs2" class="collapse">						
                            <li class="">
                            <a href="realease.php"><i class="icon-chevron-right"></i><i class="icon-share"></i> Realeasing</a>
                            </li>
						    <li class="">
                            <a href="view_return.php"><i class="icon-chevron-right"></i><i class="icon-eye-open"></i> View Return Item</a>
                            </li>
							<li class="">
                            <a href="View_release_item.php"><i class="icon-chevron-right"></i><i class="icon-eye-open"></i> View Release Item</a>
                            </li>
						    </ul>
						</li>
						
					  <!------/.* manage PPES user sidebar*------->	
						<li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs3"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Manage PPES User
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs3" class="collapse">						
                            <li class="">
                            <a href="technical_user.php"><i class="icon-chevron-right"></i><i class="icon-user"></i>&nbsp;Technical Staff</a>
                            </li>
						    <li class="">
                            <a href="admin_user.php"><i class="icon-chevron-right"></i><i class="icon-user"></i>&nbsp;System User</a>
                            </li>
						    </ul>
						</li>
						
						<!------/.* System Log sidebar*------->	
						<li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs4"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;System log
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs4" class="collapse">						
                            <li class="">
                            <a href="activity_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Activity Log</a>
                            </li>
						    <li class="">
                            <a href="user_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> User Log</a>
                            </li>
						    </ul>
						</li>
						
					  <!------/.* advance search sidebar*------->
                         <li class="">
                           <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs5"><i class="icon-chevron-right"></i><i class="icon-search icon-large"></i>&nbsp;Advance Search 
						   <div class="muted pull-right"><i class="caret"></i></div></a>
                           </a>
                           <ul id="bs5" class="collapse">
                           <li>
                           <a href="#myModal1" data-toggle="modal" tabindex="-1" ><i class="icon-chevron-right"></i><i class="icon-search"></i>&nbsp;Realease Item</a>
                           </li>
                           </ul>
                        </li>
                  </ul>					
				
				<?php include('search_form.php'); ?>																		
</div>