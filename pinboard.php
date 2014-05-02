<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link href="home.css" rel="stylesheet" type="text/css">
<<link rel="stylesheet/less" href="style.less">
		<script src="less.js"></script> 

</head>
<?php
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
session_start();
ini_set('session.gc_maxlifetime',300);




$userid=$_SESSION['uid'];



if (isset($_POST['like']))
{
	 //echo $_SESSION['pinid'];
	$pinid=$_SESSION['pinid'];
	//echo "$pinid";
	
	 include "conn.php";			 
	  $sql= "insert into `like` (userid,picid) values ('".$userid."','".$_POST['like']."')";
		echo"$sql";		
	 mysql_query($sql);
		
		mysql_close();
	
	}
if (isset ($_POST['open'])){
	$pinid=$_POST['open'];
	$_SESSION['pinid']=$pinid;
	
	}
	
	 if(isset($_POST['delete'])){
		$pinid=$_POST['delete'];
		include "conn.php";			 
		
	    $sql="delete from pinboard where pinid=$pinid";
		echo"$sql";		
	 mysql_query($sql);
		
		mysql_close();
		
		header ("location: mypinboard.php");
		
		
		
		}
		 if(isset($_POST['deletep'])){
		$pinid=$_POST['deletep'];
		include "conn.php";			 
		$fid=$_SESSION['fid'];
	    $sql="delete from follow where pinid=$pinid and fid=$fid";
		echo"$sql";		
	 mysql_query($sql);
		
		mysql_close();
		
		header ("location: follow.php");
	
		 }
		 
	if(isset ($_POST['add']))	
{
	 include "conn.php";
  
	$k= "insert into follow (fid,pinid) values ('".$_POST['followname']."','".$_POST['add']."')";
			  
			  echo "$k";
			   mysql_query($k); 
	
	header ("location: searchpin.php");
	
	}
	
	
	
	if(isset ($_POST['remove']))
	
	{
		 include "conn.php";
    $picid=$_POST['remove'];
	$pinid=$_SESSION['pinid'];
	$s= "delete from repin where repinid=$pinid and picid=$picid";
	$ss="delete from picture where pinid=$pinid and picid=$picid";
			  
			  echo "$s";
			  echo "$ss";
			   mysql_query($s);
			   mysql_query($ss); 
		
		
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
				<a href="searchp.php" class="navigator">Search Pinboard |</a>
					<a href="search.php" class="navigator">Search Picture |</a>
					<a href="receive.php" class="navigator">Receive | </a>
					<a href="mypinboard.php" class="navigator">My Pinboard | </a>
					<a href="followstream.php" class="navigator">My Followstream | </a>
					
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
  
			  $query = "select picid from repin where repinid=$pinid union select picid from picture where pinid=$pinid";
			  
			  //echo "$query";
			  	//  echo "$query";
				 // 	  echo "$query";
			  
			   $result = @MYSQL_QUERY($query); 
			  while ($rec=mysql_fetch_array($result))	{
				$picid =$rec['picid']; 	
				
				$sql="select COUNT(userid) from `like` where picid=$picid";
				//echo "$sql";
				$cont=mysql_query($sql);
		        $sum=mysql_fetch_array($cont);				
				
				//echo "<br>$sum[0]";
						  
               echo "<div class='pic'><img class='icon' style='style:height:258px;width:258px;'src='test.php?id=$picid'/>";
			   
			   $comment="select * from comment where pinid=$pinid and picid=$picid";
			  // echo "$comment";
			   $tk=mysql_query($comment);
			   while ($tf=mysql_fetch_array($tk))
			   {
				 $kkk="select * from user where userid=".$tf['userid']."";
				//echo "$kkk";
				$kk=mysql_query($kkk);
		        $k=mysql_fetch_array($kk);		   
				   
				   echo "<textarea  style='width:253px' >".$k['username']." comment: ".$tf['content']."</textarea>"; 
				   				   
				   }
			   
			   
			   
				 	
			echo "<br><a  href='pin.php?id=$picid'>"."<img class='icon' src='images/pin.png'>"."</a>"
			."<input type='submit' name='like' id='like' value=".$picid.">". 
			"($sum[0])"."<a  href='comment.php?id=$picid'>"."<img class='icon' src='images/comment.png'>".
			
			"<input type='submit' name='remove' value='$picid'>". 
			
			"</div>"; 
			    
			  }
			  ?>
	
		    
 </form>





</body>
</html>