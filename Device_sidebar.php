     <div class="span3" id="sidebar">
	              <img id="admin_avatar" class="img-polaroid" src="<?php echo $row['adminthumbnails']; ?>"> 
                  <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                           <li class=""> 
						   <a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Dashboard</a> 
						   </li>
						 
						 <!------/.* manage device sidebar*------->						
						 <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs"><i class="icon-chevron-right"></i><i class="icon-tablet icon-large"></i>&nbsp;Master File
						    <div class="muted pull-right"><i class="caret"></i></div></a>					
						    <ul id="bs" class="collapse">						
                            <li class="active">
                            <a href="item.php"><i class="icon-chevron-right"></i><i class="icon-desktop"></i> Item </a>
                            </li>
                            <li class="">
                            <a href=".php"><i class="icon-chevron-right"></i><i class="icon-folder-open-alt"></i> Client</a>
                            </li> 					   							
						    </ul>
						</li>
						
                         <!------/.* manage location sidebar*------->	
					    <li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs1"><i class="icon-chevron-right"></i><i class="icon-sitemap"></i>&nbsp;Transaction
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs1" class="collapse">						
                            <li class="">
                            <a href=".php"><i class="icon-chevron-right"></i><i class="icon-map-marker"></i> Realeasing</a>
                            </li>
						    <li class="">
                            <a href=".php"><i class="icon-chevron-right"></i><i class="icon-sitemap"></i> Returning</a>
                            </li>
						    </ul>
						</li>
						
					  <!------/.* manage TRIS user sidebar*------->	
						<li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs2"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Manage PPES User
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs2" class="collapse">						
                            <li class="">
                            <a href=".php"><i class="icon-chevron-right"></i><i class="icon-user"></i>&nbsp;Technical Staff</a>
                            </li>
						    <li class="">
                            <a href=".php"><i class="icon-chevron-right"></i><i class="icon-user"></i>&nbsp;System User</a>
                            </li>
						    </ul>
						</li>
						
						<!------/.* System Log sidebar*------->	
						<li>						
						    <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs3"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;System log
							<div class="muted pull-right"><i class="caret"></i></div></a>						
						    <ul id="bs3" class="collapse">						
                            <li class="">
                            <a href=".php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Activity Log</a>
                            </li>
						    <li class="">
                            <a href=".php"><i class="icon-chevron-right"></i><i class="icon-file"></i> User Log</a>
                            </li>
						    </ul>
						</li>
						
					  <!------/.* notification sidebar*------->
					    <li class="">
				           <a href="notification.php"><i class="icon-chevron-right"></i><i class="icon-globe"></i>&nbsp;Notification
				           
			            </li>
						
                         <li class="">
                           <a href="javascript:;" role="button" class="dropdown-toggle" data-toggle="collapse" data-target="#bs4"><i class="icon-chevron-right"></i><i class="icon-search icon-large"></i>&nbsp;Advance Search 
						   <div class="muted pull-right"><i class="caret"></i></div></a>
                           </a>
                           <ul id="bs4" class="collapse">
                           <li>
                           <a href="#myModal" data-toggle="modal" tabindex="1"><i class="icon-chevron-right"></i><i class="icon-search"></i>&nbsp;Device in the location</a>
                           </li>
                          
                           <li>
                           <a href="#myModal1" data-toggle="modal" tabindex="-1" ><i class="icon-chevron-right"></i><i class="icon-search"></i>&nbsp;All Device</a>
                           </li>
                           </ul>
                        </li>
                  </ul>					
													
    </div>