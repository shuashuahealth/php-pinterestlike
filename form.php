<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'pinterest'; 
$form_description = $_POST['form_description']; 
$form_data_name = $_FILES['form_data']['name'];
$form_data_size = $_FILES['form_data']['size'];
$form_data_type = $_FILES['form_data']['type'];
$form_data = $_FILES['form_data']['tmp_name'];
//echo "winson";

$connect = MYSQL_CONNECT( "localhost", "root", "$password") or die("Unable to connect to MySQL server");
mysql_select_db("$dbname") or die("Unable to select database");



$data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
 
//echo "mysqlPicture=".$data;
 
$result=MYSQL_QUERY( "INSERT INTO ccs_image (description,bin_data,filename,filesize,filetype) VALUES ('$form_description','$data','$form_data_name','$form_data_size','$form_data_type')"); 
 
$id= mysql_insert_id(); 
print "<p>This file has the following Database ID: <a href='get_data.php?id=$id'><b>$id</b></a>";
 
 
MYSQL_CLOSE();
?>
