<?php
 
$dbc=@mysql_connect('localhost',"chikayb_nacoss","nacoss12345") or die('can not connect'. mysql_error());
mysql_select_db("chikayb_nacoss") or die('ndb found' .mysql_error);
?>
