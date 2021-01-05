<?php
 	 require ('./lib/dbcon.php'); 
     dbcon();
	require ('session.php');
	$id=$_POST['selector'];
 	$client_id  = $_POST['client_id'];
	$dep_id  = $_POST['dep_id'];

	if ($id == '' ){
	header("location: item_department.php");
	?>
	

	<?php }else{

	mysql_query ("insert into tbl_release (client_id,date_borrow) values ('$client_id',NOW()) ") or die(mysql_error());
	
	$query = mysql_query("select * from tbl_release order by release_id DESC")or die(mysql_error());
	$row = mysql_fetch_array($query);
	$release_id  = $row['release_id']; 
	
$history_record=mysql_query("select * from user where user_id=$session_id");
$row1=mysql_fetch_array($history_record);
$user=$row1['firstname']." ".$row1['lastname'];	

$N = count($id);
for($i=0; $i < $N; $i++)
{
		mysql_query("INSERT INTO transaction_history (item_id,action,client_id,release_id,admin_name,date_added) VALUES ('$id[$i]','Borrowing Item','$client_id','$release_id','$admin_username',NOW())")or die(mysql_error());


		mysql_query("insert into release_details (item_id, dep_id, release_id,release_status,remarks) values ('$id[$i]','$dep_id','$release_id','pending','/ Re-used')")or die(mysql_error());
        
       	mysql_query("insert into activity_log (date,username,action) values(NOW(),'$admin_username','Realease Item $id[$i] to $client_id to Department id $dep_id')")or die(mysql_error());
}



header("location: item_department.php");
}  
?>
	
	

	
	