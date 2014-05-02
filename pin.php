<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>无标题文档</title>
<link rel="stylesheet/less" href="style.less">
	
		<script src="less.js"></script>
</head>
<?php
$picid=$_GET['id'];
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
session_start();
ini_set('session.gc_maxlifetime',300);
//注销登录



$userid=$_SESSION['uid'];



?>

<?php
if ($_POST['choose'])

{
include("conn.php");	
	$sql= "insert into repin (repinid,picid) values ('".$_POST['pinboard']."','".$picid."')";
		
		 mysql_query($sql);
		echo"$sql";		
		mysql_close();
	
	
	}


?>
<body>


	<header>
			<div class="wrapper">
				<?php
				if($_SESSION['uid']!=null){ ?>
                  <a href="upform.php" class="navigator">Upload a pin| </a>
					<a href="profile.php" class="navigator">Profile | </a>
					<a href="friend.php" class="navigator">Friend | </a>
					<a href="note.php" class="navigator">Post note |</a>
					<a href="search.php" class="navigator">Search Picture |</a>
					<a href="mypinboard.php" class="navigator">My Pinboard | </a>
						<a href="followstream.php" class="navigator">My Followstream | </a>
					
				<?php echo "<a href='login.php?action=logout' id='logout'>logout [{$_SESSION['uname']}]</a>";
				} else {
					echo "<a href='login.html'><p id='name'>login</p></a>";
				}
				?>
			</div>
		</header>



<body>
<form action="" method="post">
Pinboard: <select name="pinboard">
<?php

include("conn.php");
$sql= "SELECT * FROM pinboard where userid=$userid";	
	$result=mysql_query($sql);

 while ($rec=mysql_fetch_array($result)){
	 
	 
	 echo "<option value=".$rec['pinid'].">". $rec['piname']." </option>";
	 
	 
	 }
?>
    </select>

<input type="submit" name="choose" value="Choose">
<input type="submit" name="back" value="Back">
</form>
</body>
</html>