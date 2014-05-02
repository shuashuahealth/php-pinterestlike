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

if (isset($_POST['like1']))
{
	 //echo $_SESSION['pinid'];
	$pinid=$_SESSION['pinid'];
	//echo "$pinid";
	
	 include "conn.php";			 
	  $sql= "insert into `like` (userid,picid) values ('".$userid."','".$_POST['like1']."')";
		echo"$sql";		
	 mysql_query($sql);
		
		mysql_close();
	echo "wrong";
	$tag=$_SESSION['tag'];
	}

	//echo "wrong";
	else {
	 $_SESSION['tag']=$_POST['discrip'];
	 $tag=$_SESSION['tag'];
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
					<a href="bookmark.php" class="navigator">My Followstream | </a>
					
				<?php echo "<a href='login.php?action=logout' id='logout'>logout [{$_SESSION['uname']}]</a>";
				} else {
					echo "<a href='login.html'><id='name'>login</p></a>";
				}
				?>
			</div>
		</header>
        
<form class='center' method="post" action="">     
<?php

  include "conn.php";
  
			  $query = "select * from picture where tag like '%".$tag."%'";
			  
			  echo "$query";
			   $result = @MYSQL_QUERY($query); 
			  while ($rec=mysql_fetch_array($result))	{
				$picid =$rec['picid']; 	
				
				$sql="select COUNT(userid) from `like` where picid=$picid";
				//echo "$sql";
				$cont=mysql_query($sql);
		        $sum=mysql_fetch_array($cont);				
				
				//echo "<br>$sum[0]";
						  
               echo "<div class='pic'><img class='icon' style='style:height:258px;width:258px;'src='test.php?id=$picid'/>";
				 	
			echo "<br><a  href='pin.php?id=$picid'>"."<img class='icon' src='images/pin.png'>"."</a>"
			."<input type='submit' name='like' id='like' value=".$picid.">". 
			"($sum[0])"."<a  href='comment.php?id=$picid'>"."<img class='icon' src='images/comment.png'>"."</div>"; 
			    
			  }?>
		    
 </form>
 
    
        
        
</body>
</html>