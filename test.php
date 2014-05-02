<?php
   $id = $_GET['id'];
include"conn.php";	
  $query = "select pic,type from picture where picid=$id"; 
  
$result = @MYSQL_QUERY($query); 
 
$out=mysql_fetch_array($result);
$data=$out["pic"];
$type=$out["type"];
 
Header( "Content-type: $type"); 
echo $data; 


?>
