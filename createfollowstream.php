<?php
session_start();
ini_set('session.gc_maxlifetime',300);
$userid=$_SESSION['uid'];
$fsname=$_POST['fsname'];
include("conn.php");	

$sql= "insert into followstream (userid,fsname) values ('".$userid."','".$fsname."')";
		
		 mysql_query($sql);
		//echo"$sql";		
		mysql_close();
		
		
		header("location:followstream.php");
?>