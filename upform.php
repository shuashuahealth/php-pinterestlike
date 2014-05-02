<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pinter</title>
<link rel="stylesheet/less" href="style.less">
		<title>Jingo</title>
		<script src="less.js"></script>
</head>
<?php
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
session_start();
ini_set('session.gc_maxlifetime',300);
//注销登录


$userid=$_SESSION['uid'];



?>

<?


?>
<body>


    
	<header>
			<div class="wrapper">
				<?php
				if($_SESSION['uid']!=null){ ?>
               <a href="upform.php" class="navigator">Upload a pin| </a>
					<a href="profile.php" class="navigator">Profile | </a>
					<a href="friend.php" class="navigator">Friend | </a>
					<a href="searchp.php" class="navigator">Search Pinboard |</a>
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
<div align="center">
<form enctype="multipart/form-data" method="post" action="upload.php">

 <input class="upform" name="upfile" type="file" size=>
   <input type="submit" name="store" value="Store"><br>
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
    <br>
    Tag: <input type="text" name="tag"><br>

   
   
</div>
</form>
</body>
</html>