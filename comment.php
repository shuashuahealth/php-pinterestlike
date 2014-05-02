<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>

<link rel="stylesheet/less" href="style.less">
	
		<script src="less.js"></script>



</head>
<?php
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
session_start();
ini_set('session.gc_maxlifetime',300);
$picid=$_GET['id'];
?>

<?php
if(isset ($_POST['comment']))
{
	
	 include "conn.php";			 
	  $sql= "insert into comment (userid,pinid,picid,content) values ('".$_SESSION['uid']."','".$_SESSION['pinid']."','".$picid."','".$_POST['content']."')";
		echo"$sql";		
	 mysql_query($sql);
		
		mysql_close();
	
	
	
	}

?>
<body>
	<header>
			<div class="wrapper">
				<img src="gfx/logo.png">
				<?php
				if($_SESSION['uid']!=null){ ?>
                       <a href="upform.php" class="navigator">Upload a pin| </a>
					<a href="profile.php" class="navigator">Profile | </a>
					<a href="friend.php" class="navigator">Friend | </a>
					<a href="note.php" class="navigator">Post note |</a>
					<a href="search.php" class="navigator">Search Picture |</a>
					<a href="receive.php" class="navigator">Receive | </a>
					<a href="mypinboard.php" class="navigator">My Pinboard | </a>
				<a href="followstream.php" class="navigator">My Followstream | </a>
				<?php echo "<a href='login.php?action=logout' id='logout'>logout [{$_SESSION['uname']}]</a>";
				} else {
					echo "<a href='login.html'><p id='name'>login</p></a>";
				}
				?>
			</div>
		</header>

<?php
echo "<form action='comment.php?id=$picid' method='post'>";
?>

Comment:<textarea name="content"></textarea>
<input type="submit" name="comment" value="Comment">

</form>





</body>
</html>