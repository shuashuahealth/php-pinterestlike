<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Follow pinboard</title>
 <link rel="stylesheet/less" href="style.less">
		<script src="less.js"></script> 

</head>
<?php
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
session_start();
ini_set('session.gc_maxlifetime',300);
//注销登录


$userid=$_SESSION['uid'];

if(isset($_POST['openf']))
{
$fid=$_POST['openf'];
$_SESSION['fid']=$_POST['openf'];
}
if(isset($_POST['deletef'])){
		$fid=$_POST['deletef'];
		include "conn.php";			 
		
	    $sql="delete from followstream where fid=$fid";
		echo"$sql";		
	 mysql_query($sql);
		
		mysql_close();
		
		header ("location: followstream.php");
		
		
		
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
					echo "<a href='login.html'><id='name'>login</p></a>";
				}
				?>
			</div>
		</header>
    <form action="pinboard.php" method="post">    
    <table border='1' style='margin-left:8px'>  
      <tr>
		<th>Follow Pinboard Name</th>
		<th>Pinboard ID</th>
        <th>Open </th>
        <th>Delete </th>
	    </tr>	
      
    <?php
	include "conn.php";
	$query = "select * from follow where fid=".$_SESSION['fid'].""; 
	echo "$query";
	$result = @MYSQL_QUERY($query); 
	 while ($rec=mysql_fetch_array($result))	{
				 //$piname=$rec['piname'];
				 $pinid=$rec['pinid']; 	
				 
				 $sql="select * from pinboard where pinid=$pinid";
				 $rk=@MYSQL_QUERY($sql);
				 $re=mysql_fetch_array($rk);
				 $piname=$re['piname'];
				 
				 
	  echo"<tr>
      <td align='center'>".$piname."</td>
	  <td align='center'>".$pinid."</td>
	  <td> <input type=submit size='1' name='open' value=".$pinid."></td>
	  <td> <input type=submit size='1' name='deletep' value=".$pinid."></td>
      ";
    
	 }?>
   </table>
   

    
</body>
</html>