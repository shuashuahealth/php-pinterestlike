<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
   <link rel="stylesheet/less" href="style.less">
       <link href="home.css" rel="stylesheet" type="text/css">
		<script src="less.js"></script> 


</head>
<?php
session_start();
ini_set('session.gc_maxlifetime',300);
//注销登录


$userid=$_SESSION['uid'];


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
					echo "<a href='login.html'><id='name'>login</p></a>";
				}
				?>
			</div>
		</header>
       <div id="content" align="center">
			<div class="wrapper">
			<div class="panel left">
        
  <form action="searchpin.php" method="post">      
<strong>Search Pinboard:</strong>  <input type="text" name="fname"> 
<input type="submit"  value="Search">
<br><strong>Please enter familiar Pinboard's name!</strong>
</form>

</div>
</div>
</div>

</body>
</html>