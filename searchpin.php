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

if(isset ($_POST['fname'])){
	 $_SESSION['pname']=$_POST['fname'];
	 $pname=$_SESSION['pname'];
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
        
<form class='center' method="post" action="pinboard.php">     
 <table border='1' style='margin-left:8px'>  
      <tr>
		<th>My Pinboard Name</th>
		<th>Pinboard ID</th>
        <th>Open </th>
        <th>ADD </th>
	    </tr>	
<?php

  include "conn.php";
  
	$query = "select * from pinboard where piname like '%".$_SESSION['pname']."%'";
			  
			  echo "$query";
			   $result = @MYSQL_QUERY($query); 
			  while ($rec=mysql_fetch_array($result))	{
				$pinid =$rec['pinid'];
				$piname=$rec['piname']; 	
			echo"<tr>
      <td align='center'>".$piname."</td>
	  <td align='center'>".$pinid."</td>
	  <td> <input type=submit size='1' name='open' value=".$pinid."></td>
	  <td> <input type=submit size='1' name='add' value=".$pinid."></td>";?>
	  
      
      <td>
      <select name="followname">
    <?php

	include("conn.php");
	$sql= "SELECT * FROM followstream where userid=$userid";
	echo "$sql";	
	$r1=mysql_query($sql);

 while ($r2=mysql_fetch_array($r1)){
	 
	 
	 echo "<option value=".$r2['fid'].">". $r2['fsname']." </option>";
	 
	 
	 }
?>
    </select>
      <td>
      
      
      
      
	  <?php
	  "<td> <input type=submit size='1' name='ADD' value=".$pinid."></td>
      ";
    
	 }?>
   </table>
		    
 </form>
 
 
        
        
</body>
</html>