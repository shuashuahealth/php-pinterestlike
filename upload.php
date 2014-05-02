<?php


$upfile=$_FILES['upfile'];
$name = $upfile['name'];
$type = $upfile['type'];
$size = $upfile['size'];
$tmp_name = $upfile['tmp_name'];
$pinid=$_POST['pinboard'];
$tag=$_POST['tag'];
 
 
 $mysqlPicture=addslashes(fread(fopen($tmp_name, "r"), filesize($tmp_name)));  

 
 	include("conn.php");
$sql="INSERT INTO picture (pinid,picname,time,type,pic,tag) VALUES ('$pinid','$name',now(),'$type','$mysqlPicture','$tag')";


//echo "$sql";
 mysql_query($sql);
 
 
 
 

 mysql_close();


header("location:upform.php");
 



?>
