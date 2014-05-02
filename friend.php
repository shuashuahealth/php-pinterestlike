<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
session_start();
ini_set('session.gc_maxlifetime',300);
if($_GET['action'] == "logout"){
    unset($_SESSION['uid']);
    unset($_SESSION['uname']);
    unset($_SESSION['state']);
    unset($_SESSION['curtime']);
    echo 'logout sucess <a href="login.html">login</a>';
    exit;
}

include('conn.php');
$uid=$_SESSION['uid'];

 
date_default_timezone_set('America/New_York');
$time = date('Y-m-d H:i:s');

if(isset($_POST['Confirmed'])){
	
	echo "wrong";
	
    $n=$_POST['requester'];
   
   $response = "UPDATE friend SET responsetime='$time', request='1' where id1=getUID('$n') and id2=$uid and request='0'";
   echo "$response";
   mysql_query($response);

}

if(isset($_POST['Declined'])){
	$n=$_POST['requester'];
    
    $response = "UPDATE friend SET responsetime='$time', request='0' where id2=getUID('$n') and id2=$uid and request='0'";
	mysql_query($response);
}

if(isset($_POST['Search'])){
	$un=$_POST['unameS'];
	if($un != null){
		$search= "SELECT userid, username FROM user u WHERE username like '%$un%' and userid !=$uid and (userid not in (select u.userid from friend f, user u where f.id2=u.userid and f.id1=$uid and request='1')) and (userid not in (select userid from friend f, user u where f.id1=u.userid and id2=$uid and request='1'))";
	}
}

if(isset($_GET['request_sent'])){
	$request_sent=$_GET['request_sent'];
    $requestSent="INSERT INTO friend (id1,id2,senttime) VALUES('$uid','$request_sent','$time')";
	mysql_query($requestSent);
}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet/less" href="style.less">
	<title>Jingo friend</title>
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
					echo "<a href='login.html'><id='name'>login</p></a>";
				}
				?>
			</div>
		</header>
		<div class="wrapper" align="center" >
				<h1>Friend Request</h1>
				<p >
				<?php
				$friend_request = mysql_query("select * from user u, friend f where f.id1=u.userid and id2=$uid and request='0'");
				echo "<table border='1' style='margin-left:30px'>
				<tr>
				<th>requester</th>
				<th>request_time</th>
				<th>response</th>
				</tr>";

		        while($row = mysql_fetch_array($friend_request))
		        {
		        	echo
		        		 "<form action='friend.php?' method='POST'> 
		        		  <tr>
    
		        		  <td align='center'><input type='text' name='requester' value=".$row['username']." readonly='readonly' /></td>
		        		  <td align='center'><input type='text' name='senttime' value=".$row['senttime']." readonly='readonly' /></td>
		        	      <td> 
		        	      <input type='submit' name='Confirmed' value='Confirmed' /> 
		        	      <input type='submit' name='Declined' value='Declined' /> 
		        	      </td>
		        	      </tr>
		        	      </form>";
		        }
       
		        echo "</table>"; 
				?>		
				</p>
		
				<h1> Search Friend </h1>
				<form action="friend.php" method="post" >
				<p><strong>user name:</strong> <input type="text" name="unameS" />
				<input type="submit" value="Search" name="Search" style="margin-left:30px;font-size:16px"/><p>
				</form>
				<?php
				$friend = mysql_query($search);
				echo "<table border='1' style='margin-left:8px'>";
				while($r=mysql_fetch_array($friend)){
					echo "<td>".'<a href = "friend.php?request_sent='.$r['userid'].'">'.$r['username']."</td>";
				}
				echo "</table>";
				?>
		
				<h1> Friends </h1>
				<?php
				$all_friend="(select username from friend f, user u where f.id2=u.userid and f.id1=$uid and request='1') union (select username from friend f, user u where f.id1=u.userid and id2=$uid and request='1')";
				echo "<table border='1' style='margin-left:8px'>";
				$allfriends = mysql_query($all_friend);
				while($a=mysql_fetch_array($allfriends)){
					echo "<td align='center'>".$a['username']."</td>";
				}
				echo "</table>";
		
				mysql_close($con);
				?>

				</div>
				
		</div>
		
	</body>
</html>