<?php 
 include('./lib/dbcon.php'); 
dbcon();

$dep_id = $_GET['dep_id'];
$id=$_GET['id'];
$item_id = $_GET['item_id'];

mysql_query("update tbl_release
            LEFT JOIN release_details on tbl_release.release_id = release_details.release_id 
            set release_status='returned',date_return= NOW() 
            where tbl_release.release_id='$id' 
           and release_details.item_id = '$item_id'")or die(mysql_error());	

mysql_query("update item set  
                           item_status = '$item_status'
                           where item_id = '$item_id' ")or die(mysql_error());		   
?>	
<script>
window.location = "myitem.php<?php echo '?dep_id='.$dep_id; ?>";
$.jGrowl("Device Transfer Successfully", { header: 'Device Transfer' });
</script>
										