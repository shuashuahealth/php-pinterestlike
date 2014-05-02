<?php
session_start();
ini_set('session.gc_maxlifetime',300);
$userid=$_SESSION['uid'];
$piname=$_POST['piname'];
include("conn.php");	

$sql= "insert into pinboard (userid,piname) values ('".$userid."','".$piname."')";
		
		 mysql_query($sql);
		//echo"$sql";		
		mysql_close();
		
		
		header("location: mypinboard.php");
?>