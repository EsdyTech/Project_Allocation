   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"> <i class="icon-plus-sign icon-large"> Add Department</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" enctype="multipart/form-data" >
										<div class="control-group">
                                          <div class="controls">
         <input name="dep_name" class="input focused" id="focusedInput" type="text" placeholder = "Department Name" required>
         <input name="dep_name" class="input focused" id="focusedInput" type="text" placeholder = "Department Name" required>
         <input name="dep_name" class="input focused" id="focusedInput" type="text" placeholder = "Department Name" required>
         <input name="dep_name" class="input focused" id="focusedInput" type="text" placeholder = "Department Name" required>
         <input name="dep_name" class="input focused" id="focusedInput" type="text" placeholder = "Department Name" required>
         <input name="dep_name" class="input focused" id="focusedInput" type="text" placeholder = "Department Name" required>
                                          </div>
                                        </div>
										
									   <div class="control-group">
								          <label class="control-label" for="inputPassword">Browse Your Computer</label>
								           <div class="controls">
									        <input name="image" class="input-file uniform_on" id="fileInput" type="file" required>
								           </div>
								         </div>
										 
											<div class="control-group">
											<div class="controls">
												<button name="save" class="btn btn-info" id="save" data-placement="right" title="Click to Add"><i class="icon-plus-sign icon-large"> Add</i></button>
                                                <script type="text/javascript">
	                                            $(document).ready(function(){
	                                            $('#save').tooltip('show');
	                                            $('#save').tooltip('hide');
	                                            });
	                                            </script>
                                          </div>                                          
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div><?php
if (isset($_POST['save'])){
	
 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
 $image_name = addslashes($_FILES['image']['name']);
 $image_size = getimagesize($_FILES['image']['tmp_name']);

 move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
 $thumbnails = "uploads/" . $_FILES["image"]["name"];
 $dep_name = $_POST['dep_name'];
								
$query = mysql_query("select * from department where dep_name  =  '$dep_name' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Department Name Already Exist');
</script>
<?php
}else{
mysql_query("insert into department (dep_name,thumbnails) values('$dep_name','$thumbnails')")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Add Department $dep_name')")or die(mysql_error());
?>
<script>
$.jGrowl("Department Successfully added", { header: 'Department add' });
window.location = "department.php";
</script>
<?php
}
}
?>