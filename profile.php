<?php
session_start();
ini_set('session.gc_maxlifetime',300);


include('conn.php');
$uid=$_SESSION['uid'];

$sql= "select * from `user` where userid=$uid";	
$info=mysql_query($sql);
$result = mysql_fetch_array($info);		




if(isset($_POST['name'])||isset($_POST['age'])||isset($_POST['phone'])||isset($_POST['address'])||isset($_POST['zip'])){
	
	$zip=$_POST['zip'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$age=$_POST['age'];
$name=$_POST['name'];
	
	include "conn.php";
	 $info_update= "UPDATE user SET name='$name', age='$age', phone='$phone',address='$address',zip='$zip' where userid='$uid'";
	echo "<br>$info_update";
	mysql_query($info_update);
}

?>

<!DOCTYPE html>
<html>
	<head>
		
		<link rel="stylesheet/less" href="style.less">
		<title>Jingo profile</title>
		<script src="less.js"></script>
		
	</head>
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
		
		<div id="content">
			<div class="wrapper">
				<div class="panel left">
				
		<?php
		//include "conn.php";
		$user_info = mysql_query("select * from user where userid=$uid");
		
		if($result=mysql_fetch_array($user_info)){
			
		    echo "<h1> Personal Profile</h1>";
		    echo "<h4> Registration Information </h4>";
			echo "<p> <strong> user name: </strong> ".$result['username']."</p>";
			echo "<p> <strong> email: </strong> ".$result['email']."</p>";
			echo "<p> <strong> registration date: </strong> ".$result['date']."</p>";
			echo "<h4> Personal Information </h4>";
			echo "<p> <strong> name: </strong> ".$result['name']."</p>";
			echo "<p> <strong> age: </strong> ".$result['age']."</p>";
			
			echo "<p> <strong> address: </strong> ".$result['address']."</p>";	
			echo "<p> <strong> zip: </strong> ".$result['zip']."</p>";	
				
		}
		mysql_close();
		?>
	</div>
		
		<div class="panel right">
			<h1> Update Information </h1>
			<p>
				<form action="profile.php" method="post">
					<p> 
						<strong>name:</strong> <br> <input type="text" name="name" value="<?php echo $result['name'];?>"/>
				      <br>
						<strong>age:</strong>  <br><input type="text" name="age" value="<?php echo $result['age'];?>"/>
					  <br>
						<strong>phone:</strong>  <br><input type="text" name="phone" value="<?php echo $result['phone'];?>"/>
                        <br>
                        <strong>address:</strong> <br> <input type="text" name="address" value="<?php echo $result['address'];?>"/>
                        <br>
                        <strong>zip:</strong>  <br><input type="text" name="zip" value="<?php echo $result['zip'];?>"/>
					
					</p>
					<p>
						<input type="submit" name="submit" value="Update" class="left" />
					</p>
				</form>
				
			</p>
		</div>
		
		
		</form>
		</div>
	</body>
</html>