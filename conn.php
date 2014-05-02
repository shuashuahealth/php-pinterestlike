<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'pinterest'; 
$connect = MYSQL_CONNECT( "localhost", "root", "$password") or die("Unable to connect to MySQL server");
mysql_select_db("$dbname") or die("Unable to select database");


?>