<?php 
	$my_device = mysql_query("select * from release_details    
	LEFT JOIN item ON release_details.item_id = item.item_id
	LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
	where dep_id = '$dep_id' ORDER BY release_details.release_details_id DESC ")or die(mysql_error());
	$count_yes = mysql_num_rows($my_device);
?>

<?php 
	$my_device = mysql_query("select * from release_details    
	LEFT JOIN item ON release_details.item_id = item.item_id
	LEFT JOIN tbl_release ON release_details.release_id=tbl_release.release_id
	where dep_id = '' ORDER BY release_details.release_details_id  DESC ")or die(mysql_error());
	$count_no = mysql_num_rows($my_device);
?>

<?php $not_count = $count_yes -  $count_no; ?>