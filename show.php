<?php
$id = $_GET['id'];
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'pinterest'; 
include"conn.php";	
  $query = "select * from picture "; 
$result = @MYSQL_QUERY($query); 
 
while($out=mysql_fetch_array($result))
{
	$id=$out["picid"];
echo "<img style='style:height:100px;width:100px;' src='test.php?id=$id'/><br/>";
}


?>