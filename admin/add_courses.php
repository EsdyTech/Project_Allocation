
  <div class="row-fluid" style="margin-left:-90px">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Add Courses</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								 <!--------------------form------------------->
								<form method="post">
									COURSE TITLE:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="title" id="focusedInput" type="text" placeholder = "Course Title" required>
                                          </div>
                                        </div>
										COURSE CODE:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="code" id="focusedInput" type="text" placeholder = "Course Code" required>
                                          </div>
                                        </div>
										COURSE UNIT:
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="unit" id="focusedInput" type="text" placeholder = "Course Unit" required>
                                          </div>
                                        </div>
                                        LEVEL:
										 <div class="control-group">
                                          <div class="controls">
                                           <select name="level" required>										
													<option>ND1</option>
													<option>ND2</option>
                                                    <option>HND1</option>
													<option>HND2</option>
												</select>	
                                          </div>
                                        </div>
                                        SEMESTER:
                                         <div class="control-group">
                                          <div class="controls">
                                           <select name="semester" required>										
													<option>First</option>
													<option>Second</option>
												</select>	
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



$title = $_POST['title'];
$code= $_POST['code'];
$unit = $_POST['unit'];
$level = $_POST['level'];
$semester = $_POST['semester'];
$status = $_POST['status'];

$query = mysql_query("select * from course where course_code = '$code'")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('This Course Exists!');
</script>
<?php
}else{

mysql_query("insert into course (course_title,course_code,course_unit,level,semester,status) 
values('$title','$code','$unit','$level','$semester','$status')")or die(mysql_error());

?>
<script>
window.location = "reg_course.php";
$.jGrowl("New Course Successfully added", { header: 'Course added' });
</script>
<?php
}
}
?>