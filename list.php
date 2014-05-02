<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
include("conn.php");
$pagesize=5;
$url=$_SERVER['REQUEST_URI'];
$url=parse_url($url);
$url=$url['path'];
//echo "$path";

$numq=mysql_query("SELECT * FROM user");
$num = mysql_num_rows($numq);


if($_GET['page']){
$pageval=$_GET['page'];
$page=($pageval-1)*$pagesize;
$page.=',';
}
if($num > $pagesize){
 if($pageval<=1)
    $pageval=1;
echo "All $num items".
		" <a href=$url?page=".($pageval-1).">former page</a> <a href=$url?page=".($pageval+1).">next page</a>";
}

   $SQL="SELECT * FROM user limit $page $pagesize ";
    $query=mysql_query($SQL);
    while($row=mysql_fetch_array($query)){

    echo "<hr><b>".$row["username"]." | ".$row["email"];

    }
	
?>


