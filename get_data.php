<?php
    $id = $_GET['id'];
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'pinterest'; 

$connect = MYSQL_CONNECT("localhost", "root", "") or die("Unable to connect to MySQL server");
mysql_select_db("pinterest") or die("Unable to select database");
 
$query = "select bin_data,filetype from ccs_image where id=$id"; 
$result = @MYSQL_QUERY($query); 
 
$out=mysql_fetch_array($result);
$data=$out["bin_data"];
$type=$out["filetype"];
 
Header( "Content-type: $type"); 
echo $data; 


?>
