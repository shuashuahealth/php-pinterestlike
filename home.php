<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>Pinterest</title>
       <link rel="stylesheet/less" href="style.less">
       <link href="home.css" rel="stylesheet" type="text/css">
		<script src="less.js"></script> 

		
	</head>
    
<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
session_start();
ini_set('session.gc_maxlifetime',300);

if (isset($_POST['like']))
{
	
	
	$uid=$_SESSION['uid'];
	
	 include "conn.php";			 
			  $sql= "insert into `like` (userid,picid) values ('".$uid."','".$_POST['like']."')";
		echo"$sql";		
	 mysql_query($sql);
		
		mysql_close();
	}
	
	else if($_POST['login'])
	
	{
		
		//if(!isset($_POST['login'])){
			
  //  exit('invalid visit!  <a href="index.php">please sign in here</a> ');
	//	}
	//
	//$EMAIL = htmlspecialchars($_POST['EMAIL']);
$uname = $_POST['uname'];
$pw = $_POST['pw'];

//包含数据库连接文件
include('conn.php');
//检测用户名及密码是否正确
$check_query = mysql_query("select userid from user where username='$uname' and password='$pw' 
limit 1");

if($result = mysql_fetch_array($check_query)){
    //登录成功
    $_SESSION['uname'] = $uname;
    $_SESSION['uid'] = $result['userid'];
	$uid=$result['userid'];
 
} else {
    exit('login fail! Click here <a href="javascript:history.back(-1);">back</a> try again');
}

mysql_close($connect) ;
	
	
	
}
else {
	
	$uname=$_SESSION['uname'];
   $pw=$_SESSION['pw'];
	include('conn.php');
//检测用户名及密码是否正确
$check_query = mysql_query("select userid from user where username='$uname' and password='$pw' 
limit 1");

if($result = mysql_fetch_array($check_query)){
    //登录成功
    $_SESSION['uname'] = $uname;
    $_SESSION['uid'] = $result['userid'];
	$uid=$result['userid'];
 
} else {
    exit('login fail! Click here <a href="javascript:history.back(-1);">back</a> try again');
}
	
	}

		

 //








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
        
        
      
              <form class='center' method="post" action="">     
              <?php
			  include "conn.php";
			  $query = "select picid, COUNT(userid) from  `like` group by  picid ORDER BY  COUNT(userid) desc limit 0,3 "; 
			 // echo "$query";
			 $result = @MYSQL_QUERY($query); 
			  while ($rec=mysql_fetch_array($result))	{
				$picid =$rec['picid']; 	
				
				$sql="select COUNT(userid) from `like` where picid=$picid";
				//echo "$sql";
				$cont=mysql_query($sql);
		        $sum=mysql_fetch_array($cont);				
				
				//echo "<br>$sum[0]";
				//echo "$picid";		  
               echo "<div class='pic'><img class='icon' style='style:height:258px;width:258px;'src='test.php?id=$picid'/>";
				 	
			echo "<br><a  href='pin.php?id=$picid'>"."<img class='icon' src='images/pin.png'>"."</a>"
			."<input type='submit' name='like' id='like' value=".$picid.">". 
			"($sum[0])"."<a  href='comment.php?id=$picid'>"."<img class='icon' src='images/comment.png'>"."</div>"; 
			    
			  }?>
	
            </form>
				
				

					

					



</body>
</html>


