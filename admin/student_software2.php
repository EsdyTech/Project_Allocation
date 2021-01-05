
  <div class="row-fluid" style="margin-left:-70px" >
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large">Add Software Links</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								 <!--------------------form------------------->
								<form method="post" enctype="multipart/form-data">
										<div class="control-group">
                                          <div class="controls">
    <input class="input focused" name="link" id="focusedInput" type="text" placeholder = "Link to download project software" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <!-- <div class="controls">
                                            <input class="input focused" name="surname" id="focusedInput" type="text" placeholder = "Surname" required>
                                          </div> -->
                                        </div>
										
										<div class="control-group">
                                          <!-- <div class="controls">
                                            <input class="input focused" name="firstname" id="focusedInput" type="text" placeholder = "First Name" required>
                                          </div> -->
                                        </div>
<!-- 										
										<div class="control-group">
								          <label class="control-label" for="inputPassword">Browse Your Computer</label>
									        <input name="files" class="input-file uniform_on" id="fileInput" type="file" required>
                                        </div> -->
										
                                       
                                       	
									
										<div class="control-group">
                                          <!-- <div class="controls">
                                           <select name="status" required>										
													<option value="Activated">Activated</option>
													<option value="Deactivated">Deactivated</option>
												</select>	
                                          </div> -->
                                        </div>
										<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info" id="save" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large"> Save</i></button>
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
                    </div>				 
                    
                            
                                        
                    <?php
if (isset($_POST['save'])){



$link = $_POST['link'];
$dateReg =date("Y-m-d");


$query = mysqli_query($con,"select * from software where studentId = '$matricno'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('You have uploaded a software Link!');
</script>
<?php
}else{

mysqli_query($con,"insert into software (studentId,link,dateReg) 
values('$matricno','$link','$dateReg')")or die(mysqli_error());

?>
<script>
window.location = "student_software.php";
$.jGrowl("Software Link Successfully added", { header: 'Software Link added' });
</script>
<?php
}
}
?>