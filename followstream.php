<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My pinboard</title>
 <link rel="stylesheet/less" href="style.less">
		<script src="less.js"></script> 

</head>
<?php
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
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
		
		<div class="wrapper" align="center" >	
    <form action="follow.php" method="post">    
    <table border='1' style='margin-left:8px'>  
      <tr>
		<th>My FollowStream Name</th>
		<th>FollowStream ID</th>
        <th>Open </th>
        <th>Delete </th>
	    </tr>	
      
    <?php
	include "conn.php";
	$query = "select * from followstream where userid=$userid"; 
	///echo "$query";
	$result = @MYSQL_QUERY($query); 
	 while ($rec=mysql_fetch_array($result))	{
				 $fsname=$rec['fsname'];
				 $fid=$rec['fid']; 	
	  echo"<tr>
      <td align='center'>".$fsname."</td>
	  <td align='center'>".$fid."</td>
	  <td> <input type=submit size='1' name='openf' value=".$fid."></td>
	  <td> <input type=submit size='1' name='deletef' value=".$fid."></td>
      ";
    
	 }?>
   </table>
   
   	</form>
    
    
    <form action="createfollowstream.php" method="post">
    
    <input type="submit" name="createf" value="Create Followstream">
    <input type="text" name="fsname">
    
    
    
    
    </form>
	</div>
    
</body>
</html>