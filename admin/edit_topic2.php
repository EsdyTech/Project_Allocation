
  <div class="row-fluid" style="margin-left:-70px">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Add Topics</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                <?php
								$query = mysqli_query($con,"select * from topics where topicId = '$get_topicId'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>
								 <!--------------------form------------------->
								<form method="post">
									 NAME:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['name'];?>" name="name" id="focusedInput" type="text" placeholder = "Name" required>
                                          </div>
                                        </div>
									     CODE:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="code" value="<?php echo $row['code'];?>" id="focusedInput" type="text" placeholder = "Code" required>
                                          </div>
                                        </div>
									
										STATUS:
                                        <div class="control-group">
                                          <div class="controls">
                                           <select name="status" required>										
													<option>Activated</option>
													<option>Deactivated</option>
												</select>	
                                          </div>
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
					
					function Random($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

					?>
                    
                    
                    
                    
					<?php
if (isset($_POST['save'])){



$name = $_POST['name'];
$code= $_POST['code'];

$status = $_POST['status'];

$query = mysqli_query($con,"update topics set name = '$name',code = '$code',status = '$status' where topicId = '$get_topicId' ")or die(mysqli_error());
$count = mysqli_num_rows($query);


if($query == True){?>
<script>
alert('Topic Updated Succesfully!');
</script>
<?php
}
?>
<script>
window.location = "reg_topics.php";
$.jGrowl("Topic updated Successfully", { header: 'Topic Updated!' });
</script>
<?php

}
?>
